<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Helper\CookieHelper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CookieHelperMiddleware implements MiddlewareInterface
{
    private $helper;

    public function __construct(CookieHelper $helper)
    {
        $this->helper = $helper;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $cookies = $request->getCookieParams();
        $this->helper->setCookies($cookies);

        return $handler->handle($request);
    }
}
