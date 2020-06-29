<?php

use Obullo\Router\Types\IntType;
use Symfony\Component\Yaml\Yaml;

return [
    // root path
    'root' => dirname(dirname(__DIR__)),

    // view configurations
    'view_manager' => [
          'base_path' => '/',
    ],
    // router configurations
    'router' => [
        'types' => [
            new IntType('<int:id>'),
        ],
        'routes' => Yaml::parseFile(__DIR__.'/../routes.yaml'),
        'translatable_routes' => false,
    ],
];
