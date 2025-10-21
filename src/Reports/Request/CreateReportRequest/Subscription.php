<?php

namespace ArrowSphere\PublicApiClient\Reports\Request\CreateReportRequest;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;

/**
 * Class Subscription
 *
 * @method string getReference()
 */
class Subscription extends AbstractEntity
{
    #[Property(required: true)]
    protected string $reference;

    /**
     * @param array{
     *     reference: string
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
