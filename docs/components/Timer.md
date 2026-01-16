# Timer

A Live Component that displays an auto-updating duration timer. Uses polling to update every second.

## Quick Start

```twig
<twig:K:Components:Timer :startTime="entry.startTime" />
```

## Properties

| Property | Type | Required | Default | Description |
|----------|------|----------|---------|-------------|
| `startTime` | DateTimeImmutable | Yes | - | When the timer started |
| `startDuration` | int | No | `0` | Initial duration in seconds to add to elapsed time |

## Computed Properties

| Property | Type | Description |
|----------|------|-------------|
| `duration` | int | Current duration in seconds (`startDuration` + elapsed time since `startTime`) |

## Blocks

### `content`

Override the default duration display:

```twig
<twig:K:Components:Timer :startTime="task.startedAt">
  <twig:block name="content">
    {{ (this.duration / 3600)|number_format(1) }} hours
  </twig:block>
</twig:K:Components:Timer>
```

<details>
<summary>How It Works</summary>

The component uses Symfony UX Live Component's polling feature to re-render every second:

```html
<span data-poll="delay(1000)|$render">
  {{ this.duration }}
</span>
```

The `duration` is calculated server-side as:
```php
$this->startDuration + (time() - $this->startTime->getTimestamp())
```

</details>

<details>
<summary>Formatted Duration Example</summary>

Display duration in HH:MM:SS format:

```twig
<twig:K:Components:Timer :startTime="entry.startTime">
  <twig:block name="content">
    {% set hours = (this.duration / 3600)|round(0, 'floor') %}
    {% set minutes = ((this.duration % 3600) / 60)|round(0, 'floor') %}
    {% set seconds = this.duration % 60 %}
    {{ '%02d:%02d:%02d'|format(hours, minutes, seconds) }}
  </twig:block>
</twig:K:Components:Timer>
```

</details>

<details>
<summary>With Pre-existing Duration</summary>

Continue a timer that was paused with accumulated time:

```twig
{# Resume timer with 1 hour already logged #}
<twig:K:Components:Timer
  :startTime="entry.resumedAt"
  :startDuration="3600"
/>
```

</details>
