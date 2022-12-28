<?php

namespace Edata\FinvoiceClient\Exceptions;

class CountryNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Country not found');
    }
}
