<?php
function meet_admin_style(){
    wp_enqueue_style(
        'wp-admin',
        plugins_url(__FILE__).' admin/css/wpadmin-style.css',
        [],
        time()
    );
}
add_action('admin_enqueue_scripts','meet_admin_style');
function meet_frontend_style(){
    wp_enqueue_style(
        'wp-admin',
        plugins_url(__FILE__).' public/meet-frontend.css',
        [],
        time()
    );
}

add_action('admin_enqueue_scripts','meet_frontend_style',100);