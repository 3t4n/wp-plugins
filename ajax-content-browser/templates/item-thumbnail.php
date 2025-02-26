<?php
/**
 * The item thumbnail.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( has_post_thumbnail() && $show_thumbnail !== 'no' ) : ?>

	<div class="acb-thumb">
		<a href="<?php echo get_permalink(); ?>" class="acb-thumb-permalink">
			<?php the_post_thumbnail(); ?>
			<span class="acb-thumb-overlay"></span>
			<?php
				/**
				 * This hook allow custom stuff to be added over the image.
				 */
				do_action( "acb_{$template}_inside_image", $args );
			?>
		</a>
	</div>

<?php else : ?>

	<div class="acb-thumb">
		<a href="<?php echo get_permalink(); ?>" class="acb-thumb-permalink">
			<div class="acb-thumb-placeholder" style="min-height:90px;background:<?php echo acb_random_color(); ?>;"></div>
			<span class="acb-thumb-overlay"></span>
			<?php
				/**
				 * This hook allow custom stuff to be added over the image.
				 */
				do_action( "acb_{$template}_inside_image", $args );
			?>
		</a>
	</div>

<?php endif; ?>