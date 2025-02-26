<?php

class AIEA_HF_Template_Checker {

	public static $instance = null;
	
	public function __construct() {}
	
	public function template_header_check() {
		
		$template = get_template();
		$response = [ 'status' => 0, 'header' => '' ];
		if( $template == 'astra' ) {
			$response['header'] = 'astra_header';
			require_once ( AIEA_DIR . 'core/header-footer/themes/astra.php' );
			aiea_hf_astra_template()->setup_header();
		} else {
			$response['status'] = 1;
		}
		
		return $response;
		
	}
	
	public function template_footer_check() {
		
		$template = get_template();
		$response = [ 'status' => 0, 'footer' => '' ];
		if( $template == 'astra' ) {
			$response['footer'] = 'astra_footer';
			require_once ( AIEA_DIR . 'core/header-footer/themes/astra.php' );
			aiea_hf_astra_template()->setup_footer();
		} else {
			$response['status'] = 1;
		}
		
		return $response;
		
	}
	
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
} 

function aiea_hf_template_checker() {
	return AIEA_HF_Template_Checker::instance();
}