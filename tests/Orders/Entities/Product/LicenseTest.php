<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\Orders\Entities\Product\License;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class LicenseTest
 */
class LicenseTest extends AbstractEntityTest
{
    protected const CLASS_NAME = License::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'reference' => 'XSP4064158',
                ],
                'expected' => <<<JSON
{
    "reference": "XSP4064158"
}
JSON
            ],
        ];
    }
}
