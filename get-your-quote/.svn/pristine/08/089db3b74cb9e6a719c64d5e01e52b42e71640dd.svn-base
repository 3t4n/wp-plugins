<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://development.brstdev.com/wptest/
 * @since      1.0.0
 *
 * @package    Services
 * @subpackage Services/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Services
 * @subpackage Services/public
 * @author     Tbi <sneha.sarda@brihaspatitech.com>
 */
class Gyq_Services_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Services_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Services_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//
	wp_enqueue_style( 'jquery-css', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css' ); 
	wp_enqueue_style( 'bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.css', array(),'3.4.1', 'all');
	wp_enqueue_style( 'font-awesome-css', plugin_dir_url( __FILE__ ) . 'css/font-awesome.css' );
	wp_enqueue_style( 'fontawesome-css', plugin_dir_url( __FILE__ ) . 'css/fontawesome.min.css' );
	wp_enqueue_style( 'swiper-css', plugin_dir_url( __FILE__ ) . 'css/swiper.css' );
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/services-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Services_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Services_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script('jquery-ui-datepicker');
	    wp_enqueue_script( 'swiper-script',plugin_dir_url( __FILE__ ) .'js/swiper.js', array('jquery'), '1.0.0', false );
		wp_enqueue_script( 'bootstrap-script',plugin_dir_url( __FILE__ ) .'js/bootstrap.js', array('jquery'), '4.1.0', false );
	    wp_enqueue_script( 'font-awesome',plugin_dir_url( __FILE__ ) .'js/font-awesome.js', array( 'jquery' ), '1.0.1', false );
		wp_enqueue_script( 'fontawesome',plugin_dir_url( __FILE__ ) .'js/fontawesome.min.js', array( 'jquery' ), '1.0.1', false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/services-public.js', array( 'jquery' ), $this->version, false );
		
	}

}
