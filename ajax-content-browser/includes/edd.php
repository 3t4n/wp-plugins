<?php
/**
 * Easy Digital Downloads Integration.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * EDD: Add price below item title.
 */
add_action( 'acb_eddproduct_after_title', 'acb_edd_add_price_html', 10 );
function acb_edd_add_price_html( $args = array() ) {
	acb_get_template( 'item-eddprice.php', $args );
}

/**
 * EDD: Add sales stats.
 */
add_action( 'acb_eddproduct_after_meta', 'acb_edd_add_sales_count', 10 );
function acb_edd_add_sales_count( $args = array() ) {
	global $post;
	$count = edd_get_download_sales_stats( $post->ID );
	?>
	<div class="acb-meta-data acb-sales acb-tip" data-tip="<?php esc_attr_e( 'Purchases', 'acb' ); ?>">
		<?php echo acb_svg( 'shopping-cart' ); ?>
		<?php echo acb_number_format( $count ); ?>
	</div>
	<?php
}