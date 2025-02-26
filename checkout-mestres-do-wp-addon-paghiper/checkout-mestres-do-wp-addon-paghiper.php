<?php
/**
Plugin Name: Checkout Mestres do WP Addon PagHiper
Plugin URI: http://www.mestresdowp.com.br/
Description: Personaliza os campos do PagHiper no Checkout Mestres do WP..
Version: 1.0.2
Author: Mestres do WP
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: checkout-mwp-addon-paghiper
 */
 /*
	Copyright 2021  Mestres do WP  (email : contato@mestresdowp.com.br)
*/
define( 'CWMP_PAGHIPER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

function cwmp_addon_paghiper_load_plugin_css() {
	if(is_checkout()){
	wp_enqueue_style('cwpm_addon_paghiper_css_style', CWMP_PAGHIPER_PLUGIN_URL . '/assets/css/style.css', array(), '0.1.0', 'all');
	}
}
add_action( 'wp_footer', 'cwmp_addon_paghiper_load_plugin_css');