<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Exceptions\RecurringInvoiceNotFoundException;
use Edata\FinvoiceClient\Filters\RecurringInvoicesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\RecurringInvoice;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class RecurringInvoiceHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    public function getRecurringInvoices(RecurringInvoicesFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', '/recurring-invoices', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['invoices'])) {
            return [];
        }

        return array_map(function ($value) {
            return RecurringInvoice::fromArray($value);
        }, $response['invoices']['data'] ?? $response['invoices']);
    }

    /**
     * @throws RecurringInvoiceNotFoundException
     */
    public function getRecurringInvoice(RecurringInvoicesFilter $filter): RecurringInvoice
    {
        $recurringInvoices = $this->getRecurringInvoices($filter);

        if (empty($recurringInvoices)) {
            throw new RecurringInvoiceNotFoundException();
        }

        return $recurringInvoices[0];
    }

    /**
     * @param RecurringInvoice $recurringInvoice
     * @return RecurringInvoice
     * @throws InvalidCredentialsException
     * @throws GuzzleException
     * @throws Exception
     */
    public function createRecurringInvoice(RecurringInvoice $recurringInvoice): RecurringInvoice
    {
        $recurringInvoice->calculateTotal();

        $response = $this->finvoiceApi->makeApiRequest('POST', '/recurring-invoices', $recurringInvoice->toArray());

        return RecurringInvoice::fromArray($response['invoice']);
    }
}
