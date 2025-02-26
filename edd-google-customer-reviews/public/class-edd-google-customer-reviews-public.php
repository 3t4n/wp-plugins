<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       dcgws.com
 * @since      1.0.0
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/public
 */
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/public
 * @author     David Davis <david.davis@dcgws.com>
 */
class EDD_Google_Customer_Reviews_Public {
 /**
     * Init and hook in the integration.
     *
     * @access public
     * @return void
     */
    //set plugin version
    public $edd_google_customer_reviews_version = '1.0.0';
	protected $google_merchant_id;
	private $edd_queued_js;
		
    public function __construct($plugin_name, $version) {
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        $_SESSION['d_npcnt']=0;
        $_SESSION['d_fpcnt']=0;
		$this->plugin_name = $plugin_name;
		$this->version  = $version;
        $this->google_merchant_id = $this->get_option("google_merchant_id");
    }
	public function get_option($key){
		$gcr_options = array();
		$my_option = get_option( 'gcr_options' );
		if(!empty($my_option)){
			$gcr_options = unserialize($my_option);
		}
		if(isset($gcr_options[$key])){
			return $gcr_options[$key];
		}
	}
    /**
     * display details of plugin
     *
     * @access public
     * @return void
     */
    function add_plugin_details() {
        echo '<!--EDD Google Customer Reviews Plugin by DCGWS Plugin Version:'.$this->edd_google_customer_reviews_version.'-->';
    }
 
	function edd_confirmation() {
		if( ! function_exists( 'edd_get_purchase_session' ) ) {
			return;
		}
		if( function_exists( 'edd_is_success_page' ) && ! edd_is_success_page() ) {
			return;
		}
		$session = edd_get_purchase_session();
		if( ! $session ) {
			return;
		}
		$payment_id = edd_get_purchase_id_by_key( $session['purchase_key'] );
		$this->edd_confirmation_snippet($payment_id);
	}

    function edd_confirmation_snippet($payment_id) {
        global $post;
		$edd = EDD();
        $merchant_id = $this->google_merchant_id;
        if (!$merchant_id)
            return;
        $payment = edd_get_payment($payment_id);
		$user_info = edd_get_payment_meta_user_info($payment_id);
		$user_address = $user_info['address'];
		if (is_array($user_address) && !empty($user_address)) {
			$delivery_country = $user_address['country'];
		}
		else {
			$edd_options = get_option( 'edd_settings' );
			$delivery_country = $edd_options['base_country'];
		}
        $code= '<script src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>
				<script>
				  window.renderOptIn = function() {
					window.gapi.load(\'surveyoptin\', function() {
					  window.gapi.surveyoptin.render(
						{
						  // REQUIRED FIELDS
						  "merchant_id": "'.$this->google_merchant_id.'",
						  "order_id": "'.$payment_id.'",
						  "email": "'.edd_get_payment_user_email( $payment_id ).'",
						  "delivery_country": "'.$delivery_country.'",
						  "estimated_delivery_date": "'.date("Y-m-d").'",
						});
					});
				  }
				</script>		
			';
		echo $code;
    }
}
