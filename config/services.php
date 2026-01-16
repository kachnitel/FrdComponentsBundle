<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Kachnitel\ComponentsBundle\Components\Calendar;
use Kachnitel\ComponentsBundle\Components\Dialog;
use Kachnitel\ComponentsBundle\Components\DialogTrigger;
use Kachnitel\ComponentsBundle\Components\LiveEmitTrigger;
use Kachnitel\ComponentsBundle\Components\Timer;

return static function (ContainerConfigurator $container): void {
    $services = $container->services()
        ->defaults()
            ->autowire()
            ->autoconfigure();

    // Register all components from the Components directory
    $services->load('Kachnitel\\ComponentsBundle\\Components\\', dirname(__DIR__) . '/src/Components');
};
