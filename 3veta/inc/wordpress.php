<?php

/**
 * Register textdomain.
 */
function veta_load_textdomain() {
	load_plugin_textdomain( '3veta', false, VETA_ABS_PATH . veta_platform_slashes( '/languages' ) );
}

add_action( 'plugins_loaded', 'veta_load_textdomain' );

/**
 * Register style sheet and scripts for the admin area.
 */
function veta_admin_styles_script() {

	$admin_base = get_current_screen();
	if ( $admin_base !== null && $admin_base->base !== 'toplevel_page_3veta' ) {
		return;
	}

	wp_enqueue_script(
		'veta-admin-js',
		VETA_REL_URL . veta_platform_slashes( '/assets/js/3veta-admin.js' ),
		'',
		filemtime( VETA_ABS_PATH . veta_platform_slashes( '/assets/js/3veta-admin.js' ) ),
		true
	);

	wp_enqueue_style(
		'veta-admin-css',
		VETA_REL_URL . veta_platform_slashes( '/assets/css/3veta-admin.css' ),
		'',
		filemtime( VETA_ABS_PATH . veta_platform_slashes( '/assets/css/3veta-admin.css' ) )
	);

	//Adding localization for script string
	$translation_array = array(
		'clipboard_success' => __( 'Copied to Clipboard.', '3veta' ),
		'clipboard_failed'  => __( 'Copying failed. Please try again.', '3veta' ),
		'missing_domain'    => __( 'Please enter a valid booking page URL.', '3veta' ),
		'empty_domain'      => __( 'Please fill your 3veta booking page URL.', '3veta' ),
		'ajax_url'          => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script( 'veta-admin-js', 'veta_l10n', $translation_array );
}

add_action( 'admin_enqueue_scripts', 'veta_admin_styles_script' );
