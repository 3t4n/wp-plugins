<?php
namespace AIDataTemplates;

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


	/** @var \Elementor\Elements_Manager $elements_manager */
	public function ai_category_registered($elements_manager){
		$categories = $elements_manager->get_categories();
		if (!key_exists('ai-data-elements',$categories)) {
			$elements_manager->add_category(
				'ai-data-elements',
				array(
					'title' => esc_html__('AI Widgets', 'ai-elementor'),
					'icon'  => 'fa fa-plug'
				)
			);
		}
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
		wp_enqueue_style( 'ai-animate', AIDA_ASSETS_URL . 'css/animate.css', AIDA_VERSION );
		wp_enqueue_style( 'ai-bootstrap', AIDA_ASSETS_URL . 'css/bootstrap.min.css', AIDA_VERSION );
		wp_enqueue_style( 'ai-dzsparallaxer', AIDA_ASSETS_URL . 'css/dzsparallaxer.css', AIDA_VERSION );
		wp_enqueue_style( 'ai-magnific-popup', AIDA_ASSETS_URL . 'css/magnific-popup.css', AIDA_VERSION );
		wp_enqueue_style( 'ai-owl-carousel', AIDA_ASSETS_URL . 'css/owl.carousel.min.css', AIDA_VERSION );
		wp_enqueue_style( 'ai-style', AIDA_ASSETS_URL . 'css/style.css', AIDA_VERSION );
		wp_enqueue_style( 'ai-responsive', AIDA_ASSETS_URL . 'css/responsive.css', AIDA_VERSION );

		wp_enqueue_script( 'ai-plugins', AIDA_ASSETS_URL . 'js/plugins.js', array('jquery'), AIDA_VERSION, true );
		wp_enqueue_script( 'ai-bootstrap', AIDA_ASSETS_URL . 'js/bootstrap.min.js', array('jquery'), AIDA_VERSION, true );
		wp_enqueue_script( 'ai-dzsparallaxer', AIDA_ASSETS_URL . 'js/dzsparallaxer.js', array('jquery'), AIDA_VERSION, true );
		wp_enqueue_script( 'ai-syotimer', AIDA_ASSETS_URL . 'js/jquery.syotimer.min.js', array('jquery'), AIDA_VERSION, true );
		wp_enqueue_script( 'ai-popper', AIDA_ASSETS_URL . 'js/popper.min.js', array('jquery'), AIDA_VERSION, true );
		wp_enqueue_script( 'ai-script', AIDA_ASSETS_URL . 'js/script.js', array('jquery'), AIDA_VERSION, true );
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
		require_once( AIDA_PATH . '/widgets/hero-section.php' );
		require_once( AIDA_PATH . '/widgets/about-us.php' );
		require_once( AIDA_PATH . '/widgets/heading.php' );
		require_once( AIDA_PATH . '/widgets/compare.php' );
		require_once( AIDA_PATH . '/widgets/api-box.php' );
		require_once( AIDA_PATH . '/widgets/faq.php' );
		require_once( AIDA_PATH . '/widgets/team.php' );
		require_once( AIDA_PATH . '/widgets/partners.php' );
		require_once( AIDA_PATH . '/widgets/service.php' );
		require_once( AIDA_PATH . '/widgets/service-section.php' );
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
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HeroSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AboutUsSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_Compare() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_API_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_Partners() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AIDA_Service_Section() );
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

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', array(&$this, 'widget_scripts') );

		add_action( 'elementor/elements/categories_registered', array(&$this, 'ai_category_registered') );
		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', array(&$this, 'register_widgets') );

	}
}

// Instantiate Plugin Class
Plugin::instance();
