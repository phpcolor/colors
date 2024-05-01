<?php

declare(strict_types=1);

/*
 * This file is part of the PHPColor library.
 *
 * (c) Simon André & Raphaël Geffroy
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace PhpColor\Colors\Pico;

/**
 * @method string red(int $shade = 500)
 * @method string pink(int $shade = 500)
 * @method string fuchsia(int $shade = 500)
 * @method string purple(int $shade = 500)
 * @method string violet(int $shade = 500)
 * @method string indigo(int $shade = 500)
 * @method string blue(int $shade = 500)
 * @method string azure(int $shade = 500)
 * @method string cyan(int $shade = 500)
 * @method string jade(int $shade = 500)
 * @method string green(int $shade = 500)
 * @method string lime(int $shade = 500)
 * @method string yellow(int $shade = 500)
 * @method string amber(int $shade = 500)
 * @method string pumpkin(int $shade = 500)
 * @method string orange(int $shade = 500)
 * @method string sand(int $shade = 500)
 * @method string grey(int $shade = 500)
 * @method string zinc(int $shade = 500)
 * @method string slate(int $shade = 500)
 *
 * @implements \IteratorAggregate<string, array<int, string>>
 */
final class PicoColors extends \stdClass implements \IteratorAggregate, \Countable
{
    public static function colors(): self
    {
        return new self(require __DIR__.'/Resources/colors.php');
    }

    /**
     * @param array<string, array<int, string>> $colors
     */
    private function __construct(private readonly array $colors)
    {
    }

    /**
     * @return list<string>
     */
    public function getNames(): array
    {
        return array_keys($this->colors);
    }

    /**
     * @return list<int>
     */
    public function getShades(?string $color = null): array
    {
        $color ??= $this->getNames()[0];

        return array_keys($this->colors[$color]);
    }

    public function get(string $color, int $shade = 500): string
    {
        if (!isset($this->colors[$color])) {
            throw new \InvalidArgumentException(sprintf('The color "%s" does not exist.', $color));
        }
        if (!isset($this->colors[$color][$shade])) {
            throw new \InvalidArgumentException(sprintf('The shade "%d" does not exist for the color "%s".', $shade, $color));
        }

        return $this->colors[$color][$shade];
    }

    public function has(string $name): bool
    {
        return \in_array($name, $this->getNames(), true);
    }

    public function count(): int
    {
        return count($this->colors, COUNT_RECURSIVE) - count($this->colors);
    }

    /**
     * @return \ArrayIterator<string, array<int, string>>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->colors);
    }

    /**
     * @param array<mixed> $arguments
     */
    public function __call(string $name, array $arguments): mixed
    {
        if (!$this->has($name)) {
            throw new \BadMethodCallException(sprintf('The method "%s" does not exist.', $name));
        }

        if (isset($arguments[0]) && !\is_int($arguments[0])) {
            throw new \InvalidArgumentException(sprintf('The first argument of "%s" must be an integer, "%s" given.', $name, get_debug_type($arguments[0])));
        }

        return $this->get($name, ...$arguments);
    }

    public function __get(string $name): string
    {
        return $this->get($name);
    }

    public function __set(string $name, mixed $value): void
    {
        throw new \BadMethodCallException('PicoColors are read-only.');
    }
}
