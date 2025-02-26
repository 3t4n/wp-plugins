<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'OPBW_Start_Instance' ) ) :

	/**
	 * Main OPBW_Start_Instance Class.
	 *
	 * @package		OPBW
	 * @subpackage	Classes/OPBW_Start_Instance
	 * @since		1.0.0
	 * @author		LexusTeam
	 */
	final class OPBW_Start_Instance {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|OPBW_Start_Instance
		 */
		private static $instance;

		/**
		 * OPBW helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 */
		public $helpers;

		/**
		 * OPBW settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'You are not allowed to clone this class.', 'opal-bulkedit-for-woocommerce' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'You are not allowed to unserialize this class.', 'opal-bulkedit-for-woocommerce' ), '1.0.0' );
		}

		/**
		 * Main OPBW_Start_Instance Instance.
		 *
		 * Insures that only one instance of OPBW_Start_Instance exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|OPBW_Start_Instance	The one true OPBW_Start_Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && !(self::$instance instanceof OPBW_Start_Instance)) {
				self::$instance	= new OPBW_Start_Instance;
				self::$instance->base_hooks();
				self::$instance->include_classes();
				self::$instance->include_helpers();
				self::$instance->settings = new OPBW_Settings();

				if (opbw_check_woocommerce_active()) {
					// Fire the plugin logic
					new OPBW_Run();
					new OPBW_Product();
					new OPBW_Admin(self::$instance->settings);
				}
				
				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'OPBW/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function include_classes() {
			$files_custom = glob(OPBW_PLUGIN_DIR.'includes/classes/*.php');
			foreach ($files_custom as $file) {
                if (file_exists($file)) {
                    require_once $file;
                }
            }
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function include_helpers() {
			$files_custom = glob(OPBW_PLUGIN_DIR.'includes/helpers/*.php');
			foreach ($files_custom as $file) {
                if (file_exists($file)) {
                    require_once $file;
                }
            }
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			
		}

	}

endif; // End if class_exists check.