<?php

namespace ArrowSphere\PublicApiClient\Reports\Response\ValidateReportResponse;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;

/**
 * Class Order
 *
 * @method string getReference()
 * @method string getLink()
 * @method string getStatus()
 */
class Order extends AbstractEntity
{
    #[Property(required: true)]
    protected string $reference;

    #[Property(required: true)]
    protected string $link;

    #[Property(required: true)]
    protected string $status;

    /**
     * @param array{
     *     reference: string,
     *     link: string,
     *     status: string
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
