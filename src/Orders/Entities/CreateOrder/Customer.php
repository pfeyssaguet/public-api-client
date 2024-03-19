<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder;

use ArrowSphere\PublicApiClient\AbstractEntity;

class Customer extends AbstractEntity
{
    public const COLUMN_REFERENCE = 'reference';

    public const COLUMN_PO_NUMBER = 'ponumber';

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $poNumber;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->reference = $data[self::COLUMN_REFERENCE];
        $this->poNumber = $data[self::COLUMN_PO_NUMBER];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_REFERENCE => $this->reference,
            self::COLUMN_PO_NUMBER => $this->poNumber,
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
    public function getPoNumber(): string
    {
        return $this->poNumber;
    }
}
