<?php

namespace Kachnitel\ComponentsBundle\Tests\Components;

class CalendarTest extends ComponentTestCase
{
    public function testCalendarComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:Calendar');
        $this->assertNotNull($component);
    }
}
