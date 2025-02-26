<?php

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class BTS_main_class {


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

		wp_enqueue_script('jquery');
		
        wp_register_script( 'gs_popper-js', plugins_url( '/assets/js/popper-v1.14.3.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'gs_popper-js' );

        wp_register_script( 'gs_bootstrap-js', plugins_url( '/assets/js/bootstrap-v4.1.3.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'gs_bootstrap-js' );

        wp_register_script( 'gs_slick-js', plugins_url( '/assets/js/slick.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'gs_slick-js' );

        wp_register_script( 'main-js', plugins_url( '/assets/js/main.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'main-js' );
		 		 

	}
	
	/**
	 * widget_styles
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_styles(){
		wp_register_style("gs_font-awesome",plugins_url("/assets/css/font-awesome.min.css",__FILE__));
		wp_enqueue_style( 'gs_font-awesome' );

		wp_register_style("flaticon",plugins_url("/assets/css/flaticon.css",__FILE__));
		wp_enqueue_style( 'flaticon' );
		
		wp_register_style("slick",plugins_url("/assets/css/slick.css",__FILE__));
		wp_enqueue_style( 'slick' );
		
		wp_register_style("gs_bootstrap",plugins_url("/assets/css/bootstrap-v4.1.3.min.css",__FILE__));
		wp_enqueue_style( 'gs_bootstrap' );
		
		wp_register_style("global",plugins_url("/assets/css/global.css",__FILE__));
		//wp_enqueue_style( 'global' );
		
		wp_register_style("gs_style",plugins_url("/assets/css/style.css",__FILE__));
		wp_enqueue_style( 'gs_style' );


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



		require_once( __DIR__ . '/inc/function.php' );
		require_once( __DIR__ . '/inc/advanced-testimonial-slide.php' );
		require_once( __DIR__ . '/inc/CMB2/init.php');
		require_once( __DIR__ . '/inc/CMB2/options.php');
		require_once( __DIR__ . '/inc/shortcode-metabox.php');



		add_action( 'wp_enqueue_scripts', array( $this, 'widget_styles' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'widget_scripts' ), 10 );


	}
}

// Instantiate Plugin Class
BTS_main_class::instance();
