<?php
/**
 * Class AWSA_Quick_Buy Core
 *
 * @package           AWSA_Quick_Buy
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

/**
 * Core Class in plugin
 */
final class AWSA_Quick_Buy {
	/**
	 * Plugin Version
	 *
	 * @var string
	 */
	public static $version = '1.0.0';

	/**
	 * Session instance
	 *
	 * @var bool
	 */
	protected static $_instance = null;

	/**
	 * AWSA_Quick_Buy Costructor
	 */
	public function __construct() {
		$this->define();
		$this->includes();
		$this->init_hooks();
		$this->admin();

		AWSA_Quick_Buy_Page::init();
	}

	/**
	 * AWSA_Quick_Buy Instance
	 *
	 * @return self()
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Set Constants
	 *
	 * @return void
	 */
	public function define() {
		define( 'AWSA_QUICK_BUY_PD', plugin_dir_path( AWSA_QUICK_BUY_FILE ) );
		define( 'AWSA_QUICK_BUY_PDI', plugin_dir_path( AWSA_QUICK_BUY_FILE ) . 'includes/' );
		define( 'AWSA_QUICK_BUY_PU_JS', plugins_url( 'assets/js/', AWSA_QUICK_BUY_FILE ) );
		define( 'AWSA_QUICK_BUY_PU_CSS', plugins_url( 'assets/css/', AWSA_QUICK_BUY_FILE ) );
		define( 'AWSA_QUICK_BUY_PU_IMG', plugins_url( 'assets/img/', AWSA_QUICK_BUY_FILE ) );
		define( 'AWSA_QUICK_BUY_PU_FONTS', plugins_url( 'assets/fonts/', AWSA_QUICK_BUY_FILE ) );
		define( 'AWSA_QUICK_BUY_TEMPLATES', plugin_dir_path( AWSA_QUICK_BUY_FILE ) . 'templates/' );

		define( 'AWSA_QUICK_BUY_VERSION', self::$version );

	}

	/**
	 * Include Files
	 *
	 * @return void
	 */
	public function includes() {
		/**
		 *  Develop convert to class
		 */
		spl_autoload_register( 'self::autoload' );

		require_once AWSA_QUICK_BUY_PDI . 'core.php';
		/* awsa-settings.php */
		require_once AWSA_QUICK_BUY_PDI . 'functions.php';
	}

	/**
	 * Include Files If is Admin
	 *
	 * @return void
	 */
	public function admin() {
		if ( ! is_admin() ) {
			return;
		}

		// awsa-admin-settings.php
		// awsa-admin-core.php
		require_once AWSA_QUICK_BUY_PDI . 'admin.php';
	}

	/**
	 * Autoload Class
	 *
	 * @param string $class_name
	 * @return void
	 */
	public function autoload( $class_name ) {
		if ( ! class_exists( $class_name, false ) ) {
			if ( ! ( false !== strpos( $class_name, 'awsa' ) || false !== strpos( $class_name, 'AWSA' ) ) ) {
				return;
			}

			$class_name = strtolower( $class_name );
			$class_name = str_replace( '_', '-', $class_name );
			$class_name = str_replace( 'awsa-', 'class-', $class_name );

			/* Settings APIs */
			if ( false !== strpos( $class_name, 'class-settings' ) ) {
				$class_name = 'apis/settings/' . $class_name;
			}

			$directories = array();
			if ( ! class_exists( 'awsa_core', false ) ) {
				$directories['awsa-core'] = WP_PLUGIN_DIR . '/awsa-core/includes/';
			}
			$directories['awsa-quick-buy'] = AWSA_QUICK_BUY_PDI;

			foreach ( $directories as $dir ) {
				if ( empty( $dir ) ) {
					continue;
				}
				$filename = $dir . $class_name . '.php';

				if ( file_exists( $filename ) ) {
					require_once $filename;
					return true;
				}
			}
		}
		return false;
	}

	/**
	 * Load Plugin Text Domain
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'awsa-quick-buy', false, dirname( plugin_basename( AWSA_QUICK_BUY_FILE ) ) . '/languages' );
	}

	/**
	 * Add Hooks - Actions and Filters
	 *
	 * @return void
	 */
	public function init_hooks() {
		register_activation_hook( __FILE__, 'AWSA_Quick_Buy_Install::init' );
		add_action( 'init', array( $this, 'init' ) );// develop

		// add_action( 'init', array( 'AWSA_Quick_Buy_Shortcodes', 'init' ) );
		// add_action( 'plugins_loaded', array( $this, 'on_plugins_loaded' ), -1 );
		// add_action( 'activated_plugin', array( $this, 'activated_plugin' ) );
		// add_action( 'deactivated_plugin', array( $this, 'deactivated_plugin' ) );
	}

	/**
	 * Init AWSA_Quick_Buy after WordPress
	 *
	 * @return void
	 */
	public function init() {
		$this->load_plugin_textdomain();
	}
}
