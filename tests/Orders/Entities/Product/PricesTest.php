<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\Orders\Entities\Product\Prices;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class PricesTest
 */
class PricesTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Prices::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'buy' => 1862.18,
                    'sell' => 2376,
                    'currency' => 'USD',
                    'periodicity' => 'per Year',
                    'term' => '1 Year',
                    'periodicityCode' => 8640,
                    'termCode' => 8640
                ],
                'expected' => <<<JSON
{
    "buy": 1862.18,
    "sell": 2376,
    "currency": "USD",
    "periodicity": "per Year",
    "term": "1 Year",
    "periodicityCode": 8640,
    "termCode": 8640
}
JSON
            ],
        ];
    }
}
