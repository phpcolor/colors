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

namespace PhpColor\Colors\Primer;

class PrimerThemes implements \IteratorAggregate, \Countable
{
    public const string LIGHT = 'light';

    public const string DARK = 'dark';

    private const array THEMES = [
        self::DARK,
        self::LIGHT,
    ];

    public static function getThemes(): array
    {
        return self::THEMES;
    }
}
