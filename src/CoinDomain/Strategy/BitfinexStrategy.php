<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Strategy;

use Bot\CoinDomain\Command\Infrastructure\Http\HttpClient;
use Bot\CoinDomain\Dto\CurrencyDto;
use JsonException;

class BitfinexStrategy implements StrategyInterface
{
    private const URL = 'https://api.bitfinex.com/v1/ticker/';

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
        $httpClient = HttpClient::curl(self::URL . strtolower($this->currency));

        if (200 !== $httpClient['httpcode']) {
            throw new RuntimeException('API Error');
        }
        $response = json_decode($httpClient['response'], false, 512, JSON_THROW_ON_ERROR);

        return (new CurrencyDto())->setCurrency($this->currency)->setAmount((float)$response->last_price)->setDriver($this->driver);
    }
}
