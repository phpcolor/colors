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

namespace PhpColor\Colors\Primer;

/**
 * @method string blue(int $shade = 5)
 * @method string green(int $shade = 5)
 * @method string yellow(int $shade = 5)
 * @method string orange(int $shade = 5)
 * @method string red(int $shade = 5)
 * @method string purple(int $shade = 5)
 * @method string pink(int $shade = 5)
 * @method string coral(int $shade = 5)
 *
 * @implements \IteratorAggregate<string, array<int, string>>
 */
final class PrimerColors extends \stdClass implements \IteratorAggregate, \Countable
{
    /**
     * @return list<string>
     */
    public static function themes(): array
    {
        return ['light', 'dark'];
    }

    public static function colors(string $theme = 'light'): self
    {
        if (!in_array($theme, self::themes(), true)) {
            throw new \InvalidArgumentException(sprintf('The theme "%s" does not exist.', $theme));
        }

        return new self(require __DIR__.'/Resources/'.$theme.'.php');
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

    public function get(string $color, int $shade = 5): string
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
        return count($this->colors, COUNT_RECURSIVE);
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
        throw new \BadMethodCallException('PrimerColors are read-only.');
    }
}
