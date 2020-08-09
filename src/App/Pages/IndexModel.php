<?php

declare(strict_types=1);

namespace App\Pages;

use Obullo\View\View;
use Laminas\Diactoros\Response\HtmlResponse;

class IndexModel extends View
{
    public function onGet()
    {
        return new HtmlResponse($this->render($this->layout));
    }

    public function onHeaderModel()
    {
        return $this->model('App\Pages\Templates\HeaderModel');
    }
    
    public function onFooterModel()
    {
        return $this->model('App\Pages\Templates\FooterModel');
    }
}
