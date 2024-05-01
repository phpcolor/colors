<h1 align="center">Pico Colors</h1>
<p align="center">This package provides access to the color palettes used in Pico CSS.</p>
<img src="Resources/colors.svg" alt="Pico Colors" width="100%">

## Installation

```bash
composer require phpcolor/pico-colors
```

## Usage

### Color names

```php
use PhpColor\Colors\Pico\PicoColors as Pico;

$colors = Pico::colors();

$names = $colors->getNames(); 
// 'red', 'pink', 'fuchsia', 'purple', 'violet', 'indigo'
// 'blue', 'azure', 'cyan', 'jade', 'green', 'lime', 'yellow',
// 'amber', 'pumpkin', 'orange', 'sand', 'gray', 'zinc' 
```

### Color shades

```php
use PhpColor\Colors\Pico\PicoColors as Pico;

$colors = Pico::colors();

$shades = $colors->getShades(); 
// 50, 100, 150, ... ,850, 900, 950
```

### Color values

```php
use PhpColor\Colors\Pico\PicoColors as Pico;

$colors = Pico::colors();

echo $colors->azure;             // #017fc0       
echo $colors->azure();           // #017fc0
echo $colors->azure(500)         // #017fc0

echo $colors->get('azure');      // #017fc0
echo $colors->get('azure', 500); // #017fc0
```

---

![Pico Colors](Resources/colors.svg)

## Credits

The colors listed in this project are based on the colors used by [Pico](https://picocss.com/). 

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).
