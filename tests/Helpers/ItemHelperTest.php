<?php

namespace Helpers;

use Edata\FinvoiceClient\Filters\ItemsFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Helpers\ItemHelper;
use Edata\FinvoiceClient\Models\Item;
use PHPUnit\Framework\TestCase;

class ItemHelperTest extends TestCase
{
    public function testCanGetItems():void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $items = $finvoiceApi->items()->getItems();

        $this->assertIsArray($items);

        $this->assertGreaterThan(0, count($items));
    }

    public function testCanGetItem():void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $items = $finvoiceApi->items()->getItems();

        $this->assertIsArray($items);

        $this->assertGreaterThan(0, count($items));
    }

    public function testCanGetItemById():void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $items = $finvoiceApi->items()->getItems();

        $filter = new ItemsFilter();
        $filter->setId($items[0]->getId());

        $item = $finvoiceApi->items()->getItem($filter);

        $this->assertIsString($item->getName());

        $this->assertEquals($items[0]->getId(), $item->getId());
    }

    public function testCanFetchSingleVariableProduct(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $item = $finvoiceApi->items()->getItem(ItemsFilter::make()->setItemType(Item::ITEM_TYPE_VARIABLE));

        $this->assertEquals(Item::ITEM_TYPE_VARIABLE, $item->getItemType());
    }

    public function testCanParseVariants(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $items = $finvoiceApi->items()->getItems();

        $atLeastOneItemHasVariants = false;
        foreach ($items as $item) {
            if ($item->getItemType() == Item::ITEM_TYPE_VARIABLE) {
                $atLeastOneItemHasVariants = true;

                $this->assertIsArray($item->getItemVariants());

                $this->assertGreaterThan(0, count($item->getItemVariants()));

                break;
            }
        }

        $this->assertTrue($atLeastOneItemHasVariants);
    }
}
