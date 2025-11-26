# Testing

This bundle includes a comprehensive test suite to ensure all components are properly registered and functional.

## Running Tests

```bash
vendor/bin/phpunit
```

## Test Coverage

The test suite includes:

1. **Bundle Registration Tests** - Verifies the bundle is properly registered in the Symfony kernel
2. **Component Factory Tests** - Ensures Twig Component services are available
3. **Component Creation Tests** - Tests that all components can be created using the `FRD:` namespace:
   - `FRD:Dialog`
   - `FRD:DialogTrigger`
   - `FRD:Calendar`

## Using Components in Your Application

### In Twig Templates

```twig
{# Use Dialog component #}
<twig:FRD:Dialog id="my-dialog" label="Welcome Dialog">
    <p>This is the dialog content.</p>
</twig:FRD:Dialog>

{# Use DialogTrigger component #}
<twig:FRD:DialogTrigger dialogId="my-dialog" label="Open Dialog" />

{# Use Calendar component #}
<twig:FRD:Calendar />
```

### With Component Props

```twig
{# Dialog with size #}
<twig:FRD:Dialog id="large-dialog" size="lg" label="Large Dialog">
    <p>This is a large dialog.</p>
</twig:FRD:Dialog>

{# DialogTrigger with icon #}
<twig:FRD:DialogTrigger
    dialogId="my-dialog"
    icon="🔔"
    label="Notifications"
/>
```

## Test Structure

- `/tests/TestKernel.php` - Minimal Symfony kernel for testing
- `/tests/BundleInitializationTest.php` - Bundle registration tests
- `/tests/Components/` - Individual component tests
  - `DialogTest.php`
  - `DialogTriggerTest.php`
  - `CalendarTest.php`

## Adding New Component Tests

When adding new components, create a test file in `/tests/Components/`:

```php
<?php

namespace Frd\ComponentsBundle\Tests\Components;

use Frd\ComponentsBundle\Tests\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\ComponentFactory;

class YourComponentTest extends KernelTestCase
{
    private ComponentFactory $factory;

    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->factory = $container->get('ux.twig_component.component_factory');
    }

    public function testYourComponentCanBeCreated(): void
    {
        $component = $this->factory->get('FRD:YourComponent');
        $this->assertNotNull($component);
    }
}
```
