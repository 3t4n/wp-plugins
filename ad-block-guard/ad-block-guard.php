<?php
/*
Plugin Name: The Ultimate AdBlock Detector - AdBlock Guard
Plugin URI: https://www.wutime.com/downloads/wp-adblock-guard/
Description: AdBlock Guard is used by website owners that demand the most accurate AdBlock Detection Software.  AdBlock Guard is an efficient, high performance and light-weight, fully featured and fully customizable AdBlock Detection Software.
Version: 2.2.7
Author: Wutime
Author URI: https://www.wutime.com
License: GPL-2.0-or-later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ad-block-guard
Domain Path: /languages
Requires PHP: 7.4
Requires at least: 5.0
Tested up to: 6.7.1
Tags: adblock detector, anti-adblock, adblock detection, adblock-guard
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


// PHP version check
if (version_compare(PHP_VERSION, '7.4', '<')) {
    deactivate_plugins(plugin_basename(__FILE__));
    wp_die('This plugin requires PHP 7.4 or higher.');
} 

/**************************************************************************************************
/**************************************************************************************************
// Define constants
*/
define('ADBLOCKGUARD_VERSION', '2.2.7');
define('ADBLOCKGUARD_NAME', 'AdBlock Guard');
define('ADBLOCKGUARD_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ADBLOCKGUARD_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ADBLOCKGUARD_PLUGIN_BASE_NAME', plugin_basename(__FILE__));
define('ADBLOCKGUARD_PLUGIN_FILE', basename(__FILE__));
define('ADBLOCKGUARD_LOGO_FULL', '<img src="' . ADBLOCKGUARD_PLUGIN_URL . 'assets/img/wu-adblock-detector-pro.jpg" style="height:800px;width:auto;" />');
define('ADBLOCKGUARD_LOGO_THUMB', '<img src="' . ADBLOCKGUARD_PLUGIN_URL . 'assets/img/wu-adblock-detector-pro.jpg" style="float:right;height:125px;width:125px;" />');

// Debugging
define('ADBLOCKGUARD_DEBUG', false);

// Storefront
define('ADBLOCKGUARD_STORE_URL', 'https://www.wutime.com'); 
define('ADBLOCKGUARD_ITEM_ID', 4952); 

// Overlay
define('ADBLOCKGUARD_CONSOLE_LOG', false);
define('ADBLOCKGUARD_CACHING', true);
define('ADBLOCKGUARD_IS_FREE', true);

define('ADBLOCKGUARD_LICENSE_STATUS', 'wuadblockguard_license_status');
define('ADBLOCKGUARD_LICENSE_KEY', 'wuadblockguard_license_key');
define('ADBLOCKGUARD_LICENSE_LAST_CHECK', 'wuadblockguard_license_last_check');
define('ADBLOCKGUARD_LICENSE_EXPIRES', 'wuadblockguard_license_expires');
define('ADBLOCKGUARD_USE_LOADER',!ADBLOCKGUARD_DEBUG);
define('ADBLOCKGUARD_USE_PACKER',!ADBLOCKGUARD_DEBUG);
define('ADBLOCKGUARD_USE_MINIFY',!ADBLOCKGUARD_DEBUG);
define('ADBLOCKGUARD_USE_OBFS',!ADBLOCKGUARD_DEBUG);
define('ADBLOCKGUARD_NO_CACHE',ADBLOCKGUARD_DEBUG);


/**************************************************************************************************
/**************************************************************************************************
// Screens
// Screen ID: toplevel_page_wuadblockguard_settings
// Screen ID: adblock-guard_page_wuadblockguard_demo_page
// Screen ID: adblock-guard_page_wuadblockguard_license_key
// Screen ID: adblock-guard_page_wuadblockguard_system_check

/**************************************************************************************************
/**************************************************************************************************
*
* 
* Shared classes for admin and front-end
*
*
*/

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'vendor/autoload.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'helper/Logger.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'helper/Notices.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'helper/Upgrade.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'helper/Compatability.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'includes/class-tools.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'includes/carbon-fields-setup.php';	
require_once ADBLOCKGUARD_PLUGIN_DIR . 'src/Packer.php';
require_once ADBLOCKGUARD_PLUGIN_DIR . 'src/AdBlock.php';






/**************************************************************************************************
/**************************************************************************************************
*
* ADMIN
*
*
*/


if (is_admin()) {

    // Include necessary files for the admin side
    require_once ADBLOCKGUARD_PLUGIN_DIR . 'includes/admin/admin.php';
    require_once ADBLOCKGUARD_PLUGIN_DIR . 'includes/admin/menu.php';

    require_once ADBLOCKGUARD_PLUGIN_DIR . 'vendor/htmlburger/carbon-field-number/carbon-field-number-plugin.php';
    require_once ADBLOCKGUARD_PLUGIN_DIR . 'vendor/iamntz/carbon-fields-urlpicker/carbon-field-urlpicker-plugin.php';

	add_action('plugins_loaded', function () {
	    $notices = new \AdBlockGuard\Notices();
	});


	add_action( 'after_setup_theme', function () {
	    // Boot Carbon Fields
	    \Carbon_Fields\Carbon_Fields::boot();

	    // Initialize compatibility checks
	    $Compatability = new \AdBlockGuard\Helper\Compatability();

	    // Register Carbon Fields options
	    add_action( 'carbon_fields_register_fields', 'wuadblockguard_attach_theme_options' );
	    function wuadblockguard_attach_theme_options() {
	        $carbon_fields_setup = new \AdBlockGuard\CarbonFieldsSetup();
	        $carbon_fields_setup->register_fields();
	    }
	});


    $Admin_Menu = new \AdBlockGuard\Admin_Menu();

    // Initialize admin-related functionality
    \AdBlockGuard\Admin::get_instance();

    $license_checker = \AdBlockGuard\LicenseChecker::getInstance();
    $license_checker->checkLicense();

    // Enqueue Thickbox scripts with a unique prefix
    function wuadblockguard_enqueue_thickbox_scripts() {
        if (is_admin()) {
            add_thickbox();
        }
    }
    add_action('admin_enqueue_scripts', 'wuadblockguard_enqueue_thickbox_scripts');

}






/**************************************************************************************************
/**************************************************************************************************
*
* DEMO
*
*
*/


if (is_admin()) 
{
	
    add_action('after_setup_theme', function() {
        // Check if we're in the admin and if the demo is triggered
        if ((isset($_GET['AdBlockGuardDemo']) || isset($_POST['AdBlockGuardDemo'])) && is_admin()) {

            // Handle POST requests and verify nonce
            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                if (
                    !isset($_POST['wuadblockguard_demo_nonce']) || 
                    !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['wuadblockguard_demo_nonce'])), 'wuadblockguard_demo_action')
                ) {
                    wp_die(esc_html__('Nonce verification failed. Please try again.', 'ad-block-guard'));
                }

                $role = isset($_POST['role']) ? sanitize_text_field(wp_unslash($_POST['role'])) : '';
            } else {
                // Handle GET requests (without nonce verification)
                $role = isset($_GET['role']) ? sanitize_text_field(wp_unslash($_GET['role'])) : '';
            }

            require_once ADBLOCKGUARD_PLUGIN_DIR . 'includes/public/frontend.php';
            require_once ADBLOCKGUARD_PLUGIN_DIR . 'helper/AdBlockExtended.php';

            // Initialize the Frontend class during the admin footer
            add_action('init', function () use ($role) {
                if (!empty($role)) {
                    $frontend = new \AdBlockGuard\Frontend($role);
                } else {
                    wp_die(esc_html__('Role parameter is missing or invalid.', 'ad-block-guard'));
                }
            });
        }
    });
}









/**************************************************************************************************
/**************************************************************************************************
*
* FRONTEND
*
*
*/


if (!is_admin() 
    && !defined('DOING_AJAX') 
    && !defined('REST_REQUEST') 
    && !defined('DOING_CRON') 
    && !defined('XMLRPC_REQUEST') 
    && !defined('WP_CLI')) 
{
    require_once ADBLOCKGUARD_PLUGIN_DIR . 'includes/public/frontend.php';
    require_once ADBLOCKGUARD_PLUGIN_DIR . 'helper/AdBlockExtended.php';

    // Initialize the Frontend class
    add_action('wp_enqueue_scripts', function () {
        $frontend = \AdBlockGuard\Frontend::get_instance();
    });

}









/**************************************************************************************************
/**************************************************************************************************
*
* SOFTWARE UPDATES & LICENSING
*
*
*/

function wuadblockguard_init_license_checker() {
    if (is_admin()) { // Ensure this only runs in the admin area
        $checker = \AdBlockGuard\LicenseChecker::getInstance();
        $checker->checkLicenseValidity();
    }
}
add_action('init', 'wuadblockguard_init_license_checker');










/**************************************************************************************************
/**************************************************************************************************
*
* UNLOAD EDD README.TXT FILTER BUG (Prevents "view details" from showing WordPress page)
*
*
*/

add_action( 'plugins_loaded', function() {
    global $wp_filter;

    // Check if the plugins_api filter exists
    if ( isset( $wp_filter['plugins_api'] ) ) {
        foreach ( $wp_filter['plugins_api']->callbacks as $priority => $hooks ) {
            foreach ( $hooks as $key => $hook ) {
                if ( isset( $hook['function'] ) && is_array( $hook['function'] ) ) {
                    $callback = $hook['function'];

                    // Match the class and method
                    if ( is_object( $callback[0] ) && get_class( $callback[0] ) === 'Alledia\EDD_SL_Plugin_Updater' && $callback[1] === 'plugins_api_filter' ) {
                        unset( $wp_filter['plugins_api']->callbacks[$priority][$key] );
                    }
                }
            }
        }
    }
}, 20 ); // Make sure this runs after the vendor plugin













/**************************************************************************************************
/**************************************************************************************************
*
* UPGRADES
*
*
*/

add_action('plugins_loaded', 'wuadblockguard_check_version');
function wuadblockguard_check_version() {
    // Attempt to retrieve the version from the transient
    $current_version = get_transient('wuadblockguard_version');

    // If the transient doesn't exist, fall back to the option
    if ($current_version === false) {
        $current_version = get_option('wuadblockguard_version', false);

        // If the option exists, set the transient for future use
        if ($current_version !== false) {
            set_transient('wuadblockguard_version', $current_version, DAY_IN_SECONDS);
        }
    }

    // If the current version is outdated or not set, run the upgrade process
    if ($current_version === false || version_compare($current_version, ADBLOCKGUARD_VERSION, '<')) {
        \AdBlockGuard\Upgrade::run($current_version, ADBLOCKGUARD_VERSION);
    }
}









/**************************************************************************************************
/**************************************************************************************************
*
* PLUGIN ACTIVATION
*
*
*/



/**
 * Runs on plugin activation.
 */
function adblock_guard_activate() {

	// Define the options and their default values
	// Add any other important options here
	$options = [
	    'wuadblockguard_version' => false,
	    'wuadblockguard_notices' => false,
	    'wuadblockguard_license_key' => false,
	    'wuadblockguard_license_status' => false,
	    'wuadblockguard_license_expires' => false,
	    'wuadblockguard_license_last_check' => false,
	    'wuadblockguard_product_details' => false,
	    'wuadblockguard_latest_version' => false,
	    \AdBlockGuard\CarbonFieldsSetup::CACHE_KEY => false,
	];

	// Loop through each option and ensure it exists
	foreach ($options as $key => $default) {
	    if (get_option($key, null) === null) {
	        add_option($key, $default, '', 'no');
	    }
	}

    
}
register_activation_hook(__FILE__, 'adblock_guard_activate');




















/**************************************************************************************************
/**************************************************************************************************
*
* SCHEDULED TASKS (CRON)
*
*
*/

// Include the Cron class and initialize it
require_once ADBLOCKGUARD_PLUGIN_DIR . 'helper/Cron.php';
new \AdBlockGuard\Cron();















