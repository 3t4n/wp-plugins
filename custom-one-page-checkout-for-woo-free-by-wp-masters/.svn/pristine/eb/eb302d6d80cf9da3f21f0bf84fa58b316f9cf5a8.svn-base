<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>

<table class="product-table shop_table woocommerce-checkout-review-order-table">
    <caption class="visually-hidden">Shopping cart</caption>
    <thead class="product-table__header">
    <tr>
        <th scope="col"><span class="visually-hidden">Product image</span></th>
        <th scope="col"><span class="visually-hidden">Description</span></th>
        <th scope="col"><span class="visually-hidden">Quantity</span></th>
        <th scope="col"><span class="visually-hidden">Price</span></th>
    </tr>
    </thead>
    <tbody data-order-summary-section="line-items">
    <?php
        do_action( 'woocommerce_review_order_before_cart_contents' );

        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
    ?>
    <tr class="product <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
        <td class="product__image">
            <div class="product-thumbnail ">
                <div class="product-thumbnail__wrapper">
                    <img alt="<?php echo $_product->get_name(); ?>" class="product-thumbnail__image" src="<?php echo wp_get_attachment_url( $_product->get_image_id() ); ?>">
                </div>
                <span class="product-thumbnail__quantity" aria-hidden="true"><?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
            </div>
        </td>
        <th class="product__description" scope="row">
            <span class="product__description__name order-summary__emphasis"><?php echo $_product->get_name(); ?></span>
        </th>
        <td class="product__quantity">
            <span class="visually-hidden">
            <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </span>
        </td>
        <td class="product__price">
            <span class="order-summary__emphasis skeleton-while-loading"><?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
        </td>
    </tr>
    <?php
        }
            }
        do_action( 'woocommerce_review_order_after_cart_contents' );
    ?>

    </tbody>
</table>