<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\ArrayAccessException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(ArrayAccessException::class)]
final class ArrayAccessExceptionTest extends TestCase
{
    public static function provideToPrintable(): array
    {
        $openedResource = fopen('php://memory', 'r');
        $closedResource = fopen('php://memory', 'r');
        fclose($closedResource);
        $anonymousClass = new class {};
        $closure = static function (): void {};

        return [
            [null, 'null'],
            [false, 'false'],
            [true, 'true'],
            [-1, '-1'],
            [0, '0'],
            [1, '1'],
            [-1.0, '-1.0'],
            [0.0, '0.0'],
            [1.0, '1.0'],
            ['', "''"],
            [' ', "' '"],
            ['"', "'\"'"],
            ['\'', "'\\''"],
            ['\\', "'\\\\'"],
            ["\\n\n", "'\\\\n'"],
            ["\n", "''"],
            [str_repeat('a', 50), "'".str_repeat('a', 50)."'"],
            [str_repeat('a', 51), "'".str_repeat('a', 49)."…'"],
            [[], get_debug_type([])],
            [new \stdClass(), get_debug_type(new \stdClass())],
            [$openedResource, get_debug_type($openedResource)],
            [$closedResource, get_debug_type($closedResource)],
            [$anonymousClass, get_debug_type($anonymousClass)],
            [$closure, get_debug_type($closure)],
        ];
    }

    #[DataProvider('provideToPrintable')]
    public function testToPrintable($value, $expected): void
    {
        $testing = new class extends ArrayAccessException {
            public static function toPrintablePublic($value): string
            {
                return self::toPrintable($value);
            }
        };

        self::assertSame($expected, $testing::toPrintablePublic($value));
    }
}
