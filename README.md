# Kachnitel Components Bundle

A Symfony bundle providing reusable Twig and Live Components for common UI patterns.

## Installation

```bash
composer require kachnitel/components-bundle
```

## Quick Start

### Calendar

Display a monthly calendar with custom content for each day:

```twig
<twig:K:Components:Calendar year="2024" month="1">
  <twig:block name="dayContent">
    {{ date }} - Your content here
  </twig:block>
</twig:K:Components:Calendar>
```

### Dialog

Create modal dialogs with a trigger button:

```twig
<twig:K:Components:DialogTrigger dialogId="my-dialog" label="Open" />

<twig:K:Components:Dialog id="my-dialog" label="My Dialog">
  Dialog content here
</twig:K:Components:Dialog>
```

### Timer (Live Component)

Display a running timer that updates every second:

```twig
<twig:K:Components:Timer :startTime="timeEntry.startTime" />
```

### LiveEmitTrigger (Live Component)

Emit events to other Live Components:

```twig
<twig:K:Components:LiveEmitTrigger target="MyApp:MyComponent" action="save" />
```

## Documentation

See the [full documentation](docs/index.md) for detailed usage and options.

## Available Components

| Component | Type | Description |
|-----------|------|-------------|
| [Calendar](docs/components/Calendar.md) | Twig | Monthly calendar grid with customizable day content |
| [Dialog](docs/components/Dialog.md) | Twig | Native HTML dialog wrapper with Stimulus controller |
| [DialogTrigger](docs/components/DialogTrigger.md) | Twig | Button to open a Dialog component |
| [Timer](docs/components/Timer.md) | Live | Auto-updating duration timer |
| [LiveEmitTrigger](docs/components/LiveEmitTrigger.md) | Live | Button to emit events to Live Components |

## License

MIT
