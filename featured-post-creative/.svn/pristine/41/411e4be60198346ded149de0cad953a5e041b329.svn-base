<?php
/**
 * 'fpc_post_block' Shortcode
 * 
 * @package WP Featured Post
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function wpfp_featured_post( $atts, $content = null ) {

	// Shortcode Parameter
	extract(shortcode_atts(array(
								"limit"					=> 5,
								"category"				=> '',
								"design"				=> 'design-1',
								"show_author"			=> true,
								"show_date"				=> true,
								"show_category_name"	=> true,
								"order"					=> 'DESC',
								"orderby"				=> 'date',
								"image_height"			=> 500,
								'extra_class'			=> '',
								'className'				=> '',
								'align'					=> '',
	), $atts, 'fpc_post_block' ));

	$shortcode_designs	= wpfp_featured_post_designs();
	$limit				= ! empty( $limit )						? $limit					: 5;
	$category			= ! empty( $category )					? explode( ',',$category )	: '';
	$design				= ( $design && ( array_key_exists( trim( $design ), $shortcode_designs )))	? trim( $design )	: 'design-1';
	$show_date			= ( $show_date == 'true' )				? true						: false;
	$show_category_name	= ( $show_category_name == 'true' )		? true						: false;
	$show_author		= ( $show_author == 'true' )			? true						: false;
	$order				= ( strtolower( $order ) == 'asc' )		? 'ASC'						: 'DESC';
	$orderby			= ! empty( $orderby )					? $orderby					: 'date';
	$image_height		= ! empty( $image_height )				? $image_height				: 500;
	$align				= ! empty( $align )						? 'align'.$align			: '';
	$extra_class		= $extra_class .' '. $align .' '. $className;
	$extra_class		= wpfp_sanitize_html_classes( $extra_class );

	// Shortcode file
	$wpfp_design_file_path	= WPFP_DIR . '/templates/box-grid/' . $design . '.php';
	$design_file			= ( file_exists( $wpfp_design_file_path ))	? $wpfp_design_file_path	: '';

	global $post;

	// Taking some variables
	$i				= 1;
	$grid_count		= 1;
	$prefix			= WPFP_META_PREFIX; // Metabox prefix

	// Query Parameter
	$args = array (
				'post_type'				=> WPFP_POST_TYPE,
				'orderby'				=> $orderby,
				'order'					=> $order,
				'posts_per_page'		=> $limit,
				'ignore_sticky_posts'	=> 1,
			);

	// Meta Query
	$args['meta_query'] = array(
							array(
								'key'		=> $prefix.'featured_post',
								'value'		=> 1,
								'compare'	=> '=',
							)
						);

	// Category Parameter
	if( $category != "" ) {

		$args['tax_query'] = array(
								array(
									'taxonomy'	=> WPFP_CAT,
									'field'		=> 'id',
									'terms'		=> $category
								)
							);

	}

	// WP Query
	$query	= new WP_Query( $args );

	ob_start();

	// If post is there
	if ( $query->have_posts() ) { ?>

		<div class="wpfp-featured-post <?php echo esc_attr( $design ); ?> wpfp-clearfix <?php echo esc_attr( $extra_class ); ?>">

			<?php while ( $query->have_posts() ) : $query->the_post();

				$feat_image	= wpfp_get_post_featured_image( $post->ID, 'large' );
				$cate_name	= wpfp_get_post_cats( $post->ID, WPFP_CAT, 'self');

				// Include shortcode html file
				if( $design_file ) {
					include( $wpfp_design_file_path );
				}

				$i++;
				$grid_count++;

			endwhile; ?>

		</div><!-- end .wpfp-featured-post -->

	<?php } // End of if have posts

		wp_reset_postdata(); // Reset WP Query

		$content .= ob_get_clean();
		return $content;
}

// Featured Post shortcode
add_shortcode( 'fpc_post_block', 'wpfp_featured_post' );