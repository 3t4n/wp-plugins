<?php

use WooCommerce\NoFraud\Common\Debug;
use WooCommerce\NoFraud\Common\Database;
use WooCommerce\NoFraud\Payment\Transactions\Transaction_Manager;
use WooCommerce\NoFraud\Payment\Transactions\Transaction_Data_Collector;

function nf_handle_intuit_broadcast( $request_data, $response_data, $orig_obj ) {
    // Get Order/Post ID and save relevant details to metadata for collect() retrieval
    $order = $orig_obj->get_order();

    if ($order) {
        $order_id = $order->get_id();

        $metadata_payload_array = [];
        $body = json_decode($response_data['body'],true);
        $metadata_payload_array['number'] = $body['card']['number'];
        $metadata_payload_array['cardType'] = $body['card']['cardType'];
        $metadata_payload_array['expMonth'] = $body['card']['expMonth'];
        $metadata_payload_array['expYear'] = $body['card']['expYear'];
        $metadata_payload_array['avsZip'] = $body['avsZip'];
        $metadata_payload_array['avsStreet'] = $body['avsStreet'];
        $metadata_payload_array['cardSecurityCodeMatch'] = $body['cardSecurityCodeMatch'];

        Database::update_nf_data( $order_id, '_nofraud_intuit_broadcast_data', json_encode($metadata_payload_array) );
    }
}
add_action( 'wc_intuit_payments_credit_card_api_request_performed', 'nf_handle_intuit_broadcast', 10, 3 );

function nf_handle_vantiv_broadcast( $request_data, $response_data, $orig_obj ) {
    Debug::add_debug_message([
        'function' => 'nf_handle_vantiv_broadcast:init',
    ]);

    $output_array = [];
    preg_match('/<orderId>(.*?)<\/orderId>/', $response_data['body'], $output_array);

    if (!empty($output_array[1])) {
        $order_id = $output_array[1];

        Debug::add_debug_message([
            'function' => 'nf_handle_vantiv_broadcast:start',
            'order_id' => $order_id,
        ]);

        $metadata_payload_array = [];

        if (!empty($request_data['body'])) {
            $bodyXML = new SimpleXMLElement($request_data['body']);

            if (isset($bodyXML->sale->paypage->expDate)) {
                $metadata_payload_array['expDate'] = (string) $bodyXML->sale->paypage->expDate;
            }
            else {
                Debug::add_debug_message([
                    'function' => 'nf_handle_vantiv_broadcast:request data not found',
                    'order_id' => $order_id,
                ]);
            }
        }

        if (!empty($response_data['body'])) {
            $bodyXML = new SimpleXMLElement($response_data['body']);

            if (isset($bodyXML->saleResponse)) {
                $metadata_payload_array['avsResult'] = (string) $bodyXML->saleResponse->fraudResult->avsResult;
                $metadata_payload_array['cardValidationResult'] = (string) $bodyXML->saleResponse->fraudResult->cardValidationResult;
                $metadata_payload_array['bin'] = (string) $bodyXML->saleResponse->tokenResponse->bin;
                $metadata_payload_array['type'] = (string) $bodyXML->saleResponse->tokenResponse->type;
            }
            else {
                Debug::add_debug_message([
                    'function' => 'nf_handle_vantiv_broadcast:response data not found',
                    'order_id' => $order_id,
                ]);
            }
        }

        Database::update_nf_data( $order_id, '_nofraud_vantiv_broadcast_data', json_encode($metadata_payload_array) );

        Debug::add_debug_message([
            'function' => 'nf_handle_vantiv_broadcast:end',
            'order_id' => $order_id,
            'metadata_payload_array' => $metadata_payload_array,
        ]);
    }
}
add_action( 'wc_vantiv_credit_card_api_request_performed', 'nf_handle_vantiv_broadcast', 10, 3 );

function nf_handle_angeleye_payflow_broadcast( $order, $card, $token, $PayPalResult ) {
    if ($order) {
        $order_id = $order->get_id();

        $metadata_payload_array = [];

        $metadata_payload_array['bin'] = substr($card->number, 0, 6);
        $metadata_payload_array['last4'] = substr($card->number, -4);
        $metadata_payload_array['type'] = $card->type;
        $metadata_payload_array['cvc'] = $card->cvc;
        $metadata_payload_array['exp_month'] = $card->exp_month;
        $metadata_payload_array['exp_year'] = $card->exp_year;

        $metadata_payload_array['PROCCVV2'] = $PayPalResult['PROCCVV2'];
        $metadata_payload_array['PROCAVS'] = $PayPalResult['PROCAVS'];

        $metadata_payload_array['CVV2MATCH'] = $PayPalResult['CVV2MATCH'];
        $metadata_payload_array['AVSADDR'] = $PayPalResult['AVSADDR'];
        $metadata_payload_array['AVSZIP'] = $PayPalResult['AVSZIP'];

        Database::update_nf_data( $order_id, '_nofraud_angeleye_payflow_broadcast_data', json_encode($metadata_payload_array) );
    }
}
add_action( 'ae_add_custom_order_note', 'nf_handle_angeleye_payflow_broadcast', 10, 4 );

function nf_handle_pp_braintree_broadcast( $order, $transaction, $braintreeObj ) {
    Debug::add_debug_message([
        'function' => 'nf_handle_pp_braintree_broadcast:init',
        'order' => $order,
    ]);
    if ($order) {
        $order_id = $order->get_id();
        $transaction_jsonencoded = json_encode($transaction);
        $transaction_decoded = json_decode($transaction_jsonencoded, true);
        $broadcast_data = [
            'avsPostalCodeResponseCode' => @$transaction_decoded['avsPostalCodeResponseCode'],
            'avsStreetAddressResponseCode' => @$transaction_decoded['avsStreetAddressResponseCode'],
            'cvvResponseCode' => @$transaction_decoded['cvvResponseCode'],
            'bin' => @$transaction_decoded['creditCard']['bin'],
            'last4' => @$transaction_decoded['creditCard']['last4'],
            'cardType' => @$transaction_decoded['creditCard']['cardType'],
            'expirationMonth' => @$transaction_decoded['creditCard']['expirationMonth'],
            'expirationYear' => @$transaction_decoded['creditCard']['expirationYear'],
        ];

        Database::update_nf_data( $order_id, '_nofraud_pp_braintree_broadcast_data', json_encode($broadcast_data) );
    }
    Debug::add_debug_message([
        'function' => 'nf_handle_pp_braintree_broadcast:end',
    ]);
}
add_action( 'wc_braintree_save_order_meta', 'nf_handle_pp_braintree_broadcast', 10, 3 );

function nf_handle_bluesnap_broadcast( $order, $payment_method_data, $transaction ) {
    if ($order) {
        $order_id = $order->get_id();

        $metadata_payload_array = [];

        if (!empty($transaction['creditCard']) && is_array($transaction['creditCard'])) {
            $metadata_payload_array['cardTransactionType'] = !empty($transaction['creditCard']['cardTransactionType']) ? $transaction['creditCard']['cardTransactionType'] : null;
            $metadata_payload_array['bin'] = !empty($transaction['creditCard']['binNumber']) ? $transaction['creditCard']['binNumber'] : null;
            $metadata_payload_array['last4'] = !empty($transaction['creditCard']['cardLastFourDigits']) ? $transaction['creditCard']['cardLastFourDigits'] : null;
            $metadata_payload_array['type'] = !empty($transaction['creditCard']['cardType']) ? $transaction['creditCard']['cardType'] : null;
            $metadata_payload_array['expirationMonth'] = !empty($transaction['creditCard']['expirationMonth']) ? $transaction['creditCard']['expirationMonth'] : null;
            $metadata_payload_array['expirationYear'] = !empty($transaction['creditCard']['expirationYear']) ? $transaction['creditCard']['expirationYear'] : null;
        }

        if (!empty($transaction['processingInfo']) && is_array($transaction['processingInfo'])) {
            $metadata_payload_array['cvvResponseCode'] = !empty($transaction['processingInfo']['cvvResponseCode']) ? $transaction['processingInfo']['cvvResponseCode'] : null;
            $metadata_payload_array['avsResponseCodeZip'] = !empty($transaction['processingInfo']['avsResponseCodeZip']) ? $transaction['processingInfo']['avsResponseCodeZip'] : null;
            $metadata_payload_array['avsResponseCodeAddress'] = !empty($transaction['processingInfo']['avsResponseCodeAddress']) ? $transaction['processingInfo']['avsResponseCodeAddress'] : null;
        }

        Database::update_nf_data( $order_id, '_nofraud_bluesnap_broadcast_data', json_encode($metadata_payload_array) );

        Transaction_Data_Collector::$instance->collect($order_id);

        // try to evaluate transaction with collected data
        $transaction_manager = new Transaction_Manager();
        $transaction_review = $transaction_manager->evaluate_transaction($order_id);
    }
}
add_action( 'wc_gateway_bluesnap_new_card_payment_success', 'nf_handle_bluesnap_broadcast', 51, 3 );
add_action( 'wc_gateway_bluesnap_token_payment_success', 'nf_handle_bluesnap_broadcast', 51, 3 );

function nf_handle_cardknox_broadcast( $response, $order ) {
    Debug::add_debug_message([
        'function' => 'nf_handle_cardknox_broadcast:start',
    ]);

    if ($order) {
        $order_id = $order->get_id();

        Debug::add_debug_message([
            'function' => 'nf_handle_cardknox_broadcast:order',
            'order_id' => $order_id,
        ]);

        if (!empty($response['xResult'])) {
            $metadata_payload_array['last4'] = !empty($response['xMaskedCardNumber']) ? substr($response['xMaskedCardNumber'], -4) : null;
            $metadata_payload_array['xCardType'] = !empty($response['xCardType']) ? $response['xCardType'] : null;
            $metadata_payload_array['xExp'] = (!empty($response['xExp']) && strlen($response['xExp']) == 4) ? $response['xExp'] : null;
            $metadata_payload_array['expirationMonth'] = !empty($response['xExp']) ? substr($response['xExp'], 0, 2) : null;
            $metadata_payload_array['expirationYear'] = !empty($response['xExp']) ? substr($response['xExp'], -2) : null;
            $metadata_payload_array['xCvvResultCode'] = !empty($response['xCvvResultCode']) ? $response['xCvvResultCode'] : null;
            $metadata_payload_array['xAvsResultCode'] = !empty($response['xAvsResultCode']) ? $response['xAvsResultCode'] : null;

            Database::update_nf_data( $order_id, '_nofraud_cardknox_broadcast_data', json_encode($metadata_payload_array) );

            // try to evaluate transaction with collected data
            $transaction_manager = new Transaction_Manager();
            $transaction_review = $transaction_manager->evaluate_transaction($order_id);
        }
    }
    Debug::add_debug_message([
        'function' => 'nf_handle_cardknox_broadcast:end',
    ]);
}
add_action( 'wc_gateway_cardknox_process_response', 'nf_handle_cardknox_broadcast', 51, 3 );

function nf_extract_string_value($key, $data) {
    if (preg_match('/\[orderId\] => (\d+)/', $data, $matches)) {
        $value = $matches[1];

    }
}

function nf_handle_wc_braintree_credit_card_api_request_performed( $request_data, $response_data ) {

    Debug::add_debug_message([
        'function' => 'nf_handle_wc_braintree_credit_card_api_request_performed:entry',
    ], Debug::VERBOSITY_HIGH);

    if (!empty($request_data['uri']) && $request_data['uri'] == 'sale') {
        Debug::add_debug_message([
            'function' => 'nf_handle_wc_braintree_credit_card_api_request_performed:init',
        ]);

        // request_data and $response_data are basically print_r strings that were converted via to_string_safe()

        // try to tease out the order_id from the request_data string
        if (preg_match('/\[orderId\] => (\d+)/', $request_data['data'], $matches)) {
            $order_id = $matches[1];

            if (!empty($order_id)) {
                $order = wc_get_order($order_id);
                if ($order) {
                    if (!empty($response_data['data']) && strpos($response_data['data'], 'Braintree\Result\Successful') !== false) {
                        if (preg_match('/\[creditCard\] => Array\s*\((.*?)\n\s*\)/s', $response_data['data'], $matches)) {
                            $creditCardData = trim($matches[1]);
                            $creditCardArray = array();
                            // Use a regex to extract the key-value pairs inside the creditCard array
                            preg_match_all('/\[(.*?)\] => (.*?)(?=\n\s*\[|\))/s', $creditCardData, $keyValueMatches, PREG_SET_ORDER);
                            foreach ($keyValueMatches as $match) {
                                $key = trim($match[1]);
                                $value = trim($match[2]);
                                $creditCardArray[$key] = $value;
                            }

                            if (preg_match('/\[avsPostalCodeResponseCode\] => (\w+)/', $response_data['data'], $matches)) {
                                $creditCardArray['avsPostalCodeResponseCode'] = $matches[1];
                            }
                            if (preg_match('/\[avsStreetAddressResponseCode\] => (\w+)/', $response_data['data'], $matches)) {
                                $creditCardArray['avsStreetAddressResponseCode'] = $matches[1];
                            }
                            if (preg_match('/\[cvvResponseCode\] => (\w+)/', $response_data['data'], $matches)) {
                                $creditCardArray['cvvResponseCode'] = $matches[1];
                            }

                            $broadcast_data = [
                                'avsPostalCodeResponseCode' => @$creditCardArray['avsPostalCodeResponseCode'],
                                'avsStreetAddressResponseCode' => @$creditCardArray['avsStreetAddressResponseCode'],
                                'cvvResponseCode' => @$creditCardArray['cvvResponseCode'],
                                'bin' => @$creditCardArray['bin'],
                                'last4' => @$creditCardArray['last4'],
                                'cardType' => @$creditCardArray['cardType'],
                                'expirationMonth' => @$creditCardArray['expirationMonth'],
                                'expirationYear' => @$creditCardArray['expirationYear'],
                            ];

                            Database::update_nf_data( $order_id, '_nofraud_wc_braintree_broadcast_data', json_encode($broadcast_data) );
                        } else {
                            Debug::add_debug_message([
                                'function' => 'nf_handle_wc_braintree_credit_card_api_request_performed:errorextractingdata',
                            ]);
                        }
                    }
                    else {
                        Debug::add_debug_message([
                            'function' => 'nf_handle_wc_braintree_credit_card_api_request_performed:transactiondatanotfound',
                        ]);
                    }
                }
                else {
                    Debug::add_debug_message([
                        'function' => 'nf_handle_wc_braintree_credit_card_api_request_performed:ordernotfound',
                    ]);
                }
            }
            else {
                Debug::add_debug_message([
                    'function' => 'nf_handle_wc_braintree_credit_card_api_request_performed:orderidnotfound',
                ]);
            }
        }

        Debug::add_debug_message([
            'function' => 'nf_handle_wc_braintree_credit_card_api_request_performed:end',
        ]);
    }
}
add_action( 'wc_braintree_credit_card_api_request_performed', 'nf_handle_wc_braintree_credit_card_api_request_performed', 10, 2 );

function nf_handle_epay_api_broadcast( $request_data, $response_data ) {
    Debug::add_debug_message([
        'function' => 'nf_handle_epay_api_broadcast:start',
    ]);

    if (!empty($request_data['body'])) {
        $request_body = json_decode($request_data['body'], true);
        if (!empty($request_body['orderid'])) {
            $order_id = $request_body['orderid'];

            Debug::add_debug_message([
                'function' => 'nf_handle_epay_api_broadcast:order',
                'order_id' => $order_id,
            ]);

            if (!empty($response_data['body'])) {
                $response = json_decode($response_data['body'], true);
                if (!empty($response['creditcard'])) {
                    $metadata_payload_array['last4'] = !empty($response['creditcard']['number']) ? substr($response['creditcard']['number'], -4) : null;
                    $metadata_payload_array['cardType'] = !empty($response['creditcard']['type']) ? $response['creditcard']['type'] : null;
                    $metadata_payload_array['cvv_result_code'] = !empty($response['cvc']['result_code']) ? $response['cvc']['result_code'] : null;
                    $metadata_payload_array['avs_result_code'] = !empty($response['avs']['result_code']) ? $response['avs']['result_code'] : null;

                    Database::update_nf_data( $order_id, '_nofraud_epay_broadcast_data', json_encode($metadata_payload_array) );

                    // try to evaluate transaction with collected data
                    $transaction_manager = new Transaction_Manager();
                    $transaction_review = $transaction_manager->evaluate_transaction($order_id);
                }
                else {
                    Debug::add_debug_message([
                        'function' => 'nf_handle_epay_api_broadcast:noresponsedatafound',
                    ]);
                }
            }
            else {
                Debug::add_debug_message([
                    'function' => 'nf_handle_epay_api_broadcast:noresponsebodyfound',
                ]);
            }

        }
        else {
            Debug::add_debug_message([
                'function' => 'nf_handle_epay_api_broadcast:nodatafound',
            ]);
        }
    }
    else {
        Debug::add_debug_message([
            'function' => 'nf_handle_epay_api_broadcast:nobodydatafound',
        ]);
    }
    Debug::add_debug_message([
        'function' => 'nf_handle_epay_api_broadcast:end',
    ]);
}
add_action( 'wc_usa_epay_credit_card_api_request_performed', 'nf_handle_epay_api_broadcast', 51, 3 );
