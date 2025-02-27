<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
    die();
}

function wpbiztextbtn_delete_plugin(){
    global $wpdb;

    delete_option('wpbiztext-button');
    delete_option('biztext_custom_role');
    
    if(get_option( 'biztext_custom_role_contact' ) != 1) {
        
        remove_role('biztext_admin');
    
    }
    
}

wpbiztextbtn_delete_plugin();
?>