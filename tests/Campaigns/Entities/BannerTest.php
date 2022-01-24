<?php

namespace ArrowSphere\PublicApiClient\Tests\Campaigns\Entities;

use ArrowSphere\PublicApiClient\Campaigns\Entities\Banner;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class BannerTest
 */
class BannerTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Banner::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    "backgroundImageUuid" => "bbbb-bbb-bbbb-bbb-bb",
                ],
                'expected' => <<<JSON
{
    "backgroundColor": null,
    "backgroundImageUuid": "bbbb-bbb-bbbb-bbb-bb",
    "buttonPlacement": "RIGHT",
    "buttonText": null,
    "text": null,
    "textColor": null,
    "type": "BACKGROUND_COLOR"
}
JSON
                ,
            ],
            'all fields' => [
                'fields' => [
                    "backgroundColor" => 'white',
                    "backgroundImageUuid" => "1111-222-3333-444-55",
                    'buttonPlacement' => 'cool',
                    'buttonText' => 'story',
                    'text' => 'bro',
                    'textColor' => 'pink',
                    'type' => 'my type',
                ],
                'expected' => <<<JSON
{
    "backgroundColor": "white",
    "backgroundImageUuid": "1111-222-3333-444-55",
    "buttonPlacement": "cool",
    "buttonText": "story",
    "text": "bro",
    "textColor": "pink",
    "type": "my type"
}
JSON
                ,
            ],
        ];
    }
}
