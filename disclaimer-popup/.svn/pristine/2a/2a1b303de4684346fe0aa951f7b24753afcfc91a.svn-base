<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.themeinthebox.com
 * @since             1.1.3
 * @package           Wp_Disclaimer_Popup
 *
 * @wordpress-plugin
 * Plugin Name:       Disclaimer Popup
 * Plugin URI:        http://www.themeinthebox.com/wp-disclaimer-popup
 * Description:       It helps to quickly create pop-ups with disclaimers that appear when the website is opened. You can control many graphic parts of the popup, and you can also decide how many days the cookie is valid, before being requested again for the popup.
 * Version:           1.1.3
 * Author:            ThemeintheBox
 * Author URI:        http://www.themeinthebox.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-disclaimer-popup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_DISCLAIMER_POPUP_VERSION', '1.1.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-disclaimer-popup-activator.php
 */
function activate_wp_disclaimer_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-disclaimer-popup-activator.php';
	Wp_Disclaimer_Popup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-disclaimer-popup-deactivator.php
 */
function deactivate_wp_disclaimer_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-disclaimer-popup-deactivator.php';
	Wp_Disclaimer_Popup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_disclaimer_popup' );
register_deactivation_hook( __FILE__, 'deactivate_wp_disclaimer_popup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-disclaimer-popup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_disclaimer_popup() {

	$plugin = new Wp_Disclaimer_Popup();
	$plugin->run();

}
run_wp_disclaimer_popup();


/*------------------------------------*\
	MetaBox
\*------------------------------------*/

if( !class_exists( 'RWMB_Loader' ) ) {
	include plugin_dir_path( __FILE__ ) . '/assets/meta-box/meta-box.php';
}

/*
if( !class_exists( 'MB_Admin_Columns' ) ) {
	include plugin_dir_path( __FILE__ ) . '/assets/mb-admin-columns/mb-admin-columns.php';
}
*/


if( !class_exists( 'MB_Settings_Page_Loader' ) ) {
	include plugin_dir_path( __FILE__ ) . '/assets/mb-settings-page/mb-settings-page.php';
}


if( !class_exists( 'MB_Conditional_Logic' ) ) {
	include plugin_dir_path( __FILE__ ) . '/assets/meta-box-conditional-logic/meta-box-conditional-logic.php';
}


require plugin_dir_path( __FILE__ ) . 'wpdp-run.php';
require plugin_dir_path( __FILE__ ) . 'cpt.php';
require plugin_dir_path( __FILE__ ) . 'mb-settings.php';


# =========================== #
# ==== ADD SETTINGS LINK ==== #
# =========================== #

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'settings_wp_disclaimer_popup');
function settings_wp_disclaimer_popup( $links ) {
	$links[] = '<a href="' .
		admin_url( 'edit.php?post_type=wp-disclaimer-popup&page=wpdp' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}


/**
 * Generate stylesheet for Branding when ACF options are saved
 */
function wpdp_generate_options_css() {
		$ss_dir = plugin_dir_path( __FILE__ );
		ob_start(); // Capture all output into buffer
		require($ss_dir . 'public/css/wp-disclaimer-popup-public.css.php'); // Grab the custom style php file
		$css = ob_get_clean(); // Store output in a variable, then flush the buffer
		file_put_contents($ss_dir . 'public/css/wp-disclaimer-popup-public.gen.css', $css, LOCK_EX); // Save it as a css file
	}
add_action( 'rwmb_after_save_post', 'wpdp_generate_options_css' ); //Parse the output and write the CSS file on post save
