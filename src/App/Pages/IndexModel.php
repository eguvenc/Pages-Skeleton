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
    public function onGet(Request $request, array $config)
    {
        return new HtmlResponse($this->render($this->layout));
    }

    /**
     * Parital view header ajax example
     */
    public function onHeaderModel()
    {
        return $this->model('App\Pages\Templates\HeaderModel');
    }

    /**
     * Parital view footer ajax example
     */
    public function onFooterModel()
    {
        return $this->model('App\Pages\Templates\FooterModel');
    }
}
