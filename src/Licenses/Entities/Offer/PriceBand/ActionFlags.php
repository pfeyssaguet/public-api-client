<?php

namespace ArrowSphere\PublicApiClient\Licenses\Entities\Offer\PriceBand;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class ActionFlags
 */
class ActionFlags extends AbstractEntity
{
    public const COLUMN_CAN_BE_CANCELLED = 'canBeCancelled';

    public const COLUMN_CAN_BE_REACTIVATED = 'canBeReactivated';

    public const COLUMN_CAN_BE_SUSPENDED = 'canBeSuspended';

    public const COLUMN_CAN_DECREASE_SEATS = 'canDecreaseSeats';

    public const COLUMN_CAN_INCREASE_SEATS = 'canIncreaseSeats';

    protected const VALIDATION_RULES = [
        self::COLUMN_CAN_BE_CANCELLED   => 'required|boolean',
        self::COLUMN_CAN_BE_REACTIVATED => 'required|boolean',
        self::COLUMN_CAN_BE_SUSPENDED   => 'required|boolean',
        self::COLUMN_CAN_DECREASE_SEATS => 'required|boolean',
        self::COLUMN_CAN_INCREASE_SEATS => 'required|boolean',
    ];

    /**
     * @var bool
     */
    private $canBeCancelled;

    /**
     * @var bool
     */
    private $canBeReactivated;

    /**
     * @var bool
     */
    private $canBeSuspended;

    /**
     * @var bool
     */
    private $canDecreaseSeats;

    /**
     * @var bool
     */
    private $canIncreaseSeats;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->canBeCancelled = $data[self::COLUMN_CAN_BE_CANCELLED];
        $this->canBeReactivated = $data[self::COLUMN_CAN_BE_REACTIVATED];
        $this->canBeSuspended = $data[self::COLUMN_CAN_BE_SUSPENDED];
        $this->canDecreaseSeats = $data[self::COLUMN_CAN_DECREASE_SEATS];
        $this->canIncreaseSeats = $data[self::COLUMN_CAN_INCREASE_SEATS];
    }

    /**
     * @return bool
     */
    public function isCanBeCancelled(): bool
    {
        return $this->canBeCancelled;
    }

    /**
     * @return bool
     */
    public function isCanBeReactivated(): bool
    {
        return $this->canBeReactivated;
    }

    /**
     * @return bool
     */
    public function isCanBeSuspended(): bool
    {
        return $this->canBeSuspended;
    }

    /**
     * @return bool
     */
    public function isCanDecreaseSeats(): bool
    {
        return $this->canDecreaseSeats;
    }

    /**
     * @return bool
     */
    public function isCanIncreaseSeats(): bool
    {
        return $this->canIncreaseSeats;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'canBeCancelled'   => $this->isCanBeCancelled(),
            'canBeReactivated' => $this->isCanBeReactivated(),
            'canBeSuspended'   => $this->isCanBeSuspended(),
            'canDecreaseSeats' => $this->isCanDecreaseSeats(),
            'canIncreaseSeats' => $this->isCanIncreaseSeats(),
        ];
    }
}
