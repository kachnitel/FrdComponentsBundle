# Dialog

A wrapper for the native HTML `<dialog>` element with Stimulus controller integration.

## Quick Start

```twig
<twig:K:Components:DialogTrigger dialogId="my-dialog" label="Open Dialog" />

<twig:K:Components:Dialog id="my-dialog" label="Dialog Title">
  Your dialog content here
</twig:K:Components:Dialog>
```

## Properties

| Property | Type | Required | Default | Description |
|----------|------|----------|---------|-------------|
| `id` | string | Yes | - | Unique identifier for the dialog |
| `label` | string | No | `''` | Title displayed in the dialog header |
| `size` | string | No | `null` | Size variant: `'sm'`, `'lg'`, `'xl'` |
| `fullscreen` | bool\|string | No | `false` | Fullscreen mode (see below) |

### Fullscreen Options

- `false` - Normal dialog (default)
- `true` - Always fullscreen
- `'sm-down'` - Fullscreen on small screens and below
- `'md-down'` - Fullscreen on medium screens and below
- `'lg-down'` - Fullscreen on large screens and below
- `'xl-down'` - Fullscreen on extra-large screens and below
- `'xxl-down'` - Fullscreen on extra-extra-large screens and below

## Blocks

### `content` (default)

The main content area of the dialog. This is where your content goes when using the component:

```twig
<twig:K:Components:Dialog id="example" label="Example">
  This content goes in the content block
</twig:K:Components:Dialog>
```

### `footer`

Override the footer area. Default contains a close button:

```twig
<twig:K:Components:Dialog id="example" label="Example">
  Content here

  <twig:block name="footer">
    <button type="submit">Save</button>
    <button type="button" onclick="document.getElementById('example').close();">Cancel</button>
  </twig:block>
</twig:K:Components:Dialog>
```

## Events

The dialog uses a Stimulus controller (`@kachnitel/components-bundle/dialog`) that dispatches events:

| Event | Description |
|-------|-------------|
| `dialog.open` | Fired when the dialog opens |
| `dialog.close` | Fired when the dialog closes |

<details>
<summary>CSS Classes</summary>

- `.dialog-sm`, `.dialog-lg`, `.dialog-xl` - Size variants
- `.dialog-content` - Content wrapper
- `.dialog-title` - Title element
- `.dialog-body` - Body content area
- `.dialog-footer` - Footer area
- `.dialog-close` - Close button

</details>

<details>
<summary>With Form Example</summary>

```twig
<twig:K:Components:Dialog id="edit-user" label="Edit User" size="lg">
  {{ form_start(form) }}
    {{ form_row(form.name) }}
    {{ form_row(form.email) }}

  <twig:block name="footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" onclick="document.getElementById('edit-user').close();">
      Cancel
    </button>
  </twig:block>
  {{ form_end(form) }}
</twig:K:Components:Dialog>
```

</details>
