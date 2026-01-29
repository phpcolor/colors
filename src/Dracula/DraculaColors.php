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

namespace PhpColor\Colors\Dracula;

/**
 * @implements \IteratorAggregate<string, string>
 */
final class DraculaColors extends \stdClass implements \IteratorAggregate, \Countable
{
    public static function colors(): self
    {
        return new self(require __DIR__.'/Resources/colors.php');
    }

    /**
     * @param array<string, array{string, int[]}> $colors
     */
    private function __construct(private readonly array $colors)
    {
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->colors);
    }

    public function get(string $name): string
    {
        if (!$this->has($name)) {
            throw new \InvalidArgumentException(sprintf('The color "%s" does not exist.', $name));
        }

        return $this->colors[$name][0];
    }

    /**
     * @return list<string>
     */
    public function getNames(): array
    {
        return array_keys($this->colors);
    }

    /**
     * @return \ArrayIterator<string, string>
     */
    public function getIterator(): \Iterator
    {
        return new \ArrayIterator(array_map(fn ($a) => $a[0], $this->colors));
    }

    public function count(): int
    {
        return count($this->colors);
    }

    public function __get(string $name): string
    {
        return $this->get($name);
    }

    public function __set(string $name, mixed $value): void
    {
        throw new \BadMethodCallException('DraculaColors are read-only.');
    }
}
