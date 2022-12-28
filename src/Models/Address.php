<?php

namespace Edata\FinvoiceClient\Models;

class Address
{
    private ?int $id;
    private string $name;
    private ?string $addressStreet1;
    private ?string $addressStreet2;
    private ?string $city;
    private ?string $state;
    private ?string $countryId;
    private ?string $zip;
    private ?string $phone;
    private ?string $fax;
    private ?string $type;
    private ?string $additionalInfo;

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
     * @return Address
     */
    public function setId(?int $id): Address
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
     * @return Address
     */
    public function setName(string $name): Address
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressStreet1(): ?string
    {
        return $this->addressStreet1;
    }

    /**
     * @param string|null $addressStreet1
     * @return Address
     */
    public function setAddressStreet1(?string $addressStreet1): Address
    {
        $this->addressStreet1 = $addressStreet1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressStreet2(): ?string
    {
        return $this->addressStreet2;
    }

    /**
     * @param string|null $addressStreet2
     * @return Address
     */
    public function setAddressStreet2(?string $addressStreet2): Address
    {
        $this->addressStreet2 = $addressStreet2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Address
     */
    public function setCity(?string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return Address
     */
    public function setState(?string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryId(): ?string
    {
        return $this->countryId;
    }

    /**
     * @param string|null $countryId
     * @return Address
     */
    public function setCountryId(?string $countryId): Address
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string|null $zip
     * @return Address
     */
    public function setZip(?string $zip): Address
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return Address
     */
    public function setPhone(?string $phone): Address
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     * @return Address
     */
    public function setFax(?string $fax): Address
    {
        $this->fax = $fax;
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
     * @return Address
     */
    public function setType(?string $type): Address
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInfo(): ?string
    {
        return $this->additionalInfo;
    }

    /**
     * @param string|null $additionalInfo
     * @return Address
     */
    public function setAdditionalInfo(?string $additionalInfo): Address
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    /**
     * @param array<string, mixed> $addressData
     * @return Address
     */
    public static function fromArray(array $addressData): Address
    {
        return (new Address())
            ->setId($addressData['id'] ?? null)
            ->setName($addressData['name'] ?? '')
            ->setAddressStreet1($addressData['address_street1'] ?? null)
            ->setAddressStreet2($addressData['address_street2'] ?? null)
            ->setCity($addressData['city'] ?? null)
            ->setState($addressData['state'] ?? null)
            ->setCountryId($addressData['country_id'] ?? null)
            ->setZip($addressData['zip'] ?? null)
            ->setPhone($addressData['phone'] ?? null)
            ->setFax($addressData['fax'] ?? null)
            ->setType($addressData['type'] ?? null)
            ->setAdditionalInfo($addressData['additional_info'] ?? null);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'address_street1' => $this->getAddressStreet1(),
            'address_street2' => $this->getAddressStreet2(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'country_id' => $this->getCountryId(),
            'zip' => $this->getZip(),
            'phone' => $this->getPhone(),
            'fax' => $this->getFax(),
            'type' => $this->getType(),
            'additional_info' => $this->getAdditionalInfo(),
        ];
    }
}
