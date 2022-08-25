<?php

declare(strict_types=1);

namespace Bot\CoinDomain;

use Bot\CoinDomain\Infrastructure\Config\Preload;
use Bot\CoinDomain\Repository\CoinEventStoreRepository;
use Bot\CoinDomain\Strategy\Context;

class CoinAggregateRoot
{
    private string $nameSpace = "Bot\CoinDomain\Strategy\\";
    private CoinEventStoreRepository $coinRepository;

    public function __construct()
    {
        $this->coinRepository = new CoinEventStoreRepository();
    }

    public function coinRates(): void
    {
        $unitCoin = [];
        foreach (Preload::getConfig()['coin'] as $currency => $driver) {
            $nameSpaceDriver = $this->nameSpace . $driver;
            $context = new Context(new $nameSpaceDriver($currency, $driver));
            $unitCoin[] = $context->handle();
        }

        $this->coinRepository->recordThat($unitCoin);
    }
}
