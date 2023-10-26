<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\Product;

use ArrowSphere\PublicApiClient\AbstractEntity;

/**
 * Class Prices
 */
class Prices extends AbstractEntity
{
    public const COLUMN_BUY = 'buy';

    public const COLUMN_SELL = 'sell';

    public const COLUMN_CURRENCY = 'currency';

    public const COLUMN_PERIODICITY = 'periodicity';

    public const COLUMN_TERM = 'term';

    public const COLUMN_PERIODICITY_CODE = 'periodicityCode';

    public const COLUMN_TERM_CODE = 'termCode';

    private $buy;
    private $sell;
    private $currency;
    private $periodicity;
    private $term;
    private $periodicityCode;
    private $termCode;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->buy = $data[self::COLUMN_BUY];
        $this->sell = $data[self::COLUMN_SELL];
        $this->currency = $data[self::COLUMN_CURRENCY];
        $this->periodicity = $data[self::COLUMN_PERIODICITY];
        $this->term = $data[self::COLUMN_TERM];
        $this->periodicityCode = $data[self::COLUMN_PERIODICITY_CODE];
        $this->termCode = $data[self::COLUMN_TERM_CODE];
    }

    public function jsonSerialize(): array
    {
        return [
            self::COLUMN_BUY => $this->buy,
            self::COLUMN_SELL => $this->sell,
            self::COLUMN_CURRENCY => $this->currency,
            self::COLUMN_PERIODICITY => $this->periodicity,
            self::COLUMN_TERM => $this->term,
            self::COLUMN_PERIODICITY_CODE => $this->periodicityCode,
            self::COLUMN_TERM_CODE => $this->termCode,
        ];
    }
}
