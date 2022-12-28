<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\CurrencyNotFoundException;
use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Filters\CurrenciesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Currency;
use GuzzleHttp\Exception\GuzzleException;

class CurrencyHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param CurrenciesFilter|null $filter
     * @return Currency[]
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function getCurrencies(CurrenciesFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', '/currencies', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['currencies'])) {
            return [];
        }

        return array_map(function ($value) {
            return Currency::fromArray($value);
        }, $response['currencies']['data'] ?? $response['currencies']);
    }

    /**
     * @param CurrenciesFilter $filter
     * @return Currency
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     * @throws CurrencyNotFoundException
     */
    public function getCurrency(CurrenciesFilter $filter): Currency
    {
        $currencies = $this->getCurrencies($filter);

        if (empty($currencies)) {
            throw new CurrencyNotFoundException();
        }

        return $currencies[0];
    }

    /**
     * @param string $currencyCode
     * @return Currency
     * @throws GuzzleException
     * @throws InvalidCredentialsException|CurrencyNotFoundException
     */
    public function getCurrencyByCode(string $currencyCode): Currency
    {
        $filter = new CurrenciesFilter();
        $filter->setCode($currencyCode);

        return $this->getCurrency($filter);
    }

    /**
     * @param string $currencySymbol
     * @return Currency
     * @throws GuzzleException
     * @throws InvalidCredentialsException|CurrencyNotFoundException
     */
    public function getCurrencyBySymbol(string $currencySymbol): Currency
    {
        $filter = new CurrenciesFilter();
        $filter->setSymbol($currencySymbol);

        return $this->getCurrency($filter);
    }
}
