<?php

declare(strict_types=1);

namespace ZM\WebPanel;

use FilesystemIterator;
use League\Plates\Engine;
use ZM\Annotation\Http\Controller;
use ZM\Annotation\Http\RequestMapping;
use ZM\Annotation\Swoole\OnStart;
use ZM\Utils\Manager\RouteManager;
use function Composed\packages;
use function Composed\project_config;

#[Controller('/panel')]
class Frontend
{
    #[RequestMapping('/')]
    #[RequestMapping('/dashboard')]
    public function dashboard(): string
    {
        return $this->render('dashboard');
    }

    #[RequestMapping('/packages')]
    public function packages(): string
    {
        $project = project_config('name');
        $packages = packages();
        $result = [];
        foreach ($packages->toArray() as $name => $package) {
            if ($name === $project) {
                continue;
            }
            /** @var \Composed\Package $package */
            $config = $package->getConfig();
            $result[] = [
                'name' => $name,
                'version' => $config['version'],
            ];
        }
        return $this->render('packages', [
            'packages' => $result,
        ]);
    }

    #[OnStart(-1)]
    public function registerAssetRoute(): void
    {
        $basedir = dirname(__DIR__, 3) . '/resources/assets';
        $dir = new \RecursiveDirectoryIterator($basedir, FilesystemIterator::SKIP_DOTS);
        $registered = [];
        foreach (new \RecursiveIteratorIterator($dir) as $file) {
            $route = str_replace($basedir, '/panel/assets', dirname($file->getPathname()));
            if (!in_array($route, $registered, true)) {
                RouteManager::addStaticFileRoute($route, dirname($file->getPathname()));
                $registered[] = $route;
            }
        }
    }

    private function render(string $template, array $data = []): string
    {
        return (new Engine(__DIR__ . '/../../../resources/pages'))->render($template, $data);
    }
}
