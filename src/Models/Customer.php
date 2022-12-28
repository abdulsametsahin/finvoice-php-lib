<?php

namespace Edata\FinvoiceClient\Models;

use DateTime;

class Customer
{
    const TYPE_ORGANIZATION = 'organization';
    const TYPE_INDIVIDUAL = 'individual';

    private ?int $id = null;
    private string $name;
    private ?string $email = null;
    private string $type;
    private int $currencyId = 0;
    private ?string $phone = null;
    private ?string $contactName = null;
    private ?string $companyName = null;
    private ?string $companyCode = null;
    private ?string $vatCode = null;
    /**
     * @var Address[]
     */
    private array $addresses = [];

    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;

    public function __construct()
    {
    }

    public static function make(): Customer
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
     * @return Customer
     */
    public function setId(?int $id): Customer
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
     * @return Customer
     */
    public function setName(string $name): Customer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Customer
     */
    public function setEmail(?string $email): Customer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Customer
     */
    public function setType(string $type): Customer
    {
        $this->type = $type;
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
     * @return Customer
     */
    public function setPhone(?string $phone): Customer
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    /**
     * @param string|null $contactName
     * @return Customer
     */
    public function setContactName(?string $contactName): Customer
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string|null $companyName
     * @return Customer
     */
    public function setCompanyName(?string $companyName): Customer
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompanyCode(): ?string
    {
        return $this->companyCode;
    }

    /**
     * @param string|null $companyCode
     * @return Customer
     */
    public function setCompanyCode(?string $companyCode): Customer
    {
        $this->companyCode = $companyCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVatCode(): ?string
    {
        return $this->vatCode;
    }

    /**
     * @param string|null $vatCode
     * @return Customer
     */
    public function setVatCode(?string $vatCode): Customer
    {
        $this->vatCode = $vatCode;
        return $this;
    }

    /**
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param Address[] $addresses
     * @return Customer
     */
    public function setAddresses(array $addresses): Customer
    {
        $this->addresses = $addresses;
        return $this;
    }

    public function addAddress(Address $address): Customer
    {
        $this->addresses[] = $address;
        return $this;
    }

    public function isOrganization(): bool
    {
        return $this->type === self::TYPE_ORGANIZATION;
    }

    public function isIndividual(): bool
    {
        return $this->type === self::TYPE_INDIVIDUAL;
    }

    /**
     * @return int
     */
    public function getCurrencyId(): int
    {
        return $this->currencyId;
    }

    /**
     * @param int $currencyId
     * @return Customer
     */
    public function setCurrencyId(int $currencyId): Customer
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * @param array<string, mixed> $customerData
     * @return Customer
     * @throws \Exception
     */
    public static function fromArray(array $customerData): Customer
    {
        return (new Customer())
            ->setId($customerData['id'])
            ->setName($customerData['name'])
            ->setEmail($customerData['email'])
            ->setType($customerData['type'])
            ->setPhone($customerData['phone'])
            ->setContactName($customerData['contact_name'])
            ->setCompanyName($customerData['company_name'])
            ->setCompanyCode($customerData['company_code'])
            ->setVatCode($customerData['vat_code'])
            ->setCurrencyId($customerData['currency_id'])
            ->setCreatedAt(new DateTime($customerData['created_at']))
            ->setUpdatedAt(new DateTime($customerData['updated_at']))
            ->setAddresses(
                array_map(
                    function ($addressData) {
                        return Address::fromArray($addressData);
                    },
                    $customerData['addresses']
                )
            );
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId() ?? 0,
            'name' => $this->getName(),
            'email' => $this->getEmail() ?? '',
            'type' => $this->getType(),
            'phone' => $this->getPhone() ?? '',
            'contact_name' => $this->getContactName() ?? '',
            'company_name' => $this->getCompanyName() ?? '',
            'company_code' => $this->getCompanyCode() ?? '',
            'vat_code' => $this->getVatCode() ?? '',
            'currency_id' => $this->getCurrencyId(),
            'created_at' => $this->getCreatedAt() ? $this->getCreatedAt()->format('Y-m-d H:i:s') : '',
            'updated_at' => $this->getUpdatedAt() ? $this->getUpdatedAt()->format('Y-m-d H:i:s') : '',
            'addresses' => array_map(
                function (Address $address) {
                    return $address->toArray();
                },
                $this->getAddresses()
            ),
        ];
    }

    /**
     * @return ?DateTime
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     * @return Customer
     */
    public function setUpdatedAt(DateTime $updatedAt): Customer
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Customer
     */

    public function setCreatedAt(DateTime $createdAt): Customer
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
