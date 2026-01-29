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

namespace PhpColor\Colors\Tests\Dracula;

use PhpColor\Colors\Dracula\DraculaColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DraculaColors::class)]
class DraculaColorsTest extends TestCase
{
    public function testCount(): void
    {
        $colors = DraculaColors::colors();
        self::assertCount(11, $colors);
    }

    public function testGetColorNames(): void
    {
        $expected = [
            'background',
            'currentLine',
            'foreground',
            'comment',
            'cyan',
            'green',
            'orange',
            'pink',
            'purple',
            'red',
            'yellow',
        ];
        $colors = DraculaColors::colors();
        self::assertEquals($expected, $colors->getNames());
    }

    public function testIterator(): void
    {
        foreach (DraculaColors::colors() as $name => $color) {
            $this->assertEquals('background', $name);
            $this->assertEquals('#282A36', $color);
            break;
        }
    }

    public function testGetter(): void
    {
        $colors = DraculaColors::colors();

        self::assertTrue($colors->has('purple'));
        self::assertStringStartsWith('#', $colors->get('purple'));
        self::assertIsString($colors->purple);
        self::assertStringStartsWith('#', $colors->purple);
    }

    public function testGetUnknownColor(): void
    {
        $colors = DraculaColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testSetter(): void
    {
        $colors = DraculaColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
