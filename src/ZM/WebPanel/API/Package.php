<?php

declare(strict_types=1);

namespace ZM\WebPanel\API;

use ZM\Annotation\Http\Controller;
use ZM\Annotation\Http\Middleware;
use ZM\Annotation\Http\RequestMapping;
use function Composed\packages;
use function Composed\project_config;

#[Controller('/api/packages')]
#[Middleware('cors')]
class Package
{
    #[RequestMapping('/')]
    public function index(): array
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
        return $result;
    }
}
