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

include 'vendor/autoload.php';

use PhpColor\Colors\Bootstrap\BootstrapColors;

$bootstrapColors = new BootstrapColors();

foreach (array_chunk($bootstrapColors->getBaseColors(), 3) as $chunk) {
    $iterator = new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);
    foreach ($chunk as $baseColor) {
        $iterator->attachIterator($bootstrapColors->getColors($baseColor), $baseColor);
    }

    foreach ($iterator as $foo => $colors) {
        foreach (array_combine($foo, $colors) as $name => $color) {
            echo '| '.$name.' | '.$color;
        }
        echo ' | '.PHP_EOL;
    }
}

//
// foreach ($colors as $name => $color) {
//     var_dump($name, $color);
// }
