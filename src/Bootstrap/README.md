# Bootstrap Colors

![Bootstrap Colors](bootstrap.svg)

This package provides access to the entire color palette used in Bootstrap. Below is a comprehensive list of all the colors available.

## Installation

```bash
composer require phpcolor/bootstrap-colors
```

## Usage


### Base colors

```php
use PhpColor\Colors\Bootstrap\BootstrapColors as Bootstrap;

$color = Bootstrap::blue();       // #007bff
$color = Bootstrap::indigo();     // #6610f2
$color = Bootstrap::purple();     // #6f42c1
$color = Bootstrap::pink();       // #dc3545
$color = Bootstrap::red();
$color = Bootstrap::orange();
$color = Bootstrap::yellow();
$color = Bootstrap::green();
$color = Bootstrap::teal();
$color = Bootstrap::cyan();
$color = Bootstrap::gray();
```

```php
use PhpColor\Colors\Bootstrap\BootstrapColors as Bootstrap;

foreach (Bootstrap::colors() as $name => $color) {
    echo $color . ' ' . $name . PHP_EOL;
}

// blue #007bff
// indigo #6610f2
// purple #6f42c1
// ...

```


### Tint & shades

```php
// ...

$color = Bootstrap::red();

// Color with opacity
$color = Bootstrap::red(100);
$color = Bootstrap::red(200);
// ...
$color = Bootstrap::red(800);
$color = Bootstrap::red(900);
```


```php
use PhpColor\Colors\Bootstrap\BootstrapColors as Bootstrap;

foreach (Bootstrap::colors($base) as $name => $color) {
    echo $color . ' ' . $name . PHP_EOL;
}
```


---

![Bootstrap Colors](bootstrap.svg)


## Credits

The colors listed in this project are based on the colors used by [Bootstrap](https://getbootstrap.com/). 

Bootstrap is an open-source project licensed under the MIT license.


## License

This library is released under the [MIT license](LICENSE).

