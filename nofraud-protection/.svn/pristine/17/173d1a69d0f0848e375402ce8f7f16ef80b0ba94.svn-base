<?php

// Plugin: SquareSync for Woo

namespace WooCommerce\NoFraud\Payment\Methods;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use WooCommerce\NoFraud\Common\Debug;

final class NoFraud_Squaresync_Credit extends NoFraud_Payment_Method {

    /**
     * Mapping from Square CVC status code to CVV checking status.
     *
     * @var array Mapping from Square CVC status code to CVV checking status.
     */
    const SQUARE_CVC_STATUS_MAPPING = [
        'CVV_ACCEPTED' => true,
        'CVV_REJECTED' => false,
    ];

    /**
     * Mapping from Square AVS status code to AVS checking status.
     *
     * @var array Mapping from Square AVS status code to AVS checking status.
     */
    const SQUARE_AVS_STATUS_MAPPING = [
        'AVS_ACCEPTED' => true,
        'AVS_REJECTED' => false,
    ];

    /**
     * Constructor.
     */
    public function __construct() {

    }

    public function collect( $order_data, $payment_data ) {
        $transaction_data = parent::collect($order_data, $payment_data);

        Debug::add_debug_message([
            'function' => 'NoFraud_Squaresync_Credit:collect():start',
            'order_id' => $order_data['id'],
            'transaction_id' => $order_data['transaction_id'],
        ]);

        $order = wc_get_order( $order_data['id'] );
        if (!empty($order) && !is_bool($order)) {
            $square_data = $order->get_meta( 'square_data', true );

            if (!empty($square_data)) {
                $square_data = json_decode($square_data, true);

                if (!empty($square_data['payment']['data']['payment']['card_details']['card']['card_brand'])) {
                    $transaction_data['payment']['creditCard']['cardType'] = $square_data['payment']['data']['payment']['card_details']['card']['card_brand'];
                    $transaction_data['payment']['creditCard']['last4'] = $square_data['payment']['data']['payment']['card_details']['card']['last_4'];

                    $month = str_pad($square_data['payment']['data']['payment']['card_details']['card']['exp_month'], 2, '0', STR_PAD_LEFT);
                    $year = substr($square_data['payment']['data']['payment']['card_details']['card']['exp_year'], -2);
                    $transaction_data['payment']['creditCard']['expirationDate'] = sanitize_text_field($month . $year);

                    $transaction_data['payment']['creditCard']['bin'] = $square_data['payment']['data']['payment']['card_details']['card']['bin'];

                    // See https://developer.squareup.com/reference/square/objects/CardPaymentDetails.
                    // Available Square CVV statuses are: `CVV_ACCEPTED`, `CVV_REJECTED`, or `CVV_NOT_CHECKED`.
                    if (isset($square_data['payment']['data']['payment']['card_details']['cvv_status']) && isset(self::SQUARE_CVC_STATUS_MAPPING[$square_data['payment']['data']['payment']['card_details']['cvv_status']])) {
                        $cvv_check = self::SQUARE_CVC_STATUS_MAPPING[$square_data['payment']['data']['payment']['card_details']['cvv_status']];
                        if (isset($cvv_check) && isset(self::CVC_RESULT_CODE_MAPPING[$cvv_check])) {
                            $transaction_data['cvvResultCode'] = self::CVC_RESULT_CODE_MAPPING[$cvv_check];
                        }
                    }

                    // Available Square AVS statuses are: `AVS_ACCEPTED`, `AVS_REJECTED`, or `AVS_NOT_CHECKED`.
                    if (isset($square_data['payment']['data']['payment']['card_details']['avs_status']) && isset(self::SQUARE_AVS_STATUS_MAPPING[$square_data['payment']['data']['payment']['card_details']['avs_status']])) {
                        $avs_check = self::SQUARE_AVS_STATUS_MAPPING[$square_data['payment']['data']['payment']['card_details']['avs_status']];
                        if (isset($avs_check) && isset(self::AVS_RESULT_CODE_MAPPING[$avs_check][$avs_check])) {
                            $transaction_data['avsResultCode'] = self::AVS_RESULT_CODE_MAPPING[$avs_check][$avs_check];
                        }
                    }
                }
            }
        }

        return $transaction_data;
    }
}
