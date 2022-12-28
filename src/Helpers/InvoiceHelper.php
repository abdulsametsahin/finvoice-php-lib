<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Exceptions\InvoiceNotFoundException;
use Edata\FinvoiceClient\Filters\InvoicesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Invoice;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class InvoiceHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param ?InvoicesFilter $filter
     * @return Invoice[]
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function getInvoices(InvoicesFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', 'invoices', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['invoices'])) {
            return [];
        }

        return array_map(function ($value) {
            return Invoice::fromArray($value);
        }, $response['invoices']['data'] ?? $response['invoices']);
    }

    /**
     * @param ?InvoicesFilter $filter
     * @return Invoice
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     * @throws InvoiceNotFoundException
     */
    public function getInvoice(InvoicesFilter $filter = null): Invoice
    {
        $invoices = $this->getInvoices($filter);

        if (empty($invoices)) {
            throw new InvoiceNotFoundException();
        }

        return $invoices[0];
    }

    /**
     * @throws InvoiceNotFoundException
     * @throws InvalidCredentialsException
     * @throws GuzzleException
     */
    public function createInvoice(Invoice $invoice): Invoice
    {
        $response = $this->finvoiceApi->makeApiRequest('POST', 'invoices', $invoice->toArray());

        if (empty($response) || empty($response['invoice'])) {
            throw new Exception('Invoice creation failed : ' . json_encode($response));
        }

        return Invoice::fromArray($response['invoice']);
    }
}
