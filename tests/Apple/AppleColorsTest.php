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

namespace PhpColor\Colors\Tests\Apple;

use PhpColor\Colors\Apple\AppleColors;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(AppleColors::class)]
class AppleColorsTest extends TestCase
{
    #[DataProvider('provideColorPalettes')]
    public function testCount(callable $provider): void
    {
        $colors = $provider();
        self::assertCount(13, $colors);
    }

    #[DataProvider('provideColorPalettes')]
    public function testGetColorNames(callable $provider): void
    {
        $expected = [
            'red',
            'orange',
            'yellow',
            'green',
            'mint',
            'teal',
            'cyan',
            'blue',
            'indigo',
            'purple',
            'pink',
            'brown',
            'gray',
        ];
        /** @var AppleColors $colors */
        $colors = $provider();
        self::assertEquals($expected, $colors->getNames());
    }

    /**
     * @return iterable<array<callable>>
     */
    public static function provideColorPalettes(): iterable
    {
        return [
            [AppleColors::iOS(...)],
            [AppleColors::macOS(...)],
            [AppleColors::tvOS(...)],
            [AppleColors::visionOS(...)],
            [AppleColors::watchOS(...)],
        ];
    }

    public function testIterator(): void
    {
        foreach (AppleColors::iOS() as $name => $color) {
            $this->assertEquals('red', $name);
            $this->assertEquals('#FF3B30', $color);
            break;
        }
    }

    public function testGetter(): void
    {
        $colors = AppleColors::tvOS();

        self::assertTrue($colors->has('red'));
        self::assertStringStartsWith('#', $colors->get('red'));
        self::assertIsString($colors->red);
        self::assertStringStartsWith('#', $colors->red);
    }

    public function testSetter(): void
    {
        $colors = AppleColors::tvOS();
        self::expectException(\BadMethodCallException::class);
        $colors->red = '#FF0000';
    }
}
