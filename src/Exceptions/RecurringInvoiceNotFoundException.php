<?php

namespace Edata\FinvoiceClient\Exceptions;

class RecurringInvoiceNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Recurring invoice not found');
    }
}
