<?php

namespace Edata\FinvoiceClient\Models;

class InvoiceItem
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?string $discountType = 'fixed';
    private ?float $price = null;
    private ?float $discount = null;
    private ?float $quantity = null;
    private ?float $discountVal = 0;
    private ?float $tax = 0;
    private bool $taxIncluded = false;
    private array $taxes = [];
    private ?float $total = null;
    private ?int $itemId = null;
    private ?int $variantId = null;
    private ?int $unitId = null;

    public function __construct()
    {
    }

    public static function make(): InvoiceItem
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
     * @return InvoiceItem
     */
    public function setId(?int $id): InvoiceItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return InvoiceItem
     */
    public function setName(?string $name): InvoiceItem
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
     * @return InvoiceItem
     */
    public function setDescription(?string $description): InvoiceItem
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscountType(): ?string
    {
        return $this->discountType;
    }

    /**
     * @param string|null $discountType
     * @return InvoiceItem
     */
    public function setDiscountType(?string $discountType): InvoiceItem
    {
        $this->discountType = $discountType;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return InvoiceItem
     */
    public function setPrice(?float $price): InvoiceItem
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float|null $discount
     * @return InvoiceItem
     */
    public function setDiscount(?float $discount): InvoiceItem
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float|null $quantity
     * @return InvoiceItem
     */
    public function setQuantity(?float $quantity): InvoiceItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDiscountVal(): ?float
    {
        return $this->discountVal;
    }

    /**
     * @param float|null $discountVal
     * @return InvoiceItem
     */
    public function setDiscountVal(?float $discountVal): InvoiceItem
    {
        $this->discountVal = $discountVal;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTax(): ?float
    {
        return $this->tax;
    }

    /**
     * @param float|null $tax
     * @return InvoiceItem
     */
    public function setTax(?float $tax): InvoiceItem
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     * @return InvoiceItem
     */
    public function setTotal(?float $total): InvoiceItem
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getItemId(): ?int
    {
        return $this->itemId;
    }

    /**
     * @param int|null $itemId
     * @return InvoiceItem
     */
    public function setItemId(?int $itemId): InvoiceItem
    {
        $this->itemId = $itemId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * @param int|null $variantId
     * @return InvoiceItem
     */
    public function setVariantId(?int $variantId): InvoiceItem
    {
        $this->variantId = $variantId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnitId(): ?int
    {
        return $this->unitId;
    }

    /**
     * @param int|null $unitId
     * @return InvoiceItem
     */
    public function setUnitId(?int $unitId): InvoiceItem
    {
        $this->unitId = $unitId;
        return $this;
    }

    /**
     * @param array<string, mixed> $data
     * @return InvoiceItem
     */
    public static function fromArray(array $data): InvoiceItem
    {
        return (new InvoiceItem())
            ->setId($data['id'] ?? null)
            ->setName($data['name'] ?? null)
            ->setDescription($data['description'] ?? null)
            ->setDiscountType($data['discount_type'] ?? null)
            ->setPrice($data['price'] ?? null)
            ->setTaxes($data['taxes'] ?? [])
            ->setDiscount($data['discount'] ?? null)
            ->setQuantity($data['quantity'] ?? null)
            ->setDiscountVal($data['discount_val'] ?? null)
            ->setTax($data['tax'] ?? null)
            ->setTotal($data['total'] ?? null)
            ->setItemId($data['item_id'] ?? null)
            ->setVariantId($data['variant_id'] ?? null)
            ->setUnitId($data['unit_id'] ?? null);
    }

    /**
     * @param Item $item
     * @return InvoiceItem
     */
    public static function fromItem(Item $item): InvoiceItem
    {
        return self::make()
            ->setItemId($item->getId())
            ->setName($item->getName())
            ->setDescription($item->getDescription())
            ->setPrice($item->getPrice())
            ->setQuantity(1);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'discount_type' => $this->getDiscountType(),
            'price' => $this->getPrice(),
            'discount' => $this->getDiscount(),
            'quantity' => $this->getQuantity(),
            'discount_val' => $this->getDiscountVal(),
            'tax' => $this->getTax(),
            'taxes' => $this->getTaxes(),
            'total' => $this->getTotal(),
            'item_id' => $this->getItemId(),
            'variant_id' => $this->getVariantId(),
            'unit_id' => $this->getUnitId(),
            'taxIncluded' => $this->isTaxIncluded(),
        ];
    }

    /**
     * @return array
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    public function setTaxes(array $taxes): InvoiceItem
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxIncluded(): bool
    {
        return $this->taxIncluded;
    }

    /**
     * @param bool $taxIncluded
     * @return InvoiceItem
     */
    public function setTaxIncluded(bool $taxIncluded): InvoiceItem
    {
        $this->taxIncluded = $taxIncluded;
        return $this;
    }

    public function getSubTotal()
    {
        return $this->getPrice() * $this->getQuantity();
    }

    public function calculateTotal()
    {
        $this->setDiscount($this->getDiscount() ?? 0);
        $this->setDiscountVal($this->getDiscountVal() ?? 0);
        $this->setTax($this->getTax() ?? 0);

        $this->setTotal($this->getSubTotal() - $this->getDiscountVal());
    }
}
