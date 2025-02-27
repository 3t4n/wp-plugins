<?php // WP Category Sort - Admin Menu



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}


// add sub-level administrative menu
function wpCatSort_add_sublevel_menu() {
	
	
	add_submenu_page(
		'edit.php',
		esc_html__('Category Order', 'wpCatSort'),
		esc_html__('Category Order', 'wpCatSort'),
		'manage_options',
		'wpCatSort',
		'wpCatSort_interface_page'
	);
	
}
add_action( 'admin_menu', 'wpCatSort_add_sublevel_menu' );