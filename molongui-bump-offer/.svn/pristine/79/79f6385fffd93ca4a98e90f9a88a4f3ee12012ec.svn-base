<?php
defined( 'ABSPATH' ) or exit;
function mbo_display()
{
    if ( is_null( WC()->cart ) or WC()->cart->is_empty() ) return;
    $bump = mbo_get_bumps();
    if ( empty( $bump ) )
    {
        return;
    }
    elseif ( count( $bump ) > 1 )
    {
        if ( apply_filters( 'mbo/multiple/bump/warning', true ) )
        {
            $html  = '<style>';
            $html .= '.molongui-bump-error{ margin: 1em 0; padding: 1em; border: 2px solid red; background: #ffacac; font-weight: 600; color: red; }';
            $html .= '.molongui-bump-error a{ text-decoration: underline; color: red !important; }';
            $html .= '</style>';
            $html .= '<div class="molongui-bump-error">'.sprintf( __( "%s free edition doesn't allow you to have more than one existing bump. %sUpgrade%s to unlock all Premium features.", 'molongui-bump-offer' ), MOLONGUI_BUMP_OFFER_TITLE, '<a href="'.MOLONGUI_BUMP_OFFER_WEB.'" target="_blank">', '</a>' ).'</div>';
            echo $html;
            return;
        }
    }

    $bump = $bump[0];
    if ( mbo_is_displayable( $bump ) )
    {
        mbo_render( $bump );
    }
}