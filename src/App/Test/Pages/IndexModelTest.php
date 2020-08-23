<?php

declare(strict_types=1);

namespace App\Test\Pages;

use App\Pages\IndexModel;
use App\Pages\HeaderModel;
use App\Pages\FooterModel;
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

        $env = 'development';
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
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('App');
        $this->assertPageModelName(IndexModel::class);
        $this->assertPageModel('IndexModel');
        $this->assertMatchedRouteName('home');
    }

    public function testIndexModelRenderedWithinLayout()
    {
        $this->dispatch('/', 'GET');
        $this->assertQuery('.container .welcome');
    }

    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/invalid/route', 'GET');
        $this->assertResponseStatusCode(404);
    }

    public function testHeaderModelCanBeAccessedWithAjaxRequest()
    {
        $this->dispatch('/', 'GET', ['onHeaderModel' => true], $ajax = true);
        $this->assertResponseStatusCode(200);
        $this->assertQuery('.d-flex .flex-column');
        $this->assertTemplateName('App/Pages/Templates/Header');
    }

    public function testFooterModelCanBeAccessedWithAjaxRequest()
    {
        $this->dispatch('/', 'GET', ['onFooterModel' => true], $ajax = true);
        $this->assertResponseStatusCode(200);
        $this->assertQuery('.pt-4 .my-md-5');
        $this->assertTemplateName('App/Pages/Templates/Footer');
    }
}
