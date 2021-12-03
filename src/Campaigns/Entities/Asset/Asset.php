<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\Asset;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class Asset
 *
 * @method string getUuid()
 * @method string getUrl()
 * @method self setUuid(string $uuid)
 * @method self setUrl(string $url)
 */
class Asset extends AbstractEntity
{
    public const COLUMN_UUID = 'uuid';

    public const COLUMN_URL = 'url';

    /**
     * @Property(required=true)
     * @var string
     */
    protected $uuid;

    /**
     * @Property(required=true)
     * @var string
     */
    protected $url;
}
