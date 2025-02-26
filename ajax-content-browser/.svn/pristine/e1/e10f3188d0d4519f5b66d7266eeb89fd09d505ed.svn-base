<?php
/**
 * WooCommerce - Price.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb-price">
	<div class="acb-price-data"><?php echo $product->get_price_html(); ?></div>
	<div class="acb-price-buy">
		<?php
			echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf(
					'<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="acb-button %s">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					$product->is_purchasable() ? 'add_to_cart_button product_type_simple ajax_add_to_cart' : '',
					! empty( $buy_now_text ) ? esc_html__( $buy_now_text, 'acb' ) : esc_html( $product->add_to_cart_text() )
				),
				$product
			);
		?>
	</div>
</div>