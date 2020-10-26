<?php

declare(strict_types=1);

namespace App\ViewHelper;

use Interop\Container\ContainerInterface;

class CookieFactory
{
    public function __invoke(ContainerInterface $container) : Cookie
    {
        return new Cookie();
    }
}