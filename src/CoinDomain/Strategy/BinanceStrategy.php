<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Strategy;

use Bot\CoinDomain\Command\Infrastructure\Http\HttpClient;
use Bot\CoinDomain\Dto\CurrencyDto;
use JsonException;
use RuntimeException;

class BinanceStrategy implements StrategyInterface
{
    private const URL = 'https://api.binance.com/api/v3/ticker/price?symbol=';

    public function __construct(
        private ?string $currency,
        private ?string $driver,
    )
    {
    }

    /**
     * @throws JsonException
     */
    public function handle(): ?CurrencyDto
    {
        $httpClient = HttpClient::curl(self::URL . $this->currency);

        if (200 !== $httpClient['httpcode']) {
            throw new RuntimeException('API Error');
        }
        $binance = json_decode($httpClient['response'], false, 512, JSON_THROW_ON_ERROR);

        return (new CurrencyDto())->setCurrency($this->currency)->setAmount((float)$binance->price)->setDriver($this->driver);
    }
}
