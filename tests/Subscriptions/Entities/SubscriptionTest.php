<?php

namespace ArrowSphere\PublicApiClient\Tests\Subscriptions\Entities;

use ArrowSphere\PublicApiClient\Subscriptions\Entities\Subscription;
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
                    'reference' => 'XSPS7189',
                    'name' => 'MSCSP',
                    'status' => 'Validated',
                    'dateDemand' => '2022-07-26T14:25:17.000Z',
                    'dateValidation' => '2017-05-15T11:22:31.000Z',
                    'dateEnd' => '2023-12-31T00:00:00.000Z',
                ],
                'expected' => <<<JSON
{
    "reference": "XSPS7189",
    "name": "MSCSP",
    "status": "Validated",
    "dateDemand": "2022-07-26T14:25:17.000Z",
    "dateValidation": "2017-05-15T11:22:31.000Z",
    "dateEnd": "2023-12-31T00:00:00.000Z"
}
JSON
            ],
        ];
    }
}
