<?php

/**
 *
 * @link              https://protect.page/
 * @since             1.0.0
 * @package           protected-page
 * @wordpress-plugin
 * Plugin Name:       Protected Page Pro
 * Plugin URI:        https://protect.page/
 * Author URI:        https://protect.page/
 * Description:       Save your content after password.
 * Version:           1.0.16
 * Requires at least: 5.3
 * Tested up to:      5.8
 * Author:            giladtakoni
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       protected-page
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
    exit;
}
define('PROTECT_PAGE_PLUGIN_URL', plugins_url('', __FILE__));

if (function_exists('freemius_protected_page')) {
    freemius_protected_page()->set_basename(false, __FILE__);
} else {

    if (!function_exists('freemius_protected_page')) {
        function freemius_protected_page()
        {
            global  $freemius_protected_page;

            if (!isset($freemius_protected_page)) {
                // Include Freemius SDK.
                require_once dirname(__FILE__) . '/libs/fs-sdk/start.php';
                $freemius_protected_page = fs_dynamic_init(array(
                    'id'             => '4199',
                    'slug'           => 'protected-page',
                    'premium_slug'   => 'protected-page-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_0c2de17e09a076dadeb62e3bb486a',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug' => 'protected-page',
                    ),
                    'is_live'        => true,
                ));
            }

            return $freemius_protected_page;
        }

        freemius_protected_page();
        do_action('freemius_protected_page_loaded');
    }

    global  $freemius_protected_page;
    require_once dirname(__FILE__) . '/loader.php';
}
