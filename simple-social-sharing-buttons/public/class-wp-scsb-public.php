<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.2803media.fr/
 * @since      1.0.0
 *
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/public
 * @author     2803 MEDIA <henri@2803media.fr>
 */
class Wp_Scsb_Public {

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
		 * defined in Wp_Scsb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Scsb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        add_action('wp_enqueue_scripts', 'henri_check_font_awesome', 1);

        function henri_check_font_awesome() {
          global $wp_styles;
          $srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src') );
          if ( in_array('font-awesome.css', $srcs) || in_array('font-awesome.min.css', $srcs)  ) {
            /* echo 'font-awesome.css registered'; */
          } else {
			  wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), '4.5.0', 'all' );
		  }
        }

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-scsb-public.css', array(), $this->version, 'all' );

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
		 * defined in Wp_Scsb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Scsb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-scsb-public.js', array( 'jquery' ), $this->version, false );


	}

}
