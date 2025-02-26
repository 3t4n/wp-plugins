<?php
/**
 * Custom Filters.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( $show_filters != 'no' ) : ?>
<div class="acb-filters">

	<?php do_action( 'acb_filters_top', $args ); ?>

	<?php
		// Search (at top)
		if ( $search_position !== 'bottom' ) :
			acb_get_template( 'acb-search.php', $args );
		endif;

		// Taxonomies.
		acb_get_template( 'acb-taxonomies.php', $args );

		// Price Filter.
		acb_get_template( 'acb-price-filter.php', $args );

		// Date Filter.
		acb_get_template( 'acb-date-filter.php', $args );

		// Search (at bottom)
		if ( $search_position === 'bottom' ) :
			acb_get_template( 'acb-search.php', $args );
		endif;
	?>

	<?php do_action( 'acb_filters_bottom', $args ); ?>

</div>
<?php endif; ?>