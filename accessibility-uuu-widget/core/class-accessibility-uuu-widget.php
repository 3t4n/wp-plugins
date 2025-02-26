<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Accessibility_Uuu_Widget' ) ) :

	/**
	 * Main Accessibility_Uuu_Widget Class.
	 *
	 * @package		ACCESSIBIL
	 * @subpackage	Classes/Accessibility_Uuu_Widget
	 * @since		1.0.0
	 * @author		Toitx
	 */
	final class Accessibility_Uuu_Widget {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Accessibility_Uuu_Widget
		 */
		private static $instance;

		/**
		 * ACCESSIBIL helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Accessibility_Uuu_Widget_Helpers
		 */
		public $helpers;

		/**
		 * ACCESSIBIL settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Accessibility_Uuu_Widget_Settings
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
			_doing_it_wrong( __FUNCTION__, esc_html__( 'You are not allowed to clone this class.', 'accessibility-uuu-widget' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'You are not allowed to unserialize this class.', 'accessibility-uuu-widget' ), '1.0.0' );
		}

		/**
		 * Main Accessibility_Uuu_Widget Instance.
		 *
		 * Insures that only one instance of Accessibility_Uuu_Widget exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Accessibility_Uuu_Widget	The one true Accessibility_Uuu_Widget
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Accessibility_Uuu_Widget ) ) {
				self::$instance					= new Accessibility_Uuu_Widget;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Accessibility_Uuu_Widget_Helpers();
				self::$instance->settings		= new Accessibility_Uuu_Widget_Settings();

				//Fire the plugin logic
				new Accessibility_Uuu_Widget_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'ACCESSIBIL/plugin_loaded' );
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
			require_once ACCESSIBIL_PLUGIN_DIR . 'core/includes/classes/class-accessibility-uuu-widget-helpers.php';
			require_once ACCESSIBIL_PLUGIN_DIR . 'core/includes/classes/class-accessibility-uuu-widget-settings.php';

			require_once ACCESSIBIL_PLUGIN_DIR . 'core/includes/classes/class-accessibility-uuu-widget-run.php';
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
			load_plugin_textdomain( 'accessibility-uuu-widget', false, dirname( plugin_basename( ACCESSIBIL_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.