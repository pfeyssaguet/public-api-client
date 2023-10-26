<?php

namespace ArrowSphere\PublicApiClient\Subscriptions\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;

/**
 * Class Subscription
 */
class Subscription extends AbstractEntity
{
    public const COLUMN_REFERENCE = 'reference';

    public const COLUMN_NAME = 'name';

    public const COLUMN_STATUS = 'status';

    public const COLUMN_DATE_DEMAND = 'dateDemand';

    public const COLUMN_DATE_VALIDATION = 'dateValidation';

    public const COLUMN_DATE_END = 'dateEnd';

    protected const VALIDATION_RULES = [
        self::COLUMN_REFERENCE => 'required',
        self::COLUMN_NAME => 'required',
        self::COLUMN_STATUS => 'required',
        self::COLUMN_DATE_DEMAND => 'required',
        self::COLUMN_DATE_VALIDATION => 'required',
        self::COLUMN_DATE_END => 'required',
    ];

    /** @var string */
    private $reference;

    /** @var string */
    private $name;

    /** @var string */
    private $status;

    /** @var string */
    private $dateDemand;

    /** @var string */
    private $dateValidation;

    /** @var string */
    private $dateEnd;

    /**
     * @param array $data
     * @throws EntityValidationException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->reference = $data[self::COLUMN_REFERENCE];
        $this->name = $data[self::COLUMN_NAME];
        $this->status = $data[self::COLUMN_STATUS];
        $this->dateDemand = $data[self::COLUMN_DATE_DEMAND];
        $this->dateValidation = $data[self::COLUMN_DATE_VALIDATION];
        $this->dateEnd = $data[self::COLUMN_DATE_END];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_REFERENCE => $this->reference,
            self::COLUMN_NAME => $this->name,
            self::COLUMN_STATUS => $this->status,
            self::COLUMN_DATE_DEMAND => $this->dateDemand,
            self::COLUMN_DATE_VALIDATION => $this->dateValidation,
            self::COLUMN_DATE_END => $this->dateEnd,

        ];
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDateDemand(): string
    {
        return $this->dateDemand;
    }

    /**
     * @return string
     */
    public function getDateValidation(): string
    {
        return $this->dateValidation;
    }

    /**
     * @return string
     */
    public function getDateEnd(): string
    {
        return $this->dateEnd;
    }
    
    
}
