<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests\Components;

use Kachnitel\ComponentsBundle\Components\DialogTrigger;

class DialogTriggerTest extends ComponentTestCase
{
    public function testDialogTriggerComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:DialogTrigger');
        $this->assertInstanceOf(DialogTrigger::class, $component);

        // Set required properties
        $component->dialogId = 'my-dialog';
        $this->assertEquals('my-dialog', $component->dialogId);
    }

    public function testDialogTriggerDefaultValues(): void
    {
        /** @var DialogTrigger $component */
        $component = $this->factory->get('K:Components:DialogTrigger');

        $this->assertEquals('', $component->icon);
        $this->assertEquals('', $component->label);
    }

    public function testDialogTriggerWithLabel(): void
    {
        /** @var DialogTrigger $component */
        $component = $this->factory->get('K:Components:DialogTrigger');
        $component->dialogId = 'dialog-1';
        $component->label = 'Open Dialog';

        $this->assertEquals('Open Dialog', $component->label);
    }

    public function testDialogTriggerWithIcon(): void
    {
        /** @var DialogTrigger $component */
        $component = $this->factory->get('K:Components:DialogTrigger');
        $component->dialogId = 'dialog-2';
        $component->icon = 'bell';

        $this->assertEquals('bell', $component->icon);
    }
}
