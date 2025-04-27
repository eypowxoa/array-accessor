<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\NullValueException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(NullValueException::class)]
final class NullValueExceptionTest extends TestCase
{
    public function testFieldShouldBePassedToConstructor(): void
    {
        $testing = new NullValueException('field');
        self::assertSame('field', $testing->getField());
    }

    public function testMessageShouldIncludeField(): void
    {
        $testing = new NullValueException('field');
        self::assertStringContainsString('field', $testing->getMessage());
    }

    public function testPreviousShouldBeNullByDefault(): void
    {
        $testing = new NullValueException('field');
        self::assertNull($testing->getPrevious());
    }

    public function testPreviousShouldBePassedToConstructor(): void
    {
        $previous = new \RuntimeException('', 1);
        self::assertSame($previous, (new NullValueException('field', $previous))->getPrevious());
    }

    public function testValueShouldBeNull(): void
    {
        self::assertNull((new NullValueException('field'))->getValue());
    }
}
