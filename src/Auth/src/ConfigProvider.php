<?php

declare(strict_types=1);

namespace Auth;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates()
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                Handler\UserLoginHandler::class => Handler\Factory\UserLoginHandlerFactory::class,
                Handler\AdminLoginHandler::class => Handler\Factory\AdminLoginHandlerFactory::class,
            ],
        ];
    }

    public function getTemplates(): array
    {
        return [
            'paths' => [
                'auth' => [__DIR__ . '/../templates/auth'],
            ],
        ];
    }
}