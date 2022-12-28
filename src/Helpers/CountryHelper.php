<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\CountryNotFoundException;
use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Filters\CountriesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Country;
use GuzzleHttp\Exception\GuzzleException;

class CountryHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param CountriesFilter|null $filter
     * @return Country[]
     * @throws InvalidCredentialsException
     * @throws GuzzleException
     */
    public function getCountries(CountriesFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', '/countries', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['countries'])) {
            return [];
        }

        return array_map(function ($value) {
            return Country::fromArray($value);
        }, $response['countries']['data'] ?? $response['countries']);
    }

    /**
     * @param CountriesFilter $filter
     * @return Country
     * @throws InvalidCredentialsException
     * @throws GuzzleException
     * @throws CountryNotFoundException
     */
    public function getCountry(CountriesFilter $filter): Country
    {
        $countries = $this->getCountries($filter);

        if (empty($countries)) {
            throw new CountryNotFoundException();
        }

        return $countries[0];
    }

    /**
     * @param string $countryCode
     * @return Country
     * @throws InvalidCredentialsException
     * @throws GuzzleException
     * @throws CountryNotFoundException
     */
    public function getCountryByCode(string $countryCode): Country
    {
        $filter = new CountriesFilter();
        $filter->setCode($countryCode);

        return $this->getCountry($filter);
    }
}
