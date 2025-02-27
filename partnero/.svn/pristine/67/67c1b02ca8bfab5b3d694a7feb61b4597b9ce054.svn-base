<?php

/**
 * The public-facing functionality of the plugin.
 *
 * An instance of this class should be passed to the run() function
 * defined in Partnero_Loader as all of the hooks are defined
 * in that particular class.
 *
 * The Partnero_Loader will then create the relationship
 * between the defined hooks and the functions defined in this
 * class.
 *
 * @since      1.0.0
 * @package    Partnero
 * @subpackage Partnero/public
 * @author     https://www.partnero.com/
 */

class Partnero_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param    string    $plugin_name
     * @param    string    $version
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Universal JS which is responsible for the tracking of clicks.
     *
     * @link     https://developers.partnero.com/guide/affiliate.html#tracking
     * @since    1.0.0
     * @updated  2.0.0
     */
    public function attach_partnero_universal() {

        $po_calls = '';
        foreach (Partnero_Util::ALL_TYPES as $TYPE) {
            if( Partnero_Util::has_option( $TYPE, 'program_public_id' ) ) {
                $po_calls .= "po('program', '" . Partnero_Util::get_option($TYPE, 'program_public_id') . "', 'load');";
            }
        }

        if( !empty($po_calls) ) {
            echo "<!-- Partnero Universal -->
            <script>
                (function(p,t,n,e,r,o){ p['__partnerObject']=r;function f(){
                var c={ a:arguments,q:[]};var r=this.push(c);return \"number\"!=typeof r?r:f.bind(c.q);}
                f.q=f.q||[];p[r]=p[r]||f.bind(f.q);p[r].q=p[r].q||f.q;o=t.createElement(n);
                var _=t.getElementsByTagName(n)[0];o.async=1;o.src=e+'?v'+(~~(new Date().getTime()/1e6));
                _.parentNode.insertBefore(o,_);})(window, document, 'script', 'https://app.partnero.com/js/universal.js', 'po');
                po('settings', 'assets_host', 'https://assets.partnero.com');
                {$po_calls}
            </script>
            <!-- End Partnero Universal -->";
        }
    }

    /**
     * Handles signup tracking and sends customer call to partner api.
     *
     * @link     https://developers.partnero.com/guide/affiliate.html#sending-sign-up-data
     * @since    1.0.0
     * @updated  2.0.0 Major update to support multiple types of program namely affiliate and refer_a_friend
     * @param    string    $user_id      User ID of the customer created
     */
    public function signup_tracker_handle( $user_id ) {

        $user = get_userdata( $user_id );

        // If wordpress user is empty
        // Or user is not 'customer'
        if( empty( $user ) || !in_array( 'customer', $user->roles ) ) {
            return;
        }

        $first_name = sanitize_user(get_user_meta( $user_id, 'first_name', true ) ?: $user->data->user_nicename);
        $last_name  = sanitize_user(get_user_meta( $user_id, 'last_name', true ) ?: '');
        $email      = sanitize_email($user->data->user_email);

        // Retrieve $_POST values from WC signup form if available
        if ( isset( $_POST['sr_firstname'] ) ) {
            $first_name = sanitize_user( $_POST['sr_firstname'] );
        }

        if ( isset( $_POST['sr_lastname'] ) ) {
            $last_name = sanitize_user( $_POST['sr_lastname'] );
        }

        foreach ( Partnero_Util::ALL_TYPES as $TYPE ) {
            /**
             * ********************
             * Set type of api key
             * ********************
             */
            Partnero_Api::set_api_key_type($TYPE);

            // Get referring partner/customer key from cookie depending on type of program
            $partner_key = Partnero_Util::get_partner_key($TYPE);

            if( !Partnero_Util::has_option( $TYPE, 'api_key' )                          // Or api key is missing
                || !Partnero_Util::has_option( $TYPE, 'program_public_id' )             // Or program public id is missing
                || (empty($partner_key) && $TYPE === Partnero_Util::TYPE_AFFILIATE)                // Or partner in cookie is missing when type is affiliate
            ) {
                continue;                                                                          // Don't track the customer
            }

            $customer_key = Partnero_Util::get_customer_key( $TYPE, $user_id );

            $customer = Partnero_Api::customer_call( 'GET', [], $customer_key);

            // If this customer is already created in Partnero program, dont proceed further
            if( !empty( $customer ) ) {
                continue;
            }

            $request_body = self::prepare_customer_create_api_data($TYPE, [
                'partner_key' => $partner_key,
                'customer_key' => $customer_key,
                'name'    => $first_name,
                'surname' => $last_name,
                'email'   => $email,
            ]);

            Partnero_Api::customer_call( 'POST', $request_body );
        }
    }

    /**
     * Add partner key to order meta data.
     *
     * @since    1.3.2
     * @updated  2.0.0 Major update to support multiple types of program namely affiliate and refer_a_friend
     * @param    string    $order_id      Order ID of the Order that is being tracked
     */
    public function attach_partner_key_to_order( $order_id ) {
        /**
         * https://developer.wordpress.org/reference/functions/is_admin/
         */
        if (is_admin()) {
            return;
        }

        $order = new WC_Order( $order_id );

        foreach ( Partnero_Util::ALL_TYPES as $TYPE ) {
            $partnerKey = Partnero_Util::get_partner_key($TYPE) ?? Partnero_Util::get_partner_key_from_session($TYPE);

            $order_meta_key = Partnero_Util::get_cookie_name($TYPE);
            if(is_null($order_meta_key) || empty($partnerKey)) {
                continue;
            }

            $order->add_meta_data($order_meta_key, $partnerKey, true);

            Partnero_Util::remove_partner_key_from_session($TYPE);
        }

        $order->save_meta_data();
    }

    /**
     * Store partner key into session if available in cookie
     * Remove from session if not available in cookie
     * @since    1.3.5
     * @updated  2.0.0 Major update to support multiple types of program namely affiliate and refer_a_friend
     */
    public function update_partner_key_into_session() {
        foreach ( Partnero_Util::ALL_TYPES as $TYPE ) {
            $partnerKey = Partnero_Util::get_partner_key($TYPE);

            if ( !empty($partnerKey)) {
                Partnero_Util::set_partner_key_into_session($TYPE, $partnerKey);
            } else {
                Partnero_Util::remove_partner_key_from_session($TYPE);
            }
        }
    }

    /**
     * Handles woocommerce order tracking and sends transaction call to partner api.
     *
     * @link     https://developers.partnero.com/guide/affiliate.html#sending-sales-data
     * @since    1.2.0
     * @updated  2.0.0 Major update to support multiple types of program namely affiliate and refer_a_friend
     * @param    string    $order_id      Order ID of the Order that is being tracked
     */
    public function woocommerce_track_order( $order_id ) {

        $order = new WC_Order( $order_id );

        /**
         * Transaction can't be done if
         * Order not found
         */
        if( empty( $order )) {
            return;
        }

        foreach ( Partnero_Util::ALL_TYPES as $TYPE ) {
            /**
             * ********************
             * Set type of api key
             * ********************
             */
            Partnero_Api::set_api_key_type($TYPE);

            /**
             * Transaction can't be done if
             * API key is missing
             * Program ID is missing (Meaning program is not attached)
             */
            if( !Partnero_Util::has_option( $TYPE,'api_key' )
                || !Partnero_Util::has_option( $TYPE,'program_public_id' )
            ) {
                continue;
            }

            $transaction_key = Partnero_Util::get_transaction_key( $TYPE, $order_id );

            $transaction = Partnero_Api::transaction_call( 'GET', [], $transaction_key);

            /**
             * If transaction is already there in Partnero, dont proceed further
             */
            if( !empty( $transaction ) ) {
                continue;
            }

            $order_meta_key = Partnero_Util::get_cookie_name($TYPE);
            if(is_null($order_meta_key) ) { // This shouldn't happen
                continue;
            }

            /**
             * Note: Woocommerce can have order without user logged in (guest order)
             *
             * If order have user associated (user logged in) with him
             * Customer key will be based on User ID
             * Else transaction key will be the customer key
             */
            $customer_key = !empty( $order->get_user_id() )
                ? Partnero_Util::get_customer_key( $TYPE, $order->get_user_id() )
                : $transaction_key;

            $customer = Partnero_Api::customer_call( 'GET', [], $customer_key);

            /**
             * If customer doesn't exist in Partnero, we will create one
             */
            if( empty( $customer ) ) {
                /* 'new_order' is core hook so order should have this meta set */
                $partner_key = $order->get_meta($order_meta_key, true);

                /* Partner key is a must to create customer when type if affiliate */
                if( empty( $partner_key ) && $TYPE === Partnero_Util::TYPE_AFFILIATE ) {
                    continue;
                }

                $customer_request_body = self::prepare_customer_create_api_data($TYPE, [
                    'partner_key' => $partner_key,
                    'customer_key' => $customer_key,
                    'name'    => sanitize_user($order->get_billing_first_name()),
                    'surname' => sanitize_user($order->get_billing_last_name()),
                    'email'   => sanitize_email($order->get_billing_email()),
                ]);

                $customer = Partnero_Api::customer_call( 'POST', $customer_request_body );

                /* If customer can't be created, we can't create transaction */
                if( empty( $customer ) ) {
                    continue;
                }
            }

            /**
             * @Note Let's not remove this order metadata. Because if the order status is cancelled we remove it from Partnero.
             * But if somehow the order gets back to complete or processing status, we will sync the order again to Partnero.
             * So if we remove these meta, it will not sync again because it will not have the meta data to pass with transaction api data.
             */
            // $order->delete_meta_data($order_meta_key);
            // $order->save_meta_data();

            /**
             * Final transaction amount after removing shipping and tax
             * @Note get_total_shipping() is deprecated, this is used for older woocommerce support only, use get_shipping_total()
             * Check if the newer method exists and use it, otherwise fall back to the deprecated method.
             */
            $total_shipping = method_exists($order, 'get_shipping_total')
                ? $order->get_shipping_total()
                : $order->get_total_shipping();
            $total_amount = $order->get_total() - $total_shipping;

            /**
             * Tax deduction will be based on setting
             */
            $tax_setting = Partnero_Util::has_option($TYPE, 'tax_setting')
                ? Partnero_Util::get_option($TYPE, 'tax_setting')
                : 'net';

            if($tax_setting === 'net') {
                $total_amount = $total_amount - $order->get_total_tax();
            }

            /**
             * Transaction create data
             */
            $transaction_request_body = [
                'key'          => $transaction_key,
                'amount'       => round($total_amount, 2),
                'amount_units' => sanitize_text_field($order->get_currency()),
                'action'       => 'sale',
            ];

            /**
             * Type based transaction create data
             */
            if ( $TYPE === Partnero_Util::TYPE_AFFILIATE ) {
                $transaction_request_body['customer'] = [
                    'key' => $customer->key,
                ];

                /**
                 * Collect product id and type info
                 */
                $product_ids = [];
                $product_types = [];
                foreach ( $order->get_items('line_item') ?? [] as $item ) {
                    $product_id = $item->get_product_id();
                    $product_ids[] = $product_id;

                    $product_terms = get_the_terms ($product_id, 'product_cat') ?? [];
                    foreach ( $product_terms as $term ) {
                        $product_types[] = $term->term_id;
                    }
                }
                $product_types = array_values(array_unique($product_types));

                /**
                 * Add product_id and product_type data with request body
                 */
                $transaction_request_body['product_id'] = count($product_ids) === 1 ? $product_ids[0] : $product_ids;
                $transaction_request_body['product_type'] = count($product_types) === 1 ? $product_types[0] : $product_types;

            } elseif ($TYPE === Partnero_Util::TYPE_REFER_A_FRIEND) {
                $transaction_request_body['customer'] = [
                    'id' => $customer->id,
                ];
            }

            Partnero_Api::transaction_call( 'POST', $transaction_request_body );
        }
    }

    /**
     * Removes transaction at partnero for refunded or cancelled orders.
     *
     * @link     https://developers.partnero.com/guide/affiliate.html#recommendations
     * @since    1.2.0
     * @updated  2.0.0 Major update to support multiple types of program namely affiliate and refer_a_friend
     * @param    string    $order_id      Order ID of the Order that is being tracked
     */
    public function woocommerce_remove_order( $order_id ) {

        $order = new WC_Order( $order_id );

        /**
         * Transaction can't be done if
         * Order not found
         */
        if( empty( $order )) {
            return;
        }

        foreach ( Partnero_Util::ALL_TYPES as $TYPE ) {
            /**
             * ********************
             * Set type of api key
             * ********************
             */
            Partnero_Api::set_api_key_type($TYPE);

            /**
             * Transaction can't be done if
             * API key is missing
             * Program ID is missing (Meaning program is not attached)
             */
            if (!Partnero_Util::has_option($TYPE, 'api_key')
                || !Partnero_Util::has_option($TYPE, 'program_public_id')
            ) {
                continue;
            }

            /**
             * Note: Woocommerce can have order without user logged in (guest order)
             *
             * If order have user associated (user logged in) with him
             * Customer key will be based on User ID
             * Else transaction key will be the customer key
             */
            $customer_key = !empty( $order->get_user_id() )
                ? Partnero_Util::get_customer_key( $TYPE, $order->get_user_id() )
                : Partnero_Util::get_transaction_key( $TYPE, $order_id );

            /**
             * @todo Passing ID in url is not working at the moment maybe update later
             */
            $is_order_deleted = Partnero_Api::transaction_call( 'DELETE', [
                'key' => Partnero_Util::get_transaction_key( $TYPE, $order_id )
            ] );

            // Remove customer only if it was guest order
            if( $is_order_deleted
                && $customer_key === Partnero_Util::get_transaction_key( $TYPE, $order_id )
            ) {
                Partnero_Api::customer_call( 'DELETE', [], $customer_key);
            }
        }
    }

    /**
     * Prepares the data array for creating a customer in the Partnero API,
     * based on the program type (Affiliate or Refer-A-Friend).
     *
     * @since 2.0.0
     * @param string $program_type  The program type, e.g., Partnero_Util::TYPE_AFFILIATE or Partnero_Util::TYPE_REFER_A_FRIEND.
     * @param array  $data          An associative array containing customer and partner data, including keys:
     *                              'partner_key', 'customer_key', 'email', 'name', and 'surname'.
     * @return array                The formatted API data for customer creation, structured according to the program type.
     */
    private function prepare_customer_create_api_data($program_type, $data) {
        $api_data = [];

        if ( $program_type === Partnero_Util::TYPE_AFFILIATE ) {
            $api_data = [
                'partner' => [
                    'key' => $data['partner_key'] ?? null,
                ],
                'customer' => [
                    'key'     => $data['customer_key'] ?? null,
                    'email'   => $data['email'] ?? null,
                    'name'    => $data['name'] ?? null,
                    'surname' => $data['surname'] ?? null,
                ]
            ];
        } elseif ( $program_type === Partnero_Util::TYPE_REFER_A_FRIEND ) {
            $api_data = [
                'id'      => $data['customer_key'] ?? null,
                'email'   => $data['email'] ?? null,
                'name'    => $data['name'] ?? null,
                'surname' => $data['surname'] ?? null,
            ];

            // For refer-a-friend program we track all customers, referred or non-reffered
            if ( !empty($data['partner_key']) ) {
                $api_data['referring_customer'] = [
                    'key' => $data['partner_key']
                ];
            }
        }

        return $api_data;
    }
}
