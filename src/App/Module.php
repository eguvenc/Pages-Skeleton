<?php

declare(strict_types=1);

namespace App;

use Obullo\PageEvent;
use Laminas\Diactoros\Response;
use Obullo\Middleware\NotFoundHandler;
use Laminas\Stratigility\Middleware\ErrorHandler;

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
        $app = $e->getParam('app');
        $container = $e->getApplication()->getContainer();

        $errorHandler = new ErrorHandler(
            function () {
                return new Response;
            },
            $container->get('App\Middleware\ErrorResponseGenerator')
        );
        $app->pipe($errorHandler);
    }

    public function onNotFoundHandler(PageEvent $e)
    {
        $app = $e->getParam('app');
        $container = $e->getApplication()->getContainer();

        $notFoundHandler = new NotFoundHandler(
            function () {
                return new Response;
            },
            $container->get('App\Middleware\NotFoundResponseGenerator')
        );
        $app->pipe($notFoundHandler);
    }
}
