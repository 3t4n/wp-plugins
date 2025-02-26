<?php

function chkr_admin_enqueue_scripts() {
    global $chkr_plugin_url;

    wp_enqueue_style(
        'chkr-adm-font-awesome',
        $chkr_plugin_url . 'lib/font-awesome/css/font-awesome.min.css'
    );

    wp_enqueue_style( 'chkr-style', $chkr_plugin_url. 'build/style-index.css' );
    wp_enqueue_script( 'chkr-script', $chkr_plugin_url . 'build/index.js', array( 'wp-element' ), '1.0.0', true );

    wp_enqueue_script(
        'chkr-fa-script',
        $chkr_plugin_url . 'lib/font-awesome/js/fontawesome.min.js',
        array('jquery')
    );

    wp_localize_script('chkr-script', 'wpApiSettings', array(
        'root' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}

function chkr_checklist_manager_callback() {

    chkr_admin_enqueue_scripts();

    if(!get_option('chkr_tasks_order')) {
        update_option('chkr_tasks_order', array());
    }
    if(!get_option('chkr_completed_tasks')) {
        update_option('chkr_completed_tasks', array());
    }
    
    ?>
    <div id="chkr-checklist-manager"></div>
    <div id="chkr-popup-wrapper"></div>
    
    <?php
}

?>