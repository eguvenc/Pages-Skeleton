<?php

declare(strict_types=1);

namespace App\Pages;

use Obullo\View\PageView;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ServerRequestInterface as Request;

class IndexModel extends PageView
{
    /**
     * Page view index
     */
    public function onGet(array $get, array $config)
    {
        return new HtmlResponse($this->render($this->layout));
    }

    /**
     * Partial view header ajax example
     */
    public function onHeaderModel()
    {
        return $this->model('App\Pages\Templates\HeaderModel');
    }

    /**
     * Partial view footer ajax example
     */
    public function onFooterModel()
    {
        return $this->model('App\Pages\Templates\FooterModel');
    }
}
