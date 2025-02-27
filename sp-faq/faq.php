<?php
/**
 * Plugin Name: WP FAQ
 * Plugin URL: https://www.essentialplugin.com/wordpress-plugin/sp-responsive-wp-faq-with-category-plugin/
 * Description: A simple FAQ plugin created with WordPress custom post type. Also work with Gutenberg shortcode block.
 * Text Domain: sp-faq
 * Domain Path: /languages/
 * Version: 3.9.2
 * Author: WP OnlineSupport, Essential Plugin
 * Author URI: https://www.essentialplugin.com/wordpress-plugin/sp-responsive-wp-faq-with-category-plugin/
 * Requires at least: 4.0
 * 
 * @package WP FAQ
 * @author Essential Plugin
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( ! defined( 'WP_FAQ_VERSION' ) ) {
	define( 'WP_FAQ_VERSION', '3.9.2' ); // Version of plugin
}
if( ! defined( 'WP_FAQ_DIR' ) ) {
	define( 'WP_FAQ_DIR', dirname( __FILE__ ) ); // Plugin Dir
}
if( ! defined( 'WP_FAQ_URL' ) ) {
	define( 'WP_FAQ_URL', plugin_dir_url( __FILE__ ) ); // Plugin URL
}
if( ! defined( 'WP_FAQ_POST_TYPE' ) ) {
	define( 'WP_FAQ_POST_TYPE', 'sp_faq' ); // Plugin post type
}
if( ! defined( 'WP_FAQ_CAT' ) ) {
	define( 'WP_FAQ_CAT', 'faq_cat' ); // Plugin Taxonomy
}

// if( ! defined( 'WP_FAQ_PLUGIN_BUNDLE_LINK' ) ) {
// 	define('WP_FAQ_PLUGIN_BUNDLE_LINK', 'https://www.essentialplugin.com/pricing/?utm_source=WP&utm_medium=FAQ&utm_campaign=Welcome-Screen'); // Plugin link
// }

// if( ! defined( 'WP_FAQ_PLUGIN_LINK_UNLOCK' ) ) {
// 	define('WP_FAQ_PLUGIN_LINK_UNLOCK', 'https://www.essentialplugin.com/essential-plugin-bundle-pricing/?utm_source=WP&utm_medium=FAQ&utm_campaign=Features-PRO'); // Plugin link
// }

if( ! defined( 'WP_FAQ_PLUGIN_LINK_UPGRADE' ) ) {
	define('WP_FAQ_PLUGIN_LINK_UPGRADE', 'https://www.essentialplugin.com/pricing/?utm_source=WP&utm_medium=FAQ&utm_campaign=Upgrade-PRO'); // Plugin Check link
}

if( ! defined( 'WP_FAQ_SITE_LINK' ) ) {
	define('WP_FAQ_SITE_LINK', 'https://www.essentialplugin.com'); // Plugin link
}

if( ! defined( 'WP_FAQ_PLUGIN_BUNDLE_LINK' ) ) {
	define('WP_FAQ_PLUGIN_BUNDLE_LINK', 'https://www.essentialplugin.com/pricing/?utm_source=WP&utm_medium=FAQ&utm_campaign=Welcome-Screen'); // Plugin link
}

if( ! defined( 'WP_FAQ_PLUGIN_LINK_UNLOCK' ) ) {
	define('WP_FAQ_PLUGIN_LINK_UNLOCK', 'https://www.essentialplugin.com/pricing/?utm_source=WP&utm_medium=FAQ&utm_campaign=Features-PRO'); // Plugin link
}

/**
 * Function to load text domain
 * 
 * @since 3.2.5
 */ 
function wp_faq_load_textdomain() {

	global $wp_version;

	// Set filter for plugin's languages directory
	$sp_faq_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$sp_faq_lang_dir = apply_filters( 'sp_faq_languages_directory', $sp_faq_lang_dir );

	// Traditional WordPress plugin locale filter.
	$get_locale = get_locale();

	if ( $wp_version >= 4.7 ) {
		$get_locale = get_user_locale();
	}

	// Traditional WordPress plugin locale filter
	$locale = apply_filters( 'plugin_locale',  $get_locale, 'sp-faq' );
	$mofile = sprintf( '%1$s-%2$s.mo', 'sp-faq', $locale );

	// Setup paths to current locale file
	$mofile_global  = WP_LANG_DIR . '/plugins/' . basename( WP_FAQ_DIR ) . '/' . $mofile;

	if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
		load_textdomain( 'sp-faq', $mofile_global );
	} else { // Load the default language files
		load_plugin_textdomain( 'sp-faq', false, $sp_faq_lang_dir );
	}
}

/**
 * Plugins Load functions
 * 
 * @since 1.0.0
 */
function wp_faq_plugin_loaded() {

	// Load Plugin 
	wp_faq_load_textdomain();
}
add_action( 'plugins_loaded', 'wp_faq_plugin_loaded' );

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @since 3.2.5
 */
register_activation_hook( __FILE__, 'wp_faq_install' );

/**
 * Deactivation Hook
 * Register plugin deactivation hook.
 * 
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wp_faq_uninstall' );

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * 
 * @since 3.2.5
 */
function wp_faq_install() {

	wp_faq_register_post_type();
	wp_faq_register_taxonomies();

	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();

	// Deactivate premium version of plugin
	if( is_plugin_active('wp-faq-pro/faq.php') ) {
		add_action('update_option_active_plugins', 'wp_faq_deactivate_pro_version');
	}
}

/**
 * Plugin Deactivation. Delete plugin options.
 * 
 * @since 1.0.0
 */
function wp_faq_uninstall() {
	// Uninstall functionality
}

/**
 * Deactivate pro plugin
 * 
 * @since 3.2.5
 */
function wp_faq_deactivate_pro_version() {
   deactivate_plugins( 'wp-faq-pro/faq.php', true );
}

/**
 * Admin notice
 * 
 * @since 3.2.5
 */
function wp_faq_admin_notice() {

	global $pagenow;

	// If not plugin screen
	if( 'plugins.php' != $pagenow ) {
		return;
	}

	// Check Lite Version
	$dir = WP_PLUGIN_DIR . '/wp-faq-pro/faq.php';

	if( ! file_exists( $dir ) ) {
		return;
	}

	$notice_link        = add_query_arg( array('message' => 'sp-faq-plugin-notice'), admin_url('plugins.php') );
	$notice_transient   = get_transient( 'sp_faq_install_notice' );

	// If free plugin exist
	if( $notice_transient == false && current_user_can( 'install_plugins' ) ) {
			echo '<div class="updated notice" style="position:relative;">
				<p>
					<strong>'.sprintf( __('Thank you for activating %s', 'sp-faq'), 'WP FAQ').'</strong>.<br/>
					'.sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'sp-faq'), '<strong>(<em>WP FAQ PRO</em>)</strong>' ).'
				</p>
				<a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
			</div>';
	}
}

// Action to add admin notice
add_action( 'admin_notices', 'wp_faq_admin_notice' );

// Function File
require_once( WP_FAQ_DIR . '/includes/wp-faq-functions.php' );

// Post Type File
require_once( WP_FAQ_DIR . '/includes/wp-faq-post-types.php' );

// Script File
require_once( WP_FAQ_DIR . '/includes/class-wp-faq-script.php' );

// Admin Class File
require_once( WP_FAQ_DIR . '/includes/admin/class-wp-faq-admin.php' );

// Shortcode File
require_once( WP_FAQ_DIR . '/includes/shortcode/wp-faq.php' );

// Gutenberg Block Initializer
if ( function_exists( 'register_block_type' ) ) {
	require_once( WP_FAQ_DIR . '/includes/admin/supports/gutenberg-block.php' );
}

/* Recommended Plugins Starts */
if ( is_admin() ) {

	require_once( WP_FAQ_DIR . '/wpos-plugins/wpos-recommendation.php' );

	wpos_espbw_init_module( array(
							'prefix'	=> 'spfaq',
							'menu'	=> 'edit.php?post_type='.WP_FAQ_POST_TYPE,
						));
}
/* Recommended Plugins Ends */

/* Plugin Wpos Analytics Data Starts */
function wpos_analytics_anl36_load() {

	require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

	$wpos_analytics =  wpos_anylc_init_module( array(
							'id'				=> 36,
							'file'			=> plugin_basename( __FILE__ ),
							'name'			=> 'WP responsive FAQ with category plugin',
							'slug'			=> 'wp-responsive-faq-with-category-plugin',
							'type'			=> 'plugin',
							'menu'			=> 'edit.php?post_type=sp_faq',
							'redirect_page'=> 'edit.php?post_type=sp_faq&page=sp-faq-solutions-features',
							'text_domain'	=> 'sp-faq',
						));

	return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl36_load();
/* Plugin Wpos Analytics Data Ends */