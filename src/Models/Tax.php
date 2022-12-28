<?php

namespace Edata\FinvoiceClient\Models;

class Tax
{
    private ?int $id = null;
    private ?string $name = null;
    private ?float $percent = null;

    public function __construct()
    {
    }

    public static function make(): Tax
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
     * @return Tax
     */
    public function setId(?int $id): Tax
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
     * @return Tax
     */
    public function setName(?string $name): Tax
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
     * @return Tax
     */
    public function setPercent(?float $percent): Tax
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

    /**
     * @param array<string, mixed> $data
     * @return Tax
     */
    public static function fromArray(array $data): Tax
    {
        return (new Tax())
            ->setId($data['id'] ?? null)
            ->setName($data['name'] ?? null)
            ->setPercent($data['percent'] ?? null);
    }
}
