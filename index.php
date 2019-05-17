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
 * Load custom functions
 */
require $webroot_dir . 'bootstrap/functions.php';

/**
 * Set up our global environment constant and load its config first
 * Default: local
 */
isLocalhost() ? define('APP_ENV', 'local') : define('APP_ENV', 'remote');

$env_config = $webroot_dir . 'config/env/' . APP_ENV . '.php';

if (file_exists($env_config)) {
    require_once $env_config;
}

/** Set default timezone */
date_default_timezone_set(TIMEZONE);

/**
 * Directories
 */
define('APP_VIEWS', $webroot_dir . 'resources/views/');
define('APP_LOG', $webroot_dir . 'storage/logs/app.log');

define('UPLOAD_PATH', $webroot_dir . 'public/uploads/');
define('UPLOAD_URL_PATH', APP_SITEURL . 'public/uploads/');

/** Get settings */
$settings = require $webroot_dir . 'bootstrap/settings.php';

/**
 * Instantiate the app
 */
$app = new \Slim\App($settings);

// Set up dependencies
require $webroot_dir . 'bootstrap/dependencies.php';

// Set up controllers
require $webroot_dir . 'bootstrap/controllers.php';

// Register middleware
require $webroot_dir . 'bootstrap/middleware.php';

// Register routes
require $webroot_dir . 'bootstrap/routes.php';

// Run app
$app->run();
