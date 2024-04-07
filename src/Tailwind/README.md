<h1 align="center">Tailwind Colors</h1>
<p align="center">This package provides access to the color palettes used in Tailwind interfaces.</p>
<img src="Resources/colors.svg" alt="Tailwind Colors" width="100%">

## Installation

```bash
composer require phpcolor/tailwind-colors
```

## Usage


### Base colors

```php
use PhpColor\Colors\Tailwind\TailwindColors as Tailwind;

$color = Tailwind::gray();       // #f7fafc
$color = Tailwind::red();        // #fef2f2
$color = Tailwind::yellow();     // #fffbeb
$color = Tailwind::green();      // #f0fff4
$color = Tailwind::blue();       // #ebf8ff
$color = Tailwind::indigo();     // #ebf4ff
$color = Tailwind::purple();     // #faf5ff
$color = Tailwind::pink();       // #fff5f7
$color = Tailwind::teal();       // #e6fffa
$color = Tailwind::orange();     // #fffaf0
$color = Tailwind::cyan();       // #ebf8ff
$color = Tailwind::white();      // #ffffff
$color = Tailwind::black();      // #000000

foreach (Tailwind::colors() as $color) {
    echo $color . ' ' . $name . PHP_EOL;
}
// gray #f7fafc
// red #fef2f2
// yellow #fffbeb
// ...
```

### Color scales

```php
use PhpColor\Colors\Tailwind\TailwindColors as Tailwind;

$color = Tailwind::blue(50);     
$color = Tailwind::blue(100);     
$color = Tailwind::blue(200);     
$color = Tailwind::blue(300);     
$color = Tailwind::blue(400);     
$color = Tailwind::blue(500);     
$color = Tailwind::blue(600);     
$color = Tailwind::blue(700);
$color = Tailwind::blue(800);
$color = Tailwind::blue(900);
$color = Tailwind::blue(950);

foreach (Tailwind::colors('blue') as $color => $value) {
    echo $color . ' ' . $value . PHP_EOL;
}
// blue-50   #ebf8ff
// blue-100  #bee3f8
// blue-200  #90cdf4
// ...
```

### Color values

```php
use PhpColor\Colors\Tailwind\TailwindColors as Tailwind;

$color = Tailwind::gray(500);       
$color = Tailwind::color('gray');

$color = Tailwind::gray(200);
$color = Tailwind::color('gray', 200);
```


---

![Tailwind Colors](Resources/colors.svg)


## Credits

The colors listed in this project are based on the colors used by [TailwindCss](https://tailwindcss.com). 


## License

This library is released under the [MIT license](LICENSE).
