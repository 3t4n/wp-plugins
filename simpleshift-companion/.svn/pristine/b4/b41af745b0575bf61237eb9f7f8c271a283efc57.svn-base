<?php
/*
Plugin Name: SimpleShift Companion
Plugin URI: http://themeshift.com/free/simpleshift/#plugin
Description: Add many additional features and settings to the SimpleShift theme.
Version: 1.0.0
Author: ThemeShift
Author URI: http://themeshift.com/
Text Domain: simpleshift-companion
Domain Path: /languages
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// load text domain

add_action( 'plugins_loaded', 'simpleshift_companion_load_textdomain' );
function simpleshift_companion_load_textdomain() {
	load_plugin_textdomain( 'simpleshift-companion', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

$simpleshift_companion_check_theme = wp_get_theme();
if ( ('SimpleShift' != $simpleshift_companion_check_theme->name) && ('SimpleShift' != $simpleshift_companion_check_theme->parent_theme) ) {
	add_action( 'admin_notices', 'simpleshift_companion_no_theme' );
	function simpleshift_companion_no_theme() {
	    ?>
	    <div class="notice notice-error is-dismissible">
	        <p><?php _e( 'The SimpleShift Companion plugin provides additional features to the SimpleShift WordPress theme. You currently do not have the SimpleShift theme installed and so will not benifit from this plugin. Please install and activate SimpleShift or deactivate this plugin. ', 'simpleshift-companion' ); ?></p>
	    </div>
	    <?php
	}
} else {
	add_action( 'plugins_loaded', 'simpleshift_companion' );
	function simpleshift_companion() {
		// Include Kirki
		include_once( get_template_directory() . '/inc/kirki/kirki.php' );
		// include widgets and options
		include_once( dirname( __FILE__ ) . '/inc/options.php' );
		include_once( dirname( __FILE__ ) . '/inc/widgets.php' );
	}
}