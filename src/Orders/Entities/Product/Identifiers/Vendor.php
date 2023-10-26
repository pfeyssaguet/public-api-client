<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\Product\Identifiers;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class Vendor
 */
class Vendor extends AbstractEntity
{
    public const COLUMN_SKU = 'sku';

    protected const VALIDATION_RULES = [
        self::COLUMN_SKU => 'required',
    ];

    /** @var string */
    private $sku;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->sku = $data[self::COLUMN_SKU];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_SKU => $this->sku,
        ];
    }
    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }
}
