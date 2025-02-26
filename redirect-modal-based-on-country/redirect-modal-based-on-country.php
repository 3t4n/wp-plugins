<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/David-Kurniawan/
 * @since             1.0.0
 * @package           Redirect_Modal_Based_On_Country
 *
 * @wordpress-plugin
 * Plugin Name:       Redirect Modal Based On Country
 * Plugin URI:        https://wordpress.org/plugins/redirect-modal-based-on-country/
 * Description:       Let your visitors know that your website is also available for their country
 * Version:           1.0.0
 * Author:            David Kurniawan
 * Author URI:        https://github.com/David-Kurniawan/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       redirect-modal-based-on-country
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	wp_die();
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'REDIRECT_MODAL_BASED_ON_COUNTRY_VERSION', '1.0.0' );
define( 'RMBOC_SHORT_PREFIX', 'rmboc' );

if (!function_exists('redirect_modal_based_on_country_activate')) {
    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-redirect-modal-based-on-country-activator.php
     */
    function redirect_modal_based_on_country_activate() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-redirect-modal-based-on-country-activator.php';
        Redirect_Modal_Based_On_Country_Activator::activate();
    }

    register_activation_hook( __FILE__, 'redirect_modal_based_on_country_activate' );
}


if (!function_exists('redirect_modal_based_on_country_deactivate')) {
    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-redirect-modal-based-on-country-deactivator.php
     */
    function redirect_modal_based_on_country_deactivate() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-redirect-modal-based-on-country-deactivator.php';
        Redirect_Modal_Based_On_Country_Deactivator::deactivate();
    }

    register_deactivation_hook( __FILE__, 'redirect_modal_based_on_country_deactivate' );
}


/*Vendor*/
require plugin_dir_path( __FILE__ ) . 'vendor/cmb2/init.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-redirect-modal-based-on-country.php';

if (!function_exists('redirect_modal_based_on_country_run')) {
    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function redirect_modal_based_on_country_run() {

        $plugin = new Redirect_Modal_Based_On_Country();
        $plugin->run();

    }
    redirect_modal_based_on_country_run();
}
