<?php
defined( 'ABSPATH' ) or exit;
function mbo_admin_menu()
{
    global $submenu;
    if ( !current_user_can( 'manage_options' ) ) return;
    if ( empty( $GLOBALS['admin_page_hooks']['molongui'] ) )
    {
        $position = 30;
        add_menu_page( "Molongui", "Molongui", 'manage_options', 'molongui', 'mbo_render_plugins_page', molongui_get_base64_svg( mbo_get_admin_icon() ), $position );
        add_submenu_page( 'molongui', __( "Plugins", 'molongui-bump-offer' ), __( "Plugins", 'molongui-bump-offer' ), 'manage_options', 'molongui', 'mbo_render_plugins_page' );
        add_submenu_page( 'molongui', __( "Support", 'molongui-bump-offer' ), __( "Support", 'molongui-bump-offer' ), 'manage_options', 'molongui-support', 'mbo_render_support_page' );
        $submenu['molongui']['molongui-docs'] = array( __( "Docs", 'molongui-bump-offer' ), 'manage_options', 'https://www.molongui.com/help/docs/' );
    }
    if ( !did_action( 'mbo_pro/loaded' ) )
    {
        $submenu['molongui']['molongui-demos'] = array( __( "Test Pro!", 'molongui-bump-offer' ), 'manage_options', 'https://demos.molongui.com/' );
    }
    add_submenu_page( 'molongui', ucfirst( sprintf( __( "%s Settings", 'molongui-bump-offer' ), MOLONGUI_BUMP_OFFER_TITLE ) ), ucfirst( sprintf( __( "%s Settings", 'molongui-bump-offer' ), MOLONGUI_BUMP_OFFER_TAG ) ), 'manage_options', MOLONGUI_BUMP_OFFER_NAME, 'mbo_render_settings_page' );
    mbo_reorder_submenu_items();
}
add_action( 'admin_menu', 'mbo_admin_menu' );
function mbo_menu_item_styles()
{
    ?>
    <style>
        #adminmenu li#toplevel_page_molongui { margin: 11px 0; }
    </style>
    <?php
}
add_action( 'admin_head', 'mbo_menu_item_styles' );