<?php

namespace RankologyElementorBreadcrumbs;

// To prevent calling the plugin directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
	exit;
}

/**
 * Class Plugin
 *
 * Main Plugin class
 * 
 */
class Plugin {

	/**
	 * Instance
	 *
	 * 
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
	 * 
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
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * 
	 * @access private
	 */
	public function includes() {
		require_once( __DIR__ . '/widget-breadcrumbs.php' );
		require_once( __DIR__ . '/faq-schema.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * 
	 * @access public
	 */
	public function register_widgets() {
		// Include plugin files
		$this->includes();

		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Rankology_breadcrumbs_Widget() );

	}

	public function __construct() {
		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
	}

}
// Instantiate Plugin Class
Plugin::instance();
