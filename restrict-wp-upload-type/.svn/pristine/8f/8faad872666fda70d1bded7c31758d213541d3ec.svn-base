<?php
/**
 * Plugin Name:       Restrict WP Upload Type
 * Description:       Enable and Restrict the upload mime file type accross with 96 extensions.
 * Version:           1.0.3
 * Author:            Kushang Tailor
 * Author URI:        https://profiles.wordpress.org/kushang78/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       restrict-wp-upload-type
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
define( 'RESTRICT_WP_UPLOAD_TYPE_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-restrict-wp-upload-type-activator.php
 */
function activate_restrict_wp_upload_type() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-restrict-wp-upload-type-activator.php';
	Restrict_Wp_Upload_Type_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-restrict-wp-upload-type-deactivator.php
 */
function deactivate_restrict_wp_upload_type() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-restrict-wp-upload-type-deactivator.php';
	Restrict_Wp_Upload_Type_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_restrict_wp_upload_type' );
register_deactivation_hook( __FILE__, 'deactivate_restrict_wp_upload_type' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-restrict-wp-upload-type.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.3
 */
function run_restrict_wp_upload_type() {

	$plugin = new Restrict_Wp_Upload_Type();
	$plugin->run();

}
run_restrict_wp_upload_type();

/**
 * Settings link.
 *
 * @param string $links - Current File name.
 * @since 1.0.0
 */
function rwut_settings_link( $links ) {
	$settings_link = '<a href="admin.php?page=restrict_file_type">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}
$plugin_name = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin_name", 'rwut_settings_link' );

/**
 * Get meta key value without post id.
 *
 * @param string $meta_key - Metakey.
 * @param string $limit - Limit.
 *
 * @since 1.0.3
 */
function rwut_get_meta_value_by_key( $meta_key, $limit = 1 ) {
	global $wpdb;
	if ( 1 === $limit ) {
		return $wpdb->get_var( $wpdb->prepare( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s LIMIT 1", $meta_key ) );
	} else {
		return $wpdb->get_results( $wpdb->prepare( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s LIMIT %d", $meta_key, $limit ) );
	}
}
