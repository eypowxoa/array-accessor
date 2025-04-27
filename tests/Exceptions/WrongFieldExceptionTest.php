<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\WrongFieldException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(WrongFieldException::class)]
final class WrongFieldExceptionTest extends TestCase
{
    public function testCodeShouldBeZeroByDefault(): void
    {
        self::assertSame(0, (new class('field') extends WrongFieldException {})->getCode());
    }

    public function testCodeShouldBeZeroWhenGotPrevious(): void
    {
        $previous = new \RuntimeException('', 1);
        self::assertSame(0, (new class('field', $previous) extends WrongFieldException {})->getCode());
    }

    public function testFieldShouldBePassedToConstructor(): void
    {
        self::assertSame('field', (new class('field') extends WrongFieldException {})->getField());
    }

    public function testMessageShouldBeCreatedByTemplateAndField(): void
    {
        self::assertSame("['field']", (new class('field') extends WrongFieldException {
            protected string $messageTemplate = '[%s]';
        })->getMessage());
    }

    public function testPreviousShouldBeNullByDefault(): void
    {
        self::assertNull((new class('field') extends WrongFieldException {})->getPrevious());
    }

    public function testPreviousShouldBePassedToConstructor(): void
    {
        $previous = new \RuntimeException('', 1);
        self::assertSame($previous, (new class('field', $previous) extends WrongFieldException {})->getPrevious());
    }
}
