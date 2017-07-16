<?php

use Corley\FoundationModule\FoundationModule;
use Corley\FrameworkModule\FrameworkModule;
use Corley\ErrorModule\ErrorModule;
use Psr\Container\ContainerInterface;

class AppModule
{
    private $debug;

    public function __invoke(ContainerInterface $container)
    {
        return [
            new FoundationModule($container),
            new FrameworkModule($container, [
                "app"       => __DIR__ . '/../src',
                "cache"     => __DIR__ . '/../var/cache',
                "debug"     => $this->debug,
            ]),
            new ErrorModule([
                "debug"     => $this->debug,
            ])
        ];
    }

    public function __construct($debug = false)
    {
        $this->debug = $debug;
    }
}


