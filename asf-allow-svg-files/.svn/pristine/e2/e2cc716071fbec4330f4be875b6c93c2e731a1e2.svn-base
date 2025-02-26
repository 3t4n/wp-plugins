<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.topinfosoft.com/contact
 * @since             1.1
 * @package           Asfwp_Allow_Svg_Files
 *
 * @wordpress-plugin
 * Plugin Name:       Allow SVG files
 * Plugin URI:        http://www.topinfosoft.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.1
 * Author:            Ravi S
 * Author URI:        http://www.topinfosoft.com/contact
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       asfwp-allow-svg-files
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ASFWP_ALLOW_SVG_FILES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-asfwp-allow-svg-files-activator.php
 */
function activate_asfwp_allow_svg_files() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-asfwp-allow-svg-files-activator.php';
	Asfwp_Allow_Svg_Files_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-asfwp-allow-svg-files-deactivator.php
 */
function deactivate_asfwp_allow_svg_files() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-asfwp-allow-svg-files-deactivator.php';
	Asfwp_Allow_Svg_Files_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_asfwp_allow_svg_files' );
register_deactivation_hook( __FILE__, 'deactivate_asfwp_allow_svg_files' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-asfwp-allow-svg-files.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_asfwp_allow_svg_files() {

	$plugin = new Asfwp_Allow_Svg_Files();
	$plugin->run();

}
run_asfwp_allow_svg_files();


// function asfwp_cc_mime_types($mimes) {
//   define('ALLOW_UNFILTERED_UPLOADS', true);
//   $mimes['svg'] = 'image/svg+xml';
//   $mimes['svgz'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter('upload_mimes', 'asfwp_cc_mime_types');

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '5.9' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function asfwp_cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'asfwp_cc_mime_types' );

function asfwp_fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'asfwp_fix_svg' );