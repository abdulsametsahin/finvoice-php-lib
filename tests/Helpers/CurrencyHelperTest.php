<?php

namespace Helpers;

use Edata\FinvoiceClient\Filters\CurrenciesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use PHPUnit\Framework\TestCase;

class CurrencyHelperTest extends TestCase
{
    public function testCanFetchCurrencies(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $currencies = $finvoiceApi->currencies()->getCurrencies(new CurrenciesFilter());

        $this->assertIsArray($currencies);

        $this->assertGreaterThan(0, count($currencies));

    }

    public function testCanFetchCurrency(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $currenciesFilter = new CurrenciesFilter();
        $currenciesFilter->setCode("EUR");

        $currency = $finvoiceApi->currencies()->getCurrency($currenciesFilter);

        $this->assertIsString($currency->getCode());
        $this->assertIsString($currency->getName());
        $this->assertEquals("EUR", $currency->getCode());
    }

    public function testCanFetchCurrencyByName(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $currenciesFilter = new CurrenciesFilter();
        $currenciesFilter->setName("Euro");

        $currency = $finvoiceApi->currencies()->getCurrency($currenciesFilter);

        $this->assertIsString($currency->getCode());
        $this->assertIsString($currency->getName());
        $this->assertEquals("Euro", $currency->getName());
    }

    public function testCanFetchCurrencyByCode(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $currency = $finvoiceApi->currencies()->getCurrencyByCode("EUR");

        $this->assertIsString($currency->getCode());
        $this->assertIsString($currency->getName());

        $this->assertEquals("EUR", $currency->getCode());
    }

    public function testCanFetchCurrencyBySymbol(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $currency = $finvoiceApi->currencies()->getCurrencyBySymbol("€");

        $this->assertIsString($currency->getCode());
        $this->assertIsString($currency->getName());

        $this->assertEquals("EUR", $currency->getCode());
    }
}
