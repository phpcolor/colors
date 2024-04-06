<?php

namespace PhpColor\Colors\Tests\Bootstrap;

use PhpColor\Colors\Bootstrap\BootstrapColors;
use PHPUnit\Framework\TestCase;

class BootstrapColorsTest extends TestCase
{

    public function testGetIterator(): void
    {
        $colors = new BootstrapColors();

        foreach ($colors as $name => $color) {
            var_dump($name, $color);
        }

        self::assertCount(10, $colors);
    }

}
