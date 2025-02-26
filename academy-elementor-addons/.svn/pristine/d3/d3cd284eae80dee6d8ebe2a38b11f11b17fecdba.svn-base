<?php
namespace AcademyEA;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Helper {

	public static function get_time() {
		return time() + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS );
	}

	public static function attr_shortcode( array $attr_array ) {

		$html_attr = '';

		foreach ( $attr_array as $attr_name => $attr_val ) {
			if ( ( false === $attr_val ) || empty( $attr_val ) ) {
				continue;
			}

			if ( is_array( $attr_val ) ) {
				$html_attr .= $attr_name . '="' . implode( ',', $attr_val ) . '" ';
			} else {
				$html_attr .= $attr_name . '="' . $attr_val . '" ';
			}
		}

		return $html_attr;
	}


	public static function get_terms_list( $taxonomy = 'category', $key = 'term_id' ) {
		$options = [];
		$terms   = get_terms( [
			'taxonomy'   => $taxonomy,
			'hide_empty' => true,
		] );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$options[ $term->{$key} ] = $term->name;
			}
		}

		return $options;
	}


	public static function heading_camelize( $input, $separator = '_' ) {
		return strtolower( str_replace( $separator, '', ucwords( $input, $separator ) ) );
	}

	/**
	 * Html_tag_lists
	 *
	 * @return array
	 */
	public static function html_tag_lists() {
		$html_tag_list = [
			'h1'   => __( 'H1', 'academy-elementor-addons' ),
			'h2'   => __( 'H2', 'academy-elementor-addons' ),
			'h3'   => __( 'H3', 'academy-elementor-addons' ),
			'h4'   => __( 'H4', 'academy-elementor-addons' ),
			'h5'   => __( 'H5', 'academy-elementor-addons' ),
			'h6'   => __( 'H6', 'academy-elementor-addons' ),
			'p'    => __( 'p', 'academy-elementor-addons' ),
			'div'  => __( 'div', 'academy-elementor-addons' ),
			'span' => __( 'span', 'academy-elementor-addons' ),
		];
		return $html_tag_list;
	}

	/**
	 * Validate_html_tag
	 *
	 * @param  mixed $tag
	 * @return array
	 */
	public static function validate_html_tag( $tag ) {
		$allowed_html_tags = [
			'article',
			'aside',
			'footer',
			'header',
			'section',
			'nav',
			'main',
			'div',
			'h1',
			'h2',
			'h3',
			'h4',
			'h5',
			'h6',
			'p',
			'span',
		];
		return in_array( strtolower( $tag ), $allowed_html_tags, true ) ? $tag : 'div';
	}

	/**
	 * Academy Courses Last Product Id
	 */
	public static function get_last_course_id() {
		global $wpdb;

		// Getting last Course ID (max value)
		$results = $wpdb->get_col( "
            SELECT MAX(ID) FROM {$wpdb->prefix}posts
            WHERE post_type LIKE 'academy_courses'
            AND post_status = 'publish'"
		);
		return reset( $results );
	}

	/**
	 * Get_course_category_list
	 *
	 * @param  mixed $id
	 * @param  mixed $separator
	 * @return array
	 */
	public static function get_course_category_list( $id, $separator = ' ' ) {
		$categories = get_the_term_list( $id, 'academy_courses_category', '', $separator );
		return $categories;
	}

	/**
	 * Get_course_tag_list
	 *
	 * @param  mixed $id
	 * @param  mixed $tag_separator
	 * @return array
	 */
	public static function get_course_tag_list( $id, $tag_separator = ' ' ) {
		$tags = get_the_term_list( $id, 'academy_courses_tag', '', $tag_separator );
		return $tags;
	}

	/**
	 * Get_option
	 *
	 * @param  mixed $option
	 * @param  mixed $section
	 * @param  mixed $default
	 * @return string
	 */
	public static function get_option( $option, $section, $default = '' ) {
		$options = get_option( $section );
		if ( isset( $options[ $option ] ) ) {
			return $options[ $option ];
		}
		return $default;
	}

	public static function get_template_part( $slug, $name = '' ) {
		$fallback = ACADEMYEA_CORE_ROOT_PATH . "/templates/{$slug}-{$name}.php";
		$template = file_exists( $fallback ) ? $fallback : '';
		if ( $template ) {
			load_template( $template, false );
		}
	}

	/**
	 * Check if elementor in preview mode
	 */
	public static function is_preview_mode() {
		if ( isset( $_REQUEST['elementor-preview'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification
			return false;
		}

		if ( ! empty( $_REQUEST['action'] ) && ! self::check_background_action( $_REQUEST['action'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification
			return false;
		}

		return true;
	}

	/**
	 * Check_background_action
	 *
	 * @param  mixed $action_name
	 * @return bool
	 */
	public static function check_background_action( $action_name ) {
		$allow_action = [
			'subscriptions',
			'mepr_unauthorized',
			'home',
			'subscriptions',
			'payments',
			'newpassword',
			'manage_sub_accounts',
		];
		if ( in_array( $action_name, $allow_action, true ) ) {
			return true;
		}
		return false;
	}

	/**
	 * Check if academyea-template in preview mode
	 */
	public static function is_academyea_preview_mode() {
		if ( self::is_preview_mode() && is_singular( 'academyea-template' ) ) {
			return true;
		}
	}

	/**
	 * Check if elementor edit mode or not
	 *
	 * @since 1.0.0
	 */
	public static function is_edit_mode() {
		if ( isset( $_REQUEST['elementor-preview'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification
			return true;
		}

		return false;
	}
}

