<?php

add_action( 'admin_enqueue_scripts', 'gofi_admin_js_loader' );
function gofi_admin_js_loader() {
	global $gofi_options;
	if ( !( isset( $gofi_options["gofi_only_php"]	) ) ) {
		wp_register_script( 'gofi-admin-js', plugins_url('/G-Оbligatory-Featured-Image/js/gofi_error_msg.js'), array('jquery'));
		wp_enqueue_script( 'gofi-admin-js' );
	}
}
?>
