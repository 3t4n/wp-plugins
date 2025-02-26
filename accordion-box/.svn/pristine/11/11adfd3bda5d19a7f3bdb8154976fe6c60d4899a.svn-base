<?php
defined( 'ABSPATH' ) or die();

if( !class_exists('CDLZR_ACC_BOX_PUBLIC')){
	class CDLZR_ACC_BOX_PUBLIC{
		function __construct(){
			require_once( CDLZR_ACORD_PLUGIN_DIR_PATH.'public/templatebox/class-cdlzr-accbox-shortcode.php' );
			//require_once( CDLZR_ACORD_PLUGIN_DIR_PATH.'public/actions/class-cdlzr-accbox-public-actions.php' );

			//add_action( 'wp_enqueue_scripts', array( 'CDLZR_ACCBOX_Public_Actions', 'frontend_assests' ) );
			add_shortcode( 'CDLZR_ACC_BOX', array( 'CDLZR_ACCBOX_Shortcode', 'show_accbox' ) );
		}
	}
}