<?php

// Plugin: Braintree for WooCommerce Payment Gateway
// braintree_credit_card

namespace WooCommerce\NoFraud\Payment\Methods;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use WooCommerce\NoFraud\Common\Database;
use WooCommerce\NoFraud\Common\Gateways;
use WooCommerce\NoFraud\Common\CreditCardTypeDetector;
use WooCommerce\NoFraud\Common\Debug;

final class NoFraud_Braintree_Credit_Card extends NoFraud_Payment_Method {

    /**
     * Mapping from non-PROCCVV2 CVV to NF result code.
     *
     * @var array Mapping from CVV to NF result code.
     */
    const BRAINTREE_CVV_RESULT_CODE_MAPPING = [
        'M' => 'M',
        'N' => 'N',
        'U' => 'U',
    ];

    /**
     * Mapping from non-PROCAVS AVS to NF result code.
     *
     * @var array Mapping from AVS to NF result code.
     */
    const BRAINTREE_AVS_RESULT_CODE_MAPPING = [
        'M' => [
            'M' => 'Y', // Zip pass, Line pass.
            'N' => 'Z', // Zip pass, Line no pass.
            'U' => 'Z', // Zip pass, Line no pass.
        ],
        'N' => [
            'M' => 'A', // Zip no pass, Line pass.
            'N' => 'N', // Zip no pass, Line no pass.
            'U' => 'N', // Zip no pass, Line no pass.
        ],
        'U' => [
            'M' => 'A', // Zip unknown, Line pass.
            'N' => 'N', // Zip unknown, Line no pass.
            'U' => 'U', // Zip unknown, Line unknown.
        ],
    ];

    /**
     * Constructor.
     */
    public function __construct() {

    }

    public function collect( $order_data, $payment_data ) {
        $transaction_data = parent::collect($order_data, $payment_data);

        Debug::add_debug_message([
            'function' => 'NoFraud_Braintree_Credit_Card:collect():start',
            'order_id' => $order_data['id'],
            'transaction_id' => $order_data['transaction_id'],
        ]);

        if (empty(Gateways::NOFRAUD_SUPPORTED_GATEWAYS['braintree']['enabled'])) {
            return $transaction_data;
        }

        //sanity check data
        if (
            empty($order_data['transaction_id'])
        ) {
            error_log('NoFraud error: NoFraud_Braintree_Credit_Card collect(): Transaction ID missing from Order Data.');
            Debug::add_debug_message([
                'function' => 'NoFraud_Braintree_Credit_Card:collect():error',
                'message' => 'NoFraud error: NoFraud_Braintree_Credit_Card collect(): Transaction ID missing from Order Data.',
                'order_id' => $order_data['id'],
                'transaction_id' => $order_data['transaction_id'],
            ]);
            return $transaction_data;
        }

        $broadcast_data = Database::get_nf_data($order_data['id'], '_nofraud_wc_braintree_broadcast_data');

        if (!$broadcast_data) {
            sleep(1);

            // try again if race condition hit -- this should not happen though
            $broadcast_data = Database::get_nf_data($order_data['id'], '_nofraud_wc_braintree_broadcast_data');
            if (!$broadcast_data) {
                Debug::add_debug_message([
                    'function' => 'NoFraud_Braintree_Credit_Card:collect():notransactiondata',
                    'message' => 'Transaction data empty',
                    'order_id' => $order_data['id'],
                    'transaction_id' => $order_data['transaction_id'],
                ]);
                return $transaction_data;
            }
        }

        $transaction_data['cvvResultCode'] = 'U';

        if (!empty($broadcast_data['cvvResponseCode']) && $broadcast_data['cvvResponseCode'] != 'U') {
            $transaction_data['cvvResultCode'] = $broadcast_data['cvvResponseCode'];
        }
        else {
            if (!empty(self::BRAINTREE_CVV_RESULT_CODE_MAPPING[$broadcast_data['CVV2MATCH']])) {
                $transaction_data['cvvResultCode'] = self::BRAINTREE_CVV_RESULT_CODE_MAPPING[$broadcast_data['CVV2MATCH']];
            }
        }

        $transaction_data['avsResultCode'] = 'U';
        if (!empty(self::BRAINTREE_AVS_RESULT_CODE_MAPPING[$broadcast_data['avsPostalCodeResponseCode']][$broadcast_data['avsStreetAddressResponseCode']])) {
            $transaction_data['avsResultCode'] = self::BRAINTREE_AVS_RESULT_CODE_MAPPING[$broadcast_data['avsPostalCodeResponseCode']][$broadcast_data['avsStreetAddressResponseCode']];
        }

        $transaction_data['payment']['creditCard']['last4'] = $broadcast_data['last4'];
        $transaction_data['payment']['creditCard']['cardType'] = $broadcast_data['cardType'];
        $transaction_data['payment']['creditCard']['bin'] = $broadcast_data['bin'];
        $transaction_data['payment']['creditCard']['expirationDate'] = $broadcast_data['expirationMonth'] . substr($broadcast_data['expirationYear'],-2);

        // Wipe stored broadcast transaction data
        $metadata_payload_array = ['processed' => true];
        Database::update_nf_data($order_data['id'],'_nofraud_wc_braintree_broadcast_data', json_encode($metadata_payload_array));

        Debug::add_debug_message([
            'function' => 'NoFraud_Braintree_Credit_Card:collect():end',
            'order_id' => $order_data['id'],
            'transaction_id' => $order_data['transaction_id'],
        ]);


        return $transaction_data;
    }
}
