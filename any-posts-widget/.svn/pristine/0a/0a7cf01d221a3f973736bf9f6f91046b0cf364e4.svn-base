<?php
/**
 * Template part for post loop
 *
 * @package Any_Posts_Widget
 * @var array $instance Widget instance
 */

?>
<li <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post__image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<?php the_title( '<div class="post__title"><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">', '</a></div>' ); ?>
</li>
