<?php

namespace Kachnitel\ComponentsBundle\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('K:Components:DialogTrigger', template: '@K/Components/DialogTrigger.html.twig')]
class DialogTrigger
{
    public string $dialogId;
    public string $icon = '';
    public string $label = '';
}
