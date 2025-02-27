<?php
/**
 * WordPress AJAX Routes.
 * WARNING: Do not use \WcGetnet::route()->all() here, otherwise you will override
 * ALL AJAX requests which you most likely do not want to do.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package WcGetnet
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle a custom ajax action, for example.
// phpcs:ignore
// \WcGetnet::route()->get()->where( 'ajax', 'my-custom-ajax-action' )->handle( 'ExampleController@ajax' );

add_action( 'wp_ajax_get_payment_status', [ \WcGetnet\Controllers\Ajax\OrderController::class, 'getPaymentStatusByPayId' ] );
add_action( 'wp_ajax_nopriv_get_payment_status', [ \WcGetnet\Controllers\Ajax\OrderController::class, 'getPaymentStatusByPayId' ] );

add_action( 'wp_ajax_create_pix_payment', [ \WcGetnet\Controllers\Ajax\OrderController::class, 'createPixPayment' ] );
add_action( 'wp_ajax_nopriv_create_pix_payment', [ \WcGetnet\Controllers\Ajax\OrderController::class, 'createPixPayment' ] );