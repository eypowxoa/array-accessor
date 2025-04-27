<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

/**
 * No such key is the source array.
 */
final class MissingKeyException extends WrongFieldException
{
    protected string $messageTemplate = 'Not found key %s in the source array.';
}
