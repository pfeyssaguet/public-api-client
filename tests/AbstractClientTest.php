<?php

namespace ArrowSphere\PublicApiClient\Tests;

use ArrowSphere\PublicApiClient\AbstractClient;
use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Common\ValueObject\UserAgentHeader;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractClientTest
 */
abstract class AbstractClientTest extends TestCase
{
    /**
     * @var MockObject|Client
     */
    protected $httpClient;

    /**
     * @var AbstractClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $userAgentHeader;

    protected const MOCKED_CLIENT_CLASS = null;

    /**
     * Initialization of the mocked curler and the API client.
     */
    public function setUp(): void
    {
        // For the tests we want the validation to happen
        AbstractEntity::$enableValidation = true;

        $this->httpClient = $this->createMock(Client::class);

        $class = static::MOCKED_CLIENT_CLASS;

        if ($class === null) {
            self::fail('You should override const MOCKED_CLIENT_CLASS in your class ' . static::class);
        }

        $this->client = new $class($this->httpClient);
        $this->client->setUrl('https://www.test.com');
        $this->client->setApiKey('123456');

        $this->userAgentHeader = (string) new UserAgentHeader();
    }

    /**
     * This is a generic provider that must return test cases with the following arguments:
     * - method: an array with the method name and the optional args to be passed to the method
     * - httpMethod: the method expected to be called
     * - uri: the URI expected to be called
     * - postData: an optional array containing data that should be sent as part of the payload body
     * - expectedBody: an optional array containing the expected body to be sent (if different from postData)
     *
     * @return array
     */
    public static function providerSimpleEndpoints(): array
    {
        return [];
    }

    /**
     * @dataProvider providerSimpleEndpoints
     */
    public function testSimpleEndpoints(array $method, string $httpMethod, string $uri, array $postData = [], array $expectedBody = null): void
    {
        $expectedBody ??= $postData;

        $this->httpClient
            ->expects(self::once())
            ->method('request')
            ->with(
                $httpMethod,
                'https://www.test.com' . $uri,
                [
                    'headers' => [
                        'apiKey' => '123456',
                        'Content-Type' => 'application/json',
                        'User-Agent' => $this->userAgentHeader,
                    ],
                    'body' => json_encode($expectedBody),
                ]
            )
            ->willReturn(new Response(204));

        $arguments = [...$method['args'] ?? [], $postData];

        $methodName = $method['name'];

        $this->client->$methodName('XSP1234', ...$arguments);
    }
}
