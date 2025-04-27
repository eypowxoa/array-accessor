<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

/**
 * Got empty value when value required to not be empty.
 */
final class EmptyValueException extends WrongValueException
{
    protected string $messageTemplate = 'Field %s value %s can not be empty.';
}
