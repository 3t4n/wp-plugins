<?php
/**
 * The search form.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $show_search != 'no' ) :
?>

<div class="acb-filter acb-filter-search <?php echo esc_attr( $search_position ); ?>" data-filter="search">
	<div class="acb-search">
		<input type="text" value="" placeholder="<?php esc_attr_e( 'Type to search...', 'acb' ); ?>" class="acb-input acb-add-filter" data-filter="s" data-value="" data-label="" />
		<button type="submit"><?php echo acb_svg( 'search' ); ?></button>
	</div>
</div>

<?php endif; ?>