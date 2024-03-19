<?php

namespace ArrowSphere\PublicApiClient\Orders\Entities\CreateOrder\Product\Price;

use ArrowSphere\PublicApiClient\AbstractEntity;

class VendorTierPrice extends AbstractEntity
{
    public const CURRENCY = 'currency';

    public const EXCHANGE_RATE = 'exchangeRate';

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float|null
     */
    private $exchangeRate;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->currency = $data[self::CURRENCY];
        $this->exchangeRate = $data[self::EXCHANGE_RATE] ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            self::CURRENCY => $this->currency,
            self::EXCHANGE_RATE => $this->exchangeRate,
        ];
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return float|null
     */
    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }
}
