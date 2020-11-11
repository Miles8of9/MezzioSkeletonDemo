<?php

declare(strict_types=1);

namespace Auth\Handler;

use Auth\Form\LoginForm;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Router\RouterInterface;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AdminLoginHandler implements RequestHandlerInterface
{
    private $template;
    private $loginForm;

    public function __construct(RouterInterface $router, TemplateRendererInterface $template, LoginForm $loginForm)
    {
        $this->template = $template;
        $this->loginForm = $loginForm;
        $this->loginForm->setAttribute('action', $router->generateUri('admin.login'));
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse($this->template->render('auth::admin-login', [
            'loginForm' => $this->loginForm
        ]));
    }
}
