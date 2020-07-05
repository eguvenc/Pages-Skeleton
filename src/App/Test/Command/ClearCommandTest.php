<?php

declare(strict_types=1);

namespace App\Test\Command;

use PHPUnit\Framework\TestCase;
use Laminas\ServiceManager\ServiceManager;
use Obullo\Container\ServiceManagerConfig;
use Obullo\Factory\LazyCommandFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ClearCommandTest extends TestCase
{
    protected function setUp() : void
    {
		$env = 'development';
        $appConfig = include __DIR__ . '/../../../../config/application.config.php';
		$smConfig = new ServiceManagerConfig($appConfig['service_manager']);
		$container = new ServiceManager();
		$smConfig->configureServiceManager($container);
		$container->setService('appConfig', $appConfig);
		$container->setFactory('ServiceListener', 'Obullo\Factory\ServiceListenerConsoleFactory');
		$container->addAbstractFactory(new LazyCommandFactory);
		$container->get('ModuleManager')->loadModules();

        $application = new Application();
        $application->add($container->build('App\Command\Clear'));
        $command = $application->find('clear');
        $this->commandTester = new CommandTester($command);
    }
 
    protected function tearDown()
    {
        $this->commandTester = null;
    }

   	public function testExecute()
    { 
        $this->commandTester->execute($args = []);
        $this->assertStringContainsString('No file exists in cache folder.', $this->commandTester->getDisplay());
    }
}
