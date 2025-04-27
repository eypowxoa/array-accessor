<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests;

use Eypowxoa\ArrayAccessor\ArrayAccessor;
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
        return [];
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
        return [];
    }

    public static function provideGetTrueOptional(): array
    {
        return [];
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
        return [];
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

    public function testGetFalseOptional(): void
    {
        self::markTestIncomplete();
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
    public function testGetKeyPath(string $path, string $key, string $expected): void
    {
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

    public function testGetTrue(): void
    {
        self::markTestIncomplete();
    }

    public function testGetTrueOptional(): void
    {
        self::markTestIncomplete();
    }

    #[DataProvider('provideHasKey')]
    public function testHasKey(array $data, int|string $key, bool $expected): void
    {
        self::assertSame($expected, (new ArrayAccessor($data))->hasKey($key));
    }

    public function testIsNull(): void
    {
        self::markTestIncomplete();
    }
}
