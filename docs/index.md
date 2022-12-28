# Finvoice PHP Library

### Requirements
- PHP 7.4 or higher
- Composer

### Installation
```bash
composer require finvoice/php-library
```

### Models
Finvoice api models are located in `src/Model` directory. Each model has a corresponding class in `src/Model` directory. For example `Invoice` model has `Invoice` class in `src/Model` directory.

We expect you to know the properties of the model you are using so that you can set the values correctly. For example, `Invoice` model has `invoiceNumber` property.

You can find the properties of each model below:
- [Address](/docs/model/address.md)
- [Country](/docs/model/country.md)
- [Currency](/docs/model/currency.md)
- [Customer](/docs/model/customer.md)
- [Invoice](/docs/model/invoice.md)
- [InvoiceItem](/docs/model/invoiceitem.md)
- [Item](/docs/model/item.md)
- [ItemVariant](/docs/model/itemvariant.md)
- [RecurringInvoice](/docs/model/recurringinvoice.md)
- [Series](/docs/model/series.md)
- [Tax](/docs/model/tax.md)

### Basic Usage
```php
<?php
    $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);
    
    $customer = $finvoiceApi->customers()->getCustomer(
        CustomersFilter::make()->setId(1);
    );
    $item = $finvoiceApi->items()->getItem(
        ItemsFilter::make()->setId(1);
    );
    $series = $finvoiceApi->series()->getSerie(
        SeriesFilter::make()->setType(Invoice::TYPE_INVOICE)
    );
    $tax = $finvoiceApi->taxes()->getTax(
        TaxesFilter::make()->setId(1);
    );
    
    $myInvoice = Invoice::make()
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
    
    $invoice = $finvoiceApi->invoices()->createInvoice($myInvoice);
?>
```

### Add payment
```php
<?php
    $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);
    $paymentType = $finvoiceApi->paymentTypes()->getPaymentType();
    $payment = Payment::make()
        ->setInvoiceId($invoice->getId())
        ->setCustomerId($customer->getId())
        ->setAmount($invoice->getTotal())
        ->setPaymentDate(new DateTime())
        ->setPaymentTypeId($paymentType->getId());
        
    $payment = $finvoiceApi->payments()->makePayment(
        $payment
    );
  
    var_dump($payment->getId());
?>
```
