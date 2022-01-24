<?php

namespace ArrowSphere\PublicApiClient\Tests\Campaigns\Entities;

use ArrowSphere\PublicApiClient\Campaigns\Entities\Campaign;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class CampaignTest
 */
class CampaignTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Campaign::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    "banners" => [
                        [
                            "backgroundImageUuid" => "bbbb-bbb-bbbb-bbb-bb",
                        ],
                        [
                            "backgroundImageUuid" => "ccc-ccc-cccc-ccc-cc",
                        ],
                        [
                            "backgroundImageUuid" => "ddd-ddd-dddd-ddd-dd",
                        ],
                    ],
                    "category" => "BANNER",
                    "createdAt" => "2021-06-25T16:00:00+00:00",
                    "isActivated" => false,
                    "landingPage" => [
                        "body" => [
                            "backgroundImageUuid" => "ggg-ggg-gggg-ggg-gg",
                        ],
                        'footer' => [],
                        "header" => [
                            "backgroundImageUuid" => "eee-eee-eeee-eee-ee",
                            "vendorLogoUuid" => "fff-fff-fffff-fff-ff",
                        ],
                    ],
                    "name" => "My campaign",
                    "reference" => "aaa-aaa-aaaa-aaa",
                    "rules" => [
                        "endCustomers" => [],
                        "locations" => [],
                        "marketplaces" => [],
                        "resellers" => [],
                        "roles" => [],
                        "subscriptions" => [],
                    ],
                    "weight" => 1,
                ],
                'expected' => <<<JSON
{
    "banners": [
        {
            "backgroundColor": null,
            "backgroundImageUuid": "bbbb-bbb-bbbb-bbb-bb",
            "buttonPlacement": "RIGHT",
            "buttonText": null,
            "text": null,
            "textColor": null,
            "type": "BACKGROUND_COLOR"
        },
        {
            "backgroundColor": null,
            "backgroundImageUuid": "ccc-ccc-cccc-ccc-cc",
            "buttonPlacement": "RIGHT",
            "buttonText": null,
            "text": null,
            "textColor": null,
            "type": "BACKGROUND_COLOR"
        },
        {
            "backgroundColor": null,
            "backgroundImageUuid": "ddd-ddd-dddd-ddd-dd",
            "buttonPlacement": "RIGHT",
            "buttonText": null,
            "text": null,
            "textColor": null,
            "type": "BACKGROUND_COLOR"
        }
    ],
    "category": "BANNER",
    "createdAt": "2021-06-25T16:00:00+00:00",
    "deletedAt": null,
    "endDate": null,
    "isActivated": false,
    "landingPage": {
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
    },
    "name": "My campaign",
    "reference": "aaa-aaa-aaaa-aaa",
    "rules": {
        "locations": [],
        "roles": [],
        "marketplaces": [],
        "subscriptions": [],
        "resellers": [],
        "endCustomers": []
    },
    "startDate": null,
    "updatedAt": null,
    "weight": 1
}
JSON
                ,
            ],
        ];
    }
}
