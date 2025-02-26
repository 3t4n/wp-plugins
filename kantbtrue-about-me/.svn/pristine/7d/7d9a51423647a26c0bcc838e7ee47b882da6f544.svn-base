<?php
/**
 * Enqueue plugin scripts
 *
 * @since 1.0
 */

function KBTAM_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'KBTAM-admin', KBTAM_PLUGIN_URL . 'admin/js/main.js', 'jquery', KBTAM_VERSION, true );
	wp_localize_script(
		'KBTAM-admin',
		'KBTAM_admin_vars',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'KBTAM_nonce' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'KBTAM_admin_scripts' );
