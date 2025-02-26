<?php
/**
 * Plugin Name: ArtiJigoNoSidebar
 * Plugin URI: http://webolution.co.za/arti-jigo-no-sidebar-free-wordpress-plugin/
 * Description: Remove sidebar from JigoShop WordPress websites Shop page that uses Artisteer theme
 * Author: CP Brand
 * Author URI: http://webolution.co.za
 * Version: 1.1 
 */
add_action('init','arti_jigo_nosidebar_init');
function arti_jigo_nosidebar_init() {
	remove_action('jigoshop_sidebar', 'jigoshop_get_sidebar', 10);
}
?>