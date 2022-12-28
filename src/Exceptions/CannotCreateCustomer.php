<?php

namespace Edata\FinvoiceClient\Exceptions;

class CannotCreateCustomer extends \Exception
{
    public function __construct()
    {
        parent::__construct('Cannot create customer');
    }
}
