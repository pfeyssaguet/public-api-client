<?php

namespace ArrowSphere\PublicApiClient\Notifications\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;

/**
 * Class Notification
 */
class Notification extends AbstractEntity
{
    public const COLUMN_ID = 'id';

    public const COLUMN_USERNAME = 'userName';

    public const COLUMN_CREATED = 'created';

    public const COLUMN_EXPIRES = 'expires';

    public const COLUMN_SUBJECT = 'subject';

    public const COLUMN_CONTENT = 'content';

    public const COLUMN_HAS_BEEN_READ = 'hasBeenRead';

    /** @var string */
    private $id;

    /** @var string */
    private $username;

    /** @var string */
    private $created;

    /** @var string */
    private $expires;

    /** @var string */
    private $subject;

    /** @var string */
    private $content;

    /** @var bool */
    private $hasBeenRead;

    /**
     * @param array $data
     * @throws EntityValidationException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->id = $data[self::COLUMN_ID];
        $this->username = $data[self::COLUMN_USERNAME];
        $this->created = $data[self::COLUMN_CREATED];
        $this->expires = $data[self::COLUMN_EXPIRES];
        $this->subject = $data[self::COLUMN_SUBJECT];
        $this->content = $data[self::COLUMN_CONTENT];
        $this->hasBeenRead = $data[self::COLUMN_HAS_BEEN_READ];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_ID => $this->id,
            self::COLUMN_USERNAME => $this->username,
            self::COLUMN_CREATED => $this->created,
            self::COLUMN_EXPIRES => $this->expires,
            self::COLUMN_SUBJECT => $this->subject,
            self::COLUMN_CONTENT => $this->content,
            self::COLUMN_HAS_BEEN_READ => $this->hasBeenRead,
        ];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function getExpires(): string
    {
        return $this->expires;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function getHasBeenRead(): bool
    {
        return $this->hasBeenRead;
    }
}
