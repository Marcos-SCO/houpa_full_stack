<?php 

use Api\Config\MySql;
use Api\Config\Connection;

$baseDir = dirname(getcwd());
// dirname(__DIR__, 2);

// Env variables will be in $_ENV array
$dotenv = Dotenv\Dotenv::createImmutable($baseDir, '.env');
$dotenv->load();

// Timezone
date_default_timezone_set($_ENV["DEFAULT_TIME_ZONE"]);

// Connection 
$conn = new Connection(new MySql);

// Model instantiation and connection set
$model = new Api\Models\Model($conn);