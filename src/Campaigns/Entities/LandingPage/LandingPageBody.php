<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class LandingPageBody
 * @method string getBackgroundImageUuid()
 * @method string getType()
 * @method string getTitle()
 * @method string getDescription()
 * @method string|null getButtonText()
 * @method string|null getContactEmail()
 * @method string|null getVideoUrl()
 * @method self setBackgroundImageUuid(string $backgroundImageUuid)
 * @method self setType(string $type)
 * @method self setTitle(string $title)
 * @method self setDescription(string $description)
 * @method self setVideoUrl(string|null $videoUrl)
 * @method self setButtonText(string|null $buttonText)
 * @method self setContactEmail(string|null $contactEmail)
 */
class LandingPageBody extends AbstractEntity
{
    public const COLUMN_BACKGROUNDIMAGEUUID = 'backgroundImageUuid';

    public const COLUMN_TYPE = 'type';

    public const COLUMN_TITLE = 'title';

    public const COLUMN_DESCRIPTION = 'description';

    public const COLUMN_VIDEOURL = 'videoUrl';

    public const COLUMN_BUTTONTEXT = 'buttonText';

    public const COLUMN_CONTACTEMAIL = 'contactEmail';

    /**
     * @Property
     * @var string
     */
    protected $backgroundImageUuid = '';

    /**
     * @Property
     * @var string
     */
    protected $type = '';

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
     * @var string|null
     */
    protected $videoUrl;

    /**
     * @Property
     * @var string|null
     */
    protected $buttonText;

    /**
     * @Property
     * @var string|null
     */
    protected $contactEmail;
}
