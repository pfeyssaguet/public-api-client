<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder;

use ArrowSphere\PublicApiClient\AbstractEntity;

class CreateOrderInput extends AbstractEntity
{
    public const COLUMN_CUSTOMER = 'customer';

    public const COLUMN_SCENARIO = 'scenario';

    public const COLUMN_SCHEDULED_DATE = 'scheduledDate';

    public const COLUMN_PRODUCTS = 'products';

    public const COLUMN_EXTRA_INFORMATION = 'extraInformation';

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var string|null
     */
    private $scenario;

    /**
     * @var string|null
     */
    private $scheduledDate;

    /**
     * @var Product[]
     */
    private $products;

    /**
     * @var array
     */
    private $extraInformation;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->customer = new Customer($data[self::COLUMN_CUSTOMER]);
        $this->scenario = $data[self::COLUMN_SCENARIO] ?? null;
        $this->scheduledDate = $data[self::COLUMN_SCHEDULED_DATE] ?? null;
        $this->products = $data[self::COLUMN_PRODUCTS];
        $this->extraInformation = $data[self::COLUMN_EXTRA_INFORMATION] ?? [];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_CUSTOMER => $this->customer,
            self::COLUMN_SCENARIO => $this->scenario,
            self::COLUMN_SCHEDULED_DATE => $this->scheduledDate,
            self::COLUMN_PRODUCTS => $this->products,
            self::COLUMN_EXTRA_INFORMATION => $this->extraInformation,
        ];
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return string|null
     */
    public function getScenario(): ?string
    {
        return $this->scenario;
    }

    /**
     * @return string|null
     */
    public function getScheduledDate(): ?string
    {
        return $this->scheduledDate;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return array
     */
    public function getExtraInformation(): array
    {
        return $this->extraInformation;
    }
}
