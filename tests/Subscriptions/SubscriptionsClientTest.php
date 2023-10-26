<?php

namespace ArrowSphere\PublicApiClient\Tests\Subscriptions;

use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Subscriptions\Entities\Subscription;
use ArrowSphere\PublicApiClient\Subscriptions\SubscriptionsClient;
use ArrowSphere\PublicApiClient\Tests\AbstractClientTest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

/**
 * Class SubscriptionsClientTest
 *
 * @property SubscriptionsClient $client
 */
class SubscriptionsClientTest extends AbstractClientTest
{
    protected const MOCKED_CLIENT_CLASS = SubscriptionsClient::class;

    public function testGetSubscriptionsRaw(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/subscriptions?abc=def&ghi=0')
            ->willReturn(new Response(200, [], 'OK USA'));

        $this->client->getSubscriptionsRaw([
            'abc' => 'def',
            'ghi' => false,
        ]);
    }

    /**
     * @depends testGetSubscriptionsRaw
     *
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function testGetSubscriptionsWithInvalidResponse(): void
    {
        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/subscriptions?abc=def&ghi=0')
            ->willReturn(new Response(200, [], '{'));

        $this->expectException(PublicApiClientException::class);
        $subscriptions = $this->client->getSubscriptions([
            'abc' => 'def',
            'ghi' => false,
        ]);
        iterator_to_array($subscriptions);
    }

    /**
     * @throws PublicApiClientException
     */
    public function testGetSubscriptions(): void
    {
        $response = <<<JSON
{
  "status": 200,
  "data": [
    {
      "reference": "XSPS7189",
      "name": "MSCSP",
      "status": "Validated",
      "dateDemand": "2022-07-26T14:25:17.000Z",
      "dateValidation": "2017-05-15T11:22:31.000Z",
      "dateEnd": "2023-12-31T00:00:00.000Z",
      "details": {
        "mpnid": "",
        "sales_guid": "",
        "admin_guid": "",
        "helpdesk_guid": "",
        "tenantid": ""
      },
      "extraInformation": {
        "programs": {
          "MSCSP": {
            "mpnid": "",
            "sales_guid": "",
            "admin_guid": "",
            "helpdesk_guid": "",
            "tenantid": ""
          }
        }
      }
    },
    {
      "reference": "XSPS11389",
      "name": "AWS-RESELLER",
      "status": "Validated",
      "dateDemand": "2023-07-06T12:28:25.000Z",
      "dateValidation": "2018-01-11T15:07:49.000Z",
      "dateEnd": "2024-05-11T15:07:49.000Z",
      "details": {},
      "extraInformation": {
        "programs": {}
      }
    }
  ]
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('get', 'https://www.test.com/subscriptions?abc=def&ghi=0')
            ->willReturn(new Response(200, [], $response));

        $test = $this->client->getSubscriptions([
            'abc' => 'def',
            'ghi' => false,
        ]);
        $list = iterator_to_array($test);
        self::assertCount(2, $list);

        /** @var Subscription $subscription */
        $subscription = array_shift($list);
        self::assertInstanceOf(Subscription::class, $subscription);
        self::assertSame('XSPS7189', $subscription->getReference());
        self::assertSame('MSCSP', $subscription->getName());
        self::assertSame('Validated', $subscription->getStatus());
        self::assertSame('2022-07-26T14:25:17.000Z', $subscription->getDateDemand());
        self::assertSame('2017-05-15T11:22:31.000Z', $subscription->getDateValidation());
        self::assertSame('2023-12-31T00:00:00.000Z', $subscription->getDateEnd());

        /** @var Subscription $subscription */
        $subscription = array_shift($list);
        self::assertInstanceOf(Subscription::class, $subscription);
        self::assertSame('XSPS11389', $subscription->getReference());
        self::assertSame('AWS-RESELLER', $subscription->getName());
        self::assertSame('Validated', $subscription->getStatus());
        self::assertSame('2023-07-06T12:28:25.000Z', $subscription->getDateDemand());
        self::assertSame('2018-01-11T15:07:49.000Z', $subscription->getDateValidation());
        self::assertSame('2024-05-11T15:07:49.000Z', $subscription->getDateEnd());
    }
}
