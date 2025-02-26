<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.indianic.com/enquiry
 * @since      1.0.0
 *
 * @package    Nic_Addon_Custom_Fee_Cart
 * @subpackage Nic_Addon_Custom_Fee_Cart/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Nic_Addon_Custom_Fee_Cart
 * @subpackage Nic_Addon_Custom_Fee_Cart/public
 * @author     MageINIC <support@mageinic.com>
 */
class Nic_Addon_Custom_Fee_Cart_Public {

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
		 * defined in Nic_Addon_Custom_Fee_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nic_Addon_Custom_Fee_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nic-addon-custom-fee-cart-public.css', array(), $this->version, 'all' );

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
		 * defined in Nic_Addon_Custom_Fee_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nic_Addon_Custom_Fee_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nic-addon-custom-fee-cart-public.js', array( 'jquery' ), $this->version, false );

	}

	public static function nic_calculate_fee($cart_total) {
        global $woocommerce;
        if( get_option('extra_fee_type', true ) == 'percentage' ) {
            $fee = ($cart_total / 100) * get_option('extra_fee_amount', 0);
            $woocommerce->cart->add_fee(get_option('extra_fee_label', __('Extra Fee', 'nic-addon-custom-fee-cart')), $fee, get_option('extra_fee_in_taxable', false), get_option('extra_fee_tax_class', ''));
        } else {
            $woocommerce->cart->add_fee(get_option('extra_fee_label', __('Extra Fee', 'nic-addon-custom-fee-cart')), get_option('extra_fee_amount', 0), get_option('extra_fee_in_taxable', false), get_option('extra_fee_tax_class', ''));
        } 
    }

	/**
     * Function to add Custom Fee
     */
    public static function cart_calculate_fees_hook() {
        if( get_option('extra_fee_on', 'no') == 'yes' ){
        	global $woocommerce;
        	$cart_minimum_subtotal = get_option('cart_minimum_subtotal' , 0 ) ;
	        $cart_minimum_subtotal = floatval(str_replace(',', '',  $cart_minimum_subtotal));        
	        $cart_total =  preg_replace("/([^0-9\\.])/i", "", $woocommerce->cart->cart_contents_total) ;
	        if(get_option('extra_fee_on', true )=='yes' && get_option('extra_fee_on_min', true )=='yes'){
	            if ($cart_total >= $cart_minimum_subtotal) {
	                Nic_Addon_Custom_Fee_Cart_Public::nic_calculate_fee($cart_total);
	            }        
	        }else if(get_option('extra_fee_on', true )=='yes' && get_option('extra_fee_on_min', true )=='no'){
	            Nic_Addon_Custom_Fee_Cart_Public::nic_calculate_fee($cart_total);
	        } else {	           
	            Nic_Addon_Custom_Fee_Cart_Public::nic_calculate_fee($cart_total);	           
	        }
        }
    }

    

}
