<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage Author list.
 */
?>

<div class="author-info">
	<div class="author-avatar">
	<?php global $author_list_user;?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( $author_list_user->ID ) ); ?>" rel="author">
			<?php
			/**
			 * Filter the author bio avatar size.
			 *
			 * @param int $size The avatar height and width size in pixels.
			 */
			$author_bio_avatar_size = apply_filters( 'author_list_author_bio_avatar_size', 220 );

			echo get_avatar( $author_list_user->user_email , $author_bio_avatar_size );
			?>
		</a>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h3 class="author-title">
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( $author_list_user->ID ) ); ?>" rel="author">
				<?php echo $author_list_user->display_name; ?>
			</a>
		</h3>

		<div class="author-bio-link">
			<p class="author-bio"> <?php echo $author_list_user->description; ?> </p>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( $author_list_user->ID ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'author_list' ), $author_list_user->display_name ); ?>
			</a>
		</div><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
