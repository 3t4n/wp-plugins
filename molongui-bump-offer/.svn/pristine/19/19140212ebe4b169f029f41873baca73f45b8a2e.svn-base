<?php
defined( 'ABSPATH' ) or exit;
if ( !function_exists( 'mbo_admin_footer' ) )
{
    function mbo_admin_footer( $footer_text )
    {
        global $current_screen;
        if ( $current_screen->id == 'molongui_page_' . MOLONGUI_BUMP_OFFER_NAME )
        {
            return ( sprintf( __( "If you like <strong>%s</strong> please leave us a %s&#9733;&#9733;&#9733;&#9733;&#9733;%s rating. A huge thank you in advance!", 'molongui-bump-offer' ),
                MOLONGUI_BUMP_OFFER_TITLE,
                '<a href="https://wordpress.org/support/view/plugin-reviews/' . MOLONGUI_BUMP_OFFER_NAME . '?filter=5#postform" target="_blank" class="molongui-admin-footer-link" data-rated="' . esc_attr__( "Thanks :)", 'molongui-bump-offer' ) . '">',
                '</a>' )
            );
        }
        return $footer_text;
    }
    add_filter( 'admin_footer_text', 'mbo_admin_footer', 999 );
}
if ( !function_exists( 'mbo_plugin_details' ) )
{
    function mbo_plugin_details()
    {
        if ( apply_filters( 'mbo/add_plugin_sign', true ) )
        {
            echo '<div data-m-brand="Molongui" data-m-id="'.MOLONGUI_BUMP_OFFER_TAG.'" data-m-license="Lite" data-m-version="'.MOLONGUI_BUMP_OFFER_VERSION.'" data-m-link="'.MOLONGUI_BUMP_OFFER_WEB.'"></div>';
        }
    }
    add_action( 'wp_footer', 'mbo_plugin_details', 999 );
}