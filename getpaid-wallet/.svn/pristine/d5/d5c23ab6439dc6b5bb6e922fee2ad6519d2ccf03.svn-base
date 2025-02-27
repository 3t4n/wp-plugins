<?php
/**
 * Contains the wallet settings.
 *
 */

defined( 'ABSPATH' ) || exit;

return array(

    'wpinv_wallet_title' => array(
        'id'   => 'wpinv_wallet_title',
        'name' => '<h3>' . __( 'Wallet', 'getpaid-wallet' ) . '</h3>',
        'type' => 'header',
    ),

    'wpinv_wallet_transaction_count' => array(
        'id'   => 'wpinv_wallet_transaction_count',
        'name' => __( 'Log Count', 'getpaid-wallet' ),
        'desc' => __('How many transactions should we log per user? Enter 0 for unlimited.', 'getpaid-wallet' ),
        'type' => 'number',
        'std'  => '100',
    ),

    'wpinv_wallet_enable_withdrawals' => array(
        'id'   => 'wpinv_wallet_enable_withdrawals',
        'name' => __( 'Enable Withdrawals', 'getpaid-wallet' ),
        'desc' => __('Allow users to withdraw their funds via PayPal.', 'getpaid-wallet' ),
        'type' => 'checkbox',
        'std'  => '1',
    ),

    'wpinv_wallet_minimum_withdrawal' => array(
        'id'   => 'wpinv_wallet_minimum_withdrawal',
        'name' => __( 'Minimum Withdrawal', 'getpaid-wallet' ),
        'desc' => __('Enter the minimum amount that a user can withdraw.', 'getpaid-wallet' ),
        'type' => 'text',
        'std'  => '1.00',
    ),

    'wpinv_wallet_paypal_client_id' => array(
        'id'           => 'wpinv_wallet_paypal_client_id',
        'name'         => __( 'PayPal Client ID', 'getpaid-wallet' ),
        'desc'         => __('We use the client id and client secret to process payouts.', 'getpaid-wallet' ),
        'type'         => 'text',
        'placeholder'  => 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',
    ),

    'wpinv_wallet_paypal_client_secret' => array(
        'id'           => 'wpinv_wallet_paypal_client_secret',
        'name'         => __( 'Paypal Client Secret', 'getpaid-wallet' ),
        'desc'         => '<a href="https://developer.paypal.com/docs/api/overview/#get-credentials">' . __('How to find your client id and client secret.', 'getpaid-wallet' ) . '</a>',
        'type'         => 'text',
        'placeholder'  => 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL',
    ),

    'wpinv_wallet_paypal_sandbox' => array(
        'id'   => 'wpinv_wallet_paypal_sandbox',
        'name' => __( 'Enable Sandbox', 'getpaid-wallet' ),
        'desc' => __('Check this if the details you provided above are for a sandbox account.', 'getpaid-wallet' ),
        'type' => 'checkbox',
        'std'  => '0',
    ),

);