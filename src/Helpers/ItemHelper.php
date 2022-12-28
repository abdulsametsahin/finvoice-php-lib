<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Exceptions\ItemNotFoundException;
use Edata\FinvoiceClient\Filters\ItemsFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Item;
use GuzzleHttp\Exception\GuzzleException;

class ItemHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param ItemsFilter|null $filter
     * @return Item[]
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function getItems(ItemsFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', '/items', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['items'])) {
            return [];
        }

        return array_map(function ($value) {
            return Item::fromArray($value);
        }, $response['items']['data'] ?? $response['items']);
    }

    /**
     * @param ItemsFilter|null $filter
     * @return Item
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     * @throws ItemNotFoundException
     */
    public function getItem(ItemsFilter $filter= null): Item
    {
        $items = $this->getItems($filter);

        if (empty($items)) {
            throw new ItemNotFoundException();
        }

        return $items[0];
    }
}

