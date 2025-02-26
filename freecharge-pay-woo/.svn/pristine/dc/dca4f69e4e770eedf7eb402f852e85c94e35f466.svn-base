<?php
defined('ABSPATH') || exit;
//Refund Calss
class FCPGZ_WC_Gateway_Freecharge_Status
{
    /* * @var string merchantId for status */
    public static $merchantId;

    /* * @var string secertkey for checksum */
    public static $secertkey;

    /**
     * Get refund request args.
     * @param  WC_Order $order
     * @return array
     */
    public static function get_request($order,$txnID,$MTID)
    {
        $request = array(
            'txnReferenceId' => $txnID,
            'merchantTxnId' => $MTID,
            'merchantId' => self::$merchantId
        );
        $generator = new FcpgzSignatureGenerator(self::$secertkey);
        $request['signature'] = $generator->generateSignature($request);
        return apply_filters('fcpgz_woocommerce_freecharge_status_request', $request, $order);
    }

    /**
     * Refund an order via FreeCharge…
     * @param  WC_Order $order
     * @param  bool     $sandbox
     * @return array|wp_error The parsed response from freecharge, or a WP_Error object
     */

    public static function check_status_order($order,$txnID, $MTID,$sandbox=false)
    {
        try {
        if ($sandbox == true) {
            $statusurl = FCPGZ_SANDBOX.FCPGZ_STATUS;
        } else {
            $statusurl = FCPGZ_PROD.FCPGZ_STATUS;
        }

        $response = wp_safe_remote_post(
            $statusurl,
            array(
                'method' => 'POST',
                'headers' => array('content-type' => 'application/json'),
                'body' => wp_json_encode(self::get_request($order,$txnID,$MTID)),
                'user-agent' => 'WooCommerce',
            )
        );

        if (is_wp_error($response)) {
            return $response;
        }

        if (empty($response['body'])) {
            return new WP_Error('freecharge-status', 'Empty Response');
        }
        return json_decode(sanitize_textarea_field($response['body']), 1);
    }catch(Exception $e ) {
        return new WP_Error( 'error', sprintf( 'error', 'freecharge-pay-woo' ), ( $e ) );

    }
}

    /**
     * Get refund request args.
     * @param WC_Order $order
     * @return array
     */
    public static function get_pay_status_request($order, $MTID)
    {
        $request = array(
            'merchantTxnId' => $MTID,
            'merchantId' => self::$merchantId
        );
        $generator = new FcpgzSignatureGenerator(self::$secertkey);
        $request['signature'] = $generator->generateSignature($request);
        return apply_filters('fcpgz_woocommerce_freecharge_status_request', $request, $order);
    }

    /**
     * Refund an order via FreeCharge…
     * @param WC_Order $order
     * @param bool $sandbox
     * @return array|wp_error The parsed response from freecharge, or a WP_Error object
     */

    public static function check_status_order_pay($order, $MTID, $sandbox = false)
    {
        try {
            if ($sandbox == true) {
                $statusurl = FCPGZ_SANDBOX.FCPGZ_STATUS;
            } else {
                $statusurl = FCPGZ_PROD.FCPGZ_STATUS;
            }

            $response = wp_safe_remote_post(
                $statusurl,
                array(
                    'method' => 'POST',
                    'headers' => array('content-type' => 'application/json'),
                    'body' => wp_json_encode(self::get_pay_status_request($order, $MTID)),
                    'user-agent' => 'WooCommerce',
                )
            );

            if (is_wp_error($response)) {
                return $response;
            }

            if (empty($response['body'])) {
                return new WP_Error('freecharge-status', 'Empty Response');
            }
            return json_decode(sanitize_textarea_field($response['body']), 1);
        } catch (Exception $e) {
            return new WP_Error('error', sprintf('error', 'freecharge-pay-woo'), ($e));

        }
    }
}