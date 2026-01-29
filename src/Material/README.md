# Material Design Colors

This package provides access to the Material Design color palette, Google's design system colors.

## Installation

```bash
composer require phpcolor/material-colors
```

## Usage

### Create Colors Instance

```php
use PhpColor\Colors\Material\MaterialColors as Material;

$colors = Material::colors();
```

### Color Names

```php
use PhpColor\Colors\Material\MaterialColors as Material;

$colors = Material::colors();

$names = $colors->getNames();
// 'red', 'pink', 'purple', 'deepPurple', 'indigo', 'blue',
// 'lightBlue', 'cyan', 'teal', 'green', 'lightGreen', 'lime',
// 'yellow', 'amber', 'orange', 'deepOrange', 'brown', 'gray', 'blueGray'
```

### Color Shades

```php
use PhpColor\Colors\Material\MaterialColors as Material;

$colors = Material::colors();

// Get shades for a color (50, 100-900, A100, A200, A400, A700)
$shades = $colors->getShades('red');
// [50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 'A100', 'A200', 'A400', 'A700']
```

### Color Values

```php
use PhpColor\Colors\Material\MaterialColors as Material;

$colors = Material::colors();

// Default shade is 500
echo $colors->blue;                // #2196F3
echo $colors->blue();              // #2196F3

// Specify numeric shade (50, 100-900)
echo $colors->blue(700);           // #1976D2
echo $colors->get('red', 900);     // #B71C1C

// Specify accent shade (A100, A200, A400, A700)
echo $colors->red('A700');         // #D50000
echo $colors->get('blue', 'A200'); // #448AFF
```

## Credits

The colors listed in this project are based on [Material Design](https://material.io/design/color/).

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).
