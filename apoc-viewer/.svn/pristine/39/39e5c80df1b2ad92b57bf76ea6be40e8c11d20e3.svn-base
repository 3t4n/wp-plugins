<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Apoc' ) ) :

	/**
	 * Main Apoc Class.
	 *
	 * @package		APOC
	 * @subpackage	Classes/Apoc
	 * @since		1.0.0
	 * @author		FAMPPY INC
	 */
	final class Apoc {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Apoc
		 */
		private static $instance;

		/**
		 * APOC helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Apoc_Helpers
		 */
		public $helpers;

		/**
		 * APOC settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Apoc_Settings
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
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'apoc' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'apoc' ), '1.0.0' );
		}

		/**
		 * Main Apoc Instance.
		 *
		 * Insures that only one instance of Apoc exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Apoc	The one true Apoc
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Apoc ) ) {
				self::$instance					= new Apoc;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Apoc_Helpers();
				self::$instance->settings		= new Apoc_Settings();

				//Fire the plugin logic
				new Apoc_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'APOC/plugin_loaded' );
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
		private function includes() {
			require_once APOC_PLUGIN_DIR . 'core/includes/classes/class-apoc-helpers.php';
			require_once APOC_PLUGIN_DIR . 'core/includes/classes/class-apoc-settings.php';
			require_once APOC_PLUGIN_DIR . 'core/includes/classes/class-apoc-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'apoc', FALSE, dirname( plugin_basename( APOC_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.
