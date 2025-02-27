<?php
/**
 * TP Applepay Gateway.
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once dirname( __FILE__ ) . '/constants.php';
require_once dirname( __FILE__ ) . '/tp-applepay-gateway-helper-trait.php';

class WC_Totalprocessing_Applepay_Gateway extends WC_Payment_Gateway {
    use TotalProcessingGatewayDebugTrait, TotalProcessingApplePayGatewayHelperTrait;

    public function __construct() {
        $this->id                                = TP_APPLEPAY_GATEWAY_ID;
        $this->icon                              = '';
        $this->has_fields                        = false;
        $this->method_title                      = TP_APPLEPAY_GATEWAY_TITLE;
        $this->method_description                = TP_APPLEPAY_GATEWAY_DESCRIPTION;
        $this->supports                          = array(
            'products',
            'refunds'
        );
        $this->title                             = TP_APPLEPAY_GATEWAY_TITLE;
        $this->description                       = TP_APPLEPAY_GATEWAY_DESCRIPTION;
        $this->enabled                           = $this->get_option( 'enabled' );
        $this->onlyadmins                        = $this->get_option( 'onlyadmins' );
        $this->jsLogging                         = $this->get_option( 'jsLogging' );
        $this->serversidedebug                   = $this->get_option( 'serversidedebug' );
        $this->logLevels                         = $this->get_option( 'logLevels' );
        $this->onlyLoggedIn                      = $this->get_option( 'onlyLoggedIn' );
        $this->inheritcreds                      = $this->get_option( 'inheritcreds' );
        $this->inheritGatewayCrentialsFromCardProcessing();
        $this->forceNoShipping                   = $this->get_option( 'forceNoShipping' );
        $this->fastCheckoutOnCart                = $this->get_option( 'fastCheckoutOnCart' );
        $this->platformBase                      = $this->get_option( 'platformBase' );
        $this->entityId_test                     = $this->get_option( 'entityId_test' );
        $this->accessToken_test                  = $this->get_option( 'accessToken_test' );
        $this->entityId                          = $this->get_option( 'entityId' );
        $this->accessToken                       = $this->get_option( 'accessToken' );
        $this->paymentType                       = $this->get_option( 'paymentType' );
        $this->domainsToVerify                   = $this->get_option( 'domainsToVerify' );
        $this->acceptedCards                     = $this->get_option( 'acceptedCards' );
        $this->billingAddressFields              = $this->get_option( 'billingAddressFields', [] );
        $this->shippingAddressFields             = $this->get_option( 'shippingAddressFields', [] );
        $this->applepaycountryCode               = $this->get_option( 'applepaycountryCode' );
        $this->merchantCapabilities              = $this->get_option( 'applepaymerchantCapabilities' );
        $this->supportedNetworks                 = $this->get_option( 'applepaysupportedNetworks' );
        $this->supportedCountries                = $this->get_option( 'applepaysupportedCountries' );
        $this->displayName                       = $this->get_option( 'applepaydisplayName' );
        $this->label                             = $this->get_option( 'applepaylabel' );
        $this->refreshPage                       = ($this->get_option( 'refreshPage' ) == 'yes' ? true : false);
        $this->forceCreateAcc                    = ($this->get_option( 'forceCreateAcc' ) == 'yes' ? true : false);
        $this->shipInclTax                       = ($this->get_option( 'shipInclTax' ) == 'yes' ? true : false);
        //custom css
        $this->customCss                         = $this->get_option( 'customCss' );
        //apple pay button styles
        $this->applepayapplepaystyle             = $this->get_option( 'applepayapplepaystyle' );
        $this->applepayapplepaytype              = $this->get_option( 'applepayapplepaytype' );
        $this->applepayapplepaylanguage          = $this->get_option( 'applepayapplepaylanguage' );
        //set file locations
        $this->domainVerificationFileName        = TP_APPLEPAY_GATEWAY_DOMAIN_VERIFY_FILENAME;

        $this->init_form_fields();
        $this->init_settings();

        // Initialise settings
        //Load funcs
        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
    }
    
    public function settings_fields($merge=false) {
        $settings                  = include dirname( __FILE__ ) . '/payment-gateway-setting-fields.php';
        
        if( $merge === true ){
            $retArr = [];
            foreach( $settings as $subSettings ){
                if( count( $subSettings ) > 0 ){
                    if( isset( $subSettings['fields'] ) ){
                        if( count( $subSettings['fields'] ) > 0 ){
                            $retArr = array_merge( $retArr, $subSettings['fields'] );
                        }
                    }
                }
            }
            return $retArr;
        }
        return $settings;
    }

    public function init_form_fields(){
        $this->form_fields = $this->settings_fields(true);
    }
    
    public function admin_options() {
        require_once dirname( __FILE__ ) . '/admin/admin-options.php';
    }
    
    public function get_icon() {
        $icons_str = '';
        return apply_filters( 'woocommerce_gateway_icon', $icons_str, $this->id );
    }
    
    public function check_plugin(){
        if($this->enabled === 'yes'){
            if($this->onlyadmins === 'yes'){
                if( ! current_user_can( 'administrator' ) ) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
    
    public function getPluginVer(){
        return TP_APPLEPAY_VERSION;
    }
    
    public function run( $plugin_basename ){
        //action hooks
        // Added by Mithilesh K to run this when wp loads
        add_action( 'init', array( $this, '_init' ) );
        if(is_user_logged_in() === true){
            if( current_user_can( 'administrator' ) ) {
                add_action( 'wp_ajax_moveValidationFile', array( $this, 'moveValidationFile' ) );
                add_action( 'wp_ajax_nopriv_moveValidationFile', array( $this, 'moveValidationFile' ) );
                
                add_action( 'wp_ajax_sendDomainRegistrationRequest', array( $this, 'sendDomainRegistrationRequest' ) );
                add_action( 'wp_ajax_tpApplepaydomainRegistationSuccess', array( $this, 'domainRegistrationRequestThanks' ) );
            }
        }
        //check plugin
        if($this->check_plugin()){
            add_action( 'wp_enqueue_scripts', array( $this, 'payment_scripts_tpap' ) );
            if( $this->fastCheckoutOnCart == 'yes' ){
                add_action( 'woocommerce_proceed_to_checkout', array( $this, 'draw_express_applepay_tpap' ) );
            }
            add_action( 'woocommerce_review_order_before_payment', array( $this, 'draw_express_applepay_tpap' ) );
            add_action( 'wp_ajax_tp_applepay_checkout_response', array( $this, 'requestCheckoutID' ) );
            add_action( 'wp_ajax_nopriv_tp_applepay_checkout_response', array( $this, 'requestCheckoutID' ) );
            add_action( 'wp_ajax_tp_applepay_create_order', array( $this, 'fn_tp_applepay_create_order' ) );
            add_action( 'wp_ajax_nopriv_tp_applepay_create_order', array( $this, 'fn_tp_applepay_create_order' ) );
            add_action( 'wp_ajax_onPaymentAuthorized', array( $this, 'onPaymentAuthorized' ) );
            add_action( 'wp_ajax_nopriv_onPaymentAuthorized', array( $this, 'onPaymentAuthorized' ) );
            add_action( 'wp_ajax_tpapplepay_check_transaction_status', array( $this, 'validateTransactionStatus' ) );
            add_action( 'wp_ajax_nopriv_tpapplepay_check_transaction_status', array( $this, 'validateTransactionStatus' ) );
        }
        //filter hooks
        add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'plugin_action_links' ) );
        add_filter( 'woocommerce_available_payment_gateways', array( $this, 'tpap_remove_method' ), 20, 1);
        if(!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
            if(is_plugin_active( 'woocommerce-multilingual/wpml-woocommerce.php' )){
                add_filter( 'wcml_multi_currency_ajax_actions', array( $this, 'tpap_support_ml_ajax' ), 10, 1 );
            }
        }
    }
    
    public function tpap_support_ml_ajax( $ajax_actions ){
        $ajax_actions[] = 'identChosenShipping';
        $ajax_actions[] = 'onPaymentAuthorized';
        
        return $ajax_actions;
    }
    
    public function plugin_action_links( $links ) {
        $plugin_links = array(
            '<a href="admin.php?page=wc-settings&tab=checkout&section='.$this->id.'">' . 'Settings' . '</a>',
        );
        return array_merge( $plugin_links, $links );
    }
    
    public function checkPageShouldRun(){
        if(is_checkout() === true && is_wc_endpoint_url( 'order-pay' ) !== true){
            return true;
        }
        if($this->fastCheckoutOnCart == 'yes' && is_cart()){
            return true;
        }
        return false;
    }

    public function payment_scripts_tpap() {
        if($this->checkPageShouldRun() === true){
            $tp_pluginVer = $this->getPluginVer();
            wp_register_script( 'tp_applepay', plugin_dir_url( dirname( __FILE__ ) ).'assets/js/tpJsv2_logging.js?v='.$tp_pluginVer , ['jquery','wp-util'] , null );
            wp_localize_script( 'tp_applepay', 'tpVars', [
                "subTotalAmount"                => (string)WC()->cart->get_total(null),
                "cartPage"                      => wc_get_cart_url(),
                "refreshPage"                   => $this->refreshPage,
                "isCheckout"                    => is_checkout(),
                "isCart"                        => is_cart(),
                "pluginId"                      => $this->id,
                "pluginVer"                     => $tp_pluginVer,
                "adminUrl"                      => get_admin_url().'admin-ajax.php',
                "applepayifrURL"                => site_url('tp-apple-pay-init?v='.time()),
                //"forceTerms"                    => $this->forceTerms
            ]);
            wp_enqueue_style( 'tpap_style', TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL . 'assets/css/tpapv2-style.css?v=' . $tp_pluginVer , [] , null );
            wp_add_inline_style( 'tpap_style', $this->customCss );
            wp_enqueue_script('tp_applepay');
        }
    }
    
    public function draw_express_applepay_tpap() {
        if($this->checkPageShouldRun() === true){
            $ref_page            = 'checkout';
            if( is_cart() ){
                $ref_page        = 'cart';
            }
            if($this->onlyLoggedIn == 'yes'){
                if(is_user_logged_in() === true){
                    echo $this->applePayButtonsArray($ref_page);
                }
            } else {
                echo $this->applePayButtonsArray($ref_page);
            }
        }
    }
    
    public function tpap_remove_method( $available_gateways ){
        $gateway_id = $this->id;
        if(is_checkout()) {
            if(isset($available_gateways[$gateway_id])){
                unset($available_gateways[$gateway_id]);
            }
        }
        return $available_gateways;
    }
    
    public function identChosenShipping() {
        $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
        $chosen_shipping = $chosen_methods[0];
        return $chosen_shipping;
    }
    
    public function prepareRemoteRequest($url, $payload=false, $customRequest = 'POST'){
        $headers              = [
            'Content-Type'        => 'application/x-www-form-urlencoded; charset=UTF-8',
            'Authorization'       => 'Bearer ' . $this->getAccessToken() 
        ];

        $array                = [
            'method'              => $customRequest,
            'timeout'             => 45,
            'redirection'         => 5,
            'httpversion'         => '1.0',
            'blocking'            => true,
            'headers'             => $headers
        ];
        if($payload !== false){
            $array['body']        = $payload;
        }
        
        $response                 = wp_remote_request( $url, $array );
        
        $responseData             = json_decode( $response['body'] );
        
        return $responseData;
    }
    
    public function parseResponseData($responseData){
        global $woocommerce;
        $array                              = ['status' => false, 'notices'=>[]];
        $array['redirect']                  = wc_get_checkout_url();
        if(isset($responseData->id)){
            $paymentSuccess                 = false;
            $transaction_id                 = (string)$responseData->id;
            if(isset($responseData->result->code)){
                $code                       = (string)$responseData->result->code;
                if($code == '000.000.000' || $code == '000.100.110'){
                    $paymentSuccess         = true;
                }
            }
            if(isset($responseData->result->description)){
                $description                = str_replace("'", "" , $responseData->result->description);
            }
            if(isset($responseData->merchantTransactionId)){
                $checks                     = true;
                $order_id                   = (int)$responseData->merchantTransactionId;
                $order                      = wc_get_order( $order_id );
                $amount                     = number_format($order->get_total(), 2, '.', '');
                $order_data                 = $order->get_data();
                if($checks){
                    if($paymentSuccess === true){
                        //good to go..
                        $order->payment_complete($transaction_id);
                        wc_reduce_stock_levels($order_id);
                        $order->add_order_note( 'Your order is paid! Thank you!', true );
                        $order->add_order_note( $code, false );
                        //$order->set_transaction_id( $transaction_id );
                        $order->add_meta_data('platformBase', $this->platformBase);
                        $order->add_meta_data('paymentType', (string)$responseData->paymentType);
                        $order->save();
                        $woocommerce->cart->empty_cart();
                        $array['status']    = true;
                        $array['valid']     = true;
                        $array['redirect']  = $this->get_return_url( $order );
                    } else {
                        $order->add_order_note( $code, false );
                        $order->save();
                        //decline reason..
                        $array['notices'][] = 'Payment not completed: '.$description;
                        $array['error']     = $description;
                    }
                }
            } else {
                $array['notices'][]         = 'No order_id found, please retry payment.';
                //perform reversal on $paymentSuccess && $responseData->id
            }
        } else {
            $array['notices'][]             = 'No transaction id found, please retry payment.';
        }
        wc_clear_notices();
        foreach($array['notices'] as $notice){
            wc_add_notice( __($notice), 'error');
        }
        return $array;
    }
    
    public function unsetEmptyArrayVars($array){
        foreach($array as $k => $v){
            if(is_array($v)){
                foreach($v as $k1 => $v1){
                    if(empty($v1)){
                        unset($array[$k][$k1]);
                    }
                }
                if(count($v)===0){
                    unset($array[$k]);
                }
            } else {
                if(empty($v)){
                    unset($array[$k]);
                }
            }
        }
        return $array;
    }
    
    protected function setCustomerAddressField( $field, $key, $data ) {
        $billing_value  = null;
        $shipping_value = null;
        $billing        = [];
        $shipping       = [];
        if ( isset( $data[ "billing_{$field}" ] ) && is_callable( array( WC()->customer, "set_billing_{$field}" ) ) ) {
            $billing_value  = $data[ "billing_{$field}" ];
        }
        if ( isset( $data[ "shipping_{$field}" ] ) && is_callable( array( WC()->customer, "set_shipping_{$field}" ) ) ) {
            $shipping_value = $data[ "shipping_{$field}" ];
        }
        if ( ! is_null( $billing_value ) && is_callable( array( WC()->customer, "set_billing_{$field}" ) ) ) {
            $billing[$field]    = $billing_value;
            WC()->customer->{"set_billing_{$field}"}( $billing_value );
        }
        if ( ! is_null( $shipping_value ) && is_callable( array( WC()->customer, "set_shipping_{$field}" ) ) ) {
            $shipping[$field]    = $shipping_value;
            WC()->customer->{"set_shipping_{$field}"}( $shipping_value );
        }
        return ['billing' => $billing, 'shipping' => $shipping];
    }
    
    public function prepareCustomerIdForOrder( $dataArray ){
        $username     = $dataArray['billing_email'];
        if ( 'yes' === get_option( 'woocommerce_registration_generate_username', 'yes' ) ) {
            $username = wc_create_new_customer_username( $username, array() );
        }
        $tpap_customer_id = wc_create_new_customer( $dataArray['billing_email'], $username, wp_generate_password( 12, false ) );
        if((int)$tpap_customer_id > 0){
            if(isset($dataArray['billing_first_name']) && !empty($dataArray['billing_first_name'])){
                update_user_meta( $tpap_customer_id, "billing_first_name", $dataArray['billing_first_name'] );
                update_user_meta( $tpap_customer_id, "first_name", $dataArray['billing_first_name'] );
            }
            if(isset($dataArray['billing_last_name']) && !empty($dataArray['billing_last_name'])){
                update_user_meta( $tpap_customer_id, "billing_last_name", $dataArray['billing_last_name'] );
                update_user_meta( $tpap_customer_id, "last_name", $dataArray['billing_last_name'] );
            }
            if(isset($dataArray['billing_address_1']) && !empty($dataArray['billing_address_1'])){
                update_user_meta( $tpap_customer_id, "billing_address_1", $dataArray['billing_address_1'] );
            }
            if(isset($dataArray['billing_city']) && !empty($dataArray['billing_city'])){
                update_user_meta( $tpap_customer_id, "billing_city", $dataArray['billing_city'] );
            }
            if(isset($dataArray['billing_state']) && !empty($dataArray['billing_state'])){
                update_user_meta( $tpap_customer_id, "billing_state", $dataArray['billing_state'] );
            }
            if(isset($dataArray['billing_postcode']) && !empty($dataArray['billing_postcode'])){
                update_user_meta( $tpap_customer_id, "billing_postcode", $dataArray['billing_postcode'] );
            }
            if(isset($dataArray['billing_country']) && !empty($dataArray['billing_country'])){
                update_user_meta( $tpap_customer_id, "billing_country", $dataArray['billing_country'] );
            }
            if(isset($dataArray['billing_email']) && !empty($dataArray['billing_email'])){
                update_user_meta( $tpap_customer_id, "billing_email", $dataArray['billing_email'] );
            }
            if(isset($dataArray['billing_phone']) && !empty($dataArray['billing_phone'])){
                update_user_meta( $tpap_customer_id, "billing_phone", $dataArray['billing_phone'] );
            }
            return $tpap_customer_id;
        }
        return 0;
    }
    
    public function genAddrReq($countryCode = 'GB',$type = 'billing_'){
        $countries = new WC_Countries();
        $addrFields = $countries->get_address_fields($countryCode,$type);
        $reqArray = [];
        foreach($addrFields as $field => $req){
            if($req['required'] == 1){
                $reqArray[] = $field;
                continue;
            }
        }
        return $reqArray;
    }
    
    //end applePay sheet comms
    
    public function payment_fields() {

    }
    
    public function validate_fields(){
        return true;
    }
    
    public function process_payment( $order_id ) {
        return;
    }
    
    public function process_refund( $order_id, $amount = null, $reason = '') {
        global $woocommerce;
        $order = new WC_Order($order_id);
        $order_data = $order->get_data();
        if($amount !== null){
            $amount = number_format($amount, 2, '.', '');
        } else {
            $amount = '0.00';
        }
        $id = $order->get_transaction_id();
        $platformBase = $order->get_meta('platformBase');
        $paymentType = $order->get_meta('paymentType');
        if(in_array($paymentType,['DB','CP','RB'])){
            $payload = ['paymentType'=>'RF','currency'=>$order_data['currency'],'amount'=>$amount];
        } else if(in_array($paymentType,['PA'])){
            $payload = ['paymentType'=>'RV','currency'=>$order_data['currency']];
        } else {
            return new WP_Error( 'Error', 'Original paymentType not recognised.' );
        }
        $payload['entityId'] = ($platformBase == 'eu-prod.oppwa.com' ? $this->entityId : $this->entityId_test);
        $array = [
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8','Authorization' => 'Bearer '.($platformBase == 'eu-prod.oppwa.com' ? $this->accessToken : $this->accessToken_test)],
            'body' => $payload
        ];
        $response = wp_remote_request( 'https://'.$platformBase.'/v1/payments/'.$id , $array);
        $result = json_decode($response['body']);
        if(!is_object($result)){
            return new WP_Error( 'Error', 'Transaction response error.' );
        }
        if($result->result->code == '000.000.000' || $result->result->code == '000.100.110'){
            return true;
        } else {
            return new WP_Error( 'Error', 'Transaction refused: '.$result->result->description );
        }
        return new WP_Error( 'Error', 'Transaction processing error' );
    }
    
    public function prepareAuthorisedDataArray($billing,$shipping){
        $billingAdd    = [];
        $shippingAdd   = [];
        $dataArray     = [];
        if(isset($billing['emailAddress'])){
            if(!empty($billing['emailAddress'])){
                $dataArray['billing_email']    = sanitize_text_field($billing['emailAddress']);
                $billingAdd['email']           = sanitize_text_field($billing['emailAddress']);
            }
        }
        if(isset($billing['phoneNumber'])){
            if(!empty($billing['phoneNumber'])){
                $dataArray['billing_phone']    = sanitize_text_field($billing['phoneNumber']);
                $billingAdd['phone']           = sanitize_text_field($billing['phoneNumber']);
            }
        }
        if(isset($billing['givenName'])){
            if(!empty($billing['givenName'])){
                $dataArray['billing_first_name']    = sanitize_text_field($billing['givenName']);
                $billingAdd['first_name']           = sanitize_text_field($billing['givenName']);
            }
        }
        if(isset($billing['familyName'])){
            if(!empty($billing['familyName'])){
                $dataArray['billing_last_name']    = sanitize_text_field($billing['familyName']);
                $billingAdd['last_name']   = sanitize_text_field($billing['familyName']);
            }
        }
        if(isset($billing['countryCode'])){
            if(!empty($billing['countryCode'])){
                $dataArray['billing_country']    = strtoupper(sanitize_text_field($billing['countryCode']));
                $billingAdd['country']   = strtoupper(sanitize_text_field($billing['countryCode']));
            }
        }
        if(isset($billing['addressLines'])){
            if(is_array($billing['addressLines'])){
                if(!empty($billing['addressLines'][0])){
                    $dataArray['billing_address_1']    = sanitize_text_field($billing['addressLines'][0]);
                    $billingAdd['address_1']   = sanitize_text_field($billing['addressLines'][0]);
                }
                if(isset($billing['addressLines'][1])){
                    if(!empty($billing['addressLines'][1])){
                        $dataArray['billing_address_2']    = sanitize_text_field($billing['addressLines'][1]);
                        $billingAdd['address_2']   = sanitize_text_field($billing['addressLines'][1]);
                    }
                }
            }
        }
        if(isset($billing['locality'])){
            if(!empty($billing['locality'])){
                $dataArray['billing_city']    = sanitize_text_field($billing['locality']);
                $billingAdd['city']   = sanitize_text_field($billing['locality']);
            }
        }
        if(isset($billing['administrativeArea'])){
            if(!empty($billing['administrativeArea'])){
                $dataArray['billing_state']    = sanitize_text_field($billing['administrativeArea']);
                $billingAdd['state']   = sanitize_text_field($billing['administrativeArea']);
            }
        }
        if(isset($billing['postalCode'])){
            if(!empty($billing['postalCode'])){
                $dataArray['billing_postcode']    = sanitize_text_field($billing['postalCode']);
                $billingAdd['postcode']   = sanitize_text_field($billing['postalCode']);
            }
        }
        //check alt subs.
        if(isset($billing['subLocality'])){
            if(!empty($billing['subLocality'])){
                if(isset($dataArray['billing_city'])){
                    $dataArray['billing_city']   .= ' '. sanitize_text_field($billing['subLocality']);
                    $billingAdd['city']  .= ' ' . sanitize_text_field($billing['subLocality']);
                } else {
                    $dataArray['billing_city']    = sanitize_text_field($billing['subLocality']);
                    $billingAdd['city']   = sanitize_text_field($billing['subLocality']);
                }
            }
        }
        if(isset($billing['subAdministrativeArea'])){
            if(!empty($billing['subAdministrativeArea'])){
                if(isset($dataArray['billing_state'])){
                    $dataArray['billing_state']   .= ' '. sanitize_text_field($billing['subAdministrativeArea']);
                    $billingAdd['state']  .= ' '. sanitize_text_field($billing['subAdministrativeArea']);
                } else {
                    $dataArray['billing_state']    = sanitize_text_field($billing['subAdministrativeArea']);
                    $billingAdd['state']   = sanitize_text_field($billing['subAdministrativeArea']);
                }
            }
        }
        if(isset($shipping['emailAddress'])){
            if(!empty($shipping['emailAddress']) && !isset($dataArray['billing_email'])){
                $dataArray['billing_email']    = sanitize_text_field($shipping['emailAddress']);
                $billingAdd['email']   = sanitize_text_field($shipping['emailAddress']);
            }
        }
        if(isset($shipping['phoneNumber'])){
            if(!empty($shipping['phoneNumber']) && !isset($dataArray['billing_phone'])){
                $dataArray['billing_phone']    = sanitize_text_field($shipping['phoneNumber']);
                $billingAdd['phone']   = sanitize_text_field($shipping['phoneNumber']);
            }
        }
        if(isset($shipping['givenName'])){
            if(!empty($shipping['givenName'])){
                $dataArray['shipping_first_name']   = sanitize_text_field($shipping['givenName']);
                $shippingAdd['first_name'] = sanitize_text_field($shipping['givenName']);
            }
        }
        if(isset($shipping['familyName'])){
            if(!empty($shipping['familyName'])){
                $dataArray['shipping_last_name']    = sanitize_text_field($shipping['familyName']);
                $shippingAdd['last_name']  = sanitize_text_field($shipping['familyName']);
            }
        }
        if(isset($shipping['countryCode'])){
            if(!empty($shipping['countryCode'])){
                $dataArray['shipping_country']    = strtoupper(sanitize_text_field($shipping['countryCode']));
                $shippingAdd['country']  = strtoupper(sanitize_text_field($shipping['countryCode']));
            }
        }
        if(isset($shipping['addressLines'])){
            if(is_array($shipping['addressLines'])){
                if(!empty($shipping['addressLines'][0])){
                    $dataArray['shipping_address_1']    = sanitize_text_field($shipping['addressLines'][0]);
                    $shippingAdd['address_1']  = sanitize_text_field($shipping['addressLines'][0]);
                }
                if(isset($shipping['addressLines'][1])){
                    if(!empty($shipping['addressLines'][1])){
                        $dataArray['shipping_address_2']    = sanitize_text_field($shipping['addressLines'][1]);
                        $shippingAdd['address_2']  = sanitize_text_field($shipping['addressLines'][1]);
                    }
                }
            }
        }
        if(isset($shipping['locality'])){
            if(!empty($shipping['locality'])){
                $dataArray['shipping_city'] = sanitize_text_field($shipping['locality']);
                $shippingAdd['city']  = sanitize_text_field($shipping['locality']);
            }
        }
        if(isset($shipping['administrativeArea'])){
            if(!empty($shipping['administrativeArea'])){
                $dataArray['shipping_state'] = sanitize_text_field($shipping['administrativeArea']);
                $shippingAdd['state']  = sanitize_text_field($shipping['administrativeArea']);
            }
        }
        if(isset($shipping['postalCode'])){
            if(!empty($shipping['postalCode'])){
                $dataArray['shipping_postcode'] = sanitize_text_field($shipping['postalCode']);
                $shippingAdd['postcode']  = sanitize_text_field($shipping['postalCode']);
            }
        }
        //check alt subs.
        if(isset($shipping['subLocality'])){
            if(!empty($shipping['subLocality'])){
                if(isset($dataArray['shipping_city'])){
                    $dataArray['shipping_city'] .= ' '. sanitize_text_field($shipping['subLocality']);
                    $shippingAdd['city']  .= ' ' . sanitize_text_field($shipping['subLocality']);
                } else {
                    $dataArray['shipping_city'] = sanitize_text_field($shipping['subLocality']);
                    $shippingAdd['city']        = sanitize_text_field($shipping['subLocality']);
                }
            }
        }
        if(isset($shipping['subAdministrativeArea'])){
            if(!empty($shipping['subAdministrativeArea'])){
                if(isset($dataArray['shipping_state'])){
                    $dataArray['shipping_state'] .= ' '. sanitize_text_field($shipping['subAdministrativeArea']);
                    $shippingAdd['state']        .= ' ' . sanitize_text_field($shipping['subAdministrativeArea']);
                } else {
                    $dataArray['shipping_state'] = sanitize_text_field($shipping['subAdministrativeArea']);
                    $shippingAdd['state']        = sanitize_text_field($shipping['subAdministrativeArea']);
                }
            }
        }
        $dataArray['billing']    = $billingAdd;
        $dataArray['shipping']   = $shippingAdd;
        return $dataArray;
    }
    
    // Added by Mithilesh K
    // This runs when wp hooks is triggered
    public function _init(){
        $this->update_platformbase_init();
    }
    
    // Added by Mithilesh K
    // this updates platformBase to latest endpoint to avoid deprecated enpoint
    public function update_platformbase_init(){
        $oldPlatformBase     = $this->get_option( 'platformBase' );
        if( $oldPlatformBase == 'test.oppwa.com' ){
            $this->update_option( 'platformBase', 'test' );
        }
        if( $oldPlatformBase == 'oppwa.com' ){
            $this->update_option( 'platformBase', 'live' );
        }
    }

    function process_checkout_flow($dataArray) {
        $_POST                    = $dataArray;
        $_POST['terms']           = 'yes';
        $_POST['payment_method']  = $this->id;
        $_POST['_wpnonce']        = wp_create_nonce('woocommerce-process_checkout'); // Generate nonce
        $checkout                 = WC()->checkout();
        try{
            $order_id             = $checkout->process_checkout();
            if ($order_id && !is_wp_error($order_id)) {
                return $order_id;
	    }
	}catch( Exception $e ){
            return $e->getMessage();
        }
        return "Could not gerenarate order";
    }

    function update_order_on_cart_change($order) {
        if (!$order) {
            return; // Order not found
        }

        // Clear existing items (products, coupons, fees, shipping)
        foreach ($order->get_items() as $item_id => $item) {
            $order->remove_item($item_id);
        }
        foreach ($order->get_items('coupon') as $item_id => $item) {
            $order->remove_item($item_id);
        }
        foreach ($order->get_items('fee') as $item_id => $item) {
            $order->remove_item($item_id);
        }
        foreach ($order->get_items('shipping') as $item_id => $item) {
            $order->remove_item($item_id);
        }
    
        // Add cart items to the order
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $product = $cart_item['data'];
            $quantity = $cart_item['quantity'];
            $line_total = $cart_item['line_total'];
            $line_tax = $cart_item['line_tax'];
    
            // Create a new order item
            $item = new WC_Order_Item_Product();
            $item->set_product($product);
            $item->set_quantity($quantity);
            $item->set_subtotal($cart_item['line_subtotal']);
            $item->set_total($line_total);
            $item->set_taxes(['total' => $line_tax]);
    
            $order->add_item($item);
        }
        $order->save();
    
        // Handle applied coupons
        $appliedCoupons               = WC()->cart->get_coupons();
        foreach ( $appliedCoupons as $coupon_code => $coupon ) {
            if ( WC()->cart->has_discount( $coupon_code ) && $coupon->is_valid() ) {
                 $order->apply_coupon($coupon_code);
            }
        }
    
        // Synchronize fees
        foreach (WC()->cart->get_fees() as $fee) {
            $item = new WC_Order_Item_Fee();
            $item->set_name($fee->name);
            $item->set_amount($fee->amount);
            $item->set_tax_class($fee->taxable ? $fee->tax_class : '');
            $item->set_taxes(['total' => $fee->tax_data]);
            $order->add_item($item);
        }
    
        // Synchronize shipping methods
        foreach (WC()->cart->get_shipping_packages() as $package_key => $package) {
            foreach ($package['rates'] as $rate_id => $rate) {
                $item = new WC_Order_Item_Shipping();
                $item->set_method_title($rate->get_label());
                $item->set_method_id($rate->get_id());
                $item->set_total($rate->get_cost());
                $item->set_taxes(['total' => $rate->get_taxes()]);
                $order->add_item($item);
            }
        }
    
        // Recalculate totals and save the order
        $order->calculate_totals();
        $order->save();
    }
    
    public function set_customer_address_fields( $field, $key, $data ) {
        $billing_value  = null;
        $shipping_value = null;

        if ( isset( $data[ "billing_{$field}" ] ) && is_callable( array( WC()->customer, "set_billing_{$field}" ) ) ) {
            $billing_value  = $data[ "billing_{$field}" ];
            $shipping_value = $data[ "billing_{$field}" ];
        }

        if ( isset( $data[ "shipping_{$field}" ] ) && is_callable( array( WC()->customer, "set_shipping_{$field}" ) ) ) {
            $shipping_value = $data[ "shipping_{$field}" ];
        }

        if ( ! is_null( $billing_value ) && is_callable( array( WC()->customer, "set_billing_{$field}" ) ) ) {
            WC()->customer->{"set_billing_{$field}"}( $billing_value );
        }

        if ( ! is_null( $shipping_value ) && is_callable( array( WC()->customer, "set_shipping_{$field}" ) ) ) {
            WC()->customer->{"set_shipping_{$field}"}( $shipping_value );
        }
    }

    public function update_session( $data ) {
        // Update both shipping and billing to the passed billing address first if set.
        $address_fields = array(
            'first_name',
            'last_name',
            'company',
            'email',
            'phone',
            'address_1',
            'address_2',
            'city',
            'postcode',
            'state',
            'country',
        );

        array_walk( $address_fields, array( $this, 'set_customer_address_fields' ), $data );
        WC()->customer->save();

        // Update customer shipping and payment method to posted method.
        $chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods' );

        if ( is_array( $data['shipping_method'] ) ) {
            foreach ( $data['shipping_method'] as $i => $value ) {
                if ( ! is_string( $value ) ) {
                    continue;
                }
                $chosen_shipping_methods[ $i ] = $value;
            }
        }

        WC()->session->set( 'chosen_shipping_methods', $chosen_shipping_methods );
        WC()->session->set( 'chosen_payment_method', $data['payment_method'] );

            // Update cart totals now we have customer address.
        WC()->cart->calculate_totals();
    }

    public function process_customer( $data ) {
        /**
         * This action is documented in woocommerce/includes/class-wc-checkout.php
         *
         * @since 3.0.0 or earlier
         */
        $customer_id                  = email_exists( $data['billing_email'] );

        if(!is_wp_error($customer_id) && (int)$customer_id > 0){
            $customer_id              = apply_filters( 'woocommerce_checkout_customer_id', $customer_id );
        } else if($this->forceCreateAcc === true || WC()->checkout->is_registration_required() ){
            $username    = ! empty( $data['account_username'] ) ? $data['account_username'] : '';
            $password    = ! empty( $data['account_password'] ) ? $data['account_password'] : '';
            $customer_id = wc_create_new_customer(
                $data['billing_email'],
                $username,
                $password,
                array(
                    'first_name' => ! empty( $data['billing_first_name'] ) ? $data['billing_first_name'] : '',
                    'last_name'  => ! empty( $data['billing_last_name'] ) ? $data['billing_last_name'] : '',
                )
            );

            if ( is_wp_error( $customer_id ) ) {
                if ( 'registration-error-email-exists' === $customer_id->get_error_code() ) {
                    throw new Exception( apply_filters( 'woocommerce_registration_error_email_exists', __( 'An account is already registered with your email address. <a href="#" class="showlogin">Please log in.</a>', 'woocommerce' ), $data['billing_email'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
                }
                throw new Exception( $customer_id->get_error_message() ); // phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
            }

            wc_set_customer_auth_cookie( $customer_id );

            // As we are now logged in, checkout will need to refresh to show logged in data.
            WC()->session->set( 'reload_checkout', true );

            // Also, recalculate cart totals to reveal any role-based discounts that were unavailable before registering.
            WC()->cart->calculate_totals();
        }

        // On multisite, ensure user exists on current site, if not add them before allowing login.
        if ( $customer_id && is_multisite() && is_user_logged_in() && ! is_user_member_of_blog() ) {
            add_user_to_blog( get_current_blog_id(), $customer_id, 'customer' );
        }

        // Add customer info from other fields.
        if ( $customer_id && apply_filters( 'woocommerce_checkout_update_customer_data', true, $this ) ) {
            $customer = new WC_Customer( $customer_id );

            if ( ! empty( $data['billing_first_name'] ) && '' === $customer->get_first_name() ) {
                $customer->set_first_name( $data['billing_first_name'] );
            }

            if ( ! empty( $data['billing_last_name'] ) && '' === $customer->get_last_name() ) {
                $customer->set_last_name( $data['billing_last_name'] );
            }

            // If the display name is an email, update to the user's full name.
            if ( is_email( $customer->get_display_name() ) ) {
                $customer->set_display_name( $customer->get_first_name() . ' ' . $customer->get_last_name() );
            }

            foreach ( $data as $key => $value ) {
                // Use setters where available.
                if ( is_callable( array( $customer, "set_{$key}" ) ) ) {
                        $customer->{"set_{$key}"}( $value );

                        // Store custom fields prefixed with wither shipping_ or billing_.
                } elseif ( 0 === stripos( $key, 'billing_' ) || 0 === stripos( $key, 'shipping_' ) ) {
                        $customer->update_meta_data( $key, $value );
                }
            }

            /**
             * Action hook to adjust customer before save.
             *
             * @since 3.0.0
             */
            do_action( 'woocommerce_checkout_update_customer', $customer, $data );

            $customer->save();
        }

        do_action( 'woocommerce_checkout_update_user_meta', $customer_id, $data );
    }
    
    public function onPaymentAuthorized(){
        global $woocommerce;
        $jsonData                    = file_get_contents('php://input');
        $postDataArr                 = json_decode($jsonData,true);
        $this->writeLog( '----- onPaymentAuthorized -----', $jsonData, 'debug' );
        $postData                    = $postDataArr['payment'];
        $CheckoutID                  = $postDataArr['checkout_id'];
        $readyState                  = false;
        $errors                      = [];
        $chkArray                    = [];
        $fieldMapping                = [
            'billing_email' => ['error' => ['code'=>'shippingContactInvalid','contactField'=>'emailAddress','message'=>'Email '], 'func'=>'validateEmail' ],
            'billing_phone' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'phoneNumber','message'=>'Phone '], 'func'=>'validatePhone' ],
            'billing_first_name' => [ 'error'=> ['code'=>'billingContactInvalid','contactField'=>'name','message'=>'Name '] ],
            'billing_last_name' => [ 'error'=> ['code'=>'billingContactInvalid','contactField'=>'name','message'=>'Name '] ],
            'billing_address_1' => [ 'error'=> ['code'=>'billingContactInvalid','contactField'=>'addressLines','message'=>'Address '] ],
            'billing_city' => [ 'error'=> ['code'=>'billingContactInvalid','contactField'=>'locality','message'=>'Town/City '] ],
            'billing_state' => [ 'error'=> ['code'=>'billingContactInvalid','contactField'=>'administrativeArea','message'=>'State/County '] ],
            'billing_postcode' => [ 'error'=> ['code'=>'billingContactInvalid','contactField'=>'postalCode','message'=>'Postal/Zip '], 'func'=>'validatePostcodeBilling' ],
            'billing_country' => [ 'error'=> ['code'=>'billingContactInvalid','contactField'=>'countryCode','message'=>'Billing Country '] ],
            'shipping_first_name' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'name','message'=>'Name '] ],
            'shipping_last_name' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'name','message'=>'Name '] ],
            'shipping_address_1' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'addressLines','message'=>'Address '] ],
            'shipping_city' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'locality','message'=>'Town/City '] ],
            'shipping_state' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'administrativeArea','message'=>'State/County '] ],
            'shipping_postcode' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'postalCode','message'=>'Postal/Zip '], 'func'=>'validatePostcodeShipping' ],
            'shipping_country' => [ 'error'=> ['code'=>'shippingContactInvalid','contactField'=>'countryCode','message'=>'Shipping Country '] ],
        ];
        $billing                      = $this->unsetEmptyArrayVars($postData["billingContact"]);
        $shipping                     = $this->unsetEmptyArrayVars($postData["shippingContact"]);
        if(!isset($billing["countryCode"])){
            $errors[]                 = ['code'=>'billingContactInvalid','contactField'=>'countryCode','message'=>'Country is mandatory'];
        } else {
            $chkArray                 = array_merge($chkArray,$this->genAddrReq($billing["countryCode"],'billing_'));
        }
        $requiredShippingContactFields               = $this->billingAddressFields;
        if(in_array("postalAddress",$requiredShippingContactFields)){
            if(!isset($shipping["countryCode"])){
                $errors[]             = ['code'=>'shippingContactInvalid','contactField'=>'countryCode','message'=>'Country is mandatory'];
            } else {
                $chkArray             = array_merge($chkArray,$this->genAddrReq($shipping["countryCode"],'shipping_'));
            }
        }
        $dataArray                    = $this->prepareAuthorisedDataArray($billing, $shipping);
        foreach($chkArray as $chk){
            if(!isset($dataArray[$chk])){
                $error                = $fieldMapping[$chk]['error'];
                $error['message']     = $error['message'] . "required";
                $errors[]             = $error;
            } else {
                if(isset($fieldMapping[$chk]['func'])){
                    $func             = $fieldMapping[$chk]['func'];
                    if($func==='validateEmail'){
                        $validate     = is_email( sanitize_email($dataArray[$chk]) );
                    } else if($func==='validatePhone'){
                        $validate     = WC_Validation::is_phone( $dataArray[$chk] );
                    } else if($func==='validatePostcodeBilling'){
                        $validate     = WC_Validation::is_postcode( $dataArray[$chk], $dataArray['billing_country'] );
                    } else if($func==='validatePostcodeShipping'){
                        $validate     = WC_Validation::is_postcode( $dataArray[$chk], $dataArray['shipping_country'] );
                    } else {
                        $validate     = true;
                    }
                    if($validate === false){
                        $error        = $fieldMapping[$chk]['error'];
                        $error['message'] = $error['message'] . "invalid";
                        $errors[]     = $error;
                    }
                }
            }
        }


        if(count($errors) === 0){
            $readyState                       = true;
            //clear session vars
            $this->clearSessAddressVars();
            //set session vars
            $this->storeSessAddressVars($dataArray);
        
            $dataArray['payment_method']      = $this->id;
            //$dataArray['customer_id']         = get_current_user_id();
            $checkout                         = WC()->checkout;//new WC_Checkout();
            /*if($dataArray['customer_id'] === 0){
                $customer_id                  = email_exists( $dataArray['billing_email'] );
                if(!is_wp_error($customer_id) && (int)$customer_id > 0){
                    $dataArray['customer_id'] = $customer_id;
                } else if($this->forceCreateAcc === true || $checkout->is_registration_required() === true){
                    $dataArray['customer_id'] = $this->prepareCustomerIdForOrder( $dataArray );
                }
	    }*/
            $this->writeLog( '----- fn_tp_applepay_create_order add dataArray values -----', $dataArray, 'debug' );

            $woocommerce->cart->calculate_totals();

            $errorArr        = [];
            try {
                wc_maybe_define_constant( 'WOOCOMMERCE_CHECKOUT', true );
                wc_set_time_limit( 0 );

                do_action( 'woocommerce_before_checkout_process' );

                if ( WC()->cart->is_empty() ) {
                    $this->writeLog( '----- fn_tp_applepay_create_order process checkout -----', "empty cart issue", 'debug' );
                    wp_send_json_error( [
                        'status'             => false,
                        'errors'             => ["empty cart issues"],
                    ], 422 );
                }

                do_action( 'woocommerce_checkout_process' );

                //$errors      = new WP_Error();
                $posted_data = $dataArray;

                // Update session for customer and totals.
                $this->update_session( $posted_data );

                // Validate posted data and cart items before proceeding.
                //$checkout->validate_checkout( $posted_data, $errors );

                /*foreach ( $errors->errors as $code => $messages ) {
                    $data = $errors->get_error_data( $code );
                    foreach ( $messages as $message ) {
                        $errorArr[]    = $message;
                    }
		}*/

                if ( empty( $posted_data['woocommerce_checkout_update_totals'] ) && 0 === count( $errorArr ) ) {
                    $this->process_customer( $posted_data );
                    $order_id = $checkout->create_order( $posted_data );
                    $order    = wc_get_order( $order_id );

                    if ( is_wp_error( $order_id ) ) {
                        wp_send_json_error( [
                            'status'             => false,
                            'errors'             => [$order_id->get_error_message()],
                        ], 422 );
                    }

                    if ( ! $order ) {
                        wp_send_json_error( [
                            'status'             => false,
                            'errors'             => [__( 'Unable to create order.', 'woocommerce' )],
                        ], 422 );
                    }

                    do_action( 'woocommerce_checkout_order_processed', $order_id, $posted_data, $order );
                }
            } catch ( Exception $e ) {
                $this->writeLog( '----- fn_tp_applepay_create_order process checkout -----', $e->getMessage(), 'debug' );
                wp_send_json_error( [
                    'status'             => false,
                    'errors'             => [$e->getMessage()],
                ], 422 );
            }

	    if($order){
                $this->writeLog( '----- fn_tp_applepay_create_order process checkout -----', "Order exists", 'debug' );
                WC()->session->set( 'store_api_draft_order', $order_id );
                WC()->session->set( 'order_awaiting_payment', $order_id );
                $order->set_status('pending');
                $order->set_payment_method( $this );
                $order->save();
                $paymentData                  = [];
                $paymentData['order_id']      = $order_id;

                //$order                        = wc_get_order( $order_id );
                $amount                       = number_format($order->get_total(), 2, '.', '');
                $order_data                   = $order->get_data();
                
                $paymentUrl                   = $order->get_checkout_payment_url( false );
                $returnURL                    = site_url('tp-apple-pay-init');
                $shopperUrl                   = add_query_arg( [ 'processpay' => '2', 'order_id' => $order_id ], $returnURL );
                $additionalParameters         = [
                    //"shopperResultUrl"                          => $shopperUrl,
                    "customParameters[SHOPPER_payment_url]"     => $paymentUrl,
                ];
                $payload                      = [
                    "merchantTransactionId"                     => $order_data['id'],
                    "customer.merchantCustomerId"               => $order_data['customer_id'],
                    "customParameters[SHOPPER_order_key]"       => $order_data['order_key'],
                    "customParameters[SHOPPER_cart_hash]"       => $order_data['cart_hash'],
                    "customParameters[SHOPPER_platform]"        => "WooCommerce",
                ];
                $payload                      = array_merge($payload, $additionalParameters);
                $url                          = "https://".$this->getPlatformBase()."/v1/checkouts/$CheckoutID";
                $url                          = add_query_arg( [ 'entityId' => $this->getEntityID() ], $url );
                $resp                         = $this->prepareRemoteRequest( $url, $payload, 'POST' );
                $this->writeLog( '----- fn_tp_applepay_create_order -----', [$payload, $resp, $url], 'debug' );
                wp_send_json_success( [
                    'status'     => true,
                    'order_id'   => $order_id
                ] );
            }else{
                $this->writeLog( '----- fn_tp_applepay_create_order no order -----', [$order, $errors], 'debug' );
	    }
        }

        wp_send_json_error( [
            'status'             => false,
            'errors'             => $errors,
        ], 422 );
    }

    public function generateLineItems(){
        $array                                = [];
        //set cartitem line
        $array[]                              = [
            'type'        => 'final',
            'label'       => 'Items',
            'amount'      => number_format((WC()->cart->get_subtotal() + WC()->cart->get_subtotal_tax()), 2)
        ];
        //set shipping line
        if($this->reqShipping() === true){
            $shippingTax                      = WC()->cart->get_shipping_tax();
            $shippingTotal                    = WC()->cart->get_shipping_total();
            $array[]                          = [
                'type'    => 'final',
                'label'   => 'Delivery',
                'amount'  => number_format( ($shippingTotal + $shippingTax) , 2)
            ];
        }
        //set discount line
        if((WC()->cart->get_discount_total() + WC()->cart->get_discount_tax()) > 0){
            $array[]                          = [
                'type'    => 'final',
                'label'   => 'Discounts',
                'amount'  => number_format((WC()->cart->get_discount_total() + WC()->cart->get_discount_tax()), 2)
            ];
        }
        return $array;
    }
} //end class
