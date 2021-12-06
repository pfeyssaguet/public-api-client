<?php

namespace ArrowSphere\PublicApiClient\Support\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;

/**
 * Class Issue
 */
class Issue extends AbstractEntity
{
    public const COLUMN_CREATED_BY = 'createdBy';

    public const COLUMN_CREATED = 'created';

    public const COLUMN_DESCRIPTION = 'description';

    public const COLUMN_END_CUSTOMER_REF = 'endCustomerRef';

    public const COLUMN_ID = 'id';

    public const COLUMN_LANGUAGE = 'language';

    public const COLUMN_OFFER = 'offer';

    public const COLUMN_PRIORITY = 'priority';

    public const COLUMN_RESELLER_REF = 'resellerRef';

    public const COLUMN_STATUS = 'status';

    public const COLUMN_TITLE = 'title';

    public const COLUMN_UPDATED = 'updated';

    /**
     * @var string|null
     */
    private $created;

    /**
     * @var Contact|null
     */
    private $createdBy;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $endCustomerRef;

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $language;

    /**
     * @var Offer
     */
    private $offer;

    /**
     * @var int|null
     */
    private $priority;

    /**
     * @var string|null
     */
    private $resellerRef;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string|null
     */
    private $updated;

    protected const VALIDATION_RULES = [
        self::COLUMN_DESCRIPTION      => 'required',
        self::COLUMN_END_CUSTOMER_REF => 'required',
        self::COLUMN_OFFER            => 'required|array',
        self::COLUMN_TITLE            => 'required',
    ];

    /**
     * Issue constructor.
     *
     * @param array $data
     *
     * @throws EntityValidationException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->created = $data[self::COLUMN_CREATED] ?? null;
        $this->createdBy = isset($data[self::COLUMN_CREATED_BY])
            ? new Contact($data[self::COLUMN_CREATED_BY])
            : null;
        $this->description = $data[self::COLUMN_DESCRIPTION];
        $this->endCustomerRef = $data[self::COLUMN_END_CUSTOMER_REF];
        $this->id = $data[self::COLUMN_ID] ?? null;
        $this->language = $data[self::COLUMN_LANGUAGE] ?? null;
        $this->offer = new Offer($data[self::COLUMN_OFFER]);
        $this->priority = $data[self::COLUMN_PRIORITY] ?? null;
        $this->resellerRef = $data[self::COLUMN_RESELLER_REF] ?? null;
        $this->status = $data[self::COLUMN_STATUS] ?? null;
        $this->title = $data[self::COLUMN_TITLE];
        $this->updated = $data[self::COLUMN_UPDATED] ?? null;
    }

    /**
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @return Contact|null
     */
    public function getCreatedBy(): ?Contact
    {
        return $this->createdBy;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getEndCustomerRef(): string
    {
        return $this->endCustomerRef;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return Offer
     */
    public function getOffer(): Offer
    {
        return $this->offer;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @return string|null
     */
    public function getResellerRef(): ?string
    {
        return $this->resellerRef;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getUpdated(): ?string
    {
        return $this->updated;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            self::COLUMN_CREATED          => $this->created,
            self::COLUMN_CREATED_BY       => $this->createdBy === null
                ? null
                : $this->createdBy->jsonSerialize(),
            self::COLUMN_DESCRIPTION      => $this->description,
            self::COLUMN_END_CUSTOMER_REF => $this->endCustomerRef,
            self::COLUMN_ID               => $this->id,
            self::COLUMN_LANGUAGE         => $this->language,
            self::COLUMN_OFFER            => $this->offer->jsonSerialize(),
            self::COLUMN_PRIORITY         => $this->priority,
            self::COLUMN_RESELLER_REF     => $this->resellerRef,
            self::COLUMN_STATUS           => $this->status,
            self::COLUMN_TITLE            => $this->title,
            self::COLUMN_UPDATED          => $this->updated,
        ];
    }
}
