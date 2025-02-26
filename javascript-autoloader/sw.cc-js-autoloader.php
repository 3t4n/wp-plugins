<?php

/**
 * The JavaScript AutoLoader Plugin
 *
 * JavaScript AutoLoader allows you to load additional JS files without the need to change the theme
 *
 * @wordpress-plugin
 * Plugin Name: Smart JavaScript Auto Loader
 * Plugin URI: https://wordpress.org/plugins/javascript-autoloader/
 * Description: This Plugin allows you to load additional JavaScript files without the need to change files in the Theme directory. To load additional JavaScript files just put them into a directory named jsautoload.
 * Version: 5.0.3
 * Author: Peter Raschendorfer
 * Author URI: https://profiles.wordpress.org/petersplugins/
 * Text Domain: javascript-autoloader
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Loader
 */
require_once( plugin_dir_path( __FILE__ ) . '/loader.php' );

?>