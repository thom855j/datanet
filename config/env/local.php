<?php

define('APP_NAME', 'Datanet local');

// System
ini_set('display_errors', 1);
define('APP_ERROR', true);
define('APP_HEADER', false);
define('APP_CACHE', false);

// Datetime
define('TIMEZONE', 'Europe/Copenhagen');

/**
 * URLs
 */
define('APP_HOME', 'http://localhost/github/datanet/');
define('APP_SITEURL', 'http://localhost/github/datanet/');


/**
 * DB settings
 */
define('DB_DRIVER', 'mysql');
define('DB_NAME', 'datanet');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
define('DB_PREFIX', '');
