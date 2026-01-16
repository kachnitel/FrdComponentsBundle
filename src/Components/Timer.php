<?php

namespace Kachnitel\ComponentsBundle\Components;

use DateTimeImmutable;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('K:Components:Timer', template: '@K/Components/Timer.html.twig')]
final class Timer
{
    use DefaultActionTrait;

    #[LiveProp]
    public int $startDuration = 0;

    #[LiveProp]
    public DateTimeImmutable $startTime;

    public function getDuration(): int
    {
        return $this->startDuration + (time() - $this->startTime->getTimestamp());
    }
}
