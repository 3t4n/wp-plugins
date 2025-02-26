<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wpconcierges.com/plugins
 * @since      1.0.0
 *
 * @package    autopopulate_checkout_woo
 * @subpackage autopopulate_checkout_woo/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    autopopulate_checkout_woo
 * @subpackage autopopulate_checkout_woo/public
 * @author     Your Name <email@example.com>
 */
class autopopulate_checkout_woo_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $autopopulate_checkout_woo    The ID of this plugin.
	 */
	private $autopopulate_checkout_woo;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $plugin_options;
	private $revcent_options;
	private $revcent_campaign;
	private $revcent_api_key;
	private $revcent_url;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $autopopulate_checkout_woo       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $autopopulate_checkout_woo, $version ) {

		$this->plugin_name = $autopopulate_checkout_woo;
		$this->version = $version;
    $this->plugin_options = get_option($this->plugin_name."-options",array()); 
		$this->revcent_url = 'https://api.revcent.com/v1'; 
		$this->plex_url = 'https://api.connectdataleads.com/api/lead_handler.php'; 
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
		 * defined in autopopulate_checkout_woo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The autopopulate_checkout_woo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->autopopulate_checkout_woo, plugin_dir_url( __FILE__ ) . 'css/autopopulate-checkout-woo-public.css', array(), $this->version, 'all' );

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
		 * defined in autopopulate_checkout_woo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The autopopulate_checkout_woo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->autopopulate_checkout_woo, plugin_dir_url( __FILE__ ) . 'js/autopopulate-checkout-woo-public.js', array( 'jquery' ), $this->version, false );

	}
	
  private function set_customer_address_field($field_type,$set_value){
  	global $woocommerce;
    if(!is_null($woocommerce)  && !is_null($woocommerce->customer)) {
  	switch($field_type){
  	  case 'billing-first-name':
  	  $woocommerce->customer->set_billing_first_name($set_value);
  	  break;	
  	  case 'billing-last-name':
  	  $woocommerce->customer->set_billing_last_name($set_value);
  	  break;	
  	  case 'billing-company':
  	  $woocommerce->customer->set_billing_company($set_value);
  	  break;	
  	  case 'billing-address-1':
  	  $woocommerce->customer->set_billing_address_1($set_value);
  	  break;	
  	  case 'billing-address-2':
  	  $woocommerce->customer->set_billing_address_2($set_value);
  	  break;	
  	  case 'billing-city':
  	  $woocommerce->customer->set_billing_city($set_value);
  	  break;
  	  case 'billing-postcode':
  	  $woocommerce->customer->set_billing_postcode($set_value);
  	  break;
  	  case 'billing-country':
  	  $woocommerce->customer->set_billing_country($set_value);
  	  break;
  	  case 'billing-state':
  	  $woocommerce->customer->set_billing_state($set_value);
  	  break;
  	  case 'billing-email':
  	  if(is_email($set_value)){
  	   $woocommerce->customer->set_billing_email($set_value);
  	  }
  	  break;
  	  case 'billing-phone':
  	  $woocommerce->customer->set_billing_phone($set_value);
  	  break;
  	  case 'shipping-first-name':
  	  $woocommerce->customer->set_shipping_first_name($set_value);
  	  break;
  	  case 'shipping-last-name':
  	  $woocommerce->customer->set_shipping_last_name($set_value);
  	  break;
  	  case 'shipping-company':
  	  $woocommerce->customer->set_shipping_company($set_value);
  	  break;
  	  case 'shipping-address-1':
  	  $woocommerce->customer->set_shipping_address($set_value);
  	  break;
  	  case 'shipping-address-2':
  	  $woocommerce->customer->set_shipping_address_2($set_value);
  	  break;
  	  case 'shipping-postcode':
  	  $woocommerce->customer->set_shipping_postcode($set_value);
  	  break;
  	  case 'shipping-country':
  	  $woocommerce->customer->set_shipping_country($set_value);
  	  break;
  	  case 'shipping-state':
  	  $woocommerce->customer->set_shipping_state($set_value);
  	  break;	 
  	  default:
  	  error_log("field ".$field_type." not found for autopopulate checkout");
  	  break;
  	}
   }
  
  }
  
	public function set_customer_data(){
		if ( !class_exists( 'woocommerce' ) ) { return false; } 
		
		$fields = array('acw-billing-first-name','acw-billing-last-name','acw-billing-company','acw-billing-address-1','acw-billing-address-2',
		'acw-billing-city','acw-billing-postcode','acw-billing-country','acw-billing-state','acw-billing-email','acw-billing-phone',
		'acw-shipping-first-name','acw-shipping-last-name','acw-shipping-company','acw-shipping-address-1','acw-shipping-address-2','acw-shipping-city',
		'acw-shipping-postcode','acw-shipping-country','acw-shipping-state');
        
		$found_settings = false;
		foreach($fields as $field){
			$is_email = false;
			if($field == 'acw-billing-email'){
				$is_email = true;
			}
		  $get_value = $this->plugin_options[$field];
		  $field_type = str_replace("acw-","",$field);
		  if(isset($_GET[$get_value]) && strlen($_GET[$get_value])){
			  $found_settings = true;
			  if(!$is_email){
				$set_value = sanitize_text_field(urldecode($_GET[$get_value]));
				$this->set_customer_address_field($field_type,$set_value);
			  }else{
					$set_value = sanitize_email(urldecode($_GET[$get_value]));
					if(is_email($set_value)){
				  		$this->set_customer_address_field($field_type,$set_value);
					}
			  }
		  }
		}

		if($found_settings){
		  $this->send_customer_third_party();
		}
	}
	
	public function populating_checkout_fields($fields){
		global $woocommerce;
		
		if(!is_null($woocommerce) && !is_null($woocommerce->customer)){
		if(strlen($woocommerce->customer->get_billing_first_name()))
    $fields['billing']['billing_first_name']['default'] = $woocommerce->customer->get_billing_first_name();
    
    if(strlen($woocommerce->customer->get_billing_last_name()))
    $fields['billing']['billing_last_name']['default'] = $woocommerce->customer->get_billing_last_name();
    
    if(strlen($woocommerce->customer->get_billing_company()))
    $fields['billing']['billing_company']['default'] = $woocommerce->customer->get_billing_company();
    
    if(strlen($woocommerce->customer->get_billing_address_1()))
    $fields['billing']['billing_address_1']['default'] = $woocommerce->customer->get_billing_address_1();
    
    if(strlen($woocommerce->customer->get_billing_address_2()))
    $fields['billing']['billing_address_2']['default'] = $woocommerce->customer->get_billing_address_2();
    
    if(strlen($woocommerce->customer->get_billing_city()))
    $fields['billing']['billing_city']['default'] = $woocommerce->customer->get_billing_city();
    
    if(strlen($woocommerce->customer->get_billing_postcode()))
    $fields['billing']['billing_postcode']['default'] = $woocommerce->customer->get_billing_postcode();
    
    if(strlen($woocommerce->customer->get_billing_country()))
    $fields['billing']['billing_country']['default'] = $woocommerce->customer->get_billing_country();
    
    if(strlen($woocommerce->customer->get_billing_state()))
    $fields['billing']['billing_state']['default'] = $woocommerce->customer->get_billing_state();
    
    if(strlen($woocommerce->customer->get_billing_email()))
    $fields['billing']['billing_email']['default'] = $woocommerce->customer->get_billing_email();
    
    if(strlen($woocommerce->customer->get_billing_phone()))
    $fields['billing']['billing_phone']['default'] = $woocommerce->customer->get_billing_phone();

    if(strlen($woocommerce->customer->get_shipping_first_name()))
    $fields['shipping']['shipping_first_name']['default'] = $woocommerce->customer->get_shipping_first_name();
    
    if(strlen($woocommerce->customer->get_shipping_last_name()))
    $fields['shipping']['shipping_last_name']['default'] = $woocommerce->customer->get_shipping_last_name();
    
    if(strlen($woocommerce->customer->get_shipping_company()))
    $fields['shipping']['shipping_company']['default'] = $woocommerce->customer->get_shipping_company();
    
    if(strlen($woocommerce->customer->get_shipping_address_1()))
    $fields['shipping']['shipping_address_1']['default'] = $woocommerce->customer->get_shipping_address_1();
    
    if(strlen($woocommerce->customer->get_shipping_address_2()))
    $fields['shipping']['shipping_address_2']['default'] = $woocommerce->customer->get_shipping_address_2();
    
    if(strlen($woocommerce->customer->get_shipping_city()))
    $fields['shipping']['shipping_city']['default'] = $woocommerce->customer->get_shipping_city();
    
    if(strlen($woocommerce->customer->get_shipping_postcode()))
    $fields['shipping']['shipping_postcode']['default'] = $woocommerce->customer->get_shipping_postcode();
    
    if(strlen($woocommerce->customer->get_shipping_country()))
    $fields['shipping']['shipping_country']['default'] = $woocommerce->customer->get_shipping_country();
    
    if(strlen($woocommerce->customer->get_shipping_state()))
    $fields['shipping']['shipping_state']['default'] = $woocommerce->customer->get_shipping_state();
	}
    return $fields;


	}

	public function send_customer_third_party(){
		if($this->plugin_options['add-prospect-revcent']=="yes"){ 
            $this->add_customer_to_revcent();
		}
		
		if($this->plugin_options['add-prospect-plex']=="yes"){ 
            $this->add_customer_to_plex();
		}
	}
  
	private function add_customer_to_plex(){
		
		
         $account_id = $this->plugin_options['plex-account-id'];
         $key        = $this->plugin_options['plex-key'];
         $list_id    = $this->plugin_options['plex-list-id'];
         
         $customer = $this->create_plex_prospect();
				 $customer['account_id']=$account_id;
				 $customer['key']=$key;
				 $customer['list_id']=$list_id;
				 
				 
				  $response = wp_remote_post($this->plex_url, array(
			 'method' => 'POST',
			 'body' => http_build_query($customer),
			 'timeout' => 90,
			 'sslverify' => false,
		  ));
		  
		  $this->logger(print_r($response,true));
				 
	    
	}

  private function add_customer_to_revcent(){
		
			if(class_exists("revcent_payments")){
				$this->revcent_options=get_option("woocommerce_revcent_payments_settings",array());	
				if(count($this->revcent_options)){
				 $this->revcent_campaign = $this->revcent_options['revcent_campaign'];
				 
				 $this->revcent_api_key = $this->revcent_options['revcent_api_key'];
				 	if(strlen($this->revcent_campaign) && strlen($this->revcent_api_key)){
				 		$this->send_revcent_customer();
					}
			    }
		    }
	    
	}
	
	
    private function send_revcent_customer(){
		$payload_rq = $this->create_revcent_customer();
		
		if(count($payload_rq)){
		 $response = wp_remote_post($this->revcent_url, array(
			 'method' => 'POST',
			 'headers' => array(
				'x-api-key' => $this->revcent_api_key,
			 ),
			 'body' => json_encode($payload_rq),
			 'timeout' => 90,
			 'sslverify' => false,
		  ));
		}
	}

	private function create_revcent_customer(){
		global $woocommerce;
		
     $payload =array();    
		$metadata = array();
		
     if(!is_null($woocommerce)){
        if(isset($_COOKIE['affid'])){
		 $obj = new stdClass();
		 $obj->name = "affid";
		 $obj->value = (string) htmlspecialchars(filter_var($_COOKIE['affid'], FILTER_SANITIZE_STRING));
		 array_push($metadata, $obj);
	    }

		if(isset($_COOKIE['click_id'])){
			$obj = new stdClass();
			$obj->name = "click_id";
			$obj->value = (string) htmlspecialchars(filter_var($_COOKIE['click_id'], FILTER_SANITIZE_STRING));
			array_push($metadata, $obj);
	   	}

		 if(isset($_COOKIE['source'])){
		   $obj = new stdClass();
		   $obj->name = "source";
		   $obj->value = (string) htmlspecialchars(filter_var($_COOKIE['source'], FILTER_SANITIZE_STRING));
		   array_push($metadata, $obj);
		  }
    
		    $first_name ="";
			$last_name = "";
			$address_line_1 = "";
			$address_line_2 = "";
            $city ="";
			$state ="";
			$zip = "";
			$country = "";
			$email ="";
			$phone = "";

		    if(!is_null($woocommerce->customer->get_billing_first_name()))
			 $first_name = $woocommerce->customer->get_billing_first_name();
  
			 if(!is_null($woocommerce->customer->get_billing_last_name()))
			 $last_name = $woocommerce->customer->get_billing_last_name();
			 
			 if(!is_null($woocommerce->customer->get_billing_address_1()))
			 $address_line_1 = $woocommerce->customer->get_billing_address_1();

			 if(!is_null( $woocommerce->customer->get_billing_address_2()))
			 $address_line_2 = $woocommerce->customer->get_billing_address_2();

			 if(!is_null($woocommerce->customer->get_billing_city()))
			 $city = $woocommerce->customer->get_billing_city();

			 if(!is_null($woocommerce->customer->get_billing_state()))
			 $state = $woocommerce->customer->get_billing_state();

			 if(!is_null($woocommerce->customer->get_billing_postcode()))
			 $zip = $woocommerce->customer->get_billing_postcode();

			 if(!is_null($woocommerce->customer->get_billing_country()))
			 $country = $woocommerce->customer->get_billing_country();

			 if(!is_null($woocommerce->customer->get_shipping_company()))
			 $company =$woocommerce->customer->get_shipping_company();  
	
			 if(!is_null($woocommerce->customer->get_billing_email()))
			 $email =$woocommerce->customer->get_billing_email();  
	
			 if(!is_null($woocommerce->customer->get_billing_phone()))
			 $phone =$woocommerce->customer->get_billing_phone(); 


 			$payload['request'] = array(
				"type" => "customer",
				"method" => "create",
				"campaign" => $this->revcent_campaign,
				"customer"=> [
					"first_name" => $first_name,
					"last_name" => $last_name,
					"address_line_1" => $address_line_1,
					"address_line_2" => $address_line_2,
					"city" => $city,
					"state" => $state,
					"zip" => $zip,
					"country" => $country,
					"company" => $company,
					"email" => $email,
					"phone" => $phone
			    ],
				"bill_to" => [
					"first_name" => $first_name,
					"last_name" => $last_name,
					"address_line_1" => $address_line_1,
					"address_line_2" => $address_line_2,
					"city" => $city,
					"state" => $state,
					"zip" => $zip,
					"country" => $country,
					"company" => $company,
					"email" => $email,
					"phone" => $phone
				],
				"metadata" => $metadata,
			);
    }
			return $payload;
			
	}
	
	private function create_plex_prospect(){
		global $woocommerce;
		
     $customer =array();    
		
		
     
		    $first_name ="";
			$last_name = "";
			$address_line_1 = "";
			$address_line_2 = "";
            $city ="";
			$state ="";
			$zip = "";
			$country = "";
			$email ="";
			$phone = "";

		    if(!is_null($woocommerce->customer->get_billing_first_name()))
			 $first_name = $woocommerce->customer->get_billing_first_name();
  
			 if(!is_null($woocommerce->customer->get_billing_last_name()))
			 $last_name = $woocommerce->customer->get_billing_last_name();
			 
			 if(!is_null($woocommerce->customer->get_billing_address_1()))
			 $address_line_1 = $woocommerce->customer->get_billing_address_1();

			 if(!is_null( $woocommerce->customer->get_billing_address_2()))
			 $address_line_2 = $woocommerce->customer->get_billing_address_2();

			 if(!is_null($woocommerce->customer->get_billing_city()))
			 $city = $woocommerce->customer->get_billing_city();

			 if(!is_null($woocommerce->customer->get_billing_state()))
			 $state = $woocommerce->customer->get_billing_state();

			 if(!is_null($woocommerce->customer->get_billing_postcode()))
			 $zip = $woocommerce->customer->get_billing_postcode();

			 if(!is_null($woocommerce->customer->get_billing_country()))
			 $country = $woocommerce->customer->get_billing_country();

			 if(!is_null($woocommerce->customer->get_shipping_company()))
			 $company =$woocommerce->customer->get_shipping_company();  
	
			 if(!is_null($woocommerce->customer->get_billing_email()))
			 $email =$woocommerce->customer->get_billing_email();  
	
			 if(!is_null($woocommerce->customer->get_billing_phone()))
			 $phone =$woocommerce->customer->get_billing_phone(); 
			 
			 
				$customer = array(
					"shipping_first_name" => $first_name,
					"shipping_last_name" => $last_name,
					"shipping_address_1" => $address_line_1,
					"shipping_address_2" => $address_line_2,
					"shipping_city_town" => $city,
					"shipping_state_province" => $state,
					"shipping_zip_postcode" => $zip,
					"shipping_country_code" => $country,
					"phone_1" => $phone,
					"email" => $email
			);
    
			return $customer;
			
	}
	
	 protected function logger($data){
	 	 global $woocommerce;
	 	   if(!is_null($woocommerce)){
         $logger = new WC_Logger();
         $logger->add('autopopulate-checkout-woo', $data);
       }
 		}  
 		
}
