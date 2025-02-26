<?php
/**
 * Plugin Name: Gateway for Yandex.Checkout and Easy Digital Downloads Lite
 * Plugin URL: https://wordpress.org/plugins/edd-yandex-checkout-lite/
 * Description: Adds a payment gateway for Yandex.Checkout
 * Version: 1.0.7
 * Author: WacoMart
 * Author URI: https://wacomart.ru
 * Text Domain: edd-yandex-checkout-lite
 * Domain Path: /languages/
 * WP requires at least: 4.4
 * License: GPLv2 or later
 */
/*
Copyright 2020 WacoMart (email : info@wacomart.ru)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class EDD_Yandex_Checkout_Gateway
 */
class EDD_Yandex_Checkout_Gateway
{

    /**
     * EDD_Yandex_Checkout_Gateway constructor.
     */
    public function __construct()
    {

        if ( !function_exists( 'edd_is_gateway_active' ) ) {
            return;
        }

        add_action( 'edd_yandex_checkout_cc_form', '__return_false' );
        add_action( 'edd_gateway_yandex_checkout', array( $this, 'process_payment' ) );

        // Load translation
        add_action( 'init', array( $this, 'edd_yandex_checkout_lite_lang' ) );
        add_action( 'init', array( $this, 'process_http_notifications' ) );

        add_filter( 'edd_payment_gateways', array( $this, 'register_gateway' ) );
        add_filter( 'edd_straight_to_gateway_purchase_data', array( $this, 'filter_buy_now_args' ) );
        add_filter( 'edd_accepted_payment_icons', array( $this, 'payment_icon' ) );
        add_filter( 'edd_payment_confirm_yandex_checkout', array( $this, 'pending_success_page' ) );
        add_filter( 'edd_settings_sections_gateways', array( $this, 'section' ), 10, 1 );
        add_filter( 'edd_settings_gateways', array( $this, 'settings' ) );

    }

    /**
     *Download translation
     *
     *
     * @since 1.0
     */
    public function edd_yandex_checkout_lite_lang()
    {
        load_plugin_textdomain( 'edd-yandex-checkout-lite', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     *Add Gateway subsection
     *
     * @param $sections
     * @return mixed
     *
     * @since 1.0
     */
    public function section( $sections )
    {
        $sections['yandex_checkout'] = __( 'Yandex.Checkout', 'edd-yandex-checkout-lite' );

        return $sections;
    }

    /**
     *Register the gateway
     *
     * @param $gateways
     * @return mixed
     *
     * @since 1.0
     */
    public function register_gateway( $gateways )
    {
        $gateways['yandex_checkout'] = array(
            'admin_label' => __( 'Yandex.Checkout Smart payment', 'edd-yandex-checkout-lite' ),
            'checkout_label' => edd_get_option( 'ycl_checkout_label', __( 'Yandex.Checkout (bank cards, e-money, etc.)', 'edd-yandex-checkout-lite' ) ),
            'supports' => array( 'buy_now' )
        );

        //disables for guests because email is needed
        if ( !is_user_logged_in() ) {
            unset( $gateways['yandex_checkout']['supports'] );
        }

        return $gateways;
    }

    /**
     *Send Buy Now buttons to Yandex.Checkout. Disables for guests because email is needed
     *
     * @param array $purchase_data
     * @return array
     *
     * @since 1.0
     */
    public function filter_buy_now_args( $purchase_data = array() )
    {
        if ( edd_is_gateway_active( 'yandex_checkout' ) ) {
            $purchase_data['gateway'] = 'yandex_checkout';
        }
        return $purchase_data;
    }

    /**
     *Register the gateway icon
     *
     * @param $icons
     * @return mixed
     *
     * @since 1.0
     */
    public function payment_icon( $icons )
    {
        $icons[ plugin_dir_url( __FILE__ ) . 'yc_icon.png' ] = 'Yandex.Checkout';
        return $icons;
    }

    /**
     *Process the purchase data and send to Yandex.Checkout
     *
     * @param $purchase_data
     *
     * @since 1.0
     */
    public function process_payment( $purchase_data )
    {

        $credentials = $this->get_api_credentials();

        if ( empty( $credentials['ycl_shop_id'] ) || empty( $credentials['ycl_secret_key'] ) ) {
            edd_set_error( 0, __( 'You must enter your ShopId and Secret key in settings', 'edd-yandex-checkout-lite' ) );
            edd_send_back_to_checkout( '?payment-mode=' . $purchase_data['post_data']['edd-gateway'] );
        }

        $payment_data = array(
            'price' => $purchase_data['price'],
            'date' => $purchase_data['date'],
            'user_email' => $purchase_data['user_email'],
            'purchase_key' => $purchase_data['purchase_key'],
            'currency' => edd_get_currency(),
            'downloads' => $purchase_data['downloads'],
            'cart_details' => $purchase_data['cart_details'],
            'user_info' => $purchase_data['user_info'],
            'status' => 'pending'
        );

        // record the pending payment
        $payment = edd_insert_payment( $payment_data );

        if ( $payment ) {

            // Get the success url
            $return_url = add_query_arg( array(
                'payment-confirmation' => 'yandex_checkout',
                'payment-id' => $payment
            ), edd_get_success_page_uri() );

            try {
                $response = $this->getApiClient()->createPayment(
                    array(
                        'amount' => array(
                            'value' => $this->ycl_round_price( $purchase_data['price'] ),
                            'currency' => edd_get_currency(),
                        ),
                        'confirmation' => array(
                            'type' => 'redirect',
                            'locale' => $this->ycl_check_locale_shop(),
                            'return_url' => $return_url,
                        ),
                        'capture' => true,
                        'client_ip' => edd_get_ip(),
                        'description' => sprintf( __( 'Payment ID: %s for %s', 'edd-yandex-checkout-lite' ), $payment, $purchase_data['user_email'] ),
                        'metadata' => array(
                            'cms_name' => 'WordPress Easy Digital Downloads - Yandex.Checkout',
                            'merchant_order_id' => $payment,
                            'user_email' => $purchase_data['user_email'],
                            'customer_first_name' => $purchase_data['user_info']['first_name'],
                            'customer_last_name' => $purchase_data['user_info']['last_name'],
                        )
                    )
                );

                edd_debug_log( 'Yandex.Checkout Lite - Payment for Smart Payment' );
                edd_debug_log( print_r( $response, true ) );

            } catch ( Exception $e ) {
                // Record error in log.
                edd_record_gateway_error(
                    esc_html__( 'Yandex.Checkout Error', 'edd-yandex-checkout-lite' ),
                    sprintf(
                        esc_html__( 'Error creating payment in Yandex.Checkout payment. %s', ' edd-yandex-checkout-lite' ),
                        wp_json_encode( "Error description: " . $e->getMessage() )
                    ),
                    $payment
                );
                edd_set_error( 0, __( 'There was an error processing your payment. Try again or contact the site administrator.', 'edd-yandex-checkout-lite' ) );
                edd_send_back_to_checkout( '?payment-mode=' . $purchase_data['post_data']['edd-gateway'] );
            }

            if ( !empty( $response->id ) ) {
                edd_set_payment_transaction_id( $payment, sanitize_text_field( $response->id ) );
            }

            try {
                $confirmationUrl = $response->getConfirmation()->getConfirmationUrl();
            } catch ( Exception $e ) {
                // Record error in log.
                edd_record_gateway_error(
                    esc_html__( 'Yandex.Checkout Error', 'edd-yandex-checkout-lite' ),
                    sprintf(
                        esc_html__( 'Error receiving confirmation link in Yandex Yandex.Checkout. %s', ' edd-yandex-checkout-lite' ),
                        wp_json_encode( "Error description: " . $e->getMessage() )
                    ),
                    $payment
                );
                edd_set_error( 0, __( 'There was an error processing your payment. Try again or contact the site administrator.', 'edd-yandex-checkout-lite' ) );
                edd_send_back_to_checkout( '?payment-mode=' . $purchase_data['post_data']['edd-gateway'] );
            }

            edd_empty_cart();

            wp_redirect( $confirmationUrl );
            exit;

        } else {
            // if errors are present, send the user back to the purchase page so they can be corrected
            edd_send_back_to_checkout( '?payment-mode=' . $purchase_data['post_data']['edd-gateway'] );
        }
    }

    /**
     *Shows "Purchase Processing" message for Yandex.Checkout payments are still pending on site return.
     *This helps address the Race Condition, as detailed in issue #1839
     *
     * @param $content
     * @return false|string
     *
     * @since 1.0
     */
    public function pending_success_page( $content )
    {

        if ( !isset( $_GET['payment-id'] ) && !edd_get_purchase_session() ) {
            return $content;
        }

        $payment_id = isset( $_GET['payment-id'] ) ? absint( $_GET['payment-id'] ) : false;

        if ( !$payment_id ) {
            $session = edd_get_purchase_session();
            $payment_id = edd_get_purchase_id_by_key( $session['purchase_key'] );
        }

        edd_empty_cart();

        $payment = get_post( $payment_id );

        if ( $payment && 'pending' == $payment->post_status ) {

            // Payment is still pending so show processing indicator to fix the Race Condition, issue #
            ob_start();

            edd_get_template_part( 'payment', 'processing' );

            $content = ob_get_clean();

        }

        return $content;

    }

    /**
     *Register the gateway settings
     *
     * @param $settings
     * @return array
     *
     * @since 1.0
     */
    public function settings( $settings )
    {
        $ycl_http_notifications_desc = '<p>' . sprintf( __( 'In order for Yandex.Checkout to function completely, you must configure your HTTP notifications. Visit your <a href="%s" target="_blank">account dashboard</a> to configure them. Please add the URL below to all notification types.', 'edd-yandex-checkout-lite' ), 'https://kassa.yandex.ru/my/merchant/integration/http-notifications/' ) . '</p>' .
            '<p><strong>' . sprintf( __( 'URL: %s', 'edd-yandex-checkout-lite' ), home_url( 'index.php?edd-listener=YCNOT' ) ) . '</strong></p>' .
            '<p>' . sprintf( __( 'See <a href="%s">documentation</a> for more information.', 'edd-yandex-checkout-lite' ), 'https://kassa.yandex.ru/developers/using-api/webhooks' ) . '</p>';

        if ( !is_ssl() ) {
            $ycl_http_notifications_desc .= '<div class="notice notice-warning inline"><p>' . sprintf( __( 'URL for notifications should begin with https, meaning your website is protected by the <a href="%s" target="_blank">SSL certificate</a>. Any certificate is applicable, whether self-signed or issued by the certificate authority. Minimum SSL/TLS version is TLS v1.2.', 'edd-yandex-checkout-lite' ), 'https://yandex.ru/support/checkout/security.html?lang=en' ) . '</p></div>';
        }

        $yclite_settings = array(
            array(
                'id' => 'ycl_settings',
                'name' => '<strong>' . __( 'Yandex.Checkout Gateway Settings', 'edd-yandex-checkout-lite' ) . '</strong>',
                'desc' => __( 'Configure your Yandex.Checkout Gateway Settings', 'edd-yandex-checkout-lite' ),
                'type' => 'header'
            ),
            array(
                'id' => 'ycl_shop_id',
                'name' => __( 'ShopId', 'edd-yandex-checkout-lite' ),
                'desc' => __( 'Enter your ShopId', 'edd-yandex-checkout-lite' ),
                'type' => 'text',
                'tooltip_title' => __( 'Where can I find the shop ID?', 'edd-yandex-checkout-lite' ),
                'tooltip_desc' => __( 'ShopId can be copied from Yandex.Checkout Merchant Profile', 'edd-yandex-checkout-lite' ),
            ),
            array(
                'id' => 'ycl_secret_key',
                'name' => __( 'Secret key', 'edd-yandex-checkout-lite' ),
                'desc' => __( 'Enter your Yandex.Checkout Secret key', 'edd-yandex-checkout-lite' ),
                'type' => 'text',
                'tooltip_title' => __( 'Where to find the secret key?', 'edd-yandex-checkout-lite' ),
                'tooltip_desc' => __( 'Secret key must be released and saved after the Yandex.Checkout is connected. If the key is lost, in your account, you can reissue it.
', 'edd-yandex-checkout-lite' ),
            ),
            array(
                'id' => 'ycl_http_notifications',
                'type' => 'descriptive_text',
                'name' => __( 'HTTP notifications', 'edd-yandex-checkout-lite' ),
                'desc' => $ycl_http_notifications_desc
            ),
            array(
                'id' => 'ycl_checkout_label',
                'name' => __( 'Checkout Label', 'edd-yandex-checkout-lite' ),
                'desc' => __( 'This text will be shown on the checkout page when choosing a payment method', 'edd-yandex-checkout-lite' ),
                'type' => 'text',
                'size' => 'regular'
            ),
            array(
                'id' => 'ycl_round_price',
                'name' => __( 'Rounding prices', 'edd-yandex-checkout-lite' ),
                'desc' => __( 'Check this if you want to round downloads prices. Do not enable this feature if your prices are decimal.', 'edd-yandex-checkout-lite' ),
                'type' => 'checkbox'
            ),
            array(
                'id' => 'yc_notification_pro',
                'type' => 'descriptive_text',
                'name' => '',
                'desc' => __( 'Get the Pro version: bank cards, Yandex.Money wallets, widget (payment on the website), refunds and more. 10% discount promo code: <strong>NEWYCP</strong>', 'edd-yandex-checkout-lite' ),
            ),
        );

        if ( version_compare( EDD_VERSION, 2.5, '>=' ) ) {
            $yclite_settings = array( 'yandex_checkout' => $yclite_settings );
        }

        return array_merge( $settings, $yclite_settings );
    }

    /**
     *Process http notifications sent from Yandex.Checkout
     *
     *
     * @since 1.0
     */
    public function process_http_notifications()
    {

        if ( !isset( $_GET['edd-listener'] ) || 'YCNOT' !== $_GET['edd-listener'] ) {
            return;
        }
        try {
            // Retrieve the request's body and parse it as JSON.
            $body = @file_get_contents( 'php://input' );
            $notificationModel = json_decode( $body );

            $id_payment_yc = $notificationModel->object->id;

            if ( isset( $id_payment_yc ) ) {
                if ( $notificationModel->event != 'refund.succeeded' ) {
                    $event = $this->getApiClient()->getPaymentInfo( $id_payment_yc );
                } else {
                    $event = $this->getApiClient()->getRefundInfo( $id_payment_yc );
                }

                edd_debug_log( 'Yandex.Checkout notifications: ' . print_r( $event, true ) );

            } else {
                throw new \Exception( esc_html__( 'Unable to find Event', 'edd-yandex-checkout-lite' ) );
            }

            switch ( $notificationModel->event ) {

                case 'payment.succeeded' :
                    $payment_id = edd_get_purchase_id_by_transaction_id( $id_payment_yc );
                    $payment = new EDD_Payment( $payment_id );

                    if ( $payment && $payment->ID > 0 ) {

                        $this->add_user_if_not_exist( $event, $payment );

                        $order_validation = $this->validate_order_http_notifications( $event, $payment );

                        if ( false === $order_validation['success'] ) {
                            edd_update_payment_status( $payment->ID, 'failed' );
                            $payment->add_note( $order_validation['message'] );
                        } else {
                            edd_update_payment_status( $payment->ID, 'publish' );
                        }

                        edd_insert_payment_note( $payment->ID, sprintf( __( 'Payment completed successfully. The payment amount (%s %s) has been credited to the store’s account in Yandex.Checkout.', 'edd-yandex-checkout-lite' ), $event->amount->value, $event->amount->currency ) );

                    }
                    break;

                case 'refund.succeeded' :

                    $payment_id = edd_get_purchase_id_by_transaction_id( $event->paymentId );
                    $payment = new EDD_Payment( $payment_id );

                    if ( $payment && $payment->ID > 0 ) {

                        if ( $event->amount->value < $payment->total ) {

                            edd_insert_payment_note( $payment->ID, sprintf( __( 'Charge %s partially refunded in Yandex.Checkout.', 'edd-yandex-checkout-lite' ), $event->payment_id ) );
                        } else {

                            edd_update_payment_status( $payment->ID, 'refunded' );
                            edd_insert_payment_note( $payment->ID, sprintf( __( 'Charge %s has been fully refunded in Yandex.Checkout.', 'edd-yandex-checkout-lite' ), $event->payment_id ) );

                        }
                    }

                    break;

                case 'payment.canceled' :

                    $payment_id = edd_get_purchase_id_by_transaction_id( $id_payment_yc );
                    $payment = new EDD_Payment( $payment_id );

                    if ( $payment && $payment->ID > 0 ) {

                        edd_update_payment_status( $payment->ID, 'failed' );

                        if ( !empty( $event->cancellation_details->reason ) ) {
                            $error_code = $event->cancellation_details->reason;
                            edd_insert_payment_note( $payment->ID, sprintf( __( 'Payment canceled in Yandex.Checkout. Reason: %s ', 'edd-yandex-checkout-lite' ), $this->array_errors_payment_cancellation( $error_code ) ) );
                        }
                    }

                    break;
            }

            // Nothing failed, mark complete.
            status_header( 200 );
            die( esc_html( 'EDD YC: ' . $notificationModel->event ) );

            // Fail, allow a retry.
        } catch ( \Exception $e ) {
            status_header( 500 );
            die( '-2' );
        }
    }

    /**
     *Adding a new user if does not exist
     *
     * @param $event
     * @param $payment
     *
     * @since 1.0
     */
    public function add_user_if_not_exist( $event, $payment )
    {
        if ( !edd_get_payment_user_email( $payment->ID ) ) {
            $payment_email = sanitize_email( $event->object->metadata->user_email );
            $customer = new EDD_Customer( $payment_email );

            if ( $customer->id < 1 ) {
                $customer->create( array(
                    'email' => $payment_email,
                    'name' => sanitize_text_field( $event->object->metadata->customer_first_name ) . ' ' . sanitize_text_field( $event->object->metadata->customer_last_name )
                ) );
            }

            $customer->attach_payment( $payment->ID, false );

            update_post_meta( $payment->ID, '_edd_payment_user_email', $customer->email );
            update_post_meta( $payment->ID, '_edd_payment_customer_id', $customer->id );

            $user_info = array(
                'id' => $customer->user_id,
                'email' => $customer->email,
                'first_name' => sanitize_text_field( $event->object->metadata->customer_first_name ),
                'last_name' => sanitize_text_field( $event->object->metadata->customer_last_name ),
                'discount' => '',
                'address' => ''
            );

            $payment_meta = get_post_meta( $payment->ID, '_edd_payment_meta', true );
            $payment_meta['user_info'] = serialize( $user_info );
            update_post_meta( $payment->ID, '_edd_payment_meta', $payment_meta );
        }
    }

    /**
     *List of errors when canceling payment
     *
     * @param $error_code
     * @return string|void
     *
     * @since 1.0
     */
    public function array_errors_payment_cancellation( $error_code )
    {
        switch ( $error_code ) {
            case '3d_secure_failed':
                $message = __( '3-D Secure authentication failed. The buyer should repeat the payment, contact their bank for details, or use another payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'call_issuer':
                $message = __( 'Payment made with this payment method was declined for unknown reasons. The buyer should contact the organization that provides the payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'card_expired':
                $message = __( 'The bank card has expired. The buyer should use a different payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'country_forbidden':
                $message = __( 'Payments with a bank card issued in this country are not allowed. The buyer should use a different payment method. You can set up the limits for payments made via bank card issued by foreign banks', 'edd-yandex-checkout-lite' );
                break;
            case 'fraud_suspected':
                $message = __( 'The payment was blocked due to suspected fraud. The buyer should use a different payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'general_decline':
                $message = __( 'No detailed reason provided. The buyer should contact the initiator of the payment cancellation for more details', 'edd-yandex-checkout-lite' );
                break;
            case 'identification_required':
                $message = __( 'Exceeded payment limit on the Yandex.Money wallet. The buyer should complete the identification process or select another payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'insufficient_funds':
                $message = __( 'Not enough money to make the payment. The buyer should add money to the account balance or select another payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'invalid_card_number':
                $message = __( 'Invalid card number. The buyer should repeat the payment and enter the correct card details', 'edd-yandex-checkout-lite' );
                break;
            case 'invalid_csc':
                $message = __( 'The CVV2 code (CVC2, CID) was entered incorrectly. The buyer should repeat the payment and enter the correct card details', 'edd-yandex-checkout-lite' );
                break;
            case 'issuer_unavailable':
                $message = __( 'The organization that provides the payment method is not available. The buyer should repeat the payment later or select another payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'payment_method_limit_exceeded':
                $message = __( 'Payment limit for this payment method or your store has been reached. The buyer should repeat the payment on the following day or select another payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'payment_method_restricted':
                $message = __( 'Transactions made with this payment method are forbidden (for example, the card is blocked due to loss or the wallet is blocked due to hacking). The buyer should contact the organization that provides the payment method', 'edd-yandex-checkout-lite' );
                break;
            case 'permission_revoked':
                $message = __( 'Unable to make automatic debit: the user disabled recurring payments. If the user wants to make another payment, you will need to create it, and the user will have to confirm it.', 'edd-yandex-checkout-lite' );
                break;

            default:
                $message = __( 'Unknown error', 'edd-yandex-checkout-lite' );
                break;
        }
        return $message;

    }

    /**
     *Choose a language: English or Russian
     *
     * @return string
     *
     * @since 1.0.1
     */
    public function ycl_check_locale_shop()
    {
        $locale = get_locale();

        if ( $locale == 'ru_RU' ) {
            $locale = 'ru_RU';
        } else {
            $locale = 'en_US';
        }
        return $locale;
    }

    /**
     *Retrieve the API credentials
     *
     * @return null[]
     *
     * @since 1.0
     */
    private function get_api_credentials()
    {
        global $edd_options;

        $ycl_shop_id = isset( $edd_options['ycl_shop_id'] ) ? trim( $edd_options['ycl_shop_id'] ) : null;
        $ycl_secret_key = isset( $edd_options['ycl_secret_key'] ) ? trim( $edd_options['ycl_secret_key'] ) : null;

        $data = array(
            'ycl_shop_id' => $ycl_shop_id,
            'ycl_secret_key' => $ycl_secret_key,
        );

        return $data;
    }

    /**
     *
     * @return \YandexCheckout\Client
     *
     * @since 1.0
     */
    private function getApiClient()
    {

        if ( edd_is_gateway_active( 'yandex_checkout' ) && !class_exists( 'YandexCheckout\Client' ) ) {
            require_once dirname( __FILE__ ) . '/sdk/lib/autoload.php';
        }

        $credentials = $this->get_api_credentials();

        $shopId = $credentials['ycl_shop_id'];
        $shopPassword = $credentials['ycl_secret_key'];
        $apiClient = new YandexCheckout\Client();
        $apiClient->setAuth( $shopId, $shopPassword );

        return $apiClient;
    }

    /**
     *Checking the amount of payment in Yandex.Checkout
     *
     * @param $event
     * @param $payment
     * @return array
     *
     * @since 1.0
     */
    private function validate_order_http_notifications( $event, $payment )
    {
        $success = true;
        $message = '';

        if ( $payment->total > $event['amount']['value'] ) {
            $success = false;
            $message = sprintf( __( 'Yandex.Checkout total (%s) did not match payment total (%s).', 'edd-yandex-checkout-lite' ), $event['amount']['value'], $payment->total );
        }

        return array( 'success' => $success, 'message' => $message );
    }

    /**
     *Rounding prices
     *
     * @param $ycl_round_price
     * @return string
     *
     * @since 1.0.4
     */
    private function ycl_round_price( $ycl_round_price )
    {
        global $edd_options;

        if ( isset( $edd_options['ycl_round_price'] ) ) {
            $ycl_round_price = intval( round( (float)$ycl_round_price * 100 ) );
            $ycl_round_price = number_format( $ycl_round_price / 100, 2, '.', '' );
        }

        return $ycl_round_price;
    }

}

/**
 *Load our plugin
 *
 *
 * @since 1.0
 */
function edd_yandex_checkout_load()
{
    $gateway = new EDD_Yandex_Checkout_Gateway;
    unset( $gateway );
}

add_action( 'plugins_loaded', 'edd_yandex_checkout_load' );
