<?php

namespace Edata\FinvoiceClient\Models;

use DateTime;

class Payment
{
    private ?int $id = null;
    private ?int $customerId = null;
    private ?int $invoiceId = null;
    private ?int $paymentTypeId = null;
    private ?string $paymentNumber = null;
    private ?string $paymentMode = null;
    private ?DateTime $paymentDate = null;
    private ?string $note = null;
    private float $amount = 0.0;

    public function __construct()
    {
    }

    public static function make(): Payment
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
     * @return Payment
     */
    public function setId(?int $id): Payment
    {
        $this->id = $id;
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
     * @return Payment
     */
    public function setCustomerId(?int $customerId): Payment
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInvoiceId(): ?int
    {
        return $this->invoiceId;
    }

    /**
     * @param int|null $invoiceId
     * @return Payment
     */
    public function setInvoiceId(?int $invoiceId): Payment
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentTypeId(): ?int
    {
        return $this->paymentTypeId;
    }

    /**
     * @param int|null $paymentTypeId
     * @return Payment
     */
    public function setPaymentTypeId(?int $paymentTypeId): Payment
    {
        $this->paymentTypeId = $paymentTypeId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentNumber(): ?string
    {
        return $this->paymentNumber;
    }

    /**
     * @param string|null $paymentNumber
     * @return Payment
     */
    public function setPaymentNumber(?string $paymentNumber): Payment
    {
        $this->paymentNumber = $paymentNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentMode(): ?string
    {
        return $this->paymentMode;
    }

    /**
     * @param string|null $paymentMode
     * @return Payment
     */
    public function setPaymentMode(?string $paymentMode): Payment
    {
        $this->paymentMode = $paymentMode;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getPaymentDate(): ?DateTime
    {
        return $this->paymentDate;
    }

    /**
     * @param DateTime|null $paymentDate
     * @return Payment
     */
    public function setPaymentDate(?DateTime $paymentDate): Payment
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return Payment
     */
    public function setNote(?string $note): Payment
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Payment
     */
    public function setAmount(float $amount): Payment
    {
        $this->amount = $amount;
        return $this;
    }

    public static function fromArray(array $data): Payment
    {
        return self::make()
            ->setId($data['id'] ?? null)
            ->setCustomerId($data['customer_id'] ?? null)
            ->setInvoiceId($data['invoice_id'] ?? null)
            ->setPaymentTypeId($data['payment_type_id'] ?? null)
            ->setPaymentNumber($data['payment_number'] ?? null)
            ->setPaymentMode($data['payment_mode'] ?? null)
            ->setPaymentDate(new DateTime($data['payment_date'] ?? null))
            ->setNote($data['note'] ?? null)
            ->setAmount($data['amount'] ?? 0.0);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'customer_id' => $this->getCustomerId(),
            'invoice_id' => $this->getInvoiceId(),
            'payment_type_id' => $this->getPaymentTypeId(),
            'payment_number' => $this->getPaymentNumber(),
            'payment_mode' => $this->getPaymentMode(),
            'payment_date' => $this->getPaymentDate() ? $this->getPaymentDate()->format('Y-m-d') : null,
            'note' => $this->getNote(),
            'amount' => $this->getAmount(),
        ];
    }
}
