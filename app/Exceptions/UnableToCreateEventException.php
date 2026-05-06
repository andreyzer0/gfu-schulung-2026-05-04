<?php

namespace App\Exceptions;

use Exception;

class UnableToCreateEventException extends Exception
{
    public function __construct(
        string $message = "Unable to create event.",
        int $code = 500, // Internal Server Error
        Exception|null $previous = null,
    )
    {
        parent::__construct($message, $code, $previous);
    }
}
