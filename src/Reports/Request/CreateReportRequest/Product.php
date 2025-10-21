<?php

namespace ArrowSphere\PublicApiClient\Reports\Request\CreateReportRequest;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;

/**
 * Class Product
 *
 * @method string getSku()
 * @method int getQuantity()
 */
class Product extends AbstractEntity
{
    #[Property(required: true)]
    protected string $sku;

    #[Property(type: 'int', required: true)]
    protected int $quantity;

    /**
     * @param array{
     *     sku: string,
     *     quantity: int
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
