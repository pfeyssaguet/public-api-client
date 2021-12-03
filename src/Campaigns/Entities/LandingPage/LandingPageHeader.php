<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class LandingPageHeader
 *
 * @method string getBackgroundImageUuid()
 * @method string getVendorLogoUuid()
 * @method string getTitle()
 * @method string|null getBackgroundColor()
 * @method string getBaseline()
 * @method string|null getTextColor()
 * @method self setBackgroundImageUuid(string $backgroundImageUuid)
 * @method self setVendorLogoUuid(string $vendorLogoUuid)
 * @method self setTitle(string $title)
 * @method self setBackgroundColor(string|null $backgroundColor)
 * @method self setBaseline(string $baseline)
 * @method self setTextColor(string|null $textColor)
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
     * @Property
     * @var string
     */
    protected $backgroundImageUuid = '';

    /**
     * @Property
     * @var string
     */
    protected $vendorLogoUuid = '';

    /**
     * @Property
     * @var string
     */
    protected $title = '';

    /**
     * @Property
     * @var string|null
     */
    protected $backgroundColor;

    /**
     * @Property
     * @var string
     */
    protected $baseline = '';

    /**
     * @Property
     * @var string|null
     */
    protected $textColor;
}
