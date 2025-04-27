<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

/**
 * Got value of a wrong type.
 */
final class WrongTypeException extends WrongValueException
{
    protected string $messageTemplate = 'Field %s contains value %s but expected %s.';

    public function __construct(
        string $field,
        mixed $value,
        private readonly string $expectedType,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($field, $value, $previous);
    }

    public function getExpectedType(): string
    {
        return $this->expectedType;
    }

    protected function buildMessage(): string
    {
        return \sprintf(
            $this->messageTemplate,
            $this->toPrintable($this->getField()),
            $this->toPrintable($this->getValue()),
            $this->toPrintable($this->getExpectedType()),
        );
    }
}
