<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * [AJAX] Highlight all the searched/found terms.
 */
function elemsnr_highlight_search() {
	$elemsnr       = new Elementor_Search_Replace();
	$elemsnr_admin = new ELEMSNR_Admin();

	$elemsnr_admin->get_invalid_nonce_token();
	$elemsnr_admin->get_invalid_user_cap();

	$current_post_id   = isset( $_REQUEST['current_post_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['current_post_id'] ) ) : '';
	$search_phrase     = isset( $_REQUEST['search_phrase'] ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['search_phrase'] ) ) ) : '';
	$is_highlighted    = isset( $_REQUEST['is_highlighted'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_highlighted'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_text_only      = isset( $_REQUEST['is_text_only'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_text_only'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_case_sensitive = isset( $_REQUEST['is_case_sensitive'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_case_sensitive'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_links          = isset( $_REQUEST['is_links'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_links'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_images         = isset( $_REQUEST['is_images'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_images'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';

	$current_post_data   = get_post_meta( $current_post_id, '_elementor_data', true );
	$elementor_data      = json_decode( $current_post_data, true );
	$elementor_data_size = round( mb_strlen( $current_post_data, '8bit' ) / 1024, 2 );

	$elemsnr_admin->get_invalid_post_id( $current_post_id );
	$elemsnr_admin->get_invalid_elementor_data( $elementor_data );
	$elemsnr_admin->get_invalid_data_size_limit( $elementor_data_size );

	if ( strlen( $search_phrase ) < 3 ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'Enter at least 3 characters for your search value.', 'search-replace-for-elementor' )
		);
	}

	if ( $is_links && ! filter_var( $search_phrase, FILTER_VALIDATE_URL ) ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'The URL you entered is invalid (e.g., https://example.com/).', 'search-replace-for-elementor' )
		);
	}

	$settings = array(
		'search_phrase'       => $search_phrase,
		'replace_with_phrase' => '',
		'highlight'           => $is_highlighted,
		'is_text_only'        => $is_text_only,
		'is_case_sensitive'   => $is_case_sensitive,
		'is_links'            => $is_links,
		'is_images'           => $is_images,
		'count'               => false,
		'regex'               => false,
	);

	// Clean up all the custom tags from _elementor_data.
	$elementor_data_clean = $elemsnr->remove_custom_tags( $elementor_data, $settings );
	$elemsnr->update_postmeta( $current_post_id, $elementor_data_clean );

	// Count search phrase occurrences.
	$search_occurrences = $elemsnr->count_search_occurrences( $elementor_data_clean, $settings );

	if ( 0 === $search_occurrences ) {
		$search_phrase = stripslashes( $search_phrase );

		$elemsnr_admin->print_json_message(
			0,
			/* translators: %1$s is replaced with "search phrase" */
			__( 'No results found for %1$s!', 'search-replace-for-elementor' ),
			array( '<strong>' . $search_phrase . '</strong>' ),
			$elemsnr->runtime
		);
	}

	$elementor_data_highlight = $elemsnr->add_custom_tags( $elementor_data_clean, $settings, $is_links, $is_images );
	$elemsnr->update_postmeta( $current_post_id, $elementor_data_highlight );

	$search_phrase = stripslashes( $search_phrase );

	$elemsnr_admin->print_json_message(
		1,
		/* translators: %1$s is replaced with "search_occurrences" */
		/* translators: %2$s is replaced with "search phrase" */
		__( '%1$s result(s) found for %2$s!', 'search-replace-for-elementor' ),
		array(
			'<strong>' . $search_occurrences . '</strong>',
			'<strong>' . $search_phrase . '</strong>',
		),
		$elemsnr->runtime
	);
}

add_action( 'wp_ajax_elemsnr_highlight_search', __NAMESPACE__ . '\elemsnr_highlight_search' );

/**
 * [AJAX] UnHighlight and clear all the searched/found terms.
 */
function elemsnr_unhighlight_search() {
	$elemsnr       = new Elementor_Search_Replace();
	$elemsnr_admin = new ELEMSNR_Admin();

	$elemsnr_admin->get_invalid_nonce_token();
	$elemsnr_admin->get_invalid_user_cap();

	$current_post_id   = isset( $_REQUEST['current_post_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['current_post_id'] ) ) : '';
	$search_phrase     = isset( $_REQUEST['search_phrase'] ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['search_phrase'] ) ) ) : '';
	$is_highlighted    = isset( $_REQUEST['is_highlighted'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_highlighted'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_text_only      = isset( $_REQUEST['is_text_only'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_text_only'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_case_sensitive = isset( $_REQUEST['is_case_sensitive'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_case_sensitive'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_links          = isset( $_REQUEST['is_links'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_links'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_images         = isset( $_REQUEST['is_images'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_images'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';

	$current_post_data   = get_post_meta( $current_post_id, '_elementor_data', true );
	$elementor_data      = json_decode( $current_post_data, true );
	$elementor_data_size = round( mb_strlen( $current_post_data, '8bit' ) / 1024, 2 );

	$elemsnr_admin->get_invalid_post_id( $current_post_id );
	$elemsnr_admin->get_invalid_elementor_data( $elementor_data );
	$elemsnr_admin->get_invalid_data_size_limit( $elementor_data_size );

	$settings = array(
		'search_phrase'       => $search_phrase,
		'replace_with_phrase' => '',
		'highlight'           => $is_highlighted,
		'is_text_only'        => $is_text_only,
		'is_case_sensitive'   => $is_case_sensitive,
		'is_links'            => $is_links,
		'is_images'           => $is_images,
		'count'               => false,
		'regex'               => false,
	);

	// Clean up all the custom tags from _elementor_data.
	$elementor_data_clean = $elemsnr->remove_custom_tags( $elementor_data, $settings );
	$elemsnr->update_postmeta( $current_post_id, $elementor_data_clean );

	$elemsnr_admin->print_json_message(
		1,
		__( 'All custom tags have been removed successfully!', 'search-replace-for-elementor' ),
		array(),
		$elemsnr->runtime
	);
}

add_action( 'wp_ajax_elemsnr_unhighlight_search', __NAMESPACE__ . '\elemsnr_unhighlight_search' );

/**
 * [AJAX] Replace the searched and found terms.
 */
function elemsnr_replace_search() {
	$elemsnr       = new Elementor_Search_Replace();
	$elemsnr_admin = new ELEMSNR_Admin();

	$elemsnr_admin->get_invalid_nonce_token();
	$elemsnr_admin->get_invalid_user_cap();

	$current_post_id     = isset( $_REQUEST['current_post_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['current_post_id'] ) ) : '';
	$search_phrase       = isset( $_REQUEST['search_phrase'] ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['search_phrase'] ) ) ) : '';
	$replace_with_phrase = isset( $_REQUEST['replace_with_phrase'] ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['replace_with_phrase'] ) ) ) : '';
	$is_highlighted      = isset( $_REQUEST['is_highlighted'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_highlighted'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_text_only        = isset( $_REQUEST['is_text_only'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_text_only'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_case_sensitive   = isset( $_REQUEST['is_case_sensitive'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_case_sensitive'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_links            = isset( $_REQUEST['is_links'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_links'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$is_images           = isset( $_REQUEST['is_images'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_images'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';

	$current_post_data   = get_post_meta( $current_post_id, '_elementor_data', true );
	$elementor_data      = json_decode( $current_post_data, true );
	$elementor_data_size = round( mb_strlen( $current_post_data, '8bit' ) / 1024, 2 );

	$elemsnr_admin->get_invalid_post_id( $current_post_id );
	$elemsnr_admin->get_invalid_elementor_data( $elementor_data );
	$elemsnr_admin->get_invalid_data_size_limit( $elementor_data_size );

	if ( strlen( $search_phrase ) < 3 ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'Enter at least 3 characters for your search value.', 'search-replace-for-elementor' )
		);
	}

	if ( strlen( $replace_with_phrase ) < 3 ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'Enter at least 3 characters for your "replace with" value.', 'search-replace-for-elementor' )
		);
	}

	if ( $is_links && ( ! filter_var( $search_phrase, FILTER_VALIDATE_URL ) || ! filter_var( $replace_with_phrase, FILTER_VALIDATE_URL ) ) ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'The URL you entered is invalid (e.g., https://example.com/).', 'search-replace-for-elementor' )
		);
	}

	$settings = array(
		'search_phrase'       => $search_phrase,
		'replace_with_phrase' => $replace_with_phrase,
		'highlight'           => $is_highlighted,
		'is_text_only'        => $is_text_only,
		'is_case_sensitive'   => $is_case_sensitive,
		'is_links'            => $is_links,
		'is_images'           => $is_images,
		'count'               => false,
		'regex'               => false,
	);

	// Count search phrase occurrences.
	$search_occurrences = $elemsnr->count_search_occurrences( $elementor_data, $settings );

	$elementor_data_new = $elemsnr->do_search_and_replace( $elementor_data, $settings, $is_links, $is_images );
	$elemsnr->update_postmeta( $current_post_id, $elementor_data_new );

	$search_phrase       = stripslashes( $search_phrase );
	$replace_with_phrase = stripslashes( $replace_with_phrase );

	$elemsnr_admin->print_json_message(
		1,
		/* translators: %1$s is replaced with "search phrase" */
		/* translators: %2$s is replaced with "replace phrase" */
		/* translators: %3$s is replaced with "search_occurrences" */
		/* translators: %4$s is replaced with "Undo" */
		__( '%1$s was replaced with %2$s %3$s time(s). %4$s', 'search-replace-for-elementor' ),
		array(
			"<strong id=\"elemsnr-undo-search-phrase\">{$search_phrase}</strong>",
			"<strong id=\"elemsnr-undo-replace-with-phrase\">{$replace_with_phrase}</strong>",
			'<strong>' . $search_occurrences . '</strong>',
			'<a href="#" name="elemsnr-undo-button">Undo</a>',
		),
		$elemsnr->runtime
	);
}

add_action( 'wp_ajax_elemsnr_replace_search', __NAMESPACE__ . '\elemsnr_replace_search' );

/**
 * [AJAX] Run HTML regular expression search and replace.
 */
function elemsnr_replace_html_regex() {
	$elemsnr       = new Elementor_Search_Replace();
	$elemsnr_admin = new ELEMSNR_Admin();

	$elemsnr_admin->get_invalid_nonce_token();
	$elemsnr_admin->get_invalid_user_cap();

	/**
	 * We don't use sanitize_text_field() or wp_unslash()
	 * becuase the input is used in preg_replace() function.
	 */
	$search_phrase       = isset( $_REQUEST['search_phrase'] ) ? trim( $_REQUEST['search_phrase'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized	
	$replace_with_phrase = isset( $_REQUEST['replace_with_phrase'] ) ? trim( $_REQUEST['replace_with_phrase'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized	
	$current_post_id     = isset( $_REQUEST['current_post_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['current_post_id'] ) ) : '';

	$current_post_data   = get_post_meta( $current_post_id, '_elementor_data', true );
	$elementor_data      = json_decode( $current_post_data, true );
	$elementor_data_size = round( mb_strlen( $current_post_data, '8bit' ) / 1024, 2 );

	$elemsnr_admin->get_invalid_post_id( $current_post_id );
	$elemsnr_admin->get_invalid_elementor_data( $elementor_data );
	$elemsnr_admin->get_invalid_data_size_limit( $elementor_data_size );

	if ( strlen( $search_phrase ) < 3 || strlen( $replace_with_phrase ) < 3 ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'Please enter values for both the search and replace fields.', 'search-replace-for-elementor' )
		);
	}

	$settings = array(
		'search_phrase'       => $search_phrase,
		'replace_with_phrase' => $replace_with_phrase,
		'highlight'           => false,
		'is_text_only'        => false,
		'is_case_sensitive'   => false,
		'is_links'            => false,
		'is_images'           => false,
		'count'               => false,
		'regex'               => true,
	);

	$elementor_data_new = $elemsnr->search_and_replace(
		$elementor_data,
		array_merge(
			$settings,
			array(
				'search_phrase'       => $search_phrase,
				'replace_with_phrase' => $replace_with_phrase,
			),
		),
		'html-regexp'
	);

	$elemsnr->update_postmeta( $current_post_id, $elementor_data_new );
	$elemsnr->update_regex_limit();

	$search_phrase       = htmlentities( $search_phrase );
	$replace_with_phrase = htmlentities( $replace_with_phrase );

	$elemsnr_admin->print_json_message(
		1,
		/* translators: %1$s is replaced with "search phrase" */
		/* translators: %2$s is replaced with "replace phrase" */
		__( 'Regex %1$s was used and replaced with %2$s.', 'search-replace-for-elementor' ),
		array(
			"<strong id=\"elemsnr-undo-search-phrase\">{$search_phrase}</strong>",
			"<strong id=\"elemsnr-undo-replace-with-phrase\">{$replace_with_phrase}</strong>",
		),
		$elemsnr->runtime
	);
}

add_action( 'wp_ajax_elemsnr_replace_html_regex', __NAMESPACE__ . '\elemsnr_replace_html_regex' );
