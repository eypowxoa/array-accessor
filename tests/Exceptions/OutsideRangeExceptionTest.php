<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\OutsideRangeException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(OutsideRangeException::class)]
final class OutsideRangeExceptionTest extends TestCase
{
    public function testFieldShouldBePassedToConstructor(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertSame('field', $testing->getField());
    }

    public function testMaximumShouldBePassedToConstructor(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertSame('maximum', $testing->getMaximum());
    }

    public function testMessageShouldIncludeField(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertStringContainsString('field', $testing->getMessage());
    }

    public function testMessageShouldIncludeMaximun(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertStringContainsString('minimum', $testing->getMessage());
    }

    public function testMessageShouldIncludeMinimum(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertStringContainsString('value', $testing->getMessage());
    }

    public function testMessageShouldIncludeValue(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertStringContainsString('value', $testing->getMessage());
    }

    public function testMinimumShouldBePassedToConstructor(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertSame('minimum', $testing->getMinimum());
    }

    public function testPreviousShouldBeNullByDefault(): void
    {
        $testing = new OutsideRangeException('field', 'value', 'minimum', 'maximum');
        self::assertNull($testing->getPrevious());
    }

    public function testPreviousShouldBePassedToConstructor(): void
    {
        $previous = new \RuntimeException('', 1);
        self::assertSame($previous, (new OutsideRangeException('field', 'value', 'minimum', 'maximum', $previous))->getPrevious());
    }

    public function testValueShouldBePasedToConstructor(): void
    {
        $value = new \stdClass();
        self::assertSame($value, (new OutsideRangeException('field', $value, 'minimum', 'maximum'))->getValue());
    }
}
