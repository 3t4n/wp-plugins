<?php
defined('ABSPATH') || exit;
class FCPGZ_WC_Gateway_Freecharge_Refund
{
    public static $merchantId;

    public static $secertkey;

    /**
     * Get refund request args.
     * @param  WC_Order $order
     * @param  float    $amount
     * @return array
     */
    public static function get_request($order, $amount = null)
    {
        $merchantRefundTxnId = $order->get_id() . '_' . time();
        $request = array(
            'txnReferenceId' => $order->get_transaction_id(),
            'merchantRefundTxnId' => $merchantRefundTxnId,
            'merchantId' => self::$merchantId,
            'refundAmount' => $amount,
            'currency' => 'INR'
        );
        fcpgz_update_merchant_refund_reference($order->get_id(), $merchantRefundTxnId);
        $generator = new FcpgzSignatureGenerator(self::$secertkey);
        $request['signature'] = $generator->generateSignature($request);
        return apply_filters('fcpgz_woocommerce_freecharge_refund_request', $request, $order, $amount);
    }

    /**
     * Refund an order via FreeCharge…
     * @param  WC_Order $order
     * @param  float    $amount
     * @param  bool     $sandbox
     * @return array|wp_error The parsed response from freecharge, or a WP_Error object
     */

    public static function refund_order($order, $amount = null, $sandbox = false)
    {
        if ($sandbox == true) {
            $refundurl = FCPGZ_SANDBOX.FCPGZ_REFUND;
        } else {
            $refundurl = FCPGZ_PROD.FCPGZ_REFUND;
        }
        
        $response = wp_safe_remote_post(
            $refundurl,
            array(
                'method' => 'POST',
                'headers' => array('content-type' => 'application/json'),
                'body' => wp_json_encode(self::get_request($order, $amount)),
                'user-agent' => 'WooCommerce',
            )
        );
        if (is_wp_error($response)) {
            return $response;
        }

        if (empty($response['body'])) {
            return new WP_Error('freecharge-refunds', 'Empty Response');
        }
        $response_array = json_decode(sanitize_textarea_field($response['body']), 1);
        return $response_array;
    }
}