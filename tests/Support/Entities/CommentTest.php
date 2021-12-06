<?php

namespace ArrowSphere\PublicApiClient\Tests\Support\Entities;

use ArrowSphere\PublicApiClient\Support\Entities\Comment;
use ArrowSphere\PublicApiClient\Support\Entities\Contact;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class CommentTest
 */
class CommentTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Comment::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields'   => [
                    Comment::COLUMN_BODY => 'my comment',
                    Comment::COLUMN_CREATED_BY => [
                        Contact::COLUMN_EMAIL      => 'test@example.com',
                        Contact::COLUMN_FIRST_NAME => 'Bruce',
                        Contact::COLUMN_LAST_NAME  => 'Wayne',
                        Contact::COLUMN_PHONE      => '(1)800 555-7325',
                    ],
                    Comment::COLUMN_DATE => '2021-12-25T23:45:59.000Z',
                ],
                'expected' => <<<JSON
{
    "body": "my comment",
    "createdBy": {
        "email": "test@example.com",
        "firstName": "Bruce",
        "lastName": "Wayne",
        "phone": "(1)800 555-7325"
    },
    "date": "2021-12-25T23:45:59.000Z"
}
JSON
                ,
            ],
        ];
    }
}
