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

$bootstrap = new BootstrapColors();

$baseColors = $bootstrap->getBaseColors();

$size = count($baseColors);

echo '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100">';

foreach (array_values($baseColors) as $i => $baseColor) {
    echo sprintf('<rect x="%d" y="%d" width="%d" height="%d" fill="%s" />', $i * 10, 0, 10, 10, $bootstrap->getColor($baseColor));
    echo PHP_EOL;
}

echo '</svg>';
