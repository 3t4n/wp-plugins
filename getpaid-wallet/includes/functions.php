<?php
/**
 * The file defines the core plugin functions
 *
 * @since      1.0.0-beta
 *
 * @package    WPINV-WALLET
 */

// Exit if accessed directly
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Decrypts a string
 *
 * @param string $string The string you want decoded
 *
 */
function wpinv_wallet_decrypt( $string ) {
		
	$salt   = AUTH_SALT;
	$vector = wpinv_wallet_encryption_vector();
	$cipher = 'AES-128-CBC'; 
    return openssl_decrypt( $string, $cipher, $salt, 0, $vector );
    
}

/**
 * Encrypts a string
 *
 * @param string $string The string you want encoded
 *
 */
function wpinv_wallet_encrypt( $string ) {
		
	$salt   = AUTH_SALT;
	$vector = wpinv_wallet_encryption_vector();
	$cipher = 'AES-128-CBC'; 
    return openssl_encrypt( $string, $cipher, $salt, 0, $vector );
}

/**
 * Returns the encryption vector
 *
 * You can specify a custom vector by defining a WPINV_WALLET_VECTOR constant.
 * In case you do so, ensure that the value is exactly 16 characters and never changes.
 *
 */
function wpinv_wallet_encryption_vector() {
    
    // Check if a custom vector has been defined.
	if ( defined( 'WPINV_WALLET_VECTOR' ) ) {
        return constant( 'WPINV_WALLET_VECTOR' );
    }

    // If not, use a random vector.
    $vector = get_option( 'wpinv_wallet_encryption_vector' );

    if ( empty( $vector ) || 16 != strlen( $vector ) ) {
        $vector = wp_generate_password( 16, false );
        update_option( 'wpinv_wallet_encryption_vector',  $vector );
    }

    return  $vector;

}

/**
 * Returns a given user's account balance
 *
 * @param int $user_id The user account whose balance should be retrieved
 * @param bool $formatted Whether or not to format the balance for display
 * @param string $currency The currency who's balance we should get
 * @return string
 */
function wpinv_wallet_get_user_balance( $user_id, $formatted = true, $currency = '' ) {
    global $wpdb;    

    if( empty( $currency ) ) {
        $currency = wpinv_get_currency();
    }

    //Prepare the sql
    $table = $wpdb->prefix . 'wpinv_wallet_balance';
    $sql   = $wpdb->prepare( "SELECT balance FROM $table WHERE user_id=%d AND currency=%s", $user_id, $currency );


    //Fetch an encrypted balance
    $balance = $wpdb->get_var( $sql );

    //If no balance, set it to zero
    if( empty( $balance ) ) {

        $balance = 0;

    } else {

        //Unencryt the balance
        $balance = wpinv_round_amount( (float) wpinv_wallet_decrypt( $balance ) );

    }
    
    //Filters a user's account balance
    $balance = apply_filters( 'wpinv_wallet_user_balance', $balance, $user_id );
    
    //Maybe format the value before returning
    if( $formatted ) {
        $balance = wpinv_price( wpinv_format_amount( $balance ) );
    }

    return $balance;

}

/**
 * Sets a given user's account balance
 *
 * @param int $user_id The user account whose balance should be set
 * @param float $balance The user's new balance
 * @param string $currency The balances currency. Defaults to strore currency.
 * @return void
 */
function wpinv_wallet_set_user_balance( $user_id, $balance, $currency = '' ) {
    global $wpdb;

    //Sanitize the currency
    if( empty( $currency ) ) {
        $currency = wpinv_get_currency();
    }

    //Ensure decimals are well formated
    $balance = wpinv_round_amount( $balance );

    //Encrypt the balance...
    $balance = wpinv_wallet_encrypt( $balance );

    //Prepare the data
    $data = array(
        'user_id'       => $user_id,
        'currency'      => $currency,
        'balance'       => $balance,
        'last_modified' => date( 'Y-m-d H:i:s' ),
    );
    
    //... then save it
    $table = $wpdb->prefix . 'wpinv_wallet_balance';
    if( wpinv_wallet_user_has_balance( $user_id, $currency ) ) {

        $where = array( 
            'user_id'    => $user_id,
            'currency'   => $currency,
        );
        $wpdb->update( $table, $data, $where);

    } else {

        $wpdb->insert( $table, $data);

    }

}

/**
 * Checks if a given user has a balance in the given currency
 *
 * @param int $user_id The user id to check
 * @param string $currency The currency to check. Defaults to strore currency.
 * @return bool
 */
function wpinv_wallet_user_has_balance( $user_id, $currency = '' ) {
    global $wpdb;    

    if( empty( $currency ) ) {
        $currency = wpinv_get_currency();
    }
    
    //Prepare the sql
    $table = $wpdb->prefix . 'wpinv_wallet_balance';
    $sql   = $wpdb->prepare( "SELECT balance_id FROM $table WHERE user_id=%d AND currency=%s", $user_id, $currency );
    
    return !empty( $wpdb->get_var( $sql ) );

}

/**
 * Returns all user transactions
 *
 * @param int $user_id The user id to check
 * @return array
 */
function wpinv_wallet_get_user_transactions( $user_id ) {
    global $wpdb;

    //Prepare the sql
    $table = $wpdb->prefix . 'wpinv_wallet_transactions';
    $sql   = $wpdb->prepare( "SELECT * FROM $table WHERE user_id=%d", $user_id );

    return $wpdb->get_results( $sql );

}

/**
 * Counts all user transactions
 *
 * @param int $user_id The user id to check
 * @return int
 */
function wpinv_wallet_count_user_transactions( $user_id ) {
    global $wpdb;

    //Prepare the sql
    $table = $wpdb->prefix . 'wpinv_wallet_transactions';
    $sql   = $wpdb->prepare( "SELECT COUNT(`transaction_id`) FROM $table WHERE user_id=%d", $user_id );

    return (int) $wpdb->get_var( $sql );

}

/**
 * Adds a new user transaction
 *
 * @param int $user_id The user id associated with the transaction
 * @param array $args The args for the transaction
 * @return void
 */
function wpinv_wallet_add_new_transaction( $user_id, $args = array() ) {
    global $wpdb;

    $defaults = array(
        'user_id'  => $user_id,
        'type'     => 'manual', // manual, topup, etc.
        'amount'   => 0, // amount for the transaction.
        'balance'  => 0, // new user balance for the currency.
        'currency' => wpinv_get_currency(),
        'details'  => '',
    );

    $args = wp_parse_args( $args, $defaults );

    extract( $args );

    $data = array(
        'user_id'  => $user_id,
        'type'     => $type,
        'amount'   => wpinv_wallet_encrypt( $amount ),
        'balance'  => wpinv_wallet_encrypt( $balance ),
        'currency' => $currency,
        'details'  => $details,
    );

    // Create the new record.
    $table = $wpdb->prefix . 'wpinv_wallet_transactions';
    $wpdb->insert( $table, $data );

    // Set the new balance.
    wpinv_wallet_set_user_balance( $user_id, $balance, $currency );

    // If the log is past the maximum allowed, remove the extra logs.
    $user_logs = wpinv_wallet_count_user_transactions( $user_id );
    $max_logs  = (int) wpinv_get_option( 'wpinv_wallet_transaction_count', 100 );

    if ( $max_logs > 0 && $user_logs > $max_logs ) {

        $to_delete = $user_logs - $max_logs;
        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM $table WHERE user_id=%d LIMIT %d",
                $user_id,
                $to_delete
            )
        );

    }

}
