<?php

declare(strict_types=1);

namespace App\Pages;

use Obullo\View\View;
use Laminas\Diactoros\Response\HtmlResponse;

class IndexModel extends View
{
    /**
     * Page view index
     */
    public function onGet()
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
