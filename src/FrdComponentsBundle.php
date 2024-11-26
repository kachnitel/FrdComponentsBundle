<?php
namespace Frd\ComponentsBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class FrdComponentsBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
