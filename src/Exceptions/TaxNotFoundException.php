<?php

namespace Edata\FinvoiceClient\Exceptions;

class TaxNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Tax not found');
    }
}
