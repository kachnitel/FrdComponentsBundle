<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('K:Components:Toast', template: '@K/Components/Toast.html.twig')]
class Toast
{
    public string $event = 'toast.show';
}