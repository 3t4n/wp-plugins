<?php
	namespace Nagad\Gateway\Payment;
	use DateTime;
	use DateTimeZone;
	
class helper extends gateway{
	
	public static function randomString( $length = 40 ) {
        $characters        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen( $characters );
        $random_string     = '';

        for ( $i = 0; $i < $length; $i ++ ) {
            $random_string .= $characters[ rand( 0, $characters_length - 1 ) ];
        }

        return $random_string;
    }
	
	public static function encryptDataWithPublicKey( $data ) {
        if ( gettype( $data ) == 'array' ) {
            $data = json_encode( $data );
        }

        $pgw_public_key = gateway::gatewayOption( 'nagad_gateway_public_key' );
        $public_key     = "-----BEGIN PUBLIC KEY-----\n" . $pgw_public_key . "\n-----END PUBLIC KEY-----";
        $key_resource   = openssl_get_publickey( $public_key );

        openssl_public_encrypt( $data, $crypttext, $key_resource );

        return base64_encode( $crypttext );
    }
	
	public static function generateSignature( $data ) {
        if ( gettype( $data ) == 'array' ) {
            $data = json_encode( $data );
        }

        $merchant_private_key = gateway::gatewayOption( 'merchant_private_key' );

        $private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $merchant_private_key . "\n-----END RSA PRIVATE KEY-----";
        openssl_sign( $data, $signature, $private_key, OPENSSL_ALGO_SHA256 );

        return base64_encode( $signature );
    }
	
	public static function decryptDataWithPrivateKey( $crypt_text ) {
        $merchant_private_key = gateway::gatewayOption( 'merchant_private_key' );

        $private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $merchant_private_key . "\n-----END RSA PRIVATE KEY-----";

        openssl_private_decrypt( base64_decode( $crypt_text ), $plain_text, $private_key );

        return $plain_text;
    }
	
	public static function http_request( $url, $data ) {
        $args = [
            'body'        => json_encode( $data ),
            'timeout'     => '30',
            'redirection' => '30',
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => self::get_header(),
            'cookies'     => [],
        ];

        $response = wp_remote_post( esc_url_raw( $url ), $args ); // HTTP request using POST method
        $response = wp_remote_retrieve_body( $response ); //retrieve only the body from the raw response

        if ( strpos( $response, 'Your support ID is:' ) ) {
            return [ 'message' => $response ];
        }

        return json_decode( $response, true );
    }
	
	public static function get_header() {
        $headers = [
            'Content-Type'     => 'application/json',
            'X-KM-Api-Version' => 'v-0.2.0',
            'X-KM-IP-V4'       => self::get_client_ip(),
            'X-KM-Client-Type' => 'PC_WEB',
        ];


        return $headers;
    }
	
	public static function get_client_ip() {
        $ipaddress = '';

        $keys = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR',
        ];

        foreach ( $keys as $key ) {
            if ( isset( $_SERVER[ $key ] ) ) {
                $ipaddress = $_SERVER[ $key ];
                break;
            }
        }

        $ipaddress = $ipaddress ? $ipaddress : 'UNKNOWN';

        return $ipaddress;
    }
	
	public static function getCurrentBDtime( $format = "YmdHis", $timezone = "Asia/Dhaka" ) {
        $timezone = new DateTimeZone( $timezone );
        $datetime = new DateTime( 'now', $timezone );

        return $datetime->format( $format );
    }


    //db functions

    public static function get_txn_history($order_no){

        global $wpdb;

        $table = $wpdb->prefix . 'nagad_txn_history';

        $single_order = "SELECT * FROM $table WHERE order_id = '%d'";

        $order_exist = $wpdb->get_row($wpdb->prepare($single_order, $order_no));

        return $order_exist;
    }


    public static function insert_txn_history($data){
        
        global $wpdb;

        $table = $wpdb->prefix . 'nagad_txn_history';
        $insert_txn_history = $wpdb->insert($table, [
            'order_id' => sanitize_text_field($data['order_id']),
            'nagad_order_id' => sanitize_text_field($data['nagad_order_id']),
            'nagad_txn_id' => sanitize_text_field($data['nagad_txn_id']),
            'payment_ref_id' => sanitize_text_field($data['payment_ref_id']),
            'nagad_txn_amount' => sanitize_text_field($data['nagad_txn_amount']),
            'txn_status' => sanitize_text_field($data['txn_status']),
            'nagad_txn_time' => sanitize_text_field($data['nagad_txn_time']),
            'order_time' => sanitize_text_field($data['order_time'])
        ]);

        return $insert_txn_history;
    }

    public static function get_txn_list( $args = [] ) {
        global $wpdb;
    
        $defaults = [
            'number'  => 10,
            'offset'  => 0
            // 'orderby' => 'id',
            // 'order'   => 'ASC',
        ];
    
        $args = wp_parse_args( $args, $defaults );
    
        $table_name = $wpdb->prefix . 'nagad_txn_history';
    
        $query = "SELECT * FROM $table_name";
    
        if ( isset( $args['search'] ) ) {
            $query .= " WHERE order_id LIKE '%{$args['search']}%' OR nagad_txn_id LIKE '%{$args['search']}%'";
        }
    
        $query .= " ORDER BY order_time DESC LIMIT %d, %d";
    
        $items = $wpdb->get_results(
            $wpdb->prepare( $query, $args['offset'], $args['number'] )
        );
    
        return $items;
    }

    public static function get_txn_count() {
        global $wpdb;
    
        $table_name = $wpdb->prefix . 'nagad_txn_history';
    
        return (int) $wpdb->get_var( "SELECT COUNT(id) from $table_name" );
    }
}