<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Infrastructure\Db;

/**
 * Interface DbConfig
 */
interface DbConfig
{
    public const DbConfigHost = '0.0.0.0';
    public const DbConfigUser = 'root';
    public const DbConfigPass = 'root';
    public const DbConfigDatabase = "postgres";
}
