<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Frd\ComponentsBundle\Components\Calendar;
use Frd\ComponentsBundle\Components\Dialog;
use Frd\ComponentsBundle\Components\DialogTrigger;
use Frd\ComponentsBundle\Components\LiveEmitTrigger;
use Frd\ComponentsBundle\Components\Timer;

return static function (ContainerConfigurator $container): void {
    $services = $container->services()
        ->defaults()
            ->autowire()
            ->autoconfigure();

    // Register all components from the Components directory
    $services->load('Frd\\ComponentsBundle\\Components\\', dirname(__DIR__) . '/src/Components');
};
