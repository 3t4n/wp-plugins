<?php

class AIEA_HF_Astra_Template {

	public static $instance = null;
	
	public function __construct() {}
	
	public function setup_header() {
		add_action( 'template_redirect', [ $this, 'astra_setup_header' ], 10 );
	}
	
	public function setup_footer() {
		add_action( 'template_redirect', [ $this, 'astra_setup_footer' ], 10 );
	}
	
	/**
	 * Disable header from the theme.
	 */
	public function astra_setup_header() {
		remove_action( 'astra_header', 'astra_header_markup' );

		// Remove the new header builder action.
		if ( class_exists( 'Astra_Builder_Helper' ) && Astra_Builder_Helper::$is_header_footer_builder_active ) {
			remove_action( 'astra_header', [ Astra_Builder_Header::get_instance(), 'prepare_header_builder_markup' ] );
		}
	}

	/**
	 * Disable footer from the theme.
	 */
	public function astra_setup_footer() {
		remove_action( 'astra_footer', 'astra_footer_markup' );

		// Remove the new footer builder action.
		if ( class_exists( 'Astra_Builder_Helper' ) && Astra_Builder_Helper::$is_header_footer_builder_active ) {
			remove_action( 'astra_footer', [ Astra_Builder_Footer::get_instance(), 'footer_markup' ] );
		}
	}
	
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
} //new AIEA_HF_Astra_Template;

function aiea_hf_astra_template() {
	return AIEA_HF_Astra_Template::instance();
}