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

namespace PhpColor\Colors\Tests\Material;

use PhpColor\Colors\Material\MaterialColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MaterialColors::class)]
class MaterialColorsTest extends TestCase
{
    public function testGetColorNames(): void
    {
        $colors = MaterialColors::colors();
        $colorNames = $colors->getNames();

        self::assertIsArray($colorNames);
        self::assertCount(19, $colorNames);
        self::assertContains('red', $colorNames);
        self::assertContains('blue', $colorNames);
        self::assertContains('deepPurple', $colorNames);
    }

    public function testGetShades(): void
    {
        $colors = MaterialColors::colors();
        $shades = $colors->getShades('red');

        self::assertIsArray($shades);
        self::assertCount(14, $shades);
        self::assertContains(50, $shades);
        self::assertContains(500, $shades);
        self::assertContains(900, $shades);
        self::assertContains('A100', $shades);
        self::assertContains('A700', $shades);
    }

    public function testCountColors(): void
    {
        $colors = MaterialColors::colors();

        self::assertCount(273, $colors);
    }

    public function testHasColor(): void
    {
        $colors = MaterialColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertTrue($colors->has('deepOrange'));
        self::assertFalse($colors->has('unknown'));
    }

    public function testGetColor(): void
    {
        $colors = MaterialColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertStringStartsWith('#', $colors->get('red'));

        self::assertIsString($colors->red);
        self::assertStringStartsWith('#', $colors->red);
    }

    public function testGetColorWithNumericShade(): void
    {
        $colors = MaterialColors::colors();

        self::assertEquals('#F44336', $colors->get('red', 500));
        self::assertEquals('#B71C1C', $colors->get('red', 900));
        self::assertEquals('#FFEBEE', $colors->get('red', 50));
    }

    public function testGetColorWithAccentShade(): void
    {
        $colors = MaterialColors::colors();

        self::assertEquals('#FF8A80', $colors->get('red', 'A100'));
        self::assertEquals('#D50000', $colors->get('red', 'A700'));
    }

    public function testGetUnknownColor(): void
    {
        $colors = MaterialColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testGetUnknownShade(): void
    {
        $colors = MaterialColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('red', 1000);
    }

    public function testIterator(): void
    {
        $colors = MaterialColors::colors();
        foreach ($colors as $name => $color) {
            self::assertIsString($name);
            self::assertIsArray($color);
            break;
        }
    }

    public function testCallColor(): void
    {
        $colors = MaterialColors::colors();

        self::assertSame($colors->get('red'), $colors->red);
        self::assertSame($colors->get('red'), $colors->red());
        self::assertSame($colors->get('red', 300), $colors->red(300));
        self::assertSame($colors->get('red', 'A200'), $colors->red('A200'));
    }

    public function testCallUnknownColor(): void
    {
        $colors = MaterialColors::colors();
        self::expectException(\BadMethodCallException::class);
        /*
         * @phpstan-ignore-next-line
         */
        $colors->unknown();
    }

    public function testSetColor(): void
    {
        $colors = MaterialColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
