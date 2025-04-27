<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\WrongValueException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(WrongValueException::class)]
final class WrongValueExceptionTest extends TestCase
{
    public function testFieldShouldBePassedToConstructor(): void
    {
        self::assertSame('field', (new class('field', 'value') extends WrongValueException {})->getField());
    }

    public function testMessageShouldBeCreatedByTemplateAndFieldAndValueAndExpected(): void
    {
        $testing = new class('field', 'value') extends WrongValueException {
            protected string $messageTemplate = '[%s, %s]';
        };
        self::assertSame("['field', 'value']", $testing->getMessage());
    }

    public function testPreviousShouldBeNullByDefault(): void
    {
        self::assertNull((new class('field', 'value') extends WrongValueException {})->getPrevious());
    }

    public function testPreviousShouldBePassedToConstructor(): void
    {
        $previous = new \RuntimeException('', 1);
        $testing = new class('field', 'value', $previous) extends WrongValueException {};
        self::assertSame($previous, $testing->getPrevious());
    }

    public function testValueShouldBePasedToConstructor(): void
    {
        $value = new \stdClass();
        $testing = new class('field', $value) extends WrongValueException {};
        self::assertSame($value, $testing->getValue());
    }
}
