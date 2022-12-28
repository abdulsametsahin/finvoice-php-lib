InvoiceItem
-----------



*   `id` (int|null): The ID of the invoice item.
*   `name` (string|null): The name of the invoice item.
*   `description` (string|null): The description of the invoice item.
*   `discountType` (string): The type of discount applied to the item. Can be 'fixed' or 'percentage'. Default value is 'fixed'.
*   `price` (float|null): The price of the invoice item.
*   `discount` (float|null): The discount applied to the invoice item.
*   `quantity` (float|null): The quantity of the invoice item.
*   `discountVal` (float): The value of the discount applied to the invoice item. Default value is 0.
*   `tax` (float|null): The tax applied to the invoice item.
*   `taxIncluded` (bool): A boolean value indicating whether tax is included in the price of the invoice item. Default value is false.
*   `taxes` (array): An array of taxes applied to the invoice item.
*   `total` (float|null): The total amount of the invoice item.
*   `itemId` (int|null): The ID of the item.
*   `variantId` (int|null): The ID of the variant.
*   `unitId` (int|null): The ID of the unit.
