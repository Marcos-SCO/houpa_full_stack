<?php

namespace Api\Models;

use Api\Config\Connection;
use Api\Traits\ApiMethods;

// Db query
use Api\Traits\DbQuery\Custom;
use Api\Traits\DbQuery\Create;
use Api\Traits\DbQuery\Read;
use Api\Traits\DbQuery\Update;
use Api\Traits\DbQuery\Delete;
use Api\Traits\DbQuery\BindValues;

class Model
{
    public static $conn;
    public static $table;

    use Custom;
    use Create;
    use Read;
    use Update;
    use Delete;
    use BindValues;
    use ApiMethods;

    public function __construct(Connection $conn)
    {
        return self::$conn = $conn->connection->pdo;
    }
}
