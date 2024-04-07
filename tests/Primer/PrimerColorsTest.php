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

namespace PhpColor\Colors\Tests\Primer;

use PhpColor\Colors\Primer\PrimerColors;
use PHPUnit\Framework\TestCase;

class PrimerColorsTest extends TestCase
{
    public function testGetIterator(): void
    {
        $colors = new PrimerColors();

        foreach ($colors as $name => $color) {
            var_dump($name, $color);
        }

        self::assertCount(10, $colors);
    }
}
