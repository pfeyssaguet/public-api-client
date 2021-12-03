<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\Asset;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class AssetUploadUrl
 *
 * @method string getUuid()
 * @method AssetImage getImage()
 * @method self setUuid(string $uuid)
 * @method self setImage(AssetImage $image)
 */
class AssetUploadUrl extends AbstractEntity
{
    public const COLUMN_UUID = 'uuid';

    public const COLUMN_IMAGE = 'image';

    /**
     * @Property(required=true)
     * @var string
     */
    protected $uuid;

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\Asset\AssetImage", required=true)
     * @var AssetImage
     */
    protected $image;
}
