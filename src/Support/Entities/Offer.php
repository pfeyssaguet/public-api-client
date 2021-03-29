<?php

namespace ArrowSphere\PublicApiClient\Support\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;

/**
 * Class Offer
 */
class Offer extends AbstractEntity
{
    public const COLUMN_NAME = 'name';

    public const COLUMN_SKU = 'sku';

    public const COLUMN_VENDOR = 'vendor';

    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $sku;

    /**
     * @var string
     */
    private $vendor;

    protected const VALIDATION_RULES = [
        self::COLUMN_NAME   => 'required',
        self::COLUMN_VENDOR => 'required',
    ];

    /**
     * Offer constructor.
     *
     * @param array $data
     *
     * @throws EntityValidationException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->name = $data[self::COLUMN_NAME];
        $this->sku = $data[self::COLUMN_SKU] ?? null;
        $this->vendor = $data[self::COLUMN_VENDOR];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            self::COLUMN_NAME   => $this->name,
            self::COLUMN_SKU    => $this->sku,
            self::COLUMN_VENDOR => $this->vendor,
        ];
    }
}
