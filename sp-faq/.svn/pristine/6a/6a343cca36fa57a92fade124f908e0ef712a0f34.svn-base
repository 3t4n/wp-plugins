<?php
/**
 * Shortcode File
 * Handles the 'sp_faq' shortcode of plugin
 *
 * @package WP FAQ
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * 'sp_faq' shortcode
 * 
 * @since 1.0.0
 */
function sp_faq_shortcode( $atts, $content = null ) {

	global $post;

	// SiteOrigin Page Builder Gutenberg Block Tweak - Do not Display Preview
	if( isset( $_POST['action'] ) && ( $_POST['action'] == 'so_panels_layout_block_preview' || $_POST['action'] == 'so_panels_builder_content_json' ) ) {
		return "[sp_faq]";
	}

	// Divi Frontend Builder - Do not Display Preview
	if( function_exists( 'et_core_is_fb_enabled' ) && isset( $_POST['is_fb_preview'] ) && isset( $_POST['shortcode'] ) ) {
		return '<div class="wp-faq-builder-shrt-prev">
					<div class="wp-faq-builder-shrt-title"><span>'.esc_html__('FAQ View - Shortcode', 'sp-faq').'</span></div>
					sp_faq
				</div>';
	}

	// Fusion Builder Live Editor - Do not Display Preview
	if( class_exists( 'FusionBuilder' ) && (( isset( $_GET['builder'] ) && $_GET['builder'] == 'true' ) || ( isset( $_POST['action'] ) && $_POST['action'] == 'get_shortcode_render' )) ) {
		return '<div class="wp-faq-builder-shrt-prev">
					<div class="wp-faq-builder-shrt-title"><span>'.esc_html__('FAQ View - Shortcode', 'sp-faq').'</span></div>
					sp_faq
				</div>';
	}

	extract( shortcode_atts(array(
		"limit"				=> -1,
		"category"			=> '',
		"single_open"		=> 'true',
		"transition_speed"	=> 300,
		'extra_class'		=> '',
		'className'			=> '',
		'align'				=> '',
		'dev_param_1'		=> '',
		'dev_param_2'		=> '',
	), $atts, 'sp_faq') );

	$limit				= ! empty( $limit )				? $limit					: -1;
	$category			= ! empty( $category )			? explode( ',', $category )	: '';
	$single_open		= ! empty( $single_open ) 		? $single_open 				: 'true';
	$transition_speed	= ! empty( $transition_speed ) 	? $transition_speed 		: 300;
	$align				= ! empty( $align )				? 'align'.$align			: '';
	$extra_class		= $extra_class .' '. $align .' '. $className;
	$extra_class		= wp_faq_sanitize_html_classes( $extra_class );
	$unique				= wp_faq_get_unique();

	// Enqueue JS
	wp_enqueue_script( 'wp-faq-public-script' );

	// FAQ Configuration
	$faq_conf = compact( 'single_open', 'transition_speed' );

	// WP Query Argument
	$args = array ( 
				'post_type'			=> WP_FAQ_POST_TYPE,
				'post_status'		=> array( 'publish' ),
				'posts_per_page'	=> $limit,
				'orderby'			=> 'date',
				'order'				=> 'DESC',
			);

	// Tax Query Variable
	if( $category != "" ) {
		$args['tax_query'] = array( 
								array( 
									'taxonomy'	=> 'faq_cat', 
									'field'		=> 'term_id', 
									'terms'		=> $category,
								) 
		);
	}

	ob_start();

	$query = new WP_Query( $args );

	//Get post type count
	$post_count	= $query->post_count;

	// If post is there
	if( $query->have_posts() ) { ?>
		<div class="faq-accordion <?php echo esc_attr( $extra_class ); ?>" id="faq-accordion-<?php echo esc_attr( $unique ); ?>" data-accordion-group data-conf="<?php echo htmlspecialchars( json_encode( $faq_conf ) ); ?>">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div data-accordion class="faq-main">
					<div data-control class="faq-title">
						<h4><?php the_title(); ?></h4>
					</div>
					<div data-content>
						<?php if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) {
							the_post_thumbnail( 'thumbnail' );
						} ?>
						<div class="faq-content"><?php the_content(); ?></div>
					</div>
				</div>
			<?php
			endwhile; ?>
		</div>
	<?php }

	// Reset query to prevent conflicts
	wp_reset_postdata();

	$content .= ob_get_clean();
	return $content;
}

// FAQ Shortcode
add_shortcode( "sp_faq", "sp_faq_shortcode" );