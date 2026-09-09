<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests;

use Kachnitel\ComponentsBundle\Components\Calendar;
use Kachnitel\ComponentsBundle\Components\Dialog;
use Kachnitel\ComponentsBundle\Components\DialogTrigger;
use Kachnitel\ComponentsBundle\Components\LiveEmitTrigger;
use Kachnitel\ComponentsBundle\Components\Timer;
use Kachnitel\ComponentsBundle\Components\Toast;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\ComponentFactory;
use Twig\Environment;

class BundleInitializationTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        restore_exception_handler();
    }

    public function testBundleIsRegistered(): void
    {
        self::bootKernel();
        // $container = self::getContainer();

        $bundles = self::$kernel->getBundles();

        $this->assertArrayHasKey('KachnitelComponentsBundle', $bundles);
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
        $this->assertTrue($container->has('Kachnitel\ComponentsBundle\Components\Dialog'));
        $this->assertTrue($container->has('Kachnitel\ComponentsBundle\Components\DialogTrigger'));
        $this->assertTrue($container->has('Kachnitel\ComponentsBundle\Components\Calendar'));
        $this->assertTrue($container->has('Kachnitel\ComponentsBundle\Components\Timer'));
        $this->assertTrue($container->has('Kachnitel\ComponentsBundle\Components\LiveEmitTrigger'));
        $this->assertTrue($container->has('Kachnitel\ComponentsBundle\Components\Toast'));

        /** @var ComponentFactory $componentFactory */
        $componentFactory = $container->get('ux.twig_component.component_factory');

        // Test that components can be created via the factory
        $dialog = $componentFactory->get('K:Components:Dialog');
        $this->assertInstanceOf(Dialog::class, $dialog);

        $dialogTrigger = $componentFactory->get('K:Components:DialogTrigger');
        $this->assertInstanceOf(DialogTrigger::class, $dialogTrigger);

        $calendar = $componentFactory->get('K:Components:Calendar');
        $this->assertInstanceOf(Calendar::class, $calendar);

        $timer = $componentFactory->get('K:Components:Timer');
        $this->assertInstanceOf(Timer::class, $timer);

        $liveEmitTrigger = $componentFactory->get('K:Components:LiveEmitTrigger');
        $this->assertInstanceOf(LiveEmitTrigger::class, $liveEmitTrigger);

        $toast = $componentFactory->get('K:Components:Toast');
        $this->assertInstanceOf(Toast::class, $toast);
    }

    public function testTwigNamespaceKIsRegistered(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        /** @var Environment $twig */
        $twig = $container->get('twig');
        $loader = $twig->getLoader();

        // The @K namespace should be registered and point to bundle templates
        $this->assertTrue($loader->exists('@K/Components/Dialog.html.twig'));
        $this->assertTrue($loader->exists('@K/Components/Timer.html.twig'));
        $this->assertTrue($loader->exists('@K/Components/Toast.html.twig'));
    }
}
