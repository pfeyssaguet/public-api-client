<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class LandingPageFooter
 *
 * @method string getTitle()
 * @method string getBackgroundColor()
 * @method string getButtonText()
 * @method string getButtonUrl()
 * @method string getTextColor()
 * @method string getFeatures()
 * @method setTitle(string $title)
 * @method setBackgroundColor(string $backgroundColor)
 * @method setButtonText(string $buttonText)
 * @method setButtonUrl(string $buttonUrl)
 * @method setTextColor(string $textColor)
 * @method setFeatures(string $features)
 */
class LandingPageFooter extends AbstractEntity
{
    public const COLUMN_BACKGROUNDCOLOR = 'backgroundColor';

    public const COLUMN_BUTTONTEXT = 'buttonText';

    public const COLUMN_BUTTONURL = 'buttonUrl';

    public const COLUMN_FEATURES = 'features';

    public const COLUMN_TEXTCOLOR = 'textColor';

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
    protected $backgroundColor = '';

    /**
     * @Property
     * @var string
     */
    protected $buttonText = '';

    /**
     * @Property
     * @var string
     */
    protected $buttonUrl = '';

    /**
     * @Property
     * @var string
     */
    protected $textColor = '#FFF';

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageFeature", isArray=true)
     * @var LandingPageFeature[]
     */
    protected $features;
}
