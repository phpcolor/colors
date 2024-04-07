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
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PrimerColors::class)]
class PrimerColorsTest extends TestCase
{
    public function testCountColors(): void
    {
        $colors = new PrimerColors('light');

        self::assertCount(101, $colors);
    }
}
