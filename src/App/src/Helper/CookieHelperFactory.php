<?php

declare(strict_types=1);

namespace App\Helper;

use Interop\Container\ContainerInterface;

class CookieHelperFactory
{
    public function __invoke(ContainerInterface $container) : CookieHelper
    {
        return new CookieHelper();
    }
}
