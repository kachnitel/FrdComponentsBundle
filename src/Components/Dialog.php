<?php

namespace Frd\ComponentsBundle\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('FRD:Dialog', template: '@FrdComponents/components/Dialog.html.twig')]
class Dialog
{
    public string $id;
    public ?string $size = null;
    public string $label = '';
    public bool|string $fullscreen = false;
}
