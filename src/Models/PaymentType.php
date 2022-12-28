<?php

namespace Edata\FinvoiceClient\Models;

class PaymentType
{
    private int $id;
    private string $name;
    private string $title;
    private string $prefix;

    public function __construct()
    {
    }

    public static function make(): PaymentType
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
     * @return PaymentType
     */
    public function setId(int $id): PaymentType
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
     * @return PaymentType
     */
    public function setName(string $name): PaymentType
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return PaymentType
     */
    public function setTitle(string $title): PaymentType
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return PaymentType
     */
    public function setPrefix(string $prefix): PaymentType
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'prefix' => $this->getPrefix(),
        ];
    }

    public static function fromArray(array $data): PaymentType
    {
        return self::make()
            ->setId($data['id'])
            ->setName($data['name'])
            ->setTitle($data['title'])
            ->setPrefix($data['prefix']);
    }
}
