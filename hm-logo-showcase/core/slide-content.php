<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
* Trait: Slide Settings Content
*/
trait Hmls_Slide_Content_Settings
{
    protected $fields, $settings, $options;
    
    protected function set_slide_content_settings( $post ) {

        $this->fields = $this->slide_content_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'hmls_slide_content_settings', $this->options, $post );

        return update_option( 'hmls_slide_content_settings', serialize( $this->settings ) );
    }

    protected function get_slide_content_settings() {

        $this->fields   = $this->slide_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmls_slide_content_settings') ) );
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function slide_content_option_fileds() {

        return [
            [
                'name'      => 'hmls_logo_per_slide',
                'type'      => 'number',
                'default'   => 4,
            ],
            [
                'name'      => 'hmls_slide_autoplay',
                'type'      => 'boolean',
                'default'   => true,
            ],
            [
                'name'      => 'hmls_slide_interval',
                'type'      => 'number',
                'default'   => 1000,
            ],
            [
                'name'      => 'hmls_slide_height',
                'type'      => 'number',
                'default'   => 100,
            ],
            [
                'name'      => 'hmls_slide_gap',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_slide_display_tooltip',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmls_slide_center_mode',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmls_slide_hide_arrow',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmls_hide_slider_dots',
                'type'      => 'boolean',
                'default'   => false,
            ],
        ];

    }
}