<?php
/*
Plugin Name: Content-Grid
Plugin URI: http://wordpress.org/plugins/content-grid/
Description: Plugin adds 6 content zones and visual content-grid structure builder for pages.
Version: 1.1
Author: webvitaly
Text Domain: content-grid
Author URI: http://web-profile.net/wordpress/plugins/
License: GPLv3
*/

define('CONTENT_GRID_PLUGIN_VERSION', '1.1');


$content_grid_settings = array(
	'content_rows' => 3,
	'content_areas' => 7 // starting from #2, because main content treated as #1
);


include('content-grid-admin.php');
include('content-grid-frontend.php');


function content_grid_i18n() { // internationalization
	load_plugin_textdomain( 'content-grid', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ). 'languages' );
}
add_action( 'plugins_loaded', 'content_grid_i18n' );


function content_grid_row_meta( $links, $file ) { // add links to plugin meta row
	if ( strpos( $file, 'content-grid/content-grid.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="http://web-profile.net/wordpress/plugins/content-grid/" target="_blank">'.__( 'Content-Grid', 'content-grid' ).'</a>' ) );
		$links = array_merge( $links, array( '<a href="http://web-profile.net/donate/" target="_blank">'.__( 'Donate', 'content-grid' ).'</a>' ) );
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'content_grid_row_meta', 10, 2 );
