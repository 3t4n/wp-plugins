<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
* Trait: Slide Settings
*/
trait Hmls_Slide_Template_Settings
{
    protected $fields, $settings, $options;
    
    protected function set_slide_template_settings( $post ) {

        $this->fields   = $this->slide_template_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

       $this->settings = apply_filters( 'hmls_slide_template_settings', $this->options, $post );

        return update_option( 'hmls_slide_template_settings', $this->settings );

    }

    protected function get_slide_template_settings() {

        $this->fields   = $this->slide_template_option_fileds();
		$this->settings = get_option('hmls_slide_template_settings');
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function slide_template_option_fileds() {

        return [
            [
                'name'      => 'hmls_template',
                'type'      => 'text',
                'default'   => 'default',
            ],
        ];
    }
}