<?php
namespace AddonPackageForElementor;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'addon-package-for-elementor', plugins_url( '/assets/js/addon-package-for-elementor.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'apfetd-flexslider-js', plugins_url( '/ressources/flexslider/jquery.flexslider-min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script('apfetd-flexslider-js');
	}
	

	public function widget_styles() {
		wp_register_style('apfetd-flexslider-css', plugins_url('/ressources/flexslider/flexslider.css',__FILE__ ));
		wp_enqueue_style('apfetd-flexslider-css');
	}
	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/apfe_slider_widget.php' );
		require_once( __DIR__ . '/widgets/apfe_slider_woo_widget.php' );
		require_once( __DIR__ . '/widgets/apfe_slider_posts_widget.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {	
		$this->include_widgets_files();
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\APFE_FLEXSLIDER() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\APFE_WOO_FLEXSLIDER() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\APFE_POSTS_FLEXSLIDER() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

Plugin::instance();
