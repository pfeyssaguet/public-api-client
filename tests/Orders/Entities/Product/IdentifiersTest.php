<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\Orders\Entities\Product\Identifiers;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class IdentifiersTest
 */
class IdentifiersTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Identifiers::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'vendor' => [
                        'sku' => 'D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M',
                    ]
                ],
                'expected' => <<<JSON
{
    "vendor": {
        "sku": "D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M"
    }
}
JSON
            ],
        ];
    }
}
