<?php
namespace textme;



use Exception;

/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.2
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



/**
 * SMS Gateway
 *
 * ...
 *
 * @since 1.0
 */
class sms_geteway {

    private $shop_manager_phone;

    private function user_access() {
        $account = get_option('textme_sms_account');

        return $xml = '<user>
        <username>' . $account['sms_user_name'] . '</username>
        <password>' . $account['sms_pass'] . '</password>
        </user>';

    }

    private function sms_content( $content, $phone_num ) {
        $phone_num = trim(str_replace(array('-',' '),'',$phone_num));
        return $xml = '<destinations>
        <phone id="TextMe">' . $phone_num . '</phone>
        </destinations>
        <message>' . $content . '</message>';
    }

    public function send_sms( $content, $phone_num ) {
        $option = get_option('textme_sms_account');

        $xml = "<?xml version='1.0' encoding='UTF-8'?>
        <sms>" . $this->user_access() . "
        <source>" . $option['sms_from'] . "</source>" . $this->sms_content($content, $phone_num) . "
        </sms>";

        $this->sms_geteway($xml);
    }

    public function get_balance() {
        $xml = "<?xml version='1.0' encoding='UTF-8'?>
        <balance>" . $this->user_access() . "</balance>";

        return $this->sms_geteway($xml);
    }


    function sms_geteway( $xml ) {
        $url = "https://my.textme.co.il/api";
        $args = array(
            'timeout' => 45,
            'body' => $xml,
            'headers' => array(
                'charset' => 'utf-8',
                'accept' => 'application/xml',
                'content-type' => 'application/xml'
            )
        );
        $response = wp_remote_post( $url, $args );

        if ( is_wp_error( $response ) ) {
            return $response;
        }

        $http_code = wp_remote_retrieve_response_code( $response );
        if ( ! in_array( $http_code, array( 200, 201, 202 ) ) ) {
            return new \WP_Error( $http_code, sprintf( 'TXETME: There was an HTTP error: %d', $http_code ) );
        }

        try {
            $xml = simplexml_load_string( wp_remote_retrieve_body( $response ) );
        } catch ( Exception $e ) {
            $xml = new \WP_Error( 500, sprintf( 'TEXTME: There was an error parsing the xml response: %s', $e->getMessage() ) );
        }

        return $xml;
    }

    public function create_sms_content( $order_id, $sms_customer ) {

        $billing_first_name = get_post_meta( $order_id, '_billing_first_name', true );
        $billing_last_name  = get_post_meta( $order_id, '_billing_last_name',  true );
        $billing_address    = get_post_meta( $order_id, '_billing_address_1',  true );
        $billing_city       = get_post_meta( $order_id, '_billing_city',       true );
        $billing_email      = get_post_meta( $order_id, '_billing_email',      true );

        $sms_customer = str_replace( "[first name]",   $billing_first_name, $sms_customer );
        $sms_customer = str_replace( "[last name]",    $billing_last_name, $sms_customer  );
        $sms_customer = str_replace( "[order number]", $order_id, $sms_customer           );
        $sms_customer = str_replace( "[address]",      $billing_address, $sms_customer    );
        $sms_customer = str_replace( "[city]",         $billing_city, $sms_customer       );
        $sms_customer = str_replace( "[email]",        $billing_email, $sms_customer      );

        return $sms_customer;

    }

}
