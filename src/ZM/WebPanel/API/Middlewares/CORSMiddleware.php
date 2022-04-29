<?php

declare(strict_types=1);

namespace ZM\WebPanel\API\Middlewares;

use ZM\Annotation\Http\HandleAfter;
use ZM\Annotation\Http\MiddlewareClass;
use ZM\Http\MiddlewareInterface;

#[MiddlewareClass('cors')]
class CORSMiddleware implements MiddlewareInterface
{
    #[HandleAfter]
    public function handle()
    {
        $response = ctx()->getResponse();
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', '*');
        $response->header('Access-Control-Allow-Methods', '*');
    }
}
