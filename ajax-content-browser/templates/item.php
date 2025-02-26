<?php
/**
 * Post.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb-grid-item acb-item acb-item-<?php echo esc_attr( $post_type ); ?> acb-item-<?php echo esc_attr( $template ); ?>" id="acb-item-<?php the_ID(); ?>">

	<?php
		// Shows the item featured image.
		acb_get_template( 'item-thumbnail.php', $args );
	?>

	<div class="acb-card">

		<?php
			// Item author and post date.
			acb_get_template( 'item-author.php', $args );

			// Item title.
			acb_get_template( 'item-title.php', $args );

			// Item tags.
			acb_get_template( 'item-tags.php', $args );

			// Item metadata e.g. views, likes.
			acb_get_template( 'item-metadata.php', $args );
		?>

	</div>

</div>