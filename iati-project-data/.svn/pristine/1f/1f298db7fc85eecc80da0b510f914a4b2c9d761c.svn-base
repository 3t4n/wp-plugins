<?php
function iati_enqueue() {
    $ver            = IATI_DEV_MODE ? time() : null;

    wp_register_style( 'iati-front-style', plugins_url( 'assets/css/front-style.css', IATI_PLUGIN_FILE ), [], $ver );
    wp_register_style( 'iati-fonts', 'https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Lora&family=Montserrat&display=swap' );

    wp_enqueue_style( 'iati-front-style' );
    wp_enqueue_style( 'iati-fonts' );
}

function iati_admin_enqueue() {
    if( !isset( $_GET['page'] ) OR $_GET['page'] != 'iati-project-data' ){
        return;
    }

    $ver            = IATI_DEV_MODE ? time() : null;

    wp_register_style( 'iati-admin-style', plugins_url( 'assets/css/admin-style.css', IATI_PLUGIN_FILE ), [], $ver );
    wp_enqueue_style( 'iati-admin-style' );
}