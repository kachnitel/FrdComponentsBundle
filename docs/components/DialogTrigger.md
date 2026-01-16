# DialogTrigger

A button component that opens a [Dialog](Dialog.md) component.

## Quick Start

```twig
<twig:K:Components:DialogTrigger dialogId="my-dialog" label="Open Dialog" />

<twig:K:Components:Dialog id="my-dialog" label="Dialog Title">
  Dialog content
</twig:K:Components:Dialog>
```

## Properties

| Property | Type | Required | Default | Description |
|----------|------|----------|---------|-------------|
| `dialogId` | string | Yes | - | ID of the Dialog component to open |
| `label` | string | No | `''` | Text label for the button |
| `icon` | string | No | `''` | Icon content (rendered before label) |

## Blocks

### `content`

Override the default button content (icon + label):

```twig
<twig:K:Components:DialogTrigger dialogId="settings-dialog">
  <twig:block name="content">
    <svg><!-- custom icon --></svg>
    <span>Settings</span>
  </twig:block>
</twig:K:Components:DialogTrigger>
```

## Events

The trigger uses a Stimulus controller (`@kachnitel/components-bundle/dialog-trigger`) that dispatches:

| Event | Description |
|-------|-------------|
| `dialog.trigger` | Fired when the trigger is clicked, before the dialog opens |

<details>
<summary>With Icon Example</summary>

```twig
<twig:K:Components:DialogTrigger
  dialogId="add-item-dialog"
  icon="+"
  label="Add Item"
/>
```

</details>

<details>
<summary>Custom Button Content</summary>

```twig
<twig:K:Components:DialogTrigger dialogId="confirm-delete" class="btn btn-danger">
  <twig:block name="content">
    <span class="material-icons">delete</span>
    Delete
  </twig:block>
</twig:K:Components:DialogTrigger>
```

</details>
