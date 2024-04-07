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

namespace PhpColor\Colors\Primer;

/**
 * @implements \IteratorAggregate<string, string>
 */
final class PrimerColors implements \IteratorAggregate, \Countable
{
    public const string THEME_LIGHT = 'light';

    public const string THEME_DARK = 'dark';

    /**
     * @var array<string, array<int, string>>
     */
    private static array $themeColors = [];

    /**
     * @return string[]
     */
    public static function getThemes(): array
    {
        return [
            self::THEME_LIGHT,
            self::THEME_DARK,
        ];
    }

    public function __construct(private readonly string $theme)
    {
        if (!in_array($theme, self::getThemes())) {
            throw new \InvalidArgumentException(sprintf('The theme "%s" does not exist.', $theme));
        }
    }

    /**
     * @return array<string>
     */
    private function getColors(): array
    {
        return static::$themeColors[$this->theme] ??= require __DIR__.'/Resources/'.$this->theme.'.php';
    }

    /**
     * @return \ArrayIterator<string, string>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->getColors());
    }

    public function count(): int
    {
        return count($this->getColors(), COUNT_RECURSIVE);
    }
}
