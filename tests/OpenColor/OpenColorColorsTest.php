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

namespace PhpColor\Colors\Tests\OpenColor;

use PhpColor\Colors\OpenColor\OpenColorColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(OpenColorColors::class)]
class OpenColorColorsTest extends TestCase
{
    public function testGetColorNames(): void
    {
        $colors = OpenColorColors::colors();
        $colorNames = $colors->getNames();

        self::assertIsArray($colorNames);
        self::assertCount(15, $colorNames);
        self::assertContains('white', $colorNames);
        self::assertContains('black', $colorNames);
        self::assertContains('gray', $colorNames);
        self::assertContains('red', $colorNames);
    }

    public function testGetShades(): void
    {
        $colors = OpenColorColors::colors();
        $shades = $colors->getShades('gray');

        self::assertIsArray($shades);
        self::assertCount(10, $shades);
        self::assertContains(0, $shades);
        self::assertContains(9, $shades);
    }

    public function testCountColors(): void
    {
        $colors = OpenColorColors::colors();

        self::assertCount(145, $colors);
    }

    public function testHasColor(): void
    {
        $colors = OpenColorColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertTrue($colors->has('white'));
        self::assertFalse($colors->has('unknown'));
    }

    public function testGetColor(): void
    {
        $colors = OpenColorColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertStringStartsWith('#', $colors->get('red'));

        self::assertIsString($colors->red);
        self::assertStringStartsWith('#', $colors->red);
    }

    public function testGetColorWithShade(): void
    {
        $colors = OpenColorColors::colors();

        self::assertEquals('#FF6B6B', $colors->get('red', 5));
        self::assertEquals('#C92A2A', $colors->get('red', 9));
    }

    public function testGetWhiteBlack(): void
    {
        $colors = OpenColorColors::colors();

        self::assertEquals('#FFFFFF', $colors->get('white'));
        self::assertEquals('#000000', $colors->get('black'));
    }

    public function testGetUnknownColor(): void
    {
        $colors = OpenColorColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testGetUnknownShade(): void
    {
        $colors = OpenColorColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('gray', 100);
    }

    public function testIterator(): void
    {
        $colors = OpenColorColors::colors();
        foreach ($colors as $name => $color) {
            self::assertIsString($name);
            self::assertTrue(is_array($color) || is_string($color));
            break;
        }
    }

    public function testCallColor(): void
    {
        $colors = OpenColorColors::colors();

        self::assertSame($colors->get('red'), $colors->red);
        self::assertSame($colors->get('red'), $colors->red());
        self::assertSame($colors->get('red', 3), $colors->red(3));
    }

    public function testCallUnknownColor(): void
    {
        $colors = OpenColorColors::colors();
        self::expectException(\BadMethodCallException::class);
        /*
         * @phpstan-ignore-next-line
         */
        $colors->unknown();
    }

    public function testSetColor(): void
    {
        $colors = OpenColorColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
