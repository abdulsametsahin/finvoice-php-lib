<?php

namespace Edata\FinvoiceClient\Filters;

class TaxesFilter implements FilterInterface
{
    private ?int $id = null;
    private ?string $name = null;
    private ?float $percent = null;

    public function __construct()
    {
    }

    public static function make(): TaxesFilter
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
     * @return TaxesFilter
     */
    public function setId(?int $id): TaxesFilter
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
     * @return TaxesFilter
     */
    public function setName(?string $name): TaxesFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPercent(): ?float
    {
        return $this->percent;
    }

    /**
     * @param float|null $percent
     * @return TaxesFilter
     */
    public function setPercent(?float $percent): TaxesFilter
    {
        $this->percent = $percent;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'percent' => $this->getPercent(),
        ];
    }
}
