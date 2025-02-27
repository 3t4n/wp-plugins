<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
* Trait: Grid Settings Styles
*/
trait Hmls_Grid_Style_Settings
{
    protected $fields, $settings, $options;
    
    protected function set_grid_style_settings( $post ) {

        $this->fields   = $this->grid_style_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'hmls_grid_style_settings', $this->options, $post );

        return update_option( 'hmls_grid_style_settings', serialize( $this->settings ) );

    }

    protected function get_grid_style_settings() {

        $this->fields   = $this->grid_style_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmls_grid_style_settings') ) );
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function grid_style_option_fileds() {

        return [
            [
                'name'      => 'hmls_grid_container_border_width',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_container_border_color',
                'type'      => 'text',
                'default'   => '#DDDDDD',
            ],
            [
                'name'      => 'hmls_grid_container_radius',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_container_padding_top',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_container_padding_right',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_container_padding_bottom',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_container_padding_left',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_container_bg_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmls_grid_item_border_width',
                'type'      => 'number',
                'default'   => 0,
            ],
            [
                'name'      => 'hmls_grid_item_border_color',
                'type'      => 'text',
                'default'   => '#DDDDDD',
            ],
            [
                'name'      => 'hmls_grid_item_radius',
                'type'      => 'number',
                'default'   => 5,
            ],
            [
                'name'      => 'hmls_grid_item_bg_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmls_grid_item_brdr_clr_hvr',
                'type'      => 'text',
                'default'   => '#DDDDDD',
            ],
            [
                'name'      => 'hmls_grid_item_bg_clr_hvr',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
        ];
    }
}