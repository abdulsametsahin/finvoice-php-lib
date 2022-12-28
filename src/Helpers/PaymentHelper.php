<?php

namespace Edata\FinvoiceClient\Helpers;

use _PHPStan_5c71ab23c\Nette\Neon\Exception;
use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Payment;
use GuzzleHttp\Exception\GuzzleException;

class PaymentHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @throws InvalidCredentialsException
     * @throws GuzzleException
     * @throws Exception
     */
    public function makePayment(Payment $payment): Payment
    {
        $response = $this->finvoiceApi->makeApiRequest('POST', '/payments', $payment->toArray());

        if (isset($response['error'])) {
            throw new Exception($response['error']);
        }

        return Payment::fromArray($response['payment']);
    }
}
