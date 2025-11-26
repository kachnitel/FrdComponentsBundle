<?php

namespace Frd\ComponentsBundle\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('FRD:LiveEmitTrigger', template: '@FrdComponents/components/LiveEmitTrigger.html.twig')]
final class LiveEmitTrigger
{
    use DefaultActionTrait;

    /**
     * If set, the event will be emitted to the target Component.
     *
     * References component name (e.g. "WorkShift:Schedule").
     */
    #[LiveProp]
    public string $target;

    #[LiveProp]
    public string $action = 'save';

    #[LiveProp]
    public string $icon = 'save';

    #[LiveProp]
    public string $label = 'Save';
}
