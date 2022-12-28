<?php

namespace Edata\FinvoiceClient\Exceptions;

class SeriesNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Series not found');
    }
}
