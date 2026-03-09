<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests;

use Kachnitel\ComponentsBundle\KachnitelComponentsBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\UX\LiveComponent\LiveComponentBundle;
use Symfony\UX\StimulusBundle\StimulusBundle;
use Symfony\UX\TwigComponent\TwigComponentBundle;

class TestKernel extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new TwigComponentBundle(),
            new LiveComponentBundle(),
            new StimulusBundle(),
            new KachnitelComponentsBundle(),
        ];
    }

    /**
     * Symfony 7+ / 8 signature: ContainerConfigurator replaces the old
     * (ContainerBuilder, LoaderInterface) pair that was removed in Symfony 8.
     *
     * @SuppressWarnings(UnusedFormalParameter)
     */
    protected function configureContainer(ContainerConfigurator $container, \Symfony\Component\Config\Loader\LoaderInterface $loader, ContainerBuilder $builder): void
    {
        $container->extension('framework', [
            'secret' => 'test',
            'test' => true,
            'router' => ['utf8' => true],
            'http_method_override' => false,
        ]);

        $container->extension('twig', [
            'default_path' => '%kernel.project_dir%/templates',
            'strict_variables' => true,
        ]);
    }

    public function getCacheDir(): string
    {
        return sys_get_temp_dir() . '/kachnitel_components_bundle/cache/' . spl_object_hash($this);
    }

    public function getLogDir(): string
    {
        return sys_get_temp_dir() . '/kachnitel_components_bundle/logs';
    }
}
