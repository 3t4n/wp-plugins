<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * TextMe Options Page
 *
 * Add options page for the plugin.
 *
 * @since 1.0
 */
function textme_options_page() {

	add_options_page(
		__( 'TextMe SMS', 'textme-sms-integration' ),
		__( 'TextMe SMS', 'textme-sms-integration' ),
		'manage_options',
		'textme_sms',
		'textme_options_page_ui'
	);

}

add_action( 'admin_menu', 'textme_options_page' );


/**
 * TextMe Options Page UI
 *
 * The view of the options page.
 *
 * @since 1.0
 */
function textme_options_page_ui() {

	include 'admin-ui.php';

}


function tetxme_update_option_page() {

    check_ajax_referer( 'textme-ajax-nonce', 'textmenonce' );

    parse_str( $_POST['data'], $result );

    $textme_option_param = [];
    foreach ( $result as $key => $value ) {
        $clean_key = sanitize_text_field( $key );
        $textme_option_param[$clean_key] = is_array( $value ) ? array_map( 'sanitize_textarea_field', $value ) : sanitize_textarea_field( $value );
    }

	update_option( 'textme_sms_option', $textme_option_param );
	die();

}

add_action( 'wp_ajax_tetxme_update_option_page', 'tetxme_update_option_page' );


function textme_update_account() {

    check_ajax_referer( 'textme-ajax-nonce', 'textmenonce' );

    parse_str($_POST['data'], $result );

    $textme_account = array_map('sanitize_text_field', $result );
	$sms_phone            = '0' . intval( $textme_account['sms_phone'] );
	$textme_account_param = array(
		'sms_user_name' => $textme_account['sms_user_name'],
		'sms_pass'      => $textme_account['sms_pass'],
		'sms_phone'     => $sms_phone,
		'sms_from'      => $textme_account['sms_from']
	);

	update_option( 'textme_sms_account', $textme_account_param );

	$sms     = new \textme\sms_geteway();
	$balance = $sms->get_balance();
	$arr     = array();

	if ( is_wp_error( $balance ) ) {
        $arr = [
            'Message' => $balance->get_error_message(),
            'Balance' => '0',
            'Status'  => 3
        ];
    } elseif ( $balance->status == 3 ) {
		$arr = [
			'Message' => __( 'Username or password is incorrect', 'textme-sms-integration' ),
			'Balance' => '0',
			'Status'  => (string)$balance->status
		];

	} elseif ( $balance->status == 0 ) {
		$arr = [
			'Message' => __( 'Username and password is correct', 'textme-sms-integration' ),
			'Balance' => (string)$balance->balance,
			'Status'  => (string)$balance->status
		];
	}

	echo json_encode( $arr );


	die();

}

add_action( 'wp_ajax_textme_update_account', 'textme_update_account' );
