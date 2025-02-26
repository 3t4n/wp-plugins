<?php
/**
 * Template for Bx Slider Post Design 1
 *
 * @package SlidersPack - All In One Image Sliders
 * @since 1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="bx-slide">
	<?php if( $fancy_box && $post_image ) { ?>
		<a class="wp-spaios-img-link" href="<?php echo esc_url( $post_image ); ?>" data-fancybox="wordpress-post" data-options="<?php echo htmlspecialchars(json_encode( $fancy_conf )); ?>">
			<img class="wp-spaios-slider-image" src="<?php echo esc_url( $post_image ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
		</a>
	<?php } elseif( $post_image ) { ?>
		<a class="wp-spaios-img-link" href="<?php echo esc_url( $post_link ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
			<img class="wp-spaios-slider-image" src="<?php echo esc_url( $post_image ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
		</a>
	<?php }

	if( $show_title || $show_content || $show_category ) { ?>
		<div class="wp-spaios-content-wrp">
			<?php if( $show_category ) { ?>
				<div class="wp-spaios-cat"><?php echo wp_kses_post($cat_name); ?></div>
			<?php }

			if( $show_title ) { ?>
				<div class="wp-spaios-title">
					<a href="<?php echo esc_url( $post_link ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo wp_kses_post($post_title); ?></a>
				</div>
			<?php }

			if( $show_content ) { ?>
				<div class="wp-spaios-content"><?php echo wp_kses_post($post_content); ?></div>
			<?php }

			if( $show_readmore ) { ?>
				<a class="wp-spaios-readmore-btn" href="<?php echo esc_url( $post_link ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo wp_kses_post($readmore_text); ?></a>
			<?php } ?>
		</div>
	<?php } ?>
</div>