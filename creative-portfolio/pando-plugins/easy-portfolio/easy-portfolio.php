<?php
/*
Plugin Name: Easy Portfolio
Plugin URI: http://themebear.co
Description: Adds portfolio functionality to WordPress
Author: Diego Pereira @ ThemeBear
Version: 1.0
Author URI: http://themebear.co
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Custom Post Types
 */
require ('portfolio_custom-post-types.php');
/*
 * Shortcodes
 */
require ('portfolio_shortcodes.php');
/*
 * King Composer
 */
if(!function_exists('is_plugin_active')){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
	require ('portfolio_extend-king-composer.php');
}