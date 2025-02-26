<?php
/**
Plugin Name: acemount
Description: This plugin help you to sent SMS using acemount service
Author: Sergey
Version:  1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


define('ACEMOUNT_DIR',  plugin_dir_path( __FILE__ ));
define('ACEMOUNT_POST', admin_url ('admin.php?page=acemount/views/acemount_index.php', __FILE__));



new Acemount();


class Acemount {

    public $acemount_auth;
    public $acemount_text;
    public $acemount_phone;
    public $acemount_order_id;
    public $acemount_orderInfo;
    public $acemount_productInfo;
    public $acemount_can;


    public function __construct() {

        wp_enqueue_style('acemountCSS', plugins_url( 'acemount.css', __FILE__ ));
        // add menu setting
        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'acemount_add_setting_link') );
        // add menu to woocommerce menu
        add_action('admin_menu', array( $this, 'acemount_add_pages' ) );


        // send SMS after order status changes
        add_action('woocommerce_order_status_completed', array( $this,'acemount_order_status_completed'));  //завершен
        add_action('woocommerce_order_status_cancelled', array($this, 'acemount_order_status_cancelled'));  //отменен
        add_action('woocommerce_order_status_refunded', array($this, 'acemount_order_status_refunded'));  //возвращен
        add_action('woocommerce_order_status_failed', array( $this,'acemount_order_status_failed')); //не удался
        add_action('woocommerce_order_status_on-hold', array($this, 'acemount_order_status_on_hold')); // на удержании
        add_action('woocommerce_order_status_processing', array($this, 'acemount_order_status_on'));  //обработка
        add_action('woocommerce_order_status_pending', array($this, 'acemount_order_status_pending')); // в ожидании оплаты

        // add block for send SMS from order edit page
        add_action( 'add_meta_boxes', array( $this, 'acemount_order_sms_send_block' ), 31 );
        add_action( 'wp_ajax_acemount_get_ajax', array( $this, 'acemount_get_ajax' ) );


    }

    public function acemount_add_setting_link ( $links ) {
        $links[] = sprintf('<a href="%s">Settings</a>', admin_url('admin.php?page=acemount/views/acemount_index.php') );
        return $links;
    }

    public function acemount_get_ajax() {

        $this->acemount_phone = intval( $_POST['acemount_phone'] );
        $this->acemount_text = sanitize_text_field( $_POST['acemount_text'] );

        check_ajax_referer('acemount_one_sms', 'acemount_one_sms');


        // Validate part
        if(strlen((string)$this->acemount_phone) < 10 || strlen((string)$this->acemount_phone) > 13){
            wp_send_json_error( 'Telephone number can use only numbers and count of numbers can\'t be less than 10 or more than 13. Use international telephone format' );
        }

        if(strlen($this->acemount_text) < 1){
            wp_send_json_error( 'Please, type the text of SMS' );
        }

        if(strlen(get_option('acemount_alpha')) < 2 ){
            wp_send_json_error( 'Choose SMS Sender name in app settings' );
        }

        $this->acemount_sms_one_send(); // sending SMS

        wp_send_json_success( 'SMS was sent' ); // function use as exit


    }



    public function acemount_order_sms_send_block() {
        include_once ACEMOUNT_DIR . 'acemount_meta_box.php';
        add_meta_box( 'acemount_sms_send_block','Send SMS', 'Acemount_meta_box::acemount_output', wc_get_order_types( 'order-meta-boxes' ), 'side', 'high' );
    }

    public function acemount_add_pages()
    {
        add_submenu_page('woocommerce', 'Acemount', 'Acemount', 'manage_options', ACEMOUNT_DIR.'views/acemount_index.php');
    }

    public function acemount_order_status_completed( )
    {

        $this->acemount_text = get_option('acemount_order_completed_sms_text');
        $this->acemount_can = get_option('acemount_order_completed_can');
        $this->acemount_sms_sent();

    }

    public function acemount_order_status_failed( )
    {
        $this->acemount_text = get_option('acemount_order_failed_sms_text');
        $this->acemount_can = get_option('acemount_order_failed_can');
        $this->acemount_sms_sent();

    }


    public function acemount_order_status_on_hold( )
    {
        $this->acemount_text = get_option('acemount_order_on_hold_sms_text');
        $this->acemount_can = get_option('acemount_order_on_hold_can');
        $this->acemount_sms_sent();
    }

    public function acemount_order_status_on( )
    {
        $this->acemount_text = get_option('acemount_order_on_sms_text');
        $this->acemount_can = get_option('acemount_order_on_can');
        $this->acemount_sms_sent();
    }

    public function acemount_order_status_refunded( )
    {
        $this->acemount_text = get_option('acemount_order_refunded_sms_text');
        $this->acemount_can = get_option('acemount_order_refunded_can');
        $this->acemount_sms_sent();

    }

    public function acemount_order_status_cancelled( )
    {
        $this->acemount_text = get_option('acemount_order_cancelled_sms_text');
        $this->acemount_can = get_option('acemount_order_cancelled_can');
        $this->acemount_sms_sent();

    }

    public function acemount_order_status_pending( ) {
        $this->acemount_text = get_option('acemount_order_pending_sms_text');
        $this->acemount_can = get_option('acemount_order_pending_can');
        $this->acemount_sms_sent();
    }

    // use to send one sms
    public function acemount_sms_one_send( ) {

        $this->acemount_auth = get_option('acemount_auth');


        $acemount_data = [
            "phones" => [
                $this->acemount_phone,
            ],
            "text" => $this->acemount_text,
            "originator" => get_option('acemount_alpha')
        ];


        $acemount_response = wp_remote_post( 'https://api.acemountmedia.com/sms/send', array(
            'body' => $acemount_data,
            'headers' => array(
                'Authorization' => 'Bearer ' . $this->acemount_auth,
            ),
        ) );

        $acemount_result = json_decode($acemount_response['body']);



        return $acemount_result;

    }

    // use to send sms after order status change
    public function acemount_sms_sent( )
    {
        if($this->acemount_can != 'can'){
            return true;
        }


        $this->acemount_checkToken();


        $this->acemount_auth = get_option('acemount_auth');


        $acemount_data = [
            "phones" => [
                $this->acemount_orderInfo->get_billing_phone(),
            ],
            "text" => $this->acemount_text,
            "originator" => get_option('acemount_alpha')
        ];


        $acemount_response = wp_remote_post( 'https://api.acemountmedia.com/sms/send', array(
            'body' => $acemount_data,
            'headers' => array(
                'Authorization' => 'Bearer ' . $this->acemount_auth,
            ),
        ) );

        $acemount_result = json_decode($acemount_response['body']);

        return $acemount_result;

    }

    public function acemount_checkToken()
    {

        global  $post;

        if( WC()->session->order_awaiting_payment > 0 ){
            $this->acemount_order_id = WC()->session->order_awaiting_payment;
        }elseif ( isset($_GET['post'][0]) && $_GET['post'][0] > 0 ){
            $this->acemount_order_id = $_GET['post'][0];
        }elseif( isset($post->ID) && $post->ID > 1 ){
            $this->acemount_order_id = $post->ID;
        }


        $this->acemount_orderInfo = new WC_Order($this->acemount_order_id);



        $acemount_productArr = $this->acemount_orderInfo->get_items(); // тут инфа о твоаре с заказа
        foreach( $acemount_productArr as $acemount_item_id => $acemount_item_info ){
            $this->acemount_productInfo = $acemount_item_info;
        }

        $acemount_token_str = explode(']', $this->acemount_text);
        $acemount_tokens = [];
        for($i =0; $i<count($acemount_token_str)-1; $i++){
            preg_match_all('/\[.+\]/', $acemount_token_str[$i].']', $acemount_token);
            array_push($acemount_tokens, $acemount_token[0]);
        }



        for($i = 0; $i<count($acemount_tokens); $i++){
            $this->acemount_text = str_replace($acemount_tokens[$i][0], $this->acemount_updateText($acemount_tokens[$i][0]), $this->acemount_text);
        }




    }

    // change token for needle text
    public function acemount_updateText($acemount_token)
    {
        $acemount_token_val = [
            '[item_name]' =>  $this->acemount_productInfo->get_name(),
            '[item_name_qty]' => $this->acemount_productInfo->get_quantity(),
            '[order_id]' => $this->acemount_productInfo->get_order_id(),
            '[order_status]' => $this->acemount_orderInfo->get_status(),
            '[billing_first_name]' => $this->acemount_orderInfo->get_billing_first_name(),
            '[billing_last_name]' => $this->acemount_orderInfo->get_billing_last_name(),
            '[billing_company]' => $this->acemount_orderInfo->get_billing_company(),
            '[billing_address_1]' => $this->acemount_orderInfo->get_billing_address_1(),
            '[billing_address_2]' => $this->acemount_orderInfo->get_billing_address_2(),
            '[billing_city]' => $this->acemount_orderInfo->get_billing_city(),
            '[billing_state]' => $this->acemount_orderInfo->get_billing_state(),
            '[billing_postcode]' => $this->acemount_orderInfo->get_billing_postcode(),
            '[billing_country]' => $this->acemount_orderInfo->get_billing_country(),
            '[billing_email]' => $this->acemount_orderInfo->get_billing_email(),
            '[billing_phone]' => $this->acemount_orderInfo->get_billing_phone(),
            '[shipping_first_name]' => $this->acemount_orderInfo->get_shipping_first_name(),
            '[shipping_last_name]' => $this->acemount_orderInfo->get_shipping_last_name(),
            '[shipping_company]' => $this->acemount_orderInfo->get_shipping_company(),
            '[shipping_address_1]' => $this->acemount_orderInfo->get_shipping_address_1(),
            '[shipping_address_2]' => $this->acemount_orderInfo->get_shipping_address_2(),
            '[shipping_city]' => $this->acemount_orderInfo->get_shipping_city(),
            '[shipping_state]' => $this->acemount_orderInfo->get_shipping_state(),
            '[shipping_postcode]' => $this->acemount_orderInfo->get_shipping_postcode(),
            '[shipping_country]' => $this->acemount_orderInfo->get_shipping_country(),
            '[order_currency]' => $this->acemount_orderInfo->get_currency(),
            '[payment_method]' => $this->acemount_orderInfo->get_payment_method(),
            '[payment_method_title]' => $this->acemount_orderInfo->get_payment_method_title(),
            '[shipping_method]' => $this->acemount_orderInfo->get_shipping_method(),


        ];




        return $acemount_token_val[$acemount_token];
    }

}


?>


