<?php

namespace Edata\FinvoiceClient\Filters;

class InvoicesFilter implements FilterInterface
{
    private ?int $id;
    private ?int $customerId;
    private ?string $invoiceNumber;

    private ?int $limit = -1;

    public function __construct()
    {
    }

    /**
     * @param int|null $id
     * @return InvoicesFilter
     */
    public function setId(?int $id): InvoicesFilter
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param int|null $customerId
     * @return InvoicesFilter
     */
    public function setCustomerId(?int $customerId): InvoicesFilter
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @param string|null $invoiceNumber
     * @return InvoicesFilter
     */
    public function setInvoiceNumber(?string $invoiceNumber): InvoicesFilter
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * @param int|null $limit
     * @return InvoicesFilter
     */
    public function setLimit(?int $limit): InvoicesFilter
    {
        $this->limit = $limit;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'customerId' => $this->customerId,
            'invoiceNumber' => $this->invoiceNumber,
            'limit' => $this->limit,
        ];
    }
}
