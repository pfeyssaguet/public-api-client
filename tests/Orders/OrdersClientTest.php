<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders;

use ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder\CreateOrderInput;
use ArrowSphere\PublicApiClient\Orders\OrdersClient;
use ArrowSphere\PublicApiClient\Tests\AbstractClientTest;
use GuzzleHttp\Psr7\Response;

/**
 * Class OrdersClientTest
 *
 * @property OrdersClient $client
 */
class OrdersClientTest extends AbstractClientTest
{
    protected const MOCKED_CLIENT_CLASS = OrdersClient::class;

    public function testCreate(): void
    {
        $payload = [];

        $createOrderInput = new CreateOrderInput($payload);

        $response = <<<JSON
{
    "status": 201,
    "data": {
        "reference": "XSPO123456"
    }
}
JSON;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with('post', 'https://www.test.com/orders?abc=def&ghi=0', [
                'headers' => [
                    'apiKey' => '123456',
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($payload),
            ])
            ->willReturn(new Response(201, [], $response));

        $reference = $this->client->create($createOrderInput, [
            'abc' => 'def',
            'ghi' => false,
        ]);

        self::assertSame('XSPO123456', $reference);
    }
}
