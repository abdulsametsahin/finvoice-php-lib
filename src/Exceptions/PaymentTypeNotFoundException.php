<?php

namespace Edata\FinvoiceClient\Exceptions;

class PaymentTypeNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Payment type not found');
    }
}
