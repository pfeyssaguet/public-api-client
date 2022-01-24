<?php

namespace ArrowSphere\PublicApiClient\Tests\Campaigns\Entities\LandingPage;

use ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageBody;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

class LandingPageBodyTest extends AbstractEntityTest
{
    public const CLASS_NAME = LandingPageBody::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'backgroundImageUuid' => 'aaa-bbb-ccc',
                    'buttonText' => null,
                    'contactEmail' => null,
                    'description' => 'bro',
                    'title' => 'story',
                    'type' => 'cool',
                    'videoUrl' => 'my video url',
                ],
                'expected' => <<<JSON
{
    "backgroundImageUuid": "aaa-bbb-ccc",
    "buttonText": null,
    "contactEmail": null,
    "description": "bro",
    "title": "story",
    "type": "cool",
    "videoUrl": "my video url"
}
JSON
                ,
            ],
            'empty' => [
                'fields' => [

                ],
                'expected' => <<<JSON
{
    "backgroundImageUuid": "",
    "buttonText": null,
    "contactEmail": null,
    "description": "",
    "title": "",
    "type": "",
    "videoUrl": null
}
JSON
                ,
            ],
        ];
    }
}
