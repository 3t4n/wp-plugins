<?php
defined( 'ABSPATH' ) or exit;
function mbo_add_go_pro_link( $links )
{
    $more_links = array
    (
        'settings' => '<a href="' . admin_url( 'admin.php?page=' . MOLONGUI_BUMP_OFFER_NAME ) . '">' . __( "Settings" ) . '</a>',
        'docs'     => '<a href="' . 'https://www.molongui.com/help/docs/' . '" target="blank" >' . __( "Docs", 'molongui-bump-offer' ) . '</a>'
    );

    if ( apply_filters( 'mbo/action_links/go_pro', true ) )
    {
        $more_links['gopro'] = '<a href="' . MOLONGUI_BUMP_OFFER_WEB . '/" target="blank" style="font-weight:bold;color:orange">' . __( "Go Pro", 'molongui-bump-offer' ) . '</a>';
    }

    return array_merge( $more_links, $links );
}
add_filter( 'plugin_action_links_'.MOLONGUI_BUMP_OFFER_BASENAME, 'mbo_add_go_pro_link' );