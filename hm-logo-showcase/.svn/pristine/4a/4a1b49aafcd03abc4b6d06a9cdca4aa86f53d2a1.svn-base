<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
* Trait: Slide Settings
*/
trait Hmls_Grid_Content_Settings
{
    protected $fields, $settings, $options;
    
    protected function set_grid_content_settings( $post ) {

        $this->fields   = $this->grid_content_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

       $this->settings = apply_filters( 'hmls_grid_content_settings', $this->options, $post );

        return update_option( 'hmls_grid_content_settings', serialize( $this->settings ) );

    }

    protected function get_grid_content_settings() {

        $this->fields   = $this->grid_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmls_grid_content_settings') ) );
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function grid_content_option_fileds() {

        return [
            [
                'name'      => 'hmls_cols_desktop',
                'type'      => 'number',
                'default'   => 4,
            ],
            [
                'name'      => 'hmls_grid_display_tooltip',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmls_grid_item_gap',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_zoom_in',
                'type'      => 'boolean',
                'default'   => false,
            ],
        ];
    }
}