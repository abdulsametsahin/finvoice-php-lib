<?php

namespace Edata\FinvoiceClient\Filters;

class CurrenciesFilter implements FilterInterface
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $code = null;
    private ?string $symbol = null;
    private int $limit = -1;

    public function __construct(
    ) {
    }

    /**
     * @param int|null $id
     * @return CurrenciesFilter
     */
    public function setId(?int $id): CurrenciesFilter
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string|null $name
     * @return CurrenciesFilter
     */
    public function setName(?string $name): CurrenciesFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string|null $code
     * @return CurrenciesFilter
     */
    public function setCode(?string $code): CurrenciesFilter
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string|null $symbol
     * @return CurrenciesFilter
     */
    public function setSymbol(?string $symbol): CurrenciesFilter
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @param int $limit
     * @return CurrenciesFilter
     */
    public function setLimit(int $limit): CurrenciesFilter
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'symbol' => $this->symbol,
            'limit' => $this->limit,
        ];
    }
}
