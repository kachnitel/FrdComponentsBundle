# Kachnitel Components Bundle

A collection of reusable Twig and Live Components for Symfony applications.

## Twig Components

Standard Twig components that render HTML with customizable blocks and attributes.

- [Calendar](components/Calendar.md) - Monthly calendar grid with customizable day content
- [Dialog](components/Dialog.md) - Native HTML `<dialog>` wrapper with Stimulus controller
- [DialogTrigger](components/DialogTrigger.md) - Button to trigger Dialog opening
- [Toast](components/Toast.md) - Event-driven notifications with Stimulus controller

## Live Components

Symfony UX Live Components that provide interactive functionality with server-side state.

- [Timer](components/Timer.md) - Auto-updating duration timer with polling
- [LiveEmitTrigger](components/LiveEmitTrigger.md) - Button to emit events to other Live Components

## Usage Pattern

All components use the `K:Components:` namespace:

```twig
<twig:K:Components:ComponentName prop="value">
  Content here
</twig:K:Components:ComponentName>
```

## Development

- [Testing](testing.md) - Running and writing tests
