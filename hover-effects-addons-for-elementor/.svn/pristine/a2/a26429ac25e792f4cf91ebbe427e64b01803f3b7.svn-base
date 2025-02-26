<?php
/**
 * Plugin Name: Hover Effects Addons for Elementor
 * Description: Hover effects for your images with Elementor Page Builder.
 * Plugin URI:  https://pixelonetry.com/downloads/hover-effects-addons-for-elementor-wordpress-plugin
 * Version:     1.0.1
 * Author:      pixelonetry
 * Author URI:  https://pixelonetry.com
 * Text Domain: hover-effects-addons-for-elementor
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Bdevs Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class HowerEffectsElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var HowerEffectsElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return HowerEffectsElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'hover-effects-addons-for-elementor' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'hover-effects-addons-for-elementor' ),
			'<strong>' . esc_html__( 'Hower Effects Elementor Addon', 'hover-effects-addons-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'hover-effects-addons-for-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		//if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}
	
		// Build the message using sprintf and escape the translations
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'hover-effects-addons-for-elementor' ),
			esc_html__( 'Hover Effects Addons for Elementor', 'hover-effects-addons-for-elementor' ),
			esc_html__( 'Elementor', 'hover-effects-addons-for-elementor' ),
			esc_html( self::MINIMUM_ELEMENTOR_VERSION ) // Escape the version number as well
		);
	
		// Escape the entire message before outputting it
		printf( '<div class="notice notice-warning is-dismissible"><p>%s</p></div>', esc_html( $message ) );
	
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		//if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}
	
		// Build the message using sprintf and escape the translations
		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'hover-effects-addons-for-elementor' ),
			esc_html__( 'Hover Effects Addons for Elementor', 'hover-effects-addons-for-elementor' ),
			esc_html__( 'PHP', 'hover-effects-addons-for-elementor' ),
			esc_html( self::MINIMUM_PHP_VERSION ) // Escape the PHP version
		);
	
		// Escape the entire message before outputting it
		printf( '<div class="notice notice-warning is-dismissible"><p>%s</p></div>', esc_html( $message ) );
	
	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('hover-effects-addons-for-elementor',
	      	array(
					'title' => __( 'Hover Effects Addons for Elementor', 'hover-effects-addons-for-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'hover-effects-addons-for-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/hover-effects-addons-for-elementor.js', array( 'jquery' ), self::VERSION );
	}

	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
		// Register the first CSS file
		wp_register_style( 'hover-effects-addons-for-elementor-owhover', plugin_dir_url( __FILE__ ) . 'assets/css/ohover.css', array(), self::VERSION );
		// Enqueue the first CSS file
		wp_enqueue_style( 'hover-effects-addons-for-elementor-owhover' );
	
		// Register the second CSS file
		wp_register_style( 'hover-effects-addons-for-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/hover-effects-addons-for-elementor.css', array(), self::VERSION );
		// Enqueue the second CSS file
		wp_enqueue_style( 'hover-effects-addons-for-elementor' );
	}
	

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect8-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect9-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/effect10-widget.php';
		
		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect5() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect6() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect8() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect9() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HowerEffectsElementor\Widget\BdevsEffect10() );

	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			// Use 'wp_kses_post' to allow only safe HTML tags and attributes in the output.
			echo wp_kses_post( do_shortcode( '[elementor-template id="' . esc_attr( $id ) . '"]' ) );
		} else {
			// Escape the output to ensure safe HTML.
			echo wp_kses_post( \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id ) );
		}
	}

	/**
	 * Upgrade to Pro
	 */

}

HowerEffectsElementor::instance();

class HoverEffectsAddonsForElementor {
    
    public function __construct() {
        // Add "Upgrade to Pro" link in the Plugins page
        add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), [ $this, 'add_upgrade_to_pro_link' ] );
    }

    /**
     * Add "Upgrade to Pro" link to the plugin action links
     *
     * @param array $links Existing plugin action links.
     * @return array Modified plugin action links.
     */
    public function add_upgrade_to_pro_link( $links ) {
        // Add the custom Upgrade to Pro link
        $upgrade_link = '<a href="' . esc_url( 'https://pixelonetry.com/downloads/hover-effects-addons-for-elementor-wordpress-plugin/' ) . '" style="color: #2d85d6; font-weight: bold;" target="_blank">'
            . esc_html__( 'Upgrade to Pro', 'hover-effects-addons-for-elementor' )
            . '</a>';
        
        // Add the link to the beginning of the action links array
        array_unshift( $links, $upgrade_link );
        
        return $links;
    }
}

// Initialize the plugin
new HoverEffectsAddonsForElementor();
