<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\Asset;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class AssetImage
 *
 * @method string getUrl()
 * @method AssetImageFields getFields()
 * @method self setUrl(string $url)
 * @method self setFields(AssetImageFields $fields)
 */
class AssetImage extends AbstractEntity
{
    public const COLUMN_URL = 'url';

    public const COLUMN_FIELDS = 'fields';

    /**
     * @Property(required=true)
     * @var string
     */
    protected $url;

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\Asset\AssetImageFields", required=true)
     * @var AssetImageFields
     */
    protected $fields;
}
