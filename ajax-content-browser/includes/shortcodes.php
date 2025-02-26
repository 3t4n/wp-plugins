<?php
/**
 * Shortcodes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ACB_Shortcodes class.
 */
class ACB_Shortcodes {

	/**
	 * Init shortcodes.
	 */
	public static function init() {
		$shortcodes = array(
			'acb'			=> __CLASS__ . '::acb',
		);

		foreach ( $shortcodes as $shortcode => $function ) {
			add_shortcode( $shortcode, $function );
		}
	}

	/**
	 * The main shortcode.
	 */
	public static function acb( $atts ) {
		global $the_acb;

		ob_start();

		$atts = array_merge( array(
			'id'			  => substr( str_shuffle( '0123456789abcdefghijklmnopqrstuvwxyz' ), 0, 6 ),
			'show_filters'	  => 'yes',
			'show_author'	  => 'yes',
			'show_time'		  => 'yes',
			'show_search'	  => 'yes',
			'show_counts'	  => 'yes',
			'show_sortby'	  => 'yes',
			'show_thumbnail'  => 'yes',
			'show_item_tags'  => 'no',
			'price_filter'	  => 'yes',
			'date_filter'	  => 'yes',
			'date_options'    => '',
			'search_position' => 'top',
			'buy_now_text'    => '',
			'taxonomies'	  => '',
			'post_type'       => 'post',
			'posts_per_page'  => 10,
			'paged'			  => 1,
			'offset'		  => 0,
			'toggle_all'	  => 'no',
		), ( array ) $atts );

		// Post types.
		$atts['post_type']  = explode( ',', str_replace( ' ', '', $atts['post_type'] ) );

		// Taxonomies.
		if ( empty( $atts['taxonomies'] ) ) {
			$atts['taxonomies'] = array();
			if ( in_array( 'post', $atts['post_type'] ) ) {
				$atts['taxonomies'][] = 'category';
				$atts['taxonomies'][] = 'post_tag';
			}
			if ( in_array( 'product', $atts['post_type'] ) ) {
				$atts['taxonomies'][] = 'product_cat';
				$atts['taxonomies'][] = 'product_tag';
			}
			if ( in_array( 'download', $atts['post_type'] ) ) {
				$atts['taxonomies'][] = 'download_category';
				$atts['taxonomies'][] = 'download_tag';
			}
		}

		if ( ! is_array( $atts['taxonomies'] ) ) {
			$atts['taxonomies'] = explode( ',', str_replace( ' ', '', $atts['taxonomies'] ) );
		}

		// No need to show default taxonomies when posts are not included.
		if ( ! in_array( 'post', $atts['post_type'] ) ) {
			foreach( array( 'category', 'post_tag' ) as $taxonomy ) {
				if ( ( $key = array_search( $taxonomy, $atts['taxonomies'] ) ) !== false ) {
					unset( $atts['taxonomies'][$key] );
				}
			}
		}

		// Date added options.
		if ( $atts['date_filter'] != 'no' ) {
			$atts['date_options'] = acb_get_date_options( $atts['date_options'] );
		}

		// We need to count for paged parameter.
		if ( $atts['paged'] > 1 ) {
			$atts['offset'] = ( $atts['paged'] - 1 ) * $atts['posts_per_page'];
		}

		// Query setup.
		$the_acb = new WP_Query( $atts );

		// Display the template and pass on attributes.
		acb_get_template( 'acb.php', $atts );

		// Send output buffer.
		return ob_get_clean();
	}

}