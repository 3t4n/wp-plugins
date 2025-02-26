<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */
	
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

function arty_3dmodelviewer_delete_products_api(){

    $apiOptions = get_option('arty_3dmodelviewer_woocommerce_api');

    $data = [
        'shopIdentity' => get_option( 'siteurl' )
    ];

    $response = wp_remote_post( $apiOptions['baseUrl'] . '/api/products/wc/uninstall', array(
        'body'    => json_encode($data),
        'headers'     => [
            'Content-Type' => 'application/json',
        ]
    ));

}
arty_3dmodelviewer_delete_products_api();

function arty_3dmodelviewer_delete_options(){
    delete_option( 'arty_3dmodelviewer_woocommerce_api');
    delete_option('arty_3dmodelviewer_woocommerce_default_values');
    delete_option( 'arty_3dmodelviewer_woocommerce_default_position');
    delete_option( 'arty_3dmodelviewer_activation_redirect');
}

arty_3dmodelviewer_delete_options();

global $wpdb;
$wpdb->query("DELETE FROM wp_postmeta WHERE meta_key = 'arty_viewer_iframe'");
