RecurringInvoice
----


*   `$id` (int|null): The unique identifier for the recurring invoice.
*   `$type` (string|null): The type of the recurring invoice. Can be one of the following constants:
    *   `PERIOD_DAILY`: Indicates a daily recurring invoice.
    *   `PERIOD_WEEKLY`: Indicates a weekly recurring invoice.
    *   `PERIOD_MONTHLY`: Indicates a monthly recurring invoice.
    *   `TYPE_INVOICE`: Indicates a recurring invoice.
    *   `TYPE_ESTIMATE`: Indicates a recurring estimate.
    *   `TYPE_CREDIT`: Indicates a recurring credit invoice.
*   `$startDate` (DateTime|null): The start date for the recurring invoice.
*   `$endDate` (DateTime|null): The end date for the recurring invoice.
*   `$period` (string|null): The period of the recurring invoice. Can be one of the following constants:
    *   `PERIOD_DAILY`: Indicates a daily recurring invoice.
    *   `PERIOD_WEEKLY`: Indicates a weekly recurring invoice.
    *   `PERIOD_MONTHLY`: Indicates a monthly recurring invoice.
*   `$startOfTheMonth` (bool): Indicates whether the recurring invoice should be issued at the start of the month.
*   `$endOfTheMonth` (bool): Indicates whether the recurring invoice should be issued at the end of the month.
*   `$interval` (int|null): The interval between each issuance of the recurring invoice.
*   `$dueDays` (int|null): The number of days before the due date of the recurring invoice.
*   `$limit` (int|null): The maximum number of times the recurring invoice should be issued.
*   `$sendInvoices` (int): The number of invoices that have been sent for the recurring invoice.
*   `$lastIssue` (DateTime|null): The date of the last issuance of the recurring invoice.
*   `$issuedTotal` (int): The total number of invoices that have been issued for the recurring invoice.
*   `$taxPerItem` (bool): Indicates whether tax should be applied to each item in the recurring invoice.
*   `$notes` (string|null): Notes for the recurring invoice.
*   `$discountType` (string|null): The type of discount to apply to the recurring invoice. Can be either 'fixed' or 'percentage'.
*   `$discount` (float): The discount amount to apply to the recurring invoice.
*   `$discountVal` (int): The value of the discount to apply to the recurring invoice.
*   `$subTotal` (int|null): The sub-total for the recurring invoice.
*   `$total` (int|null): The total amount for the recurring invoice.
*   `$tax` (int|null): The tax amount for the recurring invoice.
*   `$invoiceTemplateId` (int|null): The unique identifier for the invoice template to use for the recurring invoice.
*   `$customerId` (int|null): The unique identifier for the customer associated with the recurring invoice.
*   `$serieId` (int|null): The unique identifier for the serie associated with the recurring invoice.
*  `createdAt` (DateTime|null): The date and time when the recurring invoice was created.
* `updatedAt` (DateTime|null): The date and time when the recurring invoice was last updated.
