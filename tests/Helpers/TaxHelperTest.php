<?php

namespace Helpers;

use Edata\FinvoiceClient\Filters\TaxesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Helpers\TaxHelper;
use PHPUnit\Framework\TestCase;

class TaxHelperTest extends TestCase
{
    public function testCanGetTaxes(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $taxes = $finvoiceApi->taxes()->getTaxes();

        $this->assertIsArray($taxes);

        $this->assertGreaterThan(0, count($taxes));
    }

    public function testCanGetTax(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $taxes = $finvoiceApi->taxes()->getTaxes();

        $this->assertIsArray($taxes);

        $this->assertGreaterThan(0, count($taxes));
    }

    public function testCanGetTaxByName(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $taxes = $finvoiceApi->taxes()->getTaxes();

        $taxes = $finvoiceApi->taxes()->getTaxes(TaxesFilter::make()->setName($taxes[0]->getName()));

        $this->assertIsArray($taxes);

        $this->assertGreaterThan(0, count($taxes));
    }

    public function testCanGetTaxById(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $taxes = $finvoiceApi->taxes()->getTaxes(TaxesFilter::make()->setId(1));

        $this->assertIsArray($taxes);

        $this->assertGreaterThan(0, count($taxes));
    }
}
