<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;
use ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageBody;
use ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageFooter;
use ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageHeader;

/**
 * Class LandingPage
 *
 * @method LandingPageBody getBody()
 * @method LandingPageFooter getFooter()
 * @method LandingPageHeader getHeader()
 * @method string|null getUrl()
 * @method self setBody(LandingPageBody $body)
 * @method self setFooter(LandingPageFooter $footer)
 * @method self setHeader(LandingPageHeader $header)
 * @method self setUrl(string|null $url)
 */
class LandingPage extends AbstractEntity
{
    public const COLUMN_URL = 'url';

    public const COLUMN_HEADER = 'header';

    public const COLUMN_BODY = 'body';

    public const COLUMN_FOOTER = 'footer';

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageBody")
     * @var LandingPageBody
     */
    protected $body;

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageFooter")
     * @var LandingPageFooter
     */
    protected $footer;

    /**
     * @Property(type="ArrowSphere\PublicApiClient\Campaigns\Entities\LandingPage\LandingPageHeader")
     * @var LandingPageHeader
     */
    protected $header;

    /**
     * @Property(nullable=true)
     * @var string|null
     */
    protected $url;
}
