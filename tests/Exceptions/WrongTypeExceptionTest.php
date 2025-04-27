<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\WrongTypeException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(WrongTypeException::class)]
final class WrongTypeExceptionTest extends TestCase
{
    public function testFieldShouldBePassedToConstructor(): void
    {
        self::assertSame('field', (new WrongTypeException('field', 'value', 'expected'))->getField());
    }

    public function testMessageShouldIncludeExpected(): void
    {
        $testing = new WrongTypeException('field', 'value', 'expected');
        self::assertStringContainsString('expected', $testing->getMessage());
    }

    public function testMessageShouldIncludeField(): void
    {
        $testing = new WrongTypeException('field', 'value', 'expected');
        self::assertStringContainsString('field', $testing->getMessage());
    }

    public function testMessageShouldIncludeValue(): void
    {
        $testing = new WrongTypeException('field', 'value', 'expected');
        self::assertStringContainsString('value', $testing->getMessage());
    }

    public function testPreviousShouldBeNullByDefault(): void
    {
        self::assertNull((new WrongTypeException('field', 'value', 'expected'))->getPrevious());
    }

    public function testPreviousShouldBePassedToConstructor(): void
    {
        $previous = new \RuntimeException('', 1);
        self::assertSame($previous, (new WrongTypeException('field', 'value', 'expected', $previous))->getPrevious());
    }

    public function testValueShouldBePasedToConstructor(): void
    {
        $value = new \stdClass();
        self::assertSame($value, (new WrongTypeException('field', $value, 'expected'))->getValue());
    }
}
