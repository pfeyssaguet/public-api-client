<?php

namespace ArrowSphere\PublicApiClient\Catalog\Entities;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class Classification
 *
 * @method string getName()
 * @method self setName(string $name)
 */
class Classification extends AbstractEntity
{
    public const COLUMN_NAME = 'name';

    /**
     * @Property
     * @var string
     */
    private $name;
}
