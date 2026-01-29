# Open Color

This package provides access to the Open Color palette, an open-source color scheme optimized for UI design.

## Installation

```bash
composer require phpcolor/open-color
```

## Usage

### Create Colors Instance

```php
use PhpColor\Colors\OpenColor\OpenColorColors as OpenColor;

$colors = OpenColor::colors();
```

### Color Names

```php
use PhpColor\Colors\OpenColor\OpenColorColors as OpenColor;

$colors = OpenColor::colors();

$names = $colors->getNames();
// 'white', 'black', 'gray', 'red', 'pink', 'grape',
// 'violet', 'indigo', 'blue', 'cyan', 'teal', 'green',
// 'lime', 'yellow', 'orange'
```

### Color Shades

```php
use PhpColor\Colors\OpenColor\OpenColorColors as OpenColor;

$colors = OpenColor::colors();

// Get shades for a color (0-9)
$shades = $colors->getShades('gray');
// [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
```

### Color Values

```php
use PhpColor\Colors\OpenColor\OpenColorColors as OpenColor;

$colors = OpenColor::colors();

// Default shade is 5
echo $colors->blue;                // #339AF0
echo $colors->blue();              // #339AF0

// Specify shade (0-9)
echo $colors->blue(7);             // #1C7ED6
echo $colors->get('red', 9);       // #C92A2A

// White and black have no shades
echo $colors->white;               // #FFFFFF
echo $colors->black;               // #000000
```

## Credits

The colors listed in this project are based on [Open Color](https://yeun.github.io/open-color/).

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).
