<?php

namespace ArrowSphere\PublicApiClient\Campaigns\Entities\Asset;

use ArrowSphere\Entities\AbstractEntity;
use ArrowSphere\Entities\Property;

/**
 * Class AssetImageFields
 *
 * @method string getKey()
 * @method string getBucket()
 * @method string getAmzAlgorithm()
 * @method string getAmzCredential()
 * @method string getAmzDate()
 * @method string getAmzSecurityToken()
 * @method string getPolicy()
 * @method string getAmzSignature()
 * @method self setKey(string $key)
 * @method self setBucket(string $bucket)
 * @method self setAmzAlgorithm(string $amzAlgorithm)
 * @method self setAmzCredential(string $amzCredential)
 * @method self setAmzDate(string $amzDate)
 * @method self setAmzSecurityToken(string $amzSecurityToken)
 * @method self setPolicy(string $policy)
 * @method self setAmzSignature(string $amzSignature)
 */
class AssetImageFields extends AbstractEntity
{
    public const COLUMN_KEY = "Key";

    public const COLUMN_BUCKET = "bucket";

    public const COLUMN_X_AMZ_ALGORITHM = "X-Amz-Algorithm";

    public const COLUMN_X_AMZ_CREDENTIAL = "X-Amz-Credential";

    public const COLUMN_X_AMZ_DATE = "X-Amz-Date";

    public const COLUMN_X_AMZ_SECURITY_TOKEN = "X-Amz-Security-Token";

    public const COLUMN_POLICY = "Policy";

    public const COLUMN_X_AMZ_SIGNATURE = "X-Amz-Signature";

    /**
     * @Property(name="Key", required=true)
     * @var string
     */
    protected $key;

    /**
     * @Property(required=true)
     * @var string
     */
    protected $bucket;

    /**
     * @Property(name="X-Amz-Algorithm", required=true)
     * @var string
     */
    protected $amzAlgorithm;

    /**
     * @Property(name="X-Amz-Credential", required=true)
     * @var string
     */
    protected $amzCredential;

    /**
     * @Property(name="X-Amz-Date", required=true)
     * @var string
     */
    protected $amzDate;

    /**
     * @Property(name="X-Amz-Security-Token", required=true)
     * @var string
     */
    protected $amzSecurityToken;

    /**
     * @Property(name="Policy", required=true)
     * @var string
     */
    protected $policy;

    /**
     * @Property(name="X-Amz-Signature", required=true)
     * @var string
     */
    protected $amzSignature;
}
