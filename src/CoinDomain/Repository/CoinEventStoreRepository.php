<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Repository;

use Bot\CoinDomain\Infrastructure\Db\Database;

/**
 * simple  EventStore and simple CQRS
 */
class CoinEventStoreRepository
{
    private object $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function recordThat($unitCoin): void
    {
        $queryBuild = '';
        foreach ($unitCoin as $item => $value) {
            $queryBuild .= "($value->amount, '$value->currency' , '$value->driver'),";
        }

        $queryBuild = substr($queryBuild, 0, -1);
        $query = "INSERT INTO coin (  amount,currency, driver ) VALUES " . $queryBuild;
        $this->db->connect()->query($query);
    }

    /**
     * TODO:: the last value will be taken from Memcache
     */
    public function read(): mixed
    {
        return 'read from Memcache';
    }
}
