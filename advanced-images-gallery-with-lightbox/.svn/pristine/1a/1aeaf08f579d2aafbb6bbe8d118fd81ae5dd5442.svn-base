<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.itpathsolutions.com/
 * @since      1.0.0
 *
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/public
 * @author     It Path Solutions <shailm@itpathsolutions.com>
 */
class Advanced_Images_Gallery_With_Lightbox_Public {

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
		 * defined in Advanced_Images_Gallery_With_Lightbox_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Images_Gallery_With_Lightbox_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-images-gallery-with-lightbox-public.css', array(), $this->version, 'all' );
		/* Fancybox css */
		wp_enqueue_style( $this->plugin_name.'-fancy-custom', plugin_dir_url( __FILE__ ) . 'css/jquery.fancybox.min.css', array(), $this->version, 'all' );	
		
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
		 * defined in Advanced_Images_Gallery_With_Lightbox_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Images_Gallery_With_Lightbox_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advanced-images-gallery-with-lightbox-public.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->plugin_name.'-fancy', plugin_dir_url( __FILE__ ) . 'js/jquery.fancybox.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->plugin_name.'-fancy-custom', plugin_dir_url( __FILE__ ) . 'js/fancybox-custom.js', array( 'jquery' ), $this->version, false );
		

	}
		/* Register Shortcode */
		public function register_aigwl_gallery_shortcode() {
			add_shortcode('aigwl_gallery', array($this, 'aigwl_gallery_shortcode'));
		}

		/* Shortcode With Attributes */  
		public function aigwl_gallery_shortcode($aigwl_attributes) {
			
			if(isset($aigwl_attributes['gallery_id']) && $aigwl_attributes['gallery_id']){
					ob_start();
					require(dirname(__FILE__) . '/partials/advanced-images-gallery-with-lightbox-public-display.php');
						
			}
			else{
				esc_attr_e('Oops seems you entered incorrect Shortcode of Advanced Images Gallery With Lightbox.');
			}
			return ob_get_clean();
		}
}