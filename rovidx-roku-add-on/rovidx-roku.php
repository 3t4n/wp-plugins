<?php
/**
* Plugin Name: RoVidX Roku VOD Lite
* Plugin URI: http://rovidx.com/roku
* Description: Output XML feeds for Roku SDK's Video Player Example.
* Version: 2.0.3.1
* Author: RoVidX Media Solutions
* Author URI: http://RoVidX.com/
* Plugin URI: http://rovidx.com/rokulite/
* License: GPL2
**/

if ( !defined( 'WPINC' ) ) {
    die;
}

if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-rovidx-roku-admin.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-rovidx-roku-admin-func.php' );
}

require_once( plugin_dir_path( __FILE__ ) . 'public/class-rovidx-roku-generator.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-rovidx-roku-arrays.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-rovidx-roku-functions.php' );

$roOptions = get_option('rovidx_settings_roku');