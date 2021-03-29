<?php

namespace ArrowSphere\PublicApiClient\Tests\Support\Entities;

use ArrowSphere\PublicApiClient\Exception\EntityValidationException;
use ArrowSphere\PublicApiClient\Support\Entities\Contact;
use PHPUnit\Framework\TestCase;

/**
 * Class ContactTest
 */
class ContactTest extends TestCase
{
    /**
     * @throws EntityValidationException
     */
    public function testSerialize(): void
    {
        $contact = new Contact([
            Contact::COLUMN_EMAIL      => 'test@example.com',
            Contact::COLUMN_FIRST_NAME => 'Bruce',
            Contact::COLUMN_LAST_NAME  => 'Wayne',
            Contact::COLUMN_PHONE      => '(1)800 555-7325',
        ]);

        $expected = <<<JSON
{
    "email": "test@example.com",
    "firstName": "Bruce",
    "lastName": "Wayne",
    "phone": "(1)800 555-7325"
}
JSON;

        self::assertSame($expected, json_encode($contact, JSON_PRETTY_PRINT));
    }
}
