<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @var $ambikly_cart Cart
 */


use Ambikly\Models\Cart;

global $ambikly_cart;

$cart_items = $ambikly_cart->getCartItems();

if (count($cart_items) < 1) {

    echo '<p>' . esc_html__('Your cart is empty.', 'ambikly') . '</p>';

    return;
}
?>

<div class="ambikly-cart-container">
    <?php
    ambikly_action_field('update_cart');
    ambikly_nonce_field('update_cart');
    ?>
    <?php
    ambikly_get_template('cart.table', ['cart_items' => $cart_items]);
    ?>
</div>