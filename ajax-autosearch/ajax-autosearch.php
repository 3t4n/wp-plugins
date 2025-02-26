<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://catchplugins.com/ajax-autosearch/
 * @since             1.0.0
 * @package           Ajax_AutoSearch
 *
 * @wordpress-plugin
 * Plugin Name:       Ajax AutoSearch
 * Plugin URI:        https://catchplugins.com/ajax-autosearch/
 * Description:       Ajax AutoSearch lets you display Ajax_AutoSearch Navigation anywhere on your website elegantly. It  helps your readers navigate easily through your website without getting lost.
 * Version:           1.4.1
 * Author:            Catch Plugins
 * Author URI:        https://catchplugins.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ajax-autosearch
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
define( 'AJAX_AUTOSEARCH_VERSION', '1.4.1' );

// The URL of the directory that contains the plugin.
if ( ! defined( 'AJAX_AUTOSEARCH_URL' ) ) {
	define( 'AJAX_AUTOSEARCH_URL', plugin_dir_url( __FILE__ ) );
}

// The absolute path of the directory that contains the file.
if ( ! defined( 'AJAX_AUTOSEARCH_PATH' ) ) {
	define( 'AJAX_AUTOSEARCH_PATH', plugin_dir_path( __FILE__ ) );
}

// Gets the path to a plugin file or directory, relative to the plugins directory, without the leading and trailing slashes.
if ( ! defined( 'AJAX_AUTOSEARCH_BASENAME' ) ) {
	define( 'AJAX_AUTOSEARCH_BASENAME', plugin_basename( __FILE__ ) );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ajax-autosearch-activator.php
 */
function activate_ajax_autosearch() {
	/* Check if Ajax AutoSearch Pro is installed and active, abort plugin activation and return with message */
	$required = 'ajax-autosearch-pro/ajax-autosearch-pro.php';
	if ( is_plugin_active( $required ) ) {
		$message = esc_html__( 'Sorry, Pro plugin is already active. No need to activate Free version. %1$s&laquo; Return to Plugins%2$s.', 'ajax-autosearch' );
		$message = sprintf( $message, '<br><a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">', '</a>' );
		wp_die( $message );
	}
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajax-autosearch-activator.php';
	Ajax_AutoSearch_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_ajax_autosearch' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ajax-autosearch-deactivator.php
 */
function deactivate_ajax_autosearch() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajax-autosearch-deactivator.php';
	Ajax_AutoSearch_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_ajax_autosearch' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ajax-autosearch.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @param boolean $checked Check if checkbox is checked.
 * @since    1.0.0
 */
function ajax_autosearch_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

if ( ! function_exists( 'ajax_autosearch_get_options' ) ) :
	/**
	 * The core plugin class that is used to define internationalization,
	 * admin-specific hooks, and public-facing site hooks.
	 */
	function ajax_autosearch_get_options() {
		$defaults = ajax_autosearch_default_options();
		$options  = get_option( 'ajax_autosearch_options', $defaults );
		return wp_parse_args( $options, $defaults );
	}
endif;


if ( ! function_exists( 'ajax_autosearch_default_options' ) ) :
	/**
	 * Return array of default options
	 *
	 * @param array $option Options array.
	 * @since     1.0
	 * @return    array    default options.
	 */
	function ajax_autosearch_default_options( $option = null ) {

		$default_options = array(
			'enable_post_filter'             => 1,
			'enable_category_filter'         => 1,
			'enable_tags_filter'             => 1,
			'show_featured_image'            => 1,
			'limit'                          => 10,
			'enable_custom_post_type_filter' => 0,
			'layout'                         => 'default',
		);

		if ( null === $option ) {
			return apply_filters( 'ajax_autosearch_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}
endif; // Ajax_AutoSearch_default_options.

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
function run_ajax_autosearch() {

	$plugin = new Ajax_AutoSearch();
	$plugin->run();

}
run_ajax_autosearch();

add_filter( 'pre_get_posts', 'ajax_autosearch_query' );
function ajax_autosearch_query( $query ) {
	/* print_r( $_GET );
	die(); */
	if ( $query->is_search ) {
		if ( isset( $_GET['post_type'] ) ) {
			$post_types = explode( ',', $_GET['post_type'] );
			$query->set( 'post_type', $post_types );
		}
		if ( isset( $_GET['categories'] ) ) {
			$categories = explode( ',', $_GET['categories'] );
			$query->set( 'category__and', $categories );
		}
		if ( isset( $_GET['tags'] ) ) {
			$tags = explode( ',', $_GET['tags'] );
			$query->set( 'tag__in', $tags );
		}
	}
	/* echo '<pre>';
	print_r( $query );
	echo '/<pre>';
	die(); */
	return $query;
}
