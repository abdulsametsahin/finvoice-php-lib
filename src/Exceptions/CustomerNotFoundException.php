<?php

namespace Edata\FinvoiceClient\Exceptions;

class CustomerNotFoundException extends \Exception
{
    public function __construct(string $message = 'Customer not found', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
