<?php
//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit ();

    global $wpdb;
    $lsp_tbl_prefix = $wpdb->prefix;
	
## Delete Slick Logo Slider Plugin Settings from Options Table
    delete_option( 'sls_title_slider' );
    delete_option( 'sls_logo_table_version' );
	delete_option( 'sls_settings' );
	delete_option( 'sls_slides_to_show' );
	delete_option( 'sls_slides_to_scroll' );
	delete_option( 'sls_autoplay' );
	delete_option( 'sls_autoplay_speed' );
	delete_option( 'sls_arrows' );
	delete_option( 'sls_dots' );
	delete_option( 'sls_pause_on_hover' );

## Drop `sls_images` Tables
    $wpdb->query("Drop Table ".$lsp_tbl_prefix."sls_images");

?>