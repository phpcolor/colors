<?php

declare(strict_types=1);

/*
 * This file is part of the PHPColor library.
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
        $colors = TailwindColors::colors();
        $colorNames = $colors->getNames();

        self::assertIsArray($colorNames);
        self::assertCount(22, $colorNames);
        self::assertContains('slate', $colorNames);
        self::assertContains('gray', $colorNames);
    }

    public function testGetShades(): void
    {
        $colors = TailwindColors::colors();
        $shades = $colors->getShades('gray');

        self::assertIsArray($shades);
        self::assertCount(11, $shades);
        self::assertContains(50, $shades);
        self::assertContains(900, $shades);
        self::assertContains(950, $shades);
    }

    public function testCountColors(): void
    {
        $colors = TailwindColors::colors();

        self::assertCount(264, $colors);
    }

    public function testHasColor(): void
    {
        $colors = TailwindColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertFalse($colors->has('unknown'));
    }

    public function testGetColor(): void
    {
        $colors = TailwindColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertStringStartsWith('#', $colors->get('red'));

        self::assertIsString($colors->red);
        self::assertStringStartsWith('#', $colors->red);
    }

    public function testGetUnknownColor(): void
    {
        $colors = TailwindColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testGetUnknownShade(): void
    {
        $colors = TailwindColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('gray', 1000);
    }

    public function testIterator(): void
    {
        $colors = TailwindColors::colors();
        foreach ($colors as $name => $color) {
            self::assertIsString($name);
            self::assertIsArray($color);
            break;
        }
    }

    public function testCallColor(): void
    {
        $colors = TailwindColors::colors();

        self::assertSame($colors->get('red'), $colors->red);
        self::assertSame($colors->get('red'), $colors->red());
        self::assertSame($colors->get('red', 300), $colors->red(300));
    }

    public function testCallUnknownColor(): void
    {
        $colors = TailwindColors::colors();
        self::expectException(\BadMethodCallException::class);
        /*
         * @phpstan-ignore-next-line
         */
        $colors->unknown();
    }

    public function testSetColor(): void
    {
        $colors = TailwindColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
