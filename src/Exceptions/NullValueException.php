<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

/**
 * Got null when null is not allowed.
 */
final class NullValueException extends WrongValueException
{
    protected string $messageTemplate = 'Field %s can not be null.';

    public function __construct(
        string $field,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($field, null, $previous);
    }

    protected function buildMessage(): string
    {
        return \sprintf(
            $this->messageTemplate,
            $this->toPrintable($this->getField()),
        );
    }
}
