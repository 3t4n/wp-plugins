<?php
namespace GSS\Services;

defined( 'ABSPATH' ) || exit;

if (  ! class_exists( 'Rate_Service' ) ):
    /**
     * Gss Shipping Options core class
     */
    class Rate_Service {

        /**
         * The single instance of the class.
         */
        public static $_instance = null;

        public $_gssWcLogger = null;

        /**
         * Constructor.
         */
        public function __construct() {
            $this->_gssWcLogger = Gss_WC_Log_Service::instance();
        }

        /**
         * Main Extension Instance.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function get_gss_rate( $package, $secret, $identifier ) {

            $rates_obj = null;

            try {
                $address = $package['destination']['address'];
                $address_1 = $package['destination']['address_1'];
                $address_2 = $package['destination']['address_2'];
                $city = $package['destination']['city'];
                $state = $package['destination']['state'];
                $postcode = $package['destination']['postcode'];
                $countrycode = $package['destination']['country'];
                $total_price = $package['contents_cost'];

                $wc_country_locale = wc()->countries->get_country_locale();

                $is_country_require_postcode = false;
                if ( isset( $wc_country_locale[$countrycode]['postcode']['required'] ) ) {
                    $is_country_require_postcode = $wc_country_locale[$countrycode]['postcode']['required'];
                }

                $is_user_filled_required_postcode = ( $is_country_require_postcode ? trim( $postcode ) : true );
                $is_user_filled_all_required_fields_for_checkout = ( trim( $address ) && trim( $city ) && $is_user_filled_required_postcode );
                $is_user_filled_all_required_fields_for_cart = ( trim( $city ) && $is_user_filled_required_postcode );
                $is_wc_ajax = isset( $_GET['wc-ajax'] );

                // Hide shipping rates if user not filled all required fields, no point to get shipping rates is address is not filled.
                // Payment gateways using wc-ajax for geting the shipping rates, can't return gss rates when getting ajax call. eg. Google pay in stripe
                if (  ! $is_wc_ajax ) {
                    // when user add product in cart in single product page or store page
                    if (  ! is_cart() && ! is_checkout() ) {
                        // user not filled all required fields
                        if (  ! $is_user_filled_all_required_fields_for_checkout ) {
                            return [];
                        }
                    }

                    // when user in cart page
                    if ( is_cart() ) {
                        // user not filled all required fields for cart page
                        if (  ! $is_user_filled_all_required_fields_for_cart ) {
                            return [];
                        }
                    }

                    // if user enter space in the checkout page, don't send request and hide shipping rates.
                    if ( is_checkout() ) {
                        // user not filled all required fields for checkout page
                        if (  ! $is_user_filled_all_required_fields_for_checkout ) {
                            return [];
                        }
                    }
                }

                $store_address = WC()->countries->get_base_address();
                $store_address_2 = WC()->countries->get_base_address_2();
                $store_city = WC()->countries->get_base_city();
                $store_postcode = WC()->countries->get_base_postcode();
                $store_state = WC()->countries->get_base_state();
                $store_country = WC()->countries->get_base_country();
                $store_currency = get_option( 'woocommerce_currency' );
                $store_locale = get_locale();

                $dimension_unit = get_option( 'woocommerce_dimension_unit' );
                $weight_unit = get_option( 'woocommerce_weight_unit' );
                $total_weight = WC()->cart->get_cart_contents_weight();

                $item_list = [];

                foreach ( $package['contents'] as $package_item ) {
                    $product = $package_item['data'];
                    $productName = str_replace( '"', '\\"', $product->get_title() );
                    $productPrice = $product->get_price();
                    $productSku = $product->get_sku();
                    $quantity = $package_item['quantity'];

                    if ( ( $quantity > 0 ) && $product->needs_shipping() ) {
                        $weight = $product->get_weight() ?: 0;
                        $height = 0;
                        $length = 0;
                        $width = 0;

                        if ( $product->has_dimensions() ) {
                            $height = $product->get_height();
                            $length = $product->get_length();
                            $width = $product->get_width();
                        }

                        $item = array(
                            'name' => $productName,
                            'sku' => $productSku,
                            'quantity' => $quantity,
                            'weight' => $weight,
                            'height' => $height,
                            'width' => $width,
                            'length' => $length,
                            'price' => $productPrice,
                        );

                        array_push( $item_list, $item );

                    }

                }

                $url = CHECKOUT_SERVICE_API_URL . '/WooCommerce/rates/' . $identifier;

                $post_data = json_encode( array(
                    'providedCartWeight' => $total_weight,
                    'providedCartValue' => $total_price,
                    'dimensionsUnit' => $dimension_unit,
                    'weightUnit' => $weight_unit,
                    'destination' => array(
                        'contact' => "GSS Shpping Option Default Contact",
                        'street' => $address_1 ?: $address_2 ?: $city ?: $state ?: $countrycode ?: "GSS Shpping Option Default Street",
                        'building' => $address_2 ?: $city ?: $state ?: $countrycode ?: "GSS Shpping Option Default Building",
                        'suburb' => $city ?: $state ?: $countrycode ?: "GSS Shpping Option Default Suburb",
                        'city' => $city ?: $state ?: $countrycode ?: "GSS Shpping Option Default City",
                        'province' => $state ?: $countrycode ?: "GSS Shpping Option Default Province",
                        'country' => $countrycode ?: "GSS Shpping Option Default Country",
                        'postcode' => $postcode ?: "GSS Shpping Option Default Postcode",
                    ),
                    'origin' => array(
                        'contact' => $store_address ?: "GSS Shpping Option Default Contact",
                        'street' => $store_address ?: "GSS Shpping Option Default Street",
                        'building' => $store_address_2 ?: "GSS Shpping Option Default Building",
                        'suburb' => $store_city ?: "GSS Shpping Option Default Suburb",
                        'city' => $store_city ?: "GSS Shpping Option Default City",
                        'province' => $store_state ?: "GSS Shpping Option Default Province",
                        'country' => $store_country ?: "GSS Shpping Option Default Country",
                        'postcode' => $store_postcode ?: "GSS Shpping Option Default Postcode",
                    ),
                    'identifier' => $identifier,
                    'showAddressRuralType' => true,
                    'items' => $item_list,
                    'currency' => $store_currency,
                    'locale' => $store_locale,
                ) );

                $sig = hash_hmac( 'sha256', $post_data, $secret );

                global $wp_version;

                $response = \wp_remote_post( $url, array(
                    'headers' => array(
                        'Content-Type' => 'application/json; charset=utf-8',
                        'X-Version' => GSS_PLUGIN_VERSION,
                        'X-WP-Version' => $wp_version,
                        'X-PHP-Version' => PHP_VERSION,
                        'X-WC-Version' => WC_VERSION,
                        'X-WC-Hmac-SHA256' => $sig,
                    ),
                    'method' => 'POST',
                    'timeout' => 60,
                    'redirection' => 5,
                    'httpversion' => '1.0',
                    'blocking' => true,
                    'body' => $post_data,
                    'cookies' => array(),
                    'sslverify' => false,
                ) );

                $response_code = \wp_remote_retrieve_response_code( $response );

                $response_body = \wp_remote_retrieve_body( $response );

                // if has error log the error
                if (  ! ( intval( $response_code ) >= 200 && intval( $response_code ) <= 299 ) ) {
                    $this->_gssWcLogger->logger->add( GSS_LOG_FILE_NAME, 'Not 200 - 299 respond returned from server, api: ' . $url . ' ' . 'ResponseBody:' . $response_body );
                    throw new \Exception( "Exception happened in Rate_Service -> get_gss_rate", 1 );
                }

                $json_obj = json_decode( $response_body );
                $rates_obj = $json_obj->{'rates'};

                return $rates_obj;

            } catch ( \Exception $e ) {
                $this->_gssWcLogger->logger->add( GSS_LOG_FILE_NAME, 'Exception catched in Rate_Service -> get_gss_rate, using Fallback Rate. ' . $e );
                $rates_obj = array(
                    (object) array(
                        'description' => 'GSS Fallback Rate',
                        'rate' => GSS_FALLBACK_RATE,
                        'shortCode' => 'FALLBACK',
                    ),
                );
            }

            return $rates_obj; // if nothing comeback just return null

        }

    }
endif;
