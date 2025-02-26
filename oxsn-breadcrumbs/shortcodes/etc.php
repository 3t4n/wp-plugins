<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//[oxsn_breadcrumbs class=""]
if ( ! function_exists ( 'oxsn_breadcrumbs_shortcode' ) ) {

	add_shortcode('oxsn_breadcrumbs', 'oxsn_breadcrumbs_shortcode');
	function oxsn_breadcrumbs_shortcode( $atts, $content = null ) {
		$content = shortcode_unautop(trim($content));
		$a = shortcode_atts( array(
			'class' => '',
		), $atts );

		$oxsn_breadcrumbs_class = esc_attr($a['class']);

		$output = '<div class="oxsn_breadcrumbs' . $oxsn_breadcrumbs_class . '">';
			$output .= '<ul>';

				if (!is_front_page()) : 

					$output .= '<li><a href="' . get_home_url() . '">Home</a></li>';

					if (is_home()) :

						$blog_title = get_the_title( get_option('page_for_posts', true) );

						$output .= '<li>' . $blog_title . '</li>';

					endif;

					if (is_singular('post')) :

						$blog_title = get_the_title( get_option('page_for_posts', true) );

						$output .= '<li><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . $blog_title . '</a></li>';

					endif;

					if (is_post_type_archive()) : 

						$post_type = get_post_type();
						$post_type_object = get_post_type_object($post_type);
						$post_type_name = $post_type_object->labels->singular_name;

						$output .= '<li>' . $post_type_name . '</li>';

					endif;

					if (!is_singular('post') && !is_page()) :

						if (is_singular()) : 

							$post_type = get_post_type();
							$post_type_object = get_post_type_object($post_type);
							$post_type_name = $post_type_object->labels->singular_name;

							$output .= '<li><a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_name . '</a></li>';

						endif;

					endif;

					global $post;
					if ( $post->post_parent ) {

						$ancestors = get_post_ancestors( $post->ID );
						
						foreach( array_reverse($ancestors) as $ancestor ) {
							$ancestor_id = get_page( $ancestor )->ID;
							$output .= '<li><a href="' . get_permalink($ancestor_id) . '">' . get_page( $ancestor )->post_title . '</a></li>';
						}

					}

					if (is_singular()) :

						$output .= '<li>' . get_the_title() . '</li>';

					endif;

					if(is_archive() && !is_post_type_archive()) :

						$output .= '<li>' . get_the_archive_title() . '</li>';

					endif;

					if (is_search()) :

						$output .= '<li>Search</li>';
						$output .= '<li>' . get_search_query() . '</li>';

					endif;

					if (is_author()) :

						$output .= '<li>User</li>';
						$output .= '<li>' . get_the_author() . '</li>';

					endif;

					if (is_404()) :

						$output .= '<li>404</li>';

					endif;

				endif;

			$output .= '</ul>';
		$output .= '</div>';

		return $output;

	}

}


?>