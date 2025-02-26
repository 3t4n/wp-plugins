<?php
/**
 * Register Menu element for the 3veta settings page
 */
function veta_register_3veta_menu_element() {

	add_menu_page(
		'3veta Settings',
		'3veta',
		'manage_options',
		'3veta',
		'veta_admin_page_template',
		'none'
	);

}

add_action( 'admin_menu', 'veta_register_3veta_menu_element' );


/**
 * Including the settings template for the admin page
 */
function veta_admin_page_template() {

	return include( VETA_ABS_PATH . veta_platform_slashes( '/inc/templates/admin.php' ) );
}


function veta_menu_icon_style() {
	$icon = VETA_REL_URL . '/assets/images/3veta-icon-small.png';
	echo '<style> #toplevel_page_3veta .wp-menu-image { background-image: url("' . esc_url( $icon ) . '");background-size: cover; } </style>';
}

add_action( 'admin_footer', 'veta_menu_icon_style' );
