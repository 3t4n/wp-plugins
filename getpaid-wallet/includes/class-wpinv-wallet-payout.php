<?php
/**
 * Contains the main payouts class.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * The main payouts class.
 *
 *
 * @since      1.0.0-beta
 * @package    Invoicing
 * @subpackage Wallet
 */
class WPInv_Wallet_Payout {

    /**
     * @var \PayPal\Rest\ApiContext The PayPal api context
     * 
     * @since      1.0.0-beta
     */
    private $api_context = null;

    /**
     * Class constructor
     *
     *
     * @since      1.0.0-beta
     */
    public function __construct() {
        add_action( 'wp_ajax_wpinv_wallet_withdraw', array( $this, 'wallet_withdraw' ) );
    }

    /**
     * Ajax error
     *
     *
     * @since      1.0.0-beta
     */
    public function ajax_error( $error_msg, $status = 400 ) {

        status_header( $status, $error_msg );
        nocache_headers();
        exit;

    }

   /**
     * Processes a withdrawal
     *
     *
     * @since      1.0.0-beta
     */
    public function wallet_withdraw() {

        // Verify nonce.
        check_ajax_referer( 'wpinv_wallet' );

        // Ensure withdrawals are allowed.
        if ( 0 == (int) wpinv_get_option( 'wpinv_wallet_enable_withdrawals', 1 ) ) {
            $this->ajax_error( __( 'Withdrawals are not supported', 'getpaid-wallet' ), 500 );
        }

        // Abort if the user is not logged .
        $user_id = get_current_user_id();
        if ( empty( $user_id ) ) {
            $this->ajax_error( __( 'You need to log in first before you can withdraw your funds.', 'getpaid-wallet' ), 400 );
        }

        // Ensure both the email and amount are set up.
        $email              = empty( $_POST['email'] ) ? '' : sanitize_email( $_POST['email'] );
        $amount             = empty( $_POST['amount'] ) ? 0 : wpinv_sanitize_amount( $_POST['amount'] );
        $user_amount        = wpinv_wallet_get_user_balance( $user_id, false );
        $minimum_withdrawal = wpinv_sanitize_amount( wpinv_get_option( 'wpinv_wallet_minimum_withdrawal' ) );

        if ( empty( $email ) || ! is_email( $email ) ) {
            $this->ajax_error( __( 'Provide a valid email address.', 'getpaid-wallet' ), 400 );
        }

        if ( ! $amount > 0 ) {
            $this->ajax_error( __( 'Invalid withdrawal amount.', 'getpaid-wallet' ), 400 );
        }

        if ( ! $user_amount > 0 ) {
            $this->ajax_error( __( 'You have no funds in your account.', 'getpaid-wallet' ), 400 );
        }

        if ( $amount > $user_amount ) {
            $this->ajax_error( __( 'You do not have sufficient funds in your account to withdraw that amount.', 'getpaid-wallet' ), 400 );
        }

        if ( $minimum_withdrawal > $amount ) {
            $this->ajax_error(
                sprintf(
                    esc_html__( 'The minimum amount that you can withdraw is %s.', 'getpaid-wallet' ),
                    sanitize_text_field( wpinv_price( wpinv_format_amount( $minimum_withdrawal ) ) )
                ),
                400
            );
        }

        // And paypal payout details are set up correctly.
        $client_id     = wpinv_get_option( 'wpinv_wallet_paypal_client_id' );
        $client_secret = wpinv_get_option( 'wpinv_wallet_paypal_client_secret' );

        $payout = false;
        if ( ! empty( $client_id ) && ! empty( $client_secret ) ) {
            $payout = $this->create_payout( $email, $amount, wpinv_get_currency(), uniqid() );
        }

        if ( empty( $payout ) ) {
            $user   = get_userdata( $user_id );
            $this->issue_manual_withdrawal( $user_id, $user->user_email, $amount, wpinv_get_currency(), $email );
            wp_send_json_success( array(
                'msg'   => __( 'Request processed. We will issue your withdrawal soon.', 'getpaid-wallet' )
            ) );
        }

        // Save transaction.
        $args = array(
            'amount'   => 0 - $amount,
            'balance'  => $user_amount - $amount,
            'type'     => 'withdrawal',
            'details'  => sprintf(
                esc_html__( 'Wallet withdrawal to %s', 'getpaid-wallet' ),
                $email
            ),
        );

        wpinv_wallet_add_new_transaction( $user_id, $args );

        wp_send_json_success( array(
            'msg'   => esc_html__( 'Request processed. You will receive an email soon with more details about your withdrawal.', 'getpaid-wallet' )
        ) );

    }

    /**
     * Retrieves the api context
     *
     * @since      1.0.0-beta
     * @return \PayPal\Rest\ApiContext
     */
    public function get_api_context() {
        
        if ( ! empty( $this->api_context ) ) {
            return $this->api_context;
        }

        $client_id     = wpinv_get_option( 'wpinv_wallet_paypal_client_id' );
        $client_secret = wpinv_get_option( 'wpinv_wallet_paypal_client_secret' );
        $sandbox       = wpinv_get_option( 'wpinv_wallet_paypal_sandbox' );

        $this->api_context = new PayPal\Rest\ApiContext(
            new PayPal\Auth\OAuthTokenCredential(
                $client_id,
                $client_secret
            )
        );

        if ( ! empty( $sandbox ) ) {

            $this->api_context->setConfig(
                array(
                    'mode'           => 'sandbox',
                    'log.LogEnabled' => true,
                    'cache.enabled'  => true,
                )
            );
        }

        return $this->api_context;
        
    }

    /**
     * Retrieves a currency object
     *
     *
     * @since      1.0.0-beta
     * @return \PayPal\Api\Currency
     */
    public function get_currency( $_currency, $amount ) {

        $currency = new \PayPal\Api\Currency();
        $currency->setCurrency( $_currency );
        $currency->setValue( $amount );
        return $currency;

    }

    /**
     * Retrieves a batch header
     *
     *
     * @since      1.0.0-beta
     * @return \PayPal\Api\PayoutSenderBatchHeader
     */
    public function get_batch_header( $batch_id, $email_subject ) {
        
        $batch_header = new \PayPal\Api\PayoutSenderBatchHeader();
        $batch_header->setSenderBatchId( $batch_id );
        $batch_header->setEmailSubject( $email_subject );
        return $batch_header;

    }

    /**
     * Retrieves a receiver data
     *
     * @since      1.0.0-beta
     * @return \PayPal\Api\PayoutItem
     */
    public function get_receiver_data( $email, $amount ) {

        $receiver_data = new \PayPal\Api\PayoutItem();
        $receiver_data->setRecipientType( 'EMAIL' );
        $receiver_data->setReceiver( $email );
        $receiver_data->setAmount( $amount );
        return $receiver_data;

    }

    /**
     * Createa a single payout
     *
     * https://paypal.github.io/PayPal-PHP-SDK/sample/doc/payouts/CreateSinglePayout.html
     *
     * @since      1.0.0-beta
     * @return \PayPal\Api\PayoutBatch|false
     */
    public function create_payout( $email, $amount, $currency, $transaction_id ) {

        // Create a new instance of Payout object.
        $payouts = new \PayPal\Api\Payout();

        // Payout header.
        $batch_header = $this->get_batch_header( $transaction_id, __( 'Here is your withdrawal', 'getpaid-wallet' ) );

        // Reciever data.
        $receiver_data = $this->get_receiver_data( $email, $this->get_currency( $currency, $amount ) );

        // Prepare the payout.
        $payouts->setSenderBatchHeader( $batch_header )->addItem( $receiver_data );

        // ### Create the Payout.
        try {
            return $payouts->create( array(), $this->get_api_context() );
        } catch ( Exception $e ) {
            return false;
        }

    }

    /**
     * Handles manual withdrawals
     *
     * @since      1.0.0-beta
     */
    public function issue_manual_withdrawal( $user_id, $email, $amount, $currency, $paypal_email ) {

        $amount   = wpinv_price( wpinv_format_amount( $amount ), $currency );
        $email    = sanitize_email( $email );
        $currency = sanitize_text_field( $currency );
        $user_id  = (int) $user_id;
        $subject = sprintf(
            esc_html__( 'New withdrawal request from %s', 'getpaid-wallet' ),
            $email
        );

        $body = sprintf(
            esc_html__( "You have a new withdrawal request of %s from %s. Please pay the user via their PayPal email (%s) then update the user's balance", 'getpaid-wallet' ),
            $amount,
            "$email (user_id: $user_id)",
            $paypal_email
        );

        $email = array( get_option( 'admin_email' ), wpinv_get_admin_email() );
        wp_mail( array_unique( array_filter( $email ) ), $subject, $body );

    }

}
