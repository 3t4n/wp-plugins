<?php
/**
 * @package Make Builder
 */

/**
 * Plugin Name: Make Builder
 * Plugin URI:  https://thethemefoundry.com/make/
 * Description: Your friendly drag and drop page builder for WordPress. Simple, fast and easy to use.
 * Author:      The Theme Foundry
 * Version:     1.1.10
 * Author URI:  https://thethemefoundry.com
 * Upgrade URI: https://thethemefoundry.com
 */

/**
 * Get the path to the Make Builder directory. Includes trailing slash.
 *
 * @since 1.0.0.
 *
 * @param bool $relative    Set to true to return Make Builder's path relative to the plugins directory.
 *
 * @return string           Absolute or relative path to Make Builder.
 */
function make_get_plugin_directory( $relative = false ) {
	if ( $relative ) {
		return trailingslashit( dirname( plugin_basename( __FILE__ ) ) );
	}

	return plugin_dir_path( __FILE__ );
}

/**
 * Get the URL to the Make Builder directory. Includes trailing slash.
 *
 * @since 1.0.0.
 *
 * @return string
 */
function make_get_plugin_directory_uri() {
	return plugin_dir_url( __FILE__ );
}

/**
 * Get the URL to the Make Builder directory. Includes trailing slash.
 *
 * @since 1.0.0.
 *
 * @return string
 */
function make_get_plugin_basename() {
	return plugin_basename( __FILE__ );
}

require_once( make_get_plugin_directory() . 'plugins-screen.php' );

// Let the Make theme take over in case it's already active.
if ( 'make' === get_template() ) {
	return;
}

/**
 * Kick things off.
 *
 * @since 1.0.0.
 *
 * @hooked action plugins_loaded
 *
 * @return void
 */
function make_builder_initialize_plugin() {
	// Return immediately if Make is being previewed in Customizer.
	global $wp_customize;

	if ( isset( $wp_customize ) && ( 'make' === $wp_customize->theme()->template ) ) {
		return;
	}

	/**
	 * The current version of the plugin.
	 */
	define( 'TTFMAKE_VERSION', '1.9.16' );

	/**
	 * The minimum version of WordPress required for the plugin.
	 */
	define( 'TTFMAKE_MIN_WP_VERSION', '4.7' );

	// Include autoloader here, to avoid
	// replacing Make's default autoloader.
	require_once make_get_plugin_directory() . 'autoload.php';

	// Configure the global Make object.
	global $Make;

	$Make = new MAKE_API;
	$Make->hook();

	/**
	 * Action: Fire when the Make Builder API has finished loading.
	 *
	 * @since 1.0.0.
	 *
	 * @param MAKE_API $Make
	 */
	do_action( 'make_api_loaded', $Make );
}

add_action( 'plugins_loaded', 'make_builder_initialize_plugin' );

if ( ! function_exists( 'Make' ) ) :

/**
 * Get the global Make API object.
 *
 * @since 1.0.0.
 *
 * @return MAKE_API|null
 */
function Make() {
	global $Make;

	if ( ! did_action( 'make_api_loaded' ) || ! $Make instanceof MAKE_APIInterface ) {
		trigger_error(
			__( 'The Make() function should not be called before the make_api_loaded action has fired.', 'make' ),
			E_USER_WARNING
		);
		return null;
	}

	return $Make;
}

endif;
