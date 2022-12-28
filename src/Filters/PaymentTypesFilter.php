<?php

namespace Edata\FinvoiceClient\Filters;

class PaymentTypesFilter implements FilterInterface
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $title = null;
    private ?string $prefix = null;

    public function __construct()
    {
    }

    public static function make(): PaymentTypesFilter
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
     * @return PaymentTypesFilter
     */
    public function setId(?int $id): PaymentTypesFilter
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
     * @return PaymentTypesFilter
     */
    public function setName(?string $name): PaymentTypesFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return PaymentTypesFilter
     */
    public function setTitle(?string $title): PaymentTypesFilter
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @param string|null $prefix
     * @return PaymentTypesFilter
     */
    public function setPrefix(?string $prefix): PaymentTypesFilter
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'prefix' => $this->getPrefix(),
        ];
    }
}
