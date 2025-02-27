<?php
/**
 * @package Make
 */

if ( ! function_exists( 'make_overlay_happyforms_ad' ) ) :

function make_overlay_happyforms_ad( $overlay_id ) {
    if ( 'ttfmake-tinymce-overlay' === $overlay_id
    	&& ! Make()->plus()->is_plus()
        && ! is_plugin_active( 'happyforms/happyforms.php' ) ) {
        require_once( make_get_plugin_directory() . 'inc/builder/core/templates/happyforms-ad.php' );
    }
}

endif;

if ( ! function_exists( 'make_overlay_happyforms_dequeue_scripts' ) ) :

function make_overlay_happyforms_dequeue_scripts() {
    if ( ! isset( $_GET['happyforms'] ) ) {
        return;
    }

    wp_dequeue_script( 'updates' );
}

endif;

add_action( 'make_overlay_body_before', 'make_overlay_happyforms_ad' );
add_action( 'install_plugins_pre_plugin-information', 'make_overlay_happyforms_dequeue_scripts' );