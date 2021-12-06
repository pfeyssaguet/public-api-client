<?php

namespace ArrowSphere\PublicApiClient\Tests\Support\Entities;

use ArrowSphere\PublicApiClient\Exception\EntityValidationException;
use ArrowSphere\PublicApiClient\Support\Entities\Contact;
use ArrowSphere\PublicApiClient\Support\Entities\Issue;
use ArrowSphere\PublicApiClient\Support\Entities\Offer;
use ArrowSphere\PublicApiClient\Support\Enum\StatusEnum;
use PHPUnit\Framework\TestCase;

/**
 * Class IssueTest
 */
class IssueTest extends TestCase
{
    /**
     * @throws EntityValidationException
     */
    public function testSerialize(): void
    {
        $issue = new Issue([
            Issue::COLUMN_CREATED          => '2021-01-23T13:12:54.000Z',
            Issue::COLUMN_CREATED_BY       => [
                Contact::COLUMN_EMAIL      => 'test@example.com',
                Contact::COLUMN_FIRST_NAME => 'Bruce',
                Contact::COLUMN_LAST_NAME  => 'Wayne',
                Contact::COLUMN_PHONE      => '(1)800 555-7325',
            ],
            Issue::COLUMN_DESCRIPTION      => 'my issue description',
            Issue::COLUMN_END_CUSTOMER_REF => 'XSP12345',

            Issue::COLUMN_ID           => 1234,
            Issue::COLUMN_LANGUAGE     => 'FR',
            Issue::COLUMN_OFFER        => [
                Offer::COLUMN_NAME   => 'offer name',
                Offer::COLUMN_SKU    => 'offer sku',
                Offer::COLUMN_VENDOR => 'offer vendor',

            ],
            Issue::COLUMN_PRIORITY     => 2,
            Issue::COLUMN_RESELLER_REF => 'XSP54321',
            Issue::COLUMN_STATUS       => StatusEnum::ON_HOLD,
            Issue::COLUMN_TITLE        => 'my issue title',
            Issue::COLUMN_UPDATED      => '2021-02-03T14:11:26.000Z',
        ]);

        $expected = <<<JSON
{
    "created": "2021-01-23T13:12:54.000Z",
    "createdBy": {
        "email": "test@example.com",
        "firstName": "Bruce",
        "lastName": "Wayne",
        "phone": "(1)800 555-7325"
    },
    "description": "my issue description",
    "endCustomerRef": "XSP12345",
    "id": 1234,
    "language": "FR",
    "offer": {
        "name": "offer name",
        "sku": "offer sku",
        "vendor": "offer vendor"
    },
    "priority": 2,
    "resellerRef": "XSP54321",
    "status": "ON_HOLD",
    "title": "my issue title",
    "updated": "2021-02-03T14:11:26.000Z"
}
JSON;

        self::assertSame($expected, json_encode($issue, JSON_PRETTY_PRINT));
    }
}
