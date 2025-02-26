<?php
/**
 * Main ImporterCore class
 * 
 * @package Docs2Site_Importer
 */

namespace Docs2Site_Importer;

defined( 'ABSPATH' ) || exit;

/**
 * Main ImporterCore Cass.
 *
 * @class ImporterCore
 */
final class ImporterCore {
	/**
	 * ImporterCore verison.
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * The single instance of the class.
	 *
	 * @var ImporterCore
	 * @since 1.0.0
	 */
	protected static $_instance = null;

	/**
	 * Main ImporterCore Instance.
	 *
	 * Ensures only one instance of ImporterCore is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see RUN_DOCS2SITE_IMPORTER()
	 * @return ImporterCore - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * ImporterCore Constructor.
	 */
	public function __construct() {
        
        $this->define_constants();
		$this->init_hooks();
		$this->includes();

		// Load class instances.
		$this->global_settings = new GlobalSettings();
		$this->admin_settings  = new ImporterAdmin();
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function init_hooks() {
		add_action( 'init', array( $this, 'init' ) );

	}

	/**
	 * Define Constants.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function define_constants() {
		$this->define( 'DOCS2SITE_IMPORTER_PLUGIN_NAME', 'docs2site-importer' );
		$this->define( 'DOCS2SITE_IMPORTER_ABSPATH', dirname( DOCS2SITE_IMPORTER_PLUGIN_FILE ) . '/' );
		$this->define( 'DOCS2SITE_IMPORTER_PLUGIN_BASENAME', plugin_basename( DOCS2SITE_IMPORTER_PLUGIN_FILE ) );
		$this->define( 'DOCS2SITE_IMPORTER_VERSION', $this->version );
		$this->define( 'DOCS2SITE_IMPORTER_TEMPLATE_DEBUG_MODE', false );
		$this->define( 'DOCS2SITE_IMPORTER_PLUGIN_URL', $this->plugin_url() );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name       Constant name.
	 * @param string|bool $value      Constant value.
	 * @return void
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Init ImporterCore when WordPress initializes.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {
		// Before init action.
		do_action( 'before_docs2site_importer_init' );

		// Set up localization.
		$this->load_plugin_textdomain();

	}

	/**
	 * Include required files.
	 *
	 * @return void
	 */
	public function includes() {
		if ( $this->meets_requirements() ) {
			require plugin_dir_path( __FILE__ ) . '/classes/class-docs2site-importer-rest.php';
		}
	}

	/**
	 * Enqueue Frontend scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/docs2site-importer/docs2site-importer-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/docs2site-importer-LOCALE.mo
	 */
	public function load_plugin_textdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			// TODO Remove when start supporting WP 5.0 or later.
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, 'docs2site-importer' );

		unload_textdomain( 'docs2site-importer' );
		load_textdomain( 'docs2site-importer', WP_LANG_DIR . '/docs2site-importer/docs2site-importer-' . $locale . '.mo' );
		load_plugin_textdomain(
			'docs2site-importer',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	/**
	 * Get the plugin URL.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', DOCS2SITE_IMPORTER_PLUGIN_FILE ) );
	}

	/**
	 * Get the plugin path.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( DOCS2SITE_IMPORTER_PLUGIN_FILE ) );
	}

	/**
	 * Get Ajax URL.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function ajax_url() {
		return admin_url( 'admin-ajax.php', 'relative' );
	}

	/**
	 * Get the template path.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function template_path() {
		return apply_filters( 'docs2site_importer_template_path', '/docs2site-importer' );
	}

	/**
	 * Output error message and disable plugin if requirements are not met.
	 *
	 * This fires on admin_notices.
	 *
	 * @since 1.0.0
	 */
	public function maybe_disable_plugin() {
		
		if ( ! $this->meets_requirements() ) {
			// Deactivate our plugin
			deactivate_plugins( DOCS2SITE_IMPORTER_PLUGIN_BASENAME );
		}
	}

	/**
	 * Check if all plugin requirements are met.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if requirements are met, otherwise false.
	 */
	private function meets_requirements() {
		return true;
	}

}
