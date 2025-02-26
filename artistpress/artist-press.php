<?php
/**
* Plugin Name: ArtistPress
* Plugin URI: http://artispress-plugin.com
* Description: ArtistPress provides a easy to use solution for bands, solo musicians and professional artists to convert WordPress into a robust tool to manage a professional online presence.
* Author: Tim Scheman
* Author URI: http;//timscheman.com
* Version: 1.5.2
* License: GPLv2  //look into this to make sure you have ther right license listed.
*
*/

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Currently plugin version.
 */
define('ARTISTPRESS_VERSION', '1.5.2' );
define('ARTISTPRESS_DIR_PATH', plugin_dir_path(__FILE__));
define('ARTISTPRESS_DIR_URL', plugin_dir_url(__DIR__) . 'artistpress');


/**
 * The core plugin class used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require ARTISTPRESS_DIR_PATH . 'Includes/ArtistPress.php';


/**
 * Begins execution of the plugin.
 * @since    1.5.0
 */
function runArtistpress() {
	$plugin = new ArtistPress\Includes\ArtistPress();
	$plugin->run();
}
runArtistpress();


/* 
 * ==================================================
 *
 * ArtistPress Public Views
 *
 * ================================================== 
 */

/**
 * Includes the functions for the ArtistPress artists.
 */
require_once (plugin_dir_path(__FILE__) . 'public/includes/artist-press-artist-functions.php');

/**
 * Includes the functions for the ArtistPress galleries.
 */
require_once (plugin_dir_path(__FILE__) . 'public/includes/artist-press-gallery-functions.php');

/**
 * Includes the functions for the ArtistPress shows.
 */
require_once (plugin_dir_path(__FILE__) . 'public/includes/artist-press-events-functions.php');

/**
 * Includes the ArtistPress templates.
 */
require_once (plugin_dir_path(__FILE__) . 'public/views/artist-press-templates.php');

/**
 * Includes the ArtistPress templates.
 */
require_once (plugin_dir_path(__FILE__) . 'public/views/artist-press-templates.php');

/**
 * Includes the ArtistPress shortcodes.
 */
require_once (plugin_dir_path(__FILE__) . 'public/views/artist-press-shortcodes.php');


/**
 * Enqueues the public scripts and styles.
 *
 * @since 1.0.0
 *
 */
function artistpress_register_public_scripts() {

    /**
 	 * Includes the scripts and styles for the galleries
 	 */
    require_once (plugin_dir_path(__FILE__) . 'public/includes/artist-press-artist-scripts.php');

	/**
 	 * Includes the scripts and styles for the galleries
 	 */
    require_once (plugin_dir_path(__FILE__) . 'public/includes/artist-press-gallery-scripts.php');
    
    /**
 	 * Includes the scripts and styles for the shows
 	 */
    require_once (plugin_dir_path(__FILE__) . 'public/includes/artist-press-events-scripts.php');

}
add_action( 'wp_enqueue_scripts', 'artistpress_register_public_scripts' );


/**
 * ArtistPress Activation
 *
 * @since 1.0.0
 *
 */
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'artistPress_flush_rewrites' );

function artistPress_flush_rewrites() {
	flush_rewrite_rules();
}
