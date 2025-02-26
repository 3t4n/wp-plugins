<?php
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

function brozzme_material_loading_plugin_uninstall(){
    $option_names =  array(
        'b_material_general_settings'
    );
    foreach($option_names as $option_name) {

        delete_option($option_name);

    }
}
