<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| WordPress REST API configuration
|--------------------------------------------------------------------------
|
| Here is where you can set up the WordPress REST API features.
|
*/

return [

    // embed wp-json-server
    'wp' => [
        'require_authentication' => true, // will affect all routes.
    ],

    // your custom rest api
    'custom' => [
        'path' => '/api',
        'enabled' => false,
    ],

    // authentication
    'auth' => [
        // embed basic authentication handler
        'basic' => true
    ]
];
