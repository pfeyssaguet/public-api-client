<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\Orders\Entities\Product\Subscription;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class SubscriptionTest
 */
class SubscriptionTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Subscription::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'reference' => 'XSPS61851',
                ],
                'expected' => <<<JSON
{
    "reference": "XSPS61851"
}
JSON
            ],
        ];
    }
}
