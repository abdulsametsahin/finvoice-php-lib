Item
----



*   `id` (int|null): The ID of the item.
*   `categoryId` (int|null): The ID of the category that the item belongs to.
*   `name` (string): The name of the item.
*   `description` (string|null): A description of the item.
*   `photo` (string|null): The URL of a photo of the item.
*   `price` (float): The price of the item.
*   `stock` (int|null): The number of items in stock.
*   `itemType` (string|null): The type of the item. Can be `ITEM_TYPE_VARIABLE` or `ITEM_TYPE_SIMPLE`.
*   `itemVariants` (array|null): An array of `ItemVariant` objects, representing the different variants of the item.
