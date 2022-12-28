<?php

namespace Edata\FinvoiceClient\Models;

class Country
{
    private int $id;
    private string $code;
    private string $name;
    private string $phoneCode;

    public function __construct()
    {
    }

    public static function make(): Country
    {
        return new self();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Country
     */
    public function setId(int $id): Country
    {
        $this->id = $id;
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
     * @return Country
     */
    public function setCode(string $code): Country
    {
        $this->code = $code;
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
     * @return Country
     */
    public function setName(string $name): Country
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneCode(): string
    {
        return $this->phoneCode;
    }

    /**
     * @param string $phoneCode
     * @return Country
     */
    public function setPhoneCode(string $phoneCode): Country
    {
        $this->phoneCode = $phoneCode;
        return $this;
    }

    /**
     * @param array<string, mixed> $data
     * @return Country
     */
    public static function fromArray(array $data): Country
    {
        return self::make()
            ->setId($data['id'])
            ->setCode($data['code'])
            ->setName($data['name'])
            ->setPhoneCode($data['phonecode']);
    }
}
