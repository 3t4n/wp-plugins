<?php
// Documentation Page Function
add_action('admin_menu', 'alwp_create_menu');

function alwp_create_menu() {

	// Creating Menu
	add_menu_page('Author Widget Documentation', 'AW Doc', 'administrator', alwpdoc, 'alwp', plugins_url('/help/icon.png', __FILE__) );

	// Call Registering Documentation Function
	add_action( 'admin_init', 'register_alwpdocs' );
}


function register_alwpdocs() {
	// Registering Documentation
	register_setting( 'alwp-doc', 'alwp_doc' );
}

include 'help/index.php';
