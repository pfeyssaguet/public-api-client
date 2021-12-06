<?php

namespace ArrowSphere\PublicApiClient\Support\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;

/**
 * Class Comment
 */
class Comment extends AbstractEntity
{
    public const COLUMN_BODY = 'body';

    public const COLUMN_CREATED_BY = 'createdBy';

    public const COLUMN_DATE = 'date';

    protected const VALIDATION_RULES = [
        self::COLUMN_BODY => 'required',
        self::COLUMN_DATE => 'required',
    ];

    /**
     * @var string
     */
    private $body;

    /**
     * @var Contact|null
     */
    private $createdBy;

    /**
     * @var string
     */
    private $date;

    /**
     * @param array $data
     *
     * @throws EntityValidationException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->body = $data[self::COLUMN_BODY];
        $this->createdBy = isset($data[self::COLUMN_CREATED_BY])
            ? new Contact($data[self::COLUMN_CREATED_BY])
            : null;
        $this->date = $data[self::COLUMN_DATE];
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_BODY       => $this->body,
            self::COLUMN_CREATED_BY => $this->createdBy === null
                ? null
                : $this->createdBy->jsonSerialize(),
            self::COLUMN_DATE       => $this->date,
        ];
    }
}
