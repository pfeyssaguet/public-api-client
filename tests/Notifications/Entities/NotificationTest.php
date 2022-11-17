<?php

namespace ArrowSphere\PublicApiClient\Tests\Notifications\Entities;

use ArrowSphere\PublicApiClient\Notifications\Entities\Notification;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class NotificationTest
 */
class NotificationTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Notification::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'id' => 'my id',
                    'userName' => 'my username',
                    'created' => '2022-10-01',
                    'expires' => '2022-11-02',
                    'subject' => 'my subject',
                    'content' => 'my content',
                    'hasBeenRead' => false,
                ],
                'expected' => <<<JSON
{
    "id": "my id",
    "userName": "my username",
    "created": "2022-10-01",
    "expires": "2022-11-02",
    "subject": "my subject",
    "content": "my content",
    "hasBeenRead": false
}
JSON
                ,
            ],
        ];
    }
}
