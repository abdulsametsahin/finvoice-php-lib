<?php

namespace Edata\FinvoiceClient\Models;

class Item
{
    const ITEM_TYPE_VARIABLE = 'variable';
    const ITEM_TYPE_SIMPLE = 'simple';

    private ?int $id = null;
    private ?int $categoryId = null;
    private string $name = '';
    private ?string $description = null;
    private ?string $photo = null;
    private float $price = 0;
    private ?int $stock = null;
    private ?string $itemType = null;

    /**
     * @var ItemVariant[]
     */
    private ?array $itemVariants = [];

    public function __construct()
    {
    }

    public static function make(): Item
    {
        return new self();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Item
     */
    public function setId(?int $id): Item
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int|null $categoryId
     * @return Item
     */
    public function setCategoryId(?int $categoryId): Item
    {
        $this->categoryId = $categoryId;
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
     * @return Item
     */
    public function setName(string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Item
     */
    public function setDescription(?string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @param string|null $photo
     * @return Item
     */
    public function setPhoto(?string $photo): Item
    {
        $this->photo = $photo;
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
     * @return Item
     */
    public function setPrice(float $price): Item
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStock(): ?int
    {
        return $this->stock;
    }

    /**
     * @param int|null $stock
     * @return Item
     */
    public function setStock(?int $stock): Item
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getItemType(): ?string
    {
        return $this->itemType;
    }

    /**
     * @param string|null $itemType
     * @return Item
     */
    public function setItemType(?string $itemType): Item
    {
        $this->itemType = $itemType;
        return $this;
    }

    /**
     * @return ItemVariant[]|null
     */
    public function getItemVariants(): ?array
    {
        return $this->itemVariants;
    }

    /**
     * @param ItemVariant[]|null $itemVariants
     * @return Item
     */
    public function setItemVariants(?array $itemVariants): Item
    {
        $this->itemVariants = $itemVariants;
        return $this;
    }

    /**
     * @param array<string, mixed> $data
     * @return Item
     */
    public static function fromArray(array $data): Item
    {
        return self::make()
            ->setId($data['id'] ?? null)
            ->setCategoryId($data['category_id'] ?? null)
            ->setName($data['name'] ?? '')
            ->setDescription($data['description'] ?? null)
            ->setPhoto($data['photo'] ?? null)
            ->setPrice($data['price'] ?? 0)
            ->setStock($data['stock'] ?? null)
            ->setItemType($data['item_type'] ?? null)
            ->setItemVariants(
                array_map(
                    function ($itemVariant) {
                        return ItemVariant::fromArray($itemVariant);
                    },
                    $data['variants'] ?? []
                )
            );
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'category_id' => $this->getCategoryId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'photo' => $this->getPhoto(),
            'price' => $this->getPrice(),
            'stock' => $this->getStock(),
            'item_type' => $this->getItemType(),
            'variants' => array_map(
                function ($itemVariant) {
                    return $itemVariant->toArray();
                },
                $this->getItemVariants() ?? []
            ),
        ];
    }
}
