<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class LandingPageBody
 * @method string getBackgroundImageUuid()
 * @method string|null getButtonText()
 * @method string|null getContactEmail()
 * @method string getDescription()
 * @method string getTitle()
 * @method string getType()
 * @method string|null getVideoUrl()
 * @method self setBackgroundImageUuid(string $backgroundImageUuid)
 * @method self setButtonText(string|null $buttonText)
 * @method self setContactEmail(string|null $contactEmail)
 * @method self setDescription(string $description)
 * @method self setTitle(string $title)
 * @method self setType(string $type)
 * @method self setVideoUrl(string|null $videoUrl)
 */
class LandingPageBody extends AbstractEntity
{
    public const COLUMN_BACKGROUNDIMAGEUUID = 'backgroundImageUuid';

    public const COLUMN_BUTTONTEXT = 'buttonText';

    public const COLUMN_CONTACTEMAIL = 'contactEmail';

    public const COLUMN_DESCRIPTION = 'description';

    public const COLUMN_TITLE = 'title';

    public const COLUMN_TYPE = 'type';

    public const COLUMN_VIDEOURL = 'videoUrl';

    /**
     * @Property
     * @var string
     */
    protected $backgroundImageUuid = '';

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $buttonText;

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $contactEmail;

    /**
     * @Property
     * @var string
     */
    protected $description = '';

    /**
     * @Property
     * @var string
     */
    protected $title = '';

    /**
     * @Property
     * @var string
     */
    protected $type = '';

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $videoUrl;
}
