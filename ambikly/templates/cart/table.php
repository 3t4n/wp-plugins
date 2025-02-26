<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<table class="ambikly-cart-table">
    <thead>
    <tr>
        <th class="ambikly-cart-header"><?php echo esc_html__('Product', 'ambikly'); ?></th>
        <th class="ambikly-cart-header"><?php echo esc_html__('Price', 'ambikly'); ?></th>
        <th class="ambikly-cart-header"><?php echo esc_html__('Quantity', 'ambikly'); ?></th>
        <th class="ambikly-cart-header"><?php echo esc_html__('Total', 'ambikly'); ?></th>
        <th class="ambikly-cart-header"><?php echo esc_html__('Action', 'ambikly'); ?></th>
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
                <td class="ambikly-cart-item"><a
                            href="<?php echo esc_url(ambikly_permalink($product->getProductSlug())) ?>"><?php echo esc_html($product->getProductName()) ?></a>
                </td>
                <td class="ambikly-cart-item"><?php echo esc_html(ambikly_get_price($product->getFinalPrice())) ?></td>
                <td class="ambikly-cart-item">
                    <input type="number" value="<?php echo absint($quantity) ?>" min="1"
                           class="ambikly-cart-quantity"/>
                </td>
                <td class="ambikly-cart-item"><?php echo esc_html(ambikly_get_price($item_total)) ?></td>
                <td class="ambikly-cart-item">

                    <button class="ambikly-remove-button"><?php echo esc_html__('Remove', 'ambikly'); ?></button>
                </td>
            </tr>
        <?php }
    } ?>
    <tr>
        <td class="ambikly-cart-item" colspan="3"><?php echo esc_html__('Total:', 'ambikly'); ?></td>
        <td class="ambikly-cart-total"><?php echo esc_html(ambikly_get_price($cart_total)) ?></td>
        <td class="ambikly-cart-item">
            <a href="<?php echo esc_url(ambikly_get_checkout_page(true)) ?>"
               class="ambikly-checkout-button"><?php echo esc_html__('Checkout', 'ambikly'); ?></a>
        </td>
    </tr>
    </tbody>
</table>