<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class Banner
 *
 * @method string|null getBackgroundColor()
 * @method string getBackgroundImageUuid()
 * @method string getButtonPlacement()
 * @method string|null getButtonText()
 * @method string|null getText()
 * @method string|null getTextColor()
 * @method string getType()
 * @method self setBackgroundColor(string|null $backgroundColor)
 * @method self setBackgroundImageUuid(string $backgroundImageUuid)
 * @method self setButtonPlacement(string $buttonPlacement)
 * @method self setButtonText(string|null $buttonText)
 * @method self setText(string|null $text)
 * @method self setTextColor(string|null $textColor)
 * @method self setType(string $type)
 */
class Banner extends AbstractEntity
{
    public const COLUMN_BACKGROUNDCOLOR = 'backgroundColor';

    public const COLUMN_BACKGROUNDIMAGEUUID = 'backgroundImageUuid';

    public const COLUMN_BUTTONPLACEMENT = 'buttonPlacement';

    public const COLUMN_BUTTONTEXT = 'buttonText';

    public const COLUMN_TEXT = 'text';

    public const COLUMN_TEXTCOLOR = 'textColor';

    public const COLUMN_TYPE = 'type';

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
    protected $buttonPlacement = 'RIGHT';

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $buttonText;

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $text;

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $textColor;

    /**
     * @Property
     * @var string
     */
    protected $type = 'BACKGROUND_COLOR';
}
