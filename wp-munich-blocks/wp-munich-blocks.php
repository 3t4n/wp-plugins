<?php
/**
 * The main file of the WP Munich Blocks - Gutenberg Blocks for WordPress plugin
 *
 * @package wpm_blocks
 * @version 0.12.2
 *
 * Plugin Name: WP Munich Blocks - Gutenberg Blocks for WordPress
 * Plugin URI: https://blocks.wp-munich.com/?utm_source=wporg&utm_medium=plugin_repo&utm_campaign=wp-munich-block&utm_content=pluginUrl
 * Description: Create amazing content with the new WordPress block editor and the WP Munich blocks.
 * Author: WP Munich
 * Author URI: https://www.wp-munich.com/?utm_source=wporg&utm_medium=plugin_repo&utm_campaign=wp-munich-block&utm_content=authorUrl
 * Version: 0.12.2
 * Text Domain: wp-munich-blocks
 *
 * @fs_premium_only /blocks-professional/, /blocks-enterprise/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPM_BLOCKS_URL', plugin_dir_url( __FILE__ ) );
define( 'WPM_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_wpm_blocks() {

}
register_activation_hook( __FILE__, 'activate_wpm_blocks' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_wpm_blocks() {

}
register_deactivation_hook( __FILE__, 'deactivate_wpm_blocks' );

/**
 * Global helper functions.
 */
require plugin_dir_path( __FILE__ ) . 'inc/class-names.php';
require plugin_dir_path( __FILE__ ) . 'inc/locate-template.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'inc/class-wpm-blocks.php';
require plugin_dir_path( __FILE__ ) . 'inc/class-wpm-image-filter.php';
require plugin_dir_path( __FILE__ ) . 'inc/class-wpm-footer-styles.php';
require plugin_dir_path( __FILE__ ) . 'theme-compatibility/class-wpm-theme-compatibility.php';

/**
 * Start the plugin functions.
 */
$globals['wpm_blocks']              = WPM_Blocks::get_instance();
$globals['wpm_image_filter']        = WPM_Image_Filter::get_instance();
$globals['wpm_theme_compatibility'] = WPM_Theme_Compatibility::get_instance();
$globals['wpm_footer_styles']       = WPM_Footer_Styles::get_instance();
