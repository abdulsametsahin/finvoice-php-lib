<?php

namespace Helpers;

use DateTime;
use Edata\FinvoiceClient\Exceptions\CustomerNotFoundException;
use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Exceptions\InvoiceNotFoundException;
use Edata\FinvoiceClient\Exceptions\ItemNotFoundException;
use Edata\FinvoiceClient\Exceptions\SeriesNotFoundException;
use Edata\FinvoiceClient\Filters\ItemsFilter;
use Edata\FinvoiceClient\Filters\SeriesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Invoice;
use Edata\FinvoiceClient\Models\InvoiceItem;
use Edata\FinvoiceClient\Models\Item;
use Edata\FinvoiceClient\Models\Payment;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

class InvoiceHelperTest extends TestCase
{
    public function testCanGetInvoices(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $invoices = $finvoiceApi->invoices()->getInvoices();

        $this->assertIsArray($invoices);

        $this->assertGreaterThan(0, count($invoices));
    }

    public function testCanGetInvoice(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $invoices = $finvoiceApi->invoices()->getInvoices();

        $this->assertIsArray($invoices);

        $this->assertGreaterThan(0, count($invoices));
    }

    public function testCanParseInvoiceItems(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $invoices = $finvoiceApi->invoices()->getInvoices();

        $this->assertIsArray($invoices);

        $this->assertGreaterThan(0, count($invoices));

        $this->assertIsArray($invoices[0]->getItems());

        $this->assertGreaterThan(0, count($invoices[0]->getItems()));

        $this->assertIsString($invoices[0]->getItems()[0]->getName());
    }

    /**
     * @throws InvalidCredentialsException
     * @throws InvoiceNotFoundException
     * @throws CustomerNotFoundException
     * @throws ItemNotFoundException
     * @throws GuzzleException
     * @throws SeriesNotFoundException
     */
    public function testCanCreateInvoice(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);
        $myInvoice = Invoice::make();
        $customer = $finvoiceApi->customers()->getCustomer();
        $item = $finvoiceApi->items()->getItem();
        $series = $finvoiceApi->series()->getSerie(SeriesFilter::make()->setType(Invoice::TYPE_INVOICE));

        $myInvoice
            ->setCustomerId($customer->getId())
            ->setSerieId($series->getId())
            ->setItems([
                InvoiceItem::fromItem($item)
            ])
            ->setDueDate(new DateTime('now + 1 week'));
        $start = microtime(true);
        $invoice = $finvoiceApi
            ->invoices()
            ->createInvoice($myInvoice);

        $this->assertIsString($invoice->getInvoiceNumber());
        $this->assertIsInt($invoice->getId());

        $this->assertGreaterThan(0, $invoice->getId());

        $this->assertIsArray($invoice->getItems());

        $this->assertGreaterThan(0, count($invoice->getItems()));
    }

     /**
     * @throws InvalidCredentialsException
     * @throws InvoiceNotFoundException
     * @throws CustomerNotFoundException
     * @throws ItemNotFoundException
     * @throws GuzzleException
     * @throws SeriesNotFoundException
     */
    public function testTaxIncluded(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $myInvoice = Invoice::make();
        $customer = $finvoiceApi->customers()->getCustomer();
        $item = $finvoiceApi->items()->getItem();
        $series = $finvoiceApi->series()->getSerie(SeriesFilter::make()->setType(Invoice::TYPE_INVOICE));
        $tax = $finvoiceApi->taxes()->getTaxes()[0];

        $myInvoice
            ->setCustomerId($customer->getId())
            ->setSerieId($series->getId())
            ->setItems([
                InvoiceItem::fromItem($item)
                    ->setTaxIncluded(true)
                    ->setTaxes([
                        $tax->getId()
                    ])
            ])
            ->setDueDate(new DateTime('now + 1 week'));

        $invoice = $finvoiceApi
            ->invoices()
            ->createInvoice($myInvoice);

        $this->assertIsString($invoice->getInvoiceNumber());
        $this->assertIsInt($invoice->getId());

        $this->assertEquals($invoice->getTotal(), $item->getPrice());
    }

    /**
     * @throws InvalidCredentialsException
     * @throws InvoiceNotFoundException
     * @throws CustomerNotFoundException
     * @throws ItemNotFoundException
     * @throws GuzzleException
     * @throws SeriesNotFoundException
     */
    public function testTaxNotIncluded(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $myInvoice = Invoice::make();
        $customer = $finvoiceApi->customers()->getCustomer();
        $item = $finvoiceApi->items()->getItem();
        $series = $finvoiceApi->series()->getSerie(SeriesFilter::make()->setType(Invoice::TYPE_INVOICE));
        $tax = $finvoiceApi->taxes()->getTaxes()[0];

        $myInvoice
            ->setCustomerId($customer->getId())
            ->setSerieId($series->getId())
            ->setItems([
                InvoiceItem::fromItem($item)
                    ->setTaxIncluded(false)
                    ->setTaxes([
                        $tax->getId()
                    ])
            ])
            ->setDueDate(new DateTime('now + 1 week'));

        $invoice = $finvoiceApi
            ->invoices()
            ->createInvoice($myInvoice);

        $this->assertIsString($invoice->getInvoiceNumber());
        $this->assertIsInt($invoice->getId());

        $this->assertEquals($invoice->getTotal(), $item->getPrice() + $item->getPrice() * $tax->getPercent() / 100);
    }

    /**
     * @throws InvalidCredentialsException
     * @throws InvoiceNotFoundException
     * @throws ItemNotFoundException
     * @throws CustomerNotFoundException
     * @throws GuzzleException
     * @throws SeriesNotFoundException
     */
    public function testCanCreateInvoiceWithVariableProduct(): void
    {
        $start = microtime(true);
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $myInvoice = Invoice::make();
        $customer = $finvoiceApi->customers()->getCustomer();
        $item = $finvoiceApi->items()->getItem(ItemsFilter::make()->setItemType(Item::ITEM_TYPE_VARIABLE));
        $series = $finvoiceApi->series()->getSerie(SeriesFilter::make()->setType(Invoice::TYPE_INVOICE));

        $myInvoice
            ->setCustomerId($customer->getId())
            ->setSerieId($series->getId())
            ->setItems([
                InvoiceItem::fromItem($item)
                    ->setVariantId($item->getItemVariants()[0]->getId())
            ])
            ->setDueDate(new DateTime('now + 1 week'));

        $invoice = $finvoiceApi
            ->invoices()
            ->createInvoice($myInvoice);

        $this->assertIsString($invoice->getInvoiceNumber());
        $this->assertIsInt($invoice->getId());

        $this->assertGreaterThan(0, $invoice->getId());

        $this->assertIsArray($invoice->getItems());

        $this->assertGreaterThan(0, count($invoice->getItems()));

        $this->assertIsInt($invoice->getItems()[0]->getVariantId());
        $end = microtime(true);

        echo 'testCanCreateInvoiceWithVariableProduct: ' . ($end - $start) . PHP_EOL;
    }

    public function testCanAddPayment(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $myInvoice = Invoice::make();
        $customer = $finvoiceApi->customers()->getCustomer();
        $item = $finvoiceApi->items()->getItem(ItemsFilter::make()->setItemType(Item::ITEM_TYPE_VARIABLE));
        $series = $finvoiceApi->series()->getSerie(SeriesFilter::make()->setType(Invoice::TYPE_INVOICE));

        $myInvoice
            ->setCustomerId($customer->getId())
            ->setSerieId($series->getId())
            ->setItems([
                InvoiceItem::fromItem($item)
                    ->setVariantId($item->getItemVariants()[0]->getId())
            ])
            ->setDueDate(new DateTime('now + 1 week'));

        $invoice = $finvoiceApi
            ->invoices()
            ->createInvoice($myInvoice);

        $payment = $finvoiceApi->payments()->makePayment(Payment::make()
            ->setInvoiceId($invoice->getId())
            ->setCustomerId($customer->getId())
            ->setAmount($invoice->getTotal())
            ->setPaymentDate(new DateTime())
            ->setPaymentTypeId($finvoiceApi->paymentTypes()->getPaymentType()->getId())
        );

        $this->assertGreaterThan(0, $payment->getId());
    }
}
