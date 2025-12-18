# Bundle Setup & Testing Guide

## Problem Analysis

The bundle had the following issues:
1. **No component registration** - Components were not registered with Symfony's service container
2. **Missing Twig namespace** - No `@FrdComponents` Twig namespace configured
3. **No component namespace** - Components couldn't be used with `FRD:ComponentName` syntax
4. **No tests** - Empty test directory with no verification

## Solutions Implemented

### 1. Component Registration ([src/FrdComponentsBundle.php](src/FrdComponentsBundle.php))
- Added `build()` method to register component services
- Configured `getPath()` to return bundle root directory
- Added Twig path configuration in `prependExtension()`

### 2. Component Classes Created ([src/Components/](src/Components/))
- `Dialog.php` - Modal dialog component with `#[AsTwigComponent('FRD:Dialog')]`
- `DialogTrigger.php` - Dialog trigger button with `#[AsTwigComponent('FRD:DialogTrigger')]`
- `Calendar.php` - Calendar component with `#[AsTwigComponent('FRD:Calendar')]`

### 3. Test Suite ([tests/](tests/))
- `TestKernel.php` - Minimal Symfony kernel for testing
- `BundleInitializationTest.php` - Verifies bundle and components are registered
- `Components/DialogTest.php` - Dialog component tests
- `Components/DialogTriggerTest.php` - DialogTrigger component tests
- `Components/CalendarTest.php` - Calendar component tests

### 4. PHPUnit Configuration
- [phpunit.xml.dist](phpunit.xml.dist) - PHPUnit configuration
- [composer.json](composer.json) - Added dev dependencies:
  - phpunit/phpunit
  - symfony/phpunit-bridge
  - symfony/browser-kit
  - symfony/css-selector
  - symfony/twig-bundle

## Running Tests

```bash
# Install dependencies
composer install

# Run tests
vendor/bin/phpunit

# Run with detailed output
vendor/bin/phpunit --testdox
```

## Test Results

```
✅ Bundle is registered
✅ Twig component service is available
✅ Twig is configured
✅ Components are registered
✅ Calendar component can be created
✅ Dialog component can be created
✅ Dialog with size
✅ Dialog with label
✅ DialogTrigger component can be created
✅ DialogTrigger with label
✅ DialogTrigger with icon
✅ Timer component can be created (Live Component)
✅ LiveEmitTrigger component can be created (Live Component)
✅ LiveEmitTrigger with target

Tests: 14, Assertions: 28 ✅
```

## Usage in Your Application

### Installation

Add to your `bundles.php`:
```php
return [
    // ...
    Frd\ComponentsBundle\FrdComponentsBundle::class => ['all' => true],
];
```

### Using Components with FRD: Namespace

```twig
{# Dialog Component #}
<twig:FRD:Dialog id="welcome-dialog" size="lg" label="Welcome!">
    <p>Welcome to our application!</p>

    {% block footer %}
        <button type="button">Close</button>
    {% endblock %}
</twig:FRD:Dialog>

{# DialogTrigger Component #}
<twig:FRD:DialogTrigger
    dialogId="welcome-dialog"
    icon="👋"
    label="Open Welcome Dialog"
/>

{# Calendar Component #}
<twig:FRD:Calendar />
```

### Component Props

#### FRD:Dialog
- `id` (required): Dialog element ID
- `size`: Dialog size ('sm', 'lg', 'xl')
- `label`: Dialog title
- `fullscreen`: Boolean or breakpoint string

#### FRD:DialogTrigger
- `dialogId` (required): ID of the dialog to trigger
- `icon`: Icon to display
- `label`: Button label text

#### FRD:Calendar
- (No props yet - template to be implemented)

## Architecture

```
FrdComponentsBundle/
├── src/
│   ├── Components/          # PHP Component classes
│   │   ├── Calendar.php
│   │   ├── Dialog.php
│   │   └── DialogTrigger.php
│   └── FrdComponentsBundle.php
├── templates/
│   └── components/          # Twig templates (registered as @FrdComponents)
│       ├── Calendar.html.twig
│       ├── Dialog.html.twig
│       └── DialogTrigger.html.twig
├── tests/
│   ├── Components/          # Component tests
│   ├── BundleInitializationTest.php
│   └── TestKernel.php
└── phpunit.xml.dist
```

## Key Implementation Details

1. **Component Namespace**: Components use the `FRD:` prefix via `#[AsTwigComponent('FRD:ComponentName')]` attribute
2. **Twig Namespace**: Templates are available under `@FrdComponents` namespace
3. **Autoconfiguration**: Components are automatically tagged and registered via `setAutoconfigured(true)`
4. **Stimulus Integration**: Components can use Stimulus controllers via `stimulus_controller()` function

