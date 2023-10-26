<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities\Product\Identifiers;

use ArrowSphere\PublicApiClient\Orders\Entities\Product\Identifiers\Vendor;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class VendorTest
 */
class VendorTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Vendor::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'sku' => 'D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M',
                ],
                'expected' => <<<JSON
{
    "sku": "D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M"
}
JSON
            ],
        ];
    }
}
