<?php
/**
 * Functions
 *
 * @package Degree of Difficulty for Sensei
 */

/**
 * Get Sensei Course Degree(s) of Difficulty
 * Accepts WooCommmerce product IDs.
 *
 * @since 1.0.0
 * @since 1.0.1 Dynamic slug Degree_of_Difficulty_for_Sensei()->slug
 *
 * @param  integer $course_or_product_id   Course or WooCommerce product ID.
 * @param  boolean $is_woocommerce_product Is a WooCommerce product? Defaults to false.
 * @return array                           Degrees of Difficulty or empty array.
 */
function dds_get_sensei_course_degrees_of_difficulty( $course_or_product_id, $is_woocommerce_product = false ) {
	if ( ! $course_or_product_id ||
		(int) $course_or_product_id < 1 ) {
		return array();
	}

	if ( $is_woocommerce_product ) {
		$course_woocommerce_args = array(
			'meta_key' => '_course_woocommerce_product',
			'meta_value' => (int) $course_or_product_id,
			'post_type' => 'course',
			'post_status' => 'publish',
			'posts_per_page' => 1,
		);

		$courses = get_posts( $course_woocommerce_args );

		if ( ! $courses ) {
			return array();
		}

		// var_dump( $courses );

		$course_id = $courses[0]->ID;
	} else {
		$course_id = (int) $course_or_product_id;
	}

	// Check Sensei course has Degree of Difficulty.
	$course_difficulty_terms = wp_get_post_terms( $course_id, Degree_of_Difficulty_for_WooCommerce()->slug );

	if ( ! $course_difficulty_terms ) {
		return array();
	}

	$difficulty = array();
	$degrees_of_difficulty = array();

	// var_dump( $course_difficulty_terms );

	foreach( (array) $course_difficulty_terms as $course_difficulty_term ) {

		// Get Degree of Difficulty term ID + name + slug.
		$difficulty['id'] = $course_difficulty_term->term_id;

		$difficulty['name'] = $course_difficulty_term->name;

		$difficulty['slug'] = $course_difficulty_term->slug;

		$difficulty['image_url'] = dds_get_degree_of_difficutly_image_url( $difficulty['id'] );

		$degrees_of_difficulty[] = $difficulty;
	}

	return $degrees_of_difficulty;
}


/**
 * Get Degree of Difficulty image URL
 *
 * @since 1.0.0
 *
 * @param  int $term_id Term ID.
 * @return string       Empty if term not found or has no image, else image URL.
 */
function dds_get_degree_of_difficutly_image_url( $term_id ) {

	if ( ! $term_id ||
		(int) $term_id < 1 ) {
		return '';
	}

	// Degree of Difficulty has image?
	// @link https://wordpress.org/plugins/wp-term-images/#faq-header
	// Image ID is stored as term meta.
	$difficulty_image_id = get_term_meta( (int) $term_id, 'image', true );

	// var_dump( $difficulty_image_id );

	$image_url = '';

	if ( $difficulty_image_id ) {
		// Image data stored in array, second argument is which image size to retrieve.
		$difficulty_image_data = wp_get_attachment_image_src( $difficulty_image_id, 'full' );

		// var_dump( $difficulty_image_data );

		// Image URL is the first item in the array (aka 0).
		$image_url = $difficulty_image_data[0];
	}

	return $image_url;
}
