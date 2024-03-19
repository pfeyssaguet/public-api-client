<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder\Product\Price;

class Product extends AbstractEntity
{
    public const COLUMN_ARROWSPHERE_PRICEBAND_SKU = 'arrowSpherePriceBandSku';

    public const COLUMN_QUANTITY = 'quantity';

    public const COLUMN_PARENT_LICENSE_ID = 'parentLicenseId';

    public const COLUMN_PARENT_SKU = 'parentSku';

    public const COLUMN_PROMOTION_ID = 'promotionId';

    public const COLUMN_DISCOUNT = 'discount';

    public const COLUMN_UPLIFT = 'uplift';

    public const COLUMN_EFFECTIVE_START_DATE = 'effectiveStartDate';

    public const COLUMN_EFFECTIVE_END_DATE = 'effectiveEndDate';

    public const COLUMN_VENDOR_REFERENCE_ID = 'vendorReferenceId';

    public const COLUMN_PARENT_VENDOR_REFERENCE_ID = 'parentVendorReferenceId';

    public const COLUMN_PRICE = 'price';

    public const COLUMN_AUTO_RENEW = 'autoRenew';

    public const COLUMN_FRIENDLY_NAME = 'friendlyName';

    public const COLUMN_COMMENT1 = 'comment1';

    public const COLUMN_COMMENT2 = 'comment2';

    public const COLUMN_COTERMINOSITY_DATE = 'coterminosityDate';

    public const COLUMN_COTERMINOSITY_SUBSCRIPTION_REF = 'coterminositySubscriptionRef';

    /**
     * @var string
     */
    private $arrowSpherePriceBandSku;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var string|null
     */
    private $parentLicenseId;

    /**
     * @var string|null
     */
    private $parentSku;

    /**
     * @var string|null
     */
    private $promotionId;

    /**
     * @var float|null
     */
    private $discount;

    /**
     * @var float|null
     */
    private $uplift;

    /**
     * @var string|null
     */
    private $effectiveStartDate;

    /**
     * @var string|null
     */
    private $effectiveEndDate;

    /**
     * @var string|null
     */
    private $vendorReferenceId;

    /**
     * @var string|null
     */
    private $parentVendorReferenceId;

    /**
     * @var Price|null
     */
    private $price;

    /**
     * @var bool|null
     */
    private $autoRenew;

    /**
     * @var string|null
     */
    private $friendlyName;

    /**
     * @var string|null
     */
    private $comment1;

    /**
     * @var string|null
     */
    private $comment2;

    /**
     * @var string|null
     */
    private $coterminosityDate;

    /**
     * @var string|null
     */
    private $coterminositySubscriptionRef;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->arrowSpherePriceBandSku = $data[self::COLUMN_ARROWSPHERE_PRICEBAND_SKU];
        $this->quantity = $data[self::COLUMN_QUANTITY];
        $this->parentLicenseId = $data[self::COLUMN_PARENT_LICENSE_ID] ?? null;
        $this->parentSku = $data[self::COLUMN_PARENT_SKU] ?? null;
        $this->promotionId = $data[self::COLUMN_PROMOTION_ID] ?? null;
        $this->discount = $data[self::COLUMN_DISCOUNT] ?? null;
        $this->uplift = $data[self::COLUMN_UPLIFT] ?? null;
        $this->effectiveStartDate = $data[self::COLUMN_EFFECTIVE_START_DATE] ?? null;
        $this->effectiveEndDate = $data[self::COLUMN_EFFECTIVE_END_DATE] ?? null;
        $this->vendorReferenceId = $data[self::COLUMN_VENDOR_REFERENCE_ID] ?? null;
        $this->parentVendorReferenceId = $data[self::COLUMN_PARENT_VENDOR_REFERENCE_ID] ?? null;
        $this->price = isset($data[self::COLUMN_PRICE]) ? new Price($data[self::COLUMN_PRICE]) : null;
        $this->autoRenew = $data[self::COLUMN_AUTO_RENEW] ?? null;
        $this->friendlyName = $data[self::COLUMN_FRIENDLY_NAME] ?? null;
        $this->comment1 = $data[self::COLUMN_COMMENT1] ?? null;
        $this->comment2 = $data[self::COLUMN_COMMENT2] ?? null;
        $this->coterminosityDate = $data[self::COLUMN_COTERMINOSITY_DATE] ?? null;
        $this->coterminositySubscriptionRef = $data[self::COLUMN_COTERMINOSITY_SUBSCRIPTION_REF] ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_ARROWSPHERE_PRICEBAND_SKU => $this->arrowSpherePriceBandSku,
            self::COLUMN_QUANTITY => $this->quantity,
            self::COLUMN_PARENT_LICENSE_ID => $this->parentLicenseId,
            self::COLUMN_PARENT_SKU => $this->parentSku,
            self::COLUMN_PROMOTION_ID => $this->promotionId,
            self::COLUMN_DISCOUNT => $this->discount,
            self::COLUMN_UPLIFT => $this->uplift,
            self::COLUMN_EFFECTIVE_START_DATE => $this->effectiveStartDate,
            self::COLUMN_EFFECTIVE_END_DATE => $this->effectiveEndDate,
            self::COLUMN_VENDOR_REFERENCE_ID => $this->vendorReferenceId,
            self::COLUMN_PARENT_VENDOR_REFERENCE_ID => $this->parentVendorReferenceId,
            self::COLUMN_PRICE => $this->price,
            self::COLUMN_AUTO_RENEW => $this->autoRenew,
            self::COLUMN_FRIENDLY_NAME => $this->friendlyName,
            self::COLUMN_COMMENT1 => $this->comment1,
            self::COLUMN_COMMENT2 => $this->comment2,
            self::COLUMN_COTERMINOSITY_DATE => $this->coterminosityDate,
            self::COLUMN_COTERMINOSITY_SUBSCRIPTION_REF => $this->coterminositySubscriptionRef,
        ];
    }

    /**
     * @return string
     */
    public function getArrowSpherePriceBandSku(): string
    {
        return $this->arrowSpherePriceBandSku;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return string|null
     */
    public function getParentLicenseId(): ?string
    {
        return $this->parentLicenseId;
    }

    /**
     * @return string|null
     */
    public function getParentSku(): ?string
    {
        return $this->parentSku;
    }

    /**
     * @return string|null
     */
    public function getPromotionId(): ?string
    {
        return $this->promotionId;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @return float|null
     */
    public function getUplift(): ?float
    {
        return $this->uplift;
    }

    /**
     * @return string|null
     */
    public function getEffectiveStartDate(): ?string
    {
        return $this->effectiveStartDate;
    }

    /**
     * @return string|null
     */
    public function getEffectiveEndDate(): ?string
    {
        return $this->effectiveEndDate;
    }

    /**
     * @return string|null
     */
    public function getVendorReferenceId(): ?string
    {
        return $this->vendorReferenceId;
    }

    /**
     * @return string|null
     */
    public function getParentVendorReferenceId(): ?string
    {
        return $this->parentVendorReferenceId;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @return bool|null
     */
    public function getAutoRenew(): ?bool
    {
        return $this->autoRenew;
    }

    /**
     * @return string|null
     */
    public function getFriendlyName(): ?string
    {
        return $this->friendlyName;
    }

    /**
     * @return string|null
     */
    public function getComment1(): ?string
    {
        return $this->comment1;
    }

    /**
     * @return string|null
     */
    public function getComment2(): ?string
    {
        return $this->comment2;
    }

    /**
     * @return string|null
     */
    public function getCoterminosityDate(): ?string
    {
        return $this->coterminosityDate;
    }

    /**
     * @return string|null
     */
    public function getCoterminositySubscriptionRef(): ?string
    {
        return $this->coterminositySubscriptionRef;
    }
}
