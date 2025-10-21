<?php

namespace ArrowSphere\PublicApiClient\Reports\Response;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;
use ArrowSphere\PublicApiClient\Reports\Response\ValidateReportResponse\Order;

/**
 * Class ValidateReportResponse
 *
 * @method Order[] getOrders()
 */
class ValidateReportResponse extends AbstractEntity
{
    #[Property(type: Order::class, isArray: true)]
    protected array $orders;

    /**
     * @param array{
     *     orders: list<array{
     *         reference: string,
     *         link: string,
     *         status: string
     *     }>
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
