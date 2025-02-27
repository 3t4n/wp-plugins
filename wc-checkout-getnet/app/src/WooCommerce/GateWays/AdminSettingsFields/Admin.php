<?php

namespace WcGetnet\WooCommerce\GateWays\AdminSettingsFields;

use CoffeeCode\WPEmerge\ServiceProviders\ServiceProviderInterface;

class Admin implements ServiceProviderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
       add_action( 'woocommerce_admin_order_totals_after_total', [$this, 'admin_order_totals_after_total'] );
	}

    /**
     * Admin Order Totals After Total
     */
    public function admin_order_totals_after_total($order_id)
    {
        $order = new \WC_Order($order_id);

        if (!$order->get_meta('_getnet_request')) {
            return;
        }

        $paymentRequest = arrayToObject( $order->get_meta('_getnet_request') );

        if (!isset($paymentRequest) && !isset($paymentRequest->data) ) {
            return;
        }

        if (!isset($paymentRequest->data->payment)) {
            return;
        }

        if (!isset($paymentRequest->data->payment->number_installments)) {
            return;
        }

        $number_installments = $paymentRequest->data->payment->number_installments;

        if (!isset($number_installments) || $number_installments <= 1 ) {
            return;
        }

        echo '<tr><td colspan="1"><span class="description">Parcelado em ' . $number_installments . 'x</span></td><td width="1%"></td><td class="total"></td></tr>';
    }
}
