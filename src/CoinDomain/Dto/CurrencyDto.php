<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Dto;

class CurrencyDto
{
    public ?float $amount = null;
    public ?string $currency = null;
    public ?string $driver = null;

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = round($amount, 2);

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(?string $driver): self
    {
        $this->driver = $driver;

        return $this;
    }
}
