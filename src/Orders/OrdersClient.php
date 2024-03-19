<?php

namespace ArrowSphere\PublicApiClient\Orders;

use ArrowSphere\PublicApiClient\AbstractClient;
use ArrowSphere\PublicApiClient\Exception\NotFoundException;
use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder\CreateOrderInput;
use GuzzleHttp\Exception\GuzzleException;

class OrdersClient extends AbstractClient
{
    /**
     * Creates an order and returns its newly created reference.
     *
     * @param CreateOrderInput $input
     * @param array $parameters Optional parameters to add to the URL
     *
     * @return string
     * @throws GuzzleException
     * @throws PublicApiClientException
     * @throws NotFoundException
     */
    public function create(CreateOrderInput $input, array $parameters = []): string
    {
        $payload = $input->jsonSerialize();

        $this->path = '/orders';

        $rawResponse = $this->post($payload, $parameters);

        $response = $this->decodeResponse($rawResponse);

        if (! isset($response['data']['reference'])) {
            throw new PublicApiClientException('The response data does not contain a reference');
        }

        return $response['data']['reference'];
    }
}
