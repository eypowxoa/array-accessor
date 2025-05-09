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
        self::assertFlags(self::PARSED, $flags);

        return $this->getBoolOptional($key, $flags | self::NOTNULL | self::REQUIRED);
    }

    public function getBoolOptional(
        int|string $key,
        int $flags = 0,
    ): ?bool {
        self::assertFlags(self::NOTNULL | self::PARSED | self::REQUIRED, $flags);

        if (!$this->hasKey($key)) {
            $this->assertRequired($key, $flags);

            return null;
        }

        $value = $this->data[$key];

        if (null === $value) {
            $this->assertNotNull($key, $flags);

            return null;
        }

        $parsed = $this->parseBool($value, $flags);

        if (\is_bool($parsed)) {
            return $parsed;
        }

        if (!\is_bool($value)) {
            throw new WrongTypeException($this->getKeyPath($key), $value, 'bool');
        }

        return $value;
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
        self::assertFlags(self::PARSED, $flags);

        return $this->getFalseOptional($key, $flags | self::NOTNULL | self::REQUIRED);
    }

    public function getFalseOptional(
        int|string $key,
        int $flags = 0,
    ): ?false {
        self::assertFlags(self::NOTNULL | self::PARSED | self::REQUIRED, $flags);

        if (!$this->hasKey($key)) {
            $this->assertRequired($key, $flags);

            return null;
        }

        $value = $this->data[$key];

        if (null === $value) {
            $this->assertNotNull($key, $flags);

            return null;
        }

        $parsed = $this->parseBool($value, $flags);

        if (false === $parsed) {
            return false;
        }

        if (false !== $value) {
            throw new WrongTypeException($this->getKeyPath($key), $value, 'false');
        }

        return $value;
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
        if (!$this->hasKey($key)) {
            throw new MissingKeyException($this->getKeyPath($key));
        }

        $value = $this->data[$key];

        if (null !== $value) {
            throw new WrongTypeException($this->getKeyPath($key), $value, 'null');
        }

        return null;
    }

    public function getNullOptional(
        int|string $key,
        int $flags = 0,
    ): null {
        self::assertFlags(self::REQUIRED, $flags);

        if (!$this->hasKey($key)) {
            $this->assertRequired($key, $flags);

            return null;
        }

        $value = $this->data[$key];

        if (null !== $value) {
            throw new WrongTypeException($this->getKeyPath($key), $value, 'null');
        }

        return null;
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
        self::assertFlags(self::PARSED, $flags);

        return $this->getTrueOptional($key, $flags | self::NOTNULL | self::REQUIRED);
    }

    public function getTrueOptional(
        int|string $key,
        int $flags = 0,
    ): ?true {
        self::assertFlags(self::NOTNULL | self::PARSED | self::REQUIRED, $flags);

        if (!$this->hasKey($key)) {
            $this->assertRequired($key, $flags);

            return null;
        }

        $value = $this->data[$key];

        if (null === $value) {
            $this->assertNotNull($key, $flags);

            return null;
        }

        $parsed = $this->parseBool($value, $flags);

        if (true === $parsed) {
            return true;
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

    private function assertNotNull(int|string $key, int $flags): void
    {
        if (self::hasFlag(self::NOTNULL, $flags)) {
            throw new NullValueException($this->getKeyPath($key));
        }
    }

    private function assertRequired(int|string $key, int $flags): void
    {
        if (self::hasFlag(self::REQUIRED, $flags)) {
            throw new MissingKeyException($this->getKeyPath($key));
        }
    }

    private static function hasFlag(int $flag, int $mask): bool
    {
        return ($mask & $flag) !== 0;
    }

    private static function parseBool(mixed $value, int $flags): ?bool
    {
        if (!self::hasFlag(self::PARSED, $flags)) {
            return null;
        }

        if (0 === $value) {
            return false;
        }

        if (1 === $value) {
            return true;
        }

        if (\is_string($value)) {
            $parsed = filter_var($value, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);

            if (false === $parsed) {
                return false;
            }

            if (true === $parsed) {
                return true;
            }
        }

        return null;
    }
}
