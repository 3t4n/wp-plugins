<?php

namespace Devurai\AcceptbluePaymentPro\Common;

use Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry;

class PaymentGatewayRegistrator
{

    public static function register_gateway(string $class_name): void
    {
        add_filter( 'woocommerce_payment_gateways', function ($methods) use ($class_name) {
            $methods[] = $class_name;

            return $methods;
        });
    }

    public static function register_gateway_block(string $gateway_block_class_name, string $gateway_id): void
    {
        add_action('woocommerce_blocks_payment_method_type_registration', function (PaymentMethodRegistry $payment_method_registry) use ($gateway_block_class_name, $gateway_id) {
            $gateways = WC()->payment_gateways->payment_gateways();
            if(isset($gateways[$gateway_id]) && class_exists($gateway_block_class_name)) {
                $payment_method_registry->register(new $gateway_block_class_name($gateways[$gateway_id]));
            }
        });
    }
}