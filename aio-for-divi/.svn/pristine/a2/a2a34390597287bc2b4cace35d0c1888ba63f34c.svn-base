<?php
/**
 * Advanced Footer
 *
 * @package Divi AiO
 * @since 1.0.0
 */

if ( ! class_exists( 'DAIO_Adv_Footer_Loader' ) ) {

	/**
	 * Customizer Initialization
	 */
	class DAIO_Adv_Footer_Loader {

		/**
		 * Instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}


		/**
		 * Constructor Initialize
		 */
		public function __construct() {
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ), 2 );
		}

		/**
		 * Customize register
		 */
		function customize_register( $wp_customize ) {

			$wp_customize->add_panel(
				'panel-footer-adv', array(
					'title' 		=> __( 'Advanced Footer', 'daio' ),
					'priority' 	=> 1,
				)
			);

			$wp_customize->add_section(
				'section-footer-adv', array(
					'title'   	=> __( 'General', 'daio' ),
					'panel'   	=> 'panel-footer-adv'
				)
			);

			// All Settings
			require_once DAIO_ADVANCED_FOOTER_DIR . 'inc/settings/general-settings.php';

		}

		/**
		 * Customizer Preview
		 */
		function preview_scripts() {
			wp_enqueue_script(
				'daio-adv-footer-customize-preview-js', 
				DAIO_ADVANCED_FOOTER_URI . 'assets/js/customizer-preview.js', 
				array( 'customize-preview', 'daio-customize-preview-js'), 
				DIVI_AIO_VER, 
				true 
			);
		}
		
	}
}

DAIO_Adv_Footer_Loader::get_instance();
