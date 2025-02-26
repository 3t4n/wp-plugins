<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
foreach ( $_POST[ 'appts_settings' ] as $key => $val ) {
    if ( $key == 'disable_font' ) {
        $$key = $val;
    } else {
        $$key = sanitize_text_field( $val );
    }
}

$plugin_settings = array();
$plugin_settings[ 'disable_font' ] = isset( $disable_font ) ? $disable_font : array();

update_option( 'appts_settings', $plugin_settings );
wp_redirect( admin_url( 'admin.php?page=ap-pricing-tables-lite-settings&message=1' ) );
die();
