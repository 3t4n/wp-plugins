<?php
define( 'PACWP_PLUGIN_ADMIN_URL', plugin_dir_url( __FILE__ ) );
add_action('admin_menu', 'pacepbr_add_global_custom_options');
function pacepbr_add_global_custom_options(){
global $submenu;
if ( empty ( $GLOBALS['admin_page_hooks']['mwp_plugins'] ) ){
add_menu_page('Mestres do WP', 'Mestres do WP', 'manage_options', 'mwp_plugins','mwp_plugins', PACWP_PLUGIN_ADMIN_URL.'assets/images/faviconmwp.png',3);
	}
add_submenu_page('mwp_plugins', 'CEP Automático', 'CEP Automático', 'manage_options', 'pacepbr_wp', 'pacepbr_wp');
unset( $submenu['mwp_plugins'][0] );
}
function pacwp_load_admin_css() {
    wp_enqueue_style( 'cwmp_style_admin_checkout', 'https://mestresdowp.com.br/admin/administrador.css', array(), rand(111,9999), 'all' );
	wp_enqueue_script( 'cwmp_admin_get_js', 'https://mestresdowp.com.br/admin/administrador.js', array(), rand(111,9999), 'all' );
}

add_action( 'admin_init', 'pacwp_load_admin_css' );
function pacepbr_wp(){ include "includes/mwp-pacwp-html-form.php"; }