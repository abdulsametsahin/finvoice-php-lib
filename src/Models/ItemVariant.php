<?php

namespace Edata\FinvoiceClient\Models;

class ItemVariant
{
    private int $id;
    private int $itemId;
    private bool $isDefault;
    private string $name;
    private float $price;
    private int $stock;

    public function __construct()
    {
    }

    public static function make(): ItemVariant
    {
        return new self();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ItemVariant
     */
    public function setId(int $id): ItemVariant
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /**
     * @param int $itemId
     * @return ItemVariant
     */
    public function setItemId(int $itemId): ItemVariant
    {
        $this->itemId = $itemId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @param bool $isDefault
     * @return ItemVariant
     */
    public function setIsDefault(bool $isDefault): ItemVariant
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ItemVariant
     */
    public function setName(string $name): ItemVariant
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return ItemVariant
     */
    public function setPrice(float $price): ItemVariant
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     * @return ItemVariant
     */
    public function setStock(int $stock): ItemVariant
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @param array<string, mixed> $data
     * @return ItemVariant
     */
    public static function fromArray(array $data): ItemVariant
    {
        return self::make()
            ->setId($data['id'] ?? null)
            ->setItemId($data['item_id'] ?? null)
            ->setIsDefault($data['is_default'] ?? false)
            ->setName($data['name'] ?? '')
            ->setPrice($data['price'] ?? 0.0)
            ->setStock($data['stock'] ?? 0);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'item_id' => $this->getItemId(),
            'is_default' => $this->isDefault(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'stock' => $this->getStock(),
        ];
    }
}
