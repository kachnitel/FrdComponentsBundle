<?php

namespace Frd\ComponentsBundle\Tests\Components;

class TimerTest extends ComponentTestCase
{
    public function testTimerComponentCanBeCreated(): void
    {
        $component = $this->factory->get('FRD:Timer');
        $this->assertNotNull($component);
    }
}
