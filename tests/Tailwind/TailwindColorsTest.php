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

namespace PhpColor\Colors\Tests\Tailwind;

use PhpColor\Colors\Tailwind\TailwindColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TailwindColors::class)]
class TailwindColorsTest extends TestCase
{
    public function testGetColorNames(): void
    {
        $colorPalette = new TailwindColors();
        $colorNames = $colorPalette->getColorNames();

        $this->assertIsArray($colorNames);
        $this->assertCount(22, $colorNames);
        $this->assertContains('Slate', $colorNames);
        $this->assertContains('Gray', $colorNames);
    }

    public function testCountColors(): void
    {
        $colors = new TailwindColors();

        self::assertCount(264, $colors);
    }
}
