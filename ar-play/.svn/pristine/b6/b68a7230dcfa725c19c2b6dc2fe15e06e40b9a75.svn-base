<?php

/**
 * @package  Arplay
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

function deleteOptions(){
    delete_option( 'arplay_app_url');
	delete_option( 'arplay_api_url');
	delete_option( 'arplay_plugin');
    delete_option( 'arplay_woocommerce');
}

deleteOptions();

global $wpdb;
$wpdb->query("DELETE FROM wp_postmeta WHERE meta_key = '_is_arplay_exist'");
$wpdb->query("DELETE FROM wp_postmeta WHERE meta_key = '_product_arplay_path'");