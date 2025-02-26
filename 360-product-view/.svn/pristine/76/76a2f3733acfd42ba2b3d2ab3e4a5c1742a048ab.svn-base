<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/minhtuan2086/
 * @since      1.0.0
 *
 * @package    Yup_360_Product
 * @subpackage Yup_360_Product/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Yup_360_Product
 * @subpackage Yup_360_Product/public
 * @author     MINH TUAN NGUYEN <minhtuan2086@gmail.com>
 */
class Yup_360_Product_Public {

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
		 * defined in Yup_360_Product_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yup_360_Product_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/yup-360-product-public.css', array(), $this->version, 'all' );

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
		 * defined in Yup_360_Product_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yup_360_Product_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name .'-threesixty', plugin_dir_url( __FILE__ ) . 'js/threesixty.min.js', array( 'jquery' ), $this->version, false );
		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/yup-360-product-public.js', array( 'jquery' ), $this->version, false );

	}

	public function remove_product_gallery() {

					global $post, $woocommerce;

					//check if post is object otherwise you're not in singular post
					
					if( !is_object($post) )  return;

							   $enableView = get_post_meta($post->ID, '_enableView', true);

					if ( !$enableView == NULL  ) {

								if ( is_single( $post->ID ) &&  $enableView === 'yes') {
										remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
										add_action( 'woocommerce_before_single_product_summary', array( $this,'yup_product_view'), 10);
								}

					}

			}// end functionality

			public function yup_product_view(){
						global $woocommerce;
						$template = woocommerce_get_template( 'templates/single-product/product-thumbnails.php', FALSE, FALSE, plugin_dir_path( dirname( __FILE__ ) )   . 'woocommerce/');
						return $template;
						exit;

			}


}
