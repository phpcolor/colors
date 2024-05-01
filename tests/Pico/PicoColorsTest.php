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

namespace PhpColor\Colors\Tests\Pico;

use PhpColor\Colors\Pico\PicoColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PicoColors::class)]
class PicoColorsTest extends TestCase
{
    public function testGetColorNames(): void
    {
        $colors = PicoColors::colors();
        $colorNames = $colors->getNames();

        self::assertIsArray($colorNames);
        self::assertCount(20, $colorNames);
        self::assertContains('violet', $colorNames);
        self::assertContains('slate', $colorNames);
    }

    public function testGetShades(): void
    {
        $colors = PicoColors::colors();
        $shades = $colors->getShades('amber');

        self::assertIsArray($shades);
        self::assertCount(19, $shades);
        self::assertContains(50, $shades);
        self::assertContains(250, $shades);
        self::assertContains(950, $shades);
        self::assertNotContains(1000, $shades);
    }

    public function testCountColors(): void
    {
        $colors = PicoColors::colors();

        self::assertCount(380, $colors);
    }

    public function testHasColor(): void
    {
        $colors = PicoColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertFalse($colors->has('unknown'));
    }

    public function testGetColor(): void
    {
        $colors = PicoColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertStringStartsWith('#', $colors->get('red'));

        self::assertIsString($colors->red);
        self::assertStringStartsWith('#', $colors->red);
    }

    public function testGetUnknownColor(): void
    {
        $colors = PicoColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testGetUnknownShade(): void
    {
        $colors = PicoColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('gray', 1000);
    }

    public function testIterator(): void
    {
        $colors = PicoColors::colors();
        foreach ($colors as $name => $color) {
            self::assertIsString($name);
            self::assertIsArray($color);
            break;
        }
    }

    public function testCallColor(): void
    {
        $colors = PicoColors::colors();

        self::assertSame($colors->get('red'), $colors->red);
        self::assertSame($colors->get('red'), $colors->red());
        self::assertSame($colors->get('red', 300), $colors->red(300));
    }

    public function testCallUnknownColor(): void
    {
        $colors = PicoColors::colors();
        self::expectException(\BadMethodCallException::class);
        /*
         * @phpstan-ignore-next-line
         */
        $colors->unknown();
    }

    public function testSetColor(): void
    {
        $colors = PicoColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
