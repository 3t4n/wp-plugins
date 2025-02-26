<?php
/**
 * AJAX Events.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ACB_AJAX class.
 */
class ACB_AJAX {

	/**
	 * Hook in ajax handlers.
	 */
	public static function init() {
		self::add_ajax_events();
	}

	/**
	 * Hook in methods - uses WordPress ajax handlers (admin-ajax).
	 */
	public static function add_ajax_events() {
		// userisle_EVENT => nopriv.
		$ajax_events = array(
			'like_item'		=> true,
			'load_content'	=> true,
		);

		foreach ( $ajax_events as $ajax_event => $nopriv ) {
			add_action( 'wp_ajax_acb_' . $ajax_event, array( __CLASS__, $ajax_event ) );
			if ( $nopriv ) {
				add_action( 'wp_ajax_nopriv_acb_' . $ajax_event, array( __CLASS__, $ajax_event ) );
			}
		}
	}

	/**
	 * Likes an item.
	 */
	public static function like_item() {
		check_ajax_referer( 'acb-like-nonce', 'security' );

		$post_id = absint( $_REQUEST['post_id'] );
		if ( ! $post_id ) {
			wp_die( -1 );
		}

		$to_like = esc_attr( $_REQUEST['to_like'] );
		if ( ! in_array( $to_like, array( 'like', 'unlike' ) ) ) {
			wp_die( -1 );
		}

		$likes = get_post_meta( $post_id, '_acb_likes', true );

		if ( $to_like == 'like' ) {
			// Do not allow user to vote again.
			if ( isset( $_COOKIE[ 'acb-voted-' . $post_id ] ) ) {
				wp_die( acb_number_format( $likes ) );
			} else {
				setcookie( 'acb-voted-' . $post_id, 'yes', time() + DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
			}
			$likes = absint( $likes ) + 1;
		} else {
			setcookie( 'acb-voted-' . $post_id, 'yes', time() - YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
			$likes = absint( $likes ) - 1;
		}

		update_post_meta( $post_id, '_acb_likes', $likes );

		echo acb_number_format( $likes );

		die();
	}

	/**
	 * Get content.
	 */
	public static function load_content() {
		check_ajax_referer( 'acb-ajax-nonce', 'security' );

		// Sanitize the input to be safe. acb_clean() does the sanitizing.
		$append = acb_clean( $_REQUEST[ 'append' ] );
		$atts   = acb_clean( $_REQUEST[ 'attrs' ] );

		// Dealing with paged parameter. A bit tricky.
		if ( $atts['paged'] > 1 && $append == 'true' ) {
			$atts['offset'] = $atts['offset'] + ( ( $atts['paged'] - 1 ) * $atts['posts_per_page'] );
		} else if ( $atts['paged'] > 1 && $atts['offset'] == 0 ) {
			$atts['offset'] = ( ( $atts['paged'] - 1 ) * $atts['posts_per_page'] );
		}

		// Prepare attributes.
		$atts['tax_query']  = array( 'relation' => 'or' );
		$atts['meta_query'] = array( 'relation' => 'and' );
		$atts['post_type']  = explode( '::', $atts['post_type'] );
		$atts['taxonomies'] = explode( '::', $atts['taxonomies'] );

		// Query posts by custom taxonomies and terms.
		if ( is_array( $atts['taxonomies'] ) ) {
			foreach( $atts['taxonomies'] as $taxonomy ) {
				if ( ! empty( $atts[ $taxonomy ] ) ) {
					$atts['tax_query'][] = array(
						'taxonomy' 			=> esc_attr( $taxonomy ),
						'field' 			=> 'id',
						'terms'		 		=> explode( '::', acb_clean( $atts[ $taxonomy ] ) ),
						'include_children' 	=> false,
					);
				}
			}
		}

		// Get products in specific price range.
		if ( ! empty( $atts['price'] ) ) {
			$price = explode( '-', $atts['price'] );
			$field = acb_get_price_metakey( $atts['post_type'] );
			$atts['meta_key'] 		= $field;
			$atts['meta_query'][] 	= array(
                'key' 		=> $field,
                'value' 	=> absint( $price[0] ),
                'compare' 	=> '>=',
				'type'		=> 'numeric',
            );
			$atts['meta_query'][] 	= array(
                'key' 		=> $field,
                'value' 	=> absint( $price[1] ),
                'compare' 	=> '<=',
				'type'		=> 'numeric',
            );
		}

		// Get items posted in the last period of time.
		if ( ! empty( $atts['date'] ) ) {
			switch( $atts['date']) {
				case 'month' :
					$period = '1 month ago';
				break;
				case 'year' :
					$period = '1 year ago';
				break;
				case 'week' :
					$period = '1 week ago';
				break;
				case 'today' :
					$period = '24 hours ago';
				break;
				default :
					$period = '';
				break;
			}
			if ( $period ) {
				$atts['date_query'][] = array(
					'after'   => $period,
				);
			}
		}

		// Get sort by parameter.
		if ( ! empty( $atts['sortby'] ) ) {
			switch( $atts['sortby'] ) {
				case 'abc_asc' :
					$atts['orderby']  = 'title';
					$atts['order']    = 'asc';
				break;
				case 'abc_desc' :
					$atts['orderby']  = 'title';
					$atts['order']    = 'desc';
				break;
				case 'views' :
					$atts['meta_key'] = '_acb_views';
					$atts['orderby']  = 'meta_value_num';
					$atts['order']    = 'desc';
				break;
				case 'likes' :
					$atts['meta_key'] = '_acb_likes';
					$atts['orderby']  = 'meta_value_num';
					$atts['order']    = 'desc';
				break;
				case 'comments' :
					$atts['orderby']  = 'comment_count';
					$atts['order']    = 'desc';
				break;
				case 'sales' :
					// WooCommerce
					if ( in_array( 'product', $atts['post_type'] ) ) {
						$atts['meta_key'] = 'total_sales';
						$atts['orderby']  = 'meta_value_num';
						$atts['order']    = 'desc';
					// EDD
					} else if ( in_array( 'download', $atts['post_type'] ) ) {
						$atts['meta_key'] = '_edd_download_sales';
						$atts['orderby']  = 'meta_value_num';
						$atts['order']    = 'desc';	
					}
				break;
				case 'price_low' :
					// WooCommerce
					if ( in_array( 'product', $atts['post_type'] ) ) {
						$atts['meta_key'] = '_price';
						$atts['orderby']  = 'meta_value_num';
						$atts['order']    = 'asc';
					// EDD
					} else if ( in_array( 'download', $atts['post_type'] ) ) {
						$atts['meta_key'] = 'edd_price';
						$atts['orderby']  = 'meta_value_num';
						$atts['order']    = 'asc';	
					}
				break;
				case 'price_high' :
					// WooCommerce
					if ( in_array( 'product', $atts['post_type'] ) ) {
						$atts['meta_key'] = '_price';
						$atts['orderby']  = 'meta_value_num';
						$atts['order']    = 'desc';
					// EDD
					} else if ( in_array( 'download', $atts['post_type'] ) ) {
						$atts['meta_key'] = 'edd_price';
						$atts['orderby']  = 'meta_value_num';
						$atts['order']    = 'desc';	
					}
				break;
			}
		}

		// Stop preparing here and show the template.
		if ( $append == 'false' ) {
			echo '<div class="acb-grid-sizer"></div><div class="acb-gutter-sizer"></div>';
		}

		$the_acb = new WP_Query( $atts );
		if ( $the_acb->have_posts() ) :
			while ( $the_acb->have_posts() ) : $the_acb->the_post();
				acb_load_template( $atts );
			endwhile;
		endif;
		wp_reset_query();

		die();
	}

}

ACB_AJAX::init();