<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder\Product;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder\Product\Price\TierPrice;
use ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder\Product\Price\VendorTierPrice;

class Price extends AbstractEntity
{
    public const COLUMN_VENDOR = 'vendor';

    public const COLUMN_BUY = 'buy';

    public const COLUMN_LIST = 'list';

    public const COLUMN_RESELLER = 'reseller';

    public const COLUMN_END_CUSTOMER = 'endCustomer';

    /**
     * @var VendorTierPrice|null
     */
    private $vendor;

    /**
     * @var TierPrice
     */
    private $buy;

    /**
     * @var TierPrice
     */
    private $list;

    /**
     * @var TierPrice
     */
    private $reseller;

    /**
     * @var TierPrice
     */
    private $endCustomer;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->vendor = isset($data[self::COLUMN_VENDOR]) ? new VendorTierPrice($data[self::COLUMN_VENDOR]) : null;
        $this->buy = new TierPrice($data[self::COLUMN_BUY]);
        $this->list = new TierPrice($data[self::COLUMN_LIST]);
        $this->reseller = new TierPrice($data[self::COLUMN_RESELLER]);
        $this->endCustomer = new TierPrice($data[self::COLUMN_END_CUSTOMER]);
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_VENDOR => $this->vendor,
            self::COLUMN_BUY => $this->buy,
            self::COLUMN_LIST => $this->list,
            self::COLUMN_RESELLER => $this->reseller,
            self::COLUMN_END_CUSTOMER => $this->endCustomer,
        ];
    }

    public function getVendor(): ?VendorTierPrice
    {
        return $this->vendor;
    }

    public function getBuy(): TierPrice
    {
        return $this->buy;
    }

    public function getList(): TierPrice
    {
        return $this->list;
    }

    public function getReseller(): TierPrice
    {
        return $this->reseller;
    }

    public function getEndCustomer(): TierPrice
    {
        return $this->endCustomer;
    }
}
