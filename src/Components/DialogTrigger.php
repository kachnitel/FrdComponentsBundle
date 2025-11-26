<?php

namespace Frd\ComponentsBundle\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('FRD:DialogTrigger', template: '@FrdComponents/components/DialogTrigger.html.twig')]
class DialogTrigger
{
    public string $dialogId;
    public string $icon = '';
    public string $label = '';
}
