<?php

use Obullo\Router\Types\IntType;
use Obullo\Router\Types\StrType;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Symfony\Component\Yaml\Yaml;

return [
    'view_manager' => [
          'base_path' => '/',
    ],
    'router' => [
        // Available global route types
        'types' => [
            new IntType('<int:id>'),
        ],
        'routes' => Yaml::parseFile(__DIR__.'/../routes.yaml'),
        'translatable_routes' => false,
    ],
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.s
    'service_manager' => [
        'initializers' => [

        ],
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        //
        'aliases' => [

        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        //
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            // Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        //
        'factories'  => [

        ],
        'abstract_factories' => [

        ],
    ],

];
