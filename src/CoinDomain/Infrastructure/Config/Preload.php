<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Infrastructure\Config;

class Preload
{
    public static function getConfig($name = 'config.ini'): bool|array
    {
        return parse_ini_file(dirname(__DIR__) . '/Config/' . $name);
    }
}
