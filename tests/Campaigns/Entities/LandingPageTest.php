<?php

namespace ArrowSphere\PublicApiClient\Tests\Campaigns\Entities;

use ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class LandingPageTest
 */
class LandingPageTest extends AbstractEntityTest
{
    protected const CLASS_NAME = LandingPage::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'body' => [
                        'backgroundImageUuid' => 'ggg-ggg-gggg-ggg-gg',
                    ],
                    'footer' => [],
                    'header' => [
                        'backgroundImageUuid' => 'eee-eee-eeee-eee-ee',
                        'vendorLogoUuid' => 'fff-fff-fffff-fff-ff',
                    ],
                ],
                'expected' => <<<JSON
{
    "body": {
        "backgroundImageUuid": "ggg-ggg-gggg-ggg-gg",
        "buttonText": null,
        "contactEmail": null,
        "description": "",
        "title": "",
        "type": "",
        "videoUrl": null
    },
    "footer": {
        "backgroundColor": "",
        "buttonText": "",
        "buttonUrl": "",
        "features": [],
        "textColor": "#FFF",
        "title": ""
    },
    "header": {
        "backgroundColor": null,
        "backgroundImageUuid": "eee-eee-eeee-eee-ee",
        "baseline": "",
        "textColor": null,
        "title": "",
        "vendorLogoUuid": "fff-fff-fffff-fff-ff"
    },
    "url": null
}
JSON
                ,
            ],
        ];
    }
}
