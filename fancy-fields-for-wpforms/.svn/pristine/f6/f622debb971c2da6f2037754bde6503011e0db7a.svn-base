<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Fancy_Fields_For_WPForms Class.
 *
 * @class   Fancy_Fields_For_WPForms
 * @version 1.0.0
 */
final class Fancy_Fields_For_WPForms {

	/**
	 * Plugin version.
	 * @var string
	 */
	public $version = '1.0.5.1';


	/**
	 * Instance of this class.
	 * @var object
	 */
	protected static $_instance = null;

	/*
	 * Return an instance of this class.
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'fancy-fields-for-wpforms' ), '1.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'fancy-fields-for-wpforms' ), '1.0' );
	}

	/**
	 * Entries For WPForms Constructor.
	 */
	public function __construct() {

		// Load plugin text domain.
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		if ( defined( 'WPFORMS_VERSION' ) && version_compare( WPFORMS_VERSION, '1.1', '>=' ) ) {
			$this->define_constants();
			$this->includes();

		} else {
			add_action( 'admin_notices', array( $this, 'wpforms_missing_notice' ) );
		}

		do_action( 'fancy_fields_for_wpforms_loaded' );
	}

	/**
	 * Define FT Constants.
	 */
	private function define_constants() {
		$this->define( 'FFWP_ABSPATH', dirname( FANCY_FIELDS_FOR_WPFORMS ) . '/' );
		$this->define( 'FFWP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'FFWP_VERSION', $this->version );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name
	 * @param string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * What type of request is this?
	 *
	 * @param  string $type admin, ajax, cron or frontend.
	 *
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin' :
				return is_admin();
			case 'ajax' :
				return defined( 'DOING_AJAX' );
			case 'cron' :
				return defined( 'DOING_CRON' );
			case 'frontend' :
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/fancy-fields-for-wpforms/fancy-fields-for-wpforms-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/fancy-fields-for-wpforms-LOCALE.mo
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'fancy-fields-for-wpforms' );

		load_textdomain( 'fancy-fields-for-wpforms', WP_LANG_DIR . '/fancy-fields-for-wpforms/fancy-fields-for-wpforms-' . $locale . '.mo' );
		load_plugin_textdomain( 'fancy-fields-for-wpforms', false, plugin_basename( dirname( FANCY_FIELDS_FOR_WPFORMS ) ) . '/languages' );
	}


	/**
	 * Includes.
	 */
	private function includes() {
		include_once FFWP_ABSPATH . '/includes/class-ffwp-core.php';

		$fields = ffwp_unlocking_fields();

		foreach( $fields as $field ) {
			include_once FFWP_ABSPATH . '/includes/fields/class-ffwp-field-'.$field.'.php';
		}
	}

	/**
	 * wpforms compatibility notice.
	 */
	public function wpforms_missing_notice() {
		echo '<div class="error notice is-dismissible"><p>' . sprintf( esc_html__( 'Please install WPForms plugin to use Fancy Fields For WPForms.',  'fancy-fields-for-wpforms' ) ) .'</div>';
	}
}
