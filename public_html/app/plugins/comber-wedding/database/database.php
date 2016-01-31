<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

$root_dir = dirname(__DIR__).'/../../../../';

require $root_dir.'/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
}
$environment = getenv('WP_ENV');

// Set environment based on hostname
switch ($environment) {
    case 'development':
        $user = 'wordpress_user';
        $pass = 'r263214c';
        $dbname = 'thecomberwedding.co.uk';
        break;

    case 'production':
    default:
        $user = 'fruit2office';
        $pass = 'r266%$e2dwDW3214c';
        $dbname = 'fruit2office.co.uk';
}