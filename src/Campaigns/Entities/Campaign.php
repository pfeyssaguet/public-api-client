<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;
use DateTimeInterface;

/**
 * Class Campaign
 *
 * @method Banner[] getBanners()
 * @method string getCategory()
 * @method DateTimeInterface getCreatedAt()
 * @method DateTimeInterface getDeletedAt()
 * @method DateTimeInterface getEndDate()
 * @method bool getIsActivated()
 * @method LandingPage getLandingPage()
 * @method string getName()
 * @method string getReference()
 * @method Rules getRules()
 * @method DateTimeInterface getStartDate()
 * @method DateTimeInterface getUpdatedAt()
 * @method int getWeight()
 * @method self setBanners(Banner[] $banners)
 * @method self setCategory(string $category)
 * @method self setCreatedAt(DateTimeInterface $createdAt)
 * @method self setDeletedAt(DateTimeInterface $deletedAt)
 * @method self setEndDate(DateTimeInterface $endDate)
 * @method self setIsActivated(bool $isActivated)
 * @method self setLandingPage(LandingPage $landingPage)
 * @method self setName(string $name)
 * @method self setReference(string $reference)
 * @method self setRules(Rules $rules)
 * @method self setStartDate(DateTimeInterface $startDate)
 * @method self setUpdatedAt(DateTimeInterface $updatedAt)
 * @method self setWeight(int $weight)
 */
class Campaign extends AbstractEntity
{
    public const COLUMN_BANNERS = 'banners';

    public const COLUMN_CATEGORY = 'category';

    public const COLUMN_CREATEDAT = 'createdAt';

    public const COLUMN_DELETEDAT = 'deletedAt';

    public const COLUMN_ENDDATE = 'endDate';

    public const COLUMN_IS_ACTIVATED = 'isActivated';

    public const COLUMN_LANDINGPAGE = 'landingPage';

    public const COLUMN_NAME = 'name';

    public const COLUMN_REFERENCE = 'reference';

    public const COLUMN_RULES = 'rules';

    public const COLUMN_STARTDATE = 'startDate';

    public const COLUMN_UPDATEDAT = 'updatedAt';

    public const COLUMN_WEIGHT = 'weight';

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\Banner", isArray=true)
     * @var Banner[]
     */
    protected $banners;

    /**
     * @Property
     * @var string
     */
    protected $category = 'BANNER';

    /**
     * @Property(type="\DateTime", nullable=true)
     * @var DateTimeInterface|null
     */
    protected $createdAt;

    /**
     * @Property(type="\DateTime", nullable=true)
     * @var DateTimeInterface|null
     */
    protected $deletedAt;

    /**
     * @Property(type="\DateTime", nullable=true)
     * @var DateTimeInterface|null
     */
    protected $endDate;

    /**
     * @Property(type="bool")
     * @var bool
     */
    protected $isActivated;

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage")
     * @var LandingPage
     */
    protected $landingPage;

    /**
     * @Property
     * @var string
     */
    protected $name;

    /**
     * @Property
     * @var string
     */
    protected $reference;

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\Rules")
     * @var Rules
     */
    protected $rules;

    /**
     * @Property(type="\DateTime", nullable=true)
     * @var DateTimeInterface|null
     */
    protected $startDate;

    /**
     * @Property(type="\DateTime", nullable=true)
     * @var DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @Property(type="int")
     * @var int
     */
    protected $weight = 1;
}
