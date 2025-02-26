<?php
/**
 * Template for - Design-1
 *
 *
 * @version 1.2.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>
<div class="<?php echo esc_attr( $grid_cls ); ?> wpfpcolumns">
	<a class="wpfp-link-overlay" href="<?php the_permalink(); ?>"></a>
	<div class="wpfp-grid-content">
		<div class="wpfp-overlay">
			<div class="wpfp-image-bg" style="<?php echo esc_attr( $height_css ); ?>">
				<?php if( ! empty( $feat_image )) { ?>
				<img src="<?php echo esc_url( $feat_image ); ?>" alt="<?php the_title_attribute(); ?>" />
				<?php } ?>
			</div>

			<div class="wpfp-bottom-content">
				<?php if( $show_category_name && $cate_name != '' ) { ?>
					<div class="wpfp-categories"><?php echo wp_kses_post( $cate_name ); ?></div>
				<?php } ?>

				<div class="wpfp-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>

				<?php if( $show_date || $show_author ) { ?>
				<div class="wpfp-date">
					<?php if( $show_author ) { ?> <span><?php  esc_html_e( 'By', 'featured-post-creative' ); ?> <a href="<?php echo esc_url( get_author_posts_url( $post->post_author )); ?>"><?php the_author(); ?></a></span><?php }

					echo ( $show_author && $show_date ) ? '&nbsp;/&nbsp;' : '';

					if( $show_date ) { echo get_the_date(); } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>