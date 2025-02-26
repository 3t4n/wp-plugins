<?php
/**
 * Plugin Name: Autoketing for Woocommerce
 * Description: Smart currency converter app based on the location of the customer. Convert 164 currencies around the world, bring convenience and drive your sales.
 * Version: 1.0.0
 * Author: Autoketing
 * Author URI: http://autoketing.com 
 * License: GPLv2 or later 
 * Requires at least: 3.3
 * Tested up to: 5.7
 * Requires PHP: 5.6
 * Text Domain: autoketing
 */
defined( 'ABSPATH' ) || exit();
define( 'AUTOKETING_PLUGIN_BASENAME', plugin_dir_url( __FILE__ ) );
define( 'AUTOKETING_PLUGIN_DIRNAME', __DIR__.'/' );
if ( !defined( 'FILENAMEAUTOKETING' ) ){
    define( 'FILENAMEAUTOKETING',__FILE__ );
}
if( ! class_exists( 'AutoKeting' ) ){    
    class AutoKeting{
        private static $_instance = null;
        public function __construct() {
            if ( self::$_instance ) {
                return;
            }
            self::$_instance = $this;  
            $this->include();      
            Autoketing_Ajax::register_action();     
            $this->autoketting_update_hook();
        }
        public static function instance() {
            if ( !self::$_instance ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        public function include() {    
            require_once 'includes/autoketing-config.php';
            require_once 'includes/autoketing-core-function.php';
            require_once 'includes/autoketing-api.php';
            require_once 'includes/class-autoketing-product.php';
            require_once 'includes/class-autoketing-order.php';
            require_once 'includes/class-autoketing-user.php';
            require_once 'includes/class-autoLoading.php';
            require_once 'includes/class-autoketing-ajax.php';
            require_once 'includes/class-autoketing-helper.php';
        }       
        public static function check_woo_active(){
            if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            }
            return class_exists( 'WooCommerce' ) || is_plugin_active( 'woocommerce/woocommerce.php' );
        }  
        public function autoketting_update_hook(){
           add_filter('woocommerce_admin_settings_sanitize_option_woocommerce_price_thousand_sep', array( $this, 'autoketing_update_api_woo' ) , 100, 1);         
        }
        public function autoketing_update_api_woo($value) {
            $domain = $_SERVER['HTTP_HOST'];
            $keyLogin = get_option('autoketing_key_login');
            $decimal_separator = autoketingHelper::sanitize_params_submitted( $_POST['woocommerce_price_decimal_sep'] );
            $thousand_separator = autoketingHelper::sanitize_params_submitted( $_POST['woocommerce_price_thousand_sep'] ); 
            $woocommerce_currency =  get_option( 'woocommerce_currency' ); 
            $body = [ 'shop-domain' => $domain, 'decimal_separator' => $decimal_separator, 'thousand_separator' => $thousand_separator,
                    'woo_currency' => $woocommerce_currency, 'client_secret' =>  $keyLogin ];
            wp_remote_post( AUTOKETING_API_CURRENCY ,  array('body' => $body) );
            return $value;
        }
        public function creat_webhook_product(){
            
           // $webhookContent = "";
          //  $myfile = fopen("woo-webhook.txt", "w") or die("Unable to open file!");

//            $webhook = fopen('php://input' , 'rb');
//                while (!feof($webhook)) {
//                    $webhookContent .= fread($webhook, 4096);
//                }

           //     $webhook = 'hahaha';
           // $txt = $webhookContent;
        //    file_put_contents("C:\Users\DELL\OneDrive\Desktop\webhook.txt", $webhook,FILE_APPEND);
            //var_dump(file_get_contents('woo-webhook.txt'));die();
        }  
    }
}
function Autoketing() {
	return AutoKeting::instance();        
}
$GLOBALS['Autoketing'] = Autoketing();