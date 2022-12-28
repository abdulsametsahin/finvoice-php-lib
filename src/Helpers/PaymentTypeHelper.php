<?php

namespace Edata\FinvoiceClient\Helpers;

use Edata\FinvoiceClient\Exceptions\InvalidCredentialsException;
use Edata\FinvoiceClient\Exceptions\PaymentTypeNotFoundException;
use Edata\FinvoiceClient\Filters\PaymentTypesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\PaymentType;
use GuzzleHttp\Exception\GuzzleException;

class PaymentTypeHelper
{
    private FinvoiceApi $finvoiceApi;

    public function __construct(FinvoiceApi $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
    }

    /**
     * @param PaymentTypesFilter|null $filter
     * @return array
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     */
    public function getPaymentTypes(PaymentTypesFilter $filter = null): array
    {
        $response = $this->finvoiceApi->makeApiRequest('GET', '/settings/payment-types', $filter ? $filter->toArray() : []);

        if (empty($response) || empty($response['types'])) {
            return [];
        }

        return array_map(function ($value) {
            return PaymentType::fromArray($value);
        }, $response['types']['data'] ?? $response['types']);
    }

    /**
     * @param ?PaymentTypesFilter $filter
     * @return PaymentType
     * @throws GuzzleException
     * @throws InvalidCredentialsException
     * @throws PaymentTypeNotFoundException
     */
    public function getPaymentType(PaymentTypesFilter $filter=null): PaymentType
    {
        $paymentTypes = $this->getPaymentTypes($filter);

        if (empty($paymentTypes)) {
            throw new PaymentTypeNotFoundException();
        }

        return $paymentTypes[0];
    }
}
