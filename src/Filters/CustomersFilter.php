<?php

namespace Edata\FinvoiceClient\Filters;

class CustomersFilter implements FilterInterface
{
    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $type;
    private ?string $phone;
    private ?string $contactName;
    private ?string $companyName;
    private ?string $companyCode;
    private ?string $vatCode;
    private int $limit = -1;

    public function __construct()
    {

    }

    /**
     * @param int|null $id
     * @return CustomersFilter
     */
    public function setId(?int $id): CustomersFilter
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string|null $name
     * @return CustomersFilter
     */
    public function setName(?string $name): CustomersFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string|null $email
     * @return CustomersFilter
     */
    public function setEmail(?string $email): CustomersFilter
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string|null $type
     * @return CustomersFilter
     */
    public function setType(?string $type): CustomersFilter
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string|null $phone
     * @return CustomersFilter
     */
    public function setPhone(?string $phone): CustomersFilter
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param string|null $contactName
     * @return CustomersFilter
     */
    public function setContactName(?string $contactName): CustomersFilter
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * @param string|null $companyName
     * @return CustomersFilter
     */
    public function setCompanyName(?string $companyName): CustomersFilter
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @param string|null $companyCode
     * @return CustomersFilter
     */
    public function setCompanyCode(?string $companyCode): CustomersFilter
    {
        $this->companyCode = $companyCode;
        return $this;
    }

    /**
     * @param string|null $vatCode
     * @return CustomersFilter
     */
    public function setVatCode(?string $vatCode): CustomersFilter
    {
        $this->vatCode = $vatCode;
        return $this;
    }

    /**
     * @param int $limit
     * @return CustomersFilter
     */
    public function setLimit(int $limit): CustomersFilter
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
            'email' => $this->email ?? null,
            'type' => $this->type ?? null,
            'phone' => $this->phone ?? null,
            'contact_name' => $this->contactName ?? null,
            'company_name' => $this->companyName ?? null,
            'company_code' => $this->companyCode ?? null,
            'vat_code' => $this->vatCode ?? null,
            'limit' => $this->limit,
        ];
    }
}
