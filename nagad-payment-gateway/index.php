<?php
/*
Plugin Name: Nagad Payment Gateway
Plugin URI: https://gitlab.com/NagadExternal/pgw/ng_pgw_wp_plugin/-/blob/main/nagad-pay.zip
Description: wordpress plugin for Nagad Payment Gateway.
Version: 1.1.4
Author: Nagad Limited
Author URI: https://nagad.com.bd/bn/
License: GPL2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: nagad-pay
*/

use Nagad\Gateway\Payment\gateway;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    return;
}


class nagad_gate{

    private $container = [];


    private function __construct() {

		define('NAGAD_PLUGIN_URL',plugin_dir_url(__FILE__)); 
        register_activation_hook (__FILE__, [$this, 'create_table']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] ); 
        add_action('wp_ajax_nagad-pay-create-payment-request', [$this, 'create_payment_request']);
    }


    public static function init() {
        static $instance = false; 

        if ( ! $instance ) {
            $instance = new nagad_gate;
        }

        return $instance;
    }

    public function __get( $ref ) {
        if ( array_key_exists( $ref, $this->container ) ) {
            return $this->container[ $ref ];
        }

        return $this->{$ref};
    }


    public function __isset( $ref ) {
        return isset( $this->{$ref} ) || isset( $this->container[ $ref ] );
    }



    public function init_plugin() {

        if($this->is_request('admin')){
            $this->container['admin'] = new Nagad\Gateway\Payment\nagad_orders();
        }

        add_action( 'init', [ $this, 'init_classes' ] );
        add_filter( 'woocommerce_payment_gateways', [ $this, 'register_gateway' ] );
        add_action( 'init', [ $this, 'custom_rewrite_rule' ] );
    }


    public function create_table(){

        if(!function_exists('dbDelta')){
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        global $wpdb;
        $table = $wpdb->prefix . 'nagad_txn_history';
        $charset_collate = $wpdb->get_charset_collate();
        

        $create_table_query = "CREATE TABLE IF NOT EXISTS `{$table}` (
                      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                      `order_id` varchar(55) DEFAULT NULL,
                      `nagad_order_id` varchar(155) DEFAULT NULL,
                      `nagad_txn_id` varchar(15) DEFAULT NULL,
                      `payment_ref_id` varchar(255) DEFAULT NULL,
                      `nagad_txn_amount` varchar(11) DEFAULT NULL,
                      `txn_status` varchar(255) DEFAULT NULL,
                      `nagad_txn_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                      `order_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                      `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                      PRIMARY KEY (`id`),
                      INDEX `nagad_idx_order_id` (`order_id`),
                      INDEX `nagad_idx_nagad_txn_id` (`nagad_txn_id`)
                    ) $charset_collate";

        dbDelta($create_table_query);
        flush_rewrite_rules();
    }


    public function deactivate() {
        flush_rewrite_rules();
    }


    public function custom_rewrite_rule() {
        
        add_rewrite_rule( '^nagad-pay/payment/confirmation/?', 'index.php?nagad_pay_confirmation=payment-complete-confirmation', 'top' );
        flush_rewrite_rules();
    }


    public function init_classes() {
        if ( $this->is_request( 'ajax' ) ) {
            add_action( 'wp_ajax_nagad-pay-create-payment-request', [ $this, 'create_payment_request' ] );
        }

        // $this->container['assets'] = new Nagad\Gateway\Payment\Assets();

        $this->container['nagad_pay_pages'] = new Nagad\Gateway\Payment\gateway();
    }
    
    public function create_payment_request() {
        try {
            if ( ! wp_verify_nonce( $_POST['_ajax_nonce'], 'nagad-pay-nonce' ) ) {
                $this->send_json_error( 'Something went wrong here!' );
            }

            if ( ! $this->validate_fields( $_POST ) ) {
                $this->send_json_error( 'Empty value is not allowed' );
            }

            $order_number = ( isset( $_POST['order_number'] ) ) ? sanitize_key( $_POST['order_number'] ) : '';

            $order = wc_get_order( $order_number );

            if ( ! is_object( $order ) ) {
                $this->send_json_error( 'Wrong or invalid order ID' );
            }

            $payment_process = gateway::checkout( $order->get_id(), $order->get_total() );

            $url = $payment_process['status'] == 'success' ? $payment_process['url'] : $order->get_checkout_payment_url();

            if ( $payment_process['status'] == 'success' ) {
                wp_send_json_success( esc_url_raw( $url ) );
            }

            wp_send_json_error( $payment_process );

        } catch ( \Exception $e ) {
            $this->send_json_error( $e->getMessage() );
        }
    }


    public function send_json_error( $text ) {
        wp_send_json_error( __( $text, 'nagad-pay' ) );
        wp_die();
    }

    public function validate_fields( $data ) {
        
        foreach ( $data as $key => $value ) {
            if ( empty( $value ) ) {
                return false;
            }
        }

        return true;
    }


    private function is_request( $type ) {
        switch ( $type ) {

            case 'admin':
                return is_admin();

            case 'ajax' :
                return defined( 'DOING_AJAX' );

            case 'rest' :
                return defined( 'REST_REQUEST' );

            case 'cron' :
                return defined( 'DOING_CRON' );

            case 'frontend' :
                return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
        }
    }
	
	
    public function register_gateway( $gateways ) {
        $gateways[] = new Nagad\Gateway\Payment\gateway();

        return $gateways;
    }

} 


function nagad_gate() {
    return nagad_gate::init();
}

nagad_gate();