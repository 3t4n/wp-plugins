<?php
/**
 * PasswordLess auth
 *
 * @package 1-click-passwordless-login
 */

/**
 * Class Xclickpw_Core
 *
 * Main plugin class for managing passwordless authentication.
 * Handles initialization, settings, frontend, and authentication processes.
 *
 * @package 1-click-passwordless-login
 */
class Xclickpw_Core {
	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	public string $version = '1.0.0';

	/**
	 * The single instance of the class.
	 *
	 * @var Xclickpw_Core
	 */
	private static $instance;

	/**
	 * Instance of the settings class.
	 *
	 * @var Xclickpw_Settings
	 */
	public Xclickpw_Settings $settings;

	/**
	 * Instance of the frontend class.
	 *
	 * @var Xclickpw_Frontend
	 */
	public Xclickpw_Frontend $frontend;

	/**
	 * Instance of the authentication handler.
	 *
	 * @var Xclickpw_Handler
	 */
	public Xclickpw_Handler $handler;

	/**
	 * Retrieves the singleton instance of the plugin.
	 *
	 * Ensures only one instance of the plugin is loaded.
	 *
	 * @return Xclickpw_Core The plugin instance.
	 */
	public static function instance(): Xclickpw_Core {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
			self::$instance = new Xclickpw_Core();
		}

		return self::$instance;
	}

	/**
	 * Constructor - Initializes the plugin.
	 *
	 * Registers activation hooks and loads core components.
	 */
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activation' ) );

		$this->settings = new Xclickpw_Settings();
		$this->frontend = new Xclickpw_Frontend();
		$this->handler  = new Xclickpw_Handler();

		add_action( 'init', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Runs on plugin activation.
	 *
	 * Sets default options if not already configured.
	 *
	 * @return void
	 */
	public function activation() {
		if ( ! get_option( 'xclickpw_settings' ) ) {
			update_option( 'xclickpw_settings', Xclickpw_Settings::DEFAULT_OPTIONS );
		}
	}

	/**
	 * Loads the plugin's text domain for translations.
	 *
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain( '1-click-passwordless-login', false, XCLICKPW_PLUGIN_REL_PATH . 'languages/' );
	}
}
