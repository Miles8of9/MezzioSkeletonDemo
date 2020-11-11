<?php

declare(strict_types=1);

namespace Auth\Handler\Factory;

use Auth\Form\LoginForm;
use Auth\Handler\UserLoginHandler;
use Laminas\Form\FormElementManager;
use Mezzio\Router\RouterInterface;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UserLoginHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $router = $container->get(RouterInterface::class);
        $template = $container->get(TemplateRendererInterface::class);
        $loginForm = $container->get(FormElementManager::class)
                               ->get(LoginForm::class);

        return new UserLoginHandler($router, $template, $loginForm);
    }
}
