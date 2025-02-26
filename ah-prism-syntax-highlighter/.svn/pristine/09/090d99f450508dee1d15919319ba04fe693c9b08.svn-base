<?php
/**
 *Plugin Name: AH Code Highlighter
 * Plugin URI: https://andreas-hecht.com/prism-syntax-highlighter/
 * Description: The easiest to use code highlighting ever. Choose between 8 different color themes to highlight your code snippets.
 * Version: 2.0.5
 * Author: Andreas Hecht
 * Author URI: https://andreas-hecht.com
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Load Functions
 * 
 * @since 2.0.0
 */
require_once( 'ah-prism-syntax-highlighter.php' );


/**
 * Load Options Page
 * 
 * @since 2.0.0
 */
require_once( 'prism-admin-settings.php' );


/**
 * Load Functions CSS Files
 * 
 * @since 2.0.0
 */
require_once( 'inc/prism-functions.php' );


/**
 * Add plugin action links.
 *
 * Add a link to the settings page on the plugins.php page.
 *
 * @since 2.0.0
 *
 * @param  array  $links List of existing plugin action links.
 * @return array         List of modified plugin action links.
 */
function prism_plugin_action_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/options-general.php?page=prism' ) ) . '">' . __( 'Settings', 'textdomain' ) . '</a>'
	), $links );

	return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'prism_plugin_action_links' );
