<?php

namespace ArrowSphere\PublicApiClient\Support\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;

/**
 * Class Attachment
 */
class Attachment extends AbstractEntity
{
    public const COLUMN_ID = 'id';

    public const COLUMN_FILENAME = 'fileName';

    public const COLUMN_MIME_TYPE = 'mimeType';

    protected const VALIDATION_RULES = [
        self::COLUMN_ID        => 'required',
        self::COLUMN_FILENAME  => 'required',
        self::COLUMN_MIME_TYPE => 'required',
    ];

    /** @var int */
    private $id;

    /** @var string */
    private $fileName;

    /** @var string */
    private $mimeType;

    /**
     * @param array $data
     *
     * @throws EntityValidationException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->id = $data[self::COLUMN_ID];
        $this->fileName = $data[self::COLUMN_FILENAME];
        $this->mimeType = $data[self::COLUMN_MIME_TYPE];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_ID        => $this->id,
            self::COLUMN_FILENAME  => $this->fileName,
            self::COLUMN_MIME_TYPE => $this->mimeType,
        ];
    }
}
