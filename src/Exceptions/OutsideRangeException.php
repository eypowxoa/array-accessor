<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

/**
 * Value is outside of the specified range.
 */
final class OutsideRangeException extends WrongValueException
{
    protected string $messageTemplate = 'Field %s contains value %s outside of a range %s.';

    public function __construct(
        string $field,
        mixed $value,
        private readonly mixed $minimum,
        private readonly mixed $maximum,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($field, $value, $previous);
    }

    public function getMaximum(): mixed
    {
        return $this->maximum;
    }

    public function getMinimum(): mixed
    {
        return $this->minimum;
    }

    protected function buildMessage(): string
    {
        return \sprintf(
            $this->messageTemplate,
            $this->toPrintable($this->getField()),
            $this->toPrintable($this->getValue()),
            $this->toPrintable($this->getMinimum()),
            $this->toPrintable($this->getMaximum()),
        );
    }
}
