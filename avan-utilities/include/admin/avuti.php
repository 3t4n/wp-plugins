<?php
/* Load css & js file in admin panel */
/**************************************/
function avuti_admin_style() {
	$position = is_rtl() ? '-rtl' : '-ltr';
	wp_enqueue_style( 'avuti-topmenu', AVUTI_PLUG_ASSETS .'admin/menu' . $position . '.css', '', null );
	wp_enqueue_style( 'avuti-topmenu-css', AVUTI_PLUG_ASSETS .'admin/style.css', '', null );
}
add_action( 'admin_enqueue_scripts', 'avuti_admin_style' );
