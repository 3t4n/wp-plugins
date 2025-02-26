<?php
if ( !defined( 'ABSPATH' ) ) exit;

class EbizzPay_WC_Gateway extends WC_Payment_Gateway {

    private $ebizzpay;

    private $access_token;
    private $signature_key;
    private $collection_code;
    private $admin_fee_enabled;
    private $admin_fee_title;
    private $admin_fee_amount;
    private $sandbox = true;
    private $debug = false;

    // Constructor
    public function __construct() {

        $this->id                 = 'ebizzpay';
        $this->has_fields         = true;
        $this->method_title       = __( 'EbizzPay', 'ebizzpay-wc' );
        $this->method_description = __( 'Enable EbizzPay payment gateway for your site.', 'ebizzpay-wc' );
        $this->order_button_text  = __( 'Pay with EbizzPay', 'ebizzpay-wc' );
        $this->supports           = array( 'products' );

        $this->init_form_fields();
        $this->init_settings();

        $this->title              = $this->get_option( 'title' );
        $this->description        = $this->get_option( 'description' );
        $this->icon               = EBIZZPAY_WC_URL . 'assets/images/ebizzpay.png';

        $this->access_token       = $this->get_option( 'access_token' );
        $this->signature_key      = $this->get_option( 'signature_key' );
        $this->collection_code    = $this->get_option( 'collection_code' );

        $this->admin_fee_enabled  = $this->get_option( 'admin_fee_enabled' ) === 'yes';
        $this->admin_fee_title    = $this->get_option( 'admin_fee_title' );
        $this->admin_fee_amount   = $this->get_option( 'admin_fee_amount' );

        $this->sandbox            = $this->get_option( 'sandbox' ) === 'yes';
        $this->debug              = $this->get_option( 'debug' ) === 'yes';

        $this->default_admin_fee_title = __( 'Processing Fee', 'ebizzpay-wc' );

        if ( !$this->admin_fee_title ) {
            $this->admin_fee_title = $this->default_admin_fee_title;
        }

        $this->register_hooks();

        // Check if the payment gateway is ready to use
        if ( !$this->validate_required_settings() ) {
            $this->enabled = 'no';
        }

        $this->init_api();

    }

    // Register WooCommerce payment gateway hooks
    private function register_hooks() {

        add_action( 'admin_print_footer_scripts', array( $this, 'form_fields_add_js' ) );

        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
        add_action( 'woocommerce_api_' . $this->id . '_wc_gateway', array( $this, 'handle_ipn' ) );

        add_filter( 'woocommerce_order_get_payment_method_title', array( $this, 'modify_payment_method_title' ), 10, 2 );

        add_action( 'woocommerce_get_order_item_totals', array( $this, 'display_order_admin_fee_in_order_items_totals' ), 10, 2 );
        add_filter( 'woocommerce_order_get_total', array( $this, 'modify_order_total' ), 10, 2 );
        add_action( 'woocommerce_admin_order_totals_after_shipping', array( $this, 'display_order_admin_fee_in_order_totals' ) );

    }

    // Check if all required settings is filled
    private function validate_required_settings() {

        if ( !$this->access_token || !$this->signature_key || !$this->collection_code ) {
            return false;
        }

        return true;

    }

    // Override the normal options so we can print the webhook and redirect URL to the admin
    public function admin_options() {

        parent::admin_options();
        include( 'views/settings/html-webhook-redirect-url.php' );

    }

    // Form fields
    public function init_form_fields() {
        $this->form_fields = ebizzpay_wc_settings_form_fields();
    }

    // Output JavaScript to toggle display of additional settings if admin fee is enabled
    public function form_fields_add_js() {
        ?>
        <script type="text/javascript">
            ( function( $ ) {
                var parent = $( '#woocommerce_ebizzpay_admin_fee_enabled' ),
                    children = parent.closest( 'tr' ).nextAll( 'tr' );

                parent.on( 'change', function() {
                    children.toggleClass( 'hide-if-js', !this.checked );
                } );

                parent.trigger( 'change' );
            } )( jQuery );
        </script>
        <?php
    }

    // Initialize API
    private function init_api() {

        $this->ebizzpay = new EbizzPay_WC_API(
            $this->access_token,
            $this->signature_key,
            $this->sandbox,
            $this->debug
        );

    }

    // Process the payment
    public function process_payment( $order_id ) {

        if ( !$this->validate_required_settings() ) {
            return false;
        }

        if ( !$order = wc_get_order( $order_id ) ) {
            return false;
        }

        // If bill already created for this order, proceed to redirect to the payment page
        if ( $payment_url = get_transient( "_ebizzpay_order_{$order_id}_payment_url" ) ) {
            return array(
                'result'   => 'success',
                'redirect' => $payment_url,
            );
        }

        try {
            $this->log( sprintf( __( 'Creating payment for order #%d', 'ebizzpay-wc' ), $order_id ) );

            // Customer information
            $customer = array(
                'first_name' => $order->get_shipping_first_name(),
                'last_name'  => $order->get_shipping_last_name(),
                'address'    => $order->get_formatted_shipping_address(),
                'email'      => $order->get_billing_email(),
                'mobile'     => ebizzpay_wc_format_phone_number( $order->get_billing_phone() ),
            );

            // Get billing information if shipping information is not available
            if ( !$customer['first_name'] ) {
                $customer['first_name'] = $order->get_billing_first_name();
                $customer['last_name']  = $order->get_billing_last_name();
                $customer['address']    = $order->get_formatted_billing_address();
            }

            $products = array();

            foreach ( $order->get_items() as $item_id => $item ) {
                $item_total = $item->get_total();
                $item_quantity = $item->get_quantity();

                // Skip if total price or total quantity is zero
                if ( $item_total <= 0 || $item_quantity <= 0 ) {
                    continue;
                }

                $item_price = $item_total / $item_quantity;

                // Skip if item price is zero
                if ( $item_price <= 0 ) {
                    continue;
                }

                $products[] = array(
                    'title'    => $item->get_name(),
                    'price'    => $item_price,
                    'quantity' => $item_quantity,
                );
            }

            // Include shipping fee
            foreach ( $order->get_items( 'shipping' ) as $shipping_id => $shipping ) {
                // Skip if shipping fee is free
                if ( $shipping->get_total() <= 0 ) {
                    continue;
                }

                $products[] = array(
                    'title'    => sprintf( __( 'Shipping: %s', 'ebizzpay-wc' ), $shipping->get_name() ),
                    'price'    => $shipping->get_total(),
                    'quantity' => 1,
                );
            }

            // Include admin fee
            if ( $this->admin_fee_enabled && $this->admin_fee_amount > 0 ) {
                $products[] = array(
                    'title'    => $this->admin_fee_title,
                    'price'    => wc_format_decimal( $this->admin_fee_amount, 2 ),
                    'quantity' => 1,
                );
            }

            // Create a bill
            list( $code, $response ) = $this->ebizzpay->create_bill( $this->collection_code, array(
                'due'      => current_time( 'Y-m-d' ),
                'ref1'     => sprintf( __( 'Order #%d', 'ebizzpay-wc' ), $order_id ),
                'ref2'     => 'woocommerce',
                'currency' => get_woocommerce_currency(),
                'customer' => $customer,
                'product'  => $products,
            ) );

            if ( isset( $response['errors'] ) && is_array( $response['errors'] ) ) {
                foreach ( $response['errors'] as $errors ) {
                    foreach ( $errors as $error ) {
                        throw new Exception( sanitize_text_field( $error ) );
                    }
                }
            }

            $payment_url = isset( $response['data']['payment_url'] ) ? sanitize_text_field( $response['data']['payment_url'] ) : false;

            if ( !$payment_url ) {
                throw new Exception( __( 'Unable to redirect to the payment page. Please contact admin.', 'ebizzpay-wc' ) );
            }

            $this->log( sprintf( __( 'Payment created for order #%d', 'ebizzpay-wc' ), $order_id ) );

        } catch ( Exception $e ) {
            $error_message = sprintf( __( 'Payment error: %s', 'ebizzpay-wc' ), $e->getMessage() );

            wc_add_notice( $error_message, 'error' );
            $this->log( $error_message );
            return;
        }

        // Save payment URL for this order for 30 minutes
        set_transient( "_ebizzpay_order_{$order_id}_payment_url", $payment_url, ( 30 * MINUTE_IN_SECONDS ) );

        update_post_meta( $order_id, '_ebizzpay_admin_fee_title', $this->admin_fee_title );
        update_post_meta( $order_id, '_ebizzpay_admin_fee_amount', $this->admin_fee_amount );

        // Redirect to the payment page
        return array(
            'result'   => 'success',
            'redirect' => $payment_url,
        );

    }

    // Handle webhook and redirect upon payment completion
    public function handle_ipn() {

        $response = $this->ebizzpay->get_ipn_response();

        if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {
            return $this->handle_ipn_redirect( $response );
        } else {
            return $this->handle_ipn_webhook( $response );
        }

    }

    // Handle redirect upon payment completion
    private function handle_ipn_redirect( $response ) {

        if ( !$response ) {
            $this->log( __( 'IPN redirect failed: Invalid response data', 'ebizzpay-wc' ) );
            wp_die( __( 'EbizzPay IPN redirect failed: Invalid response data', 'ebizzpay-wc' ), 'EbizzPay IPN', array( 'response' => 500 ) );
        }

        $this->log( sprintf( __( 'IPN redirect response: %s', 'ebizzpay-wc' ), wp_json_encode( $response ) ) );

        $order_id = absint( str_replace( 'Order #', '', $response['ref1'] ) );
        $order = wc_get_order( $order_id );

        if ( !$order ) {
            $this->log( __( 'IPN redirect failed: Invalid order', 'ebizzpay-wc' ) );
            wp_die( __( 'EbizzPay IPN redirect failed: Invalid order', 'ebizzpay-wc' ), 'EbizzPay IPN', array( 'response' => 500 ) );
        }

        try {
            $this->log( sprintf( __( 'Verifying signature for order #%d', 'ebizzpay-wc' ), $order_id ) );
            $this->ebizzpay->validate_ipn_response( $response );

        } catch ( Exception $e ) {
            $this->log( sprintf( __( 'IPN redirect failed: %s' ), $e->getMessage() ) );
            wp_die( sprintf( __( 'EbizzPay IPN redirect failed: %s' ), $e->getMessage() ), 'EbizzPay IPN', array( 'response' => 200 ) );

        } finally {
            $this->log( sprintf( __( 'Verified signature for order #%d', 'ebizzpay-wc' ), $order_id ) );
        }

        $this->log( __( 'IPN redirect success', 'ebizzpay-wc' ) );

        wp_redirect( $order->get_checkout_order_received_url() );
        exit;

    }

    // Handle webhook upon payment completion
    private function handle_ipn_webhook( $response ) {

        if ( !$response ) {
            $this->log( __( 'IPN webhook failed: Invalid response data', 'ebizzpay-wc' ) );
            wp_die( __( 'EbizzPay IPN webhook failed: Invalid response data', 'ebizzpay-wc' ), 'EbizzPay IPN', array( 'response' => 500 ) );
        }

        $this->log( sprintf( __( 'IPN webhook response: %s', 'ebizzpay-wc' ), wp_json_encode( $response ) ) );

        $order_id = absint( str_replace( 'Order #', '', $response['ref1'] ) );
        $order = wc_get_order( $order_id );

        if ( !$order ) {
            $this->log( __( 'IPN webhook failed: Invalid order', 'ebizzpay-wc' ) );
            wp_die( __( 'EbizzPay IPN webhook failed: Invalid order', 'ebizzpay-wc' ), 'EbizzPay IPN', array( 'response' => 500 ) );
        }

        // Check if the payment already marked as paid
        if ( get_post_meta( $order_id, $response['bill_no'], true ) === 'paid' ) {
            return false;
        }

        try {
            $this->log( sprintf( __( 'Verifying signature for order #%d', 'ebizzpay-wc' ), $order_id ) );
            $this->ebizzpay->validate_ipn_response( $response );

        } catch ( Exception $e ) {
            $this->log( sprintf( __( 'IPN webhook failed: %s' ), $e->getMessage() ) );
            wp_die( sprintf( __( 'EbizzPay IPN webhook failed: %s' ), $e->getMessage() ), 'EbizzPay IPN', array( 'response' => 200 ) );

        } finally {
            $this->log( sprintf( __( 'Verified signature for order #%d', 'ebizzpay-wc' ), $order_id ) );
        }

        if ( $response['paid'] == '1' ) {
            $this->handle_success_payment( $order, $response );
        }

        $this->log( __( 'IPN webhook success', 'ebizzpay-wc' ) );
        wp_die( __( 'EbizzPay IPN webhook success' ), 'EbizzPay IPN', array( 'response' => 200 ) );

    }

    // Handle success payment
    private function handle_success_payment( $order, $response ) {

        $order_id = $order->get_id();

        update_post_meta( $order_id, '_ebizzpay_bill_id', $response['bill_id'] );
        update_post_meta( $order_id, '_ebizzpay_payment_method', $response['payment_method'] );
        update_post_meta( $order_id, '_transaction_id', $response['bill_no'] );
        update_post_meta( $order_id, $response['bill_no'], 'paid' );

        $order->payment_complete();

        ///////////////////////////////////////////////////////////////////////////////////////////

        $reference  = sprintf( __( '<br>.<br>Bill No: %s', 'ebizzpay-wc' ), $response['bill_no'] );
        $reference .= sprintf( __( '<br>Payment Method: %s', 'ebizzpay-wc' ), $response['payment_method'] );

        ///////////////////////////////////////////////////////////////////////////////////////////

        $admin_fee_title  = $order->get_meta( '_ebizzpay_admin_fee_title' );
        $admin_fee_amount = (float) $order->get_meta( '_ebizzpay_admin_fee_amount' );

        if ( $admin_fee_amount ) {
            $reference .= sprintf( __( '<br>%1$s: %2$s', 'ebizzpay-wc' ), $admin_fee_title ?: $this->default_admin_fee_title, wc_price( $admin_fee_amount ) );
        }

        ///////////////////////////////////////////////////////////////////////////////////////////

        $sandbox = $this->sandbox ? __( 'Yes', 'ebizzpay-wc' ) : __( 'No', 'ebizzpay-wc' );

        $reference .= sprintf( __( '<br>.<br>Collection Code: %s', 'ebizzpay-wc' ), $this->collection_code );
        $reference .= sprintf( __( '<br>Sandbox: %s', 'ebizzpay-wc' ), $sandbox );

        ///////////////////////////////////////////////////////////////////////////////////////////

        $order->add_order_note( esc_html__( 'Payment success!', 'ebizzpay-wc' ) . $reference );

        $this->log( sprintf( __( 'Order #%d has been marked as Paid', 'ebizzpay-wc' ), $order_id ) );

    }

    // Include payment method title from EbizzPay IPN response data into WooCommerce payment method title
    public function modify_payment_method_title( $payment_method_title, $order ) {

        $ebizzpay_payment_method_title = get_post_meta( $order->get_id(), '_ebizzpay_payment_method', true );

        // Example return: EbizzPay (Online Banking)
        if ( $ebizzpay_payment_method_title ) {
            return sprintf( '%1$s (%2$s)', $payment_method_title, $ebizzpay_payment_method_title );
        }

        return $payment_method_title;

    }

    // Display admin fee in order details table
    public function display_order_admin_fee_in_order_items_totals( $total_rows, $order ) {

        $admin_fee_title  = $order->get_meta( '_ebizzpay_admin_fee_title' );
        $admin_fee_amount = (float) $order->get_meta( '_ebizzpay_admin_fee_amount' );

        if ( !$admin_fee_amount ) {
            return;
        }

        $new_total_rows = array();

        foreach ( $total_rows as $key => $value ) {
            $new_total_rows[ $key ] = $value;

            if ( $key == 'payment_method' ) {
                $new_total_rows[ 'ebizzpay_admin_fee' ] = array(
                    'label' => $admin_fee_title ?: $this->default_admin_fee_title,
                    'value' => wc_price( $admin_fee_amount ),
                );
            }
        }

        return $new_total_rows;

    }

    // Include admin fee amount in order total
    public function modify_order_total( $total, $order ) {

        $admin_fee_amount = (float) $order->get_meta( '_ebizzpay_admin_fee_amount' );

        if ( $admin_fee_amount ) {
            $total += $admin_fee_amount;
        }

        return $total;

    }

    // Display admin fee in order totals table
    public function display_order_admin_fee_in_order_totals( $order_id ) {

        $admin_fee_title  = get_post_meta( $order_id, '_ebizzpay_admin_fee_title', true );
        $admin_fee_amount = (float) get_post_meta( $order_id, '_ebizzpay_admin_fee_amount', true );

        if ( !$admin_fee_amount ) {
            return;
        }
        ?>
        <tr>
            <td class="label"><?php echo esc_html( $admin_fee_title ?: $this->default_admin_fee_title ); ?></td>
            <td width="1%"></td>
            <td class="total"><?php echo wc_price( $admin_fee_amount ); ?></td>
        </tr>
        <?php
    }

    // Debug logging
    private function log( $message ) {

        if ( $this->debug ) {
            ebizzpay_wc_logger( $message );
        }

    }

}
