<?php

namespace Helpers;

use Edata\FinvoiceClient\Filters\CountriesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Helpers\CountryHelper;
use PHPUnit\Framework\TestCase;

class CountryHelperTest extends TestCase
{
    public function testCanFetchCountries(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $countryHelper = new CountryHelper($finvoiceApi);

        $countries = $countryHelper->getCountries(new CountriesFilter());

        $this->assertIsArray($countries);

        $this->assertGreaterThan(0, count($countries));
    }

    public function testCanFetchCountry(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $countryHelper = new CountryHelper($finvoiceApi);

        $countriesFilter = new CountriesFilter();
        $countriesFilter->setCode("FI");

        $country = $countryHelper->getCountry($countriesFilter);

        $this->assertIsString($country->getCode());
        $this->assertIsString($country->getName());
        $this->assertEquals("FI", $country->getCode());
    }

    public function testCanFetchCountryByName(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $countryHelper = new CountryHelper($finvoiceApi);

        $countriesFilter = new CountriesFilter();
        $countriesFilter->setName("Finland");

        $country = $countryHelper->getCountry($countriesFilter);

        $this->assertIsString($country->getCode());
        $this->assertIsString($country->getName());
        $this->assertEquals("Finland", $country->getName());
    }


}
