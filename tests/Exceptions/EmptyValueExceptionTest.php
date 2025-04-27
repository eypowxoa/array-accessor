<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\EmptyValueException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(EmptyValueException::class)]
final class EmptyValueExceptionTest extends TestCase
{
    public function testMessageShouldIncludeField(): void
    {
        $testing = new EmptyValueException('field', 'value');
        self::assertStringContainsString('field', $testing->getMessage());
    }

    public function testMessageShouldIncludeValue(): void
    {
        $testing = new EmptyValueException('field', 'value');
        self::assertStringContainsString('value', $testing->getMessage());
    }
}
