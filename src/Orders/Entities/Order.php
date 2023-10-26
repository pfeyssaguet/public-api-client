<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class Order
 */
class Order extends AbstractEntity
{
    public const COLUMN_ORDER_REFERENCE = 'order_reference';

    public const COLUMN_REFERENCE = 'reference';

    public const COLUMN_STATUS = 'status';

    public const COLUMN_DATE_STATUS = 'dateStatus';

    public const COLUMN_DATE_CREATION = 'dateCreation';

    public const COLUMN_PO_NUMBER = 'ponumber';

    public const COLUMN_PARTNER = 'partner';

    public const COLUMN_CUSTOMER = 'customer';

    public const COLUMN_PRODUCTS = 'products';

    public const COLUMN_EXTRA_INFORMATION = 'extraInformation';

    protected const VALIDATION_RULES = [
        self::COLUMN_ORDER_REFERENCE => 'required',
        self::COLUMN_REFERENCE => 'required',
        self::COLUMN_STATUS => 'required',
        self::COLUMN_CUSTOMER => 'required',
        self::COLUMN_PRODUCTS => 'required',
    ];

    /** @var string */
    private $orderReference;

    /** @var string */
    private $reference;

    /** @var string */
    private $status;

    /** @var string */
    private $dateStatus;

    /** @var string */
    private $dateCreation;

    /** @var string */
    private $poNumber;

    /** @var Partner */
    private $partner;

    /** @var Customer */
    private $customer;

    /** @var Product[] */
    private $products;

    /** @var ExtraInformation */
    private $extraInformation;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->orderReference = $data[self::COLUMN_ORDER_REFERENCE];
        $this->reference = $data[self::COLUMN_REFERENCE];
        $this->status = $data[self::COLUMN_STATUS];
        $this->dateStatus = $data[self::COLUMN_DATE_STATUS];
        $this->dateCreation = $data[self::COLUMN_DATE_CREATION];
        $this->poNumber = $data[self::COLUMN_PO_NUMBER];
        $this->partner = new Partner($data[self::COLUMN_PARTNER]);
        $this->customer = new Customer($data[self::COLUMN_CUSTOMER]);
        $this->products = array_map(static function (array $productData) {
            return new Product($productData);
        }, $data[self::COLUMN_PRODUCTS]);
        $this->extraInformation = new ExtraInformation($data[self::COLUMN_EXTRA_INFORMATION]);
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_ORDER_REFERENCE => $this->orderReference,
            self::COLUMN_REFERENCE => $this->reference,
            self::COLUMN_STATUS => $this->status,
            self::COLUMN_DATE_STATUS => $this->dateStatus,
            self::COLUMN_DATE_CREATION => $this->dateCreation,
            self::COLUMN_PO_NUMBER => $this->poNumber,
            self::COLUMN_PARTNER => $this->partner,
            self::COLUMN_CUSTOMER => $this->customer,
            self::COLUMN_PRODUCTS => $this->products,
            self::COLUMN_EXTRA_INFORMATION => $this->extraInformation,
        ];
    }
}
