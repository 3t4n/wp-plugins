<?php

add_action( 'admin_menu', 'vkrwps_register_menu_page' );
function vkrwps_register_menu_page(){
    add_menu_page( 'Real WP Shop Lite', 'Real WP Shop Lite', 'manage_options', 'real-wp-shop-lite/rwps-admin-home.php', '', plugins_url( 'real-wp-shop-lite/rwp.jpg' ), 1000);
}

add_action('admin_menu', 'vkrwps_categories');
function vkrwps_categories() {
	add_submenu_page( 'real-wp-shop-lite/rwps-admin-home.php', 'Categories', 'Categories', 'manage_options', 'vkrwps_categories', 'vkrwps_categories_callback' ); 
} 

require 'pc/categories_pc.php';


add_action('admin_menu', 'vkrwps_add_products');
function vkrwps_add_products() {
	add_submenu_page( 'real-wp-shop-lite/rwps-admin-home.php', 'Add Products', 'Add Products', 'manage_options', 'vkrwps_add_products', 'vkrwps_add_products_callback' ); 
} 

require 'pc/add_products_pc.php';

add_action('admin_menu', 'vkrwps_edit_products');
function vkrwps_edit_products() {
	add_submenu_page( 'real-wp-shop-lite/rwps-admin-home.php', 'Edit Products', 'Edit Products', 'manage_options', 'vkrwps_edit_products', 'vkrwps_edit_products_callback' ); 
} 

require 'pc/edit_products_pc.php';

add_action('admin_menu', 'vkrwps_delete_products');
function vkrwps_delete_products() {
	add_submenu_page( 'real-wp-shop-lite/rwps-admin-home.php', 'Delete Products', 'Delete Products', 'manage_options', 'vkrwps_delete_products', 'vkrwps_delete_products_callback' ); 
} 

require 'pc/delete_products_pc.php';

add_action('admin_menu', 'vkrwps_payment_options');
function vkrwps_payment_options() {
	add_submenu_page( 'real-wp-shop-lite/rwps-admin-home.php', 'Payment Options', 'Payment Options', 'manage_options', 'vkrwps_payment_options', 'vkrwps_payment_options_callback' ); 
} 

require 'pc/payment_options_pc.php';

add_action('admin_menu', 'vkrwps_strings');
function vkrwps_strings() {
	add_submenu_page( 'real-wp-shop-lite/rwps-admin-home.php', 'Strings', 'Strings', 'manage_options', 'vkrwps_strings', 'vkrwps_strings_callback' ); 
} 

require 'pc/strings_pc.php';

add_action('admin_menu', 'vkrwps_orders');
function vkrwps_orders() {
    add_submenu_page( 'real-wp-shop-lite/rwps-admin-home.php', 'Orders', 'Orders', 'manage_options', 'vkrwps_orders', 'vkrwps_orders_callback' ); 
} 

require 'pc/orders_pc.php';


?>