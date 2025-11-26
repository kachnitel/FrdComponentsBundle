<?php

namespace Frd\ComponentsBundle\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('FRD:Calendar', template: '@FrdComponents/components/Calendar.html.twig')]
class Calendar
{
    public int $year;
    public int $month;
    public int $minDayHeight = 100;
}
