<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Strategy;

use Bot\CoinDomain\Dto\CurrencyDto;

interface StrategyInterface
{
    public function handle(): ?CurrencyDto;
}
