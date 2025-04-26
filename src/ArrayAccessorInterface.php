<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor;

use DateTimeImmutable;
use Eypowxoa\ArrayAccessor\Exceptions\EmptyValueException;
use Eypowxoa\ArrayAccessor\Exceptions\MissingKeyException;
use Eypowxoa\ArrayAccessor\Exceptions\NullValueException;
use Eypowxoa\ArrayAccessor\Exceptions\OutsideRangeException;
use Eypowxoa\ArrayAccessor\Exceptions\WrongTypeException;

/**
 * Typed getters to PHP arrays.
 */
interface ArrayAccessorInterface
{
    /**
     * Check for empty value.
     */
    public const FILLED = 1;

    /**
     * Value must not be null.
     */
    public const NOTNULL = 8;

    /**
     * Value should be retrieved from a string with the filter_var function.
     */
    public const PARSED = 32;

    /**
     * The key must exist.
     */
    public const REQUIRED = 4;

    /**
     * Apply trim function.
     */
    public const TRIMMED = 2;

    /**
     * Associative array field of the source array.
     *
     * @param int|string $key key of the source array
     *
     * @return ArrayAccessorInterface value for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when value is not an associative array
     */
    public function getAssociative(
        int|string $key,
    ): self;

    /**
     * Associative array field of the source array or null.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants NOTNULL, REQUIRED
     *
     * @return ?ArrayAccessorInterface value for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when value is not an associative array
     */
    public function getAssociativeOptional(
        int|string $key,
        int $flags = 0,
    ): ?self;

    /**
     * Boolean field of the source array.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants PARSED
     *
     * @return bool value for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a bool or flag PARSED is set and value is not a string that contains bool
     */
    public function getBool(
        int|string $key,
        int $flags = 0,
    ): bool;

    /**
     * Boolean field of the source array or null.
     *
     * Returns null in these cases:
     * - flag REQUIRED is not set and no such key in the source array
     * - flag NOTNULL is not set and value is null
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants NOTNULL, PARSED, REQUIRED
     *
     * @return ?bool value for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a bool or flag PARSED is set and value is not a string that contains bool
     */
    public function getBoolOptional(
        int|string $key,
        int $flags = 0,
    ): ?bool;

    /**
     * Date field of the source array.
     *
     * @param int|string $key     key of the source array
     * @param int        $flags   bit mask of constants PARSED
     * @param string[]   $formats allowed date formats for DateTimeImmutable::createFromFormat function
     *
     * @return \DateTimeImmutable value for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a DateTimeInterface or flag PARSED is set and value is not a string in specified formats
     */
    public function getDate(
        int|string $key,
        int $flags = 0,
        string ...$formats,
    ): \DateTimeImmutable;

    /**
     * Date field of the source array or null.
     *
     * @param int|string $key     key of the source array
     * @param int        $flags   bit mask of constants NOTNULL, PARSED, REQUIRED
     * @param string[]   $formats allowed date formats for DateTimeImmutable::createFromFormat function
     *
     * @return ?\DateTimeImmutable value for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a DateTimeInterface or flag PARSED is set and value is not a string in specified formats
     */
    public function getDateOptional(
        int|string $key,
        int $flags = 0,
        string ...$formats,
    ): ?\DateTimeImmutable;

    /**
     * Enum field of the source array.
     *
     * Use PARSED flag to get backed enum case by scalar value.
     *
     * @template T
     *
     * @param int|string      $key   key of the source array
     * @param class-string<T> $class enum FQCN
     * @param int             $flags bit mask of constants PARSED
     *
     * @return T enum case for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when value is not a case of specified enum
     */
    public function getEnum(
        int|string $key,
        string $class,
        int $flags = 0,
    ): object;

    /**
     * Enum field of the source array or null.
     *
     * Use PARSED flag to get backed enum case by scalar value.
     *
     * @template T
     *
     * @param int|string      $key   key of the source array
     * @param class-string<T> $class enum FQCN
     * @param int             $flags bit mask of constants NOTNULL, PARSED, REQUIRED
     *
     * @return ?T enum case for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when value is not a case of specified enum
     */
    public function getEnumOptional(
        int|string $key,
        string $class,
        int $flags = 0,
    ): ?object;

    /**
     * False field of the source array.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants PARSED
     *
     * @return false value for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a false or flag PARSED is set and value is not a string that contains false
     */
    public function getFalse(
        int|string $key,
        int $flags = 0,
    ): false;

    /**
     * False field of the source array or null.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants NOTNULL, PARSED, REQUIRED
     *
     * @return ?false value for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a false or flag PARSED is set and value is not a string that contains false
     */
    public function getFalseOptional(
        int|string $key,
        int $flags = 0,
    ): ?false;

    /**
     * Float field of the source array.
     *
     * @param int|string $key     key of the source array
     * @param int        $flags   bit mask of constants PARSED
     * @param float      $minimum minimal allowed value
     * @param float      $maximum maximal allowed value
     *
     * @return float value for specified key
     *
     * @throws MissingKeyException   when no such key in the source array
     * @throws NullValueException    when value is null
     * @throws OutsideRangeException when value is outside of [minimum, maximum] range
     * @throws WrongTypeException    when flag PARSED is not set and value is not a float or integer or flag PARSED is set and value is not a string that contains float or integer
     */
    public function getFloat(
        int|string $key,
        int $flags = 0,
        float $minimum = -PHP_FLOAT_MAX,
        float $maximum = PHP_FLOAT_MAX,
    ): float;

    /**
     * Float field of the source array or null.
     *
     * Returns null in these cases:
     * - flag REQUIRED is not set and no such key in the source array
     * - flag NOTNULL is not set and value is null
     *
     * @param int|string $key     key of the source array
     * @param int        $flags   bit mask of constants NOTNULL, PARSED, REQUIRED
     * @param float      $minimum minimal allowed value
     * @param float      $maximum maximal allowed value
     *
     * @return ?float value for specified key
     *
     * @throws MissingKeyException   when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException    when flag NOTNULL is set and value is null
     * @throws OutsideRangeException when value is outside of [minimum, maximum] range
     * @throws WrongTypeException    when flag PARSED is not set and value is not a float or integer or flag PARSED is set and value is not a string that contains float or integer
     */
    public function getFloatOptional(
        int|string $key,
        int $flags = 0,
        float $minimum = -PHP_FLOAT_MAX,
        float $maximum = PHP_FLOAT_MAX,
    ): ?float;

    /**
     * Object field of the source array.
     *
     * @template T
     *
     * @param int|string      $key   key of the source array
     * @param class-string<T> $class value FQCN
     *
     * @return T value for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when value is not an instance of specified type
     */
    public function getInstance(
        int|string $key,
        string $class,
    ): object;

    /**
     * Object field of the source array or null.
     *
     * @template T
     *
     * @param int|string      $key   key of the source array
     * @param class-string<T> $class value FQCN
     * @param int             $flags bit mask of constants NOTNULL, REQUIRED
     *
     * @return ?T value for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when value is not an instance of specified type
     */
    public function getInstanceOptional(
        int|string $key,
        string $class,
        int $flags = 0,
    ): ?object;

    /**
     * Integer field of the source array.
     *
     * @param int|string $key     key of the source array
     * @param int        $flags   bit mask of constants PARSED
     * @param int        $minimum minimal allowed value
     * @param int        $maximum maximal allowed value
     *
     * @return int value for specified key
     *
     * @throws MissingKeyException   when no such key in the source array
     * @throws NullValueException    when value is null
     * @throws OutsideRangeException when value is outside of [minimum, maximum] range
     * @throws WrongTypeException    when flag PARSED is not set and value is not an integer or flag PARSED is set and value is not a string that contains integer
     */
    public function getInt(
        int|string $key,
        int $flags = 0,
        int $minimum = PHP_INT_MIN,
        int $maximum = PHP_INT_MAX,
    ): int;

    /**
     * Integer field of the source array or null.
     *
     * Returns null in these cases:
     * - flag REQUIRED is not set and no such key in the source array
     * - flag NOTNULL is not set and value is null
     *
     * @param int|string $key     key of the source array
     * @param int        $flags   bit mask of constants NOTNULL, PARSED, REQUIRED
     * @param int        $minimum minimal allowed value
     * @param int        $maximum maximal allowed value
     *
     * @return ?int value for specified key
     *
     * @throws MissingKeyException   when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException    when flag NOTNULL is set and value is null
     * @throws OutsideRangeException when value is outside of [minimum, maximum] range
     * @throws WrongTypeException    when flag PARSED is not set and value is not an integer or flag PARSED is set and value is not a string that contains integer
     */
    public function getIntOptional(
        int|string $key,
        int $flags = 0,
        int $minimum = PHP_INT_MIN,
        int $maximum = PHP_INT_MAX,
    ): ?int;

    /**
     * Keys of the source array.
     *
     * @return (int|string)[] list of keys
     */
    public function getKeys(): array;

    /**
     * Indexed list field of the source array.
     *
     * @param int|string $key key of the source array
     *
     * @return ArrayAccessorInterface value for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when value is not an indexed list
     */
    public function getList(
        int|string $key,
    ): self;

    /**
     * Indexed list field of the source array or null.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants NOTNULL, REQUIRED
     *
     * @return ?ArrayAccessorInterface value for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when value is not an indexed list
     */
    public function getListOptional(
        int|string $key,
        int $flags = 0,
    ): ?self;

    /**
     * Null field of the source array.
     *
     * @param int|string $key key of the source array
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws WrongTypeException  when value is not a null
     */
    public function getNull(
        int|string $key,
    ): null;

    /**
     * Null field of the source array.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants REQUIRED
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws WrongTypeException  when value is not a null
     */
    public function getNullOptional(
        int|string $key,
        int $flags = 0,
    ): null;

    /**
     * String field of the source array.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants FILLED, TRIMMED
     *
     * @return string value for specified key, with stripped spaces at beginning and end if flag TRIMMED is set
     *
     * @throws EmptyValueException when flag FILLED is set and value is empty string or flags FILLED and TRIMMED is set and value contains only spaces
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when value is not a string
     */
    public function getString(
        int|string $key,
        int $flags = 0,
    ): string;

    /**
     * String field of the source array or null.
     *
     * Returns null in these cases:
     * - flag FILLED is set and value is empty string
     * - flags FILLED and TRIMMED is set and value contains only spaces
     * - flag REQUIRED is not set and no such key in the source array
     * - flag NOTNULL is not set and value is null
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants FILLED, NOTNULL, REQUIRED, TRIMMED
     *
     * @return ?string value for specified key, with stripped spaces at beginning and end if flag TRIMMED is set
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when value is not a string
     */
    public function getStringOptional(
        int|string $key,
        int $flags = 0,
    ): ?string;

    /**
     * True field of the source array.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants PARSED
     *
     * @return true value for specified key
     *
     * @throws MissingKeyException when no such key in the source array
     * @throws NullValueException  when value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a true or flag PARSED is set and value is not a string that contains true
     */
    public function getTrue(
        int|string $key,
        int $flags = 0,
    ): true;

    /**
     * True field of the source array or null.
     *
     * @param int|string $key   key of the source array
     * @param int        $flags bit mask of constants NOTNULL, PARSED, REQUIRED
     *
     * @return ?true value for specified key
     *
     * @throws MissingKeyException when flag REQUIRED is set and no such key in the source array
     * @throws NullValueException  when flag NOTNULL is set and value is null
     * @throws WrongTypeException  when flag PARSED is not set and value is not a true or flag PARSED is set and value is not a string that contains true
     */
    public function getTrueOptional(
        int|string $key,
        int $flags = 0,
    ): ?true;

    /**
     * Checks if source array have specified key.
     *
     * @return bool true if key exists or false if not
     */
    public function hasKey(int|string $key): bool;
}
