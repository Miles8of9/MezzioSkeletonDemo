<?php

declare(strict_types=1);

namespace App\ViewHelper;

use Interop\Container\ContainerInterface;
use Laminas\View\Helper\AbstractHelper;

class Cookie extends AbstractHelper
{
    private $cookies;

    public function __invoke(string $cookieName) : ?string
    {
        return isset($this->cookies[$cookieName]) ? $this->cookies[$cookieName] : null;
    }

    public function setCookies(array $cookies) : void
    {
        $this->cookies = $cookies;
    }
}