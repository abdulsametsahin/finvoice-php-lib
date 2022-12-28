<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Exceptions\TaxNotFoundException;
use Edata\FinvoiceClient\Filters\TaxesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Tax;
use GuzzleHttp\Exception\GuzzleException;

class TaxHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param TaxesFilter|null $filter
     * @return Tax[]
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function getTaxes(TaxesFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', '/tax-types', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['taxTypes'])) {
            return [];
        }

        return array_map(function ($value) {
            return Tax::fromArray($value);
        }, $response['taxTypes']['data'] ?? $response['taxTypes']);
    }

    /**
     * @param TaxesFilter $filter
     * @return Tax
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     * @throws TaxNotFoundException
     */
    public function getTax(TaxesFilter $filter): Tax
    {
        $taxes = $this->getTaxes($filter);

        if (empty($taxes)) {
            throw new TaxNotFoundException();
        }

        return $taxes[0];
    }
}
