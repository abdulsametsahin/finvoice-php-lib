<?php

namespace Edata\FinvoiceClient\Exceptions;

class CurrencyNotFoundException extends \Exception
{
    public function __construct(string $message = 'Currency not found', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
