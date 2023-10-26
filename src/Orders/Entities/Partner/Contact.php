<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\Partner;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class Contact
 */
class Contact extends AbstractEntity
{
    public const COLUMN_EMAIL = 'email';

    public const COLUMN_FIRST_NAME = 'firstName';

    public const COLUMN_LAST_NAME = 'lastName';

    protected const VALIDATION_RULES = [
        self::COLUMN_EMAIL => 'required',
        self::COLUMN_FIRST_NAME => 'required',
        self::COLUMN_LAST_NAME => 'required',
    ];

    private $email;

    private $firstName;

    private $lastName;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->email = $data[self::COLUMN_EMAIL];
        $this->firstName = $data[self::COLUMN_FIRST_NAME];
        $this->lastName = $data[self::COLUMN_LAST_NAME];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_EMAIL => $this->email,
            self::COLUMN_FIRST_NAME => $this->firstName,
            self::COLUMN_LAST_NAME => $this->lastName,
        ];
    }
}
