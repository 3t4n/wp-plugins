<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
* Trait: Slide Settings Style
*/
trait Hmls_Slide_Style_Settings
{
    protected $fields, $settings, $options;

    protected function set_slide_style_settings( $post ) {
        
        $this->fields = $this->slide_styles_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'hmls_slide_styles_settings', $this->options, $post );

        return update_option( 'hmls_slide_styles_settings', serialize( $this->settings ) );
    }

    protected function get_slide_styles_settings() {

        $this->fields   = $this->slide_styles_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmls_slide_styles_settings') ) );
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function slide_styles_option_fileds() {

        return [
            [
                'name'      => 'hmls_slide_container_bg_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmls_slide_container_radius',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_container_border_width',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_container_border_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmls_slide_container_padding_top',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_container_padding_right',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_container_padding_bottom',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_container_padding_left',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_border_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmls_slide_bg_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmls_slide_radius',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_border_width',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_logo_height',
                'type'      => 'number',
                'default'   => 50,
            ],
            [
                'name'      => 'hmls_slider_arrow_color',
                'type'      => 'text',
                'default'   => '#999999',
            ],
            [
                'name'      => 'hmls_slider_arrow_color_hvr',
                'type'      => 'text',
                'default'   => '#555',
            ],
            [
                'name'      => 'hmls_slider_dots_color',
                'type'      => 'text',
                'default'   => '#999',
            ],
            [
                'name'      => 'hmls_slider_dots_active_color',
                'type'      => 'text',
                'default'   => '#333',
            ],
        ];

    }
}