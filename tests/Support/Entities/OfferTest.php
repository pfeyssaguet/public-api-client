<?php

namespace ArrowSphere\PublicApiClient\Tests\Support\Entities;

use ArrowSphere\PublicApiClient\Exception\EntityValidationException;
use ArrowSphere\PublicApiClient\Support\Entities\Offer;
use PHPUnit\Framework\TestCase;

/**
 * Class OfferTest
 */
class OfferTest extends TestCase
{
    /**
     * @throws EntityValidationException
     */
    public function testSerialize(): void
    {
        $offer = new Offer([
            Offer::COLUMN_NAME => 'offer name',
            Offer::COLUMN_SKU => 'offer sku',
            Offer::COLUMN_VENDOR => 'offer vendor',
        ]);

        $expected = <<<JSON
{
    "name": "offer name",
    "sku": "offer sku",
    "vendor": "offer vendor"
}
JSON;

        self::assertSame($expected, json_encode($offer, JSON_PRETTY_PRINT));
    }
}
