<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests\Components;

use Kachnitel\ComponentsBundle\Components\Calendar;

class CalendarTest extends ComponentTestCase
{
    public function testCalendarComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:Calendar');
        $this->assertInstanceOf(Calendar::class, $component);
    }

    public function testCalendarDefaultMinDayHeight(): void
    {
        /** @var Calendar $component */
        $component = $this->factory->get('K:Components:Calendar');

        $this->assertEquals(100, $component->minDayHeight);
    }

    public function testCalendarWithCustomMinDayHeight(): void
    {
        /** @var Calendar $component */
        $component = $this->factory->get('K:Components:Calendar');
        $component->minDayHeight = 150;

        $this->assertEquals(150, $component->minDayHeight);
    }

    public function testCalendarWithYearAndMonth(): void
    {
        /** @var Calendar $component */
        $component = $this->factory->get('K:Components:Calendar');
        $component->year = 2026;
        $component->month = 1;

        $this->assertEquals(2026, $component->year);
        $this->assertEquals(1, $component->month);
    }

    public function testCalendarWithEdgeMonthValues(): void
    {
        /** @var Calendar $component */
        $component = $this->factory->get('K:Components:Calendar');

        // January
        $component->month = 1;
        $this->assertEquals(1, $component->month);

        // December
        $component->month = 12;
        $this->assertEquals(12, $component->month);
    }

    public function testCalendarRenders(): void
    {
        $rendered = $this->renderTwigComponent('K:Components:Calendar', [
            'year' => 2026,
            'month' => 1,
        ]);

        $this->assertCount(1, $rendered->crawler()->filter('.calendar'));
    }
}
