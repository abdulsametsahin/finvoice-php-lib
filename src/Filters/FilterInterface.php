<?php

namespace Edata\FinvoiceClient\Filters;

interface FilterInterface
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
