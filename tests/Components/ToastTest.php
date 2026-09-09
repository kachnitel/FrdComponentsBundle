<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests\Components;

use Kachnitel\ComponentsBundle\Components\Toast;

class ToastTest extends ComponentTestCase
{
    public function testToastHasDefaultEvent(): void
    {
        /** @var Toast $component */
        $component = $this->factory->get('K:Components:Toast');

        $this->assertSame('toast.show', $component->event);
    }

    public function testToastAcceptsCustomEvent(): void
    {
        $rendered = $this->renderTwigComponent('K:Components:Toast', [
            'event' => 'notifications.show',
        ]);

        $host = $rendered->crawler()->filter('.toast-region');

        $this->assertCount(1, $host);
        $this->assertSame('notifications.show', $host->attr('data-kachnitel--components-bundle--toast-event-value'));
    }

    public function testToastRendersAsLiveRegion(): void
    {
        $rendered = $this->renderTwigComponent('K:Components:Toast');

        $host = $rendered->crawler()->filter('.toast-region');

        $this->assertCount(1, $host);
        $this->assertSame('polite', $host->attr('aria-live'));
        $this->assertSame('false', $host->attr('aria-atomic'));
        $this->assertStringContainsString('toast', $host->attr('data-controller'));
        $this->assertSame('toast.show', $host->attr('data-kachnitel--components-bundle--toast-event-value'));
    }
}
