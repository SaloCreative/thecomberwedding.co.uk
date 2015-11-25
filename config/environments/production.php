<?php
/* Production */
ini_set('display_errors', 0);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);
define('DISALLOW_FILE_MODS', true); // this disables all file modifications including updates and update notifications

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bedrockstaging');

/** MySQL database username */
define('DB_USER', 'bedrockstaging');

/** MySQL database password */
define('DB_PASSWORD', 'r2632148*&*f3JF&^E£c');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/**
 * URLs
 */
define('WP_HOME', 'http://bedrock.elementalwebdesign.co.uk');
define('WP_SITEURL', 'http://bedrock.elementalwebdesign.co.uk/wp');