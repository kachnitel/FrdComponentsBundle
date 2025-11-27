<?php

namespace Frd\ComponentsBundle\Tests\Components;

class CalendarTest extends ComponentTestCase
{
    public function testCalendarComponentCanBeCreated(): void
    {
        $component = $this->factory->get('FRD:Calendar');
        $this->assertNotNull($component);
    }
}
