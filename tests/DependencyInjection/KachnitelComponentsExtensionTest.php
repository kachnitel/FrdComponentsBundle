<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests\DependencyInjection;

use Kachnitel\ComponentsBundle\DependencyInjection\KachnitelComponentsExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class KachnitelComponentsExtensionTest extends TestCase
{
    public function testLoadRegistersServices(): void
    {
        $container = new ContainerBuilder();
        $extension = new KachnitelComponentsExtension();

        $extension->load([], $container);

        // Verify that services were loaded (container has definitions)
        $this->assertGreaterThan(0, count($container->getDefinitions()));
    }

    public function testPrependConfiguresTwigComponent(): void
    {
        $container = new ContainerBuilder();
        $extension = new KachnitelComponentsExtension();

        $extension->prepend($container);

        $config = $container->getExtensionConfig('twig_component');
        $this->assertNotEmpty($config);
        $this->assertEquals('components/', $config[0]['anonymous_template_directory']);
        $this->assertArrayHasKey('defaults', $config[0]);
        $this->assertArrayHasKey('Kachnitel\\ComponentsBundle\\Components\\', $config[0]['defaults']);
        $this->assertEquals('@K/Components/', $config[0]['defaults']['Kachnitel\\ComponentsBundle\\Components\\']);
    }
}
