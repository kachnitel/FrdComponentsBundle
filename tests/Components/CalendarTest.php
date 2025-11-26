<?php

namespace Frd\ComponentsBundle\Tests\Components;

use Frd\ComponentsBundle\Tests\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\ComponentFactory;

class CalendarTest extends KernelTestCase
{
    private ComponentFactory $factory;

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

    public function testCalendarComponentCanBeCreated(): void
    {
        $component = $this->factory->get('FRD:Calendar');
        $this->assertNotNull($component);
    }
}
