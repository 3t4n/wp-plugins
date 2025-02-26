<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       automob.co.za
 * @since      1.0.0
 *
 * @package    Automob
 * @subpackage Automob/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Automob
 * @subpackage Automob/public
 * @author     Luke Madzedze <lukemadzedze@gmail.com>
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Public {

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
		 * defined in Automob_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Automob_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'amcs_jquery.fancybox-1.3.4', plugin_dir_url( __FILE__ ) . 'fancybox/jquery.fancybox.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'amcs_jquery.fancybox-buttons', plugin_dir_url( __FILE__ ) . 'fancybox/helpers/jquery.fancybox-buttons.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'amcs_jquery.fancybox-thumbs', plugin_dir_url( __FILE__ ) . 'fancybox/helpers/jquery.fancybox-thumbs.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'amcs_bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/automob-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'amcs_rangeslider', plugin_dir_url( __FILE__ ) . 'css/rangeslider.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'amcs_select2.min', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', array(), $this->version, 'all' );

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
		 * defined in Automob_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Automob_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('amcs_jquery.fancybox-media', plugin_dir_url( __FILE__ ) . 'fancybox/helpers/jquery.fancybox-media.js', array('jquery'), $this->version, false );

		wp_enqueue_script('amcs_jquery.fancybox-thumbs', plugin_dir_url( __FILE__ ) . 'fancybox/helpers/jquery.fancybox-thumbs.js', array('jquery'), $this->version, false );

		wp_enqueue_script('amcs_jquery.fancybox.pack', plugin_dir_url( __FILE__ ) . 'fancybox/jquery.fancybox.pack.js', array('jquery'), $this->version, false );

		// wp_enqueue_script('jquery.easing.pack', plugin_dir_url( __FILE__ ) . 'fancybox/jquery.easing.pack.js', array('jquery'), $this->version, false );


		wp_enqueue_script('amcs_jquery.fancybox-buttons', plugin_dir_url( __FILE__ ) . 'fancybox/helpers/jquery.fancybox-buttons.js', array('jquery'), $this->version, false );


		wp_enqueue_script('amcs_jquery.mousewheel-3.0.6.pack', plugin_dir_url( __FILE__ ) . 'js/jquery.mousewheel-3.0.6.pack', array('jquery'), $this->version, false );

		
		wp_enqueue_script('amcs_angular', plugin_dir_url( __FILE__ ) . 'js/angular.min.js', array(), $this->version, false );
		wp_enqueue_script('amcs_angular-filter', plugin_dir_url( __FILE__ ) . 'js/angular-filter.min.js', array('amcs_angular'), $this->version, false );
		
		wp_enqueue_script('amcs_bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array('jquery'), $this->version, false );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/automob-public.js', array( 'amcs_angular' ), $this->version, false );
		wp_enqueue_script('amcs_rangeslider.min', plugin_dir_url( __FILE__ ) . 'js/rangeslider.min.js', array('jquery'), $this->version, false );
		wp_enqueue_script('amcs_select2.min', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array('jquery'), $this->version, false );
		wp_enqueue_script('am-script', plugin_dir_url( __FILE__ ) . 'js/script.js', array('jquery','amcs_rangeslider.min'), $this->version, false );
		
		wp_localize_script( $this->plugin_name, 'amSearchParams', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'site_url' => get_bloginfo('wpurl')
		//'search_url' => $search_url
		));

		wp_localize_script( 'am-script', 'am_settings', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'site_url' => get_bloginfo('wpurl'),
			'decimal_separater'=>get_option('decimal-separater'),
			'thousands_separater'=>get_option('thousands_separater'),
			'distance_unit'=>get_option('distance_unit'),
			'currency_symbol'=>	get_option('currency_symbol')
		//'search_url' => $search_url
		));


	}

	// public function get_custom_post_type_template($single_template) {
	//      global $post;
	//      if ($post->post_type == AUTOMOB_CPT_CAR) {
	//      	$table = new Automob_Car_Table();
	     	
	//      	global $vehicle;
 // 			$vehicle=$table->getFirst($post->ID);
		  
 //          	$single_template = AUTOMOB_PLUGIN_DIR . '/templates/single-car.php';
	//      }
	//      return $single_template;
	// }

}
