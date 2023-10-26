<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Orders\Entities\Product\Identifiers;
use ArrowSphere\PublicApiClient\Orders\Entities\Product\License;
use ArrowSphere\PublicApiClient\Orders\Entities\Product\Prices;
use ArrowSphere\PublicApiClient\Orders\Entities\Product\Program;
use ArrowSphere\PublicApiClient\Orders\Entities\Product\Subscription;

/**
 * Class Product
 */
class Product extends AbstractEntity
{
    public const COLUMN_SKU = 'sku';
    public const COLUMN_NAME = 'name';
    public const COLUMN_CLASSIFICATION = 'classification';
    public const COLUMN_PROGRAM = 'program';
    public const COLUMN_IDENTIFIERS = 'identifiers';
    public const COLUMN_QUANTITY = 'quantity';
    public const COLUMN_STATUS = 'status';
    public const COLUMN_DATE_STATUS = 'dateStatus';
    public const COLUMN_IS_ADDON = 'isAddon';
    public const COLUMN_IS_TRIAL = 'isTrial';
    public const COLUMN_ARROW_SUB_CATEGORIES = 'arrowSubCategories';
    public const COLUMN_DETAILED_STATUS = 'detailedStatus';
    public const COLUMN_PRICES = 'prices';
    public const COLUMN_SUBSCRIPTION = 'subscription';
    public const COLUMN_LICENSE = 'license';

    /** @var string */
    private $sku;

    /** @var string */
    private $name;

    /** @var string */
    private $classification;

    /** @var Program */
    private $program;

    /** @var Identifiers */
    private $identifiers;

    /** @var int */
    private $quantity;

    /** @var string */
    private $status;

    /** @var string */
    private $dateStatus;

    /** @var bool */
    private $isAddon;

    /** @var bool */
    private $isTrial;

    /** @var string[] */
    private $arrowSubCategories;

    /** @var string */
    private $detailedStatus;

    /** @var Prices */
    private $prices;

    /** @var Subscription */
    private $subscription;

    /** @var License */
    private $license;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->sku = $data[self::COLUMN_SKU];
        $this->name = $data[self::COLUMN_NAME];
        $this->classification = $data[self::COLUMN_CLASSIFICATION];
        $this->program = new Program($data[self::COLUMN_PROGRAM]);
        $this->identifiers = new Identifiers($data[self::COLUMN_IDENTIFIERS]);
        $this->quantity = $data[self::COLUMN_QUANTITY];
        $this->status = $data[self::COLUMN_STATUS];
        $this->dateStatus = $data[self::COLUMN_DATE_STATUS];
        $this->isAddon = $data[self::COLUMN_IS_ADDON];
        $this->isTrial = $data[self::COLUMN_IS_TRIAL];
        $this->arrowSubCategories = $data[self::COLUMN_ARROW_SUB_CATEGORIES];
        $this->detailedStatus = $data[self::COLUMN_DETAILED_STATUS];
        $this->prices = new Prices($data[self::COLUMN_PRICES]);
        $this->subscription = new Subscription($data[self::COLUMN_SUBSCRIPTION]);
        $this->license = new License($data[self::COLUMN_LICENSE]);
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_SKU => $this->sku,
            self::COLUMN_NAME => $this->name,
            self::COLUMN_CLASSIFICATION => $this->classification,
            self::COLUMN_PROGRAM => $this->program,
            self::COLUMN_IDENTIFIERS => $this->identifiers,
            self::COLUMN_QUANTITY => $this->quantity,
            self::COLUMN_STATUS => $this->status,
            self::COLUMN_DATE_STATUS => $this->dateStatus,
            self::COLUMN_IS_ADDON => $this->isAddon,
            self::COLUMN_IS_TRIAL => $this->isTrial,
            self::COLUMN_ARROW_SUB_CATEGORIES => $this->arrowSubCategories,
            self::COLUMN_DETAILED_STATUS => $this->detailedStatus,
            self::COLUMN_PRICES => $this->prices,
            self::COLUMN_SUBSCRIPTION => $this->subscription,
            self::COLUMN_LICENSE => $this->license,
        ];
    }
}
