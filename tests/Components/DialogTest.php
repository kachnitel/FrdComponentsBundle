<?php

namespace Kachnitel\ComponentsBundle\Tests\Components;

class DialogTest extends ComponentTestCase
{
    public function testDialogComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:Dialog');
        $this->assertNotNull($component);

        // Set required properties
        $component->id = 'test-dialog';
        $this->assertEquals('test-dialog', $component->id);
    }

    public function testDialogWithSize(): void
    {
        $component = $this->factory->get('K:Components:Dialog');
        $component->id = 'dialog-1';
        $component->size = 'lg';

        $this->assertEquals('lg', $component->size);
    }

    public function testDialogWithLabel(): void
    {
        $component = $this->factory->get('K:Components:Dialog');
        $component->id = 'dialog-2';
        $component->label = 'Test Dialog Title';

        $this->assertEquals('Test Dialog Title', $component->label);
    }
}
