<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/noruzzamanrubel
 * @since             1.0.0
 * @package           Cdsfw_Current_Date
 *
 * @wordpress-plugin
 * Plugin Name:       Current Date Shortcode For WordPess
 * Plugin URI:        https://wordpress.org/plugins/current-date
 * Description:       Easily display the current date anywhere using a simple shortcode, Gutenberg block, Elementor addon
 * Version:           1.0.2
 * Author:            Noruzzaman
 * Author URI:        https://github.com/noruzzamans
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       current-date
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
define( 'CDSFW_CURRENT_DATE_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cdsfw-current-date-activator.php
 */
function cdsfw_current_date_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cdsfw-current-date-activator.php';
	Cdsfw_Current_Date_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cdsfw-current-date-deactivator.php
 */
function cdsfw_current_date_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cdsfw-current-date-deactivator.php';
	Cdsfw_Current_Date_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'cdsfw_current_date_activate' );
register_deactivation_hook( __FILE__, 'cdsfw_current_date_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cdsfw-current-date.php';
require_once plugin_dir_path( __FILE__ ) . 'elementor-addons/cdsfw-current-date-register-widget.php';


function cdsfw_current_date_register_block() {
    register_block_type( __DIR__ . '/build', array(
        'render_callback' => 'cdsfw_current_date_dynamic_render_callback',
    ) );
}
add_action( 'init', 'cdsfw_current_date_register_block' );

function cdsfw_current_date_dynamic_render_callback( $attributes, $content ) {
    $fontFamily = isset($attributes['fontFamily']) ? $attributes['fontFamily'] : '';
    if (!empty($fontFamily)) {
        $fontFamilies = explode(',', $fontFamily);
        foreach ($fontFamilies as $font) {
            $encodedFontFamily = urlencode(trim($font));
            $googleFontUrl = "https://fonts.googleapis.com/css?family=$encodedFontFamily";
            wp_enqueue_style('smart-heading-google-font-' . sanitize_title($font), $googleFontUrl);
        }
    }

    return $content;
}


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function cdsfw_current_date_run() {

	$plugin = new Cdsfw_Current_Date();
	$plugin->run();

}
cdsfw_current_date_run();
