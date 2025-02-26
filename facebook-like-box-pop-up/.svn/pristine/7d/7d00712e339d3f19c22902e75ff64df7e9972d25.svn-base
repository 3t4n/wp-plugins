<?php
/*
Plugin Name: Facebook Like Box
Plugin URI: http://wpressgg.com/
Description: Facebook like box (facebook page plugin) is wordpress plugin that allows you to include facebook page plugin anywhere on website. Available shortcodes for fixed and pop up versions, widget and default pop up.
Version: 1.4
Author: WPressGG
Author URI: http://wpressgg.com/
License:     GPLv2 or later.
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'flbpp_DIR', plugin_dir_path(__FILE__) );
define( 'flbpp_DIR_CLASSES', flbpp_DIR."classes/" );

require_once flbpp_DIR_CLASSES."class_Admin.php";
require_once flbpp_DIR_CLASSES."class_User.php";
require_once flbpp_DIR_CLASSES."class_Widget.php";
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

register_activation_hook( __FILE__, array( 'FacebookLikeBoxPopUpAdmin', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'FacebookLikeBoxPopUpAdmin', 'plugin_deactivation' ) );

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( 'FacebookLikeBoxPopUpAdmin', 'flbpp_settings_link' ) );

if( is_admin() ) {
	new FacebookLikeBoxPopUpAdmin();
}

new FacebookLikeBoxPopUp();

if (is_plugin_active("facebook-like-box-pop-up/facebook-like-box-pop-up.php")) {
	// register Foo_Widget widget
	function facebook_like_box_pop_up_widget () {
		register_widget( 'FacebookLikeBoxPopUpWidget' );
	}
	add_action( 'widgets_init', 'facebook_like_box_pop_up_widget' );
}
