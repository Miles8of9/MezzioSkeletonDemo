<?php

declare(strict_types=1);

namespace User\Handler\Factory;

use User\Handler\DashboardHandler;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DashboardHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $template = $container->get(TemplateRendererInterface::class);

        return new DashboardHandler($template);
    }
}
