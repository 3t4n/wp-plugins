<?php
/**
 * Plugin Name: Rakam Link Tracking
 * Plugin URI: https://www.rakam.com/plugins/rakam-link-tracking
 * Description: Allows optional URL parameters to be added to all links.
 * Version: 1.0.1
 * Author: Rakam Technology
 * Text Domain: rakam
 * Domain Path: /languages
 * Author URI: https://www.rakam.com/
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package WordPress
 * @author Recep UNCU <recepuncu@gmail.com>
 * @since 1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( is_admin() ) {
	    	
	require_once( dirname( __FILE__ ) . '/includes/class-admin.php' );
	$rakam_link_tracking_admin = new RakamLinkTrackingAdmin();

} else {
	
	require_once( dirname( __FILE__ ) . '/includes/class-public.php' );
	$rakam_link_tracking_public = new RakamLinkTrackingPublic();
	
}

function rakam_load_textdomain() {
    load_plugin_textdomain( 'rakam', FALSE, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'rakam_load_textdomain' );