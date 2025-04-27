<?php

declare(strict_types=1);

namespace Eypowxoa\ArrayAccessor\Exceptions;

/**
 * Base class for all errors.
 */
abstract class ArrayAccessException extends \Exception
{
    final protected static function toPrintable($value): string
    {
        if (
            \is_bool($value)
            || \is_int($value)
            || \is_float($value)
        ) {
            return var_export($value, true);
        }

        if (\is_string($value)) {
            $printable = $value;

            if (mb_strlen($printable, 'UTF-8') > 50) {
                $printable = mb_substr($printable, 0, 49).'…';
            }

            $printable = strtr($printable, ["\n" => '']);

            return var_export($printable, true);
        }

        return get_debug_type($value);
    }
}
