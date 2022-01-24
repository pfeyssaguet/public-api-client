<?php

namespace ArrowSphere\PublicApiClient\Tests\Campaigns\Entities\LandingPage;

use ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageFeature;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class LandingPageFeatureTest
 */
class LandingPageFeatureTest extends AbstractEntityTest
{
    public const CLASS_NAME = LandingPageFeature::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'description' => 'cool',
                    'icon' => 'story',
                    'size' => 42,
                    'title' => 'bro',
                ],
                'expected' => <<<JSON
{
    "description": "cool",
    "icon": "story",
    "size": 42,
    "title": "bro"
}
JSON
                ,

            ],
            'empty' => [
                'fields' => [],
                'expected' => <<<JSON
{
    "description": "",
    "icon": "",
    "size": 4,
    "title": ""
}
JSON
                ,

            ],
        ];
    }
}
