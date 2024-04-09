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

namespace PhpColor\Colors\Tests\Bootstrap;

use PhpColor\Colors\Bootstrap\BootstrapColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BootstrapColors::class)]
class BootstrapColorsTest extends TestCase
{
    public function testGetColorNames(): void
    {
        $colors = BootstrapColors::colors();
        $colorNames = $colors->getNames();

        self::assertIsArray($colorNames);
        self::assertCount(11, $colorNames);
        self::assertContains('indigo', $colorNames);
        self::assertContains('gray', $colorNames);
    }

    public function testGetShades(): void
    {
        $colors = BootstrapColors::colors();
        $shades = $colors->getShades('gray');

        self::assertIsArray($shades);
        self::assertCount(9, $shades);
        self::assertContains(100, $shades);
        self::assertContains(900, $shades);
        self::assertNotContains(950, $shades);
    }

    public function testCountColors(): void
    {
        $colors = BootstrapColors::colors();

        self::assertCount(110, $colors);
    }

    public function testHasColor(): void
    {
        $colors = BootstrapColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertFalse($colors->has('unknown'));
    }

    public function testGetColor(): void
    {
        $colors = BootstrapColors::colors();

        self::assertTrue($colors->has('red'));
        self::assertStringStartsWith('#', $colors->get('red'));

        self::assertIsString($colors->red);
        self::assertStringStartsWith('#', $colors->red);
    }

    public function testGetUnknownColor(): void
    {
        $colors = BootstrapColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testGetUnknownShade(): void
    {
        $colors = BootstrapColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('gray', 1000);
    }

    public function testIterator(): void
    {
        $colors = BootstrapColors::colors();
        foreach ($colors as $name => $color) {
            self::assertIsString($name);
            self::assertIsArray($color);
            break;
        }
    }

    public function testCallColor(): void
    {
        $colors = BootstrapColors::colors();

        self::assertSame($colors->get('red'), $colors->red);
        self::assertSame($colors->get('red'), $colors->red());
        self::assertSame($colors->get('red', 300), $colors->red(300));
    }

    public function testCallUnknownColor(): void
    {
        $colors = BootstrapColors::colors();
        self::expectException(\BadMethodCallException::class);
        /*
         * @phpstan-ignore-next-line
         */
        $colors->unknown();
    }

    public function testSetColor(): void
    {
        $colors = BootstrapColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
