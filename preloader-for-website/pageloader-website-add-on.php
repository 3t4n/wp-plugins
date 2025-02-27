<?php
/**
 * Plugin Name: Preloader for Website
 * Plugin URL: https://www.essentialplugin.com/wordpress-plugin/preloader-for-website/
 * Text Domain: preloader-for-website
 * Domain Path: /languages/
 * Description: Preloader for Website : A loading screen add-on for your WordPress website.
 * Version: 1.3.1
 * Author: WP OnlineSupport, Essential Plugin
 * Author URI: https://www.essentialplugin.com/wordpress-plugin/preloader-for-website/
 * Contributors: WP OnlineSupport
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( ! defined( 'PLWAO_VERSION' ) ) {
	define( 'PLWAO_VERSION', '1.3.1' ); // Version of plugin
}

if( ! defined( 'PLWAO_DIR' ) ) {
	define( 'PLWAO_DIR', dirname( __FILE__ ) ); // Plugin dir
}

if( ! defined( 'PLWAO_URL' ) ) {
	define( 'PLWAO_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}

if( ! defined( 'PAOC_UPGRADE_LINK' ) ) {
	define( 'PAOC_UPGRADE_LINK', 'https://www.essentialplugin.com/pricing/?utm_source=WP&utm_medium=Preloader&utm_campaign=Features-PRO' ); // Upgrade Pro Link
}

if( ! defined( 'PAOC_SITE_LINK' ) ) {
	define('PAOC_SITE_LINK','https://www.essentialplugin.com'); // Plugin link
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Preloader for Website - WPOS
 * @since 1.0.0
 */
function plwao_ticker_load_textdomain() {

	global $wp_version;

	// Set filter for plugin's languages directory
	$plwao_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$plwao_lang_dir = apply_filters( 'plwao_languages_directory', $plwao_lang_dir );

	// Traditional WordPress plugin locale filter.
	$get_locale = get_locale();

	if ( $wp_version >= 4.7 ) {
		$get_locale = get_user_locale();
	}

	// Traditional WordPress plugin locale filter
	$locale = apply_filters( 'plugin_locale',  $get_locale, 'preloader-for-website' );
	$mofile = sprintf( '%1$s-%2$s.mo', 'preloader-for-website', $locale );

	// Setup paths to current locale file
	$mofile_global  = WP_LANG_DIR . '/plugins/' . basename( PLWAO_DIR ) . '/' . $mofile;

	if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
		load_textdomain( 'preloader-for-website', $mofile_global );
	} else { // Load the default language files
		load_plugin_textdomain( 'preloader-for-website', false, $plwao_lang_dir );
	}
}
add_action('plugins_loaded', 'plwao_ticker_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'plwao_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'plwao_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @since 1.0.0
 */
function plwao_install() {

	// Get settings for the plugin
	$plwao_options = get_option( 'plwao_options' );
	
	if( empty( $plwao_options ) ) { // Check plugin version option
		
		// Set default settings
		plwao_default_settings();
		
		// Update plugin version to option
		update_option( 'plwao_plugin_version', '1.0' );
	}

	// Deactivate Pro version
	if( is_plugin_active('preloader-for-website-pro/pageloader-website-add-on.php') ){
		add_action('update_option_active_plugins', 'plwao_deactivate_pro_version');
	}
}

/**
 * Deactivate PRO version when FREE is going to be active
 * 
 * @since 1.2
 */
function plwao_deactivate_pro_version() {
   deactivate_plugins('preloader-for-website-pro/pageloader-website-add-on.php',true);
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @since 1.0.0
 */
function plwao_uninstall() {
	// Uninstall functionality
}

/**
 * Display Plugin Notice
 *
 * @since 1.2
 */
function plwao_plugin_admin_notice() {

	global $pagenow;

	// If not plugin screen
	if( 'plugins.php' != $pagenow ) {
		return;
	}

	// Check Lite Version
	$dir	= WP_PLUGIN_DIR . '/preloader-for-website-pro/pageloader-website-add-on.php';

	if( ! file_exists( $dir ) ) {
		return;
	}

	$notice_link	= add_query_arg( array('message' => 'plwao-plugin-notice'), admin_url('plugins.php') );
	$notice_transient = get_transient( 'plwao_install_notice' );

	if( $notice_transient == false && current_user_can( 'install_plugins' )  ) {
		echo '<div class="updated notice" style="position:relative;">
			<p>
				<strong>'.sprintf( __('Thank you for activating %s', 'preloader-for-website'), 'Preloader For Website').'</strong>.<br/>
				'.sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'preloader-for-website'), '<strong>(<em>Preloader For Website PRO</em>)</strong>' ).'
			</p>
			<a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
		</div>';
	}
}
add_action( 'admin_notices', 'plwao_plugin_admin_notice');

// Taking some globals
global $plwao_options;

// Functions file
require_once( PLWAO_DIR . '/includes/plwao-functions.php' );
$plwao_options = plwao_get_settings();

// Script file
require_once( PLWAO_DIR . '/includes/class-plwao-script.php' );

// Public file
require_once( PLWAO_DIR . '/includes/class-plwao-public.php' );

// Admin file
require_once( PLWAO_DIR . '/includes/admin/class-plwao-admin.php' );