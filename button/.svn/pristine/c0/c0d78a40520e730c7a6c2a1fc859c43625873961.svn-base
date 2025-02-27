<?php 
/*
Plugin Name: Button
Plugin URI: http://webdzier.com
Description: WordPress button generator plugin.You can create any type of button. <a href="http://webdzier.com">Get Pro version</a>. Button is a powerful plugin.
Version: 1.1.30
Requires at least: 4.8
Requires PHP: 5.6
Author: webdzier
Author URI: http://webdzier.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: button 	
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;
define("BUTTON_URL", plugin_dir_url(__FILE__));
define('BUTTON_PATH',plugin_dir_path(__FILE__));

// default
require_once( BUTTON_PATH.'inc/defaults/default-setting.php' );

// enqueue
require_once( BUTTON_PATH.'inc/enqueue.php');

// extra
require_once( BUTTON_PATH.'inc/extra.php');

// plugin loaded
add_action( 'plugins_loaded', 'button_current_user');
function button_current_user(){
	if ( current_user_can( 'administrator' ) ) {
		if(is_admin()){	
			require( BUTTON_PATH.'inc/cpt/button-cpt.php' );	
			require_once(BUTTON_PATH.'inc/duplicate.php');
		}	
	}	
}

// widget
require_once(BUTTON_PATH.'inc/widget.php');

// shortcode
require_once(BUTTON_PATH.'inc/shortcode.php');