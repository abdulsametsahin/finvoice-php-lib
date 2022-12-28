<?php

namespace Edata\FinvoiceClient\Exceptions;

class InvoiceNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invoice not found');
    }
}
