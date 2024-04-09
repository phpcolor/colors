<h1 align="center">Primer Colors</h1>
<p align="center">This package provides access to the color palettes used in Primer CSS.</p>
<img src="Resources/colors.svg" alt="Primer Colors" width="100%">

## Installation

```bash
composer require phpcolor/primer-colors
```

## Usage

### Color themes

```php
use PhpColor\Colors\Primer\PrimerColors as Primer;

$colors = Primer::colors();
$colors = Primer::colors('light');

$colors = Primer::colors('dark');
```

### Color names

```php
use PhpColor\Colors\Primer\PrimerColors as Primer;

$colors = Primer::colors();

$names = $colors->getNames(); 
// 'gray', 'blue', 'green', 'yellow', 'orange',
// 'red', 'purple', 'pink', 'coral'
```

### Color shades

```php
use PhpColor\Colors\Primer\PrimerColors as Primer;

$colors = Primer::colors();

$shades = $colors->getShades(); 
// 0, 1, 2, 3, 4, 5, 6, 7, 8, 9
```

### Color values

```php
use PhpColor\Colors\Primer\PrimerColors as Primer;

$colors = Primer::colors();

echo $colors->coral;           // #C4432B       
echo $colors->coral();         // #C4432B
echo $colors->coral(5)         // #C4432B

echo $colors->get('coral');    // #C4432B
echo $colors->get('coral', 5); // #C4432B
```

---

![Primer Colors](Resources/colors.svg)

## Credits

The colors listed in this project are based on the colors used by [Primer](https://primer.style). 

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).





