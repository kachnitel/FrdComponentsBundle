<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests\Components;

use Kachnitel\ComponentsBundle\Components\Dialog;

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
        /** @var Dialog $component */
        $component = $this->factory->get('K:Components:Dialog');
        $component->id = 'dialog-1';
        $component->size = 'lg';

        $this->assertEquals('lg', $component->size);
    }

    public function testDialogWithLabel(): void
    {
        /** @var Dialog $component */
        $component = $this->factory->get('K:Components:Dialog');
        $component->id = 'dialog-2';
        $component->label = 'Test Dialog Title';

        $this->assertEquals('Test Dialog Title', $component->label);
    }

    public function testDialogDefaultValues(): void
    {
        /** @var Dialog $component */
        $component = $this->factory->get('K:Components:Dialog');

        $this->assertNull($component->size);
        $this->assertEquals('', $component->label);
        $this->assertFalse($component->fullscreen);
    }

    public function testDialogFullscreenAsBoolean(): void
    {
        /** @var Dialog $component */
        $component = $this->factory->get('K:Components:Dialog');
        $component->id = 'dialog-fullscreen';
        $component->fullscreen = true;

        $this->assertTrue($component->fullscreen);
    }

    public function testDialogFullscreenAsString(): void
    {
        /** @var Dialog $component */
        $component = $this->factory->get('K:Components:Dialog');
        $component->id = 'dialog-fullscreen-breakpoint';
        $component->fullscreen = 'md-down';

        $this->assertEquals('md-down', $component->fullscreen);
    }
}
