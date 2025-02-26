<?php
/**
 * The item metadata.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb-meta">

	<?php
		/**
		 * This hook is to add custom stats.
		 */
		do_action( "acb_{$template}_before_meta", $args );
	?>

	<div class="acb-meta-data acb-views acb-tip" data-tip="<?php esc_attr_e( 'Views', 'acb' ); ?>">
		<?php echo acb_svg( 'eye' ); ?>
		<?php echo acb_number_format( acb_get_views() ); ?>
	</div>

	<div class="acb-meta-data acb-likes acb-tip" data-tip="<?php echo acb_user_has_liked( get_the_ID() ) ? esc_attr__( 'Unlike', 'acb' ) : esc_attr__( 'Like', 'acb' ); ?>" data-like="<?php esc_attr_e( 'Like', 'acb' ); ?>" data-unlike="<?php esc_attr_e( 'Unlike', 'acb' ); ?>">
		<a href="#" class="<?php echo esc_attr( acb_get_like_class() ); ?>" data-post_id="<?php the_ID(); ?>">
			<?php echo acb_svg( 'heart' ); ?>
			<span class="acb-like-ajax"><?php echo acb_number_format( acb_get_likes() ); ?></span>
		</a>
	</div>

	<?php if ( comments_open() ) : ?>
	<div class="acb-meta-data acb-comments acb-tip" data-tip="<?php esc_attr_e( 'Comments', 'acb' ); ?>">
		<?php echo acb_svg( 'message-square' ); ?>
		<?php echo acb_number_format( get_comments_number() ); ?>
	</div>
	<?php endif; ?>

	<?php
		/**
		 * This hook is to add custom stats.
		 */
		do_action( "acb_{$template}_after_meta", $args );
	?>

</div>