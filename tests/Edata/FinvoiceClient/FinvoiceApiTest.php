<?php

namespace Edata\FinvoiceClient;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Filters\CustomersFilter;
use Edata\FinvoiceClient\Models\Customer;
use PHPUnit\Framework\TestCase;

class FinvoiceApiTest extends TestCase
{
    public function testConstructor(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $this->assertEquals(PROJECT_URL, $finvoiceApi->getProjectUrl());
        $this->assertEquals(API_KEY, $finvoiceApi->getApiKey());

        $this->assertInstanceOf(FinvoiceApi::class, $finvoiceApi);
    }

    public function testWrongCredentials(): void
    {
        $this->expectException(InvalidCredentialsException::class);

        $finvoiceApi = new FinvoiceApi(PROJECT_URL, "not_a_valid_api_key");

        $finvoiceApi->makeApiRequest('GET', 'customers');
    }

    public function testCorrectCredentials(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $response = $finvoiceApi->makeApiRequest('GET', 'customers');

        $this->assertIsArray($response);
    }

    public function testCanFetchCustomers(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $customersFilter = new CustomersFilter();
        $customersFilter->setLimit(-1);

        $customers = $finvoiceApi->customers()->getCustomers($customersFilter);

        $this->assertIsArray($customers);

        $this->assertGreaterThan(0, count($customers));
    }

    public function testCanCreateCustomer(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $customer = Customer::make()
            ->setName("Test Customer")
            ->setType(Customer::TYPE_INDIVIDUAL)
            ->setCurrencyId(3);

        $customer = $finvoiceApi->customers()->createCustomer($customer);

        $this->assertIsInt($customer->getId());
    }

    public function testCanFetchSingleCustomer(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $customersFilter = new CustomersFilter();
        $customersFilter->setLimit(1);

        $customer = $finvoiceApi->customers()->getCustomer($customersFilter);

        $this->assertInstanceOf(Customer::class, $customer);

        $this->assertIsInt($customer->getId());
    }
}
