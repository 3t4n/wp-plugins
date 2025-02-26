<?php
/**
 * Plugin Name: Featured Post Creative
 * Plugin URI: https://www.essentialplugin.com/wordpress-plugin/featured-post-creative/
 * Description: Featured Posts allows you to add featured posts to your website via shortcode and widget.
 * Author: WP OnlineSupport, Essential Plugin
 * Text Domain: featured-post-creative
 * Domain Path: /languages/
 * Version: 1.5.2
 * Author URI: https://www.essentialplugin.com/
 *
 * @package WordPress
 * @author WP OnlineSupport
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( ! defined( 'WPFP_VERSION' ) ) {
	define( 'WPFP_VERSION', '1.5.2' ); // Version of plugin
}
// if( ! defined( 'WPFP_NAME' ) ) {
// 	define( 'WPFP_NAME', 'Featured Post Creative' ); // Version of plugin
// }
if( ! defined( 'WPFP_DIR' ) ) {
	define( 'WPFP_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( ! defined( 'WPFP_URL' ) ) {
	define( 'WPFP_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( ! defined( 'WPFP_PLUGIN_BASENAME' ) ) {
	define( 'WPFP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // Plugin base name
}
if( ! defined( 'WPFP_POST_TYPE' ) ) {
	define( 'WPFP_POST_TYPE', 'post' ); // Plugin post type
}
if( ! defined( 'WPFP_CAT' ) ) {
	define( 'WPFP_CAT', 'category' ); // Plugin category name
}
if( ! defined( 'WPFP_META_PREFIX' ) ) {
	define( 'WPFP_META_PREFIX', '_wpfp_' ); // Plugin metabox prefix
}
if( ! defined( 'WPFP_PLUGIN_LINK_UNLOCK' ) ) {
	define( 'WPFP_PLUGIN_LINK_UNLOCK', 'https://www.essentialplugin.com/pricing/?utm_source=WP&utm_medium=Featured-Post&utm_campaign=Features-PRO' ); // Plugin link
}
if( ! defined( 'WPFP_PLUGIN_LINK_UPGRADE' ) ) {
	define( 'WPFP_PLUGIN_LINK_UPGRADE', 'https://www.essentialplugin.com/pricing/?utm_source=WP&utm_medium=Featured-Post&utm_campaign=Upgrade-PRO' ); // Plugin Check link
}

if( ! defined( 'WPFP_SITE_LINK' ) ) {
	define( 'WPFP_SITE_LINK','https://www.essentialplugin.com' ); // Plugin link
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package WP Featured Post
 * @since 1.0.0
 */
function wpfp_featured_post_load_textdomain() {

	global $wp_version;

	// Set filter for plugin's languages directory
	$wpfp_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$wpfp_lang_dir = apply_filters( 'wpfp_languages_directory', $wpfp_lang_dir );

	// Traditional WordPress plugin locale filter.
	$get_locale = get_locale();

	if ( $wp_version >= 4.7 ) {
		$get_locale = get_user_locale();
	}

	// Traditional WordPress plugin locale filter
	$locale = apply_filters( 'plugin_locale',  $get_locale, 'featured-post-creative' );
	$mofile = sprintf( '%1$s-%2$s.mo', 'featured-post-creative', $locale );

	// Setup paths to current locale file
	$mofile_global  = WP_LANG_DIR . '/plugins/' . basename( WPFP_DIR ) . '/' . $mofile;

	if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
		load_textdomain( 'featured-post-creative', $mofile_global );
	} else { // Load the default language files
		load_plugin_textdomain( 'featured-post-creative', false, $wpfp_lang_dir );
	}
}
add_action('plugins_loaded', 'wpfp_featured_post_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wpfp_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wpfp_uninstall' );

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @since 1.0.0
 */
function wpfp_install() {

	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();

	// Get settings for the plugin
	$wpfp_options = get_option( 'wpfp_options' );

	if( empty( $wpfp_options ) ) { // Check plugin version option

		// Set default settings
		wpfp_default_settings();

		// Update plugin version to option
		update_option( 'wpfp_plugin_version', '1.0' );
	}
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @since 1.0.0
 */
function wpfp_uninstall() {
	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @since 1.2.3
 */
function wpfp_admin_notice() {

	global $pagenow;

	// If not plugin screen
	if( 'plugins.php' != $pagenow ) {
		return;
	}

	// Check Lite Version
	$dir = ABSPATH . 'wp-content/plugins/featured-and-trending-post-pro/featured-and-trending-post-pro.php';

	if( ! file_exists( $dir ) ) {
		return;
	}

	$notice_link		= add_query_arg( array('message' => 'wpfp-plugin-notice'), admin_url('plugins.php') );
	$notice_transient	= get_transient( 'wpfp_install_notice' );

	// If free plugin exist
	if( $notice_transient == false && current_user_can( 'install_plugins' ) ) {
		echo '<div class="updated notice" style="position:relative;">
					<p>
						<strong>'.sprintf( __( 'Thank you for activating %s', 'featured-post-creative' ), 'Featured Post Creative' ).'</strong>.<br/>
						'.sprintf( __( 'It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'featured-post-creative' ), '<strong>(<em>Featured and Trending Post Pro</em>)</strong>' ).'
					</p>
					<a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
				</div>';
	}
}
add_action( 'admin_notices', 'wpfp_admin_notice' );

// Taking some globals
global $wpfp_options;

// Functions file
require_once( WPFP_DIR . '/includes/wpfp-functions.php' );
$wpfp_options = wpfp_get_settings();

// Script Class
require_once( WPFP_DIR . '/includes/class-wpfp-script.php' );

// Admin Class
require_once( WPFP_DIR . '/includes/admin/class-wpfp-admin.php' );

// Shortcode files for Block
require_once( WPFP_DIR . '/includes/shortcode/wpfp-recent-post.php' );

// Shortcode files for Grid
require_once( WPFP_DIR . '/includes/shortcode/wpfp-recent-post-grid.php' );

// Widget Class
require_once( WPFP_DIR . '/includes/widgets/class-wpfp-featured-widget-list.php' );

// Gutenberg Block Initializer
if ( function_exists( 'register_block_type' ) ) {
	require_once( WPFP_DIR . '/includes/admin/supports/gutenberg-block.php' );
}

/* Recommended Plugins Starts */
if ( is_admin() ) {
	require_once( WPFP_DIR . '/wpos-plugins/wpos-recommendation.php' );

	wpos_espbw_init_module( array(
							'prefix'	=> 'aigpl',
							'menu'		=> 'wpfp-about',
							'position'	=> 2,
						));
}
/* Recommended Plugins Ends */

/* Plugin Analytics Data */
function wpos_analytics_anl62_load() {

	require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

	$wpos_analytics =  wpos_anylc_init_module( array(
							'id'			=> 62,
							'file'			=> plugin_basename( __FILE__ ),
							'name'			=> 'Featured Post Creative',
							'slug'			=> 'featured-post-creative',
							'type'			=> 'plugin',
							'menu'			=> 'wpfp-about',
							'text_domain'	=> 'featured-post-creative',
						));

	return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl62_load();
/* Plugin Analytics Data Ends */