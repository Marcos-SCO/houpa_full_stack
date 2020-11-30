<?php

namespace Api\Config;

use Api\Interfaces\DatabaseInterface;

class Connection
{
    public $connection;

    public function __construct(DatabaseInterface $conn)
    {
        return $this->connection = $conn;
    }
}
