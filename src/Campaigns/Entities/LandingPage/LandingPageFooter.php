<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class LandingPageFooter
 *
 * @method string getBackgroundColor()
 * @method string getButtonText()
 * @method string getButtonUrl()
 * @method string getFeatures()
 * @method string getTextColor()
 * @method string getTitle()
 * @method setBackgroundColor(string $backgroundColor)
 * @method setButtonText(string $buttonText)
 * @method setButtonUrl(string $buttonUrl)
 * @method setFeatures(string $features)
 * @method setTextColor(string $textColor)
 * @method setTitle(string $title)
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
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageFeature", isArray=true)
     * @var LandingPageFeature[]
     */
    protected $features = [];

    /**
     * @Property
     * @var string
     */
    protected $textColor = '#FFF';

    /**
     * @Property
     * @var string
     */
    protected $title = '';
}
