<?php

declare(strict_types=1);

namespace App;

use Obullo\PageEvent;
use Laminas\Diactoros\Response;
use Obullo\Middleware\NotFoundHandler;
use Obullo\Middleware\ErrorHandler;

class Module
{
    public function getConfig() : array
    {
        return [
            'service_manager' => []
        ];
    }

    public function onErrorHandler(PageEvent $e)
    {
        $container = $e->getApplication()->getContainer();

        $errorHandler = new ErrorHandler(
            $container->get('Request'),
            function () {
                return new Response;
            },
            $container->get('App\Middleware\ErrorResponseGenerator')
        );
        return $errorHandler;
    }

    public function onNotFoundHandler(PageEvent $e)
    {
        $container = $e->getApplication()->getContainer();

        $notFoundHandler = new NotFoundHandler(
            function () {
                return new Response;
            },
            $container->get('App\Middleware\NotFoundResponseGenerator')
        );
        return $notFoundHandler;
    }
}
