<?php

add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page() {
	add_menu_page( 'KWM Force Download', 'KWM Force Download', 'manage_options', 'kwm-force-download/admin/view.php', '', '', 81 );
}
?>