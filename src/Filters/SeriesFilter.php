<?php

namespace Edata\FinvoiceClient\Filters;

class SeriesFilter implements FilterInterface
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $type = null;

    public function __construct()
    {
    }

    public static function make(): SeriesFilter
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
     * @return SeriesFilter
     */
    public function setId(?int $id): SeriesFilter
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
     * @return SeriesFilter
     */
    public function setName(?string $name): SeriesFilter
    {
        $this->name = $name;
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
     * @return SeriesFilter
     */
    public function setType(?string $type): SeriesFilter
    {
        $this->type = $type;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'type' => $this->getType(),
        ];
    }
}
