<?php
/*
    Plugin Name: EPX eCommerce
    Plugin URI: https://www.epx.com/
    Description: The Electronic Payments Exchange (EPX) plugin extends WooCommerce allowing you to take payments directly on your store via EPX API.
    Version: 1.1.2
    Author: NAB
    Author URI: https://www.northamericanbancard.com/
*/

// Hook for payment gateway class.
add_action('plugins_loaded', 'woocommerce_epx_init', 0);
define('epx_imgdir', WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . '/assets/img/');

if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}

// hook work at the time of plugin activation create table in database.
register_activation_hook(__FILE__, 'epx_install'); 

/* 
 * payment gateway method call from above hooks.
 */
function woocommerce_epx_init() {
    if(!class_exists('WC_Payment_Gateway')) return; // check WC_Payment_Gateway class exist on plugin page or not.

    /**
     * Gateway class to intract with epx gateway.
     */
    class WC_EPX extends WC_Payment_Gateway {

        public function __construct() {

            $this->id 		      	  = 'epx';
			$this->title 			  = 'Credit / Debit via EPX';
            $this->method_title       = 'EPX';
            $this->method_description = "EPX Gateway";
            $this->has_fields 	      = true;
			$this->init_form_fields();
            $this->init_settings();
            $this->epi_id        = $this->settings['epi_id'];
            $this->epi_key 	        = $this->settings['epi_key']; 
            $this->supports           = array(
                'products',
                'refunds'
            );
			
			if($this->settings['change_title'] != '') //custom payment method title
				$this->title  = $this->settings['change_title'];
			
			if($this->settings['disable_logo'] == "yes") //disabling the logo
            	$this->icon 	      = null;		
            else
				$this->icon 	      = epx_imgdir . 'logo.jpg';
            
            if ($this->settings['testmode'] == "yes") // work for test mode.
                $this->isTestAccount = true; // this for test url.
            else 
                $this->isTestAccount = false;    					

            if (version_compare(WOOCOMMERCE_VERSION, '2.0.0', '>=')) {
                    /* 2.0.0 */
                    add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(&$this, 'process_admin_options'));
            } else {
                    /* 1.6.6 */
                    add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
            }
        }  
        
        /* 
         * This method call if admin enter ammount manual and request for payment.
         * @param float $refund_ammount request ammount for refund.
         * @param string $transaction_id transactionid is authorizeandcapture transaction for same order.
         * @param int $order_id is corresponding order number on the behalf of transaction done.
         * @global object $wpdb is woocommerce global object.
         */
        //function refund_payment($refund_amount, $transaction_id, $order_id) {
        function process_refund($order_id, $amount = null, $reason = '') {
            write_log('amount: ' . $amount);
            write_log('order_id: ' . $order_id);

            global $wpdb;

            $epx_transaction_table = $wpdb->prefix . 'epx_transaction';
            $transaction_id_row = $wpdb->get_results( "SELECT transaction_id FROM $epx_transaction_table where order_id = $order_id" );
            $transaction_id = $transaction_id_row[0]->transaction_id;
 
            write_log('transaction_id: ' . $transaction_id);

            // include the PHP SDK.
            require_once 'sdk/EPX.php';

            $epxProcessor = new EPXProcessor( $this->epi_id, $this->epi_key, $this->isTestAccount );

            $request = $data = array(
                'transaction' => $order_id,
                'amount' => (float)$amount,
                'responseLevel' => 1
            );

            try {

                $response = $epxProcessor->refund($data, $transaction_id);

                write_log($response);

                if (!is_null($response['errors'])) {
                    throw new Exception("Errors: " . implode(",", $response['errors']));
                }

                if ($response['data']['response'] != "00") {
                    throw new Exception("Bad status: " . $response['data']['response'] . ' ' . $response['data']['text']);
                }

                global $wpdb;
                $epx_transaction_table = $wpdb->prefix . 'epx_transaction'; // table name which is use to save the transaction data. 

                $transaction_id_refund     = $response['data']['authBric'];
                $transaction_status = $response['data']['text'];
                $order_num          = $response['data']['transaction'];
                $order              = new WC_Order($order_id);
                $currency           = $order->get_currency();
                
                $order->add_order_note('Your payment refunded successful.<br/>Refunded amount is '.$amount.' '.$currency, 1);
                $order->update_status('Refunded');

                $wpdb->insert( 
                    $epx_transaction_table, 
                    array( 
                            'id'                 => '', 
                            'transaction_id'     => $transaction_id_refund,
                            'transaction_status' => $transaction_status,
                            'order_id'           => $order_num
                    ), 
                    array( 
                            '%d', 
                            '%s',
                            '%s',
                            '%s'		
                    ) 
                );

                return true;

            } catch(Exception $ex) {
                throw new Exception($ex->getMessage());
            }

        }

        /* 
         *	admin form and other option title description define from here some are not editable from admin side some like workflowid merchantprofile id are editable from admin *    panel.
         */
        function init_form_fields(){
            $this->form_fields = array(
                'enabled' => array(
                                'title'       => __('Enable/Disable', 'nab'),
                                'type' 	      => 'checkbox',
                                'label'       => __('Enable EPX Payment Module.', 'nab'),
                                'default'     => 'no',
                                'description' => 'Show in the Payment List as a payment option'
                        ),
                'epi_id' => array(
                                'title'       => __('ID', 'nab'),
                                'type' 	      => 'text',
                                'description' => __('Given to Merchant by EPX'),
                                'desc_tip'    => true
                        ),
                'epi_key' => array(
                                'title'       => __('Key', 'nab'),
                                'type' 	      => 'text',
                                'description' => __('Given to Merchant by EPX'),
                                'desc_tip'    => true
                        ),
                'testmode' => array(
                                'title'       => __('TEST Mode', 'nab'),
                                'type' 	      => 'checkbox',
                                'label'       => __('Enable EPX TEST Transactions.   Note: Only works with test credentials.', 'nab'),
                                'default'     => 'yes',
                                'description' => __('The TEST mode only works when test credentials are in use.'),
                                'desc_tip'    => true
                ),
				'change_title' => array(
                                'title'       => __('Payment Method Title', 'nab'),
                                'type' 	      => 'text',
								'default'     => 'Credit / Debit via EPX',
                                'description' => __('Change the title of the Payment Method.'),
                                'desc_tip'    => true
                        ),
				'disable_logo' => array(
                                'title'       => __('Disable EPX logo', 'nab'),
                                'type' 	      => 'checkbox',
								'label'       => __('Allows you to disable the EPX logo.', 'nab'),
                                'default'     => 'no',
                                'description' => __('Allows you to enable or disable the EPX logo during checkout'),
                                'desc_tip'    => true
				)
            );
        }

        /**
         * Admin Panel Options
         * - configure the velocity payment gateway according to our need and save velocity credentials.
         **/
        public function admin_options(){
            echo '<h3>'.__('EPX eCommerce', 'nab').'</h3>';
            echo '<p>'.__('Accept Visa, MasterCard, American Express, Discover, JCB, Diners Club directly on your store with the EPX payment gateway for WooCommerce.').'</p>';
			echo '<p>'.__('<b><a href="https://www.northamericanbancard.com/support/contact">Contact us</a></b> to open an account, for customer care, or technical support.').'</p>';
            echo '<table class="form-table">';
            // Generate the HTML For the settings form.
            $this->generate_settings_html();
            echo '</table>';
        }

        /**
         *  epx payment form field show directly on check out page
                 *	 
         **/
        function payment_fields() {

            ?>	
            <script>
                jQuery(document).ready(function(){
                    jQuery("form[name='checkout']").click(function(){
                        var str = jQuery('p.order_number').text();
                        if (str.search('Credit Card Payments') == 12) {
                            jQuery('.check-column').attr('type', 'hidden');
                            jQuery('.check-column>input').attr('type', 'hidden');
                        }
                    
                        var cardNumber = jQuery('#cc-number').val();
						
                        if(!cardNumber.match(/\d{14,20}/) && cardNumber != "")
                        {
                            alert("Credit Card Number must be between 14 and 20 digits.");
                            event.preventDefault();
                        }

                    });
                    jQuery('button.cancel-action').click(function(){
                        jQuery('.check-column').attr('type', 'checkbox');
                        jQuery('.check-column>input').attr('type', 'checkbox');
                    });
                });
            </script>
            <style>
                    .txt {
                            border: 1px solid #ccc;
                            padding: 3px !important;
                    }
                    .lbs{
                            display:block;
                            margin-top: 10px;
                    }
            </style>
            <div id="result"></div>
            <div>
                <label class="lbs">Card holder name</label>
                <input id="card_holder_name" class="txt" maxlength="50" type="text" value="" name="card_owner" />
            </div>
            <div>
                <label class="lbs">Card Type</label>
                <select id="cardtype" class="txt" name="cardtype" >
                <option value="Visa">Visa</option>
                <option value="MasterCard">MasterCard</option>
                <option value="Discover">Discover</option>
                <option value="AmericanExpress">American Express</option>
                </select>
            </div>
            <div>
                <label class="lbs">Credit Card Number: </label>
                <input id="cc-number" type="text" maxlength="20" class="txt" autocomplete="off" value="" autofocus name="cardnumber" />
            </div>
            <div>
                <label class="lbs">CVC: </label>
                <input id="cc-cvc" type="text" maxlength="4" class="txt" autocomplete="off" value="" name="cvvnumber" />
            </div>
            <div>
                <label class="lbs">Expiry Date: </label>
                <select id="cc-exp-month" class="txt" name="exp_month">
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>
                <select id="cc-exp-year" class="txt" name="exp_year">
                    <option value="22">2022</option>
					<option value="23">2023</option>
					<option value="24">2024</option>
					<option value="25">2025</option>
					<option value="26">2026</option>
					<option value="27">2027</option>
					<option value="28">2028</option>
					<option value="29">2029</option>
					<option value="30">2030</option>
					<option value="31">2031</option>
					<option value="32">2032</option>
					<option value="33">2033</option>
					<option value="34">2034</option>
					<option value="35">2035</option>
                </select>
            </div>

        <?php		
        }

        /**
         * Process the payment and return the result
         * @param int $order_id this is use to process the order on basis of this id and also update the payment transaction for this order.
         * @return array with Success and url with order object.
         * throw error message on failure of payment.
         **/
        function process_payment($order_id) { 
            
            //write_log('THIS IS THE START OF MY CUSTOM DEBUG');

            require_once 'sdk/EPX.php';

            // collect the data for payment by PHP SDK.
            global $woocommerce;
            $order    = new WC_Order( $order_id );
            $user     = wp_get_current_user();

            $address  = sanitize_text_field($_POST['billing_address_1']) . ' ' . sanitize_text_field($_POST['billing_address_2']);
            $city     = sanitize_text_field($_POST['billing_city']);
            $state    = sanitize_text_field($_POST['billing_state']);
            $postcode = sanitize_text_field($_POST['billing_postcode']);
            $country  = sanitize_text_field($_POST['billing_country']);
            $phone    = sanitize_text_field($_POST['billing_phone']);
            $total    = $woocommerce->cart->total;
            $names = explode(" ", sanitize_text_field($_POST['card_owner']));

            // create SDK object to call the all SDK methods and genrate the sessiontoken.

            $epxProcessor = new EPXProcessor( $this->epi_id, $this->epi_key, $this->isTestAccount );

            $data = array(
                'transaction' => $order_id,
                'cardEntryMethod' => 'E',
				'industryType' => 'E',
                'account' => sanitize_text_field($_POST['cardnumber']),
                'amount' => (float)$total,
                'responseLevel' => 1,

                'address' => array(
                    'address' => substr(preg_replace('/[^A-Za-z0-9\-]/', ' ', $address),0,30),
                    'city' => substr(preg_replace('/[^A-Za-z0-9\-]/', ' ', $city),0,25),
                    'state' => substr(preg_replace('/[^A-Za-z0-9\-]/', ' ', $state),0,3),
                    'zipCode' => substr(preg_replace('/[^A-Za-z0-9\-]/', '', $postcode),0,9),
                    'firstName' => substr(preg_replace('/[^A-Za-z0-9\-]/', ' ', $names[0]),0,25), 
                    'lastName' => substr(preg_replace('/[^A-Za-z0-9\-]/', ' ', $names[1]),0,25) ?? ""
                ),
              
                'expirationDate' => sanitize_text_field($_POST['exp_year']).sanitize_text_field($_POST['exp_month']), 
                'cvv2' => sanitize_text_field($_POST['cvvnumber'])
            );

            write_log($data);
        
            try {

                $response = $epxProcessor->sale($data);

                write_log($response);

                if (!is_null($response['errors'])) {
                    throw new Exception("Errors: " . implode(",", $response['errors']));
                }

                if ($response['data']['response'] != "00") {
					switch($response['data']['response']){
						case "EB":
							throw new Exception("Invalid Card Number");
							break;
						case "05":
							throw new Exception("The transaction was declined by the card issuer");
							break;
						case "15":
							throw new Exception("Invalid Card Number - The card issuer number is not valid");
							break;
						default:
							throw new Exception("Bad status: " . $response['data']['response'] . ' ' . $response['data']['text']);
					}
                }
                    
                global $wpdb;
                $epx_transaction_table = $wpdb->prefix . 'epx_transaction'; // table name which is use to save the transaction data. 

                $transaction_id     = $response['data']['authBric'];
                $transaction_status = $response['data']['text'];

                if($order->status !== 'completed') {

                    $order->payment_complete($transaction_id);
                    $order->add_order_note('Credit Card payment successful.<br/>EPX Trasaction ID: '.$transaction_id);
                    $woocommerce->cart->empty_cart();

                    $wpdb->insert( 
                    $epx_transaction_table, 
                    array( 
                            'id'                 => '', 
                            'transaction_id'     => $transaction_id,
                            'transaction_status' => $transaction_status,
                            'order_id'           => $order_id
                    ), 
                    array( 
                            '%d', 
                            '%s',
                            '%s',
                            '%s'		
                    ) 
                    );

                }

                // here check the version of WooCommerce
                if (version_compare(WOOCOMMERCE_VERSION, '2.1.0', '>=')) {
                    /* 2.1.0 */
                    $checkout_payment_url = $order->get_checkout_payment_url(true);
                } else {
                    /* 2.0.0 */
                    $checkout_payment_url = get_permalink(get_option('woocommerce_pay_page_id'));
                }

                // return the data with current status.
                return array(
                    'result'   => 'success',
                    'redirect' => $this->get_return_url( $order )
                );

            } catch (Exception $ex) {
                    throw new Exception($ex->getMessage());
            }	

        }

    } // class end

    /**
     * Add the Gateway to WooCommerce
     **/
    function woocommerce_add_epx_gateway($methods) {
            $methods[] = 'WC_EPX';
            return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_epx_gateway');
}


// here we get the current version of database version
function get_db_version_epx() {
   global $wpdb;
   $row = $wpdb->get_results("SELECT VERSION() as VERSION");
   return $row[0]->VERSION; 
}

$epx_db_version = get_db_version_epx();

// this method added table in data if not exist.
function epx_install() {
    global $wpdb;
    global $epx_db_version;
    $epx_transaction_table = $wpdb->prefix . 'epx_transaction';

    /*
     * We'll set the default character set and collation for this table.
     * If we don't do this, some characters could end up being converted 
     * to just ?'s when saved in our table.
     */
    $charset_collate = '';

    if (!empty($wpdb->charset)) {
      $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
    }

    if (!empty($wpdb->collate)) {
      $charset_collate .= " COLLATE {$wpdb->collate}";
    }

    // table structure define here.
    $sql = "CREATE TABLE $epx_transaction_table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        transaction_id varchar(220) DEFAULT '' NOT NULL,
        transaction_status varchar(100) DEFAULT '' NOT NULL,
        order_id varchar(20) DEFAULT '' NOT NULL,
        UNIQUE KEY id (id)
    ) $charset_collate;";

    // include wordpress file to work database task.
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $sql );

    add_option('epx_db_version', $epx_db_version);
}