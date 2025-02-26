<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/CylasKiganda/previous-next-edit-order-links-for-woocommerce
 * @since      1.0.1
 *
 * @package    Previous_Next_Edit_Order_Links_For_Woocommerce
 * @subpackage Previous_Next_Edit_Order_Links_For_Woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Previous_Next_Edit_Order_Links_For_Woocommerce
 * @subpackage Previous_Next_Edit_Order_Links_For_Woocommerce/public
 * @author     Belo <belocodes@gmail.com>
 */
class Previous_Next_Edit_Order_Links_For_Woocommerce_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.1
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
	 * @since    1.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Previous_Next_Edit_Order_Links_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Previous_Next_Edit_Order_Links_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/previous-next-edit-order-links-for-woocommerce-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Previous_Next_Edit_Order_Links_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Previous_Next_Edit_Order_Links_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/previous-next-edit-order-links-for-woocommerce-public.js', array( 'jquery' ), $this->version, false );

	}

}
