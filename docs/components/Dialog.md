# Dialog

A wrapper for the html Dialog element.

## Usage

```twig
  <twig:FrdComponents:Dialog
    id="newCategoryDialog"
    label="New category"
  >
    <twig:NewCategoryForm />
  </twig:FrdComponents:Dialog>
```

## Events

The dialog uses a stimulus controller to fire events when the dialog is opened or closed.

### `dialog.open`

### `dialog.close`
