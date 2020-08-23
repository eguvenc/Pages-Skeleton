<?php

declare(strict_types=1);

namespace App;

use Obullo\PageEvent;
use Laminas\Diactoros\Response;
use Laminas\Router\Http\Literal;
use Obullo\Middleware\NotFoundHandler;
use Obullo\Middleware\ErrorHandler;
use Laminas\ServiceManager\Factory\InvokableFactory;

class Module
{
    public function getConfig() : array
    {
        return [
            'service_manager' => [
                'factories' => [
                    'App\Pages\IndexModel' => InvokableFactory::class,
                    'App\Pages\Templates\HeaderModel' => InvokableFactory::class,
                    'App\Pages\Templates\FooterModel' => InvokableFactory::class,
                ]
            ],
            'router' => [
                'routes' => [
                    'home' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/',
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => 'App\Pages\IndexModel',
                            ],
                        ],
                    ],
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
