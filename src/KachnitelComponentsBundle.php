<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle;

use Kachnitel\ComponentsBundle\Components\Calendar;
use Kachnitel\ComponentsBundle\Components\Dialog;
use Kachnitel\ComponentsBundle\Components\DialogTrigger;
use Kachnitel\ComponentsBundle\Components\LiveEmitTrigger;
use Kachnitel\ComponentsBundle\Components\Timer;
use Kachnitel\ComponentsBundle\Components\Toast;
use Symfony\Component\AssetMapper\AssetMapperInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class KachnitelComponentsBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        // Register component classes
        $container->register(Dialog::class)
            ->setAutowired(true)
            ->setAutoconfigured(true);

        $container->register(DialogTrigger::class)
            ->setAutowired(true)
            ->setAutoconfigured(true);

        $container->register(Calendar::class)
            ->setAutowired(true)
            ->setAutoconfigured(true);

        $container->register(Timer::class)
            ->setAutowired(true)
            ->setAutoconfigured(true);

        $container->register(LiveEmitTrigger::class)
            ->setAutowired(true)
            ->setAutoconfigured(true);

        $container->register(Toast::class)
            ->setAutowired(true)
            ->setAutoconfigured(true);
    }

    /**
     * @SuppressWarnings(UnusedFormalParameter)
     */
    public function prependExtension(ContainerConfigurator $configurator, ContainerBuilder $container): void
    {
        // Register Twig paths
        $container->prependExtensionConfig('twig', [
            'paths' => [
                $this->getPath() . '/templates' => 'K',
            ],
        ]);

        // Register asset mapper if available
        if (!$this->isAssetMapperAvailable($container)) {
            return;
        }

        $container->prependExtensionConfig('framework', [
            'asset_mapper' => [
                'paths' => [
                    __DIR__ . '/../assets' => '@kachnitel/components-bundle',
                ],
            ],
        ]);
    }

    /**
     * Checks whether AssetMapper is available in the container.
     *
     * Works with Symfony 6.4, 7.x, and 8.x without relying on internal
     * FrameworkBundle file paths that were removed in Symfony 8.
     */
    private function isAssetMapperAvailable(ContainerBuilder $container): bool
    {
        /** @disregard P1009 AssetMapper is optional */
        if (!interface_exists(AssetMapperInterface::class)) {
            return false;
        }

        // AssetMapper is part of FrameworkBundle; if the framework extension
        // is registered the asset_mapper key is available since Symfony 6.3+.
        return $container->hasExtension('framework');
    }
}
