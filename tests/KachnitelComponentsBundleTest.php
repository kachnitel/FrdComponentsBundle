<?php

declare(strict_types=1);

namespace Kachnitel\ComponentsBundle\Tests;

use Kachnitel\ComponentsBundle\KachnitelComponentsBundle;
use PHPUnit\Framework\TestCase;

class KachnitelComponentsBundleTest extends TestCase
{
    public function testGetPathReturnsCorrectDirectory(): void
    {
        $bundle = new KachnitelComponentsBundle();
        $path = $bundle->getPath();

        $this->assertDirectoryExists($path);
        $this->assertFileExists($path . '/src/KachnitelComponentsBundle.php');
    }
}
