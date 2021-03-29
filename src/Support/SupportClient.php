<?php

namespace ArrowSphere\PublicApiClient\Support;

use ArrowSphere\PublicApiClient\AbstractClient;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;
use ArrowSphere\PublicApiClient\Exception\NotFoundException;
use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Support\Entities\Issue;
use Generator;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class SupportClient
 */
class SupportClient extends AbstractClient
{
    /**
     * @param array $parameters
     *
     * @return string
     *
     * @throws NotFoundException
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function getIssuesRaw(array $parameters = []): string
    {
        $this->path = '/support/issues';

        return $this->get($parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Generator|Issue[]
     *
     * @throws EntityValidationException
     * @throws PublicApiClientException
     * @throws GuzzleException
     */
    public function getIssues(array $parameters = []): Generator
    {
        $this->setPerPage(100);
        $currentPage = 1;
        $lastPage = false;

        while (! $lastPage) {
            $this->setPage($currentPage);
            $rawResponse = $this->getIssuesRaw($parameters);
            $response = $this->decodeResponse($rawResponse);

            $totalPages = ceil($response['pagination']['total'] / $this->perPage);

            if ($totalPages <= $currentPage) {
                $lastPage = true;
            }

            $currentPage++;

            foreach ($response['data'] as $data) {
                yield new Issue($data);
            }
        }
    }

    /**
     * @param int $id
     * @param array $parameters
     *
     * @return string
     *
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function getIssueRaw(int $id, array $parameters = []): string
    {
        $this->path = sprintf(
            '/support/issues/%s',
            $id
        );

        return $this->get($parameters);
    }

    /**
     * @param int $id
     * @param array $parameters
     *
     * @return Issue
     *
     * @throws EntityValidationException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function getIssue(int $id, array $parameters = []): Issue
    {
        $rawResponse = $this->getIssueRaw($id, $parameters);
        $response = $this->decodeResponse($rawResponse);

        return new Issue($response['data']);
    }

    /**
     * @param Issue $issue
     * @param array $parameters
     *
     * @return int
     *
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function createIssue(Issue $issue, array $parameters = []): int
    {
        $payload = $issue->jsonSerialize();
        unset(
            $payload[Issue::COLUMN_ID],
            $payload[Issue::COLUMN_CREATED],
            $payload[Issue::COLUMN_UPDATED],
            $payload[Issue::COLUMN_STATUS]
        );

        $this->path = '/support/issues';

        $rawResponse = $this->post($payload, $parameters);

        $response = $this->decodeResponse((string)$rawResponse);

        return $response['data']['id'];
    }
}
