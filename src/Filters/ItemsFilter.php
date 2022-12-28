<?php

namespace Edata\FinvoiceClient\Filters;

class ItemsFilter implements FilterInterface
{
    private ?int $id = null;
    private ?int $categoryId = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?string $photo = null;
    private ?float $price = null;
    private ?int $stock = null;
    private ?string $itemType = null;

    private int $limit = -1;

    public function __construct()
    {
    }

    public static function make(): ItemsFilter
    {
        return new self();
    }

    /**
     * @param int|null $id
     * @return ItemsFilter
     */
    public function setId(?int $id): ItemsFilter
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param int|null $categoryId
     * @return ItemsFilter
     */
    public function setCategoryId(?int $categoryId): ItemsFilter
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @param string|null $name
     * @return ItemsFilter
     */
    public function setName(?string $name): ItemsFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string|null $description
     * @return ItemsFilter
     */
    public function setDescription(?string $description): ItemsFilter
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string|null $photo
     * @return ItemsFilter
     */
    public function setPhoto(?string $photo): ItemsFilter
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @param float|null $price
     * @return ItemsFilter
     */
    public function setPrice(?float $price): ItemsFilter
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param int|null $stock
     * @return ItemsFilter
     */
    public function setStock(?int $stock): ItemsFilter
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @param string|null $itemType
     * @return ItemsFilter
     */
    public function setItemType(?string $itemType): ItemsFilter
    {
        $this->itemType = $itemType;
        return $this;
    }

    /**
     * @param int $limit
     * @return ItemsFilter
     */
    public function setLimit(int $limit): ItemsFilter
    {
        $this->limit = $limit;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->categoryId,
            'name' => $this->name,
            'description' => $this->description,
            'photo' => $this->photo,
            'price' => $this->price,
            'stock' => $this->stock,
            'item_type' => $this->itemType,
            'limit' => $this->limit,
        ];
    }
}
