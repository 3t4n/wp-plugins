<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public
 * @author     floristone
 */
class Florist_One_Flower_Delivery_Public {

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
	 * @since    1.0.2
	 */
	public function enqueue_styles() {

		$oa_fws_boot = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'css/fhws-solutions-obituaries-public-bootstrap.min.css'));
    wp_enqueue_style( 'FD-FONE-bootstrap-prefix', plugin_dir_url( __FILE__ ) . 'css/fhws-solutions-obituaries-public-bootstrap.min.css', array(), $oa_fws_boot, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
	  wp_enqueue_script( 'jquery-ui-dialog' );
    	//wp_enqueue_script( 'FD-FONE-bootstrap-js', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js", null , null ,false);
    	wp_enqueue_script( 'FD-FONE-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false);
		  wp_enqueue_script( 'jquery-validate', plugin_dir_url( __FILE__ ) . 'js/jquery.validate.js', array( 'jquery' ), $this->version, false);
		  wp_enqueue_script( 'jquery-history', plugin_dir_url( __FILE__ ) . 'js/jquery.history.js', array( 'jquery' ), $this->version, false);
    	$oa_fws_js_flw_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/florist-one-flower-delivery-public.min.js'));
    	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/florist-one-flower-delivery-public.min.js', array( 'jquery', 'jquery-history' ),  $oa_fws_js_flw_ver, false );
		global $post;
		wp_localize_script( $this->plugin_name, 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'flower_base_url' => get_permalink($post) ) );
	}

}
