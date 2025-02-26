<?php
namespace CliccheWidgetsForElementor;

use CliccheWidgetsForElementor\Widgets\CliccheAnimatedHamburger;
 
/**
 * Class CWFE_Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class CWFE_Plugin {
 
  /**
   * Instance
   *
   * @since 1.0.0
   * @access private
   * @static
   *
   * @var Plugin The single instance of the class.
   */
  private static $_instance = null;  

  CONST widget_domain 		= 'clicche-elementor';
 
	 /**
   *  Plugin class constructor
   *
   * Register plugin action hooks and filters
   *
   * @since 1.2.0
   * @access public
   */
  public function __construct() {
	 
		// Register widget scripts on FRONTEND
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		
		// Register widget styles on FRONTEND
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'frontend_widget_styles' ] );
		
		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		
		// Register category
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_categories' ] );
		
		// Load editor CSS on EDITOR
		add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'load_admin_css' ) );
		
  }
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
		
		wp_enqueue_script( self::widget_domain, plugins_url( '/assets/js/clicche_animated_hamburger.min.js', __FILE__ ), [ 'jquery' ], CLICCHE_ANIMATED_HAMBURGER_VERSION, true );
		
  }
  
  /**
	 * admin_widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function load_admin_css() {
		
		wp_enqueue_style( 'clicche-widgets-admin', plugins_url( '/assets/admin/css/editor.css', __FILE__ ), false, CLICCHE_ANIMATED_HAMBURGER_VERSION );		
		
	}
  
    /**
   * widget_styles
   *
   * Load required plugin core files.
   *
   * @since 1.2.0
   * @access public
   */
  public function frontend_widget_styles() {		
		
		wp_enqueue_style( 'animated-hamburger-for-elementor', plugins_url( '/assets/frontend/css/hamburger.css', __FILE__ ), false, CLICCHE_ANIMATED_HAMBURGER_VERSION );
		
		
  }  
  
  public function register_categories( $elements_manager ) {
	  
		$elements_manager->add_category(
			  'widgets-by-clicche',
			  [
				'title' => __( 'Widgets by Clicche', self::widget_domain ),
				'icon' => 'fa fa-plug',
			  ]
		);
	
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
		
		// Register Widgets	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CliccheAnimatedHamburger() );
		
  }
 

}
 
// Instantiate Plugin Class
CWFE_Plugin::instance();