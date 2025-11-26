<?php

namespace Frd\ComponentsBundle\Tests\Components;

use Frd\ComponentsBundle\Tests\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\ComponentFactory;

class DialogTriggerTest extends KernelTestCase
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

    public function testDialogTriggerComponentCanBeCreated(): void
    {
        $component = $this->factory->get('FRD:DialogTrigger');
        $this->assertNotNull($component);

        // Set required properties
        $component->dialogId = 'my-dialog';
        $this->assertEquals('my-dialog', $component->dialogId);
    }

    public function testDialogTriggerWithLabel(): void
    {
        $component = $this->factory->get('FRD:DialogTrigger');
        $component->dialogId = 'dialog-1';
        $component->label = 'Open Dialog';

        $this->assertEquals('Open Dialog', $component->label);
    }

    public function testDialogTriggerWithIcon(): void
    {
        $component = $this->factory->get('FRD:DialogTrigger');
        $component->dialogId = 'dialog-2';
        $component->icon = '🔔';

        $this->assertEquals('🔔', $component->icon);
    }
}
