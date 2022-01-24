<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class Rules
 *
 * @method string[] getLocations()
 * @method string[] getRoles()
 * @method string[] getMarketplaces()
 * @method string[] getSubscriptions()
 * @method string[] getResellers()
 * @method string[] getEndCustomers()
 * @method self setLocations(string[] $locations)
 * @method self setRoles(string[] $roles)
 * @method self setMarketplaces(string[] $marketplaces)
 * @method self setSubscriptions(string[] $subscriptions)
 * @method self setResellers(string[] $resellers)
 * @method self setEndCustomers(string[] $endCustomers)
 */
class Rules extends AbstractEntity
{
    public const COLUMN_LOCATIONS = 'locations';

    public const COLUMN_ROLES = 'roles';

    public const COLUMN_MARKETPLACES = 'marketplaces';

    public const COLUMN_SUBSCRIPTIONS = 'subscriptions';

    public const COLUMN_RESELLERS = 'resellers';

    public const COLUMN_ENDCUSTOMERS = 'endCustomers';

    /**
     * @Property(isArray=true)
     * @var string[]
     */
    protected $locations = [];

    /**
     * @Property(isArray=true)
     * @var string[]
     */
    protected $roles = [];

    /**
     * @Property(isArray=true)
     * @var string[]
     */
    protected $marketplaces = [];

    /**
     * @Property(isArray=true)
     * @var string[]
     */
    protected $subscriptions = [];

    /**
     * @Property(isArray=true)
     * @var string[]
     */
    protected $resellers = [];

    /**
     * @Property(isArray=true)
     * @var string[]
     */
    protected $endCustomers = [];
}
