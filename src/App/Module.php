<?php

declare(strict_types=1);

namespace App;

use App\Middleware\ErrorNotFoundHandler;
use App\Middleware\ErrorResponseGenerator;

class Module
{
    public function getConfig() : array
    {
        return [
            'service_manager' => [],
            'error_handlers' => [
                __NAMESPACE__ => [
                    'error_404' => ErrorNotFoundHandler::class,
                    'error_generator' => ErrorResponseGenerator::class,
                ],
            ]
        ];
    }
}
