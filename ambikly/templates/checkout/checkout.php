<?php
if (!defined('ABSPATH')) {
    exit;
}

use Ambikly\Forms\CheckoutForm;
use Ambikly\Forms\ContactForm;

global $ambikly_cart;

$cart_items = $ambikly_cart->getCartItems();
$billing_form = new CheckoutForm();
$contact_form = new ContactForm();

if (count($cart_items) < 1) {

    echo '<p>' . esc_html__('Your cart is empty.', 'ambikly') . '</p>';

    return;
}

?>
<div class="ambikly-checkout">
    <div class="ambikly-checkout-wrapper">
        <!-- Billing and Shipping Details (Left) -->
        <div class="ambikly-checkout-form-section">

            <form class="ambikly-checkout-form" method="post">
                <h3><?php echo esc_html__('Contact information', 'ambikly'); ?></h3>
                <p><?php echo esc_html__('We\'ll use this email to send you details and updates about your order.', 'ambikly'); ?></p>
                <!-- Contact Section with Email -->
                <div class="ambikly-contact-fields">
                    <?php $contact_form->render_form(); ?>
                </div>

                <h3><?php echo esc_html__('Billing address', 'ambikly'); ?></h3>
                <p><?php echo esc_html__('Enter the billing address that matches your payment method.', 'ambikly'); ?></p>

                <div class="ambikly-billing-fields">
                    <?php $billing_form->render_form(); ?>
                </div>

                <!-- Payment Section below Billing -->
                <?php
                ambikly_get_template('checkout.payment-gateways');
                ?>
                <!-- Checkout Button (Inside Left Section) -->
                <div class="ambikly-checkout-footer">
                    <button type="submit" class="ambikly-place-order-button">Place Order</button>
                    <?php
                    ambikly_action_field('checkout');
                    ambikly_nonce_field('checkout');
                    ?>
                </div>
            </form>
        </div>

        <!-- Order Summary (Right) -->
        <div class="ambikly-checkout-summary-section">
            <h3><?php echo esc_html__('Order Summary', 'ambikly'); ?></h3>
            <table class="ambikly-order-summary">
                <thead>
                <tr>
                    <th><?php echo esc_html__('Product', 'ambikly'); ?></th>
                    <th><?php echo esc_html__('Quantity', 'ambikly'); ?></th>
                    <th><?php echo esc_html__('Price', 'ambikly'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $cart_total = 0;

                if (count($cart_items) > 0) {

                    foreach ($cart_items as $item_id => $item_data) {
                        /**
                         * @var $product \Ambikly\Models\Product
                         */
                        $product = $item_data['product'] ? $item_data['product'] : false;
                        $quantity = $item_data['quantity'] ? $item_data['quantity'] : false;
                        $item_total = $item_data['item_total'] ? $item_data['item_total'] : false;
                        $cart_total += floatval($item_total);
                        ?>
                        <tr data-product-id="<?php echo absint($product->getID()) ?>">
                            <td>
                                <a href="<?php echo esc_url(ambikly_permalink($product->getProductSlug())) ?>"><?php echo esc_html($product->getProductName()) ?></a>
                            </td>
                            <td><?php echo absint($quantity) ?></td>
                            <td><?php echo esc_html(ambikly_get_price($item_total)) ?></td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Subtotal</td>
                    <td><?php echo esc_html(ambikly_get_price($cart_total)) ?></td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td><strong><?php echo esc_html(ambikly_get_price($cart_total)) ?></strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
