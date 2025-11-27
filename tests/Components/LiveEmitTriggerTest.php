<?php

namespace Frd\ComponentsBundle\Tests\Components;

class LiveEmitTriggerTest extends ComponentTestCase
{
    public function testLiveEmitTriggerComponentCanBeCreated(): void
    {
        $component = $this->factory->get('FRD:LiveEmitTrigger');
        $this->assertNotNull($component);
    }

    public function testLiveEmitTriggerWithTarget(): void
    {
        $component = $this->factory->get('FRD:LiveEmitTrigger');
        $component->target = 'MyComponent';
        $component->action = 'refresh';

        $this->assertEquals('MyComponent', $component->target);
        $this->assertEquals('refresh', $component->action);
    }
}
