<?php
/*
Plugin Name: Remove Links Page
Plugin URI: mailto: karev.n@gmail.com
Description: Removes "Links" admin section
Version: 1.0.1
Author: Nikolay Karev
Author URI: mailto: karev.n@gmail.com
*/

add_action( 'admin_init', 'rlp_remove_menu_pages' );

function rlp_remove_menu_pages() {
	global $menu;
	if ($menu){
		remove_menu_page('link-manager.php');
		remove_menu_page('tools.php');	
	}
}