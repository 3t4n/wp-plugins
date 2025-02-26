<?php
/**
 * This file contains block registration as well as dynamic callbacks for custom editor blocks
 */

add_action( 'init', 'rankology_fno_register_blocks', 100 );
/**
 * Register editor blocks
 */
function rankology_fno_register_blocks(){

    // Register Local Business block
    require_once RANKOLOGY_FNO_PLUGIN_DIR_PATH . '/inc/functions/blocks/local-business/block.php';
    register_block_type( RANKOLOGY_FNO_PUBLIC_PATH . '/editor/blocks/local-business/' );
    register_block_type( RANKOLOGY_FNO_PUBLIC_PATH . '/editor/blocks/local-business-field/', [
        'render_callback' => 'rankology_fno_local_business_field_block',
    ]);
    wp_set_script_translations( 'wprankology/local-business', 'wp-rankology' );
    wp_set_script_translations( 'wprankology/local-business-field', 'wp-rankology' );

    // Register Breadcrumbs block
    require_once RANKOLOGY_FNO_PLUGIN_DIR_PATH . '/inc/functions/blocks/breadcrumbs/block.php';
    register_block_type( RANKOLOGY_FNO_PUBLIC_PATH . '/editor/blocks/breadcrumbs/', [
        'render_callback' => 'rankology_fno_breadcrumb_block',
        'attributes'      => [
            'inlineStyles' => [
                'type'    => 'string',
                'default' => function_exists('rankology_breadcrumbs_inline_css') ? rankology_breadcrumbs_inline_css( '', false ) : '',
            ],
            'homeOption' => [
                'type'    => 'string',
                'default' => ! empty( rankology_fno_get_service('OptionPro')->getBreadcrumbsI18nHome() ) ? rankology_fno_get_service('OptionPro')->getBreadcrumbsI18nHome() : __( 'Home', 'wp-rankology' ),
            ],
        ]
    ] );
    wp_set_script_translations( 'wprankology/breadcrumbs', 'wp-rankology' );

    // Register How-to block
    register_block_type( RANKOLOGY_FNO_PUBLIC_PATH . '/editor/blocks/how-to/' );
    register_block_type( RANKOLOGY_FNO_PUBLIC_PATH . '/editor/blocks/how-to-step/' );
    wp_set_script_translations( 'wprankology/how-to', 'wp-rankology' );
    wp_set_script_translations( 'wprankology/how-to-step', 'wp-rankology' );

    // Register Table of Contents block
    register_block_type( RANKOLOGY_FNO_PUBLIC_PATH . '/editor/blocks/table-of-contents/' );
    wp_set_script_translations( 'wprankology/table-of-contents', 'wp-rankology' );
}


add_action( 'current_screen', 'rankology_fno_unregister_blocks' );
/**
 * Unregister blocks depending on context
 */
function rankology_fno_unregister_blocks(){
    $screen = get_current_screen();
    if( is_admin() && $screen and $screen->base !== 'post' ){
        unregister_block_type( 'wprankology/how-to' );
        unregister_block_type( 'wprankology/how-to-step' );
    }
}
