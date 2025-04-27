<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Tests\Exceptions;

use Eypowxoa\ArrayAccessor\Exceptions\MissingKeyException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(MissingKeyException::class)]
final class MissingKeyExceptionTest extends TestCase
{
    public function testMessageShouldIncludeField(): void
    {
        self::assertStringContainsString('field', (new MissingKeyException('field'))->getMessage());
    }
}
