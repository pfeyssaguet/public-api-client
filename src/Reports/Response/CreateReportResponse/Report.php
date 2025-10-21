<?php

namespace ArrowSphere\PublicApiClient\Reports\Response\CreateReportResponse;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;
use ArrowSphere\PublicApiClient\Reports\Response\CreateReportResponse\Report\Error;

/**
 * Class Report
 *
 * @method string getReference()
 * @method string getLink()
 * @method Error[] getErrors()
 */
class Report extends AbstractEntity
{
    #[Property(required: true)]
    protected string $reference;

    #[Property(required: true)]
    protected string $link;

    #[Property(type: Error::class, isArray: true)]
    protected array $errors = [];

    /**
     * @param array{
     *     reference: string,
     *     link: string,
     *     errors: list<array{sku: string, message: string}>
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
