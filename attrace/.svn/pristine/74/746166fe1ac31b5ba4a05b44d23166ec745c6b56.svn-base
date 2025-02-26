<?php

use Attrace\Connector\Util\Perf;
use Attrace\Connector\Util\Tracking;
use Attrace\Connector\Util\Util;

class Attr4ce_WooCommerce
{


    public function init()
    {
        //if no woocommerce do nothing
        if (!function_exists('WC')) {
            return;
        }
        add_action('woocommerce_thankyou_order_received_text', array($this, 'executeSaleAction'), 10, 2);
    }

    public function executeSaleAction($var, $order)
    {

        $cart_total = $order->get_total();

        //add woocommerce data to transactions
        $metadata = [
            'wc_id'        => $order->get_id(),
            'wc_order_key' => $order->get_order_key(),
        ];
        $tx       = Tracking::tryInvokeConversion($cart_total, $metadata);
        if (Util::isProfiling()) {
            echo "<pre>";
            foreach (Perf::returnLogs() as $logArray) {
                echo $logArray['ts'].': '.$logArray['log'].PHP_EOL;
            }
            echo "</pre>";
        }
        if (!$tx) {
            return;
        }


        //if m
        $order->update_meta_data('_attrace_hash', $tx->getHashBase32());
        $order->save();
    }
}