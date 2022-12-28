Invoice
-------
*   `id` (int|null): The unique identifier of the invoice.
*   `type` (string|null): The type of the invoice. Can be one of the following values:
    *   `TYPE_INVOICE`: Indicates that the invoice is a regular invoice.
    *   `TYPE_ESTIMATE`: Indicates that the invoice is an estimate.
    *   `TYPE_CREDIT`: Indicates that the invoice is a credit invoice.
*   `sendReminder` (bool): Indicates whether a reminder should be sent for this invoice.
*   `invoiceDate` (DateTime|null): The date of the invoice.
*   `dueDate` (DateTime|null): The due date of the invoice.
*   `invoiceNumber` (string|null): The invoice number.
*   `estimateNumber` (string|null): The estimate number.
*   `referenceNumber` (string|null): The reference number of the invoice.
*   `status` (string|null): The status of the invoice.
*   `paidStatus` (string|null): The paid status of the invoice.
*   `taxPerItem` (string|null): The tax per item of the invoice.
*   `discountPerItem` (string|null): The discount per item of the invoice.
*   `notes` (string|null): The notes of the invoice.
*   `discountType` (string|null): The discount type of the invoice.
*   `discount` (string|null): The discount of the invoice.
*   `discountVal` (string|null): The calculated value of the discount applied to the invoice.
*   `subTotal` (int|null): The subtotal of the invoice.
*   `total` (int|null): The total amount of the invoice.
*   `tax` (int|null): The tax amount of the invoice.
*   `dueAmount` (int|null): The amount due for the invoice.
*   `sent` (bool): Indicates whether the invoice has been sent.
*   `viewed` (bool): Indicates whether the invoice has been viewed.
*   `uniqueHash` (string|null): The unique hash for the invoice.
*   `qrcode` (string|null): The QR code for the invoice.
*   `serieId` (int|null): The ID of the serie the invoice belongs to.
*   `invoiceTemplateId` (int|null): The ID of the invoice template used for the invoice.
*   `customerId` (int|null): The ID of the customer the invoice is for.
*   `authorId` (int|null): The ID of the user who created the invoice.
*   `remindersCount` (int|null): The number of reminders sent for the invoice.
*   `viewedAt` (DateTime|null): The date the invoice was viewed.
*   `updatedAt` (DateTime|null): The date the invoice was last updated.
*  `createdAt` (DateTime|null): The date the invoice was created.
