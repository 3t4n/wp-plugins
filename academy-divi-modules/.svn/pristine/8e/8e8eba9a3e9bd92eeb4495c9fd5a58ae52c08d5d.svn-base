<?php
namespace AcademyLMS\Divi;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Helper {

	public static function attr_shortcide( array $attr_array ) {

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

}