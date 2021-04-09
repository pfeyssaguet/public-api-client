<?php

namespace ArrowSphere\PublicApiClient\Licenses\Entities\Offer\PriceBand;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class SaleConstraints
 */
class SaleConstraints extends AbstractEntity
{
    public const COLUMN_MIN_QUANTITY = 'minQuantity';

    public const COLUMN_MAX_QUANTITY = 'maxQuantity';

    protected const VALIDATION_RULES = [
        self::COLUMN_MIN_QUANTITY => 'required|numeric',
        self::COLUMN_MAX_QUANTITY => 'required|numeric',
    ];

    /**
     * @var float
     */
    private $minQuantity;

    /**
     * @var float
     */
    private $maxQuantity;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->minQuantity = $data[self::COLUMN_MIN_QUANTITY];
        $this->maxQuantity = $data[self::COLUMN_MAX_QUANTITY];
    }

    /**
     * @return float
     */
    public function getMinQuantity(): float
    {
        return $this->minQuantity;
    }

    /**
     * @return float
     */
    public function getMaxQuantity(): float
    {
        return $this->maxQuantity;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_MIN_QUANTITY => $this->getMinQuantity(),
            self::COLUMN_MAX_QUANTITY => $this->getMaxQuantity(),
        ];
    }
}
