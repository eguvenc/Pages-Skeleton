<?php

declare(strict_types=1);

namespace App;

use Obullo\PageEvent;
use Obullo\Router\Types\IntType;
use Laminas\Diactoros\Response;
use Obullo\Middleware\NotFoundHandler;
use Obullo\Middleware\ErrorHandler;

class Module
{
    public function getConfig() : array
    {
        return [
            'service_manager' => [],
            'router' => [
                'routes' => [
                    '/' => [
                        'handler' => 'App\Pages\IndexModel',
                    ]
                ],
                'types' => [
                    new IntType('<int:id>'),
                ],
            ]
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
