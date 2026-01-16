<?php

namespace Kachnitel\ComponentsBundle\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('K:Components:Dialog', template: '@K/Components/Dialog.html.twig')]
class Dialog
{
    public string $id;
    public ?string $size = null;
    public string $label = '';
    public bool|string $fullscreen = false;
}
