<?php
$added_values = array(
    'mobile_width'     => GreyOwllightboxOBJ::get_field_value('gol_mobile_width_device'),
    'auto_focus'       => ( GreyOwllightboxOBJ::get_field_value('gol_disable_auto_focus') ) ? true : false,
    'ajax_url'         => admin_url( 'admin-ajax.php' ),
    'nonce_token'      => wp_create_nonce('go_lightbox_nonce'),
    'open_media_img'   => GreyOwllightboxOBJ::get_field_value('gol_open_image_media_file'),
    'l_box_max_width'  => GreyOwllightboxOBJ::get_field_value('gol_max_width_lightbox'),
    'l_box_max_height' => GreyOwllightboxOBJ::get_field_value('gol_max_height_lightbox'),
    'lightbox_wrapper' => array(
        'background_color' => GreyOwllightboxOBJ::get_field_value('gol_main_background_color'),
        'opacity' => GreyOwllightboxOBJ::get_field_value('gol_main_background_color_opacity'),
    ),
    'lightbox_style' => array(
        'background_color' => GreyOwllightboxOBJ::get_field_value('gol_media_box_color'),
        'padding_top'      => GreyOwllightboxOBJ::get_field_value('gol_box_padding_top'),
        'padding_right'    => GreyOwllightboxOBJ::get_field_value('gol_box_padding_right'),
        'padding_bottom'   => GreyOwllightboxOBJ::get_field_value('gol_box_padding_bottom'),
        'padding_left'     => GreyOwllightboxOBJ::get_field_value('gol_box_padding_left'),
        'border_radius'    => GreyOwllightboxOBJ::get_field_value('gol_border_radius'),
    ),
    'mobile_l_box_max_width'  => GreyOwllightboxOBJ::get_field_value('gol_max_width_lightbox_mobile'),
    'mobile_l_box_max_height' => GreyOwllightboxOBJ::get_field_value('gol_max_height_lightbox_mobile'),
    'mobile_lightbox_style'   => array(
        'background_color' => GreyOwllightboxOBJ::get_field_value('gol_media_box_color_mobile'),
        'padding_top'      => GreyOwllightboxOBJ::get_field_value('gol_box_padding_top_mobile'),
        'padding_right'    => GreyOwllightboxOBJ::get_field_value('gol_box_padding_right_mobile'),
        'padding_bottom'   => GreyOwllightboxOBJ::get_field_value('gol_box_padding_bottom_mobile'),
        'padding_left'     => GreyOwllightboxOBJ::get_field_value('gol_box_padding_left_mobile'),
        'border_radius'    => GreyOwllightboxOBJ::get_field_value('gol_border_radius_mobile'),
    ),
    'mobile_lightbox_wrapper' => array(
        'background_color' => GreyOwllightboxOBJ::get_field_value('gol_main_background_color_mobile'),
        'opacity' => GreyOwllightboxOBJ::get_field_value('gol_main_background_color_opacity_mobile'),
    ),
    'close_btn_sett' => array(
        'width'   => GreyOwllightboxOBJ::get_field_value('gol_close_button_width'),
        'height'  => GreyOwllightboxOBJ::get_field_value('gol_close_button_height'),
        GreyOwllightboxOBJ::get_field_value('gol_horizontal_position') => GreyOwllightboxOBJ::get_field_value('gol_horizontal_position_distance'),
        GreyOwllightboxOBJ::get_field_value('gol_vertical_position') => GreyOwllightboxOBJ::get_field_value('gol_vertical_position_distance'),
        'content' => GreyOwllightboxOBJ::get_field_value('gol_close_button_content'),
        'background_color' => GreyOwllightboxOBJ::get_field_value('gol_close_button_background_color'),
        'color' => GreyOwllightboxOBJ::get_field_value('gol_close_button_text_color'),
        'border_radius' => GreyOwllightboxOBJ::get_field_value('gol_close_button_border_radius'),
    ),
    'type_media_img'  => GreyOwllightboxOBJ  ::get_field_value('gol_lightbox_opening_type'),
    'gallery_buttons' => ( GreyOwllightboxOBJ::get_field_value('gol_prev_next_buttons') == 'outside' ) ? 'out': 'in',
    'prev_btn_sett'   => array(
        'content' => GreyOwllightboxOBJ::get_field_value('gol_gallery_button_previous'),
    ),
    'next_btn_sett' => array(
        'content' => GreyOwllightboxOBJ::get_field_value('gol_gallery_button_next'),
    ),
);
wp_localize_script( 'grey-owl-lightbox', 'gol_added_values', $added_values );
