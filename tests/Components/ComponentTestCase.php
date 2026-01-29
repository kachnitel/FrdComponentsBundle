<?php

namespace Kachnitel\ComponentsBundle\Tests\Components;

use Kachnitel\ComponentsBundle\Tests\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\ComponentFactory;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;

abstract class ComponentTestCase extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected ComponentFactory $factory;

    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->factory = $container->get('ux.twig_component.component_factory');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        restore_exception_handler();
    }
}
