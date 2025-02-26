<?php

/**
 *
 * @link              https://cncwebsolutions.com
 * @since             1.0.0
 * @package           Cnc_Image_Alt_Tags
 *
 * @wordpress-plugin
 * Plugin Name:       Alt Tags for Images
 * Plugin URI:        https://cncwebsolutions.com/plugins/image-alt-tags-for-wordpress
 * Description:       This adds the post title to any images that do not have alt tags. Allowing all images to have alt tags.
 * Version:           1.0.0
 * Author:            CNC Web Solutions
 * Author URI:        https://cncwebsolutions.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cnc-image-alt-tags
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cnc-image-alt-tags-activator.php
 */
function activate_cnc_image_alt_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cnc-image-alt-tags-activator.php';
	Cnc_Image_Alt_Tags_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cnc-image-alt-tags-deactivator.php
 */
function deactivate_cnc_image_alt_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cnc-image-alt-tags-deactivator.php';
	Cnc_Image_Alt_Tags_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cnc_image_alt_tags' );
register_deactivation_hook( __FILE__, 'deactivate_cnc_image_alt_tags' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cnc-image-alt-tags.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cnc_image_alt_tags() {

	$plugin = new Cnc_Image_Alt_Tags();
	$plugin->run();

}
run_cnc_image_alt_tags();
