<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class Program
 */
class Program extends AbstractEntity
{
    public const COLUMN_LEGACY_CODE = 'legacyCode';

    protected const VALIDATION_RULES = [
        self::COLUMN_LEGACY_CODE => 'required',
    ];

    /** @var string */
    private $legacyCode;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->legacyCode = $data[self::COLUMN_LEGACY_CODE];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_LEGACY_CODE => $this->legacyCode,
        ];
    }

    public function getLegacyCode(): string
    {
        return $this->legacyCode;
    }
}
