<?php

namespace Kachnitel\ComponentsBundle\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('K:Components:Calendar', template: '@K/Components/Calendar.html.twig')]
class Calendar
{
    public int $year;
    public int $month;
    public int $minDayHeight = 100;
}
