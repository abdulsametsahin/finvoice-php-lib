<?php

namespace Edata\FinvoiceClient;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Helpers\CountryHelper;
use Edata\FinvoiceClient\Helpers\CurrencyHelper;
use Edata\FinvoiceClient\Helpers\CustomerHelper;
use Edata\FinvoiceClient\Helpers\InvoiceHelper;
use Edata\FinvoiceClient\Helpers\ItemHelper;
use Edata\FinvoiceClient\Helpers\PaymentHelper;
use Edata\FinvoiceClient\Helpers\PaymentTypeHelper;
use Edata\FinvoiceClient\Helpers\RecurringInvoiceHelper;
use Edata\FinvoiceClient\Helpers\SeriesHelper;
use Edata\FinvoiceClient\Helpers\TaxHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FinvoiceApi
{
    private string $projectUrl;
    private string $apiKey;

    /**
     * @throws InvalidCredentialsException
     */
    public function __construct(string $projectUrl, string $apiKey)
    {

        $this->projectUrl = $projectUrl;
        $this->apiKey = $apiKey;
    }

    public function getProjectUrl(): string
    {
        return $this->projectUrl;
    }

    public function setProjectUrl(string $projectUrl): void
    {
        $this->projectUrl = $projectUrl;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array<string, mixed> $data
     * @return array<string, mixed>|null
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function makeApiRequest(string $method, string $path, array $data = []): ?array
    {
        $queryParams = [];

        if ($method === 'GET') {
            $queryParams = $data;
        }

        $queryParams['login_token'] = $this->apiKey;

        $path = trim($path, '/');

        $url = $this->projectUrl . '/api/' . $path;
        $url .= '?' . http_build_query($queryParams);

        $client = new Client();
        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ];

        if (!empty($data)) {
            $options['json'] = $data;
        }

        try {
            $response = $client->request($method, $url, $options);

        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                throw new InvalidCredentialsException();
            }

            throw $e;
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function customers(): CustomerHelper
    {
        return new CustomerHelper($this);
    }

    public function countries(): CountryHelper
    {
        return new CountryHelper($this);
    }

    public function currencies(): CurrencyHelper
    {
        return new CurrencyHelper($this);
    }

    public function items(): ItemHelper
    {
        return new ItemHelper($this);
    }

    public function invoices(): InvoiceHelper
    {
        return new InvoiceHelper($this);
    }

    public function series(): SeriesHelper
    {
        return new SeriesHelper($this);
    }

    public function taxes(): TaxHelper
    {
        return new TaxHelper($this);
    }

    public function recurringInvoices(): RecurringInvoiceHelper
    {
        return new RecurringInvoiceHelper($this);
    }

    public function paymentTypes(): PaymentTypeHelper
    {
        return new PaymentTypeHelper($this);
    }

    public function payments(): PaymentHelper
    {
        return new PaymentHelper($this);
    }
}
