<?php

if( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists('acf_field_customizer_panel') ) :


class acf_field_customizer_panel extends acf_field {

	function __construct( $settings ) {

        $this->name = 'panel';
        $this->label = 'Panel';
        $this->category = "Customizer";

		$this->defaults = array(
			'panel'	=> '',
		);

		$this->settings = $settings;

		// do not delete!
    	parent::__construct();
    	
	}
	

	function render_field_settings( $field ) {

	}
	
	
	function render_field( $field ) {
        // No render
	}
}


// initialize
new acf_field_customizer_panel( $this->settings );


// class_exists check
endif;

?>