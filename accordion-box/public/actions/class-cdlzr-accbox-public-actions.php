<?php
defined( 'ABSPATH' ) or die();

if( !class_exists('CDLZR_ACCBOX_Public_Actions')){
	class CDLZR_ACCBOX_Public_Actions{
		
		public static function frontend_assests(){
			wp_enqueue_style( 'bootstrap_css', CDLZR_ACORD_URL . 'admin/assets/css/bootstrap.min.css'  );
			wp_enqueue_style( 'public_css', CDLZR_ACORD_URL . 'public/assets/css/public-css.css'  );
		 	wp_enqueue_style( 'hr_accordion_css', CDLZR_ACORD_URL . 'public/assets/css/hr.accordion.min.css'  );
		 	wp_enqueue_style( 'jquerysctipttop_css', CDLZR_ACORD_URL . 'public/assets/css/jquerysctipttop.css'  );	 	
		 	wp_enqueue_style('cdlzr-fontawesome', CDLZR_ACORD_URL . 'admin/assets/css/fontawesome/css/all.min.css', array(), true, 'all');
		
			wp_enqueue_script( 'jquery' );			
			wp_enqueue_script( 'bootstrap_js', CDLZR_ACORD_URL . 'admin/assets/js/bootstrap.min.js', array( 'jquery' ), true, true );	
			wp_enqueue_script( 'public-custom-js', CDLZR_ACORD_URL . 'public/assets/js/public-custom-js.js' );
			wp_enqueue_script( 'hr-accordion-min-js', CDLZR_ACORD_URL . 'public/assets/js/hr-accordion.min.js' );
			wp_enqueue_script( 'accordion-js', CDLZR_ACORD_URL . 'public/assets/js/jquery-accordion.js' );	
		}
	}
}