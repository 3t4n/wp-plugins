<?php

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Please do not load this file directly!' );
}

/* Gutenberg Compatibility */
add_filter( 'mce_external_plugins', 'ifp_tinymce_mceplugin' );
add_action( 'current_screen', 'ifp_gutenberg_shortcode_manager' );

function ifp_gutenberg_shortcode_manager()
{

    if ( function_exists( 'get_current_screen' ) ) {

        global $current_screen;

        if ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) {

            add_filter( 'mce_buttons', 'ifp_register_mcebuttons', 0 );
            add_action( 'enqueue_block_editor_assets', 'ifp_block_editor_mcebtn_styles' );

        }

    }

}

function ifp_register_mcebuttons( $buttons )
{

    array_push( $buttons, 'ifpicons' );

    return $buttons;

}

//include the tinymce javascript plugin
function ifp_tinymce_mceplugin( $plugin_array )
{

    $plugin_array['ifpicons'] = IFLITE_URL.'/inc/admin/tinymce_plugin/ifp_editor_plugin.js';

    return $plugin_array;

}

/**
 * Enqueue block editor style
 */
function ifp_block_editor_mcebtn_styles()
{

    wp_enqueue_style( 'ifp-icon-editor-styles', IFLITE_URL.'/inc/admin/tinymce_plugin/ifp_mcebutton_style.css', false, '1.0', 'all' );

}