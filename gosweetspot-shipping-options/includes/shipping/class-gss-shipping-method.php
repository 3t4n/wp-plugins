<?php
/**
 * File required by shipping/index.php in gss_shipping_method_init function as wc documenation
 */

use GSS\Services;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'GSS_Shipping_Method' ) ) {
    class GSS_Shipping_Method extends \WC_Shipping_Method {

        /**
         * The single rate service.
         */
        protected $_rateService = null;

        private $_gssWcLogger = null;

        /**
         * Constructor for your shipping class
         *
         * @access public
         * @return void
         */
        public function __construct( $instance_id = 0 ) {

            $this->_rateService = Services\Rate_Service::instance();
            $this->_gssWcLogger = Services\Gss_WC_Log_Service::instance();

            $this->id = 'gss_shipping_method'; // Id for your shipping method. Should be uunique.
            $this->instance_id = absint( $instance_id );
            $this->method_title = __( 'GoSweetSpot Shipping Options' ); // Title shown in admin
            $this->method_description = __( '
            <h4>Instructions</h4>
            <p>1. Please provide required credentials to get shipping rate from GoSweetSpot. <a href="' . GSS_SHIP_URL . '/checkoutservice/" target="_blank">Click here</a> to get URL and Secret.</p>
            <p>2. We recommend disable shipping calculator in shopping cart. Please uncheck the checkbox before "Enable the shipping calculator on the cart page" in <a href="admin.php?page=wc-settings&tab=shipping&section=options">WooCommerce->Settings->Shipping->Shipping options->Calculations</a>.</p>
            <p>For full instructions please refer to: <a target="_blank" href="https://support.gosweetspot.com/hc/en-us/articles/5330151518607-GoSweetSpot-Shipping-Options-App">GoSweetSpot Shipping Options App</a> and <a target="_blank" href="https://support.gosweetspot.com/hc/en-us/articles/5543630873999">GoSweetSpot Shipping Options App (WooCommerce Installation)</a></p>
            '
            ); // Description shown in admin
            $this->supports = array( 'shipping-zones', 'instance-settings', 'instance-settings-modal', 'settings' );

            $this->enabled = "yes"; // This can be added as an setting but for this example its forced enabled
            $this->title = ! empty( $this->get_option( 'title' ) ) ? $this->get_option( 'title' ) : GSS_SHIPPING_METHOD_NAME;
            if ( $this->instance_id ) {
                $this->title = ! empty( $this->get_title_shipping_method_from_method_id( strval( $instance_id ) ) ) ? $this->get_title_shipping_method_from_method_id( strval( $instance_id ) ) : GSS_SHIPPING_METHOD_NAME;
            }

            $this->instance_form_fields = array(
                'title' => array(
                    'title' => __( 'Method Title', GOSWEETSPOT_DOMAIN ),
                    'type' => 'text',
                    'default' => __( GSS_SHIPPING_METHOD_NAME, GOSWEETSPOT_DOMAIN ),
                    'description' => __( 'Change shipping method title in admin shipping list.', GOSWEETSPOT_DOMAIN ),
                    'desc_tip' => true,
                ),
            );

            $this->init();
        }

        /**
         * Init your settings
         *
         * @access public
         * @return void
         */
        public function init() {

            // Load the settings API
            $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
            $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

            // Save settings in admin if you have any defined
            \add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
        }

        /**
         * calculate_shipping function.
         *
         * @access public
         * @param mixed $package
         * @return void
         */
        public function calculate_shipping( $package = array() ) {

            try {

                $identifier = $this->settings["identifier"];
                $secret = $this->settings["secret"];

                $rst = $this->_rateService->get_gss_rate( $package, $secret, $identifier );

                // the fallback value of cost
                $cost = GSS_FALLBACK_RATE;

                if ( ! empty( $rst ) ) {

                    foreach ( $rst as $key => $value ) {
                        $cost = $value->rate;
                        $rate = array(
                            'id' => $this->id . '_' . $this->instance_id . '_' . $value->description . '_' . $cost, // has to be unique
                            'label' => $value->description,
                            'cost' => $cost,
                            'calc_tax' => 'per_order',
                        );

                        $this->add_rate( $rate );
                    }
                }

            } catch ( \Throwable $th ) {

                $this->_gssWcLogger->logger->add( GSS_LOG_FILE_NAME, 'Error calculation shiping in GSS_Shipping_Method -> calculate_shipping, using Fallback Rates. ' . $th );

                $rate = array(
                    'id' => $this->id . $this->instance_id,
                    'label' => 'GSS Fallback Rate', // or maybe we can use $this->title to let user decide the name
                    'cost' => GSS_FALLBACK_RATE, // GSS fallback rate, in case cart or checkout page broken, but shouldn't come in here in any cases.
                    'calc_tax' => 'per_order',
                );

                // Register the rate
                $this->add_rate( $rate );
            }

        }

        public function init_form_fields() {
            $this->form_fields = array(
                'title' => array(
                    'title' => __( 'Method Title', GOSWEETSPOT_DOMAIN ),
                    'type' => 'text',
                    'default' => __( '', GOSWEETSPOT_DOMAIN ),
                    'description' => __( 'Shipping method title in admin shipping list. Default: ' . GSS_SHIPPING_METHOD_NAME . '.', GOSWEETSPOT_DOMAIN ),
                    'desc_tip' => true,
                ),
                'identifier' => array(
                    'title' => __( 'Identifier *', GOSWEETSPOT_DOMAIN ),
                    'type' => 'text',
                    'custom_attributes' => array( 'required' => 'required' ),
                    'description' => __( 'Identifier generated from GoSweetSpot.', GOSWEETSPOT_DOMAIN ),
                    'desc_tip' => true,
                ),
                'secret' => array(
                    'title' => __( 'Secret *', GOSWEETSPOT_DOMAIN ),
                    'type' => 'text',
                    'custom_attributes' => array( 'required' => 'required' ),
                    'description' => __( 'Secret generated from GoSweetSpot.', GOSWEETSPOT_DOMAIN ),
                    'desc_tip' => true,
                ),
            );
        }

        /**
         * Hack to find instance of the shipping method title using get_option() function
         */
        public function get_title_shipping_method_from_method_id( $method_rate_id = '' ) {
            if ( ! empty( $method_rate_id ) ) {
                $method_key_id = str_replace( ':', '_', $method_rate_id ); // Formating
                $option_name = 'woocommerce_' . $this->id . '_' . $method_key_id . '_settings'; // Get the complete option slug eg. woocommerce_gss_shipping_method_9_settings
                return isset( get_option( $option_name, array() )['title'] ) ? get_option( $option_name, array() )['title'] : ''; // Get the title and return it
            } else {
                return array();
            }
        }
    }
}
