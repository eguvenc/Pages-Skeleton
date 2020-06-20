<?php

declare(strict_types=1);

namespace App\Test\Pages;

use Laminas\Stdlib\ArrayUtils;
use Obullo\Test\PHPUnit\Pages\AbstractHttpPageTestCase;

class IndexModelTest extends AbstractHttpPageTestCase
{
    public function setUp() : void
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $appConfig = include __DIR__ . '/../../../../config/application.config.php';
        $this->setApplicationConfig(ArrayUtils::merge(
            $appConfig,
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexModelCanBeAccessed()
    {
        $this->dispatch('/', 'GET');
        // $this->assertResponseStatusCode(200);
        // $this->assertModuleName('application');
        // // $this->assertControllerName(IndexController::class); // as specified in router's controller name alias
        // $this->assertControllerClass('IndexController');
        // $this->assertMatchedRouteName('home');
    }

    public function testIndexModelRenderedWithinLayout()
    {
        $this->dispatch('/', 'GET');
        $this->assertQuery('.container .jumbotron');
    }

    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/invalid/route', 'GET');
        $this->assertResponseStatusCode(404);
    }
}
