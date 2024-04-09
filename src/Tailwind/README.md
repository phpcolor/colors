<h1 align="center">Tailwind Colors</h1>
<p align="center">This package provides access to the color palettes used in Tailwind interfaces.</p>
<img src="Resources/colors.svg" alt="Tailwind Colors" width="100%">

## Installation

```bash
composer require phpcolor/tailwind-colors
```

## Usage

### Color names

```php
use PhpColor\Colors\Tailwind\TailwindColors as Tailwind;

$colors = Tailwind::colors();

$names = $colors->getNames(); 
// 'gray', 'red', 'yellow', 'green', 'blue', 'indigo', 'purple',
// 'pink', 'teal', 'orange', 'cyan', 'white', 'black'
```

### Color shades

```php
use PhpColor\Colors\Tailwind\TailwindColors as Tailwind;

$colors = Tailwind::colors();

$shades = $colors->getShades(); 
// 50,  100,  200,  300,  400,  500,  600,  700,  800,  900,  950
```

### Color values

```php
use PhpColor\Colors\Tailwind\TailwindColors as Tailwind;

$colors = Tailwind::colors();

echo $colors->teal;             // #14b8a6       
echo $colors->teal();           // #14b8a6
echo $colors->teal(500)         // #14b8a6

echo $colors->get('teal');      // #14b8a6
echo $colors->get('teal', 500); // #14b8a6
```

---

![Tailwind Colors](Resources/colors.svg)

## Credits

The colors listed in this project are based on the colors used by [TailwindCss](https://tailwindcss.com). 

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).
