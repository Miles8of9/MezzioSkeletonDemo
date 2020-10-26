<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Helper\CookieHelper;
use Mezzio\Helper\Exception\MissingHelperException;
use Psr\Container\ContainerInterface;

class CookieHelperMiddlewareFactory
{
    private $cookieHelperServiceName;

    public function __construct(string $cookieHelperServiceName = CookieHelper::class)
    {
        $this->cookieHelperServiceName = $cookieHelperServiceName;
    }

    public function __invoke(ContainerInterface $container) : CookieHelperMiddleware
    {
        if (! $container->has($this->cookieHelperServiceName)) {
            throw new MissingHelperException(sprintf(
                '%s requires a %s service at instantiation; none found',
                CookieHelperMiddleware::class,
                $this->cookieHelperServiceName
            ));
        }

        return new CookieHelperMiddleware($container->get($this->cookieHelperServiceName));
    }
}
