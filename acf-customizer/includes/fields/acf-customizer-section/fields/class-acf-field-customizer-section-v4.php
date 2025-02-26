<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_field_customizer_section') ) :


class acf_field_customizer_section extends acf_field {
	
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options

	function __construct( $settings )
	{
		// vars
		$this->name = 'section';
		$this->label = 'Section';
		$this->category = "Customizer";
		$this->defaults = array();
		
		
		// do not delete!
    	parent::__construct();
    	
    	
    	// settings
		$this->settings = $settings;

	}

	function create_options( $field )
    {
    }
	function create_field( $field )
	{

	}

}


// initialize
new acf_field_customizer_section( $this->settings );

// class_exists check
endif;

?>