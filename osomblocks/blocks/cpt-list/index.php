<?php

add_action( 'init', 'osom_blocks_register_osom_cpt_list' );

/**
 * Register the custom post type block.
 *
 * @since 2.1.0
 *
 * @return void
 */

function osom_blocks_register_osom_cpt_list() {

	// Only load if Gutenberg is available.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	load_plugin_textdomain( 'osomblocks', false, basename( dirname( __FILE__ ) ) . '/languages/' );

	wp_set_script_translations( 'osomblocks', 'osomblocks', __DIR__ . '/languages' );

	register_block_type(
		'osomblocks/cpt-list',
		array(
			'editor_script'   => 'osomblocks-cpt-list',
			'render_callback' => 'osom_blocks_osom_cpt_list_block_handler',
			'attributes'      => array(
				'numposts'    => array(
					'type'    => 'number',
					'default' => 3,
				),
				'cpt'         => array(
					'default' => 'post',
					'type'    => 'string',
				),
				'moretext'    => array(
					'default' => 'Continue reading',
				),
				'featuredimg' => array(
					'type'    => 'boolean',
					'default' => 'true',
				),
				'showexcerpt' => array(
					'type'    => 'boolean',
					'default' => 'true',
				),
				'gridformat'  => array(
					'type'    => 'boolean',
					'default' => 'false',
				),
				'heading'     => array(
					'default' => 'h3',
				),
				'numcols'     => array(
					'default' => 3,
					'type'    => 'number',
				),
				'showparent'  => array(
					'type'    => 'boolean',
					'default' => 'false',
				),
				'pagination'  => array(
					'type'    => 'boolean',
					'default' => 'false',
				),
				'sticky'      => array(
					'type'    => 'boolean',
					'default' => 'false',
				),
				'category'    => array(
					'type'    => 'string',
					'default' => '',
				),
				'tax'         => array(
					'type'    => 'string',
					'default' => '',
				),
				'className'   => array(
					'type'    => 'string',
					'default' => '',
				),

			),
		)
	);
}

/**
 * Handler for custom post block
 * @param $atts
 *
 * @return string
 */
function osom_blocks_osom_cpt_list_block_handler( $atts ) {
	return osom_blocks_osom_cpt_list( $atts['numposts'], $atts['cpt'], $atts['moretext'], $atts['featuredimg'], $atts['showexcerpt'], $atts['gridformat'], $atts['heading'], $atts['numcols'], $atts['showparent'], $atts['pagination'], $atts['sticky'], $atts['category'], $atts['tax'], $atts['className'] );
}

/**
 * Output the custom posts list
 *
 * @param int $numposts
 * @param int $numcols
 * @param string $cpt Example: post, page, portfolio
 * @param string $moretext for Continue reading link
 * @param boolean $featuredimg for show/hide image
 * @param boolean $showexcerpt for show/hide post excerpt
 * @param boolean $gridformat for show in grid
 * @param string $heading
 * @param boolean $showparent for show only parent pages
 * @param boolean $pagination for show/hide pagination
 * @param boolean $sticky for ignore sticky posts
 * @param string $category, $tax for taxonomy filter
 * @return string
 */
function osom_blocks_osom_cpt_list( $numposts, $cpt, $moretext, $featuredimg, $showexcerpt, $gridformat, $heading, $numcols, $showparent, $pagination, $sticky, $category, $tax, $class_name ) {

	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}
	$parent = '';

	if ( 'true' == $showparent ) {
		$parent = 0;
	}

	if ( 'true' == $sticky ) {
		$sticky = 1;
	} else {
		$sticky = 0;
	}

	$args_c = apply_filters ('osom_blocks_args', array(
		'posts_per_page'      => -1,
		'fields'              => 'ids',
		'post_type'           => $cpt,
		'post_parent'         => $parent,
		'ignore_sticky_posts' => $sticky,
		'category_name'       => $category,
		'tag'                 => $tax,
		'has_password'        => false,
	));

	$all_posts   = get_posts( $args_c );
	$total_posts = count( $all_posts );

	$args = array();
	$args= apply_filters ('osom_blocks_args', array(
		'post_type'           => $cpt,
		'posts_per_page'      => $numposts,
		'post_status'         => 'publish',
		'post_parent'         => $parent,
		'ignore_sticky_posts' => $sticky,
		'category_name'       => $category,
		'tag'                 => $tax,
		'paged'               => $paged,
		'has_password'        => false,
	));

	$recent_posts = new WP_Query( $args );

	if ( ! in_array( $heading, array( 'h2', 'h3', 'h4' ), true ) ) {
		$heading = 'h2';
	}

	$markup = '<div class="' . $class_name . ' osomblocks-cptlist alignwide';
	if ( true === $gridformat ) {
		$markup .= ' osomgrid cols-' . $numcols;
	}

	$markup .= ' " >';

	if ( $recent_posts->have_posts() ) {

		while ( $recent_posts->have_posts() ) :

			$recent_posts->the_post();
			$post_id = get_the_ID();

			$markup .= '<article class="entry';
			if ( false == $featuredimg ) {
				$markup .= ' no-img ';
			}

			$markup .= '">';

			if ( true == $featuredimg ) :
				$markup    .= '<a href="' . get_permalink( $post_id ) . '">';
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id( $post_id ) );
				if ( $feat_image ) {
					$markup .= '<img src="' . $feat_image . '" alt="' . esc_html( get_the_title( $post_id ) ) . '" />';
				}
				$markup .= '</a>';
			endif;

			$markup .= '<div>';
			$markup .= '<header>';
			$markup .= '<' . $heading . '>';
			$markup .= '<a href="' . get_permalink( $post_id ) . '">' . get_the_title( $post_id ) . '</a>';
			$markup .= '</' . $heading . '>';
			$markup .= '</header>';
			if ( true == $showexcerpt ) {
				$markup .= '<p>' . get_the_excerpt( $post_id ) . '</p>';
			}
			$markup .= '<a class="more-link" href="' . get_permalink( $post_id ) . '">' . $moretext . '</a>';
			$markup .= '</div>';
			$markup .= '</article>';
			//}
		endwhile;
		$markup .= '</div>';
		if ( 'true' == $pagination ) {
			$markup .= '<div class="osom-pagination">';
			$markup .= paginate_links(
				array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'total'        => $recent_posts->max_num_pages,
					'current'      => max( 1, $paged ),
					'format'       => '?paged=%#%',
					'show_all'     => false,
					'type'         => 'plain',
					'end_size'     => 2,
					'mid_size'     => 1,
					'prev_next'    => true,
					'prev_text'    => __( '&laquo; Older Entries', 'osomblocks' ),
					'next_text'    => sprintf( '%1$s <i></i>', __( 'Next Entries &raquo;', 'osomblocks' ) ),
					'add_args'     => false,
					'add_fragment' => '',
				)
			);
			$markup .= '</div>';
		}
	} else {
		$markup = '<p>' . __( 'No entries found', 'osomblocks' ) . '</p>';
	}

	return "{$markup}";
}
