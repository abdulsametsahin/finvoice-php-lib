<?php

namespace Edata\FinvoiceClient\Models;

class Currency
{
    private ?int $id;
    private string $name;
    private string $code;
    private string $symbol;

    public function __construct(
    ) {
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
     * @return Currency
     */
    public function setId(?int $id): Currency
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Currency
     */
    public function setName(string $name): Currency
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Currency
     */
    public function setCode(string $code): Currency
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return Currency
     */
    public function setSymbol(string $symbol): Currency
    {
        $this->symbol = $symbol;
        return $this;
    }

    public static function make(): Currency
    {
        return new self();
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId() ?? null,
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'symbol' => $this->getSymbol(),
        ];
    }

    /**
     * @param array<string, mixed> $data
     * @return Currency
     */
    public static function fromArray(array $data): Currency
    {
        return self::make()
            ->setId($data['id'] ?? null)
            ->setName($data['name'] ?? '')
            ->setCode($data['code'] ?? '')
            ->setSymbol($data['symbol'] ?? '');
    }
}
