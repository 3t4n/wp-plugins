<?php
add_action( 'admin_init', 'wpdpeges_tinymce_button' );

function wpdpeges_tinymce_button() {
    global $wp_version;
    add_filter( "mce_external_plugins", "wpdpeges_add_buttons" );
    add_filter( 'mce_buttons', 'wpdpeges_register_buttons' );
    add_filter( 'mce_external_languages', 'wpdpeges_tinymce_languages' );
}

function wpdpeges_add_buttons( $wpdpeges_array ) {
    $wpdpeges_array['wpdpeges'] = plugin_dir_url( WPDPEGES_PLUGIN_FILE ) . 'TinyMCE/scripts/wpdpeges-tinymce-plugin.js';
    return $wpdpeges_array;
}
function wpdpeges_register_buttons( $buttons ) {
    array_push( $buttons, 'DPE', 'GES', 'DPEGES' );
    return $buttons;
}
function wpdpeges_tinymce_languages( $wpdpeges_locales) {
    $wpdpeges_locales[ 'wpdpeges' ] = plugin_dir_path( WPDPEGES_PLUGIN_FILE ) . 'TinyMCE/tiny-mce-locale.php';
    return $wpdpeges_locales;
}