<?php // Flipdish Ordering - Admin Menu

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}


// Add top-level administrative menu
function flipdish_add_toplevel_menu() {
	/*
		add_menu_page(
			string   $page_title,
			string   $menu_title,
			string   $capability,
			string   $menu_slug,
			callable $function = '',
			string   $icon_url = '',
			int      $position = null
		)
	*/

	add_menu_page(
		'Flipdish - Restaurant Ordering System',
		'Flipdish',
		'manage_options',
		'flipdish-ordering',
		'flipdish_ordering_display_settings_page',
		plugin_dir_url( __FILE__ ) . 'images/flipdish_icon_small.png',
		20
	);

	add_submenu_page(
		'flipdish-ordering',
		'Preview Ordering System',
		'Preview',
		'manage_options',
		'Preview',
		'flipdish_ordering_display_preview_page',
		2
	);

	add_submenu_page(
		'flipdish-ordering',
		'System Info',
		'System Info',
		'manage_options',
		'flipdish-system-info',
		'flipdish_ordering_system_info_page',
		2
	);
}
add_action( 'admin_menu', 'flipdish_add_toplevel_menu' );


/**
 * Enqueue CSS & JS file on admin page
 *
 * Only loads on admin page with url 'flipdish-ordering'
 */
function flipdish_custom_admin_styles_scripts() {
	if ( isset( $_GET['page'] ) && ( 'flipdish-ordering' === $_GET['page'] || 'flipdish-system-info' === $_GET['page'] ) ) {

		wp_enqueue_script( 'flipdish_admin_page', plugin_dir_url( __FILE__ ) . 'js/flipdish-ordering-admin-script.js' );
		wp_enqueue_style( 'flipdish_admin_page', plugin_dir_url( __FILE__ ) . 'css/flipdish-ordering-admin-style.css' );

	}

	return;
}
add_action( 'admin_enqueue_scripts', 'flipdish_custom_admin_styles_scripts' );
