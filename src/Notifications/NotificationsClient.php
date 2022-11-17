<?php

namespace ArrowSphere\PublicApiClient\Notifications;

use ArrowSphere\PublicApiClient\AbstractClient;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;
use ArrowSphere\PublicApiClient\Exception\NotFoundException;
use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Notifications\Entities\Notification;
use Generator;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class NotificationsClient
 */
class NotificationsClient extends AbstractClient
{
    /**
     * @param array $parameters
     * @return string
     * @throws PublicApiClientException
     * @throws NotFoundException
     * @throws GuzzleException
     */
    public function getNotificationsRaw(array $parameters = []): string
    {
        $this->path = '/notification';

        return $this->get($parameters);
    }

    /**
     * @param array $parameters
     * @return Generator
     * @throws EntityValidationException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function getNotifications(array $parameters = []): Generator
    {
        $this->setPerPage(100);
        $lastPage = false;
        $searchAfter = null;

        while (! $lastPage) {
            if ($searchAfter !== null) {
                $parameters['searchAfter'] = $searchAfter;
            }

            $rawResponse = $this->getNotificationsRaw($parameters);
            $response = $this->decodeResponse($rawResponse);

            $searchAfter = $response['pagination']['searchAfter'];
            if ($searchAfter === 'No more rows to query') {
                $lastPage = true;
            }

            foreach ($response['data']['notifications'] as $data) {
                yield new Notification($data);
            }
        }
    }

    /**
     * @param string $id
     * @param array $parameters
     * @return string
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function getNotificationRaw(string $id, array $parameters = []): string
    {
        $this->path = sprintf('/notification/%s', $id);

        return $this->get($parameters);
    }

    /**
     * @param string $id
     * @param array $parameters
     * @return Notification
     * @throws EntityValidationException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function getNotification(string $id, array $parameters = []): Notification
    {
        $rawResponse = $this->getNotificationRaw($id, $parameters);

        $response = $this->decodeResponse($rawResponse);

        return new Notification($response['data']['notifications'][0]);
    }

    /**
     * @param array $parameters
     * @return int
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function countNotifications(array $parameters = []): int
    {
        $this->path = '/notification/count';

        $rawResponse = $this->get($parameters);

        $response = $this->decodeResponse($rawResponse);

        return $response['data']['total'];
    }
}
