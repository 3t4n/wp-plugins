<?php
/**
 * The item author byline.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( $show_author != 'no' || $show_time != 'no' ) : ?>

	<div class="acb-byline">

		<?php if ( $show_author != 'no' ) : ?>
		<div class="acb-author">
			<a href="#" class="acb-add-filter" data-filter="author" data-value="<?php echo get_the_author_meta( 'ID' ); ?>" data-label="<?php the_author(); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 32 ); ?><?php the_author(); ?></a>
		</div>
		<?php endif; ?>

		<?php if ( $show_time != 'no' ) : ?>
		<div class="acb-when acb-tip" data-tip="<?php echo sprintf( esc_attr__( '%1$s at %2$s', 'acb' ), get_the_date(), get_the_time() ); ?>"><?php echo esc_html( acb_posted_when() ); ?></div>
		<?php endif; ?>

	</div>

<?php endif; ?>