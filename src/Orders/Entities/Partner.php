<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Orders\Entities\Partner\Contact;

class Partner extends AbstractEntity
{
    public const COLUMN_COMPANY_NAME = 'companyName';

    public const COLUMN_CONTACT = 'contact';

    protected const VALIDATION_RULES = [
        self::COLUMN_COMPANY_NAME => 'required',
        self::COLUMN_CONTACT => 'required',
    ];

    private $companyName;

    /** @var Contact */
    private $contact;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->companyName = $data[self::COLUMN_COMPANY_NAME];
        $this->contact = new Contact($data[self::COLUMN_CONTACT]);
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_COMPANY_NAME => $this->companyName,
            self::COLUMN_CONTACT => $this->contact,
        ];
    }
}
