<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [
    'ai_review_scanner_slug_menu' => [
        "page_title" => "Welcome to AI Review Scanner",
        "menu_title" => "ARS Setting",
        'capability' => 'manage_options',
        'icon' => 'menu-logo.png',
        'position' => null,
        'items' => [
            [
                "page_title" => "Main View",
                "menu_title" => "Main View",
                'capability' => 'manage_options',
                'route' => [
                    'get' => 'Dashboard\DashboardController@optionsView',
                    'post' => 'Dashboard\DashboardController@saveOptions',
                ],
            ]
        ]
    ]
];
