<?php

namespace ArrowSphere\PublicApiClient\Support\Enum;

use ArrowSphere\PublicApiClient\AbstractEnum;

/**
 * Class StatusEnum
 */
class StatusEnum extends AbstractEnum
{
    public const CLOSED = 'CLOSED';

    public const ON_HOLD = 'ON_HOLD';

    public const PENDING_ARROW = 'PENDING_ARROW';

    public const PENDING_CLOSE = 'PENDING_CLOSE';

    public const PENDING_CUSTOMER = 'PENDING_CUSTOMER';

    public const PENDING_VENDOR = 'PENDING_VENDOR';
}
