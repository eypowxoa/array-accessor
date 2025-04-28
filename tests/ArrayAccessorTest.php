<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests;

use Eypowxoa\ArrayAccessor\ArrayAccessor;
use Eypowxoa\ArrayAccessor\Exceptions\MissingKeyException;
use Eypowxoa\ArrayAccessor\Exceptions\NullValueException;
use Eypowxoa\ArrayAccessor\Exceptions\WrongTypeException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(ArrayAccessor::class)]
final class ArrayAccessorTest extends TestCase
{
    public static function provideGetAssociative(): array
    {
        return [];
    }

    public static function provideGetAssociativeOptional(): array
    {
        return [];
    }

    public static function provideGetBool(): array
    {
        return [];
    }

    public static function provideGetBoolOptional(): array
    {
        return [];
    }

    public static function provideGetDate(): array
    {
        return [];
    }

    public static function provideGetDateOptional(): array
    {
        return [];
    }

    public static function provideGetEnum(): array
    {
        return [];
    }

    public static function provideGetEnumOptional(): array
    {
        return [];
    }

    public static function provideGetFalse(): array
    {
        return [];
    }

    public static function provideGetFalseOptional(): array
    {
        $f = ArrayAccessor::FILLED;
        $n = ArrayAccessor::NOTNULL;
        $p = ArrayAccessor::PARSED;
        $r = ArrayAccessor::REQUIRED;

        return [
            [['key' => ' 0 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 1 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 2 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' fAlSe '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' nO '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' tRuE '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' wRoNg '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' yEs '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ''], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.1], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.2], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 2], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => []], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => false], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => null], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => true], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [[], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],

            [['key' => ' 0 '], 'key', 0, null, new WrongTypeException('key', ' 0 ', 'false')],
            [['key' => ' 1 '], 'key', 0, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', 0, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', 0, null, new WrongTypeException('key', ' fAlSe ', 'false')],
            [['key' => ' nO '], 'key', 0, null, new WrongTypeException('key', ' nO ', 'false')],
            [['key' => ' tRuE '], 'key', 0, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', 0, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', 0, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', 0, null, new WrongTypeException('key', '', 'false')],
            [['key' => 0.0], 'key', 0, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', 0, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', 0, null, new WrongTypeException('key', 0, 'false')],
            [['key' => 1.0], 'key', 0, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', 0, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', 0, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', 0, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', 0, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', 0, false, null],
            [['key' => null], 'key', 0, null, null],
            [['key' => true], 'key', 0, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', 0, null, null],

            [['key' => ' 0 '], 'key', $r, null, new WrongTypeException('key', ' 0 ', 'false')],
            [['key' => ' 1 '], 'key', $r, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', $r, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', $r, null, new WrongTypeException('key', ' fAlSe ', 'false')],
            [['key' => ' nO '], 'key', $r, null, new WrongTypeException('key', ' nO ', 'false')],
            [['key' => ' tRuE '], 'key', $r, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', $r, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', $r, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', $r, null, new WrongTypeException('key', '', 'false')],
            [['key' => 0.0], 'key', $r, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', $r, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', $r, null, new WrongTypeException('key', 0, 'false')],
            [['key' => 1.0], 'key', $r, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', $r, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', $r, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', $r, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', $r, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', $r, false, null],
            [['key' => null], 'key', $r, null, null],
            [['key' => true], 'key', $r, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', $r, null, new MissingKeyException('key')],

            [['key' => ' 0 '], 'key', $p, false, null],
            [['key' => ' 1 '], 'key', $p, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', $p, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', $p, false, null],
            [['key' => ' nO '], 'key', $p, false, null],
            [['key' => ' tRuE '], 'key', $p, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', $p, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', $p, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', $p, false, null],
            [['key' => 0.0], 'key', $p, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', $p, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', $p, false, null],
            [['key' => 1.0], 'key', $p, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', $p, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', $p, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', $p, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', $p, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', $p, false, null],
            [['key' => null], 'key', $p, null, null],
            [['key' => true], 'key', $p, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', $p, null, null],

            [['key' => ' 0 '], 'key', $p | $r, false, null],
            [['key' => ' 1 '], 'key', $p | $r, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', $p | $r, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', $p | $r, false, null],
            [['key' => ' nO '], 'key', $p | $r, false, null],
            [['key' => ' tRuE '], 'key', $p | $r, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', $p | $r, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', $p | $r, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', $p | $r, false, null],
            [['key' => 0.0], 'key', $p | $r, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', $p | $r, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', $p | $r, false, null],
            [['key' => 1.0], 'key', $p | $r, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', $p | $r, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', $p | $r, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', $p | $r, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', $p | $r, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', $p | $r, false, null],
            [['key' => null], 'key', $p | $r, null, null],
            [['key' => true], 'key', $p | $r, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', $p | $r, null, new MissingKeyException('key')],

            [['key' => ' 0 '], 'key', $n, null, new WrongTypeException('key', ' 0 ', 'false')],
            [['key' => ' 1 '], 'key', $n, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', $n, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', $n, null, new WrongTypeException('key', ' fAlSe ', 'false')],
            [['key' => ' nO '], 'key', $n, null, new WrongTypeException('key', ' nO ', 'false')],
            [['key' => ' tRuE '], 'key', $n, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', $n, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', $n, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', $n, null, new WrongTypeException('key', '', 'false')],
            [['key' => 0.0], 'key', $n, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', $n, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', $n, null, new WrongTypeException('key', 0, 'false')],
            [['key' => 1.0], 'key', $n, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', $n, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', $n, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', $n, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', $n, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', $n, false, null],
            [['key' => null], 'key', $n, null, new NullValueException('key')],
            [['key' => true], 'key', $n, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', $n, null, null],

            [['key' => ' 0 '], 'key', $n | $r, null, new WrongTypeException('key', ' 0 ', 'false')],
            [['key' => ' 1 '], 'key', $n | $r, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', $n | $r, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', $n | $r, null, new WrongTypeException('key', ' fAlSe ', 'false')],
            [['key' => ' nO '], 'key', $n | $r, null, new WrongTypeException('key', ' nO ', 'false')],
            [['key' => ' tRuE '], 'key', $n | $r, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', $n | $r, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', $n | $r, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', $n | $r, null, new WrongTypeException('key', '', 'false')],
            [['key' => 0.0], 'key', $n | $r, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', $n | $r, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', $n | $r, null, new WrongTypeException('key', 0, 'false')],
            [['key' => 1.0], 'key', $n | $r, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', $n | $r, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', $n | $r, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', $n | $r, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', $n | $r, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', $n | $r, false, null],
            [['key' => null], 'key', $n | $r, null, new NullValueException('key')],
            [['key' => true], 'key', $n | $r, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', $n | $r, null, new MissingKeyException('key')],

            [['key' => ' 0 '], 'key', $n | $p, false, null],
            [['key' => ' 1 '], 'key', $n | $p, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', $n | $p, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', $n | $p, false, null],
            [['key' => ' nO '], 'key', $n | $p, false, null],
            [['key' => ' tRuE '], 'key', $n | $p, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', $n | $p, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', $n | $p, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', $n | $p, false, null],
            [['key' => 0.0], 'key', $n | $p, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', $n | $p, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', $n | $p, false, null],
            [['key' => 1.0], 'key', $n | $p, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', $n | $p, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', $n | $p, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', $n | $p, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', $n | $p, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', $n | $p, false, null],
            [['key' => null], 'key', $n | $p, null, new NullValueException('key')],
            [['key' => true], 'key', $n | $p, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', $n | $p, null, null],

            [['key' => ' 0 '], 'key', $n | $p | $r, false, null],
            [['key' => ' 1 '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' 1 ', 'false')],
            [['key' => ' 2 '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' 2 ', 'false')],
            [['key' => ' fAlSe '], 'key', $n | $p | $r, false, null],
            [['key' => ' nO '], 'key', $n | $p | $r, false, null],
            [['key' => ' tRuE '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' tRuE ', 'false')],
            [['key' => ' wRoNg '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' wRoNg ', 'false')],
            [['key' => ' yEs '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' yEs ', 'false')],
            [['key' => ''], 'key', $n | $p | $r, false, null],
            [['key' => 0.0], 'key', $n | $p | $r, null, new WrongTypeException('key', 0.0, 'false')],
            [['key' => 0.1], 'key', $n | $p | $r, null, new WrongTypeException('key', 0.1, 'false')],
            [['key' => 0], 'key', $n | $p | $r, false, null],
            [['key' => 1.0], 'key', $n | $p | $r, null, new WrongTypeException('key', 1.0, 'false')],
            [['key' => 1.2], 'key', $n | $p | $r, null, new WrongTypeException('key', 1.2, 'false')],
            [['key' => 1], 'key', $n | $p | $r, null, new WrongTypeException('key', 1, 'false')],
            [['key' => 2], 'key', $n | $p | $r, null, new WrongTypeException('key', 2, 'false')],
            [['key' => []], 'key', $n | $p | $r, null, new WrongTypeException('key', [], 'false')],
            [['key' => false], 'key', $n | $p | $r, false, null],
            [['key' => null], 'key', $n | $p | $r, null, new NullValueException('key')],
            [['key' => true], 'key', $n | $p | $r, null, new WrongTypeException('key', true, 'false')],
            [[], 'key', $n | $p | $r, null, new MissingKeyException('key')],
        ];
    }

    public static function provideGetFloat(): array
    {
        return [];
    }

    public static function provideGetFloatOptional(): array
    {
        return [];
    }

    public static function provideGetInstance(): array
    {
        return [];
    }

    public static function provideGetInstanceOptional(): array
    {
        return [];
    }

    public static function provideGetInt(): array
    {
        return [];
    }

    public static function provideGetIntOptional(): array
    {
        return [];
    }

    public static function provideGetKeyPath(): array
    {
        return [
            ['', '', '{e}'],
            ['', "\n", '{n}'],
            ['', "\n\n", '{n}{n}'],
            ['', ' ', '{s}'],
            ['', '  ', '{s}{s}'],
            ['', '{', '{l}'],
            ['', '{{', '{l}{l}'],
            ['', '}', '{r}'],
            ['', '}}', '{r}{r}'],
            ['', '\\', '\\'],
            ['', 'key', 'key'],
            ['', "{\n \\key  \n\n}}", '{l}{n}{s}\key{s}{s}{n}{n}{r}{r}'],
            ["{\n \\key  \n\n}}", '', "{\n \\key  \n\n}}.{e}"],
            ["{\n \\key  \n\n}}", "\n", "{\n \\key  \n\n}}.{n}"],
            ["{\n \\key  \n\n}}", "\n\n", "{\n \\key  \n\n}}.{n}{n}"],
            ["{\n \\key  \n\n}}", ' ', "{\n \\key  \n\n}}.{s}"],
            ["{\n \\key  \n\n}}", '  ', "{\n \\key  \n\n}}.{s}{s}"],
            ["{\n \\key  \n\n}}", '{', "{\n \\key  \n\n}}.{l}"],
            ["{\n \\key  \n\n}}", '{{', "{\n \\key  \n\n}}.{l}{l}"],
            ["{\n \\key  \n\n}}", '}', "{\n \\key  \n\n}}.{r}"],
            ["{\n \\key  \n\n}}", '}}', "{\n \\key  \n\n}}.{r}{r}"],
            ["{\n \\key  \n\n}}", '\\', "{\n \\key  \n\n}}.\\"],
            ["{\n \\key  \n\n}}", 'key', "{\n \\key  \n\n}}.key"],
            ["{\n \\key  \n\n}}", "{\n \\key  \n\n}}", "{\n \\key  \n\n}}.{l}{n}{s}\\key{s}{s}{n}{n}{r}{r}"],
        ];
    }

    public static function provideGetKeys(): array
    {
        return [];
    }

    public static function provideGetList(): array
    {
        return [];
    }

    public static function provideGetListOptional(): array
    {
        return [];
    }

    public static function provideGetNull(): array
    {
        return [];
    }

    public static function provideGetNullOptional(): array
    {
        return [];
    }

    public static function provideGetString(): array
    {
        return [];
    }

    public static function provideGetStringOptional(): array
    {
        return [];
    }

    public static function provideGetTrue(): array
    {
        $f = ArrayAccessor::FILLED;
        $n = ArrayAccessor::NOTNULL;
        $p = ArrayAccessor::PARSED;
        $r = ArrayAccessor::REQUIRED;

        return [
            [['key' => ' 0 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 1 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 2 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' fAlSe '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' nO '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' tRuE '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' wRoNg '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' yEs '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ''], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.1], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.2], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 2], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => []], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => false], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => null], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => true], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [[], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],

            [['key' => ' 0 '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 1 '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 2 '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' fAlSe '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' nO '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' tRuE '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' wRoNg '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' yEs '], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ''], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.0], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.1], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.0], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.2], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 2], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => []], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => false], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => null], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => true], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],
            [[], 'key', $n, null, new \InvalidArgumentException('Wrong flags.')],

            [['key' => ' 0 '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 1 '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 2 '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' fAlSe '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' nO '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' tRuE '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' wRoNg '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' yEs '], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ''], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.0], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.1], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.0], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.2], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 2], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => []], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => false], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => null], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => true], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],
            [[], 'key', $r, null, new \InvalidArgumentException('Wrong flags.')],

            [['key' => ' 0 '], 'key', 0, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', 0, null, new WrongTypeException('key', ' 1 ', 'true')],
            [['key' => ' 2 '], 'key', 0, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', 0, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', 0, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', 0, null, new WrongTypeException('key', ' tRuE ', 'true')],
            [['key' => ' wRoNg '], 'key', 0, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', 0, null, new WrongTypeException('key', ' yEs ', 'true')],
            [['key' => ''], 'key', 0, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', 0, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', 0, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', 0, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', 0, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', 0, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', 0, null, new WrongTypeException('key', 1, 'true')],
            [['key' => 2], 'key', 0, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', 0, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', 0, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', 0, null, new NullValueException('key')],
            [['key' => true], 'key', 0, true, null],
            [[], 'key', 0, null, new MissingKeyException('key')],

            [['key' => ' 0 '], 'key', $p, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $p, true, null],
            [['key' => ' 2 '], 'key', $p, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $p, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $p, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $p, true, null],
            [['key' => ' wRoNg '], 'key', $p, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $p, true, null],
            [['key' => ''], 'key', $p, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $p, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $p, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $p, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $p, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $p, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $p, true, null],
            [['key' => 2], 'key', $p, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $p, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $p, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $p, null, new NullValueException('key')],
            [['key' => true], 'key', $p, true, null],
            [[], 'key', $p, null, new MissingKeyException('key')],
        ];
    }

    public static function provideGetTrueOptional(): array
    {
        $f = ArrayAccessor::FILLED;
        $n = ArrayAccessor::NOTNULL;
        $p = ArrayAccessor::PARSED;
        $r = ArrayAccessor::REQUIRED;

        return [
            [['key' => ' 0 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 1 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' 2 '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' fAlSe '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' nO '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' tRuE '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' wRoNg '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ' yEs '], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => ''], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0.1], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.0], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1.2], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 1], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => 2], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => []], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => false], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => null], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [['key' => true], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],
            [[], 'key', $f, null, new \InvalidArgumentException('Wrong flags.')],

            [['key' => ' 0 '], 'key', 0, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', 0, null, new WrongTypeException('key', ' 1 ', 'true')],
            [['key' => ' 2 '], 'key', 0, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', 0, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', 0, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', 0, null, new WrongTypeException('key', ' tRuE ', 'true')],
            [['key' => ' wRoNg '], 'key', 0, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', 0, null, new WrongTypeException('key', ' yEs ', 'true')],
            [['key' => ''], 'key', 0, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', 0, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', 0, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', 0, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', 0, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', 0, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', 0, null, new WrongTypeException('key', 1, 'true')],
            [['key' => 2], 'key', 0, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', 0, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', 0, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', 0, null, null],
            [['key' => true], 'key', 0, true, null],
            [[], 'key', 0, null, null],

            [['key' => ' 0 '], 'key', $r, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $r, null, new WrongTypeException('key', ' 1 ', 'true')],
            [['key' => ' 2 '], 'key', $r, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $r, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $r, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $r, null, new WrongTypeException('key', ' tRuE ', 'true')],
            [['key' => ' wRoNg '], 'key', $r, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $r, null, new WrongTypeException('key', ' yEs ', 'true')],
            [['key' => ''], 'key', $r, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $r, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $r, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $r, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $r, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $r, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $r, null, new WrongTypeException('key', 1, 'true')],
            [['key' => 2], 'key', $r, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $r, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $r, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $r, null, null],
            [['key' => true], 'key', $r, true, null],
            [[], 'key', $r, null, new MissingKeyException('key')],

            [['key' => ' 0 '], 'key', $p, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $p, true, null],
            [['key' => ' 2 '], 'key', $p, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $p, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $p, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $p, true, null],
            [['key' => ' wRoNg '], 'key', $p, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $p, true, null],
            [['key' => ''], 'key', $p, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $p, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $p, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $p, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $p, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $p, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $p, true, null],
            [['key' => 2], 'key', $p, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $p, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $p, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $p, null, null],
            [['key' => true], 'key', $p, true, null],
            [[], 'key', $p, null, null],

            [['key' => ' 0 '], 'key', $p | $r, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $p | $r, true, null],
            [['key' => ' 2 '], 'key', $p | $r, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $p | $r, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $p | $r, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $p | $r, true, null],
            [['key' => ' wRoNg '], 'key', $p | $r, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $p | $r, true, null],
            [['key' => ''], 'key', $p | $r, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $p | $r, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $p | $r, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $p | $r, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $p | $r, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $p | $r, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $p | $r, true, null],
            [['key' => 2], 'key', $p | $r, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $p | $r, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $p | $r, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $p | $r, null, null],
            [['key' => true], 'key', $p | $r, true, null],
            [[], 'key', $p | $r, null, new MissingKeyException('key')],

            [['key' => ' 0 '], 'key', $n, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $n, null, new WrongTypeException('key', ' 1 ', 'true')],
            [['key' => ' 2 '], 'key', $n, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $n, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $n, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $n, null, new WrongTypeException('key', ' tRuE ', 'true')],
            [['key' => ' wRoNg '], 'key', $n, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $n, null, new WrongTypeException('key', ' yEs ', 'true')],
            [['key' => ''], 'key', $n, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $n, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $n, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $n, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $n, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $n, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $n, null, new WrongTypeException('key', 1, 'true')],
            [['key' => 2], 'key', $n, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $n, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $n, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $n, null, new NullValueException('key')],
            [['key' => true], 'key', $n, true, null],
            [[], 'key', $n, null, null],

            [['key' => ' 0 '], 'key', $n | $r, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $n | $r, null, new WrongTypeException('key', ' 1 ', 'true')],
            [['key' => ' 2 '], 'key', $n | $r, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $n | $r, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $n | $r, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $n | $r, null, new WrongTypeException('key', ' tRuE ', 'true')],
            [['key' => ' wRoNg '], 'key', $n | $r, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $n | $r, null, new WrongTypeException('key', ' yEs ', 'true')],
            [['key' => ''], 'key', $n | $r, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $n | $r, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $n | $r, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $n | $r, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $n | $r, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $n | $r, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $n | $r, null, new WrongTypeException('key', 1, 'true')],
            [['key' => 2], 'key', $n | $r, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $n | $r, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $n | $r, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $n | $r, null, new NullValueException('key')],
            [['key' => true], 'key', $n | $r, true, null],
            [[], 'key', $n | $r, null, new MissingKeyException('key')],

            [['key' => ' 0 '], 'key', $n | $p, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $n | $p, true, null],
            [['key' => ' 2 '], 'key', $n | $p, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $n | $p, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $n | $p, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $n | $p, true, null],
            [['key' => ' wRoNg '], 'key', $n | $p, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $n | $p, true, null],
            [['key' => ''], 'key', $n | $p, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $n | $p, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $n | $p, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $n | $p, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $n | $p, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $n | $p, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $n | $p, true, null],
            [['key' => 2], 'key', $n | $p, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $n | $p, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $n | $p, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $n | $p, null, new NullValueException('key')],
            [['key' => true], 'key', $n | $p, true, null],
            [[], 'key', $n | $p, null, null],

            [['key' => ' 0 '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' 0 ', 'true')],
            [['key' => ' 1 '], 'key', $n | $p | $r, true, null],
            [['key' => ' 2 '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' 2 ', 'true')],
            [['key' => ' fAlSe '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' fAlSe ', 'true')],
            [['key' => ' nO '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' nO ', 'true')],
            [['key' => ' tRuE '], 'key', $n | $p | $r, true, null],
            [['key' => ' wRoNg '], 'key', $n | $p | $r, null, new WrongTypeException('key', ' wRoNg ', 'true')],
            [['key' => ' yEs '], 'key', $n | $p | $r, true, null],
            [['key' => ''], 'key', $n | $p | $r, null, new WrongTypeException('key', '', 'true')],
            [['key' => 0.0], 'key', $n | $p | $r, null, new WrongTypeException('key', 0.0, 'true')],
            [['key' => 0.1], 'key', $n | $p | $r, null, new WrongTypeException('key', 0.1, 'true')],
            [['key' => 0], 'key', $n | $p | $r, null, new WrongTypeException('key', 0, 'true')],
            [['key' => 1.0], 'key', $n | $p | $r, null, new WrongTypeException('key', 1.0, 'true')],
            [['key' => 1.2], 'key', $n | $p | $r, null, new WrongTypeException('key', 1.2, 'true')],
            [['key' => 1], 'key', $n | $p | $r, true, null],
            [['key' => 2], 'key', $n | $p | $r, null, new WrongTypeException('key', 2, 'true')],
            [['key' => []], 'key', $n | $p | $r, null, new WrongTypeException('key', [], 'true')],
            [['key' => false], 'key', $n | $p | $r, null, new WrongTypeException('key', false, 'true')],
            [['key' => null], 'key', $n | $p | $r, null, new NullValueException('key')],
            [['key' => true], 'key', $n | $p | $r, true, null],
            [[], 'key', $n | $p | $r, null, new MissingKeyException('key')],
        ];
    }

    public static function provideHasKey(): array
    {
        return [
            [['key' => null], 'key', true],
            [['key' => null], 'missing', false],
            [[0 => null], 0, true],
            [[0 => null], 1, false],
            [[1 => null], 0, false],
            [[1 => null], 1, true],
        ];
    }

    public static function provideIsNull(): array
    {
        return [
            [['key' => 'value'], 'key', false, null],
            [['key' => 'value'], 'missing', null, new MissingKeyException('missing')],
            [['key' => 0], 'key', false, null],
            [['key' => []], 'key', false, null],
            [['key' => false], 'key', false, null],
            [['key' => new \stdClass()], 'key', false, null],
            [['key' => null], 'key', true, null],
            [[0 => false], 0, false, null],
            [[0 => null], 0, true, null],
            [[1 => null], 1, true, null],
            [[1 => true], 1, false, null],
        ];
    }

    public function testGetAssociative(): void
    {
        self::markTestIncomplete();
    }

    public function testGetAssociativeOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetBool(): void
    {
        self::markTestIncomplete();
    }

    public function testGetBoolOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetDate(): void
    {
        self::markTestIncomplete();
    }

    public function testGetDateOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetEnum(): void
    {
        self::markTestIncomplete();
    }

    public function testGetEnumOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetFalse(): void
    {
        self::markTestIncomplete();
    }

    #[DataProvider('provideGetFalseOptional')]
    public function testGetFalseOptional(
        array $data,
        int|string $key,
        int $flags,
        ?bool $expected,
        ?\Throwable $error,
    ): void {
        if ($error instanceof \Throwable) {
            $this->expectExceptionObject($error);
        }

        self::assertSame($expected, (new ArrayAccessor($data))->getFalseOptional($key, $flags));
    }

    public function testGetFloat(): void
    {
        self::markTestIncomplete();
    }

    public function testGetFloatOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetInstance(): void
    {
        self::markTestIncomplete();
    }

    public function testGetInstanceOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetInt(): void
    {
        self::markTestIncomplete();
    }

    public function testGetIntOptional(): void
    {
        self::markTestIncomplete();
    }

    #[DataProvider('provideGetKeyPath')]
    public function testGetKeyPath(
        string $path,
        string $key,
        string $expected,
    ): void {
        self::assertSame($expected, (new ArrayAccessor([], $path))->getKeyPath($key));
    }

    public function testGetKeys(): void
    {
        self::markTestIncomplete();
    }

    public function testGetList(): void
    {
        self::markTestIncomplete();
    }

    public function testGetListOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetNull(): void
    {
        self::markTestIncomplete();
    }

    public function testGetNullOptional(): void
    {
        self::markTestIncomplete();
    }

    public function testGetString(): void
    {
        self::markTestIncomplete();
    }

    public function testGetStringOptional(): void
    {
        self::markTestIncomplete();
    }

    #[DataProvider('provideGetTrue')]
    public function testGetTrue(
        array $data,
        int|string $key,
        int $flags,
        ?bool $expected,
        ?\Throwable $error,
    ): void {
        if ($error instanceof \Throwable) {
            $this->expectExceptionObject($error);
        }

        self::assertSame($expected, (new ArrayAccessor($data))->getTrue($key, $flags));
    }

    #[DataProvider('provideGetTrueOptional')]
    public function testGetTrueOptional(
        array $data,
        int|string $key,
        int $flags,
        ?bool $expected,
        ?\Throwable $error,
    ): void {
        if ($error instanceof \Throwable) {
            $this->expectExceptionObject($error);
        }

        self::assertSame($expected, (new ArrayAccessor($data))->getTrueOptional($key, $flags));
    }

    #[DataProvider('provideHasKey')]
    public function testHasKey(
        array $data,
        int|string $key,
        bool $expected,
    ): void {
        self::assertSame($expected, (new ArrayAccessor($data))->hasKey($key));
    }

    #[DataProvider('provideIsNull')]
    public function testIsNull(
        array $data,
        int|string $key,
        ?bool $expected,
        ?\Throwable $error,
    ): void {
        if ($error instanceof \Throwable) {
            $this->expectExceptionObject($error);
        }

        self::assertSame($expected, (new ArrayAccessor($data))->isNull($key));
    }
}
