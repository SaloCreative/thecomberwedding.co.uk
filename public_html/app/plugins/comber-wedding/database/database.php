<?php

$root_dir = dirname(__DIR__).'/../../../../';

require $root_dir.'/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
}
$environment = getenv('WP_ENV');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');