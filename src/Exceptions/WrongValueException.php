<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

/**
 * Got value that not passed required conditions.
 */
abstract class WrongValueException extends WrongFieldException
{
    public function __construct(
        string $field,
        private readonly mixed $value,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($field, $previous);
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    protected function buildMessage(): string
    {
        return \sprintf(
            $this->messageTemplate,
            $this->toPrintable($this->field),
            $this->toPrintable($this->value),
        );
    }
}
