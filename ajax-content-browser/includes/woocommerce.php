<?php
/**
 * WooCommerce Functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce add discount amount inside image.
 */
add_action( 'acb_wooproduct_inside_image', 'acb_woo_add_discount', 10 );
function acb_woo_add_discount( $args = array() ) {
	acb_woo_discount();
}

/**
 * Display the percentage of sale for Woo product.
 */
function acb_woo_discount() {
	global $product;
	if ( ! $product->is_on_sale() ) return;
	if ( $product->is_type( 'simple' ) ) {
		$max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
	} elseif ( $product->is_type( 'variable' ) ) {
		$max_percentage = 0;
		foreach ( $product->get_children() as $child_id ) {
			$variation = wc_get_product( $child_id );
			$price = $variation->get_regular_price();
			$sale = $variation->get_sale_price();
			if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
			if ( $percentage > $max_percentage ) {
				$max_percentage = $percentage;
			}
		}
	}
	if ( $max_percentage > 0 ) {
		echo '<span class="acb-discount">-' . round( $max_percentage ) . '%</span>';
	}
}

/**
 * WooCommerce: Add price below item title.
 */
add_action( 'acb_wooproduct_after_title', 'acb_woo_add_price_html', 10 );
function acb_woo_add_price_html( $args = array() ) {
	acb_get_template( 'item-wooprice.php', $args );
}

/**
 * WooCommerce: Add sales stats.
 */
add_action( 'acb_wooproduct_after_meta', 'acb_woo_add_sales_count', 10 );
function acb_woo_add_sales_count( $args = array() ) {
	global $post;
	$count = get_post_meta( $post->ID, 'total_sales', true );
	?>
	<div class="acb-meta-data acb-sales acb-tip" data-tip="<?php esc_attr_e( 'Purchases', 'acb' ); ?>">
		<?php echo acb_svg( 'shopping-cart' ); ?>
		<?php echo acb_number_format( $count ); ?>
	</div>
	<?php
}