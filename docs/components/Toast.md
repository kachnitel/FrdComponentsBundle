# Toast

An event-driven notification region for Symfony UX applications. It listens for a browser `CustomEvent` and renders each message as a dismissible toast.

## Quick Start

Render the component once in the page layout:

```twig
<twig:K:Components:Toast />
```

Dispatch the default `toast.show` event from a Symfony UX Live Component:

```php
$this->dispatchBrowserEvent('toast.show', [
    'message' => 'Please correct the errors below and try again.',
    'type' => 'error',
    'duration' => 8000,
]);
```

The component listens on `document`, so it can receive events dispatched by any Live Component on the page.

## Properties

| Property | Type | Required | Default | Description |
|----------|------|----------|---------|-------------|
| `event` | string | No | `toast.show` | Browser event name to listen for |

Use a custom event when that better matches the application:

```twig
<twig:K:Components:Toast event="notifications.show" />
```

## Event Payload

The event detail must contain a non-empty `message` string. It may also contain:

| Key | Type | Default | Description |
|-----|------|---------|-------------|
| `message` | string | Required | Text displayed in the toast |
| `type` | string | `info` | One of `success`, `error`, `warning`, or `info` |
| `duration` | number | `5000` | Auto-dismiss delay in milliseconds; must be positive |

Events without a valid message are ignored. Multiple events render as separate stacked toasts. Each toast has its own timer and dismiss button.

## Styling

The bundle provides minimal defaults in `assets/css/toast.css`. Import that asset through your application's AssetMapper entrypoint:

```js
import '@kachnitel/components-bundle/css/toast.css';
```

Override `.toast-region`, `.toast`, `.toast--success`, `.toast--error`, `.toast--warning`, `.toast--info`, and `.toast-dismiss` to match the host application.
