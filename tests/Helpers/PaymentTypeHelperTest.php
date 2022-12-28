<?php

namespace Helpers;

use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Helpers\PaymentTypeHelper;
use Edata\FinvoiceClient\Models\PaymentType;
use PHPUnit\Framework\TestCase;

class PaymentTypeHelperTest extends TestCase
{
    public function testCanFetchPaymentTypes()
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $paymentTypes = $finvoiceApi->paymentTypes()->getPaymentTypes();

        $this->assertNotEmpty($paymentTypes);

        $this->assertIsArray($paymentTypes);
    }

    public function testCanFetchPaymentType()
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $paymentType = $finvoiceApi->paymentTypes()->getPaymentType();

        $this->assertNotEmpty($paymentType);

        $this->assertInstanceOf(PaymentType::class, $paymentType);
    }
}
