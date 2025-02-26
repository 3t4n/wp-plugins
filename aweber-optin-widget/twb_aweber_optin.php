<?php
/*
Plugin Name: Simple Aweber Optin Widget - Lite
Plugin URI: http://plugins.theweb-designs.com/simple-aweber-optin-widget/
Description: Custom Widget that adds an aweber optin form on site. You can add an unlimited number of forms using this widget plugin. The form design and look can be easily controlled in the widget settings. Its Responsive , very Easy to Use and comes with Powerful Features. The aweber forms created by this widget plugin are completely responsive and does not load javascripts and css from aweber server.
Author: Abu Bakar
Author URI: http://www.theweb-designs.com
Version: 1.13
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly
if (!defined('ABSPATH')) { 
	echo "Oops! No direct access please :)";
	exit; 
}

// Display PRO purchase notice
add_action('admin_notices', 'twb_admin_notice');
function twb_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'twb_update_notice') ) {
        echo '<div class="updated"><p>'; 
			printf(__('PRO Version of Simple Aweber Optin Widget is also available. <a href="//plugins.theweb-designs.com/simple-aweber-optin-widget/" target="_blank">Click Here to Purchase it and Unlock All features!</a> | <a href="%1$s">Hide Notice</a>'), '?twb_update_notice=0');
        echo "</p></div>";
	}
}

add_action('admin_init', 'twb_update_notice');
function twb_update_notice() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['twb_update_notice']) && '0' == $_GET['twb_update_notice'] ) {
             add_user_meta($user_id, 'twb_update_notice', 'true', true);
	}
}

// Register Frontend styles
if( !function_exists ('twb_aweber_optin_scripts') ) :
	function twb_aweber_optin_scripts() {
		$twb_dir = plugin_dir_url( __FILE__ );
		wp_enqueue_style( 'twb_aweber_css', $twb_dir . 'css/twb_aweber_optin.css', array(), 'false' );
		wp_register_script('jquery-validation', $twb_dir. 'js/jquery.validate.min.js', array('jquery'), 'false', true );
		wp_enqueue_script('jquery-validation');
	}
add_action('wp_enqueue_scripts', 'twb_aweber_optin_scripts');
endif;

// Enqueue Iris Color Picker
	function twb_iris_colorpicker_scripts() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}	
	function twb_iris_colorpicker_styles() {
		wp_enqueue_style( 'wp-color-picker' );
	}
add_action('admin_print_scripts-widgets.php', 'twb_iris_colorpicker_scripts');
add_action('admin_print_styles-widgets.php', 'twb_iris_colorpicker_styles');

// Include Optin Widget
include( plugin_dir_path( __FILE__ ) . 'inc/twb_aweber_widget.php');