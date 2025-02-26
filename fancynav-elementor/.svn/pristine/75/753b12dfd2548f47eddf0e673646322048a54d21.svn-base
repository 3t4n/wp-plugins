<?php
namespace ElementorFancyNav;

/**
 * Main Plugin class
 */
class Plugin {

	/** Instance */
	private static $_instance = null;

    /** Ensures only one instance of the class is loaded or can be loaded. */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/** Load required plugin core files. */
	public function widget_scripts() {
		wp_register_script( 'fancynav-init', plugins_url( '/assets/js/fancynav-init.min.js', __FILE__ ), [], '1.1.0', true );
	}

	/** Include Widgets files */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/fancynav.php' );
	}

	/** Register the Widgets */
	public function register_widgets() {
		// Include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\FancyNav_Widget() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 */
	public function __construct() {

	    // Register widget CSS
        wp_register_style( 'fancynav', plugins_url( '/assets/css/fancynav.min.css', __FILE__ ), array(), '1.1.0' );

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

}

// Instantiate Plugin Class
Plugin::instance();
?>