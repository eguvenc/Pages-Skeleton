<?php

declare(strict_types=1);

namespace App\Pages\Templates;

use Obullo\View\PartialView;
use Laminas\Diactoros\Response\HtmlResponse;

class HeaderModel extends PartialView
{
    public function onGet()
    {
    	$this->view->modelName = get_class($this);

        return new HtmlResponse($this->render($this->view));
    }
}
