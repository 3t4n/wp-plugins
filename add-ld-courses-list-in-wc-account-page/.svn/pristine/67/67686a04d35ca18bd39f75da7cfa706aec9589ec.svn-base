<?php

namespace WCLearnDashCoursesList;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin Class.
 *
 * @since 1.0.0
 */
final class Plugin {

	/**
	 * Hooks.
	 */
	public static function hooks() {

		add_action( 'init', array( __CLASS__, 'register_endpoint' ) );
		add_filter( 'query_vars', array( __CLASS__, 'query_vars' ) );
		add_filter( 'woocommerce_account_menu_items', array( __CLASS__, 'add_tab' ) );
		add_action( 'woocommerce_account_learndash-courses_endpoint', array( __CLASS__, 'tab_content' ) );
	}

	/**
	 * Endpint.
	 */
	public static function register_endpoint() {
		add_rewrite_endpoint( 'learndash-courses', EP_ROOT | EP_PAGES );
	}

	/**
	 * Query vars.
	 *
	 * @param array $vars The query vars.
	 */
	public static function query_vars( $vars ) {
		$vars[] = 'learndash-courses';
		return $vars;
	}

	/**
	 * Add tab title.
	 *
	 * @param array $items Existing Items.
	 *
	 * @return array Items including Learndash Courses.
	 */
	public static function add_tab( $items ) {
	
        $items['learndash-courses'] = apply_filters( 'wc_learndash_account_tab_title', esc_html__( 'Courses List', 'wc-learndash-courses-list' ) );
		return $items;
	}

	/**
	 * Add tab content.
	 */
	public static function tab_content() {

        $shortcode = apply_filters( 'wc_learndash_account_tab_content', '[ld_course_list]' );

		echo do_shortcode( $shortcode ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
