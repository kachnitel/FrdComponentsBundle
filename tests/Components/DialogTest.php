<?php

namespace Frd\ComponentsBundle\Tests\Components;

use Frd\ComponentsBundle\Tests\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\ComponentFactory;

class DialogTest extends KernelTestCase
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

    public function testDialogComponentCanBeCreated(): void
    {
        $component = $this->factory->get('FRD:Dialog');
        $this->assertNotNull($component);

        // Set required properties
        $component->id = 'test-dialog';
        $this->assertEquals('test-dialog', $component->id);
    }

    public function testDialogWithSize(): void
    {
        $component = $this->factory->get('FRD:Dialog');
        $component->id = 'dialog-1';
        $component->size = 'lg';

        $this->assertEquals('lg', $component->size);
    }

    public function testDialogWithLabel(): void
    {
        $component = $this->factory->get('FRD:Dialog');
        $component->id = 'dialog-2';
        $component->label = 'Test Dialog Title';

        $this->assertEquals('Test Dialog Title', $component->label);
    }
}
