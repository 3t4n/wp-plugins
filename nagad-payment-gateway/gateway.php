<?php


namespace Nagad\Gateway\Payment;

use WC_Payment_Gateway;


class gateway extends WC_Payment_Gateway {

    public function __construct() {

        $this->id                 = 'nagad_pay';
        $this->icon     = NAGAD_PLUGIN_URL . '/logo/nagad.png';
        $this->has_fields         = false;
        $this->method_title       = __( 'Nagad Payment Gateway', 'nagad-pay' );
        $this->method_description = __( 'Please fill up the form', 'nagad-pay' );
        $this->title              = empty($this->get_option('title')) ? __('Nagad', 'nagad-pay') : $this->get_option('title');
        $this->description        = __('Pay Through Nagad', 'nagad-pay');

        $this->form_fields = [
            'enabled' => [
                'title'   => __( 'Enable/Disable', 'nagad-pay' ),
                'type'    => 'checkbox',
                'label'   => __( 'Enable Nagad', 'nagad-pay' ),
                'default' => 'yes',
            ],
            'run_mode' => [
                'title'   => __( 'Run Mode', 'nagad-pay' ),
                'type'    => 'select',
                'options' => [ "sandbox" => "Sandbox", "live" => "Live" ],
                'default' => __( 'off', 'nagad-pay' ),
            ],
            'title' => [
                'title'     => __('Title', 'nagad-pay'),
                'type'      => 'text',
                'default'   => __('Nagad', 'nagad-pay'),
            ],

            'merchant_id' => [
                'title' => __( 'Merchant ID', 'nagad-pay' ),
                'type'  => 'text',
            ],
            'merchant_private_key' => [
                'title' => __( 'Merchant Private Key', 'nagad-pay' ),
                'type'  => 'textarea',
            ],
            'nagad_gateway_public_key' => [
                'title' => __( 'Nagad Gateway Server Public Key', 'nagad-pay' ),
                'type'  => 'textarea',
            ],
            'brand_logo' => [
                'title'       => __( 'Brand Logo URL', 'nagad-pay' ),
                'type'        => 'textarea',
                'description' => __( 'If you want your clients to see your brand logo on Nagad Gateway page, provide the logo link here', 'nagad-pay' ),
                'desc_tip'    => true,
            ]
        ];

        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options'] );
        $this->init_settings();

        add_filter( 'query_vars', [ $this, 'query_vars' ] );
        add_action( 'template_include', [ $this, 'plugin_include_template' ] );
    }

	public function process_admin_options() {
			if ( parent::process_admin_options() ) {
				add_action( 'admin_notices', [ $this, 'admin_notice' ]);
				return true;
			}

			return false;
	}

    public function admin_notice() {    
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><?php _e( '<b>You need to add the callback url: <span style = "color:red;"><i><b>' . site_url('/nagad-pay/payment/confirmation/') . '</b></i></span> on your nagad merchant panel and let Nagad know to whitelist the URL. If you have already done so ignore this message.</b>', 'nagad-pay' ); ?></p>
        </div>
        <?php
    }
	
    public function query_vars( $vars ) {
        $vars[] = 'nagad_pay_confirmation';

        return $vars;
    }


    function plugin_include_template( $template ) {
        if ( get_query_var( 'nagad_pay_confirmation' ) && get_query_var( 'nagad_pay_confirmation' ) == 'payment-complete-confirmation' ) {
            $params = array_map( function ( $item ) {
                return sanitize_text_field( $item );
            }, $_GET );

            $this->handle_nagad_payment_confirmation( $params );
        }

        return $template;
    }


    public function handle_nagad_payment_confirmation( $params ) {

        //if ( 1==1 ) {//$params['status'] == 'Success' && $params['status_code'] == "00_0000_000"

            $verification = self::payment_verification( $params['payment_ref_id'] );
            $order_number = json_decode($verification['additionalMerchantInfo'], true)['order_no'];
            
            if(empty($order_number)){
                $order_number = substr($params['order_id'], 0 , -4);
            }
            $order_obj = wc_get_order($order_number);


            if ($order_obj) {//&& empty(helper::get_txn_history($order_number))

                $data = [
                    'order_id'          => sanitize_text_field($order_number),
                    'nagad_order_id'    => sanitize_text_field($verification['orderId']),
                    'nagad_txn_id'      => sanitize_text_field($verification['issuerPaymentRefNo']),
                    'payment_ref_id'    => sanitize_text_field($verification['paymentRefId']),
                    'nagad_txn_amount'  => sanitize_text_field($verification['amount']),
                    'txn_status'        => sanitize_text_field($verification['status']),
                    'nagad_txn_time'    => sanitize_text_field($verification['issuerPaymentDateTime']),
                    'order_time'        => sanitize_text_field($verification['orderDateTime'])
                ];

                helper::insert_txn_history($data);

                if ( $verification['status'] == 'Success' && $verification['statusCode'] == '000' ) {
                    
                    if ($order_obj->get_total() == $verification['amount']) {
                        $order_obj->add_order_note(sprintf( __( 'Nagad payment completed. Amount: %s', 'nagad-pay' ), $order_obj->get_total()));
                        $order_obj->payment_complete();
                    } 
                    else {
                        $order_obj->update_status(
                            'on-hold',
                            __( 'Partially paid. Amount: %s', 'nagad-pay' ),
                            sanitize_text_field( $verification['amount'] )
                        );
                    }
                    return wp_redirect($order_obj->get_checkout_order_received_url());   
                }

                return wp_redirect(site_url());

            }
        //}     

    }
	
	

	
	//Payment Processing Codes 

    public function process_payment( $order_id ) {
        $order = wc_get_order( $order_id );

        // WC()->cart->empty_cart();

        $payment_process = self::checkout( $order->get_id(), $order->get_total() );

        $url = $payment_process['status'] == 'success' ? $payment_process['url'] : $order->get_checkout_payment_url();

        return [
            'result'   => 'success',
            'redirect' => esc_url_raw( $url ),
        ];
    }


    static $instance, $checkout_initialize_api, $checkout_complete_api, $_api;

    public static function gatewayOption( $key ) {
        if ( !self::$instance ) {
             self::$instance = ( new self );
        }
        return self::$instance->get_option( $key );
    }

    public static function init() {
        $mode = self::gatewayOption( 'run_mode' );

        if ( $mode == 'sandbox' ) {
            $base = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/";
        } else {
            $base = "https://api.mynagad.com/api/dfs/";
        }

        self::$checkout_initialize_api   = $base . "check-out/initialize/" . self::gatewayOption( 'merchant_id' ) . "/";
        self::$checkout_complete_api   = $base . "check-out/complete/";
        self::$_api = $base . "verify/payment/";
    }
    
    public static function checkout( $order_no, $amount ) {
        
        self::init();

        $error_message = '';

        //creating order request
        $order_id = $order_no . rand(1001, 9999);
        $response = self::checkout_initialize( $order_id );

        if ( isset( $response['sensitiveData'] ) && isset( $response['signature'] ) ) {
            if ( $response['sensitiveData'] != "" && $response['signature'] != "" ) {
                //execute order request
                $execute = self::checkout_complete( $response['sensitiveData'], $order_id, $amount, $order_no );

                if ( $execute ) {
                    if ( $execute['status'] == "Success" ) {
                        $url = json_encode( $execute['callBackUrl'] );

                        return [ 'status' => 'success', 'url' => esc_url_raw( $url ) ];
                    } else {
                        $error_message = "execute fail: " . $execute['message'];
                    }
                }
            }
        } else {
            $error_message = $response['message'];
        }

        return [ 'status' => 'fail', 'message' => $error_message ];
    }


    public static function checkout_initialize( $order_id ) {
        $sensitive_data = [
            'merchantId' => self::gatewayOption( 'merchant_id' ),
            'datetime'   => helper::getCurrentBDtime(),
            'orderId'    => $order_id,
            'challenge'  => helper::randomString(),
        ];

        $checkout_init_data = [
            'dateTime'      => helper::getCurrentBDtime(),
            'sensitiveData' => helper::encryptDataWithPublicKey( $sensitive_data ),
            'signature'     => helper::generateSignature( $sensitive_data ),
        ];

        $language = 'EN'; 

        $url      = self::$checkout_initialize_api . $order_id. "?locale=" . $language;
        $response = helper::http_request( $url, $checkout_init_data );

        return $response;
    }


    public static function checkout_complete( $sensitive_data, $order_id, $amount, $original_order_no ) {
        $decrypted_response = json_decode( helper::decryptDataWithPrivateKey( $sensitive_data ), true );

        if ( isset( $decrypted_response['paymentReferenceId'] ) && isset( $decrypted_response['challenge'] ) ) {
            $payment_reference_id = $decrypted_response['paymentReferenceId'];

            $order_sensitive_data = [
                'merchantId'   => self::gatewayOption( 'merchant_id' ),
                'orderId'      => $order_id,
                'currencyCode' => '050',
                'amount'       => $amount,
                'challenge'    => $decrypted_response['challenge']
            ];

            $order_post_data = [
                'sensitiveData'          => helper::encryptDataWithPublicKey( $order_sensitive_data ),
                'signature'              => helper::generateSignature( $order_sensitive_data ),
                'merchantCallbackURL'    => site_url( '/nagad-pay/payment/confirmation/' ),
                'additionalMerchantInfo' =>  [
                    'order_no' => $original_order_no,
                    'serviceLogoURL' => self::gatewayOption('brand_logo')
                ],
            ];

            
            $url = self::$checkout_complete_api . $payment_reference_id;

            $response = helper::http_request( $url, $order_post_data );

            return $response;
        }

        return false;
    }


    public static function payment_verification( $payment_reference_id ) {
        self::init();

        $url      = self::$_api . $payment_reference_id;
        $response = wp_remote_get( esc_url_raw( $url ) );
        $result   = json_decode( wp_remote_retrieve_body( $response ), true );

        return $result;
    }
    
}