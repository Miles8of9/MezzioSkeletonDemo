<?php

declare(strict_types=1);

namespace User;

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
                Handler\DashboardHandler::class => Handler\Factory\DashboardHandlerFactory::class,
            ],
        ];
    }

    public function getTemplates(): array
    {
        return [
            'paths' => [
                'user' => [__DIR__ . '/../templates/user'],
            ],
        ];
    }
}