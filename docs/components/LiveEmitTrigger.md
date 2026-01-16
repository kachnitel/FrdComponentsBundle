# LiveEmitTrigger

A Live Component button that emits events to other Live Components. Useful for triggering actions on sibling or parent components.

## Quick Start

```twig
<twig:K:Components:LiveEmitTrigger
  target="MyApp:MyComponent"
  action="save"
  label="Save"
/>
```

## Properties

| Property | Type | Required | Default | Description |
|----------|------|----------|---------|-------------|
| `target` | string | Yes | - | Target component name (e.g., `'MyApp:Schedule'`) |
| `action` | string | No | `'save'` | Action/event name to emit |
| `icon` | string | No | `'save'` | Material icon name |
| `label` | string | No | `'Save'` | Button label text |

## Blocks

### `content`

Override the default button content:

```twig
<twig:K:Components:LiveEmitTrigger target="App:Editor" action="publish">
  <twig:block name="content">
    <span class="custom-icon">&#x1F680;</span>
    Publish Now
  </twig:block>
</twig:K:Components:LiveEmitTrigger>
```

## Styling

The component accepts standard HTML attributes:

| Attribute | Default | Description |
|-----------|---------|-------------|
| `class` | `'btn btn-primary'` | CSS classes for the button |
| `btnClass` | `'btn-primary'` | Alternative way to set button variant |

```twig
<twig:K:Components:LiveEmitTrigger
  target="App:Form"
  action="reset"
  label="Reset"
  class="btn btn-outline-secondary"
/>
```

<details>
<summary>How It Works</summary>

The component renders a button that uses Live Component's `emit` action:

```html
<button
  data-action="live#emit"
  data-live-event-param="name(TargetComponent)|actionName"
>
```

When clicked, this emits an event that the target Live Component can listen for using:

```php
#[LiveListener('actionName')]
public function onAction(): void
{
    // Handle the event
}
```

</details>

<details>
<summary>Target Component Setup</summary>

The target component needs a `#[LiveListener]` to receive the event:

```php
use Symfony\UX\LiveComponent\Attribute\LiveListener;

#[AsLiveComponent('MyApp:Schedule')]
class Schedule
{
    #[LiveListener('save')]
    public function onSave(): void
    {
        // Save logic here
        $this->entityManager->flush();
    }
}
```

</details>

<details>
<summary>Multiple Actions Example</summary>

```twig
<div class="button-group">
  <twig:K:Components:LiveEmitTrigger
    target="App:Editor"
    action="save"
    icon="save"
    label="Save Draft"
    class="btn btn-secondary"
  />

  <twig:K:Components:LiveEmitTrigger
    target="App:Editor"
    action="publish"
    icon="publish"
    label="Publish"
    class="btn btn-primary"
  />

  <twig:K:Components:LiveEmitTrigger
    target="App:Editor"
    action="discard"
    icon="delete"
    label="Discard"
    class="btn btn-danger"
  />
</div>
```

</details>
