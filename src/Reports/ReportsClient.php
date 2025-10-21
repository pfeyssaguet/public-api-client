<?php

namespace ArrowSphere\PublicApiClient\Reports;

use ArrowSphere\PublicApiClient\AbstractClient;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Exception\NotFoundException;
use ArrowSphere\PublicApiClient\Exception\PublicApiClientException;
use ArrowSphere\PublicApiClient\Reports\Request\CreateReportRequest;
use ArrowSphere\PublicApiClient\Reports\Response\CreateReportResponse;
use ArrowSphere\PublicApiClient\Reports\Response\ValidateReportResponse;
use GuzzleHttp\Exception\GuzzleException;

class ReportsClient extends AbstractClient
{
    /**
     * @var string The base path of the API
     */
    protected $basePath = '/reports';

    /**
     * Creates a report.
     *
     * @param CreateReportRequest $createReport
     * @param array $parameters
     * @param array $headers
     *
     * @return CreateReportResponse
     *
     * @throws EntitiesException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function create(
        CreateReportRequest $createReport,
        array $parameters = [],
        array $headers = [],
    ): CreateReportResponse {
        $this->path = '';
        $response = $this->post($createReport->jsonSerialize(), $parameters, $headers);

        /** @var array{reference: string, link: string} $responseData */
        $responseData = $this->getResponseData($response->__toString());

        return new CreateReportResponse($responseData);
    }

    /**
     * Validates a report.
     *
     * @param string $reportReference
     * @param array $parameters
     * @param array $headers
     * @return ValidateReportResponse
     * @throws EntitiesException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws PublicApiClientException
     */
    public function validate(
        string $reportReference,
        array $parameters = [],
        array $headers = [],
    ): ValidateReportResponse {
        $this->path = sprintf('/%s', $reportReference);
        $response = $this->patch([], $parameters, $headers);

        /** @var array{
         *     orders: list<array{
         *         reference: string,
         *         link: string,
         *         status: string
         *     }>
         * } $responseData */
        $responseData = $this->getResponseData($response->__toString());

        return new ValidateReportResponse($responseData);
    }
}
