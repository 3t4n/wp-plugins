<?php

if ( ! class_exists( 'ECOMFIT_StyleAndScript' ) ) {
	class ECOMFIT_StyleAndScript {
		function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'ecomfit_enqueue_styles_manage' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'ecomfit_enqueue_scripts_manage' ) );
		}

		public function ecomfit_enqueue_styles_manage() {
			wp_register_style( 'ecomfit-style-manage-main', plugins_url( '/view/css/ecomfit-style-v14.css', ECOMFIT_WOOCOMMERCE_PLUGIN_DIRNAME ) );
			wp_enqueue_style( 'ecomfit-style-manage-main' );

			wp_register_style( 'ecomfit-style-manage-icon', ECOMFIT_URL_FONT_ICON );
			wp_enqueue_style( 'ecomfit-style-manage-icon' );
		}

		public function ecomfit_enqueue_scripts_manage() {
			wp_register_script( 'ecomfit-script-manage', plugins_url( '/view/js/ecomfit-script-manager-v14.js', ECOMFIT_WOOCOMMERCE_PLUGIN_DIRNAME ), __FILE__ );
			wp_enqueue_script( 'ecomfit-script-manage', $in_footer = true );
		}
	}

}
?>