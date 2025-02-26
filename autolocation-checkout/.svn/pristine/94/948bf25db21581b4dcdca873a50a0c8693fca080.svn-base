<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://besyn.digital
 * @since      1.0.0
 *
 * @package    Autolocation_Checkout
 * @subpackage Autolocation_Checkout/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Autolocation_Checkout
 * @subpackage Autolocation_Checkout/public
 * @author     Besyn<support@besyn.digital>
 */
class Autolocation_Checkout_Public {

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
		 * defined in Autolocation_Checkout_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Autolocation_Checkout_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/autolocation-checkout-public.css', array(), $this->version, 'all' );

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
		 * defined in Autolocation_Checkout_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Autolocation_Checkout_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/autolocation-checkout-public.js', array( 'jquery' ), $this->version, false );

	}

	/**      Add Location field on checkout page */
  //http://www.google.com/maps/place/49.46800006494457,17.11514008755796

  
	public function  add_location_field( $checkout ) { 
 
	   woocommerce_form_field( 'location_ip', array(        
	      'type' => 'text',        
	      'class' => array( 'form-row-wide' ),        
	      'label' => 'Delivery location',        
	      'placeholder' => 'Delivery location',        
	      'required' => true,   
	       'id'=>'current_location' ,    
	      'default' => '',        
	   ), $checkout->get_value( 'location_ip' ) ); 
	}

	public function validate_location_field() {    
	   if ( ! $_POST['location_ip'] ) {
	      wc_add_notice( 'Please enter your Location', 'error' );
	   }
	}

	public function save_location_ip_field( $order_id ) { 
    if ( $_POST['location_ip'] ) update_post_meta( $order_id, '_location_ip', sanitize_text_field( $_POST['location_ip'] ) );
	}

	public function show_location_ip_field_order( $order ) {    
   $order_id = $order->get_id();
    $location_string=get_post_meta($order_id ,'_location_ip',true);
	 $location_array=explode(',', $location_string);

   //http://maps.google.com/maps?q=39.211374,-82.978277+(customer+location)&z=14&ll=39.211374,-82.978277

   	if ( get_post_meta( $order_id, '_location_ip', true ) ) echo '<p><strong>Location:</strong> <a target="_blank"href="http://maps.google.com/maps?q='. $location_array[0].','.$location_array[1].'+(customer+location)&z=14&ll='. $location_array[0].','.$location_array[1].'"> '. $location_array[0].','.$location_array[1].' </a></p>';
	}

function show_location_ip_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
	   $order_id = $order->get_id();
	 $location_string=get_post_meta($order_id ,'_location_ip',true);
	 $location_array=explode(',', $location_string);
    if ( get_post_meta( $order->get_id(), '_location_ip', true ) ) echo '<p><strong>Location:</strong> <a target="_blank"href="http://maps.google.com/maps?q='. $location_array[0].','.$location_array[1].'+(customer+location)&z=14&ll='. $location_array[0].','.$location_array[1].'"> '. $location_array[0].','.$location_array[1].' </a></p>';
}

function bbloomer_add_content_thankyou_paypal( $order_id ) {
	 $location_string=get_post_meta($order_id ,'_location_ip',true);
	 $location_array=explode(',', $location_string);

    if ( get_post_meta( $order_id, '_location_ip', true ) ) echo '<p><strong>Location:</strong> <a target="_blank"href="http://maps.google.com/maps?q='. $location_array[0].','.$location_array[1].'+(customer+location)&z=14&ll='. $location_array[0].','.$location_array[1].'"> '. $location_array[0].','.$location_array[1].' </a></p>';
}










	

}
