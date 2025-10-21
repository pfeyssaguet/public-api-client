<?php

namespace ArrowSphere\PublicApiClient\Reports\Response;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;
use ArrowSphere\PublicApiClient\Reports\Response\CreateReportResponse\Report;

/**
 * Class CreateReportResponse
 *
 * @method Report getReport()
 */
class CreateReportResponse extends AbstractEntity
{
    #[Property(type: Report::class, required: true)]
    protected Report $report;

    /**
     * @param array{
     *     report: array{
     *         reference: string,
     *         link: string,
     *         errors: list<array{sku: string, message: string}>
     *     }
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
