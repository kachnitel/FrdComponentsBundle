<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests\Components;

use Kachnitel\ComponentsBundle\Components\LiveEmitTrigger;

class LiveEmitTriggerTest extends ComponentTestCase
{
    public function testLiveEmitTriggerComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:LiveEmitTrigger');
        $this->assertNotNull($component);
    }

    public function testLiveEmitTriggerDefaultValues(): void
    {
        /** @var LiveEmitTrigger $component */
        $component = $this->factory->get('K:Components:LiveEmitTrigger');

        $this->assertEquals('save', $component->action);
        $this->assertEquals('save', $component->icon);
        $this->assertEquals('Save', $component->label);
    }

    public function testLiveEmitTriggerWithTarget(): void
    {
        /** @var LiveEmitTrigger $component */
        $component = $this->factory->get('K:Components:LiveEmitTrigger');
        $component->target = 'MyComponent';
        $component->action = 'refresh';

        $this->assertEquals('MyComponent', $component->target);
        $this->assertEquals('refresh', $component->action);
    }

    public function testLiveEmitTriggerWithCustomIconAndLabel(): void
    {
        /** @var LiveEmitTrigger $component */
        $component = $this->factory->get('K:Components:LiveEmitTrigger');
        $component->target = 'FormComponent';
        $component->icon = 'trash';
        $component->label = 'Delete';

        $this->assertEquals('trash', $component->icon);
        $this->assertEquals('Delete', $component->label);
    }
}
