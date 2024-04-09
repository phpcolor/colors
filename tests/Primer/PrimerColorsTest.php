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

namespace PhpColor\Colors\Tests\Primer;

use PhpColor\Colors\Primer\PrimerColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PrimerColors::class)]
class PrimerColorsTest extends TestCase
{
    public function testGetThemes(): void
    {
        $themes = PrimerColors::themes();

        self::assertIsArray($themes);
        self::assertCount(2, $themes);
        self::assertContains('light', $themes);
        self::assertContains('dark', $themes);
    }

    public function testGetColorNames(): void
    {
        $colors = PrimerColors::colors();
        $colorNames = $colors->getNames();

        self::assertIsArray($colorNames);
        self::assertCount(9, $colorNames);
        self::assertContains('coral', $colorNames);
        self::assertContains('gray', $colorNames);
    }

    public function testGetShades(): void
    {
        $colors = PrimerColors::colors();
        $shades = $colors->getShades('gray');

        self::assertIsArray($shades);
        self::assertCount(10, $shades);
        self::assertEquals(range(0, 9), $shades);
    }

    public function testCountColors(): void
    {
        $colors = PrimerColors::colors();

        self::assertCount(99, $colors);
    }

    public function testHasColor(): void
    {
        $colors = PrimerColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertFalse($colors->has('unknown'));
    }

    public function testGetColor(): void
    {
        $colors = PrimerColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertStringStartsWith('#', $colors->get('red'));

        self::assertIsString($colors->red);
        self::assertStringStartsWith('#', $colors->red);
    }

    public function testGetUnknownColor(): void
    {
        $colors = PrimerColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testGetUnknownShade(): void
    {
        $colors = PrimerColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('gray', 1000);
    }

    public function testIterator(): void
    {
        $colors = PrimerColors::colors();
        foreach ($colors as $name => $color) {
            self::assertIsString($name);
            self::assertIsArray($color);
            break;
        }
    }

    public function testCallColor(): void
    {
        $colors = PrimerColors::colors();

        self::assertSame($colors->get('red'), $colors->red);
        self::assertSame($colors->get('red'), $colors->red());
        self::assertSame($colors->get('red', 3), $colors->red(3));
    }

    public function testCallUnknownColor(): void
    {
        $colors = PrimerColors::colors();
        self::expectException(\BadMethodCallException::class);
        /*
         * @phpstan-ignore-next-line
         */
        $colors->unknown();
    }

    public function testSetColor(): void
    {
        $colors = PrimerColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
