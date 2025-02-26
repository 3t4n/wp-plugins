<?php
/*
 Amazing Neo 2.0.1
*/
namespace Elementoramazing;

/**
 * Class Amazing_Plugin
 *
 * Main Amazing_Plugin class
 * @since 1.0.0
 */
class Amazing_Plugin
{
    /**
     * Instance
     *
     * @since 1.0.0
     * @access private
     * @static
     *
     * @var Amazing_Plugin The single instance of the class.
     */
    private static  $_instance = null ;
    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @access public
     *
     * @return Amazing_Plugin An instance of the class.
     */
    public static function instance()
    {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function amazing_cwfe_register_options_page()
    {
        //create new top-level menu
        add_menu_page(
            __( 'amazing neo for elementor', 'amazing-neo-font-widget' ),
            __( 'Amazing Neo Icons', 'amazing-neo-font-widget' ),
            'manage_options',
            'contact_widgets',
            'amazing_contact_widgets_admin',
            plugins_url( '/includs/amazing-logo-16.png', __FILE__ )
        );
    }


	/**
	 * Register Widgets
	 *
	 * Load widgets files and register new Elementor widgets.
	 *
	 * Fired by `elementor/widgets/register` action hook.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {


        require_once AMZ_NEO_PATH . '/widgets/amazing-widget.php';
        require_once AMZ_NEO_PATH. '/widgets/amazing-widget-regular.php';
        require_once AMZ_NEO_PATH . '/widgets/amazing-widget-light.php';
        require_once AMZ_NEO_PATH . '/widgets/amazing-widget-brands.php';
        
		$widgets_manager->register( new Widgets\An_Amazing_Widget_light() );
		$widgets_manager->register( new Widgets\An_Amazing_Widget() );
		$widgets_manager->register( new Widgets\An_Amazing_Widget_regular() );
		$widgets_manager->register( new Widgets\An_Amazing_Widget_brands() );

	}
    
    public function amazing_elementor_init() {
        
        $elementor = \Elementor\Plugin::$instance;
        // Add element category in panel
        $elementor->elements_manager->add_category( 'amazing-neo-icon', [
            'title' => __( 'Amazing Neo Icon', 'amazing-neo-font-widget' ),
            'icon'  => 'an an-plug',
        ], 1 );
    }
    
    /**
     *  Plugin class constructor
     *
     * Register plugin action hooks and filters
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {

		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
        
        // Register scripts
        // Add new category for Elementor
        add_action( 'elementor/init', array( $this, 'amazing_elementor_init' ), 1 );
        // Add Admin Menu
        add_action( 'admin_menu', [ $this, 'amazing_cwfe_register_options_page' ] );
    }

}
// Instantiate Amazing_Plugin Class
Amazing_Plugin::instance();


