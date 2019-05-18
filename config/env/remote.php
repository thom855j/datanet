<?php

define('APP_NAME', 'Datanet');

// System
ini_set('display_errors', 0);
define('APP_ERROR', false);
define('APP_HEADER', false);
define('APP_CACHE', $webroot_dir . 'storage/cache/');

// Datetime
define('TIMEZONE', 'Europe/Copenhagen');

if($_SERVER['HTTP_HOST'] == decrypt('bmV0LmRhdGFsYWVyZS5kaw==') ) {

/**
 * URLs
 */
define('APP_HOME', 'https://net.datalaere.dk');
define('APP_SITEURL', 'https://net.datalaere.dk');

/**
 * DB settings
 */
define('DB_DRIVER', 'mysql');
define('DB_NAME', 'datalaere_dk_db_data');
define('DB_USER', 'datalaere_dk');
define('DB_PASSWORD', decrypt('cDk1cnRoMno=') );
define('DB_HOST', decrypt('bXlzcWwxNy51bm9ldXJvLmNvbQ==') );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
define('DB_PREFIX', '');

}
