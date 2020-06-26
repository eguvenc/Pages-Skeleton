<?php

declare(strict_types=1);

namespace App\Pages\Templates;

use Obullo\View\PartialView;
use Laminas\Diactoros\Response\HtmlResponse;

class FooterModel extends PartialView
{
    public function onGet()
    {
        return new HtmlResponse($this->render($this->view));
    }
}
