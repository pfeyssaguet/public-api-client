<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class LandingPageFeature
 *
 * @method string getTitle()
 * @method string getDescription()
 * @method string getIcon()
 * @method int getSize()
 * @method self setTitle(string $title)
 * @method self setDescription(string $description)
 * @method self setIcon(string $icon)
 * @method self setSize(int $size)
 */
class LandingPageFeature extends AbstractEntity
{
    public const COLUMN_DESCRIPTION = 'description';

    public const COLUMN_ICON = 'icon';

    public const COLUMN_SIZE = 'size';

    public const COLUMN_TITLE = 'title';

    /**
     * @Property
     * @var string
     */
    protected $title = '';

    /**
     * @Property
     * @var string
     */
    protected $description = '';

    /**
     * @Property
     * @var string
     */
    protected $icon = '';

    /**
     * @Property(type="int")
     * @var int
     */
    protected $size = 4;
}
