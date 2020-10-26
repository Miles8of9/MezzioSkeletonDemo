<?php

declare(strict_types=1);

namespace App\Helper;

class CookieHelper
{
    private $cookies;

    public function __invoke($cookieName)
    {
        $result = array_search($cookieName, $this->cookies);

        if ($result)
        {
            return $this->cookies[$result];
        }
        else
        {
            return false;
        }
    }

    public function setCookies(array $cookies) : void
    {
        $this->cookies = $cookies;
    }
}
