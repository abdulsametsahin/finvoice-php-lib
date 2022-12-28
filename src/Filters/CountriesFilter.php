<?php

namespace Edata\FinvoiceClient\Filters;

class CountriesFilter implements FilterInterface
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $code = null;
    private ?string $phoneCode = null;
    private int $limit = -1;

    public function __construct()
    {
    }

    /**
     * @param int|null $id
     * @return CountriesFilter
     */
    public function setId(?int $id): CountriesFilter
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string|null $name
     * @return CountriesFilter
     */
    public function setName(?string $name): CountriesFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string|null $code
     * @return CountriesFilter
     */
    public function setCode(?string $code): CountriesFilter
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string|null $phoneCode
     * @return CountriesFilter
     */
    public function setPhoneCode(?string $phoneCode): CountriesFilter
    {
        $this->phoneCode = $phoneCode;
        return $this;
    }

    /**
     * @param int $limit
     * @return CountriesFilter
     */
    public function setLimit(int $limit): CountriesFilter
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
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'code' => $this->code ?? null,
            'phone_code' => $this->phoneCode ?? null,
            'limit' => $this->limit,
        ];
    }
}
