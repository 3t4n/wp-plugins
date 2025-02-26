<?php

namespace GHElementorAutocomplete;

use GHElementorAutocomplete\Fields\SelectAutocomplete;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class GHElementorAutocompleteLoader
{   
	private static $_instance = null;
	/* Make sure only one instance is loaded 
	*/
	public static function instance() {
		
			if ( is_null( self::$_instance ) ) {
				
				self::$_instance = new self();

			}
				
			return self::$_instance;
	}
	/* 
	/* If const is defined, we load all! 
	*/
	public function __construct()
	{
		add_action( 'elementor_pro/forms/fields/register', [ $this, 'registerFields'] );
		
		add_action( 'wp_enqueue_scripts', [ $this, 'frontendJS' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'frontendCSS' ] );
	}	

	public function registerFields( $form_fields_registrar )
	{			
		$form_fields_registrar->register( new SelectAutocomplete() );		
	}

	public function frontendCSS()
	{
		wp_register_style('gh_elementor_autocomplete_css', GH_ELEMENTOR_AUTOCOMPLETE_PLUGIN_URL.'assets/css/style.css', false, GH_ELEMENTOR_AUTOCOMPLETE_VERSION );
		//wp_enqueue_style('gh_elementor_autocomplete_css');
	}

	public function frontendJS()
	{		
		wp_register_script('gh_elementor_autocomplete_js', GH_ELEMENTOR_AUTOCOMPLETE_PLUGIN_URL.'assets/js/elementor-autocomplete-select.js',  array( 'jquery' ), GH_ELEMENTOR_AUTOCOMPLETE_VERSION, true );
		//wp_enqueue_script('gh_elementor_autocomplete_js');
	}
  
}

GHElementorAutocompleteLoader::instance();