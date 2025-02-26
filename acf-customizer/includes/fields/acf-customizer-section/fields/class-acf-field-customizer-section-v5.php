<?php

if( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists('acf_field_customizer_section') ) :


class acf_field_customizer_section extends acf_field {

	function __construct( $settings ) {

        $this->name = 'section';
        $this->label = 'Section';
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
new acf_field_customizer_section( $this->settings );


// class_exists check
endif;

?>