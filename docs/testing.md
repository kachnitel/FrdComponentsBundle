# Testing

## Running Tests

```bash
# Run all tests
composer test

# Or directly with PHPUnit
vendor/bin/phpunit

# With verbose output
vendor/bin/phpunit --testdox
```

## Test Coverage

The test suite verifies:

- Bundle registration in Symfony kernel
- Twig Component factory availability
- All components can be instantiated via the `K:Components:` namespace

## Adding New Component Tests

Extend `ComponentTestCase` for new component tests:

```php
<?php

namespace Kachnitel\ComponentsBundle\Tests\Components;

class YourComponentTest extends ComponentTestCase
{
    public function testYourComponentCanBeCreated(): void
    {
        $component = $this->factory->get('K:Components:YourComponent');
        $this->assertInstanceOf(\App\Your\Component::class, $component);
    }

    public function testYourComponentWithProps(): void
    {
        $component = $this->factory->get('K:Components:YourComponent');
        $component->someProp = 'value';

        $this->assertEquals('value', $component->someProp);
    }
}
```

## Test Structure

```
tests/
├── TestKernel.php              # Minimal Symfony kernel
├── BundleInitializationTest.php # Bundle & service registration
└── Components/
    ├── ComponentTestCase.php    # Base class with factory setup
    ├── CalendarTest.php
    ├── DialogTest.php
    ├── DialogTriggerTest.php
    ├── TimerTest.php
    └── LiveEmitTriggerTest.php
```
