<h1 align="center">Primer Colors</h1>
<p align="center">This package provides access to the entire color palette and color scales used in Github Primer.</p>

![Primer Colors](Resources/colors.svg)

<p align="center">
<a href="http://unlicense.org/"><img src="https://img.shields.io/github/license/phpcolor/phpcolor?label=License&color=blue" alt="License: MIT"></a>
&nbsp;
<a href="http://unlicense.org/"><img src="https://img.shields.io/github/license/phpcolor/phpcolor?label=License&color=blue" alt="License: MIT"></a>
&nbsp;
<a href="http://unlicense.org/"><img src="https://img.shields.io/github/license/phpcolor/phpcolor?label=License&color=blue" alt="License: MIT"></a>
</p>


## Installation

```bash
composer require phpcolor/primer-colors
```

## Usage


### Base colors

```php
use PhpColor\Colors\Primer\PrimerColors as Primer;

$color = Primer::gray();
$color = Primer::blue();       // TODO
$color = Primer::green();
$color = Primer::yellow();
$color = Primer::orange();
$color = Primer::red();
$color = Primer::purple();     // TODO
$color = Primer::pink();       // TODO
$color = Primer::coral();
```

```php
use PhpColor\Colors\Primer\PrimerColors as Primer;

foreach (Primer::colors() as $name => $color) {
    echo $color . ' ' . $name . PHP_EOL;
}

// blue #007bff
// indigo #6610f2
// purple #6f42c1
// ...

```


### Color Scales

```php
// ...
$color = Primer::red(1);
$color = Primer::red(2);
// ...
$color = Primer::red(8);
$color = Primer::red(9);
```


```php
use PhpColor\Colors\Primer\PrimerColors as Primer;

foreach (Primer::colors($base) as $name => $color) {
    echo $color . ' ' . $name . PHP_EOL;
}
```


---

![Primer Colors](Resources/colors.svg)


## Credits

The colors listed in this project are based on the colors used by [Primer](https://primer.style). 


## License

This library is released under the [MIT license](LICENSE).

