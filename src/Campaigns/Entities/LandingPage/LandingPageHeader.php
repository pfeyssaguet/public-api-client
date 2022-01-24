<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class LandingPageHeader
 *
 * @method string|null getBackgroundColor()
 * @method string getBackgroundImageUuid()
 * @method string getBaseline()
 * @method string|null getTextColor()
 * @method string getTitle()
 * @method string getVendorLogoUuid()
 * @method self setBackgroundImageUuid(string $backgroundImageUuid)
 * @method self setBackgroundColor(string|null $backgroundColor)
 * @method self setBaseline(string $baseline)
 * @method self setTextColor(string|null $textColor)
 * @method self setTitle(string $title)
 * @method self setVendorLogoUuid(string $vendorLogoUuid)
 */
class LandingPageHeader extends AbstractEntity
{
    public const COLUMN_BACKGROUNDCOLOR = 'backgroundColor';

    public const COLUMN_BACKGROUNDIMAGEUUID = 'backgroundImageUuid';

    public const COLUMN_BASELINE = 'baseline';

    public const COLUMN_TEXTCOLOR = 'textColor';

    public const COLUMN_TITLE = 'title';

    public const COLUMN_VENDORLOGOUUID = 'vendorLogoUuid';

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $backgroundColor;

    /**
     * @Property
     * @var string
     */
    protected $backgroundImageUuid = '';

    /**
     * @Property
     * @var string
     */
    protected $baseline = '';

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $textColor;

    /**
     * @Property
     * @var string
     */
    protected $title = '';

    /**
     * @Property
     * @var string
     */
    protected $vendorLogoUuid = '';
}
