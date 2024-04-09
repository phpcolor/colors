<h1 align="center">Bootstrap Colors</h1>
<p align="center">This package provides access to the color palettes used in Bootstrap interfaces.</p>
<img src="Resources/colors.svg" alt="Bootstrap Colors" width="100%">

## Installation

```bash
composer require phpcolor/bootstrap-colors
```

## Usage

### Color names

```php
use PhpColor\Colors\Apple\BootstrapColors as Bootstrap;

$colors = Bootstrap::colors();

$names = $colors->getNames(); 
// 'blue', 'indigo', 'purple', 'pink', 'red', 'orange'
// 'yellow', 'green', 'teal', 'cyan', 'gray'
```

### Color shades

```php
use PhpColor\Colors\Bootstrap\BootstrapColors as Bootstrap;

$colors = Bootstrap::colors();

$shades = $colors->getShades(); 
// 100,  200,  300,  400,  500,  600,  700,  800,  900
```

### Color values

```php
use PhpColor\Colors\Bootstrap\BootstrapColors as Bootstrap;

$colors = Bootstrap::colors();

echo $colors->teal;             // #14b8a6       
echo $colors->teal();           // #14b8a6
echo $colors->teal(500)         // #14b8a6

echo $colors->get('teal');      // #14b8a6
echo $colors->get('teal', 500); // #14b8a6
```

---

![Bootstrap Colors](Resources/colors.svg)

## Credits

The colors listed in this project are based on the colors used by [BootstrapCss](https://bootstrapcss.com). 

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).
