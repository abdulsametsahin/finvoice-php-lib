<?php

namespace Edata\FinvoiceClient\Filters;

class RecurringInvoicesFilter implements FilterInterface
{
    private ?int $id = null;
    private ?int $customerId = null;

    public function __construct()
    {
    }

    public static function make(): RecurringInvoicesFilter
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
     * @return RecurringInvoicesFilter
     */
    public function setId(?int $id): RecurringInvoicesFilter
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
     * @return RecurringInvoicesFilter
     */
    public function setCustomerId(?int $customerId): RecurringInvoicesFilter
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'customer_id' => $this->getCustomerId(),
        ];
    }
}
