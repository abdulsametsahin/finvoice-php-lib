<?php

namespace Edata\FinvoiceClient\Models;

class Series
{
    private ?int $id = null;
    private ?string $prefix = null;
    private ?string $type = null;

    public function __construct()
    {
    }

    public static function make(): Series
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
     * @return Series
     */
    public function setId(?int $id): Series
    {
        $this->id = $id;
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
     * @return Series
     */
    public function setPrefix(?string $prefix): Series
    {
        $this->prefix = $prefix;
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
     * @return Series
     */
    public function setType(?string $type): Series
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param array<string, mixed> $data
     * @return Series
     */
    public static function fromArray(array $data): Series
    {
        return self::make()
            ->setId($data['id'] ?? null)
            ->setPrefix($data['prefix'] ?? null)
            ->setType($data['type'] ?? null);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'prefix' => $this->prefix,
            'type' => $this->type,
        ];
    }
}
