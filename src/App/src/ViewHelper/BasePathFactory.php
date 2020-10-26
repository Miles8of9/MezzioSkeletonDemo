<?php

declare(strict_types=1);

namespace App\ViewHelper;

use Interop\Container\ContainerInterface;
use Laminas\View\Helper\BasePath;

class BasePathFactory
{
    public function __invoke(ContainerInterface $container) : BasePath
    {
        $helper = new BasePath();
        $helper->setBasePath('/');

        return $helper;
    }
}
