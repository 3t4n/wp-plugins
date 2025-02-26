<?php
/**
 * Register a [portfolio] shortcode.
 *
 * @package     portfolio-cpt
 * @copyright   Copyright (c) 2018, Danny Cooper
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Create shortcode.
add_shortcode( 'portfolio', 'portfolio_cpt_shortcode' );

/**
 * Register the shortcode.
 *
 * @param array $atts User definited attributes.
 */
function portfolio_cpt_shortcode( $atts ) {

	// See WP_Term_Query::__construct() for information on accepted arguments.
	$a = shortcode_atts( array(
		'tags'          => false,
		'hide_titles'   => 'false',
		'hide_tags'     => 'false',
		'image_size'    => 'portfolio-cpt-750',
		'count'         => 100,
		'items_per_row' => 4,
		'orderby'       => 'modified',
		'style'         => 'default',
		'overlay'       => 'false',
	), $atts );

	$return = '';

	$overlay_class = ( 'true' === $a['overlay'] ) ? ' details-overlay' : '';

	$return .= '<div class="portfolio style-' . esc_attr( $a['style'] ) . ' columns-' . absint( $a['items_per_row'] ) . $overlay_class . '">';

	$return .= '<ul class="portfolio-items">';

	// Fetch posts in the tag.
	$portfolio_args = array(
		'post_type'      => 'portfolio',
		'posts_per_page' => absint( $a['count'] ),
		'orderby'        => $a['orderby'],
	);

	if ( $a['tags'] ) {
		$portfolio_args['tax_query'] = array(
			array(
				'taxonomy' => 'portfolio_tag',
				'field'    => 'slug',
				'terms'    => explode( ',', $a['tags'] ),
			),
		);
	}

	$return .= portfolio_cpt_shortcode_output( $portfolio_args, $a );

	$return .= '</ul></div>';

	return $return;
}

/**
 * Output function for the shortcode.
 *
 * @param array $query_args Args for WP_Query.
 * @param array $args Args from shortcode atts.
 */
function portfolio_cpt_shortcode_output( $query_args, $args ) {
	$return = '';
	$query  = new WP_Query( $query_args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) :

			$query->the_post();

			$return .= '<li class="portfolio-item">';
			$return .= '<a class="portfolio-item__image" href="' . get_permalink( $query->ID ) . '" title="' . esc_attr( $query->post_title ) . '">';
			$return .= '<div class="overlay"></div>';
			$return .= get_the_post_thumbnail( $query->ID, $args['image_size'] );
			$return .= '</a>';

			if ( 'false' === $args['hide_titles'] || 'false' === $args['hide_tags'] ) {

				$return .= '<div class="portfolio-item__details">';

				if ( 'false' === $args['hide_titles'] ) {
					$return .= '<span class="portfolio-item__name"><a href="' . get_permalink( $query->ID ) . '">' . get_the_title( $query->ID ) . '</a></span>';
				}

				if ( 'false' === $args['hide_tags'] ) {
					$return .= '<span class="portfolio-item__tags">' . get_the_term_list( $query->ID, 'portfolio_tag', '', ', ' ) . '</span>';
				}

				$return .= '</div>';

			}
			$return .= '</li>';

		endwhile;
		wp_reset_postdata();
	} else {
		$return .= '<p>' . esc_html__( 'No Portfolio Items Found', 'portfolio-cpt' ) . '</p>';
	}
	return $return;
}
