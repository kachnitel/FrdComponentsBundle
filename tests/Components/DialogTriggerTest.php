<?php

namespace Frd\ComponentsBundle\Tests\Components;

class DialogTriggerTest extends ComponentTestCase
{
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
