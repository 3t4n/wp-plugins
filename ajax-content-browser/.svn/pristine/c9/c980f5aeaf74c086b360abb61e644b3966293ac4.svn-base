<?php
/**
 * Plugin Name: Ajax Content Browser
 * Plugin URI: https://ajaxcontentbrowser.com
 * Description: Display your WordPress content and products. Beautifully.
 * Author: Ajax Content Browser
 * Author URI: https://ajaxcontentbrowser.com
 * Version: 1.0.3
 * Text Domain: acb
 * Domain Path: /i18n/languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define ACB_PLUGIN_FILE.
if ( ! defined( 'ACB_PLUGIN_FILE' ) ) {
	define( 'ACB_PLUGIN_FILE', __FILE__ );
}

/**
 * Main class.
 */
final class AjaxContentBrowser {

	/**
	 * Version.
	 */
	public $version = '1.0.3';

	/**
	 * The single instance of the class.
	 */
	protected static $_instance = null;

	/**
	 * Main Instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();

		do_action( 'acb_loaded' );
	}

	/**
	 * Define Constants.
	 */
	public function define_constants() {
		$this->define( 'ACB_ABSPATH', dirname( ACB_PLUGIN_FILE ) . '/' );
		$this->define( 'ACB_PLUGIN_BASENAME', plugin_basename( ACB_PLUGIN_FILE ) );
		$this->define( 'ACB_VERSION', $this->version );
		$this->define( 'ACB_TEMPLATE_DEBUG_MODE', false );
	}

	/**
	 * Define constant if not already set.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {

		/**
		 * Core classes.
		 */
		include_once ACB_ABSPATH . 'includes/functions.php';
		include_once ACB_ABSPATH . 'includes/ajax.php';
		include_once ACB_ABSPATH . 'includes/shortcodes.php';

		if ( $this->is_request( 'admin' ) ) {
			include_once ACB_ABSPATH . 'includes/admin/admin.php';
		}

		if ( $this->is_request( 'frontend' ) ) {
			$this->frontend_includes();
		}

	}

	/**
	 * Include required frontend files.
	 */
	public function frontend_includes() {
		include_once ACB_ABSPATH . 'includes/assets.php';
	}

	/**
	 * What type of request is this?
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin':
				return is_admin();
			case 'ajax':
				return defined( 'DOING_AJAX' );
			case 'cron':
				return defined( 'DOING_CRON' );
			case 'frontend':
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' ) && ! defined( 'REST_REQUEST' );
		}
	}

	/**
	 * Hook into actions and filters.
	 */
	public function init_hooks() {
		add_action( 'activated_plugin', array( $this, 'activated_plugin' ) );
		add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'init', array( 'ACB_Shortcodes', 'init' ) );
	}

	/**
	 * When plugin is activated.
	 */
	public function activated_plugin( $plugin ) {
		if ( $plugin == plugin_basename( __FILE__ ) ) {
			exit( wp_redirect( admin_url( 'admin.php?page=acb-about' ) ) );
		}
	}

	/**
	 * Init when WordPress Initialises.
	 */
	public function init() {
		// Before init action.
		do_action( 'before_acb_init' );

		// Set up localization.
		$this->load_plugin_textdomain();

		// Init action.
		do_action( 'acb_init' );
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/acb/acb-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/acb-LOCALE.mo
	 */
	public function load_plugin_textdomain() {
		$locale = is_admin() && function_exists( 'get_user_locale' ) ? get_user_locale() : get_locale();
		$locale = apply_filters( 'plugin_locale', $locale, 'acb' );

		unload_textdomain( 'acb' );
		load_textdomain( 'acb', WP_LANG_DIR . '/acb/acb-' . $locale . '.mo' );
		load_plugin_textdomain( 'acb', false, plugin_basename( dirname( ACB_PLUGIN_FILE ) ) . '/i18n/languages' );
	}

	/**
	 * Get the template path.
	 */
	public function template_path() {
		return apply_filters( 'acb_template_path', 'acb/' );
	}

	/**
	 * Get the plugin url.
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', ACB_PLUGIN_FILE ) );
	}

	/**
	 * Get the plugin path.
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( ACB_PLUGIN_FILE ) );
	}

	/**
	 * Get Ajax URL.
	 */
	public function ajax_url() {
		return admin_url( 'admin-ajax.php', 'relative' );
	}

}

/**
 * Main instance.
 */
function acb() {
	return AjaxContentBrowser::instance();
}

// Global for backwards compatibility.
$GLOBALS['acb'] = acb();