<?php

namespace Helpers;

use DateTime;
use Edata\FinvoiceClient\Exceptions\RecurringInvoiceNotFoundException;
use Edata\FinvoiceClient\Filters\RecurringInvoicesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Helpers\RecurringInvoiceHelper;
use Edata\FinvoiceClient\Models\InvoiceItem;
use Edata\FinvoiceClient\Models\RecurringInvoice;
use PHPUnit\Framework\TestCase;

class RecurringInvoiceHelperTest extends TestCase
{

    public function testCanCreateRecurringInvoice(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $customer = $finvoiceApi->customers()->getCustomer();
        $item = $finvoiceApi->items()->getItem();
        $serie = $finvoiceApi->series()->getSerie();

        $recurringInvoice = RecurringInvoice::make()
            ->setCustomerId($customer->getId())
            ->setSerieId($serie->getId())
            ->setStartDate(new DateTime('now'))
            ->setPeriod(RecurringInvoice::PERIOD_MONTHLY)
            ->setInterval(1)
            ->setItems([
                InvoiceItem::fromItem($item)
                    ->setQuantity(1)
            ]);

        $recurringInvoice = $finvoiceApi->recurringInvoices()->createRecurringInvoice($recurringInvoice);

        $this->assertIsObject($recurringInvoice);

        $this->assertGreaterThan(0, $recurringInvoice->getId());
    }

    public function testCanFetchRecurringInvoices(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $recurringInvoices = $finvoiceApi->recurringInvoices()->getRecurringInvoices();

        $this->assertIsArray($recurringInvoices);

        $this->assertGreaterThan(0, count($recurringInvoices));
    }

    public function testCanFetchRecurringInvoice(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $recurringInvoices = $finvoiceApi->recurringInvoices()->getRecurringInvoices();

        $this->assertIsArray($recurringInvoices);

        $this->assertGreaterThan(0, count($recurringInvoices));
    }

    public function testCanParseRecurringInvoiceItems(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $recurringInvoices = $finvoiceApi->recurringInvoices()->getRecurringInvoices();

        $this->assertIsArray($recurringInvoices);

        $this->assertGreaterThan(0, count($recurringInvoices));

        $this->assertIsArray($recurringInvoices[0]->getItems());

        $this->assertGreaterThan(0, count($recurringInvoices[0]->getItems()));

        $this->assertIsString($recurringInvoices[0]->getItems()[0]->getName());
    }

    /**
     * @throws RecurringInvoiceNotFoundException
     */
    public function testCanFetchRecurringInvoiceById(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $recurringInvoices = $finvoiceApi->recurringInvoices()->getRecurringInvoices();

        $this->assertIsArray($recurringInvoices);

        $this->assertGreaterThan(0, count($recurringInvoices));

        $recurringInvoice = $finvoiceApi->recurringInvoices()->getRecurringInvoice(RecurringInvoicesFilter::make()->setId($recurringInvoices[0]->getId()));

        $this->assertIsObject($recurringInvoice);

        $this->assertEquals($recurringInvoices[0]->getId(), $recurringInvoice->getId());
    }

    /**
     * @throws RecurringInvoiceNotFoundException
     */
    public function testCanFetchRecurringInvoiceByCustomerId(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $recurringInvoices = $finvoiceApi->recurringInvoices()->getRecurringInvoices();

        $this->assertIsArray($recurringInvoices);

        $this->assertGreaterThan(0, count($recurringInvoices));

        $recurringInvoice = $finvoiceApi->recurringInvoices()->getRecurringInvoice(RecurringInvoicesFilter::make()->setCustomerId($recurringInvoices[0]->getCustomerId()));

        $this->assertIsObject($recurringInvoice);

        $this->assertEquals($recurringInvoices[0]->getCustomerId(), $recurringInvoice->getCustomerId());
    }
}
