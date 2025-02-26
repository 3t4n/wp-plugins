<?php
/**
 * Enqueue and handle assets
 *
 * @since      1.0
 * @package    Best WP SMTP Email
 * @author     TinyPixi
 */

// Admin Assets
function bwpse_enqueue_admin_assets( $hook ) {
	global $mailman_options_page;
	if( $hook != $mailman_options_page ) {
		return;
	}
    wp_enqueue_style( 'plugin-admin-normalize',  plugin_dir_url(dirname(__FILE__)) . 'assets/admin/css/normalize.css' );
    wp_enqueue_style( 'plugin-admin-bootstrap',  plugin_dir_url(dirname(__FILE__)) . 'assets/admin/css/cosmostrap.css' );
    wp_enqueue_style( 'plugin-admin-style',  plugin_dir_url(dirname(__FILE__)) . 'assets/admin/css/plugin-admin-style.css' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'plugin-admin-popper',  plugin_dir_url(dirname(__FILE__)) . 'assets/admin/js/popper.min.js' );
    wp_enqueue_script( 'plugin-admin-bootstrap',  plugin_dir_url(dirname(__FILE__)) . 'assets/admin/js/bootstrap.min.js' );
    wp_enqueue_script( 'plugin-admin-script',  plugin_dir_url(dirname(__FILE__)) . 'assets/admin/js/plugin-admin-script.js' );
}
add_action( 'admin_enqueue_scripts', 'bwpse_enqueue_admin_assets' );
