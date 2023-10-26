<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\Orders\Entities\Product\Program;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class ProgramTest
 */
class ProgramTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Program::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'legacyCode' => 'ibm',
                ],
                'expected' => <<<JSON
{
    "legacyCode": "ibm"
}
JSON
            ],
        ];
    }
}
