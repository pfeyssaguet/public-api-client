<?php

namespace ArrowSphere\PublicApiClient\Subscriptions;

use ArrowSphere\PublicApiClient\AbstractClient;
use ArrowSphere\PublicApiClient\Catalog\Entities\Classification;
use ArrowSphere\PublicApiClient\Exception\NotFoundException;
use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Subscriptions\Entities\Subscription;
use Generator;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class SubscriptionsClient
 */
class SubscriptionsClient extends AbstractClient
{
    /**
     * @var string The base path of the Subscriptions API
     */
    protected const ROOT_PATH = '/subscriptions';

    /**
     * @var string The base path of the API
     */
    protected $basePath = self::ROOT_PATH;

    /**
     * Returns all the subscriptions.
     *
     * @param array $parameters
     * @return string
     * @throws NotFoundException
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function getSubscriptionsRaw(array $parameters = []): string
    {
        return $this->get($parameters);
    }

    /**
     * Returns all the subscriptions.
     *
     * @param array $parameters
     * @return Generator<Subscription>
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function getSubscriptions(array $parameters = []): Generator
    {
        $rawResponse = $this->getSubscriptionsRaw($parameters);

        $response = $this->decodeResponse($rawResponse);

        foreach ($response['data'] as $data) {
            yield new Subscription($data);
        }
    }
}
