<?php

declare(strict_types=1);

namespace App\Middleware;

use App\ViewHelper\Cookie;
use Mezzio\Helper\Exception\MissingHelperException;
use Psr\Container\ContainerInterface;

class CookieHelperMiddlewareFactory
{
    private $cookieHelperName;

    public function __construct(string $cookieHelperName = Cookie::class)
    {
        $this->cookieHelperName = $cookieHelperName;
    }

    public function __invoke(ContainerInterface $container) : CookieHelperMiddleware
    {
        $helperManager = $container->get(\Laminas\View\HelperPluginManager::class);

        if (!$helperManager->has($this->cookieHelperName)) {
            throw new MissingHelperException(sprintf(
                '%s requires a %s service at instantiation; none found',
                CookieHelperMiddleware::class,
                $this->cookieHelperName
            ));
        }

        return new CookieHelperMiddleware($helperManager->get($this->cookieHelperName));
    }
}
