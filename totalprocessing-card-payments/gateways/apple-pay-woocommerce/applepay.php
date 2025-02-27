<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEPATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASENAME', plugin_basename( __FILE__ ) );
define( 'TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL', plugin_dir_url( __FILE__ ) );

//Declare HPOS compatibility
add_action('before_woocommerce_init', function(){
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', TOTALPROCESSING_PAYMENTGATEWAY_PLUGIN_BASEPATH . '/totalprocessing-card-payments-and-gateway-woocommerce.php', true );
    }
});

// Enqueue the JavaScript file
add_action('wp_enqueue_scripts', 'tp_applepay_enqueue_express_checkout_script');
function tp_applepay_enqueue_express_checkout_script()
{
    if (function_exists('register_block_script_handle')) {
        wp_register_script(
            'tp-applepay-express-checkout-block',
            TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL . '/assets/builds/js/express-checkout.min.js',
            ['wp-element', 'wc-blocks-registry'],
            '1.0.7',
            true
        );

        // Pass the plugin URL to the script
        wp_localize_script('tp-applepay-express-checkout-block', 'tpApplepayExpressCheckoutPlugin', [
            'baseUrl' => TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL,
        ]);

        wp_enqueue_script('tp-applepay-express-checkout-block');
    }
}

class WC_TotalProcessing_Applepay_Gateway_initiator{
    // class instance
    static $instance;
    private $DirPath;
    private $DirURL;
    private $debug                          = false;
    private $lang                           = null;
                                            
    public $assetVersion                    = '1.0.0';

    public function __construct(){
        $this->PluginDir = dirname(__FILE__);
        $this->PluginURL = TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEPATH;

        require_once $this->PluginDir . '/includes/class-wc-tp-applepay-gateway.php';

        $tpap            = new WC_Totalprocessing_Applepay_Gateway();
        $tpap->run( plugin_basename( __FILE__ ) );

        add_action('init', [$this, 'init']);
        add_action( 'parse_request', [$this, 'fn_parse_request'], 10, 1 );
    }

    /** Singleton instance */
    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init(){
        global $wp;
        $wp->add_query_var( 'apple-developer-merchantid-domain-association' );
        $regex = '^\.well-known\/apple-developer-merchantid-domain-association';
        $redirect = 'index.php?apple-developer-merchantid-domain-association=1';
        add_rewrite_rule( $regex, $redirect, 'top' );

        $wp->add_query_var( 'tp-apple-pay-initiator' );
        $regex = '^tp-apple-pay-init';
        $redirect = 'index.php?tp-apple-pay-initiator=1';
        add_rewrite_rule( $regex, $redirect, 'top' );
        flush_rewrite_rules(true);

        if( !get_option('wc_totalprocessing_applepay_permalinks_flushed') ) {
            update_option('wc_totalprocessing_applepay_permalinks_flushed', 1);
        }
    }

    function fn_parse_request( $wp ) {
        if ( isset( $wp->query_vars['apple-developer-merchantid-domain-association'] ) 
          && '1' === $wp->query_vars['apple-developer-merchantid-domain-association'] ) {
            header( 'Content-Type: text/plain' );
            $path = $this->PluginDir . '/appleValidation/apple-developer-merchantid-domain-association.txt';
            echo esc_html( file_get_contents( $path ) );
            exit;
        }
        if ( isset( $wp->query_vars['tp-apple-pay-initiator'] ) && '1' === $wp->query_vars['tp-apple-pay-initiator'] ) {
            $path = $this->PluginDir . '/templates/pci-frame-applepay.php';
            require_once $path;
            exit;
        }
    }
}

WC_TotalProcessing_Applepay_Gateway_initiator::get_instance();
$tpGatewaysObj->add_woocommerce_payment_gateway( 'WC_Totalprocessing_Applepay_Gateway' );
