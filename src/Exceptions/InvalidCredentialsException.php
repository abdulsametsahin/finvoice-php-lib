<?php

namespace Edata\FinvoiceClient\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid credentials');
    }
}
