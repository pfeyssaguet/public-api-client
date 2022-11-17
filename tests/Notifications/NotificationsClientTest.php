<?php

namespace ArrowSphere\PublicApiClient\Tests\Notifications;

use ArrowSphere\PublicApiClient\Exception\EntityValidationException;
use ArrowSphere\PublicApiClient\Exception\NotFoundException;
use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Notifications\Entities\Notification;
use ArrowSphere\PublicApiClient\Notifications\NotificationsClient;
use ArrowSphere\PublicApiClient\Tests\AbstractClientTest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

/**
 * Class NotificationsClientTest
 *
 * @property NotificationsClient $client
 */
class NotificationsClientTest extends AbstractClientTest
{
    protected const MOCKED_CLIENT_CLASS = NotificationsClient::class;

    /**
     * @throws NotFoundException
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function testGetNotificationsRaw(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/notification?abc=def&ghi=0')
            ->willReturn(new Response(200, [], 'OK USA'));

        $this->client->getNotificationsRaw([
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    /**
     * @depends testGetNotificationsRaw
     *
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     * @throws EntityValidationException
     */
    public function testGetNotificationsWithInvalidResponse(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/notification?abc=def&ghi=0&per_page=100')
            ->willReturn(new Response(200, [], '{'));

        $this->expectException(PublicApiClientException::class);
        $notifications = $this->client->getNotifications([
            'abc' => 'def',
            'ghi' => false,
        ]);
        iterator_to_array($notifications);
    }

    /**
     * @throws EntityValidationException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function testGetNotificationsWithPagination(): void
    {
        $response1 = json_encode([
            'data' => [
                'notifications' => [],
            ],
            'pagination' => [
                'searchAfter' => '111',
            ],
        ]);
        $response2 = json_encode([
            'data' => [
                'notifications' => [],
            ],
            'pagination' => [
                'searchAfter' => '222',
            ],
        ]);
        $response3 = json_encode([
            'data' => [
                'notifications' => [],
            ],
            'pagination' => [
                'searchAfter' => 'No more rows to query',
            ],
        ]);

        $this->httpClient
            ->expects(self::exactly(3))
            ->method('request')
            ->withConsecutive(
                [
                    'get',
                    'https://www.test.com/notification?abc=def&ghi=0&per_page=100',
                ],
                [
                    'get',
                    'https://www.test.com/notification?abc=def&ghi=0&searchAfter=111&per_page=100',
                ],
                [
                    'get',
                    'https://www.test.com/notification?abc=def&ghi=0&searchAfter=222&per_page=100',
                ]
            )
            ->willReturnOnConsecutiveCalls(
                new Response(200, [], $response1),
                new Response(200, [], $response2),
                new Response(200, [], $response3)
            );

        $test = $this->client->getNotifications([
            'abc' => 'def',
            'ghi' => false,
        ]);
        iterator_to_array($test);
    }

    public function testGetNotifications(): void
    {
        $response = <<<JSON
{
    "status": 200,
    "data": {
        "notifications": [
            {
                "id": "111",
                "userName": "my username",
                "created": "2022-11-07",
                "expires": "2022-12-08",
                "subject": "my subject 1",
                "content": "my content 1",
                "hasBeenRead": false
            },
            {
                "id": "222",
                "userName": "my username",
                "created": "2022-11-12",
                "expires": "2022-12-13",
                "subject": "my subject 2",
                "content": "my content 2",
                "hasBeenRead": true
            }
        ]
    },
    "pagination": {
        "perPage": 10,
        "searchAfter": "No more rows to query"
    }
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/notification?abc=def&ghi=0&per_page=100')
            ->willReturn(new Response(200, [], $response));

        $test = $this->client->getNotifications([
            'abc' => 'def',
            'ghi' => false,
        ]);
        $list = iterator_to_array($test);
        self::assertCount(2, $list);

        /** @var Notification $notification */
        $notification = array_shift($list);
        self::assertInstanceOf(Notification::class, $notification);
        self::assertSame('111', $notification->getId());
        self::assertSame('my username', $notification->getUsername());
        self::assertSame('2022-11-07', $notification->getCreated());
        self::assertSame('2022-12-08', $notification->getExpires());
        self::assertSame('my subject 1', $notification->getSubject());
        self::assertSame('my content 1', $notification->getContent());
        self::assertFalse($notification->getHasBeenRead());

        /** @var Notification $notification */
        $notification = array_shift($list);
        self::assertInstanceOf(Notification::class, $notification);
        self::assertSame('222', $notification->getId());
        self::assertSame('my username', $notification->getUsername());
        self::assertSame('2022-11-12', $notification->getCreated());
        self::assertSame('2022-12-13', $notification->getExpires());
        self::assertSame('my subject 2', $notification->getSubject());
        self::assertSame('my content 2', $notification->getContent());
        self::assertTrue($notification->getHasBeenRead());
    }

    /**
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function testGetNotificationRaw(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/notification/ABCD12345?abc=def&ghi=0')
            ->willReturn(new Response(200, [], 'OK USA'));

        $this->client->getNotificationRaw(
            'ABCD12345',
            [
                'abc' => 'def',
                'ghi' => false,
            ]
        );
    }

    /**
     * @throws EntityValidationException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function testGetNotificationWithInvalidResponse(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/notification/ABCD12345?abc=def&ghi=0')
            ->willReturn(new Response(200, [], '{'));

        $this->expectException(PublicApiClientException::class);
        $this->client->getNotification(
            'ABCD12345',
            [
                'abc' => 'def',
                'ghi' => false,
            ]
        );
    }

    public function testGetNotification(): void
    {
        $response = <<<JSON
{
  "status": 200,
  "data": {
    "notifications": [
      {
        "id": "111",
        "userName": "my username",
        "created": "2022-11-07",
        "expires": "2022-12-08",
        "subject": "my subject 1",
        "content": "my content 1",
        "hasBeenRead": false
      }
    ]
  }
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/notification/ABCD12345?abc=def&ghi=0')
            ->willReturn(new Response(200, [], $response));

        $notification = $this->client->getNotification(
            'ABCD12345',
            [
                'abc' => 'def',
                'ghi' => false,
            ]
        );

        self::assertSame('111', $notification->getId());
        self::assertSame('my username', $notification->getUsername());
        self::assertSame('2022-11-07', $notification->getCreated());
        self::assertSame('2022-12-08', $notification->getExpires());
        self::assertSame('my subject 1', $notification->getSubject());
        self::assertSame('my content 1', $notification->getContent());
        self::assertFalse($notification->getHasBeenRead());
    }
}
