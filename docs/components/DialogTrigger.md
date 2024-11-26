# DialogTrigger

Used along with the `Dialog` component to trigger the dialog to open.

## Usage

```twig
  <twig:FrdComponents:DialogTrigger
    dialogId="newCategoryDialog"
    label="New category"
  />

  <twig:FrdComponents:Dialog
    id="newCategoryDialog"
    label="New category"
  >...</twig:FrdComponents:Dialog>
```

## Events

The dialog trigger uses a stimulus controller to fire event when used, before the dialog is opened.

### `dialog.trigger`
