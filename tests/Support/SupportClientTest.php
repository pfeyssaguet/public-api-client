<?php

namespace ArrowSphere\PublicApiClient\Tests\Support;

use ArrowSphere\PublicApiClient\Exception\EntityValidationException;
use ArrowSphere\PublicApiClient\Exception\NotFoundException;
use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Support\Entities\Attachment;
use ArrowSphere\PublicApiClient\Support\Entities\Comment;
use ArrowSphere\PublicApiClient\Support\Entities\Contact;
use ArrowSphere\PublicApiClient\Support\Entities\Issue;
use ArrowSphere\PublicApiClient\Support\SupportClient;
use ArrowSphere\PublicApiClient\Tests\AbstractClientTest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

/**
 * Class SupportClientTest
 *
 * @property SupportClient $client
 */
class SupportClientTest extends AbstractClientTest
{
    protected const MOCKED_CLIENT_CLASS = SupportClient::class;

    /**
     * @throws NotFoundException
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function testGetIssuesRaw(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues?abc=def&ghi=0')
            ->willReturn(new Response(200, [], 'OK USA'));

        $this->client->getIssuesRaw([
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    /**
     * @depends testGetIssuesRaw
     *
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function testGetIssuesWithInvalidResponse(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues?abc=def&ghi=0&per_page=100')
            ->willReturn(new Response(200, [], '{'));

        $this->expectException(PublicApiClientException::class);
        $issues = $this->client->getIssues([
            'abc' => 'def',
            'ghi' => false,
        ]);
        iterator_to_array($issues);
    }

    /**
     * @return array
     */
    public function providerTestGetIssuesWithPagination(): array
    {
        // This API returns no field that indicates the number of pages
        // So the code itself calculates it
        // Therefore we need to test it thoroughly to make absolutely sure it browses the right number of pages in various cases
        return [
            '1 page with 99 rows'   => [
                'total'           => 99,
                'nbPagesExpected' => 1,
            ],
            '1 page with 100 rows'  => [
                'total'           => 100,
                'nbPagesExpected' => 1,
            ],
            '3 pages with 300 rows' => [
                'total'           => 300,
                'nbPagesExpected' => 3,
            ],
            '3 pages with 249 rows' => [
                'total'           => 249,
                'nbPagesExpected' => 3,
            ],
            '3 pages with 251 rows' => [
                'total'           => 251,
                'nbPagesExpected' => 3,
            ],
            '3 pages with 299 rows' => [
                'total'           => 299,
                'nbPagesExpected' => 3,
            ],
        ];
    }

    /**
     * @dataProvider providerTestGetIssuesWithPagination
     *
     * @throws EntityValidationException
     * @throws GuzzleException
     * @throws PublicApiClientException
     */
    public function testGetIssuesWithPagination(int $total, int $nbPagesExpected): void
    {
        $response = json_encode([
            'data'       => [],
            'pagination' => [
                'page'         => 1,
                'total'        => $total,
                'itemsPerPage' => 100,
            ],
        ]);

        $arguments = [];
        for ($i = 1; $i <= $nbPagesExpected; $i++) {
            $url = 'https://www.test.com/support/issues?abc=def&ghi=0&per_page=100';
            if ($i > 1) {
                $url = sprintf(
                    'https://www.test.com/support/issues?abc=def&ghi=0&page=%s&per_page=100',
                    $i
                );
            }
            $arguments[] = [
                'get',
                $url,
            ];
        }

        $this->httpClient
            ->expects(self::exactly($nbPagesExpected))
            ->method('request')
            ->withConsecutive(...$arguments)
            ->willReturn(new Response(200, [], $response));

        $test = $this->client->getIssues([
            'abc' => 'def',
            'ghi' => false,
        ]);
        iterator_to_array($test);
    }

    /**
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function testGetIssues(): void
    {
        $response = <<<JSON
{
  "data": [
    {
      "id": 12345,
      "title": "[Platform issue] How to reset my Microsoft Password ?",
      "description": "Hi, I would Like to reset my password, how can I do this?<br>Thanks in advance!",
      "endCustomerRef": "XSP12345",
      "resellerRef": "XSP54321",
      "language": "en",
      "offer": {
        "sku": "031C9E47-4802-4248-838E-778FB1D2CC05",
        "name": "Office 365 Business Essentials",
        "vendor": "Microsoft"
      },
      "priority": 2,
      "status": "PENDING_ARROW",
      "createdBy": {
        "email": "nobody@example.com",
        "firstName": "Bruce",
        "lastName": "Wayne",
        "phone": "1-800-555-1234"
      },
      "created": "2020-02-01T19:00:00.000Z",
      "updated": "2020-02-03T15:00:00.000Z"
    },
    {
      "id": 12346,
      "title": "[Platform issue] How to order Microsoft Office?",
      "description": "Hi, I would Like to order Office 365, how can I do this?<br>Thanks in advance!",
      "endCustomerRef": "XSP12346",
      "resellerRef": "XSP54326",
      "language": "en",
      "offer": {
        "sku": "031C9E47-4802-4248-838E-778FB1D2CC05",
        "name": "Microsoft 365 Business",
        "vendor": "Microsoft"
      },
      "priority": 1,
      "status": "PENDING_CUSTOMER",
      "createdBy": {
        "email": "nobody2@example.com",
        "firstName": "Barry",
        "lastName": "Allen",
        "phone": "1-800-555-4321"
      },
      "created": "2020-02-04T18:20:00.000Z",
      "updated": "2020-02-05T14:00:00.000Z"
    }
  ],
  "pagination": {
    "page": 1,
    "itemsPerPage": 100,
    "total": 2
  }
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues?abc=def&ghi=0&per_page=100')
            ->willReturn(new Response(200, [], $response));

        $test = $this->client->getIssues([
            'abc' => 'def',
            'ghi' => false,
        ]);
        $list = iterator_to_array($test);
        self::assertCount(2, $list);

        /** @var Issue $issue */
        $issue = array_shift($list);
        self::assertInstanceOf(Issue::class, $issue);
        self::assertSame('2020-02-01T19:00:00.000Z', $issue->getCreated());
        self::assertInstanceOf(Contact::class, $issue->getCreatedBy());
        self::assertSame('nobody@example.com', $issue->getCreatedBy()->getEmail());
        self::assertSame('Bruce', $issue->getCreatedBy()->getFirstName());
        self::assertSame('Wayne', $issue->getCreatedBy()->getLastName());
        self::assertSame('1-800-555-1234', $issue->getCreatedBy()->getPhone());
        self::assertSame('Hi, I would Like to reset my password, how can I do this?<br>Thanks in advance!', $issue->getDescription());
        self::assertSame('XSP12345', $issue->getEndCustomerRef());
        self::assertSame('en', $issue->getLanguage());
        self::assertSame('Office 365 Business Essentials', $issue->getOffer()->getName());
        self::assertSame('031C9E47-4802-4248-838E-778FB1D2CC05', $issue->getOffer()->getSku());
        self::assertSame('Microsoft', $issue->getOffer()->getVendor());
        self::assertSame(2, $issue->getPriority());
        self::assertSame('XSP54321', $issue->getResellerRef());
        self::assertSame('PENDING_ARROW', $issue->getStatus());

        /** @var Issue $issue */
        $issue = array_shift($list);
        self::assertInstanceOf(Issue::class, $issue);
        self::assertSame('2020-02-04T18:20:00.000Z', $issue->getCreated());
        self::assertInstanceOf(Contact::class, $issue->getCreatedBy());
        self::assertSame('nobody2@example.com', $issue->getCreatedBy()->getEmail());
        self::assertSame('Barry', $issue->getCreatedBy()->getFirstName());
        self::assertSame('Allen', $issue->getCreatedBy()->getLastName());
        self::assertSame('1-800-555-4321', $issue->getCreatedBy()->getPhone());
        self::assertSame('Hi, I would Like to order Office 365, how can I do this?<br>Thanks in advance!', $issue->getDescription());
        self::assertSame('XSP12346', $issue->getEndCustomerRef());
        self::assertSame('en', $issue->getLanguage());
        self::assertSame('Microsoft 365 Business', $issue->getOffer()->getName());
        self::assertSame('031C9E47-4802-4248-838E-778FB1D2CC05', $issue->getOffer()->getSku());
        self::assertSame('Microsoft', $issue->getOffer()->getVendor());
        self::assertSame(1, $issue->getPriority());
        self::assertSame('XSP54326', $issue->getResellerRef());
        self::assertSame('PENDING_CUSTOMER', $issue->getStatus());
    }

    /**
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function testGetIssueRaw(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12?abc=def&ghi=0')
            ->willReturn(new Response(200, [], 'OK USA'));

        $this->client->getIssueRaw(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    /**
     * @depends testGetIssueRaw
     *
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function testGetIssueWithInvalidResponse(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12?abc=def&ghi=0')
            ->willReturn(new Response(200, [], '{'));

        $this->expectException(PublicApiClientException::class);
        $this->client->getIssue(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    /**
     * @throws NotFoundException
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function testGetIssue(): void
    {
        $response = <<<JSON
{
  "data": {
    "id": 12345,
    "title": "[Platform issue] How to reset my Microsoft Password ?",
    "description": "Hi, I would Like to reset my password, how can I do this?<br>Thanks in advance!",
    "endCustomerRef": "XSP12345",
    "resellerRef": "XSP54321",
    "language": "en",
    "offer": {
      "sku": "031C9E47-4802-4248-838E-778FB1D2CC05",
      "name": "Office 365 Business Essentials",
      "vendor": "Microsoft"
    },
    "priority": 2,
    "status": "PENDING_ARROW",
    "createdBy": {
      "email": "nobody@example.com",
      "firstName": "Bruce",
      "lastName": "Wayne",
      "phone": "1-800-555-1234"
    },
    "created": "2020-02-01T19:00:00.000Z",
    "updated": "2020-02-03T15:00:00.000Z"
  }
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12?abc=def&ghi=0')
            ->willReturn(new Response(200, [], $response));

        $issue = $this->client->getIssue(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);

        self::assertSame(12345, $issue->getId());
        self::assertSame('Hi, I would Like to reset my password, how can I do this?<br>Thanks in advance!', $issue->getDescription());
        self::assertSame('[Platform issue] How to reset my Microsoft Password ?', $issue->getTitle());
        self::assertSame('XSP12345', $issue->getEndCustomerRef());
        self::assertSame('XSP54321', $issue->getResellerRef());
        self::assertSame('en', $issue->getLanguage());
        self::assertSame('Office 365 Business Essentials', $issue->getOffer()->getName());
        self::assertSame('031C9E47-4802-4248-838E-778FB1D2CC05', $issue->getOffer()->getSku());
        self::assertSame('Microsoft', $issue->getOffer()->getVendor());
        self::assertSame(2, $issue->getPriority());
        self::assertSame('PENDING_ARROW', $issue->getStatus());
        self::assertSame('nobody@example.com', $issue->getCreatedBy()->getEmail());
        self::assertSame('Bruce', $issue->getCreatedBy()->getFirstName());
        self::assertSame('Wayne', $issue->getCreatedBy()->getLastName());
        self::assertSame('1-800-555-1234', $issue->getCreatedBy()->getPhone());
        self::assertSame('2020-02-01T19:00:00.000Z', $issue->getCreated());
        self::assertSame('2020-02-03T15:00:00.000Z', $issue->getUpdated());
    }

    /**
     * @throws NotFoundException
     * @throws PublicApiClientException
     * @throws EntityValidationException
     * @throws GuzzleException
     */
    public function testCreateIssue(): void
    {
        $payload = [
            'createdBy'      => [
                'email'     => 'nobody@example.com',
                'firstName' => 'Bruce',
                'lastName'  => 'Wayne',
                'phone'     => '1-800-555-4321',
            ],
            'description'    => 'Hi, I would Like to reset my password, how can I do this?<br>Thanks in advance!',
            'endCustomerRef' => 'XSP12345',
            'language'       => 'en',
            'offer'          => [
                'name'   => 'Office 365 Business Essentials',
                'sku'    => '031C9E47-4802-4248-838E-778FB1D2CC05',
                'vendor' => 'Microsoft',
            ],
            'priority'       => 2,
            'resellerRef'    => 'XSP54321',
            'title'          => '[Platform issue] How to reset my Microsoft Password ?',
        ];

        $issue = new Issue($payload);

        $response = <<<JSON
{
    "data": {
        "id": 123456
    }
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('post', 'https://www.test.com/support/issues?abc=def&ghi=0', [
                'headers' => [
                    'apiKey' => '123456',
                ],
                'body'    => json_encode($payload),
            ])
            ->willReturn(new Response(200, [], $response));

        $id = $this->client->createIssue($issue, [
            'abc' => 'def',
            'ghi' => false,
        ]);

        self::assertSame(123456, $id);
    }

    public function testGetCommentsRaw(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12/comments?abc=def&ghi=0')
            ->willReturn(new Response(200, [], 'OK USA'));

        $this->client->getCommentsRaw(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    public function testGetCommentsWithInvalidResponse(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12/comments?abc=def&ghi=0')
            ->willReturn(new Response(200, [], '{'));

        $this->expectException(PublicApiClientException::class);
        $this->client->getComments(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    public function testGetComments(): void
    {
        $response = <<<JSON
{
  "data": [
    {
      "body": "my comment",
      "createdBy": {
        "email": "nobody@example.com",
        "firstName": "Bruce",
        "lastName": "Wayne",
        "phone": "1-800-555-7325"
      },
      "date": "2020-02-01T19:00:00.000Z"
    },
    {
      "body": "my second comment",
      "createdBy": {
        "email": "nobody2@example.com",
        "firstName": "Barry",
        "lastName": "Allen",
        "phone": "1-800-555-1234"
      },
      "date": "2021-12-25T23:45:59.000Z"
    }
  ]
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12/comments?abc=def&ghi=0')
            ->willReturn(new Response(200, [], $response));

        $list = $this->client->getComments(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);

        self::assertCount(2, $list);

        /** @var Comment $comment */
        $comment = array_shift($list);
        self::assertInstanceOf(Comment::class, $comment);
        self::assertSame('my comment', $comment->getBody());
        self::assertSame('2020-02-01T19:00:00.000Z', $comment->getDate());
        self::assertSame('nobody@example.com', $comment->getCreatedBy()->getEmail());
        self::assertSame('Bruce', $comment->getCreatedBy()->getFirstName());
        self::assertSame('Wayne', $comment->getCreatedBy()->getLastName());
        self::assertSame('1-800-555-7325', $comment->getCreatedBy()->getPhone());

        /** @var Comment $comment */
        $comment = array_shift($list);
        self::assertInstanceOf(Comment::class, $comment);
        self::assertSame('my second comment', $comment->getBody());
        self::assertSame('2021-12-25T23:45:59.000Z', $comment->getDate());
        self::assertSame('nobody2@example.com', $comment->getCreatedBy()->getEmail());
        self::assertSame('Barry', $comment->getCreatedBy()->getFirstName());
        self::assertSame('Allen', $comment->getCreatedBy()->getLastName());
        self::assertSame('1-800-555-1234', $comment->getCreatedBy()->getPhone());
    }

    public function testGetAttachmentsRaw(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12/attachments?abc=def&ghi=0')
            ->willReturn(new Response(200, [], 'OK USA'));

        $this->client->getAttachmentsRaw(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    public function testGetAttachmentsWithInvalidResponse(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12/attachments?abc=def&ghi=0')
            ->willReturn(new Response(200, [], '{'));

        $this->expectException(PublicApiClientException::class);
        $this->client->getAttachments(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    public function testGetAttachments(): void
    {
        $response = <<<JSON
{
  "data": [
    {
      "id": 123456,
      "fileName": "file.png",
      "mimeType": "image\/png"
    },
    {
      "id": 123457,
      "fileName": "file.jpg",
      "mimeType": "image\/jpeg"
    }
  ]
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/support/issues/12/attachments?abc=def&ghi=0')
            ->willReturn(new Response(200, [], $response));

        $list = $this->client->getAttachments(12, [
            'abc' => 'def',
            'ghi' => false,
        ]);

        self::assertCount(2, $list);

        /** @var Attachment $attachment */
        $attachment = array_shift($list);
        self::assertInstanceOf(Attachment::class, $attachment);
        self::assertSame(123456, $attachment->getId());
        self::assertSame('file.png', $attachment->getFileName());
        self::assertSame('image/png', $attachment->getMimeType());

        /** @var Attachment $comment */
        $attachment = array_shift($list);
        self::assertInstanceOf(Attachment::class, $attachment);
        self::assertSame(123457, $attachment->getId());
        self::assertSame('file.jpg', $attachment->getFileName());
        self::assertSame('image/jpeg', $attachment->getMimeType());
    }
}
