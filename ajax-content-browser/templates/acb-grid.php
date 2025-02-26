<?php
/**
 * Grid.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb-grid" <?php acb_print_grid_data( $args ); // This function escapes for safe output. ?>>

	<div class="acb-grid-sizer"></div>
	<div class="acb-gutter-sizer"></div>

	<?php
		if ( $the_acb->have_posts() ) :

			while ( $the_acb->have_posts() ) : $the_acb->the_post();

				acb_load_template( $args );

			endwhile;

		endif;

		wp_reset_query();
	?>

</div>