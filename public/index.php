<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Laminas\ServiceManager\ServiceManager;

$appConfig = require __DIR__ . '/../config/application.config.php';
$smConfig = isset($appConfig['service_manager']) ? $appConfig['service_manager'] : [];
$smConfig = new Obullo\Container\ServiceManagerConfig($smConfig);

// setup service manager
//
$container = new ServiceManager();
$smConfig->configureServiceManager($container);
$container->setService('appConfig', $appConfig);

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