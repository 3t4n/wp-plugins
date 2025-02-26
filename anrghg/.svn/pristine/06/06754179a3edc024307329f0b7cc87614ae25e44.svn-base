<?php
/**
 * Manages messages in or after the content.
 *
 * @package WordPress
 * @subpackage A.N.R.GHG Publishing Toolkit
 * Copyright 2021–2023 ANRGHG
 * This file is part of A.N.R.GHG Publishing Toolkit.
 * A.N.R.GHG Publishing Toolkit is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 * A.N.R.GHG Publishing Toolkit is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with A.N.R.GHG Publishing Toolkit.  If not, see <https://www.gnu.org/licenses/>.
 * @see ../COPYING.txt
 */

defined( 'ABSPATH' ) || exit( nl2br( "\r\n\r\n&nbsp; &nbsp; &nbsp; Sorry, this PHP file cannot be displayed in the browser." ) );

/**
 * Appends Thank You message to post/page and processes messages added by block.
 *
 * @since 0.9.0
 * @courtesy Justin Busa
 * @link https://www.wpbeaverbuilder.com/creating-wordpress-plugin-easier-think/
 * @date 2014-06-09
 * Originally designed as an example and targeting posts only.
 * Extended to optionally append another message to pages.
 * @since 0.44.0 Message configurable in reusables editor.
 * @since 0.44.0 Post title insertable at %s placeholder.
 * @since 0.53.0 Configurable in Post Meta box, never fully deactivated.
 * @since 0.54.0 Block to configure and position one or multiple messages (provisional).
 * @since 0.56.0 Elementor integration.
 * @since 0.58.0 Block to configure and position one or multiple messages.
 * @since 0.69.0 Output filters.
 * @param  string $p_s_content        Content of the post or page.
 * @return string $p_s_content        Content of the post or page.
 */
function anrghg_thank_you_message( $p_s_content ) {

	/**
	 * Parses messages added by block for templates.
	 *
	 * @since 0.54.4
	 * @since 0.54.5 Add lacking support for post title placeholder.
	 * @since 1.7.0 Update regex to support eventual style argument.
	 */
	if ( false !== strpos( $p_s_content, '<div class="wp-block-anrghg-thank-you-message' ) ) {
		preg_match_all(
			'/<div class="wp-block-anrghg-thank-you-message[^>]+><div class="anrghg-inner-thank-you"[^>]*>(.*?)<\/div><span class="anrghg-msg-end"><\/span><\/div>/s',
			$p_s_content,
			$l_a_matches,
			PREG_OFFSET_CAPTURE
		);
		$l_i_offset = 0;
		foreach ( $l_a_matches[1] as $l_i_index => $l_a_match ) {
			list(
				$l_s_message,
				$l_i_position
			)             = $l_a_match;
			$l_i_len_msg  = strlen( $l_s_message );
			$l_s_full_msg = anrghg_parse_message( anrghg_emulate_paragraph_break( $l_s_message ) );
			$p_s_content  = substr_replace(
				$p_s_content,
				$l_s_full_msg,
				$l_i_offset + $l_i_position,
				$l_i_len_msg
			);
			$l_i_offset  += ( strlen( $l_s_full_msg ) - $l_i_len_msg );
		}
	}

	/**
	 * Collects otherwise configured data.
	 */
	switch ( anrghg_apply_config( 'anrghg_thank_you_active' ) ) {
		case '1':
			$l_b_posts = true;
			$l_b_pages = false;
			break;
		case '2':
			$l_b_posts = false;
			$l_b_pages = true;
			break;
		case '3':
			$l_b_posts = true;
			$l_b_pages = true;
			break;
		default:
			$l_b_posts = false;
			$l_b_pages = false;
	}
	$l_i_post_id          = get_the_ID();
	$l_s_post_meta_config = get_post_meta( $l_i_post_id, 'anrghg_append_thank_you', true ); // May be empty.
	switch ( $l_s_post_meta_config ) {
		case 'true':
			$l_b_posts = true;
			$l_b_pages = true;
			break;
		case 'false':
			$l_b_posts = false;
			$l_b_pages = false;
			break;
	}
	$l_s_message = '';
	$l_s_meta    = get_post_meta( $l_i_post_id, 'anrghg_thank_you_template', true ); // May be empty.
	if ( ! empty( trim( $l_s_meta ) ) ) {
		$l_s_message = anrghg_parse_message( $l_s_meta );
	}
	$l_s_meta = get_post_meta( $l_i_post_id, 'anrghg_thank_you_text', true ); // May be empty.
	if ( ! empty( trim( $l_s_meta ) ) ) {
		$l_s_message = anrghg_parse_message( anrghg_emulate_auto_p( $l_s_meta ) );
	}

	/**
	 * Ensures Elementor Integration if required.
	 */
	$p_s_content        = anrghg_elementor_integration_test( $p_s_content );
	$l_b_elementor_moot = anrghg_elementor_integration_assessment( $p_s_content );
	$l_b_elementor_mode = false;
	if ( $l_b_elementor_moot ) {
		$l_m_result = anrghg_elementor_integration_opening( $p_s_content );
		if ( ! ( false === $l_m_result ) ) {
			$p_s_content        = $l_m_result;
			$l_b_elementor_mode = true;
		}
	}

	/**
	 * Appends configured message to post.
	 */
	if ( $l_b_posts && is_single() ) {
		if ( empty( $l_s_message ) ) {
			$l_s_message = anrghg_parse_message(
				anrghg_emulate_auto_p(
					anrghg_apply_config( 'anrghg_thank_you_content' )
				)
			);
		}
		$l_s_message_box  = '<div class="anrghg-thank-you anrghg-post" tabindex="0">';
		$l_s_message_box .= '<div class="anrghg-inner-thank-you">';
		$l_s_message_box .= $l_s_message . "</div></div><!--.anrghg-thank-you-->\r\n\r\n";
		$l_s_message_box  = apply_filters(
			'anrghg_thank_you_post_hook',
			$l_s_message_box,
			$l_s_message
		);
		$p_s_content     .= $l_s_message_box;
	}

	/**
	 * Appends configured message to page.
	 */
	if ( $l_b_pages && is_singular( 'page' ) ) {
		if ( empty( $l_s_message ) ) {
			$l_s_message = anrghg_parse_message(
				anrghg_apply_config( 'anrghg_thank_you_content_page' )
			);
		}
		$l_s_message_box  = '<div class="anrghg-thank-you anrghg-page" tabindex="0">';
		$l_s_message_box .= '<div class="anrghg-inner-thank-you">';
		$l_s_message_box .= $l_s_message . "</div></div><!--.anrghg-thank-you-->\r\n";
		$l_s_message_box  = anrghg_minilight(
			'html',
			apply_filters(
				'anrghg_thank_you_page_hook',
				$l_s_message_box,
				$l_s_message
			)
		);
		$p_s_content     .= $l_s_message_box;
	}

	/**
	 * Completes Elementor Integration if applicable.
	 */
	if ( $l_b_elementor_mode ) {
		$p_s_content = anrghg_elementor_integration_closing( $p_s_content );
	}

	return $p_s_content;
}
add_filter(
	'plugins_loaded',
	function() {
		$l_i_priority = anrghg_config_priority(
			'anrghg_thank_you_priority_select',
			'anrghg_thank_you_priority_input'
		);
		anrghg_filter_content( 'anrghg_thank_you_message', $l_i_priority );
	}
);
