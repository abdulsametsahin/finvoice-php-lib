<?php

namespace Edata\FinvoiceClient\Models;

use DateTime;

class Invoice
{
    const TYPE_INVOICE = 'invoice';
    const TYPE_ESTIMATE = 'estimate';
    const TYPE_CREDIT = 'credit_invoice';

    private ?int $id = null;
    private ?string $type = Invoice::TYPE_INVOICE;
    private bool $sendReminder = false;
    private ?DateTime $invoiceDate = null;
    private ?DateTime $dueDate = null;
    private ?string $invoiceNumber = null;
    private ?string $estimateNumber = null;
    private ?string $referenceNumber = null;
    private ?string $status = null;
    private ?string $paidStatus = null;
    private ?string $taxPerItem = null;
    private ?string $discountPerItem = null;
    private ?string $notes = null;
    private ?string $discountType = null;
    private ?string $discount = null;
    private ?string $discountVal = null;
    private ?int $subTotal = null;
    private ?int $total = null;
    private ?int $tax = null;
    private ?int $dueAmount = null;
    private bool $sent = false;
    private bool $viewed = false;
    private ?string $uniqueHash = null;
    private ?string $qrcode = null;
    private ?int $serieId = null;
    private ?int $invoiceTemplateId = null;
    private ?int $customerId = null;
    private ?int $authorId = null;
    private ?int $remindersCount = null;
    private ?DateTime $viewedAt = null;
    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;

    /**
     * @var InvoiceItem[]
     */
    private array $items = [];

    public function __construct()
    {
    }

    public static function make(): Invoice
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
     * @return Invoice
     */
    public function setId(?int $id): Invoice
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
     * @return Invoice
     */
    public function setType(?string $type): Invoice
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSendReminder(): bool
    {
        return $this->sendReminder;
    }

    /**
     * @param bool $sendReminder
     * @return Invoice
     */
    public function setSendReminder(bool $sendReminder): Invoice
    {
        $this->sendReminder = $sendReminder;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getInvoiceDate(): ?DateTime
    {
        return $this->invoiceDate;
    }

    /**
     * @param DateTime|null $invoiceDate
     * @return Invoice
     */
    public function setInvoiceDate(?DateTime $invoiceDate): Invoice
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDueDate(): ?DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param DateTime|null $dueDate
     * @return Invoice
     */
    public function setDueDate(?DateTime $dueDate): Invoice
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string|null $invoiceNumber
     * @return Invoice
     */
    public function setInvoiceNumber(?string $invoiceNumber): Invoice
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEstimateNumber(): ?string
    {
        return $this->estimateNumber;
    }

    /**
     * @param string|null $estimateNumber
     * @return Invoice
     */
    public function setEstimateNumber(?string $estimateNumber): Invoice
    {
        $this->estimateNumber = $estimateNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReferenceNumber(): ?string
    {
        return $this->referenceNumber;
    }

    /**
     * @param string|null $referenceNumber
     * @return Invoice
     */
    public function setReferenceNumber(?string $referenceNumber): Invoice
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return Invoice
     */
    public function setStatus(?string $status): Invoice
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaidStatus(): ?string
    {
        return $this->paidStatus;
    }

    /**
     * @param string|null $paidStatus
     * @return Invoice
     */
    public function setPaidStatus(?string $paidStatus): Invoice
    {
        $this->paidStatus = $paidStatus;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxPerItem(): ?string
    {
        return $this->taxPerItem;
    }

    /**
     * @param string|null $taxPerItem
     * @return Invoice
     */
    public function setTaxPerItem(?string $taxPerItem): Invoice
    {
        $this->taxPerItem = $taxPerItem;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscountPerItem(): ?string
    {
        return $this->discountPerItem;
    }

    /**
     * @param string|null $discountPerItem
     * @return Invoice
     */
    public function setDiscountPerItem(?string $discountPerItem): Invoice
    {
        $this->discountPerItem = $discountPerItem;
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
     * @return Invoice
     */
    public function setNotes(?string $notes): Invoice
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
     * @return Invoice
     */
    public function setDiscountType(?string $discountType): Invoice
    {
        $this->discountType = $discountType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    /**
     * @param string|null $discount
     * @return Invoice
     */
    public function setDiscount(?string $discount): Invoice
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscountVal(): ?string
    {
        return $this->discountVal;
    }

    /**
     * @param string|null $discountVal
     * @return Invoice
     */
    public function setDiscountVal(?string $discountVal): Invoice
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
     * @return Invoice
     */
    public function setSubTotal(?int $subTotal): Invoice
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
     * @return Invoice
     */
    public function setTotal(?int $total): Invoice
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
     * @return Invoice
     */
    public function setTax(?int $tax): Invoice
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDueAmount(): ?int
    {
        return $this->dueAmount;
    }

    /**
     * @param int|null $dueAmount
     * @return Invoice
     */
    public function setDueAmount(?int $dueAmount): Invoice
    {
        $this->dueAmount = $dueAmount;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSent(): bool
    {
        return $this->sent;
    }

    /**
     * @param bool $sent
     * @return Invoice
     */
    public function setSent(bool $sent): Invoice
    {
        $this->sent = $sent;
        return $this;
    }

    /**
     * @return bool
     */
    public function isViewed(): bool
    {
        return $this->viewed;
    }

    /**
     * @param bool $viewed
     * @return Invoice
     */
    public function setViewed(bool $viewed): Invoice
    {
        $this->viewed = $viewed;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUniqueHash(): ?string
    {
        return $this->uniqueHash;
    }

    /**
     * @param string|null $uniqueHash
     * @return Invoice
     */
    public function setUniqueHash(?string $uniqueHash): Invoice
    {
        $this->uniqueHash = $uniqueHash;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQrcode(): ?string
    {
        return $this->qrcode;
    }

    /**
     * @param string|null $qrcode
     * @return Invoice
     */
    public function setQrcode(?string $qrcode): Invoice
    {
        $this->qrcode = $qrcode;
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
     * @return Invoice
     */
    public function setSerieId(?int $serieId): Invoice
    {
        $this->serieId = $serieId;
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
     * @return Invoice
     */
    public function setInvoiceTemplateId(?int $invoiceTemplateId): Invoice
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
     * @return Invoice
     */
    public function setCustomerId(?int $customerId): Invoice
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    /**
     * @param int|null $authorId
     * @return Invoice
     */
    public function setAuthorId(?int $authorId): Invoice
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRemindersCount(): ?int
    {
        return $this->remindersCount;
    }

    /**
     * @param int|null $remindersCount
     * @return Invoice
     */
    public function setRemindersCount(?int $remindersCount): Invoice
    {
        $this->remindersCount = $remindersCount;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getViewedAt(): ?DateTime
    {
        return $this->viewedAt;
    }

    /**
     * @param DateTime|null $viewedAt
     * @return Invoice
     */
    public function setViewedAt(?DateTime $viewedAt): Invoice
    {
        $this->viewedAt = $viewedAt;
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
     * @return Invoice
     */
    public function setCreatedAt(?DateTime $createdAt): Invoice
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
     * @return Invoice
     */
    public function setUpdatedAt(?DateTime $updatedAt): Invoice
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return InvoiceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param InvoiceItem[] $items
     * @return Invoice
     */
    public function setItems(array $items): Invoice
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return Invoice
     */
    public function estimate(): Invoice
    {
        $this->type = self::TYPE_ESTIMATE;
        return $this;
    }

    /**
     * @return Invoice
     */
    public function credit(): Invoice
    {
        $this->type = self::TYPE_CREDIT;
        return $this;
    }


    /**
     * @param array<string, mixed> $data
     * @return Invoice
     * @throws \Exception
     */
    public static function fromArray(array $data): Invoice
    {
        $invoice = new Invoice();
        $invoice->setId($data['id'] ?? null);
        $invoice->setInvoiceNumber($data['invoice_number'] ?? null);
        $invoice->setInvoiceDate(new DateTime($data['invoice_date'] ?? null));
        $invoice->setDueDate(new DateTime($data['due_date'] ?? null));
        $invoice->setDiscount($data['discount'] ?? null);
        $invoice->setTax($data['tax'] ?? null);
        $invoice->setTotal($data['total'] ?? null);
        $invoice->setDueAmount($data['due_amount'] ?? null);
        $invoice->setSent($data['sent'] ?? null);
        $invoice->setViewed($data['viewed'] ?? null);
        $invoice->setUniqueHash($data['unique_hash'] ?? null);
        $invoice->setQrcode($data['qrcode'] ?? null);
        $invoice->setSerieId($data['serie_id'] ?? null);
        $invoice->setInvoiceTemplateId($data['invoice_template_id'] ?? null);
        $invoice->setCustomerId($data['customer_id'] ?? null);
        $invoice->setAuthorId($data['author_id'] ?? null);
        $invoice->setRemindersCount($data['reminders_count'] ?? null);
        $invoice->setViewedAt(new DateTime($data['viewed_at'] ?? null));
        $invoice->setCreatedAt(new DateTime($data['created_at'] ?? null));
        $invoice->setUpdatedAt(new DateTime($data['updated_at'] ?? null));
        $invoice->setItems(
            array_map(
                function (array $item) {
                    return InvoiceItem::fromArray($item);
                },
                $data['items'] ?? []
            )
        );
        return $invoice;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'invoice_number' => $this->getInvoiceNumber(),
            'invoice_date' => $this->getInvoiceDate() ? date('Y-m-d', $this->getInvoiceDate()->getTimestamp()) : null,
            'due_date' => $this->getDueDate() ? date('Y-m-d', $this->getDueDate()->getTimestamp()) : null,
            'discount' => $this->getDiscount(),
            'tax' => $this->getTax(),
            'due_amount' => $this->getDueAmount(),
            'sent' => $this->isSent(),
            'viewed' => $this->isViewed(),
            'unique_hash' => $this->getUniqueHash(),
            'qrcode' => $this->getQrcode(),
            'serie_id' => $this->getSerieId(),
            'invoice_template_id' => $this->getInvoiceTemplateId(),
            'customer_id' => $this->getCustomerId(),
            'author_id' => $this->getAuthorId(),
            'reminders_count' => $this->getRemindersCount(),
            'viewed_at' => $this->getViewedAt(),
            'created_at' => $this->getCreatedAt() ? date('Y-m-d H:i:s', $this->getCreatedAt()->getTimestamp()) : null,
            'updated_at' => $this->getUpdatedAt() ? date('Y-m-d H:i:s', $this->getUpdatedAt()->getTimestamp()) : null,
            'items' => array_map(
                function (InvoiceItem $item) {
                    return $item->toArray();
                },
                $this->getItems()
            ),
        ];
    }
}
