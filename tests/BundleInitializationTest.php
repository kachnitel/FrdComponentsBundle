<?php

namespace Frd\ComponentsBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\ComponentFactory;
use Twig\Environment;

class BundleInitializationTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    public function testBundleIsRegistered(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        $bundles = self::$kernel->getBundles();

        $this->assertArrayHasKey('FrdComponentsBundle', $bundles);
    }

    public function testTwigComponentServiceIsAvailable(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        $this->assertTrue($container->has('ux.twig_component.component_factory'));
        $componentFactory = $container->get('ux.twig_component.component_factory');
        $this->assertInstanceOf(ComponentFactory::class, $componentFactory);
    }

    public function testTwigIsConfigured(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        $this->assertTrue($container->has('twig'));
        $twig = $container->get('twig');
        $this->assertInstanceOf(Environment::class, $twig);
    }

    public function testComponentsAreRegistered(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        // Test that component services exist in the container
        $this->assertTrue($container->has('Frd\ComponentsBundle\Components\Dialog'));
        $this->assertTrue($container->has('Frd\ComponentsBundle\Components\DialogTrigger'));
        $this->assertTrue($container->has('Frd\ComponentsBundle\Components\Calendar'));
        $this->assertTrue($container->has('Frd\ComponentsBundle\Components\Timer'));
        $this->assertTrue($container->has('Frd\ComponentsBundle\Components\LiveEmitTrigger'));

        /** @var ComponentFactory $componentFactory */
        $componentFactory = $container->get('ux.twig_component.component_factory');

        // Test that components can be created via the factory
        $dialog = $componentFactory->get('FRD:Dialog');
        $this->assertNotNull($dialog);

        $dialogTrigger = $componentFactory->get('FRD:DialogTrigger');
        $this->assertNotNull($dialogTrigger);

        $calendar = $componentFactory->get('FRD:Calendar');
        $this->assertNotNull($calendar);

        $timer = $componentFactory->get('FRD:Timer');
        $this->assertNotNull($timer);

        $liveEmitTrigger = $componentFactory->get('FRD:LiveEmitTrigger');
        $this->assertNotNull($liveEmitTrigger);
    }
}
