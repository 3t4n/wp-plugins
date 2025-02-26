<?php
/**
 * Shows an order item.
 * A copy from woocommerce\includes\admin\meta-boxes\views\html-order-item.php
 *
 * @var object $item The item being displayed
 * @var int $itemID The id of the item being displayed
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$product  		= $order->get_product_from_item( $item );
$productLink 	= $product ? admin_url( 'post.php?post=' . absint( ERR_Functions::errGetProductID( $product ) ) . '&action=edit' ) : '';
$thumbnail     	= $product ? apply_filters( 'err_order_item_thumbnail', $product->get_image( array( 50, 50 ) ), $itemID, $item ) : '';
$itemTotal   	= ( isset( $item[ 'line_total' ] ) ) ? esc_attr( wc_format_localized_price( $item[ 'line_total' ] ) ) : '';
$itemSubtotal 	= ( isset( $item[ 'line_subtotal' ] ) ) ? esc_attr( wc_format_localized_price( $item[ 'line_subtotal' ] ) ) : '';
$itemRowClass   = apply_filters( 'err_order_item_class', 'cart_item', $item, $order ); ?>

<tr class="item <?php echo $itemRowClass; ?>" data-order_item_id="<?php echo $itemID; ?>">
	<td class="thumb"><?php
			echo '<div class="err-order-item-thumbnail">' . wp_kses_post( $thumbnail ) . '</div>'; ?>
	</td>
	<td class="name" data-sort-value="<?php echo esc_attr( $item['name'] ); ?>"><?php
		echo $productLink ? '<a href="' . esc_url( $productLink ) . '" class="err-order-item-name">' .  esc_html( $item['name'] ) . '</a>' : '<div class="class="err-order-item-name"">' . esc_html( $item['name'] ) . '</div>';

		if ( $product && $product->get_sku() ) {
			echo '<div class="err-order-item-sku"><b>' . __( 'SKU:', 'easy-review-reminders' ) . '</b> ' . esc_html( $product->get_sku() ) . '</div>';
		}

		if ( ! empty( $item[ 'variation_id' ] ) ) {
			echo '<div class="err-order-item-variation"><b>' . __( 'Variation ID:', 'easy-review-reminders' ) . '</b> ';
			if ( ! empty( $item[ 'variation_id' ] ) && 'product_variation' === get_post_type( $item[ 'variation_id' ] ) ) {
				echo esc_html( $item[ 'variation_id' ] );
			} elseif ( ! empty( $item[ 'variation_id' ] ) ) {
				echo esc_html( $item[ 'variation_id' ] ) . ' (' . __( 'No longer exists', 'easy-review-reminders' ) . ')';
			}
			echo '</div>';
		}

		do_action( 'err_before_order_itemmeta', $itemID, $item, $product );

		include( 'html-order-item-meta.php' );

		do_action( 'err_after_order_itemmeta', $itemID, $item, $product ) ?>

	</td>

	<?php do_action( 'err_order_item_values', $product, $item, absint( $itemID ) ); ?>

	<td class="item_cost" width="8%" data-sort-value="<?php echo esc_attr( $order->get_item_subtotal( $item, false, true ) ); ?>">
		<div class="view"><?php

			if ( isset( $item[ 'line_total' ] ) ) {
				echo wc_price( $order->get_item_total( $item, false, true ), array( 'currency' => ERR_Functions::errGetOrderCurrency( $order ) ) );

				if ( isset( $item[ 'line_subtotal' ] ) && $item[ 'line_subtotal' ] != $item[ 'line_total' ] ) {
					echo '<span class="err-order-item-discount">-' . wc_price( wc_format_decimal( $order->get_item_subtotal( $item, false, false ) - $order->get_item_total( $item, false, false ), '' ), array( 'currency' => ERR_Functions::errGetOrderCurrency( $order ) ) ) . '</span>';
				}
			} ?>
		</div>
	</td>
	<td class="quantity" width="8%">
		<div class="view"><?php

			echo '<small class="times">&times;</small> ' . ( isset( $item[ 'qty' ] ) ? esc_html( $item[ 'qty' ] ) : '1' );

			if ( $refunded_qty = $order->get_qty_refunded_for_item( $itemID ) ) {
				echo '<small class="refunded">' . ( $refunded_qty * -1 ) . '</small>';
			} ?>

		</div>
	</td>
	<td class="line_cost" width="8%" data-sort-value="<?php echo esc_attr( isset( $item['line_total'] ) ? $item['line_total'] : '' ); ?>">
		<div class="view"><?php
			if ( isset( $item[ 'line_total' ] ) ) {
				echo wc_price( $item[ 'line_total' ], array( 'currency' => ERR_Functions::errGetOrderCurrency( $order ) ) );
			}

			if ( isset( $item[ 'line_subtotal' ] ) && $item[ 'line_subtotal' ] !== $item[ 'line_total' ] ) {
				echo '<span class="err-order-item-discount">-' . wc_price( wc_format_decimal( $item[ 'line_subtotal' ] - $item[ 'line_total' ], '' ), array( 'currency' => ERR_Functions::errGetOrderCurrency( $order ) ) ) . '</span>';
			}

			if ( $refunded = $order->get_total_refunded_for_item( $itemID ) ) {
				echo '<small class="refunded">' . wc_price( $refunded, array( 'currency' => ERR_Functions::errGetOrderCurrency( $order ) ) ) . '</small>';
			} ?>
		</div>
	</td>
</tr>
