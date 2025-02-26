<?php
/**
 * 'fpc_post_grid' Shortcode
 * 
 * @package WP Featured Post
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function wpfp_featured_post_grid( $atts, $content = null ) {

	// Shortcode Parameter
	extract(shortcode_atts(array(
								"limit"					=> 5,
								"grid"					=> 3,
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
	), $atts, 'fpc_post_grid'));

	$shortcode_designs	= wpfp_featured_post_designs();
	$limit				= ! empty( $limit )		? $limit							: 5;
	$grid				= ! empty( $grid )		? $grid								: 3;
	$category			= ! empty( $category )	? explode(',',$category)			: '';
	$design				= ( $design && ( array_key_exists( trim( $design ), $shortcode_designs ))) ? trim( $design )	: 'design-1';
	$show_date			= ( $show_date == 'true' )				? true				: false;
	$show_category_name	= ( $show_category_name == 'true' )		? true				: false;
	$show_author		= ( $show_author == 'true' )			? true				: false;
	$order				= ( strtolower( $order ) == 'asc' )		? 'ASC'				: 'DESC';
	$orderby			= ! empty( $orderby )					? $orderby			: 'date';
	$image_height		= ! empty( $image_height )				? $image_height		: 500;
	$height_css			= ( $image_height )						? 'height:'.$image_height.'px;' : '';
	$align				= ! empty( $align )						? 'align'.$align	: '';
	$extra_class		= $extra_class .' '. $align .' '. $className;
	$extra_class		= wpfp_sanitize_html_classes( $extra_class );

	// Shortcode file
	$wpfp_design_file_path	= WPFP_DIR . '/templates/grid/' . $design . '.php';
	$design_file			= ( file_exists( $wpfp_design_file_path ))	? $wpfp_design_file_path	: '';

	global $post;

	// Taking some variables
	$prefix	= WPFP_META_PREFIX; // Metabox prefix

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

		<div class="wpfp-featured-post-grid <?php echo esc_attr($design); ?> wpfp-clearfix <?php echo esc_attr($extra_class); ?>">

			<?php while ( $query->have_posts() ) : $query->the_post();

				$feat_image	= wpfp_get_post_featured_image( $post->ID, 'large' );
				$cate_name	= wpfp_get_post_cats( $post->ID, WPFP_CAT, 'self');

				// Grid Class
				$grid_cls 	= "wpfp-medium-4";
				if ( $grid == "1" ) {
					$grid_cls =	'wpfp-medium-12';
				} else if ( $grid == "2" ) {
					$grid_cls =	'wpfp-medium-6';
				} else if ( $grid == "3" ) {
					$grid_cls =	'wpfp-medium-4';
				} else if ( $grid == "4" ) {
					$grid_cls =	'wpfp-medium-3';
				}

				// Include shortcode html file
				if( $design_file ) {
					include( $wpfp_design_file_path );
				}

			endwhile; ?>

		</div><!-- end .wpfp-featured-post -->

	<?php } // End of if have posts

		wp_reset_postdata(); // Reset WP Query

		$content .= ob_get_clean();
		return $content;
}

// Featured Post shortcode
add_shortcode( 'fpc_post_grid', 'wpfp_featured_post_grid' );