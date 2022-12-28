<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Exceptions\SeriesNotFoundException;
use Edata\FinvoiceClient\Filters\SeriesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Series;
use GuzzleHttp\Exception\GuzzleException;

class SeriesHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param SeriesFilter|null $filter
     * @return Series[]
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function getSeries(SeriesFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', 'settings/series', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['series'])) {
            return [];
        }

        return array_map(function ($data) {
            return Series::fromArray($data);
        }, $response['series']['data'] ?? $response['series']);
    }

    /**
     * @param SeriesFilter|null $filter
     * @return Series
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     * @throws SeriesNotFoundException
     */
    public function getSerie(SeriesFilter $filter = null): Series
    {
        $series = $this->getSeries($filter);

        if (empty($series)) {
            throw new SeriesNotFoundException();
        }

        return $series[0];
    }
}
