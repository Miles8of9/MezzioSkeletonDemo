<?php

declare(strict_types=1);

namespace App\ViewHelper;

use Interop\Container\ContainerInterface;
use Laminas\View\Helper\AbstractHelper;

class Cookie extends AbstractHelper
{
    public function __invoke(string $cookieName) : string
    {
        return 'TestCookieValue';
    }
}