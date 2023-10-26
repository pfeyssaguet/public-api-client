<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities;

use ArrowSphere\PublicApiClient\Orders\Entities\Customer;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class ExtraInformationTest
 */
class ExtraInformationTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Customer::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'reference' => 'XSP705830',
                ],
                'expected' => <<<JSON
{
    "reference": "XSP705830"
}
JSON
            ],
        ];
    }
}
