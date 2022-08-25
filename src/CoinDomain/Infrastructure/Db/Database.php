<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Infrastructure\Db;

class Database implements DbConfig
{
    private static $instance;
    private $db = null;

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    public function connectDbConfig(): string
    {
        return ' host=' . DbConfig::DbConfigHost . ' dbname=' . DbConfig::DbConfigDatabase . ' user=' . DbConfig::DbConfigUser . ' password=' . DbConfig::DbConfigPass;
    }

    public function connect(): object
    {
        $this->db = pg_connect(self::connectDbConfig());

        return $this;
    }

    public function query($query)
    {
        return pg_query($this->db, $query);
    }
}
