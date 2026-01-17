<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests\Components;

use DateTimeImmutable;
use Kachnitel\ComponentsBundle\Components\Timer;

class TimerTest extends ComponentTestCase
{
    public function testTimerComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:Timer');
        $this->assertNotNull($component);
    }

    public function testGetDurationWithZeroStartDuration(): void
    {
        /** @var Timer $timer */
        $timer = $this->factory->get('K:Components:Timer');
        $timer->startDuration = 0;
        $timer->startTime = new DateTimeImmutable();

        // Duration should be ~0 since we just started
        $this->assertGreaterThanOrEqual(0, $timer->getDuration());
        $this->assertLessThan(2, $timer->getDuration());
    }

    public function testGetDurationWithPositiveStartDuration(): void
    {
        /** @var Timer $timer */
        $timer = $this->factory->get('K:Components:Timer');
        $timer->startDuration = 300; // 5 minutes
        $timer->startTime = new DateTimeImmutable();

        // Duration should be ~300 since we just started
        $this->assertGreaterThanOrEqual(300, $timer->getDuration());
        $this->assertLessThan(302, $timer->getDuration());
    }

    public function testGetDurationCalculatesElapsedTime(): void
    {
        /** @var Timer $timer */
        $timer = $this->factory->get('K:Components:Timer');
        $timer->startDuration = 0;
        // Start time 60 seconds ago
        $timer->startTime = new DateTimeImmutable('-60 seconds');

        // Duration should be ~60 seconds
        $this->assertGreaterThanOrEqual(60, $timer->getDuration());
        $this->assertLessThan(62, $timer->getDuration());
    }

    public function testGetDurationWithFutureStartTime(): void
    {
        /** @var Timer $timer */
        $timer = $this->factory->get('K:Components:Timer');
        $timer->startDuration = 0;
        // Start time 30 seconds in the future
        $timer->startTime = new DateTimeImmutable('+30 seconds');

        // Duration should be negative (~-30)
        $this->assertLessThan(0, $timer->getDuration());
        $this->assertGreaterThan(-32, $timer->getDuration());
    }

    public function testGetDurationCombinesStartDurationAndElapsed(): void
    {
        /** @var Timer $timer */
        $timer = $this->factory->get('K:Components:Timer');
        $timer->startDuration = 120; // 2 minutes prior
        // Start time 30 seconds ago
        $timer->startTime = new DateTimeImmutable('-30 seconds');

        // Duration should be ~150 (120 + 30)
        $this->assertGreaterThanOrEqual(150, $timer->getDuration());
        $this->assertLessThan(152, $timer->getDuration());
    }

    public function testGetDurationWithNegativeStartDuration(): void
    {
        /** @var Timer $timer */
        $timer = $this->factory->get('K:Components:Timer');
        $timer->startDuration = -60; // negative offset
        $timer->startTime = new DateTimeImmutable();

        // Duration should be ~-60
        $this->assertLessThanOrEqual(0, $timer->getDuration());
        $this->assertGreaterThan(-62, $timer->getDuration());
    }
}
