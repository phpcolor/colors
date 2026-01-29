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

namespace PhpColor\Colors\Tests\Nord;

use PhpColor\Colors\Nord\NordColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(NordColors::class)]
class NordColorsTest extends TestCase
{
    public function testCount(): void
    {
        $colors = NordColors::colors();
        self::assertCount(16, $colors);
    }

    public function testGetColorNames(): void
    {
        $expected = [
            'nord0',
            'nord1',
            'nord2',
            'nord3',
            'nord4',
            'nord5',
            'nord6',
            'nord7',
            'nord8',
            'nord9',
            'nord10',
            'nord11',
            'nord12',
            'nord13',
            'nord14',
            'nord15',
        ];
        $colors = NordColors::colors();
        self::assertEquals($expected, $colors->getNames());
    }

    public function testIterator(): void
    {
        foreach (NordColors::colors() as $name => $color) {
            $this->assertEquals('nord0', $name);
            $this->assertEquals('#2E3440', $color);
            break;
        }
    }

    public function testGetter(): void
    {
        $colors = NordColors::colors();

        self::assertTrue($colors->has('nord10'));
        self::assertStringStartsWith('#', $colors->get('nord10'));
        self::assertIsString($colors->nord10);
        self::assertStringStartsWith('#', $colors->nord10);
    }

    public function testGetById(): void
    {
        $colors = NordColors::colors();

        self::assertEquals('#2E3440', $colors->id(0));
        self::assertEquals('#B48EAD', $colors->id(15));
    }

    public function testGetUnknownColor(): void
    {
        $colors = NordColors::colors();
        self::expectException(\InvalidArgumentException::class);
        $colors->get('unknown');
    }

    public function testSetter(): void
    {
        $colors = NordColors::colors();
        self::expectException(\BadMethodCallException::class);
        $colors->nord0 = '#FF0000';
    }
}
