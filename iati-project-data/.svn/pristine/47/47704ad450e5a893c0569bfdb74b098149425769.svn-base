<?php
function iati_plugin_deactivation(){
    
    global $wpdb;

    $wpdb->query( "DROP TABLE `" . $wpdb->prefix . "iati_project_data`" );
    $wpdb->query( "DROP TABLE `" . $wpdb->prefix . "iati_codes`" );
    delete_option( 'iati_project_opts' );
}