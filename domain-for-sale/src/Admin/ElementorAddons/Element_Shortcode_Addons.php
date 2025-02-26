<?php
/**
 * The plugin elementor addons.
 *
 * @link       https://themeatelier.net/
 * @since      1.0.0
 *
 * @package    domain_for_sale
 * @subpackage domain_for_sale/Admin/ElementorAddons
 * @author     ThemeAtelier <themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\DomainForSale\Admin\ElementorAddons;
use ThemeAtelier\DomainForSale\Admin\ElementorAddons\Widgets;

/**
 * Elementor shortcode addon.
 */
class Element_Shortcode_Addons {
	/**
	 * Script and Style suffix
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $min;

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Element_Shortcode_Addons The single instance of the class.
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
	 * @return Element_Shortcode_Addons An instance of the class.

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
		$this->on_plugins_loaded();
		add_action( 'elementor/preview/enqueue_scripts', array( $this, 'domain_for_sale_enqueue_scripts' ) );
	}

	public function domain_for_sale_enqueue_scripts() {
		wp_enqueue_script('domain-for-sale-elementor', DOMAIN_FOR_SALE_ASSETS . 'js/domain-for-sale-elementor' . $this->min . '.js', array('jquery'), DOMAIN_FOR_SALE_VERSION, true);
	}

	/**
	 * On Plugins Loaded
	 *
	 * Checks if Elementor has loaded, and performs some compatibility checks.
	 * If All checks pass, inits the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_plugins_loaded() {
		add_action( 'elementor/init', array( $this, 'init' ) );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {
		// Add Plugin actions.
		add_action( 'elementor/widgets/register', array( $this, 'init_widgets' ) );
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
		// Register widget.
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Element_Shortcode_Widget() );
	}
}
Element_Shortcode_Addons::instance();