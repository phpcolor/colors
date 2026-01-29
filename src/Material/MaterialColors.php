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

namespace PhpColor\Colors\Material;

/**
 * @method string red(int|string $shade = 500)
 * @method string pink(int|string $shade = 500)
 * @method string purple(int|string $shade = 500)
 * @method string deepPurple(int|string $shade = 500)
 * @method string indigo(int|string $shade = 500)
 * @method string blue(int|string $shade = 500)
 * @method string lightBlue(int|string $shade = 500)
 * @method string cyan(int|string $shade = 500)
 * @method string teal(int|string $shade = 500)
 * @method string green(int|string $shade = 500)
 * @method string lightGreen(int|string $shade = 500)
 * @method string lime(int|string $shade = 500)
 * @method string yellow(int|string $shade = 500)
 * @method string amber(int|string $shade = 500)
 * @method string orange(int|string $shade = 500)
 * @method string deepOrange(int|string $shade = 500)
 * @method string brown(int|string $shade = 500)
 * @method string gray(int|string $shade = 500)
 * @method string blueGray(int|string $shade = 500)
 *
 * @implements \IteratorAggregate<string, array<int|string, string>>
 */
final class MaterialColors extends \stdClass implements \IteratorAggregate, \Countable
{
    public static function colors(): self
    {
        return new self(require __DIR__.'/Resources/colors.php');
    }

    /**
     * @param array<string, array<int|string, string>> $colors
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
     * @return list<int|string>
     */
    public function getShades(?string $color = null): array
    {
        $color ??= $this->getNames()[0];

        return array_keys($this->colors[$color]);
    }

    public function get(string $color, int|string $shade = 500): string
    {
        if (!isset($this->colors[$color])) {
            throw new \InvalidArgumentException(sprintf('The color "%s" does not exist.', $color));
        }
        if (!isset($this->colors[$color][$shade])) {
            throw new \InvalidArgumentException(sprintf('The shade "%s" does not exist for the color "%s".', $shade, $color));
        }

        return $this->colors[$color][$shade];
    }

    public function has(string $name): bool
    {
        return \in_array($name, $this->getNames(), true);
    }

    public function count(): int
    {
        return count($this->colors, COUNT_RECURSIVE);
    }

    /**
     * @return \ArrayIterator<string, array<int|string, string>>
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

        if (isset($arguments[0]) && !\is_int($arguments[0]) && !\is_string($arguments[0])) {
            throw new \InvalidArgumentException(sprintf('The first argument of "%s" must be an integer or string, "%s" given.', $name, get_debug_type($arguments[0])));
        }

        return $this->get($name, ...$arguments);
    }

    public function __get(string $name): string
    {
        return $this->get($name);
    }

    public function __set(string $name, mixed $value): void
    {
        throw new \BadMethodCallException('MaterialColors are read-only.');
    }
}
