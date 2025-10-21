<?php

namespace ArrowSphere\PublicApiClient\Reports\Request;

use ArrowSphere\PublicApiClient\Entities\AbstractEntity;
use ArrowSphere\PublicApiClient\Entities\Exception\EntitiesException;
use ArrowSphere\PublicApiClient\Entities\Property;
use ArrowSphere\PublicApiClient\Reports\Request\CreateReportRequest\Product;
use ArrowSphere\PublicApiClient\Reports\Request\CreateReportRequest\Subscription;

/**
 * Class CreateReportRequest
 *
 * @method string getMonth()
 * @method Subscription getSubscription()
 * @method Product[] getProducts()
 */
class CreateReportRequest extends AbstractEntity
{
    #[Property(required: true)]
    protected string $month;

    #[Property(type: Subscription::class, required: true)]
    protected Subscription $subscription;

    #[Property(type: Product::class, isArray: true, required: true)]
    protected array $products;

    /**
     * @param array{
     *     month: string,
     *     subscription: array{
     *         reference: string
     *     },
     *     products: array{
     *         sku: string,
     *         quantity: int
     *     }
     * } $data
     * @throws EntitiesException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
