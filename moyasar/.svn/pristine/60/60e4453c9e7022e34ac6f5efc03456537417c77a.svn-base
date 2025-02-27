<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Moyasar_Helper_Coupons
{

    private $cupon_prefix = 'mysr_';
    /**
     * @param WC_Order $order
     * @param array $payment
     * @return void
     */
    public static function tryApplyCoupon($order, $payment)
    {
        $helper = new Moyasar_Helper_Coupons();
        $helper->tryApplyCouponToOrder($order, $payment);
    }

    /**
     * @param WC_Order $order
     * @param array $payment
     * @return void
     */
    public function tryApplyCouponToOrder($order, $payment)
    {
        if (! isset($payment['metadata']['#coupon_id'])) {
            return;
        }

        $mysr_discount_percentage = $payment['metadata']['#coupon_discount'];

        $coupon = $this->getCoupon($this->cupon_prefix . $payment['metadata']['#coupon_code']);
        if (! $coupon) {
            $coupon = $this->makeCoupon($payment);
        }

        $coupon->set_usage_limit(99999);

        $max_discount_amount = $this->getMaxDiscountAllowedBeforeTax($order, $payment);
        $order_before_tax = $order->get_total() - $order->get_total_tax();
        $discount_amount = $order_before_tax * $mysr_discount_percentage / 100;
        // If the applied discount  is greater than #coupon_max_discount_amount then set the discount to the max discount
        if ($discount_amount > $max_discount_amount) {
            $coupon->set_discount_type('fixed_cart');
            $coupon->set_amount($max_discount_amount);
        }else{
            $coupon->set_discount_type('percent');
            $coupon->set_amount($payment['metadata']['#coupon_discount']);
        }

        $coupon->save();
        // Make sure Smart Coupons restrictions are disabled
        remove_all_filters('woocommerce_coupon_is_valid');

        moyasar_logger('Applying coupon ' . $coupon->get_code(), 'info', $order->get_id());

        $result = $order->apply_coupon($coupon);
        if ($result instanceof  WP_Error) {
            $result = $result->get_error_message();
            wc_add_notice($result, 'error');
        }

        moyasar_logger('Coupon applied', 'info', $order->get_id());

        // Ensure the coupon has 1 usage limit to prevent users from using it
        $coupon = new WC_Coupon($coupon->get_id());
        $coupon->set_usage_limit(1);
        $coupon->save();
    }

    private function getCoupon($code)
    {
        $coupon = new WC_Coupon($code);
        if (! $coupon->get_id()) {
            return null;
        }

        return $coupon;
    }

    private function makeCoupon($payment)
    {
        $coupon = new WC_Coupon();
        $coupon->set_code($this->cupon_prefix . $payment['metadata']['#coupon_code']);
        $coupon->set_status('publish');
        $coupon->set_discount_type('fixed_cart');
        $coupon->set_usage_limit(1);

        // Will update this later
        $coupon->set_amount(1);

        $coupon->save();

        return $coupon;
    }

        private function getMaxDiscountAllowedBeforeTax($order, $payment)
    {
        $max_amount = Moyasar_Currency_Helper::amount_to_major($payment['metadata']['#coupon_max_discount_amount'], $payment['currency']);
        // Deduct tax from the max amount if the prices do not include tax
        if ($order->get_prices_include_tax() === false && $order->get_total_tax() > 0) {
            $subtotal = (($order->get_total() - $order->get_total_tax()) * 100) / 100;
            $tax_percentage = ($order->get_total_tax() / $subtotal) * 100;
            $tax_percentage = $tax_percentage / 100;
            $max_amount = $max_amount / (1 + $tax_percentage);
        }
        return $max_amount;
    }
}
