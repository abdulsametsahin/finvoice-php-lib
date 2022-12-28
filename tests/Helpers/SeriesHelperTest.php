<?php

namespace Helpers;

use Edata\FinvoiceClient\Filters\SeriesFilter;
use Edata\FinvoiceClient\FinvoiceApi;
use Edata\FinvoiceClient\Models\Invoice;
use Edata\FinvoiceClient\Models\Series;
use PHPUnit\Framework\TestCase;

class SeriesHelperTest extends TestCase
{
    public function testCanGetSeries(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $series = $finvoiceApi->series()->getSeries();

        $this->assertIsArray($series);

        $this->assertGreaterThan(0, count($series));
    }

    public function testCanGetSingleSeries(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $series = $finvoiceApi->series()->getSerie();

        $this->assertInstanceOf(Series::class, $series);
    }

    public function testCanGetSingleEstimateSeries(): void
    {
        $finvoiceApi = new FinvoiceApi(PROJECT_URL, API_KEY);

        $series = $finvoiceApi->series()->getSerie(SeriesFilter::make()->setType(Invoice::TYPE_INVOICE));

        $this->assertInstanceOf(Series::class, $series);

        $this->assertEquals(Invoice::TYPE_INVOICE, $series->getType());
    }
}
