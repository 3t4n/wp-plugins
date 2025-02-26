<?php
/**
 * Plugin Name:       Author Website Templates
 * Plugin URI:
 * Description:       Effortlessly design stunning websites for authors, writers, publishers, and bloggers with Elementor using Author Website Templates.
 * Version:           1.0.3
 * Requires at least: 4.9
 * Requires PHP:      7.0
 * Author:            RS WP THEMES
 * Author URI:        https://rswpthemes.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       author-website-templates
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (!defined('RSWPTHEMES_AWT_PLUGIN_URL')) {
	define('RSWPTHEMES_AWT_PLUGIN_URL', plugin_dir_url( __file__ ));
}

if (!defined('RSWPTHEMES_AWT_PLUGIN_PATH')) {
	define('RSWPTHEMES_AWT_PLUGIN_PATH', plugin_dir_path( __file__ ));
}

$getplugindata = get_file_data(__FILE__, array('Version' => 'Version'), false);

$rswpthemes_awt_version = $getplugindata['Version'];

if (!defined('RSWPTHEMES_AWT_VERSION')) {
	define('RSWPTHEMES_AWT_VERSION', $rswpthemes_awt_version);
}

final class Rswpthemes_Author_Website_Templates {

	/**
	 * Plugin Version
	 *
	 * @since 1.1.3
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
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Rswpthemes_Author_Website_Templates The single instance of the class.
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
	 * @return Rswpthemes_Author_Website_Templates An instance of the class.
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
		add_action( 'plugins_loaded', [ $this, 'init' ] );
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

		// Add Plugin actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		// add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		add_action( 'wp_enqueue_scripts', [$this, 'rswpthemes_awt_enqueue_scripts'], 10 );
		/**
		 * Register Icons Library
		 */
	}

	public function register_rswpthemes_icons_library( $tabs_manager ) {
	    // Define the custom icon set
	    $tabs_manager->add_tab( 'rswpthemes_icons', [
	        'name'          => 'rswpthemes_icons', // Internal name for the tab
	        'label'         => __( 'Rswpthemes Icons', 'author-website-templates' ), // The label for the icon set
	        'labelIcon'     => 'eicon-star', // Icon for the tab itself in Elementor
	        'prefix'        => 'icon-', // Prefix for the custom icons
	        'displayPrefix' => '', // Optional display prefix in the icon selector
	        'url'           => RSWPTHEMES_AWT_PLUGIN_URL . '/includes/icons/icons.css', // CSS file for custom icons
	        'fetchJson'     => RSWPTHEMES_AWT_PLUGIN_URL . '/includes/icons/icons.json', // JSON file for icons metadata
	        'ver'           => '1.0', // Optional version
	        'native'        => false, // Set to false to indicate it's a custom icon set
	    ] );
	}

	public function rswpthemes_awt_enqueue_scripts(){

		wp_register_style( 'rswpthemes-awt-full-width-book-slider', RSWPTHEMES_AWT_PLUGIN_URL . 'elementor-widgets/full-width-book-slider/full-width-book-slider.css', array(), '1.0.0' );
		wp_register_style( 'rswpthemes-awt-books-gallery', RSWPTHEMES_AWT_PLUGIN_URL . 'elementor-widgets/books-gallery/books-gallery.css', array(), '1.0.0' );
		wp_register_style( 'rswpthemes-awt-about-section', RSWPTHEMES_AWT_PLUGIN_URL . 'elementor-widgets/about-section/about-section.css', array(), '1.0.0' );
		wp_register_style( 'rswpthemes-awt-email-signup', RSWPTHEMES_AWT_PLUGIN_URL . 'elementor-widgets/signup-section/signup-section.css', array(), '1.0.0' );
		wp_register_script( 'rswpthemes-awt-full-width-book-slider', RSWPTHEMES_AWT_PLUGIN_URL . 'elementor-widgets/full-width-book-slider/full-width-book-slider.js', array('jquery'), '1.0.0' );
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
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'author-website-templates' ),
			'<strong>' . esc_html__( 'Extra Addons For Elementor', 'author-website-templates' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'author-website-templates' ) . '</strong>'
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

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'author-website-templates' ),
			'<strong>' . esc_html__( 'Extra Addons For Elementor', 'author-website-templates' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'author-website-templates' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

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

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'author-website-templates' ),
			'<strong>' . esc_html__( 'Extra Addons For Elementor', 'author-website-templates' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'author-website-templates' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

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
		require_once( __DIR__ . '/elementor-widgets/full-width-book-slider/rswpthemes-awt-full-width-book-slider.php' );
		require_once( __DIR__ . '/elementor-widgets/about-section/rswpthemes-awt-about-section.php' );
		require_once( __DIR__ . '/elementor-widgets/signup-section/rswpthemes-awt-signup-section.php' );
		require_once( __DIR__ . '/elementor-widgets/books-gallery/rswpthemes-awt-books-gallery.php' );
		require_once( __DIR__ . '/elementor-widgets/book-reviews/rswpthemes-awt-book-reviews-slider.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register( new \Rswpthemes_Awt_Full_Width_Book_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Rswpthemes_Awt_About_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Rswpthemes_Awt_Email_Signup_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Rswpthemes_Awt_Book_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Rswpthemes_Awt_Book_Reviews_Slider() );

	}

}

Rswpthemes_Author_Website_Templates::instance();

/**
 * Register New Category For Author Website Templates Widgets
 */
add_action( 'elementor/elements/categories_registered', 'rswpthemes_awt_add_elementor_widget_categories' );
function rswpthemes_awt_add_elementor_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'rswpthemes_awt_widgets',
		[
			'title' => __( 'Author Website Template Widgets', 'author-website-templates' ),
		]
	);

}

add_filter( 'elementor/icons_manager/additional_tabs', 'rswpthemes_awt_register_custom_icon_library' );
function rswpthemes_awt_register_custom_icon_library( $tabs ) {
    // Define the custom icon set
    $tabs['rswpthemes_icon'] = [
        'name'          => 'rswpthemes_icon', // Internal name for the tab
        'label'         => __( 'Rswpthemes Icons', 'author-website-templates' ), // The label for the icon set
        'labelIcon'     => 'eicon-star', // Icon for the tab itself in Elementor
        'prefix'        => 'rswpthemes-icon ', // Prefix for the custom icons (ensure this matches your CSS)
        'displayPrefix' => '', // Optional display prefix in the icon selector
        'url'           => RSWPTHEMES_AWT_PLUGIN_URL . 'includes/icons/icons.css', // CSS file for custom icons
        'fetchJson'     => RSWPTHEMES_AWT_PLUGIN_URL . 'includes/icons/icons.json', // JSON file for icons metadata
        'ver'           => '1.0', // Optional version
        'native'        => false, // Set to false to indicate it's a custom icon set
    ];
    return $tabs;
}