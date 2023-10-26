<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class Subscription
 */
class Subscription extends AbstractEntity
{
    public const COLUMN_REFERENCE = 'reference';

    protected const VALIDATION_RULES = [
        self::COLUMN_REFERENCE => 'required',
    ];

    /** @var string */
    private $reference;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->reference = $data[self::COLUMN_REFERENCE];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_REFERENCE => $this->reference,
        ];
    }

    public function getReference(): string
    {
        return $this->reference;
    }
}
