<?php

// Plugin: USA ePay for WooCommerce

namespace WooCommerce\NoFraud\Payment\Methods;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use WooCommerce\NoFraud\Common\Database;
use WooCommerce\NoFraud\Common\Gateways;
use WooCommerce\NoFraud\Common\Debug;

final class NoFraud_Usa_Epay_Credit_Card extends NoFraud_Payment_Method {

    /**
     * Mapping from AVS to NF result code.
     * https://help.usaepay.info/developer/reference/avs/
     *
     * @var array Mapping from AVS to NF result code.
     */
    const USAEPAY_AVS_RESULT_CODE_MAPPING = [
        'YYY' => 'Y',
        'NYZ' => 'Z',
        'YNA' => 'A',
        'NNN' => 'N',
        'YYX' => 'Y',
        'NYW' => 'Z',
        'GGG' => 'Y',
        'YGG' => 'Z',
    ];

    // CVV: https://help.usaepay.info/developer/reference/cvv2/

    /**
     * Constructor.
     */
    public function __construct() {

    }

    public function collect( $order_data, $payment_data ) {
        $transaction_data = parent::collect($order_data, $payment_data);

        Debug::add_debug_message([
            'function' => 'NoFraud_Usa_Epay_Credit_Card:collect():start',
            'order_id' => $order_data['id'],
            'transaction_id' => $order_data['transaction_id'],
        ]);

        if (empty(Gateways::NOFRAUD_SUPPORTED_GATEWAYS['usaepay']['enabled'])) {
            return $transaction_data;
        }

        //sanity check data
        if (
            empty($order_data['transaction_id'])
        ) {
            error_log('NoFraud error: NoFraud_Usa_Epay_Credit_Card collect(): Transaction ID missing from Order Data.');
            Debug::add_debug_message([
                'function' => 'NoFraud_Usa_Epay_Credit_Card:collect():error',
                'message' => 'NoFraud error: NoFraud_Usa_Epay_Credit_Card collect(): Transaction ID missing from Order Data.',
                'order_id' => $order_data['id'],
                'transaction_id' => $order_data['transaction_id'],
            ]);
            return $transaction_data;
        }

        $broadcast_data = Database::get_nf_data($order_data['id'], '_nofraud_epay_broadcast_data');

        // don't collect unless data is available
        if (empty($broadcast_data)) {
            return $transaction_data;
        }

        $order = wc_get_order( $order_data['id'] );
        if (!empty($order) && !is_bool($order)) {
            $transaction_data['cvvResultCode'] = 'U';

            if (!empty($broadcast_data['cvv_result_code'])) {
                $transaction_data['cvvResultCode'] = $broadcast_data['cvv_result_code'];
            }

            $transaction_data['avsResultCode'] = 'U';
            if (!empty($broadcast_data['avs_result_code'])) {
                if (!empty(self::USAEPAY_AVS_RESULT_CODE_MAPPING[$broadcast_data['avs_result_code']])) {
                    $transaction_data['avsResultCode'] = self::USAEPAY_AVS_RESULT_CODE_MAPPING[$broadcast_data['avs_result_code']];
                }
            }

            if (!empty($broadcast_data['cardType'])) {
                $transaction_data['payment']['creditCard']['cardType'] = $this->getSanitizedCardType($broadcast_data['cardType']);
            }

            $transaction_data['payment']['creditCard']['last4'] = $broadcast_data['last4'];

            $_wc_usa_epay_credit_card_card_expiry_date = $order->get_meta('_wc_usa_epay_credit_card_card_expiry_date', true);
            if (!empty($_wc_usa_epay_credit_card_card_expiry_date) && strlen($_wc_usa_epay_credit_card_card_expiry_date) == 5) {

                $transaction_data['payment']['creditCard']['expirationDate'] = sprintf("%02d%02d",substr($_wc_usa_epay_credit_card_card_expiry_date, -2), substr($_wc_usa_epay_credit_card_card_expiry_date, 0,2));
            }

            // Wipe stored broadcast transaction data
            $metadata_payload_array = ['processed' => true];
            Database::update_nf_data($order_data['id'],'_nofraud_epay_broadcast_data', json_encode($metadata_payload_array));
        }

        Debug::add_debug_message([
            'function' => 'NoFraud_Usa_Epay_Credit_Card:collect():end',
            'order_id' => $order_data['id'],
            'transaction_id' => $order_data['transaction_id'],
        ]);


        return $transaction_data;
    }

    // https://help.usaepay.info/developer/reference/cardtype/
    private function getSanitizedCardType($usaepay_card_type) {
        switch($usaepay_card_type) {
            case 'V':
                return "Visa";
            case 'M':
                return "MasterCard";
            case 'A':
                return "Amex";
            case 'DS':
                return "Discover";
            case 'J':
                return "JCB";
            case 'DN':
                return "DinersClub";
        }
        return null;
    }
}
