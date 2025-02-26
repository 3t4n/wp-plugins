<?php
require_once('MMECustomer.php');
function moneyme_gateway_init() {

	class MMEGateway extends WC_Payment_Gateway {

		/**
		 * Constructor for the gateway.
		 */
		public $MME;
		public function __construct() {
	  
			$this->id                 = 'mme_gateway';
			$this->icon               = apply_filters('woocommerce_mme_icon', '');
			$this->has_fields         = true;
			$this->method_title       = __( 'MoneyMe Payments for WooCommerce', 'wc-gateway-mme' );
			$this->method_description = __( 'Allows MoneyMe payments.', 'wc-gateway-mme' );
		  
			// Load the settings.
			$this->init_form_fields();
			$this->init_settings();
			// Define user set variables
			$this->title        = 'Pay with Moneyme+'; //$this->get_option( 'title' );
			$this->description  = $this->get_option( 'description' );
			$this->instructions = $this->get_option( 'instructions', $this->description );
			$this->password = $this->get_option( 'password' );
			$this->username = $this->get_option( 'username' );
			$this->supports = array(
				'products',
				//'refunds'
			);
			$this->mme_sess_key = md5(base64_encode($this->username.":".$this->password));
			// Actions
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
			add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_page' ) );
		  
			// Customer Emails
			add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
			$config = [
				'mme_username' => $this->username,
				'mme_password' => $this->password
			];
			$site_url = get_site_url();
			$qa_url = ['http://localhost/e-commerce/woo', 'http://10.0.1.6/woocommerce_dev', 'http://10.0.1.6/woocommerce', 'http://10.0.1.6/woocommerce_poc', 'http://10.2.0.6/woocommerce_poc'];
			$uat_url = ['http://10.0.1.6/woocommerce_int', 'http://10.2.0.6/woocommerce_int'];
			if(in_array($site_url, $qa_url)) {
				$config['qa'] = true;
			}
			if(in_array($site_url, $uat_url)) {
				$config['uat'] = true;
			}
			$this->MME = new MMECustomer($config); 	
		}
	
	
		/**
		 * Initialize Gateway Settings Form Fields
		 */
		public function init_form_fields() {
			$this->form_fields = apply_filters( 'wc_mme_form_fields', array(
		  
				'enabled' => array(
					'title'   => __( 'Enable/Disable', 'wc-gateway-mme' ),
					'type'    => 'checkbox',
					'label'   => __( 'Enable MoneyMe Payment', 'wc-gateway-mme' ),
					'default' => true
				),
				
				
				'description' => array(
					'title'       => __( 'Payment Method Info', 'wc-gateway-mme' ),
					'type'        => 'textarea',
					'description' => __( 'Shown to customer at checkout.', 'wc-gateway-mme' ),
					'default'     => __( 'Use your MoneyMe+ account for purchases up to $50,000 with 24 months interest-free.', 'wc-gateway-mme' ),
					'desc_tip'    => true,
				),
				'username' => array(
					'title'       => 'MoneyMe Username',
					'type'        => 'text',
				),
				'password' => array(
					'title'       => 'MoneyMe Password',
					'type'        => 'password',
				),
				'instructions' => array(
					'title'       => __( 'Confirmation Instructions', 'wc-gateway-mme' ),
					'type'        => 'textarea',
					'description' => __( 'Shown to customer at purchase completion on order confirmation page.', 'wc-gateway-mme' ),
					'default'     => 'Congratulations on your purchase with MoneyMe+. Check your email for more information about your MoneyMe+ account.',
					'desc_tip'    => true,
				),
			) );
		}
		
		public function payment_fields(){
			global $woocommerce, $img, $js, $css, $site_ep, $description;
			$img = plugins_url( '../views/assets/images' , __FILE__ );
			$js = plugins_url( '../views/assets/js' , __FILE__ );
			$css = plugins_url( '../views/assets/css' , __FILE__ );
			$site_ep = site_url('wp-admin/admin-ajax.php');
			
            $order_id = $woocommerce->session->order_awaiting_payment;
			$order = wc_get_order( $order_id );
			$description = $this->description;
			include_once(plugin_dir_path( __FILE__ ).'../views/mme-main.php');
		}
		

		public function validate_fields(){
			global $woocommerce;
			$customer = get_transient('customer');
			if($woocommerce->cart->total < 1000){
				wc_add_notice('Total checkout amount is not valid for MoneyMe+ payment. MoneyMe+ accept checkout worth greater or equal to $1000', 'error' );
				return false;
			}
			return true;
		}
		
	
		/**
		 * Output for the order received page.
		 */
		public function thankyou_page() {
			if ( $this->instructions ) {
				echo wpautop( wptexturize( $this->instructions ) );
			}
		}

	
		/**
		 * Add content to the WC emails.
		 *
		 * @access public
		 * @param WC_Order $order
		 * @param bool $sent_to_admin
		 * @param bool $plain_text
		 */
		public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
		
			if ( $this->instructions && ! $sent_to_admin && $this->id === $order->payment_method && $order->has_status( 'on-hold' ) ) {
				echo wpautop( wptexturize( $this->instructions ) ) . PHP_EOL;
			}
		}

		
		/**
		 * Process the payment and return the result
		 *
		 * @param int $order_id
		 * @return array
		 */
		public function process_payment( $order_id ) {
			global $woocommerce;
			$order = wc_get_order( $order_id );
			$wp_order = json_decode($order, TRUE);
			$billing = $wp_order['billing'];
			$cartItems = [];
			foreach($items as $item => $values) { 
				$_product =  wc_get_product( $values['data']->get_id()); 
				$price =  $values['data']->get_price();
				$variation = count($values['variation'])>0 ? " - ".implode(", ",$values['variation']) : "";
				$full_title = $_product->get_title().$variation;
				$cartItems[] = $values['quantity'].'x '.$full_title.'. Total Order Amount: $'.number_format(($price * $values['quantity']), 2, '.', ',');
				
			}
			$checkout_description = implode(", ", $cartItems);
			$checkout_url = $this->get_return_url( $order );
			$encoded_orderid = base64_encode(get_site_url()).':'.$order_id;
			$request = ['FirstName' => $billing['first_name'], 'LastName' => $billing['last_name'], 'MiddleName' => "", "MobileNumber" => $billing['phone'], "CheckoutUrl" => site_url()."/wp-admin/admin-ajax.php?action=mme_checkout&order_id={$order_id}&checkout_url={$checkout_url}", "CheckoutDescription" => $checkout_description, "EmailAddress" => $billing['email'], "ExternalOrderId" => $encoded_orderid, "CheckoutAmount" => $wp_order['total']];
			
			$response = $this->MME->createRedirectUrl($request);
			return array(
				'result' 	=> 'success',
				'redirect'	=> $response->RedirectUrl
			);
		}
		public function process_refund( $order_id, $amount = null, $reason = '' ) {
			// Do your refund here. Refund $amount for the order with ID $order_id
			//return new WP_Error( 'broke', __( "I've fallen and can't get up", "my_textdomain" ) );
			return true;
		}
	
  } // end \WC_Gateway_Offline class
}
