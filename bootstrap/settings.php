<?php

return [
    'settings' => [
        'displayErrorDetails' => APP_ERROR, // set to false in production
        'addContentLengthHeader' => APP_HEADER, // Allow the web server to send the content-length header
        // Renderer settings
        'renderer' => [
            'template_path' => APP_VIEWS,
            'cache_path' => APP_CACHE,
        ],
        // Monolog settings
        'logger' => [
            'name' => APP_NAME,
            'path' => APP_LOG,
            'level' => \Monolog\Logger::DEBUG,
        ],
        'db' => [
            'driver' => DB_DRIVER,
            'host' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'charset' => DB_CHARSET,
            'collation' => DB_COLLATE,
            'prefix' => DB_PREFIX,
        ],
    ],
];
