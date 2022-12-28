<?php

namespace Edata\FinvoiceClient\Models;

use DateTime;

class RecurringInvoice
{
    const PERIOD_DAILY = 'day';
    const PERIOD_WEEKLY = 'week';
    const PERIOD_MONTHLY = 'month';
    const TYPE_INVOICE = 'invoice';
    const TYPE_ESTIMATE = 'estimate';
    const TYPE_CREDIT = 'credit_invoice';

    private ?int $id = null;
    private ?string $type = self::TYPE_INVOICE;
    private ?DateTime $startDate = null;
    private ?DateTime $endDate = null;
    private ?string $period = null;
    private bool $startOfTheMonth = false;
    private bool $endOfTheMonth = false;
    private ?int $interval = 0;
    private ?int $dueDays = 0;
    private ?int $limit = 0;
    private int $sendInvoices = 0;
    private ?DateTime $lastIssue = null;
    private int $issuedTotal = 0;
    private bool $taxPerItem = false;
    private ?string $notes = null;
    private ?string $discountType = 'fixed';
    private float $discount = 0;
    private int $discountVal = 0;
    private ?int $subTotal = null;
    private ?int $total = null;
    private ?int $tax = null;
    private ?int $invoiceTemplateId = 1;
    private ?int $customerId = null;
    private ?int $serieId = null;
    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;

    /**
     * @var InvoiceItem[]
     */
    private array $items = [];

    public function __construct()
    {
    }

    public static function make(): RecurringInvoice
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
     * @return RecurringInvoice
     */
    public function setId(?int $id): RecurringInvoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return RecurringInvoice
     */
    public function setType(?string $type): RecurringInvoice
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime|null $startDate
     * @return RecurringInvoice
     */
    public function setStartDate(?DateTime $startDate): RecurringInvoice
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime|null $endDate
     * @return RecurringInvoice
     */
    public function setEndDate(?DateTime $endDate): RecurringInvoice
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPeriod(): ?string
    {
        return $this->period;
    }

    /**
     * @param string|null $period
     * @return RecurringInvoice
     */
    public function setPeriod(?string $period): RecurringInvoice
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStartOfTheMonth(): bool
    {
        return $this->startOfTheMonth;
    }

    /**
     * @param bool $startOfTheMonth
     * @return RecurringInvoice
     */
    public function setStartOfTheMonth(bool $startOfTheMonth): RecurringInvoice
    {
        $this->startOfTheMonth = $startOfTheMonth;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEndOfTheMonth(): bool
    {
        return $this->endOfTheMonth;
    }

    /**
     * @param bool $endOfTheMonth
     * @return RecurringInvoice
     */
    public function setEndOfTheMonth(bool $endOfTheMonth): RecurringInvoice
    {
        $this->endOfTheMonth = $endOfTheMonth;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInterval(): ?int
    {
        return $this->interval;
    }

    /**
     * @param int|null $interval
     * @return RecurringInvoice
     */
    public function setInterval(?int $interval): RecurringInvoice
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDueDays(): ?int
    {
        return $this->dueDays;
    }

    /**
     * @param int|null $dueDays
     * @return RecurringInvoice
     */
    public function setDueDays(?int $dueDays): RecurringInvoice
    {
        $this->dueDays = $dueDays;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     * @return RecurringInvoice
     */
    public function setLimit(?int $limit): RecurringInvoice
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getSendInvoices(): int
    {
        return $this->sendInvoices;
    }

    /**
     * @param int $sendInvoices
     * @return RecurringInvoice
     */
    public function setSendInvoices(int $sendInvoices): RecurringInvoice
    {
        $this->sendInvoices = $sendInvoices;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getLastIssue(): ?DateTime
    {
        return $this->lastIssue;
    }

    /**
     * @param DateTime|null $lastIssue
     * @return RecurringInvoice
     */
    public function setLastIssue(?DateTime $lastIssue): RecurringInvoice
    {
        $this->lastIssue = $lastIssue;
        return $this;
    }

    /**
     * @return int
     */
    public function getIssuedTotal(): int
    {
        return $this->issuedTotal;
    }

    /**
     * @param int $issuedTotal
     * @return RecurringInvoice
     */
    public function setIssuedTotal(int $issuedTotal): RecurringInvoice
    {
        $this->issuedTotal = $issuedTotal;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxPerItem(): bool
    {
        return $this->taxPerItem;
    }

    /**
     * @param bool $taxPerItem
     * @return RecurringInvoice
     */
    public function setTaxPerItem(bool $taxPerItem): RecurringInvoice
    {
        $this->taxPerItem = $taxPerItem;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     * @return RecurringInvoice
     */
    public function setNotes(?string $notes): RecurringInvoice
    {
        $this->notes = $notes;
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
     * @return RecurringInvoice
     */
    public function setDiscountType(?string $discountType): RecurringInvoice
    {
        $this->discountType = $discountType;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return RecurringInvoice
     */
    public function setDiscount(float $discount): RecurringInvoice
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiscountVal(): int
    {
        return $this->discountVal;
    }

    /**
     * @param int $discountVal
     * @return RecurringInvoice
     */
    public function setDiscountVal(int $discountVal): RecurringInvoice
    {
        $this->discountVal = $discountVal;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubTotal(): ?int
    {
        return $this->subTotal;
    }

    /**
     * @param int|null $subTotal
     * @return RecurringInvoice
     */
    public function setSubTotal(?int $subTotal): RecurringInvoice
    {
        $this->subTotal = $subTotal;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * @param int|null $total
     * @return RecurringInvoice
     */
    public function setTotal(?int $total): RecurringInvoice
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * @param int|null $tax
     * @return RecurringInvoice
     */
    public function setTax(?int $tax): RecurringInvoice
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInvoiceTemplateId(): ?int
    {
        return $this->invoiceTemplateId;
    }

    /**
     * @param int|null $invoiceTemplateId
     * @return RecurringInvoice
     */
    public function setInvoiceTemplateId(?int $invoiceTemplateId): RecurringInvoice
    {
        $this->invoiceTemplateId = $invoiceTemplateId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * @param int|null $customerId
     * @return RecurringInvoice
     */
    public function setCustomerId(?int $customerId): RecurringInvoice
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSerieId(): ?int
    {
        return $this->serieId;
    }

    /**
     * @param int|null $serieId
     * @return RecurringInvoice
     */
    public function setSerieId(?int $serieId): RecurringInvoice
    {
        $this->serieId = $serieId;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $createdAt
     * @return RecurringInvoice
     */
    public function setCreatedAt(?DateTime $createdAt): RecurringInvoice
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|null $updatedAt
     * @return RecurringInvoice
     */
    public function setUpdatedAt(?DateTime $updatedAt): RecurringInvoice
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return RecurringInvoice
     */
    public function setItems(array $items): RecurringInvoice
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'start_date' => $this->getStartDate() ? $this->getStartDate()->format('Y-m-d') : null,
            'end_date' => $this->getEndDate() ? $this->getEndDate()->format('Y-m-d') : null,
            'tax_per_item' => $this->isTaxPerItem(),
            'start_of_the_period' => $this->isStartOfTheMonth(),
            'end_of_the_period' => $this->isEndOfTheMonth(),
            'send_invoices' => $this->getSendInvoices(),
            'period' => $this->getPeriod(),
            'interval' => $this->getInterval(),
            'notes' => $this->getNotes(),
            'discount_type' => $this->getDiscountType(),
            'discount' => $this->getDiscount(),
            'discount_val' => $this->getDiscountVal(),
            'sub_total' => $this->getSubTotal(),
            'total' => $this->getTotal(),
            'tax' => $this->getTax(),
            'invoice_template_id' => $this->getInvoiceTemplateId(),
            'customer_id' => $this->getCustomerId(),
            'serie_id' => $this->getSerieId(),
            'created_at' => $this->getCreatedAt() ? $this->getCreatedAt()->format('Y-m-d H:i:s') : null,
            'updated_at' => $this->getUpdatedAt() ? $this->getUpdatedAt()->format('Y-m-d H:i:s') : null,
            'items' => array_map(function (InvoiceItem $item) {
                return $item->toArray();
            }, $this->getItems()),
        ];
    }

    /**
     * @param array<string, mixed> $data
     * @return RecurringInvoice
     * @throws \Exception
     */
    public static function fromArray(array $data): RecurringInvoice
    {
       return (new RecurringInvoice())
            ->setId($data['id'] ?? null)
            ->setType($data['type'] ?? null)
            ->setStartDate($data['start_date'] ? new DateTime($data['start_date']) : null)
            ->setEndDate($data['end_date'] ? new DateTime($data['end_date']) : null)
            ->setTaxPerItem($data['tax_per_item'] ?? null)
            ->setStartOfTheMonth($data['start_of_the_period'] ?? null)
            ->setEndOfTheMonth($data['end_of_the_period'] ?? null)
            ->setSendInvoices($data['send_invoices'] ?? null)
            ->setPeriod($data['period'] ?? null)
            ->setInterval($data['interval'] ?? null)
            ->setNotes($data['notes'] ?? null)
            ->setDiscountType($data['discount_type'] ?? null)
            ->setDiscount($data['discount'] ?? null)
            ->setDiscountVal($data['discount_val'] ?? null)
            ->setSubTotal($data['sub_total'] ?? null)
            ->setTotal($data['total'] ?? null)
            ->setTax($data['tax'] ?? null)
            ->setInvoiceTemplateId($data['invoice_template_id'] ?? null)
            ->setCustomerId($data['customer_id'] ?? null)
            ->setSerieId($data['serie_id'] ?? null)
            ->setCreatedAt($data['created_at'] ? new DateTime($data['created_at']) : null)
            ->setUpdatedAt($data['updated_at'] ? new DateTime($data['updated_at']) : null)
            ->setItems(array_map(function (array $item) {
                return InvoiceItem::fromArray($item);
            }, $data['items'] ?? []));
    }

    public function calculateTotal()
    {
        $this->setSubTotal(0);
        $this->setTax(0);
        $this->setTotal(0);

        foreach ($this->getItems() as $item) {
            $item->calculateTotal();
            $this->setSubTotal($this->getSubTotal() + $item->getSubTotal());
            $this->setTax($this->getTax() + $item->getTax());
            $this->setTotal($this->getTotal() + $item->getTotal());
        }

        if ($this->getDiscountType() === 'percentage') {
            $this->setDiscountVal($this->getSubTotal() * $this->getDiscount() / 100);
        } else {
            $this->setDiscountVal($this->getDiscount());
        }

        $this->setSubTotal($this->getSubTotal() - $this->getDiscountVal());
        $this->setTotal($this->getTotal() - $this->getDiscountVal());
    }
}
