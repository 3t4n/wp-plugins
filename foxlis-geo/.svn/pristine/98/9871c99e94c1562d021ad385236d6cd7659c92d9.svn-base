<?php
/**
 * Plugin Name:       Foxlis Geo
 * Plugin URI:        https://foxlis.com
 * Description:       Find geo location website visitor by ip.
 * Version:           2.8.0
 * Requires PHP:      5.6
 * Author:            Alexander Sorokin
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Foxlis Geo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Foxlis Geo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foxlis Geo. If not, see https://foxlis.com.
 */

use Foxlis\Geo\Services\FoxlisGeoService;

/**
 * Activate the plugin.
 */
if (!function_exists('foxlis_geo_activate')) {
    function foxlis_geo_activate()
    {
        $options = [
            'foxlis_geo_field_language' => 'en',
            'foxlis_geo_field_protocol' => 'http',
            'foxlis_geo_field_bot_filter' => '1',
            'foxlis_geo_field_session' => '1',
            'foxlis_geo_field_redirect_action' => 'disable',
            'foxlis_geo_field_account' => '',
            'foxlis_geo_field_request_timeout' => '1',
        ];

        $optionsDevelopment = [
            'foxlis_geo_field_development_fake_ip_enable' => '0',
            'foxlis_geo_field_development_fake_ip' => '23.55.115.223',
        ];

        $optionsFilter = [
            'foxlis_geo_field_filter_agents' => implode(PHP_EOL, [
                'cncat',
                'google',
                'openstat',
                'yahoo',
                'yandex',
                'crawler',
                'bot',
                'spider',
                'snoopy',
                'finder',
                'mail',
                'wget',
                'curl',
            ])
        ];

        add_option('foxlis_geo_options', $options);
        add_option('foxlis_geo_options_development', $optionsDevelopment);
        add_option('foxlis_geo_options_filter', $optionsFilter);
    }

    register_activation_hook(__FILE__, 'foxlis_geo_activate');
}

if (!function_exists('foxlis_geo_settings_link')) {
    function foxlis_geo_settings_link($links) {
        $settings_link = '<a href="' . menu_page_url('foxlis_geo_options', false) . '">' . __('Settings') . '</a>';

        array_unshift($links, $settings_link);
        return $links;
    }

    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_$plugin", 'foxlis_geo_settings_link' );
}

if (!function_exists('foxlis_geo_options')) {
    function foxlis_geo_options()
    {
        return is_array(get_option('foxlis_geo_options')) ? get_option('foxlis_geo_options') : [];
    }
}

if (!function_exists('foxlis_geo_options_redirect')) {
    function foxlis_geo_options_redirect()
    {
        return is_array(get_option('foxlis_geo_options_redirect')) ? get_option('foxlis_geo_options_redirect') : [];
    }
}

if (!function_exists('foxlis_geo_options_development')) {
    function foxlis_geo_options_development()
    {
        return is_array(get_option('foxlis_geo_options_development')) ? get_option('foxlis_geo_options_development') : [];
    }
}

if (!function_exists('foxlis_geo_options_filter')) {
    function foxlis_geo_options_filter()
    {
        return is_array(get_option('foxlis_geo_options_filter')) ? get_option('foxlis_geo_options_filter') : [];
    }
}

if (!function_exists('foxlis_geo_sevice')) {
    function foxlis_geo_sevice()
    {
        include_once __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

        static $foxlisGeoService;

        if (empty($foxlisGeoService)) {
            $foxlisGeoService = new FoxlisGeoService(
                foxlis_geo_options(),
                foxlis_geo_options_redirect(),
                foxlis_geo_options_development(),
                foxlis_geo_options_filter(),
                [
                    'redirect' => function ($location, $status = 302, $x_redirect_by = 'WordPress') {
                        wp_redirect($location, $status, $x_redirect_by);
                    },
                    'redirectByJsScript' => function ($script) {
                        if (!function_exists('foxlis_geo_redirect_client_js')) {
                            add_action('wp_enqueue_scripts', function () use ($script) {
                                foxlis_geo_redirect_client_js($script);
                            });

                            function foxlis_geo_redirect_client_js($script)
                            {
                                wp_enqueue_style('foxlis-geo-redirect-client', plugins_url('/client/css/redirect.css', __FILE__));
                                wp_enqueue_script('foxlis-geo-redirect-client', plugins_url('/client/js/redirect.js', __FILE__));
                                wp_add_inline_script('foxlis-geo-redirect-client', $script);
                            }
                        }
                    }
                ]
            );
        }

        return $foxlisGeoService;
    }
}

/**
 * Add the top level menu page.
 */
if (!function_exists('foxlis_geo_page')) {
    function foxlis_geo_page()
    {
        add_menu_page(
            'Foxlis Geo',
            'Foxlis Geo',
            'unfiltered_html',
            'foxlis_geo',
            'foxlis_geo_page_html',
            plugin_dir_url(__FILE__) . 'img/foxlis-icon-mini.png'
        );

        add_submenu_page(
            'foxlis_geo',
            'Foxlis Geo About',
            'About',
            'unfiltered_html',
            'foxlis_geo'
        );

        add_submenu_page(
            'foxlis_geo',
            'Foxlis Geo Account',
            'Account',
            'unfiltered_html',
            'foxlis_geo_options_account',
            'foxlis_geo_account_page_html'
        );

        add_submenu_page(
            'foxlis_geo',
            'Foxlis Geo Options',
            'Options',
            'manage_options',
            'foxlis_geo_options',
            'foxlis_geo_options_page_html'
        );

        add_submenu_page(
            'foxlis_geo',
            'Foxlis Geo Redirect',
            'Redirect',
            'manage_options',
            'foxlis_geo_options_redirect',
            'foxlis_geo_options_redirect_page_html'
        );

        add_submenu_page(
            'foxlis_geo',
            'Foxlis Geo Filter',
            'Filter',
            'manage_options',
            'foxlis_geo_options_filter',
            'foxlis_geo_options_filter_page_html'
        );

        add_submenu_page(
            'foxlis_geo',
            'Foxlis Geo Development',
            'Development',
            'manage_options',
            'foxlis_geo_options_development',
            'foxlis_geo_options_development_page_html'
        );
    }

    /**
     * Register our foxlis_geo_page to the admin_menu action hook.
     */
    add_action('admin_menu', 'foxlis_geo_page');
}

if (!function_exists('foxlis_geo_register_session')) {
    function foxlis_geo_register_session()
    {
        if (empty(session_id())) {
            session_start();
        }
    }

    add_action('init', 'foxlis_geo_register_session');
}

include_once __DIR__ . DIRECTORY_SEPARATOR . 'foxlis-geo-about.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'foxlis-geo-account.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'foxlis-geo-options.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'foxlis-geo-redirect.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'foxlis-geo-filter.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'foxlis-geo-development.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'foxlis-geo-api.php';
