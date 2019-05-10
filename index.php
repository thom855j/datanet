<?php

session_start();

/** @var string Directory containing all of the site's files */
$root_dir = dirname(__FILE__);

/** @var string Document Root */
$webroot_dir = $root_dir . '/';

/**
 * Load Composer autoload
 */
require $webroot_dir . 'vendor/autoload.php';

/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
if (file_exists($webroot_dir . 'config/.env')) {
    $dotenv = Dotenv\Dotenv::create($webroot_dir . 'config/');
    $dotenv->load();
    $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'APP_HOME', 'APP_SITEURL']);
}

// Set default timezone
date_default_timezone_set(env('TIMEZONE') ?: 'Europe/Copenhagen');

/**
 * Set up our global environment constant and load its config first
 * Default: production
 */
define('APP_ENV', env('APP_ENV') ?: 'production');

define('APP_NAME', env('APP_NAME') ?: 'APP');

$env_config = $webroot_dir . 'config/environments/' . APP_ENV . '.php';

if (file_exists($env_config)) {
    require_once $env_config;
}

/**
 * URLs
 */
define('APP_HOME', env('APP_HOME'));
define('APP_SITEURL', env('APP_SITEURL'));

/**
 * Directories
 */
define('APP_SRC', $webroot_dir . 'bootstrap/');
define('APP_VIEWS', $webroot_dir . 'resources/views/');
define('APP_LOG', $webroot_dir . 'storage/logs/app.log');

define('APP_CACHE', env('APP_CACHE') ?: $webroot_dir . 'storage/cache/');

define('PUBLIC_DIR', 'public/');
define('APP_PUBLIC_DIR', $webroot_dir . PUBLIC_DIR);
define('APP_PUBLIC_URL', APP_HOME . CONTENT_DIR);

/**
 * DB settings
 */
define('DB_DRIVER', env('DB_DRIVER') ?: 'mysql');
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
define('DB_PREFIX', env('DB_PREFIX') ?: '');

// Instantiate the app
$settings = require APP_SRC . 'settings.php';
$app = new \Slim\App($settings);

// Set up custom functions
require APP_SRC . 'functions.php';

// Set up dependencies
require APP_SRC . 'dependencies.php';

// Set up controllers
require APP_SRC . 'controllers.php';

// Register middleware
require APP_SRC . 'middleware.php';

// Register routes
require APP_SRC . 'routes.php';

// Run app
$app->run();
