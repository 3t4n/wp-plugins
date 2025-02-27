<?php
function fastspring_add_id_to_script( $tag, $handle, $src ) {
	if ( 'fastspringapi'  === $handle ) {
		$tag = '<script type="text/javascript" src="' . esc_url( $src ) . '" id="fsc-api" data-storefront="' . $GLOBALS['fsb_options']['fastspring_storefront'] . '" data-data-callback="dataCallbackFunction"></script>';
	}
	return $tag;
}
	
class fastspring_Admin {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	public function enqueue_styles() {
		 wp_enqueue_style(
			'fastspring-style-css', 
			plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), 
		array( 'wp-editor' ) 
		);
	}
	public function enqueue_scripts() {
	}
}