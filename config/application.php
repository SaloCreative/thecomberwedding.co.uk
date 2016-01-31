<?php
$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir . '/public_html';


/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
    $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL']);
}

/**
 * Set up our global environment constant and load its config first
 * Default: development
 */
define('WP_ENV', getenv('WP_ENV') ?: 'development');
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';
if (file_exists($env_config)) {
    require_once $env_config;
}
/**
 * URLs
 */
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

/**
 * Custom Content Directory
 */
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * DB settings
 */
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ?: 'wp_';

/**
 * Authentication Unique Keys and Salts https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         '^G_#8|ldvjAR+oA@VvRpeQr_*1@pH_Jy*6E^7cG{,S2@<_;j|><0?ndHaz-~%ZCA');
define('SECURE_AUTH_KEY',  ' 1LwvTcKgJjDX|/-?F,HxhC D(!n60d$nR=`oF5QP1MGVN|iGdQ;U_+3-qOhQ~qF');
define('LOGGED_IN_KEY',    'S.yT+5+jA;+qa}Yy${((pw-i{H(DxJgsc5NHdK=1QFxDE><~ngi{SBV1x{5_KXn9');
define('NONCE_KEY',        '%`IJHk}+x!0u}[6J>0Zw8h^(yG1>E6V Tda-+y->fgxb:7lxuQV&]6t`cJMoX.Ha');
define('AUTH_SALT',        '5|g7WS`6y~QW,4S_`RfR]Xy^r->c5OQ204zgrt <;v^Ye^}|?FAlh>xp|Z/Hmj0I');
define('SECURE_AUTH_SALT', '{~F8kv]Il;+-}{,os|rk8y-SOn7]ovgmPNWy,+,^G9*7t,+5J_-,_qk~IDME0B|P');
define('LOGGED_IN_SALT',   ';w7x4Rv-ZlL|J0,/]AY4FO~lml_qY(/5CFQV&^=dr7%K/2*AF7sB_:S@LFAk%iu,');
define('NONCE_SALT',       'nzw#jbmm)UA{VkzFso6O6u-Y:k`He%c/6F$UDYm@^h(!o K!xn~40c#$qR3wA]SA');

/**
 * Custom Settings
 */

define('DISABLE_WP_CRON', true);

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
  define('ABSPATH', $webroot_dir . '/wp/');
}
