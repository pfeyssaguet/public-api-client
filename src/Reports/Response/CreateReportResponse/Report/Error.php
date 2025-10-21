<?php

namespace ArrowSphere\PublicApiClient\Reports\Response\CreateReportResponse\Report;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;

/**
 * Class Error
 *
 * @method string getSku()
 * @method string getMessage()
 */
class Error extends AbstractEntity
{
    #[Property(required: true)]
    protected string $sku;

    #[Property(required: true)]
    protected string $message;

    /**
     * @param array{
     *     sku: string,
     *     message: string
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
