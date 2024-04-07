<?php

declare(strict_types=1);

/*
 * This file is part of the PhpColor package.
 *
 * (c) Simon André & Raphaël Geffroy
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace PhpColor\Colors\Tailwind;

final class TailwindColors implements \IteratorAggregate, \Countable
{
    private static array $colors;

    private static function loadColors(): array
    {
        return self::$colors ??= require __DIR__.'/Resources/colors.php';
    }

    /**
     * @return array<string>
     */
    public function getColorNames(): array
    {
        return array_keys(self::loadColors());
    }

    /**
     * @return array<int, string> Index => Hex Color
     */
    public function getColorScale(string $color): array
    {
        return self::loadColors()[$color] ?? throw new \InvalidArgumentException(sprintf('The color "%s" does not exist.', $color));
    }

    public function getIterator(): \ArrayIterator
    {
        return new \RecursiveArrayIterator(self::loadColors());
    }

    public function count(): int
    {
        return count(self::loadColors(), COUNT_RECURSIVE);
    }
}
