<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Strategy;

use Bot\CoinDomain\Dto\CurrencyDto;

class Context
{
    private $strategy;

    /**
     * Context constructor.
     *
     * @throws Exception
     */
    public function __construct(StrategyInterface $strategy)
    {
        if (isset($this->strategy)) {
            throw new Exception("Contract is already present.");
        }
        $this->strategy = $strategy;
    }

    /**
     * Call strategy handle() method.
     */
    public function handle(): ?CurrencyDto
    {
        return $this->strategy->handle();
    }
}
