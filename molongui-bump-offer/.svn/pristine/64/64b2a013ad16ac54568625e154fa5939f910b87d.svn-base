<?php
defined( 'ABSPATH' ) or exit;
function mbo_render( $deal )
{
    mbo_enqueue_bump_styles();
    mbo_enqueue_bump_scripts();
    $layout = 'layout-1';
    $random = \substr( \number_format( \time() * \mt_rand(), 0, '', '' ), 0, 10 );
    $options  = \mbo_get_options();
    $defaults = \mbo_get_defaults();
    $is_preview = \apply_filters ( 'bump/is_preview', false );
    $settings = array
    (
        'box_width',
        'box_align',
        'box_border_style',
        'box_border_width',
        'box_border_color',
        'box_border_radius',
        'box_bg_color',
        'box_shadow_size',
        'box_shadow_color',
        'box_vertical_margin',
        'box_horizontal_margin',
        'box_inner_padding',
        'lead_bg_color',
        'lead_text_color',
        'lead_arrow_icon',
        'lead_font_size',
        'lead_font_weight',
        'lead_text_decoration',
        'lead_text_transform',

        'intro_font_size',
        'intro_font_weight',
        'intro_text_decoration',
        'intro_text_transform',
        'intro_text_color',
        'intro_text_align',
        'intro_padding_top',
        'intro_padding_bottom',
        'intro_padding_left',
        'intro_padding_right',

        'body_font_size',
        'body_font_weight',
        'body_text_decoration',
        'body_text_transform',
        'body_text_color',
        'body_text_align',
        'body_padding_top',
        'body_padding_bottom',
        'body_padding_left',
        'body_padding_right',
    );
    foreach ( $settings as $setting )
    {
        ${$setting} = mbo_get_setting_value( $deal, $setting, $options, $defaults, $is_preview );
    }
    $box_no_bg        = !empty( $deal->_molongui_bump_box_bg_transparent  ) ? true : ( ( $is_preview and !empty( $options['box_bg_transparent']  ) ) ? true : false );
$box_no_padding   = ( $box_no_bg and $box_border_width ) ? true : false;
    $box_no_bg        = !empty( $deal->_molongui_bump_box_bg_transparent  ) ? true : ( ( $is_preview and !empty( $options['box_bg_transparent']  ) ) ? true : false );
    $lead_no_bg       = !empty( $deal->_molongui_bump_lead_bg_transparent ) ? true : ( ( $is_preview and !empty( $options['lead_bg_transparent'] ) ) ? true : false );
    $lead_arrow_blink = !empty( $deal->_molongui_bump_lead_arrow_blink    ) ? true : ( ( $is_preview and !empty( $options['lead_arrow_blink']    ) ) ? true : $defaults['lead_arrow_blink'] );
    $lead_cb_shadow   = !empty( $deal->_molongui_bump_cb_shadow           ) ? true : ( ( $is_preview and !empty( $options['cb_shadow']           ) ) ? true : $defaults['cb_shadow'] );
    $template = apply_filters( 'mbo/bump/template', MOLONGUI_BUMP_OFFER_DIR . 'views/bump/html-'.$layout.'.php', $layout );
    include $template;
}