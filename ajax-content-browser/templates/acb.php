<?php
/**
 * Main template for ACB.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb <?php if ( $show_filters == 'no' ) echo 'acb-no-filters'; ?>" id="acb-<?php echo sanitize_title( $id ); ?>" data-id="<?php echo sanitize_title( $id ); ?>">

	<?php acb_get_template( 'acb-filters.php', $args ); ?>

	<div class="acb-content">

		<?php acb_get_template( 'acb-sorting.php', $args ); ?>
		<?php acb_get_template( 'acb-tags.php', $args ); ?>
		<?php acb_get_template( 'acb-grid.php', $args ); ?>

	</div>

</div>