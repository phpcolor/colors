<?php

declare(strict_types=1);

/*
 * This file is part of the PhpColor library.
 *
 * (c) Simon André & Raphaël Geffroy
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace PhpColor\Colors\Bootstrap;

class BootstrapColors implements \IteratorAggregate, \Countable
{
    public const string BLUE = 'blue';

    public const string INDIGO = 'indigo';

    public const string PURPLE = 'purple';

    public const string PINK = 'pink';

    public const string RED = 'red';

    public const string ORANGE = 'orange';

    public const string YELLOW = 'yellow';

    public const string GREEN = 'green';

    public const string TEAL = 'teal';

    public const string CYAN = 'cyan';

    public const string GRAY = 'gray';

    public static function getColorNames(): array
    {
        return [
            self::BLUE,
            self::INDIGO,
            self::PURPLE,
            self::PINK,
            self::RED,
            self::ORANGE,
            self::YELLOW,
            self::GREEN,
            self::TEAL,
            self::CYAN,
            self::GRAY,
        ];
    }

    private const array COLORS = [
        self::BLUE => [
            100 => '#cfe2ff',
            200 => '#9ec5fe',
            300 => '#6ea8fe',
            400 => '#3d8bfd',
            500 => '#0d6efd',
            600 => '#0a58ca',
            700 => '#084298',
            800 => '#052c65',
            900 => '#031633',
        ],
        self::INDIGO => [
            100 => '#e0cffc',
            200 => '#c29ffa',
            300 => '#a370f7',
            400 => '#8540f5',
            500 => '#6610f2',
            600 => '#520dc2',
            700 => '#3d0a91',
            800 => '#290661',
            900 => '#140330',
        ],
        self::PURPLE => [
            100 => '#e2d9f3',
            200 => '#c5b3e6',
            300 => '#a98eda',
            400 => '#8c68cd',
            500 => '#6f42c1',
            600 => '#59359a',
            700 => '#432874',
            800 => '#2c1a4d',
            900 => '#160d27',
        ],
        self::PINK => [
            100 => '#f7d6e6',
            200 => '#efadce',
            300 => '#e685b5',
            400 => '#de5c9d',
            500 => '#d63384',
            600 => '#ab296a',
            700 => '#801f4f',
            800 => '#561435',
            900 => '#2b0a1a',
        ],
        self::RED => [
            100 => '#f8d7da',
            200 => '#f1aeb5',
            300 => '#ea868f',
            400 => '#e35d6a',
            500 => '#dc3545',
            600 => '#b02a37',
            700 => '#842029',
            800 => '#58151c',
            900 => '#2c0b0e',
        ],
        self::ORANGE => [
            100 => '#ffe5d0',
            200 => '#fecba1',
            300 => '#feb272',
            400 => '#fd9843',
            500 => '#fd7e14',
            600 => '#ca6510',
            700 => '#984c0c',
            800 => '#653208',
            900 => '#331904',
        ],
        self::YELLOW => [
            100 => '#fff3cd',
            200 => '#ffe69c',
            300 => '#ffda6a',
            400 => '#ffcd39',
            500 => '#ffc107',
            600 => '#cc9a06',
            700 => '#997404',
            800 => '#664d03',
            900 => '#332701',
        ],
        self::GREEN => [
            100 => '#d1e7dd',
            200 => '#a3cfbb',
            300 => '#75b798',
            400 => '#479f76',
            500 => '#198754',
            600 => '#146c43',
            700 => '#0f5132',
            800 => '#0a3622',
            900 => '#051b11',
        ],
        self::TEAL => [
            100 => '#d2f4ea',
            200 => '#a6e9d5',
            300 => '#79dfc1',
            400 => '#4dd4ac',
            500 => '#20c997',
            600 => '#1aa179',
            700 => '#13795b',
            800 => '#0d503c',
            900 => '#06281e',
        ],
        self::CYAN => [
            100 => '#cff4fc',
            200 => '#9eeaf9',
            300 => '#6edff6',
            400 => '#3dd5f3',
            500 => '#0dcaf0',
            600 => '#0aa2c0',
            700 => '#087990',
            800 => '#055160',
            900 => '#032830',
        ],
        self::GRAY => [
            100 => '#f8f9fa',
            200 => '#e9ecef',
            300 => '#dee2e6',
            400 => '#ced4da',
            500 => '#adb5bd',
            600 => '#6c757d',
            700 => '#495057',
            800 => '#343a40',
            900 => '#212529',
        ],
//        'white' => '#ffffff',
//        'black' => '#000000',
    ];

    public static function blue(int $value = 500): string
    {
        return self::get('blue', $value);
    }

    public static function indigo(int $value = 500): string
    {
        return self::get('indigo', $value);
    }

    public function getColors(string $color): \Iterator
    {
        $colors = [];
        foreach (self::COLORS[$color] as $key => $colorValue) {
            $colors[$color.'-'.$key] = $colorValue;
        }

        return new \ArrayIterator($colors);
    }

    public function getColor(string $color, int $value = 500): string
    {
        return self::COLORS[$color][$value] ?? throw new \InvalidArgumentException(sprintf('Unknown color value "%s-%s"', $color, $value));
    }

    public function getIterator(): \Iterator
    {
        foreach (array_keys(self::COLORS) as $color) {
            yield from $this->getColors($color);
        }
    }

    public function count(): int
    {
        return count(self::COLORS, COUNT_RECURSIVE);
    }

    private static function get(string $color, int $value): string
    {
        return self::COLORS[$color][$value] ?? throw new \InvalidArgumentException(sprintf('Unknown color value "%s-%s"', $color, $value));
    }
}
