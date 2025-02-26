<?php   
    /* 
    Plugin Name: Advance Login Style
	Plugin URI: https://pluginsbazaar.com/ 
    Description: Advance Login Style can fully customize your WordPress Login, Register page.
	Author: pluginsbazaar.com 
    Version: 1.2 
	Short Name: advance_login_style
    Author URI: https://pluginsbazaar.com/
	Requires at least: 3.2
	Tested up to: 3.9.1
	Stable tag: 1.2
	Text Domain: advance-login-style
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
    */  
	 
// exit if add_action or plugins_url functions do not exist
if (!function_exists('add_action') || !function_exists('plugins_url')) exit;	

// function to replace wp_die if it doesn't exist
if (!function_exists('wp_die')) : function wp_die ($message = 'wp_die') { die($message); } endif;

// define some definitions if they already are not
!defined('WP_CONTENT_DIR') && define('WP_CONTENT_DIR', ABSPATH . 'wp-content');

!defined('WP_PLUGIN_DIR') && define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');

!defined('WP_CONTENT_URL') && define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');

!defined('WP_PLUGIN_URL') && define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');

if ( !defined( 'advance_login_style_URL' ) )
	define( 'advance_login_style_URL', plugin_dir_url( __FILE__ ) );
	
if ( !defined( 'advance_login_style_PATH' ) )
	define( 'advance_login_style_PATH', plugin_dir_path( __FILE__ ) );
	
if ( !defined( 'advance_login_style_BASENAME' ) )
	define( 'advance_login_style_BASENAME', plugin_basename( __FILE__ ) );
	
if ( !defined( 'advance_login_style_VERSION' ) )
	define( 'advance_login_style_VERSION', '1.2' );
	
function advance_login_style_load_textdomain() {
	load_plugin_textdomain( 'advance-login-style', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_filter( 'init', 'advance_login_style_load_textdomain',1 );	

// don't load directly
!defined('ABSPATH') && exit;
if ( version_compare( PHP_VERSION, '5.2', '<' ) ) {
	if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
		require_once ABSPATH . '/wp-admin/includes/plugin.php';
		deactivate_plugins( __FILE__ );
		wp_die( sprintf( __( 'Advanced Login Style requires PHP 5.2 or higher, as does WordPress 3.2 and higher. The plugin has now disabled itself. For more info, %s$1see this post%s$2.', 'advance-login-style' ), '<a href="https://github.com/pluginsbazaar/advance-login-style/">', '</a>' ) );
	} else {
		return;
	}
}
	
$pluginurl = plugin_dir_url( __FILE__ );

if ( preg_match( '/^https/', $pluginurl ) && !preg_match( '/^https/', get_bloginfo( 'url' ) ) )
	$pluginurl = preg_replace( '/^https/', 'http', $pluginurl );
	
define( 'advance_login_style_FRONT_URL', $pluginurl );
unset( $pluginurl );

/** 
* @desc function to include desired files in admin
* @param plugins_loaded action 
* @return none
*/  
function advance_login_style_admin_init() {

	require advance_login_style_PATH . 'admin/advance_login_style-admin.php';

	global $pagenow;
	
	if ( in_array( $pagenow, array( 'admin.php' ) ) )
		require advance_login_style_PATH . 'admin/advance_login_style-config.php';
}


if ( !defined( 'DOING_AJAX' ) || !DOING_AJAX )
	require advance_login_style_PATH . 'advance_login_style-inc/advance_login_style-non-ajax-functions.php';
	
require advance_login_style_PATH . 'advance_login_style-inc/advance_login_style-functions.php';


if ( is_admin() ) {

	add_action( 'plugins_loaded', 'advance_login_style_admin_init', 1 );

	
	register_activation_hook( __FILE__, 'advance_login_style_activate' );
	
	register_deactivation_hook( __FILE__, 'advance_login_style_deactivate' );
}
else 
{
	//front end
	require advance_login_style_PATH. 'advance_login_style-frontend/advance_login_style-front.php';
}
unset( $options );
