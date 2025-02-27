<?php

function scrolltotop_get_plugin_settings( $option = '' ) {
	$default_settings = array(
		'stt_mode'                                => 0,
		'stt_bar_position'                        => 0,
		'stt_button_position'                     => 1,
		'stt_button_padding'                      => 14,
		'stt_button_opacity'                      => 100,
		'stt_button_horizontal_offset'            => 25,
		'stt_button_vertical_offset'              => 25,
		'stt_button_border_radius'                => '5px',
		'stt_bar_transformed_border_radius'       => '50%',
		'stt_bar_element_position'                => 1,
		'stt_bar_top_offset'                      => 0,
		'stt_bar_horizontal_offset'               => 0,
		'stt_scroll_offset'                       => 1,
		'stt_scroll_to'                           => 0,
		'stt_bar_text'                            => '',
		'stt_bar_text_distance'                   => '',
		'stt_bar_fade_duration'                   => 300,
		'stt_advanced_background_width'           => 0,
		'stt_advanced_background_hide'            => 1840,
		'stt_bar_animation_on_load'               => 1,
		'stt_bar_allow_back'                      => 0,
		'stt_script_loading'                      => 0,
		'stt_bar_width'                           => 85,
		'stt_bar_opacity'                         => 20,
		'stt_bar_arrow_icon'                      => 'f077',
		'stt_button_arrow_icon'                   => 'e800',
		'stt_bar_arrow_rotate_speed'              => 0,
		'stt_button_animation'                    => 1,
		'stt_button_animation_speed'              => 200,
		'stt_button_hover_transition'             => 100,
		'stt_button_animation_on_load'            => 1,
		'stt_button_background_color'             => '#f44336',
		'stt_button_background_color_on_hover'    => '#ff5252',
		'stt_bar_background_color'                => 'rgba( 0, 0, 0, 0.2 )',
		'stt_bar_background_color_on_hover'       => 'rgba( 0, 0, 0, 0.3 )',
		'stt_bar_hover_transition'                => 250,
		'stt_bar_text_offset'                     => 20,
		'stt_bar_color'                           => '#000000',
		'stt_button_arrow_color'                  => '#ffffff',
		'stt_bar_arrow_size'                      => 24,
		'stt_button_arrow_size'                   => 18,
		'stt_bar_caption_size'                    => 14,
		'stt_bar_caption_position'                => 0,
		'stt_bar_caption_font'                    => '',
		'stt_sticky_container'                    => '',
		'stt_advanced_background_sticky'          => 0,
		'stt_bar_sticky'                          => 0,
		'stt_custom_css'                          => '',
		'stt_bar_make_smaller_width'              => 100,
		'stt_bar_make_smaller_screen'             => 1680,
		'stt_button_make_smaller_padding'         => 0,
		'stt_button_make_smaller_arrow_size'      => 0,
		'stt_button_make_smaller_screen'          => 600,
		'stt_bar_hide'                            => 1280,
		'stt_bar_transform_to_button'             => 1,
		'stt_bar_transformed_size'                => 60,
		'stt_bar_transformed_vertical_position'   => 1,
		'stt_bar_transformed_horizontal_position' => 1,
		'stt_bar_transformed_vertical_offset'     => 25,
		'stt_bar_transformed_horizontal_offset'   => 25,
		'stt_button_hide'                         => 0,
		'stt_enqueue_styles'                      => 0,
		'stt_inline_styles'                       => 0
	);

	$default_settings = apply_filters( 'scrolltotop_default_settings', $default_settings );

	$settings = get_option( 'scrolltotop_plugin_settings', $default_settings );

	if ( empty( $option ) ) {
		if ( isset( $settings ) ) {
			return array_merge( $default_settings, $settings );
		}

		return $default_settings;
	}

	if ( isset( $settings[ $option ] ) ) {
		return $settings[ $option ];
	}

	return $default_settings[ $option ];
}
