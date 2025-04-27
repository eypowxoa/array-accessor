<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor;

use Eypowxoa\ArrayAccessor\Exceptions\MissingKeyException;
use Eypowxoa\ArrayAccessor\Exceptions\NullValueException;
use Eypowxoa\ArrayAccessor\Exceptions\WrongTypeException;

final class ArrayAccessor implements ArrayAccessorInterface
{
    public function __construct(
        private readonly array $data,
        private readonly string $path = '',
    ) {}

    public function getAssociative(
        int|string $key
    ): ArrayAccessorInterface {
        throw new \LogicException('Not implemented');
    }

    public function getAssociativeOptional(
        int|string $key,
        int $flags = 0,
    ): ?ArrayAccessorInterface {
        throw new \LogicException('Not implemented');
    }

    public function getBool(
        int|string $key,
        int $flags = 0,
    ): bool {
        throw new \LogicException('Not implemented');
    }

    public function getBoolOptional(
        int|string $key,
        int $flags = 0,
    ): ?bool {
        throw new \LogicException('Not implemented');
    }

    public function getDate(
        int|string $key,
        int $flags = 0,
        string ...$formats,
    ): \DateTimeImmutable {
        throw new \LogicException('Not implemented');
    }

    public function getDateOptional(
        int|string $key,
        int $flags = 0,
        string ...$formats,
    ): ?\DateTimeImmutable {
        throw new \LogicException('Not implemented');
    }

    public function getEnum(
        int|string $key,
        string $class,
        int $flags = 0,
    ): object {
        throw new \LogicException('Not implemented');
    }

    public function getEnumOptional(
        int|string $key,
        string $class,
        int $flags = 0,
    ): ?object {
        throw new \LogicException('Not implemented');
    }

    public function getFalse(
        int|string $key,
        int $flags = 0,
    ): false {
        throw new \LogicException('Not implemented');
    }

    public function getFalseOptional(
        int|string $key,
        int $flags = 0,
    ): ?false {
        throw new \LogicException('Not implemented');
    }

    public function getFloat(
        int|string $key,
        int $flags = 0,
        float $minimum = -PHP_FLOAT_MAX,
        float $maximum = PHP_FLOAT_MAX,
    ): float {
        throw new \LogicException('Not implemented');
    }

    public function getFloatOptional(
        int|string $key,
        int $flags = 0,
        float $minimum = -PHP_FLOAT_MAX,
        float $maximum = PHP_FLOAT_MAX,
    ): ?float {
        throw new \LogicException('Not implemented');
    }

    public function getInstance(
        int|string $key,
        string $class,
    ): object {
        throw new \LogicException('Not implemented');
    }

    public function getInstanceOptional(
        int|string $key,
        string $class,
        int $flags = 0,
    ): ?object {
        throw new \LogicException('Not implemented');
    }

    public function getInt(
        int|string $key,
        int $flags = 0,
        int $minimum = PHP_INT_MIN,
        int $maximum = PHP_INT_MAX,
    ): int {
        throw new \LogicException('Not implemented');
    }

    public function getIntOptional(
        int|string $key,
        int $flags = 0,
        int $minimum = PHP_INT_MIN,
        int $maximum = PHP_INT_MAX,
    ): ?int {
        throw new \LogicException('Not implemented');
    }

    public function getKeyPath(int|string $key): string
    {
        $escaped = $key;

        if (\is_int($escaped)) {
            $escaped = \sprintf('%d', $escaped);
        }

        $escaped = strtr($escaped, [
            ' ' => '{s}',
            "\n" => '{n}',
            '{' => '{l}',
            '}' => '{r}',
        ]);

        if ('' === $escaped) {
            $escaped = '{e}';
        }

        if ('' === $this->path) {
            return $escaped;
        }

        return $this->path.'.'.$escaped;
    }

    public function getKeys(): array
    {
        throw new \LogicException('Not implemented');
    }

    public function getList(
        int|string $key
    ): ArrayAccessorInterface {
        throw new \LogicException('Not implemented');
    }

    public function getListOptional(
        int|string $key,
        int $flags = 0,
    ): ?ArrayAccessorInterface {
        throw new \LogicException('Not implemented');
    }

    public function getNull(
        int|string $key,
    ): null {
        throw new \LogicException('Not implemented');
    }

    public function getNullOptional(
        int|string $key,
        int $flags = 0,
    ): null {
        throw new \LogicException('Not implemented');
    }

    public function getString(
        int|string $key,
        int $flags = 0,
    ): string {
        throw new \LogicException('Not implemented');
    }

    public function getStringOptional(
        int|string $key,
        int $flags = 0,
    ): ?string {
        throw new \LogicException('Not implemented');
    }

    public function getTrue(
        int|string $key,
        int $flags = 0,
    ): true {
        throw new \LogicException('Not implemented');
    }

    public function getTrueOptional(
        int|string $key,
        int $flags = 0,
    ): ?true {
        self::assertFlags(self::NOTNULL | self::PARSED | self::REQUIRED, $flags);

        if (!$this->hasKey($key)) {
            if (self::hasFlag(self::REQUIRED, $flags)) {
                throw new MissingKeyException($this->getKeyPath($key));
            }

            return null;
        }

        $value = $this->data[$key];

        if (null === $value) {
            if (self::hasFlag(self::NOTNULL, $flags)) {
                throw new NullValueException($this->getKeyPath($key));
            }

            return null;
        }

        if (self::hasFlag(self::PARSED, $flags)) {
            if (1 === $value) {
                return true;
            }

            if (\is_string($value)) {
                $parsed = filter_var($value, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);

                if (true === $parsed) {
                    return true;
                }
            }
        }

        if (true !== $value) {
            throw new WrongTypeException($this->getKeyPath($key), $value, 'true');
        }

        return $value;
    }

    public function hasKey(int|string $key): bool
    {
        return \array_key_exists($key, $this->data);
    }

    public function isNull(int|string $key): bool
    {
        if (!$this->hasKey($key)) {
            throw new MissingKeyException($this->getKeyPath($key));
        }

        return null === $this->data[$key];
    }

    private static function assertFlags(int $flags, int $mask): void
    {
        if (($mask & ~$flags) !== 0) {
            throw new \InvalidArgumentException('Wrong flags.');
        }
    }

    private static function hasFlag(int $flag, int $mask): bool
    {
        return ($mask & $flag) !== 0;
    }
}
