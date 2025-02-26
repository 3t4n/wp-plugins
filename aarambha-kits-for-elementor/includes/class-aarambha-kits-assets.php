<?php
/**
 * Assest Manager Class
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes/elementor
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

class Aarambha_Kits_Assets {

	/**
	 * Modules
	 *
	 * @var modules
	 */
	private static $modules = null;

	/**
	 * Class Instance
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private static $instance = null;

	/**
	 * Class Construct
	 *
	 * @since    1.0.0
	 * @access   public
	 */

	public function __construct() {

		self::$modules = aarambha_kits_get_options();

		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Include elementor related files
	 *
	 * @return void
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( did_action( 'elementor/loaded' ) ) {

			// Register Category
			add_action( 'elementor/elements/categories_registered', array( $this, 'register_category' ) );

			// Register widgets
			add_action( 'elementor/widgets/register', array( $this, 'elementor_widgets' ) );

			// Enqueue the styles for use within Elementor only.
			add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'elementor_enqueue_style' ) );

		}

		// Register widgets
		add_action( 'widgets_init', array( $this, 'wp_widgets' ) );

	}

	/**
	 * Elementor Init
	 *
	 * @return [void]
	 */
	public function register_category() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/elementor/class-aarambha-kits-elementor-category.php';
	}

	/**
	 * Register elementor widgets
	 *
	 * @return [void]
	 */
	public function elementor_widgets() {

		// Require the Widget Base class.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/elementor/widgets/base-widget.php';

		$enabled_elements = self::$modules;

		foreach ( glob( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/elementor/widgets/' . '*.php' ) as $file ) {

			$slug = str_replace( 'class-aarambha-kits-', '', basename( $file, '.php' ) );

			$enabled = isset( $enabled_elements[ $slug ] ) ? $enabled_elements[ $slug ] : '';

			if ( filter_var( $enabled, FILTER_VALIDATE_BOOLEAN ) || ! $enabled_elements ) {
				$this->register_elementor_widgets( $file );
			}
		}

	}

	/**
	 *
	 * Register elementor Widgets by file name.
	 *
	 * @access public
	 *
	 * @param  string $file File name.
	 *
	 * @return void
	 */
	public function register_elementor_widgets( $file ) {

		$widget_manager = \Elementor\Plugin::instance()->widgets_manager;

		$base  = basename( str_replace( '.php', '', $file ) );
		$class = ucwords( str_replace( '-', ' ', $base ) );
		$class = str_replace( ' ', '_', $class );
		$class = str_replace( 'Class_', '', $class );

		require $file;

		if ( class_exists( $class ) ) {
			$widget_manager->register( new $class() );
		}
	}


	/**
	 *  Enqueue the styles for use within Elementor Editor only.
	 *
	 * @return [void]
	 */
	public function elementor_enqueue_style() {

		// Enqueue the main Elementor CSS file for use with Elementor.
		wp_enqueue_style( 'aarambha-kits-elementor', AARAMBHA_KITS_URL . 'assets/build/css/eicons.css', array(), AARAMBHA_KITS_VERSION );
	}

	/**
	 * Register wp custom widgets
	 *
	 * @return [void]
	 */
	public function wp_widgets() {

		// Require the Widget Base class.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/widgets/base-wp-widget.php';

		$enabled_elements = self::$modules;

		foreach ( glob( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/widgets/' . '*.php' ) as $file ) {

			$slug = str_replace( 'class-aarambha-kits-', '', basename( $file, '.php' ) );

			$enabled = isset( $enabled_elements[ $slug ] ) ? $enabled_elements[ $slug ] : '';

			if ( filter_var( $enabled, FILTER_VALIDATE_BOOLEAN ) || ! $enabled_elements ) {
				$this->wp_register_widgets( $file );
			}
		}

	}

	/**
	 *
	 * Register wp widgets by file name.
	 *
	 * @access public
	 *
	 * @param  string $file File name.
	 *
	 * @return void
	 */
	public function wp_register_widgets( $file ) {

		$base  = basename( str_replace( '.php', '', $file ) );
		$class = ucwords( str_replace( '-', ' ', $base ) );
		$class = str_replace( ' ', '_', $class );
		$class = str_replace( 'Class_', '', $class );

		require $file;

		if ( class_exists( $class ) ) {
			register_widget( $class );
		}
	}


	/**
	 * Creates and returns an instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return object
	 */
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
if ( ! function_exists( 'aarambha_kits_assets' ) ) {

	/**
	 * Returns an instance of class.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	function aarambha_kits_assets() {
		return Aarambha_Kits_Assets::get_instance();
	}
}
aarambha_kits_assets();

