<?php

declare(strict_types=1);

/*
 * This file is part of the PhpColor package.
 *
 * (c) Simon André & Raphaël Geffroy
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace PhpColor\Colors\Tests\Bootstrap;

use PhpColor\Colors\Bootstrap\BootstrapColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BootstrapColors::class)]
class BootstrapColorsTest extends TestCase
{
    public function testCountColors(): void
    {
        $color = new BootstrapColors();

        self::assertCount(110, $color);
    }

    public function testGetColorNames(): void
    {
        $colorPalette = new BootstrapColors();
        $colorNames = $colorPalette->getColorNames();

        $this->assertIsArray($colorNames);
        $this->assertCount(11, $colorNames);
        $this->assertContains('red', $colorNames);
    }
}
