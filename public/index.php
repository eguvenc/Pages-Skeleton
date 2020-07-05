<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Laminas\ServiceManager\ServiceManager;

// assign environment variable
// 
$env = getenv('APP_ENV') ?: 'development';
$appConfig = require __DIR__ . '/../config/application.config.php';
$smConfig = new Obullo\Container\ServiceManagerConfig($appConfig['service_manager']);

// setup service manager
//
$container = new ServiceManager();
$smConfig->configureServiceManager($container);
$container->setService('appConfig', $appConfig);
$container->addAbstractFactory(new Obullo\Factory\LazyMiddlewareFactory);

// load app modules
//
$container->get('ModuleManager')->loadModules();

// initialize to application
// 
$application = $container->get('Application');
$application->bootstrap();

// send response
//
$application->run();