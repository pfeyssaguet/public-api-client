<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class ExtraInformation
 */
class ExtraInformation extends AbstractEntity
{
    public const COLUMN_PROGRAMS = 'programs';

    private $programs;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->programs = $data[self::COLUMN_PROGRAMS];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_PROGRAMS => $this->programs,
        ];
    }
}
