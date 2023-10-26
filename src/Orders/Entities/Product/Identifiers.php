<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Orders\Entities\Product\Identifiers\Vendor;

/**
 * Class Identifiers
 */
class Identifiers extends AbstractEntity
{
    public const COLUMN_VENDOR = 'vendor';

    protected const VALIDATION_RULES = [
        self::COLUMN_VENDOR => 'required',
    ];

    /** @var Vendor */
    private $vendor;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->vendor = new Vendor($data[self::COLUMN_VENDOR]);
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_VENDOR => $this->vendor,
        ];
    }

    public function getVendor(): Vendor
    {
        return $this->vendor;
    }
}
