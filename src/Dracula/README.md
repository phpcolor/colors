# Dracula Colors

This package provides access to the Dracula color palette, a dark theme for code editors and terminal applications.

## Installation

```bash
composer require phpcolor/dracula-colors
```

## Usage

### Create Colors Instance

```php
use PhpColor\Colors\Dracula\DraculaColors as Dracula;

$colors = Dracula::colors();
```

### Color Names

```php
use PhpColor\Colors\Dracula\DraculaColors as Dracula;

$colors = Dracula::colors();

$names = $colors->getNames();
// 'background', 'currentLine', 'foreground', 'comment',
// 'cyan', 'green', 'orange', 'pink', 'purple', 'red', 'yellow'
```

### Color Values

```php
use PhpColor\Colors\Dracula\DraculaColors as Dracula;

$colors = Dracula::colors();

echo $colors->purple;             // #BD93F9
echo $colors->get('cyan');        // #8BE9FD
```

## Credits

The colors listed in this project are based on the [Dracula Theme](https://draculatheme.com/).

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).
