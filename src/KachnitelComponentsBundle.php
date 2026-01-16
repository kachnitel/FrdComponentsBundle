<?php

namespace Kachnitel\ComponentsBundle;

use Kachnitel\ComponentsBundle\Components\Calendar;
use Kachnitel\ComponentsBundle\Components\Dialog;
use Kachnitel\ComponentsBundle\Components\DialogTrigger;
use Kachnitel\ComponentsBundle\Components\LiveEmitTrigger;
use Kachnitel\ComponentsBundle\Components\Timer;
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
    }

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

    private function isAssetMapperAvailable(ContainerBuilder $container): bool
    {
        if (!interface_exists(AssetMapperInterface::class)) {
            return false;
        }

        // check that FrameworkBundle 6.3 or higher is installed
        $bundlesMetadata = $container->getParameter('kernel.bundles_metadata');
        if (!isset($bundlesMetadata['FrameworkBundle'])) {
            return false;
        }

        return is_file($bundlesMetadata['FrameworkBundle']['path'] . '/Resources/config/asset_mapper.php');
    }
}
