<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\CannotCreateCustomer;
use Edata\FinvoiceClient\Exceptions\CustomerNotFoundException;
use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Filters\CustomersFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Customer;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class CustomerHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param CustomersFilter|null $customersFilter
     * @return Customer[]
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     * @throws Exception
     */
    public function getCustomers(CustomersFilter $customersFilter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', 'customers', $customersFilter ? $customersFilter->toArray() : []);

        if (empty($response) || empty($response['customers'])) {
            return [];
        }

        return array_map(function ($value) {
            return Customer::fromArray($value);
        }, $response['customers']['data'] ?? $response['customers']);
    }

    /**
     * @param CustomersFilter $customersFilter
     * @return Customer
     * @throws CustomerNotFoundException
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function getCustomer(CustomersFilter $customersFilter = null): Customer
    {
        $customers = $this->getCustomers($customersFilter);

        if (empty($customers)) {
            throw new CustomerNotFoundException();
        }

        return $customers[0];
    }

    /**
     * @param Customer $customer
     * @return Customer
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function createCustomer(Customer $customer): Customer
    {
        $response = $this->finvoiceApi->makeApiRequest('POST', 'customers', $customer->toArray());
        if (empty($response) || empty($response['customer'])) {
            throw new CannotCreateCustomer();
        }

        return Customer::fromArray($response['customer']);
    }
}
