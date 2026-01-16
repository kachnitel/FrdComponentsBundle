<?php

namespace Kachnitel\ComponentsBundle\Tests\Components;

class TimerTest extends ComponentTestCase
{
    public function testTimerComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:Timer');
        $this->assertNotNull($component);
    }
}
