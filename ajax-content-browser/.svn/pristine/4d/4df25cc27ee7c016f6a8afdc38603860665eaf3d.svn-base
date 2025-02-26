<?php
/**
 * Price Filter.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( $price_filter != 'no' && in_array( 'product', $post_type ) || in_array( 'download', $post_type ) ) : ?>
<div class="acb-filter" data-filter="price">

	<button class="acb-filter-header acb-<?php echo acb_toggle_state( $args, 'price' ); ?>">
		<?php esc_html_e( 'Filter by price', 'acb' ); ?>
		<span class="acb-filter-down"><?php echo acb_svg( 'chevron-down' ); ?></span>
		<span class="acb-filter-up"><?php echo acb_svg( 'chevron-up' ); ?></span>
	</button>

	<div class="acb-filter-price acb-filter-ul" <?php if ( acb_toggle_state( $args, 'price' ) === 'minimized' ) echo 'style="display:none;"'; ?>>
		<div class="acb-filter-price-from">
			<span><?php echo esc_html( acb_get_currency( $post_type ) ); ?></span>
			<input type="text" min="0" value="" id="acb_price_min" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
		</div>
		<span class="acb-filter-price-sep">-</span>
		<div class="acb-filter-price-to">
			<span><?php echo esc_html( acb_get_currency( $post_type ) ); ?></span>
			<input type="text" min="0" value="" id="acb_price_max" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
		</div>
		<button type="button" class="acb-add-filter acb-price-input--js" data-filter="price" data-value="" data-label="" data-currency="<?php echo esc_attr( acb_get_currency( $post_type ) ); ?>"><?php echo acb_svg( 'chevron-right' ); ?></button>
	</div>

</div>
<?php endif; ?>