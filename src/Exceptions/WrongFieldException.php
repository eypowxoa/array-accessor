<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

abstract class WrongFieldException extends ArrayAccessException
{
    protected string $messageTemplate = '';

    public function __construct(
        protected readonly string $field,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($this->buildMessage(), 0, $previous);
    }

    public function getField(): string
    {
        return $this->field;
    }

    protected function buildMessage(): string
    {
        return \sprintf(
            $this->messageTemplate,
            $this->toPrintable($this->getField()),
        );
    }
}
