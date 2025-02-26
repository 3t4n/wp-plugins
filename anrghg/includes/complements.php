<?php
/**
 * Complements as notes and sources.
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
 * Processes complements to AMP compatible notes and sources.
 *
 * @since 0.9.0
 * Processes complements based on heuristics.
 *
 * This plugin does not rely on the WordPress Shortcodes API. Here’s why.
 * Shortcodes cannot be used to reliably process inline notes and sources
 * since this scheme is disabled in forms set up using the WPForms plugin
 * and possibly many if not all other plugins.
 *
 * Also, available options are too restricted and exclude preferred ones.
 * The shortcode API fails on Non-Latin shortcodes, and it cannot process
 * delimiters made of punctuation characters; it is neither versatile nor
 * internationalized.
 *
 * Additionally, registered shortcodes are removed from other usages such
 * as schema and meta descriptions. Appropriate for most shortcodes, this
 * policy may not be so for sources. After stripping these off, a content
 * might convey some misconception of the content as containing unsourced
 * statements, which may harm the website’s overall reputation.
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * NOTE ABOUT MULTIPAGE POSTS: ‘Page break’ is a bogus feature and should
 * never be used. Multipage posts are reported not to be properly indexed
 * @link https://wordpress.com/forums/topic/google-not-indexing-multi-page-posts-properly/
 * and they are not properly navigatable either, with page numbers at the
 * bottom only, and no distinctive head zone for the extra pages.
 * Being able to read the whole content merely by scrolling is much more
 * user friendly. Consistently, implementing anything specifically for
 * multipage posts would be wasting the time of all involved parties,
 * which is why WordPress did not properly implement its multipage
 * feature in the first place.
 * Ability to show all notes and sources of a multipage post at the bottom of the last page.
 * @reporter** @nootropixcom
 * @link https://wordpress.org/support/topic/show-footnotes-only-on-last-pae/
 * @link https://wordpress.org/support/topic/show-footnotes-on-final-page-of-post/
 *
 * NOTE ABOUT OPTIONS TO OPEN LINKS IN A NEW TAB: This is handled by other
 * plugins if not by the post author.
 * @reporter** @manouapple
 * @link https://wordpress.org/support/topic/link-opening-to-new-tab/
 * @link https://wordpress.org/plugins/open-external-links-in-a-new-window/
 * @link https://typo3-english.typo3.narkive.com/MK8G3TVq/typo3-target-attribue-is-not-xhtml-compliant
 *
 * @param  string $p_s_content        Post/page with inline complements.
 * @return string $p_s_content        Post/page with anchors (at least).
 */
function anrghg_process_complements( $p_s_content ) {
	global $g_a_anrghg_config, $g_a_anrghg_post_reuse, $g_s_anrghg_footer, $g_m_unbalanced_delim;
	$l_i_post_id = get_the_ID();

	/**
	 * Deactivates complement processing on specific pages.
	 *
	 * @since 0.53.0
	 * @reporter** @enquirer32
	 * @link https://wordpress.org/support/topic/tell-footnotes-not-to-parse-a-page/
	 * @reporter** @morsagmon
	 * @link https://wordpress.org/support/topic/skip-the-password-reset-page-of-emembership-plugin/
	 * Based on post ID, as configured in the settings, in comma-separated format,
	 * or as configured in the related configuration section in the Post Meta box.
	 */
	$l_b_process_complements = true;
	$l_i_post_id             = get_the_ID();
	$l_s_excluded_posts      = anrghg_apply_config( 'anrghg_complements_excluded_posts' );
	if ( ! empty( $l_s_excluded_posts ) ) {
		$l_a_excluded_posts = explode( ',', $l_s_excluded_posts );
		foreach ( $l_a_excluded_posts as $l_s_post ) {
			if ( intval( trim( $l_s_post ) ) === $l_i_post_id ) {
				return $p_s_content;
			}
		}
	}
	if ( 'false' === get_post_meta( $l_i_post_id, 'anrghg_process_complements', true ) ) {
		return $p_s_content;
	}

	/**
	 * Switches AMP compatibility mode on.
	 *
	 * AMP compatibility requested by users of the Footnotes plugin.
	 *
	 * @contributor** @martinneumannat
	 * @link https://wordpress.org/support/topic/making-it-amp-compatible/
	 * @reporter** @psykonevro
	 * @link https://wordpress.org/support/topic/footnotes-is-not-amp-compatible/
	 * @reporter** keshavgupta
	 * @link https://wordpress.org/support/topic/footnotes-plugin-is-not-working-on-amp/
	 * @reporter** @wisenilesh
	 * @link https://wordpress.org/support/topic/plugin-not-working-properly-on-amp-pages/
	 * @reporter** @cma01
	 * @link https://wordpress.org/support/topic/plugin-doesnt-operate-on-amp-version/
	 * @reporter** @yunetwork
	 * @link https://wordpress.org/support/topic/not-working-with-amp-pages/
	 *
	 * Implementation fostered by @martinneumannat from the Footnotes community.
	 * @contributor** @martinneumannat
	 * @link https://wordpress.org/support/topic/footnotes-is-not-amp-compatible/#post-13819014
	 *
	 * Implementation fostered by @milindmore22 and @westonruter from AMP Project.
	 * @contributor** @milindmore22
	 * @link https://github.com/ampproject/amp-wp/issues/5913#issuecomment-785306933
	 * @link https://github.com/markcheret/footnotes/issues/48#issuecomment-814193614
	 * @contributor** @westonruter
	 * @link https://github.com/ampproject/amp-wp/issues/5913#issuecomment-785419655
	 *
	 * The function `amp_is_request()` is an alias of `is_amp_endpoint()`.
	 * @link https://amp-wp.org/reference/function/amp_is_request/
	 * @link https://amp-wp.org/reference/function/is_amp_endpoint/
	 */
	if ( did_action( 'wp' ) && function_exists( 'amp_is_request' ) ) {
		$l_b_amp_active = amp_is_request();
	} else {
		$l_b_amp_active = false;
	}

	/**
	 * Collects the configuration values.
	 *
	 * @see anrghg_reusable_complements().
	 * Complement name start and end delimiters:
	 */
	$l_a_complement_delims           = anrghg_get_complement_delimiters();
	$l_s_tooltip_end                 = $l_a_complement_delims[6];
	$l_s_list_link_start             = $l_a_complement_delims[7];
	$l_s_list_link_end               = $l_a_complement_delims[8];
	$l_i_numbering_note              = (int) anrghg_apply_config( 'anrghg_note_numbering_system' );
	$l_i_numbering_source            = (int) anrghg_apply_config( 'anrghg_source_numbering_system' );
	$l_i_anchor_spacing_mode         = (int) anrghg_apply_config( 'anrghg_complement_anchor_spacing' );
	$l_b_anchor_space                = 2 === $l_i_anchor_spacing_mode;
	$l_b_word_joiner                 = (bool) anrghg_apply_config( 'anrghg_complement_anchor_prefix_word_joiner' );
	$l_b_anchor_tooltips             = (bool) anrghg_apply_config( 'anrghg_anchor_tooltips_active' );
	$l_b_anchor_tooltips_tap_display = (bool) anrghg_apply_config( 'anrghg_display_anchor_tooltips_on_tap' );
	$l_s_padding_top                 = (int) anrghg_apply_config( 'anrghg_backlink_tooltip_padding_top' ) . 'px';
	$l_s_padding_start               = (int) anrghg_apply_config( 'anrghg_backlink_tooltip_padding_start' ) . 'px';
	$l_s_padding_end                 = (int) anrghg_apply_config( 'anrghg_backlink_tooltip_padding_end' ) . 'px';
	$l_s_padding_bottom              = (int) anrghg_apply_config( 'anrghg_backlink_tooltip_padding_bottom' ) . 'px';
	$l_b_word_joiner                 = (bool) anrghg_apply_config( 'anrghg_complement_anchor_prefix_word_joiner' );
	$l_b_tt_more_link_active_note    = (bool) anrghg_apply_config( 'anrghg_note_tooltip_list_link_active' );
	$l_b_tt_more_link_active_source  = (bool) anrghg_apply_config( 'anrghg_source_tooltip_list_link_active' );
	$l_s_tt_more_link_text_note      = htmlentities( anrghg_apply_config( 'anrghg_note_tooltip_list_link_text' ) );
	$l_s_tt_more_link_text_source    = htmlentities( anrghg_apply_config( 'anrghg_source_tooltip_list_link_text' ) );
	$l_s_section_end_code_name       = anrghg_apply_config( 'anrghg_complement_section_end_name' );
	$l_s_referrer_prefix_note        = htmlentities( anrghg_apply_config( 'anrghg_note_anchor_prefix' ) );
	$l_s_referrer_suffix_note        = htmlentities( anrghg_apply_config( 'anrghg_note_anchor_suffix' ) );
	$l_s_referrer_prefix_source      = htmlentities( anrghg_apply_config( 'anrghg_source_anchor_prefix' ) );
	$l_s_referrer_suffix_source      = htmlentities( anrghg_apply_config( 'anrghg_source_anchor_suffix' ) );
	$l_s_anchor_aria_label_note      = htmlentities( anrghg_apply_config( 'anrghg_note_anchor_aria_label' ) );
	$l_s_anchor_aria_label_source    = htmlentities( anrghg_apply_config( 'anrghg_source_anchor_aria_label' ) );
	$l_s_list_aria_label_note        = htmlentities( anrghg_apply_config( 'anrghg_note_list_number_aria_label' ) );
	$l_s_list_aria_label_source      = htmlentities( anrghg_apply_config( 'anrghg_source_list_number_aria_label' ) );
	$l_s_referrer_separator          = htmlentities( anrghg_apply_config( 'anrghg_adjacent_complement_anchor_separator' ) );
	$l_s_id_prefix_note              = rawurlencode( anrghg_apply_config( 'anrghg_note_url_id_prefix' ) );
	$l_s_id_prefix_source            = rawurlencode( anrghg_apply_config( 'anrghg_source_url_id_prefix' ) );
	$l_s_anchor_id_prefix            = rawurlencode( anrghg_apply_config( 'anrghg_complement_anchor_url_id_prefix' ) );
	// Disambiguate twice to eliminate any odds of duplicate IDs.
	if ( $l_s_id_prefix_note === $l_s_anchor_id_prefix || $l_s_id_prefix_source === $l_s_anchor_id_prefix ) {
		$l_s_anchor_id_prefix .= '_';
	}
	if ( $l_s_id_prefix_note === $l_s_anchor_id_prefix || $l_s_id_prefix_source === $l_s_anchor_id_prefix ) {
		$l_s_anchor_id_prefix .= '_';
	}
	$l_s_connector = rawurlencode( anrghg_apply_config( 'anrghg_fragment_id_separator' ) );
	// The separator is required for disambiguation in edge cases and needs to fall back from empty.
	if ( empty( $l_s_connector ) ) {
		$l_s_connector = '-';
	}
	$l_b_list_group_heading        = (bool) anrghg_apply_config( 'anrghg_complement_list_grouping_active' );
	$l_s_list_group_heading        = htmlentities( anrghg_apply_config( 'anrghg_complement_list_group_heading' ) );
	$l_s_list_label_aria_note      = htmlentities( anrghg_apply_config( 'anrghg_note_list_label_aria_label' ) );
	$l_s_list_label_note           = htmlentities( anrghg_apply_config( 'anrghg_note_list_label_plural' ) );
	$l_s_2_list_label_note         = htmlentities( anrghg_apply_config( 'anrghg_note_list_label_dual' ) );
	$l_s_1_list_label_note         = htmlentities( anrghg_apply_config( 'anrghg_note_list_label_singular' ) );
	$l_s_list_label_note_post_meta = htmlentities( get_post_meta( $l_i_post_id, 'anrghg_note_list_label', true ) );
	if ( ! empty( $l_s_list_label_note_post_meta ) ) {
		$l_s_1_list_label_note = $l_s_list_label_note_post_meta;
		$l_s_2_list_label_note = $l_s_list_label_note_post_meta;
		$l_s_list_label_note   = $l_s_list_label_note_post_meta;
	}
	$l_s_list_label_aria_source      = htmlentities( anrghg_apply_config( 'anrghg_source_list_label_aria_label' ) );
	$l_s_list_label_source           = htmlentities( anrghg_apply_config( 'anrghg_source_list_label_plural' ) );
	$l_s_2_list_label_source         = htmlentities( anrghg_apply_config( 'anrghg_source_list_label_dual' ) );
	$l_s_1_list_label_source         = htmlentities( anrghg_apply_config( 'anrghg_source_list_label_singular' ) );
	$l_s_list_label_source_post_meta = htmlentities( get_post_meta( $l_i_post_id, 'anrghg_source_list_label', true ) );
	if ( ! empty( $l_s_list_label_source_post_meta ) ) {
		$l_s_1_list_label_source = $l_s_list_label_source_post_meta;
		$l_s_2_list_label_source = $l_s_list_label_source_post_meta;
		$l_s_list_label_source   = $l_s_list_label_source_post_meta;
	}
	$l_s_writing_direction_note    = get_post_meta( $l_i_post_id, 'anrghg_writing_dir_notes', true );
	$l_s_writing_direction_source  = get_post_meta( $l_i_post_id, 'anrghg_writing_dir_sources', true );
	$l_b_gen_tip_active_note       = (bool) anrghg_apply_config( 'anrghg_generic_note_tooltip_active' );
	$l_s_gen_tip_content_note      = sprintf( anrghg_apply_config( 'anrghg_generic_note_tooltip_content' ), $l_s_list_link_start, $l_s_list_link_end );
	$l_b_gen_tip_active_source     = (bool) anrghg_apply_config( 'anrghg_generic_source_tooltip_active' );
	$l_s_gen_tip_content_source    = sprintf( anrghg_apply_config( 'anrghg_generic_source_tooltip_content' ), $l_s_list_link_start, $l_s_list_link_end );
	$l_i_note_list_collapse_config = (int) anrghg_apply_config( 'anrghg_note_list_collapsing' );
	$l_s_note_list_collapse_post   = get_post_meta( $l_i_post_id, 'anrghg_note_list_collapse', true );
	switch ( $l_s_note_list_collapse_post ) {
		case 'collapsed':
			$l_i_note_list_collapse_config = 1;
			break;
		case 'expanded':
			$l_i_note_list_collapse_config = -1;
			break;
		case 'uncollapsible':
			$l_i_note_list_collapse_config = 0;
			break;
	}
	$l_b_collapsible_note = (bool) $l_i_note_list_collapse_config;
	$l_b_collapsed_note   = 1 === $l_i_note_list_collapse_config;

	$l_i_source_list_collapse_config = (int) anrghg_apply_config( 'anrghg_source_list_collapsing' );
	$l_s_source_list_collapse_post   = get_post_meta( $l_i_post_id, 'anrghg_source_list_collapse', true );
	switch ( $l_s_source_list_collapse_post ) {
		case 'collapsed':
			$l_i_source_list_collapse_config = 1;
			break;
		case 'expanded':
			$l_i_source_list_collapse_config = -1;
			break;
		case 'uncollapsible':
			$l_i_source_list_collapse_config = 0;
			break;
		// The 'null' value has no default.
	}
	$l_b_collapsible_source = (bool) $l_i_source_list_collapse_config;
	$l_b_collapsed_source   = 1 === $l_i_source_list_collapse_config;

	$l_b_fully_expand_note      = (bool) anrghg_apply_config( 'anrghg_full_note_list_expand_from_anchor' );
	$l_s_fully_expand_note_post = get_post_meta( $l_i_post_id, 'anrghg_note_list_full_expansion', true );
	switch ( $l_s_fully_expand_note_post ) {
		case 'true':
			$l_b_fully_expand_note = true;
			break;
		case 'false':
			$l_b_fully_expand_note = false;
			break;
		// The 'null' value has no default.
	}
	$l_b_fully_expand_source      = (bool) anrghg_apply_config( 'anrghg_full_source_list_expand_from_anchor' );
	$l_s_fully_expand_source_post = get_post_meta( $l_i_post_id, 'anrghg_source_list_full_expansion', true );
	switch ( $l_s_fully_expand_source_post ) {
		case 'true':
			$l_b_fully_expand_source = true;
			break;
		case 'false':
			$l_b_fully_expand_source = false;
			break;
		// The 'null' value has no default.
	}
	$l_s_backlink_tooltip_first = htmlentities( anrghg_apply_config( 'anrghg_backlink_rich_tooltip_first' ) );
	$l_s_backlink_tooltip_last  = htmlentities( anrghg_apply_config( 'anrghg_backlink_rich_tooltip_last' ) );
	$l_s_backlink_tooltip_mode  = (int) anrghg_apply_config( 'anrghg_backlink_plain_tooltip_mode' );
	switch ( $l_s_backlink_tooltip_mode ) {
		case 2:
			$l_s_backlink_tooltip_text = htmlentities( anrghg_apply_config( 'anrghg_backlink_plain_tooltip_verbose' ) );
			break;
		case 1:
			$l_s_backlink_tooltip_text = htmlentities( anrghg_apply_config( 'anrghg_backlink_plain_tooltip_symbolic' ) );
			break;
		case 0:
		default:
			$l_s_backlink_tooltip_text = '';
	}
	$l_b_list_display_urls_note   = (bool) anrghg_apply_config( 'anrghg_display_urls_note_list' );
	$l_b_list_display_urls_source = (bool) anrghg_apply_config( 'anrghg_display_urls_source_list' );
	$l_s_display_checkbox_id      = '';

	/**
	 * Assesses footer deferral for the post or page.
	 *
	 * @since 0.11.0 Code-based.
	 * @since 0.26.0 Configuration in settings.
	 * @since 0.30.0 Configuration in meta box.
	 * @see * Assesses footer deferral for the section.
	 */
	$l_s_footer_deferral_config = $g_a_anrghg_config['anrghg_complement_list_footer_deferral'];
	$l_b_footer_deferral        = (bool) $l_s_footer_deferral_config;
	if ( '-1' === $l_s_footer_deferral_config ) {
		$l_b_footer_deferral = false; // Backcompat with pre-0.30.0 config.
	}
	$l_s_footer_deferral_post_meta = get_post_meta( $l_i_post_id, 'anrghg_complement_list_footer_deferral', true );
	if ( ! empty( $l_s_footer_deferral_post_meta ) ) {
		switch ( $l_s_footer_deferral_post_meta ) {
			case 'true':
				$l_b_footer_deferral = true;
				break;
			case 'false':
				$l_b_footer_deferral = false;
				break;
			// May be 'null' for ‘Keep as configured’.
		}
	}
	$l_s_footer_deferral_code = '[complement_list_in_footer]'; // Legacy support.
	if ( $l_b_footer_deferral ) {
		$l_b_footer  = true;
		$p_s_content = str_replace( $l_s_footer_deferral_code, '', $p_s_content );
	} else {
		if ( false === strpos( $p_s_content, $l_s_footer_deferral_code ) ) {
			$l_b_footer = false;
		} else {
			$l_b_footer  = true;
			$p_s_content = str_replace( $l_s_footer_deferral_code, '', $p_s_content );
		}
	}

	/**
	 * Helps test Elementor integration.
	 *
	 * @since 0.30.0
	 * @since 0.56.0 Modularized.
	 * @see * Assesses Elementor integration.
	 * @see * Integrates the lists in Elementor leftover.
	 * @see * Completes Elementor integration if applicable.
	 */
	$p_s_content = anrghg_elementor_integration_test( $p_s_content );

	/**
	 * Assesses Elementor integration.
	 *
	 * @since 0.30.0
	 * @since 0.56.0 Modularized.
	 * @see * Helps test Elementor integration.
	 * @see * Integrates the lists in Elementor leftover.
	 * @see * Completes Elementor integration if applicable.
	 */
	$l_b_elementor_moot = anrghg_elementor_integration_assessment( $p_s_content );

	/**
	 * Cleans the content.
	 */
	$p_s_content = anrghg_remove_block_comment_nodes( $p_s_content );
	$p_s_content = anrghg_clean_field_values( $p_s_content );

	/**
	 * Cuts the post into sections based on top-level subheadings.
	 *
	 * @since 0.35.0
	 */
	if ( anrghg_apply_config( 'anrghg_subheadings_as_section_dividers' ) ) {
		$l_i_level   = anrghg_determine_level_top_heading( $p_s_content );
		$p_s_content = preg_replace( '/(<h' . $l_i_level . '[>\s])/i', '[anrghg_top_level_section]$1', $p_s_content );
		$p_s_content = preg_replace( '/\[anrghg_top_level_section\]/', '', $p_s_content, 1 );
		$p_s_content = str_replace( '[anrghg_top_level_section]', '[anrghg_section]', $p_s_content );
	}

	/**
	 * Prepares dissecting the post into sections as applicable.
	 *
	 * @since 0.9.0
	 * @reporter** @grflukas
	 * @link https://wordpress.org/support/topic/multiple-reference-containers-in-single-post/
	 * @since 0.30.0
	 * Process section separators with arguments for special list labels.
	 * Arguments may be added manually, or automatically using the block.
	 * The argument order is constrained. Key names aim at ease of input.
	 * As this is not a registered shortcode, values are delimited by `|`
	 * not `"` to work around WPTexturize. `|` is escaped at block input.
	 * @since 0.50.0 Remove complements from input field values, for easy
	 * processing of the form, not to fix issues with unwanted markup.
	 */
	$l_a_sections = array(
		'content'         => array(),
		'label_note'      => array(),
		'label_source'    => array(),
		'dir_note'        => array(),
		'dir_source'      => array(),
		'collapse_note'   => array(),
		'collapse_source' => array(),
		'in_footer'       => array(),
		'remainder'       => false,
	);

	// phpcs:disable
	$l_a_sections['content'        ][0] = '';
	$l_a_sections['label_note'     ][0] = '';
	$l_a_sections['label_source'   ][0] = '';
	$l_a_sections['dir_note'       ][0] = '';
	$l_a_sections['dir_source'     ][0] = '';
	$l_a_sections['collapse_note'  ][0] = '';
	$l_a_sections['collapse_source'][0] = '';
	$l_a_sections['in_footer'      ][0] = '';
	$l_b_multiple_sections              = false;
	// phpcs:enable

	/**
	 * Parses HTML positioners output by block.
	 *
	 * @since 0.58.3
	 */
	if ( false !== strpos( $p_s_content, '<div class="wp-block-anrghg-notes-and-sources' ) ) {
		$l_a_data_attributes    = array(
			'data-note-dir'       => 'dir_note',
			'data-source-dir'     => 'dir_source',
			'data-note-display'   => 'collapse_note',
			'data-source-display' => 'collapse_source',
			'data-footer'         => 'in_footer',
		);
		$l_i_number_of_sections = preg_match_all(
			'/<div class="wp-block-anrghg-notes-and-sources([^>]+)><div data-anrghg="note-label">(.*?)<\/div><div data-anrghg="source-label">(.*?)<\/div><\/div>/s',
			$p_s_content,
			$l_a_matches,
			PREG_OFFSET_CAPTURE
		);
		if ( 2 <= $l_i_number_of_sections ) {
			$l_b_multiple_sections = true;
		}
		$l_i_offset = 0;
		foreach ( $l_a_matches[0] as $l_i_index => $l_a_match ) {
			list(
				$l_s_section_end_delim,
				$l_i_pos
			)                               = $l_a_match;
			$l_a_sections['content'][]      = substr( $p_s_content, $l_i_offset, $l_i_pos - $l_i_offset );
			$l_a_sections['label_note'][]   = (string) $l_a_matches[2][ $l_i_index ][0];
			$l_a_sections['label_source'][] = (string) $l_a_matches[3][ $l_i_index ][0];
			foreach ( $l_a_data_attributes as $l_s_data => $l_s_key ) {
				if ( preg_match( '/ ' . $l_s_data . '="([^"]+)"/s', $l_a_matches[1][ $l_i_index ][0], $l_a_data_matches ) ) {
					$l_a_sections[ $l_s_key ][] = $l_a_data_matches[1];
				} else {
					$l_a_sections[ $l_s_key ][] = '';
				}
			}
			$l_a_sections['remainder'][] = false;
			$l_i_len_delim               = strlen( $l_s_section_end_delim );
			$l_i_offset                  = $l_i_pos + $l_i_len_delim;
		}
		if ( $l_i_offset < strlen( $p_s_content ) ) {
			$l_a_sections['content'][]         = substr( $p_s_content, $l_i_offset );
			$l_a_sections['label_note'][]      = '';
			$l_a_sections['label_source'][]    = '';
			$l_a_sections['dir_note'][]        = '';
			$l_a_sections['dir_source'][]      = '';
			$l_a_sections['collapse_note'][]   = '';
			$l_a_sections['collapse_source'][] = '';
			$l_a_sections['in_footer'][]       = '';
			$l_a_sections['remainder'][]       = true;
			$l_a_sections['remainder'][]       = true; // One more.
		}
	} else {

		/**
		 * Parses square-bracketed positioners as input in Classic Editor.
		 */
		$section_end_regex = anrghg_regex_ready( $l_s_section_end_code_name );
		if ( false !== preg_match( '/\[\s*(anrghg_section|' . $section_end_regex . ')/i', $p_s_content ) ) {
			$l_i_number_of_sections = preg_match_all(
				'/\[\s*(?:anrghg_section|' . $section_end_regex . ')(?:\s+_11\s*=\s*\|([^|]+?)\|)?(?:\s+_12\s*=\s*\|([^|]+?)\|)?(?:\s+_20\s*=\s*\|([^|]+?)\|)?(?:\s+_21\s*=\s*\|([^|]+?)\|)?(?:\s+_22\s*=\s*\|([^|]+?)\|)?(?:\s+_30\s*=\s*\|([^|]+?)\|)?(?:\s+_31\s*=\s*\|([^|]+?)\|)?(?:\s+_32\s*=\s*\|([^|]+?)\|)?(?:\s+_40\s*=\s*\|([^|]+?)\|)?(?:\s+_1\s*=\s*\|([^|]+?)\|)?(?:\s+_2\s*=\s*\|([^|]+?)\|)?(?:\s+_3\s*=\s*\|([^|]+?)\|)?(?:\s+_4\s*=\s*\|([^|]+?)\|)?(?:\s+_5\s*=\s*\|([^|]+?)\|)?\s*\]/si',
				$p_s_content,
				$l_a_matches,
				PREG_OFFSET_CAPTURE
			);
			if ( 2 <= $l_i_number_of_sections ) {
				$l_b_multiple_sections = true;
			}
			$l_i_offset = 0;
			foreach ( $l_a_matches[0] as $l_i_index => $l_a_match ) {
				list( $l_s_section_end_delim, $l_i_pos ) = $l_a_match;

				$l_a_sections['content'][]      = substr( $p_s_content, $l_i_offset, $l_i_pos - $l_i_offset );
				$l_a_sections['label_note'][]   = (string) $l_a_matches[1][ $l_i_index ][0]; // _11.
				$l_a_sections['label_source'][] = (string) $l_a_matches[2][ $l_i_index ][0]; // _12.

				$l_a_sections['dir_note'][]        = (int) $l_a_matches[3][ $l_i_index ][0]; // _20 (for manual use only).
				$l_a_sections['dir_source'][]      = (int) $l_a_matches[3][ $l_i_index ][0]; // _20 (for manual use only).
				$l_a_sections['dir_note'][]        = (int) $l_a_matches[4][ $l_i_index ][0]; // _21.
				$l_a_sections['dir_source'][]      = (int) $l_a_matches[5][ $l_i_index ][0]; // _22.
				$l_a_sections['collapse_note'][]   = (int) $l_a_matches[6][ $l_i_index ][0]; // _30 (for manual use only).
				$l_a_sections['collapse_source'][] = (int) $l_a_matches[6][ $l_i_index ][0]; // _30 (for manual use only).
				$l_a_sections['collapse_note'][]   = (int) $l_a_matches[7][ $l_i_index ][0]; // _31.
				$l_a_sections['collapse_source'][] = (int) $l_a_matches[8][ $l_i_index ][0]; // _32.
				$l_a_sections['in_footer'][]       = (int) $l_a_matches[9][ $l_i_index ][0]; // _40.

				if ( ! empty( $l_a_matches[10][ $l_i_index ][0] ) ) {
					$l_a_sections['label_note'][] = (string) $l_a_matches[10][ $l_i_index ][0]; // _1 (legacy).
				}
				if ( ! empty( $l_a_matches[11][ $l_i_index ][0] ) ) {
					$l_a_sections['label_source'][] = (string) $l_a_matches[11][ $l_i_index ][0]; // _2 (legacy).
				}
				if ( ! empty( $l_a_matches[12][ $l_i_index ][0] ) ) {
					$l_a_sections['dir_note'][] = (int) $l_a_matches[12][ $l_i_index ][0]; // _3 (legacy).
				}
				if ( ! empty( $l_a_matches[13][ $l_i_index ][0] ) ) {
					$l_a_sections['dir_source'][] = (int) $l_a_matches[13][ $l_i_index ][0]; // _4 (legacy).
				}
				if ( ! empty( $l_a_matches[14][ $l_i_index ][0] ) ) {
					$l_a_sections['in_footer'][] = (int) $l_a_matches[14][ $l_i_index ][0]; // _5 (legacy).
				}

				$l_a_sections['remainder'][] = false;
				$l_i_len_delim               = strlen( $l_s_section_end_delim );
				$l_i_offset                  = $l_i_pos + $l_i_len_delim;
			}

			if ( $l_i_offset < strlen( $p_s_content ) ) {
				$l_a_sections['content'][]         = substr( $p_s_content, $l_i_offset );
				$l_a_sections['label_note'][]      = '';
				$l_a_sections['label_source'][]    = '';
				$l_a_sections['dir_note'][]        = '';
				$l_a_sections['dir_source'][]      = '';
				$l_a_sections['collapse_note'][]   = '';
				$l_a_sections['collapse_source'][] = '';
				$l_a_sections['in_footer'][]       = '';
				$l_a_sections['remainder'][]       = true;
				$l_a_sections['remainder'][]       = true; // One more.
			}
		} else {

			/**
			 * Takes the whole content by lack of any section end positioner.
			 */
			$l_a_sections['content'][]   = $p_s_content;
			$l_a_sections['remainder'][] = true;
		}
	}

	/**
	 * Processes the sections or the whole content.
	 */
	$l_a_processed_sections = array();
	$l_i_list_id            = 1;
	foreach ( $l_a_sections['content'] as $l_i_section_index => $l_s_section ) {
		$l_a_note   = array();
		$l_a_source = array();

		/**
		 * Preprocesses the delimiters.
		 *
		 * This is required to intersperse anchor concatenators.
		 */
		$l_a_preprocessed = anrghg_preprocess_delimiters(
			$l_s_section,
			'_N_',
			$l_a_complement_delims[0],
			$l_a_complement_delims[1]
		);
		$l_s_section      = $l_a_preprocessed[0];
		$l_s_start_note   = $l_a_preprocessed[1];
		$l_s_end_note     = $l_a_preprocessed[2];

		$l_a_preprocessed = anrghg_preprocess_delimiters(
			$l_s_section,
			'_S_',
			$l_a_complement_delims[2],
			$l_a_complement_delims[3]
		);
		$l_s_section      = $l_a_preprocessed[0];
		$l_s_start_source = $l_a_preprocessed[1];
		$l_s_end_source   = $l_a_preprocessed[2];

		/**
		 * Intersperses anchor concatenators.
		 *
		 * @since 0.29.0
		 * @since 0.67.0 Support mixed anchor sequences.
		 */
		$l_s_section = preg_replace(
			'/(@@closing[^@]+@@)(@@opening[^@]+@@)/s',
			'$1<span class="anrghg-referrer-concatenator">' . $l_s_referrer_separator . '</span>$2',
			$l_s_section
		);

		/**
		 * Processes the complements.
		 *
		 * For sources to nest in notes, sources are processed first.
		 */
		for ( $l_i_type = 1; $l_i_type < 3; $l_i_type++ ) {
			$l_s_type          = 1 === $l_i_type ? 'source' : 'note';
			$l_s_opening_delim = ${"l_s_start_$l_s_type"};
			$l_s_closing_delim = ${"l_s_end_$l_s_type"};

			/**
			 * Collects complements with their offset.
			 */
			if ( false !== strpos( $l_s_section, $l_s_opening_delim ) ) {
				preg_match_all(
					'/' . $l_s_opening_delim . '(.+?)' . $l_s_closing_delim . '/s',
					$l_s_section,
					$l_a_matches,
					PREG_OFFSET_CAPTURE
				);

				/**
				 * Processes the complements.
				 */
				$l_a_complements = array(
					'cptext' => array(),
					'offset' => array(),
					'length' => array(),
					'numero' => array(),
					'subnum' => array(),
					'number' => array(),
				);
				foreach ( $l_a_matches[1] as $l_a_match ) {
					list(
						$l_s_complement,
						$l_i_position
					)                      = $l_a_match;
					$l_i_complement_length = strlen( $l_s_complement );
					if ( $l_i_complement_length ) {

						/**
						 * Parses the complement contents for reusables.
						 */
						$l_s_complement = anrghg_reusable_complements( $l_s_complement );

						/**
						 * Stores the data for assessment.
						 */
						$l_a_complements['cptext'][] = $l_s_complement;
						$l_a_complements['offset'][] = $l_i_position;
						$l_a_complements['length'][] = $l_i_complement_length;
						$l_a_complements['numero'][] = 0;
						$l_a_complements['subnum'][] = 1;
						$l_a_complements['number'][] = false;
					}
				}

				/**
				 * Processes the inline part.
				 *
				 * @since 0.9.0
				 */
				$l_i_numero             = 1;
				$l_i_offset             = 0;
				$l_i_len_process_delim  = strlen( $l_s_opening_delim );
				$l_i_collected_list_len = count( $l_a_complements['cptext'] );
				foreach ( $l_a_complements['cptext'] as $l_i_index => $l_s_complement ) {
					$l_i_position          = $l_a_complements['offset'][ $l_i_index ];
					$l_i_complement_length = $l_a_complements['length'][ $l_i_index ];
					if ( 0 === $l_a_complements['numero'][ $l_i_index ] ) {
						$l_a_complements['numero'][ $l_i_index ] = $l_i_numero;
						$l_a_complements['number'][ $l_i_index ] = 1;

						/**
						 * Combines identical complements.
						 *
						 * @since 0.31.0
						 * @reporter** @stowe
						 * @link https://wordpress.org/support/topic/repeat-references-of-a-single-source/
						 * @reporter** @hebhansen
						 * @link https://wordpress.org/support/topic/same-footnote-several-references/
						 * @reporter** @eno812
						 * @link https://wordpress.org/support/topic/multiple-references-for-the-same-citation/
						 * @reporter** @jadjournal
						 * @link https://wordpress.org/support/topic/footnote-is-duplicated-when-reference-is-used-for-multiple-times-in-an-article/
						 * @reporter** @stef83
						 * @link https://wordpress.org/support/topic/gleiche-referenz-ofters-auf-der-seite/
						 * @reporter** @companydebt
						 * @link https://wordpress.org/support/topic/duplicate-but-same-number/
						 * @reporter** @drjkiel
						 * @link https://wordpress.org/support/topic/duplicate-but-same-number/#post-14735105
						 */
						if ( anrghg_apply_config( 'anrghg_combine_identical_complements' ) ) {
							$l_i_sub_number = 1;
							for (
								$l_i_check = $l_i_index + 1;
								$l_i_check < $l_i_collected_list_len;
								$l_i_check++
							) {
								if ( $l_s_complement === $l_a_complements['cptext'][ $l_i_check ] ) {
									$l_i_sub_number++;
									$l_a_complements['numero'][ $l_i_check ] = $l_i_numero;
									$l_a_complements['subnum'][ $l_i_check ] = $l_i_sub_number;
									$l_a_complements['number'][ $l_i_index ] = $l_i_sub_number;
								}
							}
						}
					}
					$l_i_numero = $l_a_complements['numero'][ $l_i_index ];
					$l_i_subnum = $l_a_complements['subnum'][ $l_i_index ];
					$l_m_count  = $l_a_complements['number'][ $l_i_index ];

					/**
					 * Line-wraps visible URLs for Unicode-non-conformant browsers.
					 */
					if ( anrghg_apply_config( 'anrghg_url_wrap' ) ) {
						$l_s_complement = anrghg_line_wrap_urls( $l_s_complement );
					}

					/**
					 * Prepares the display number.
					 */
					$l_m_numero = anrghg_convert_number( $l_i_numero, ${"l_i_numbering_$l_s_type"} );

					/**
					 * Prepares the fragment identifier endpoint.
					 */
					$l_s_id_endpoint        = $l_s_connector . $l_i_post_id . $l_s_connector . $l_i_list_id;
					$l_s_id_endpoint       .= $l_s_connector . $l_m_numero;
					$l_s_id_prefix_endpoint = ${"l_s_id_prefix_$l_s_type"} . $l_s_id_endpoint;
					if ( 1 < $l_m_count || 1 < $l_i_subnum ) {
						$l_s_id_endpoint .= $l_s_connector . $l_i_subnum;
					}

					/**
					 * Composes the JS list ID.
					 */
					$l_s_post_list = (string) $l_i_post_id . '_' . $l_i_list_id;

					/**
					 * Prepares the list link arguments.
					 */
					$l_s_list_link_arguments = " href=\"#$l_s_id_prefix_endpoint\"";
					if ( ${"l_b_fully_expand_$l_s_type"} ) {
						if ( $l_b_amp_active ) {
							$l_s_list_link_arguments .= " on=\"tap:anrghg_toggle_$l_s_post_list.toggleChecked(force=true)\"";
						} else {
							$l_s_list_link_arguments .= " onclick=\"anrghgExpandComplementList$l_s_post_list()\"";
						}
					}

					/**
					 * Sets up generic tooltips.
					 *
					 * @since 0.22.0
					 * @reporter** @mushlih
					 * @link https://wordpress.org/support/topic/make-all-classes-the-same/
					 */
					if ( ${"l_b_gen_tip_active_$l_s_type"} ) {
						$l_s_tooltip_text = ${"l_s_gen_tip_content_$l_s_type"};
					} else {

						/**
						 * Sets up dedicated tooltip text.
						 *
						 * @since 0.9.0
						 * @reporter** @jbj2199
						 * @link https://wordpress.org/support/topic/change-tooltip-text/
						 */
						$l_i_length_tooltip_text = strpos( $l_s_complement, $l_s_tooltip_end );
						if ( $l_i_length_tooltip_text ) {
							$l_s_tooltip_text = substr( $l_s_complement, 0, $l_i_length_tooltip_text );
							if ( ${"l_b_tt_more_link_active_$l_s_type"} || $l_b_anchor_tooltips_tap_display ) {
								$l_s_tooltip_text .= ' <a class="anrghg-tooltip-more"' . $l_s_list_link_arguments;
								$l_s_tooltip_text .= '>' . ${"l_s_tt_more_link_text_$l_s_type"} . '</a>';
							}
						} else {
							$l_s_tooltip_text = $l_s_complement;
						}
					}

					/**
					 * Disambiguates source IDs in note tooltips.
					 *
					 * @since 1.14.1
					 */
					if ( 'note' === $l_s_type ) {
						$l_s_tooltip_text = preg_replace(
							'/(id="' . $l_s_anchor_id_prefix . $l_s_connector . $l_i_post_id . '[^"]+)"/',
							'$1' . $l_s_connector . '1"',
							$l_s_tooltip_text
						);
					}

					/**
					 * Marks up links to the complement in the list.
					 *
					 * @since 0.16.0
					 */
					$l_s_tooltip_text = str_replace(
						$l_s_list_link_start,
						"<a href='#$l_s_list_link_arguments'>",
						$l_s_tooltip_text
					);
					$l_s_tooltip_text = str_replace( $l_s_list_link_end, '</a>', $l_s_tooltip_text );

					/**
					 * Handles paragraph breaks.
					 */
					$l_s_tooltip_text = anrghg_emulate_paragraph_break( $l_s_tooltip_text );

					/**
					 * Determines tooltip length as of switching layout.
					 *
					 * @since 0.35.0
					 * @since 1.4.11 Debug tooltip of source nested in note.
					 * @since 1.5.4  Restrict evaluation to inner HTML…
					 * As sources may be nested in notes, those anchors and tooltips
					 * need to be removed prior to evaluating tooltip content length.
					 */
					$l_b_full_width        = false;
					$l_i_strlen_breakpoint = (int) anrghg_apply_config( 'anrghg_anchor_tooltip_str_length_breakpoint' );
					$l_s_tooltip_evaluate  = preg_replace( '/<span class="anrghg-complement-referrer.+?<br data-anrghg hidden \/><\/span>/', '', $l_s_tooltip_text );
					$l_s_tooltip_evaluate  = wp_strip_all_tags( $l_s_tooltip_evaluate );
					if ( strlen( $l_s_tooltip_evaluate ) > $l_i_strlen_breakpoint ) {
						$l_b_full_width = true;
					}

					/**
					 * Generates anchors.
					 *
					 * @since 0.50.0 Link text ARIA-hidden for screenreaders to read ARIA label instead.
					 * @since 0.68.0 Option to space out the anchor by justifying space character.
					 * @reporter** @pavelberg1
					 * @link https://wordpress.org/support/topic/non-breaking-space-after-the-indexes/
					 * @link https://www.influencewatch.org/non-profit/pew-charitable-trusts/
					 */
					$l_s_complement_markup = '<span class="anrghg-complement-referrer';
					if ( ! $l_b_full_width ) {
						$l_s_complement_markup .= ' anrghg-relative';
					}
					$l_s_complement_markup .= '">';
					if ( $l_b_anchor_space ) {
						$l_s_complement_markup .= ' ';
					}
					$l_s_complement_markup .= '<a target="_top"' . $l_s_list_link_arguments;
					$l_s_complement_markup .= " class=\"anrghg-referrer-$l_s_type\" aria-label=\"";
					$l_s_complement_markup .= sprintf( ${"l_s_anchor_aria_label_$l_s_type"}, $l_m_numero ) . '"';
					$l_s_complement_markup .= ' aria-hidden="true">';
					if ( $l_b_anchor_tooltips_tap_display ) {
						$l_s_display_checkbox_id = 'anrghg-tooltip-display-toggle' . $l_s_id_endpoint;
						$l_s_complement_markup  .= '<label for="' . $l_s_display_checkbox_id . '">';
					}
					if ( $l_b_word_joiner ) {
						$l_s_complement_markup .= '&#x2060;';
					}
					$l_s_complement_markup .= ${"l_s_referrer_prefix_$l_s_type"} . $l_m_numero;
					$l_s_complement_markup .= ${"l_s_referrer_suffix_$l_s_type"};
					if ( $l_b_anchor_tooltips_tap_display ) {
						$l_s_complement_markup .= '</label>';
					}
					$l_s_complement_markup .= '</a><span class="anrghg-offset-anchor" id="';
					$l_s_complement_markup .= $l_s_anchor_id_prefix . $l_s_id_endpoint . '"></span>';

					/**
					 * Generates tooltips.
					 *
					 * @since 0.9.0
					 * @since 0.70.0 Optionally toggle display on tap to work around
					 * context menu interference on mobiles.
					 * @reporter** @ashrudral
					 * @link https://wordpress.org/support/topic/tap-to-popup-instead-of-tap-and-hold/
					 */
					if ( $l_b_anchor_tooltips ) {
						$l_s_tooltip = '';
						if ( $l_b_anchor_tooltips_tap_display ) {
							$l_s_tooltip .= '<input type="checkbox" id="';
							$l_s_tooltip .= $l_s_display_checkbox_id;
							$l_s_tooltip .= '" class="anrghg-tooltip-display-toggle" />';
						}
						$l_s_tooltip .= '<span class="anrghg-complement-tooltip';
						if ( $l_b_full_width ) {
							$l_s_tooltip .= ' anrghg-fullwidth';
						}

						/**
						 * Sets writing direction.
						 *
						 * @since 0.9.0
						 * Support only writing direction set by page language.
						 * @since 0.29.0 Support writing direction tailored to
						 * the post and the complement type.
						 * @since 0.30.0 Support writing direction tailored to
						 * the instance from section divider arguments.
						 */
						$l_s_dir = ${"l_s_writing_direction_$l_s_type"};
						if ( 'null' === $l_s_dir ) {
							$l_s_dir = '';
						}
						if ( isset( $l_a_sections[ "dir_$l_s_type" ][ $l_i_section_index ] ) ) {
							$l_s_block_dir = $l_a_sections[ "dir_$l_s_type" ][ $l_i_section_index ];
							switch ( $l_s_block_dir ) {
								case -1:
									$l_s_dir = 'rtl';
									break;
								case 1:
									$l_s_dir = 'ltr';
									break;
								// May be empty.
							}
						}
						if ( ! empty( $l_s_dir ) ) {
							$l_s_tooltip .= '" dir="' . $l_s_dir;
						}

						/**
						 * Inline CSS to debug internal CSS in note lists.
						 *
						 * @since 1.14.1
						 */
						$l_s_tooltip .= "\" style=\"padding-top:$l_s_padding_top;";
						$l_s_tooltip .= "padding-inline-start:$l_s_padding_start;";
						$l_s_tooltip .= "padding-inline-end:$l_s_padding_end;";
						$l_s_tooltip .= "padding-bottom:$l_s_padding_bottom;\">";

						if ( $l_b_anchor_tooltips_tap_display ) {
							$l_s_tooltip .= '<label for="' . $l_s_display_checkbox_id . '">';
							$l_s_tooltip .= '<span class="anrghg-tooltip-close-button"></span>';
							$l_s_tooltip .= '</label>';
						}

						$l_s_tooltip .= $l_s_tooltip_text . '</span>';

						/**
						 * Inserts the tooltip.
						 */
						$l_s_complement_markup .= anrghg_minilight(
							'html',
							apply_filters(
								'anrghg_anchor_tooltip_hook',
								$l_s_tooltip,
								$l_s_tooltip_text,
								$l_s_dir,
								$l_b_full_width,
								$l_s_display_checkbox_id,
								$l_b_anchor_tooltips_tap_display
							)
						);
					}

					/**
					 * Marks the end of the processed complement for late removal.
					 *
					 * @since 0.62.0 Add identifying tag near the end.
					 */
					$l_s_complement_markup .= '<br data-anrghg hidden /></span>';

					/**
					 * Inserts the anchor or anchor-tooltip pair.
					 */
					$l_s_section = substr_replace(
						$l_s_section,
						$l_s_complement_markup,
						$l_i_position - $l_i_len_process_delim + $l_i_offset,
						$l_i_complement_length + ( $l_i_len_process_delim * 2 )
					);
					$l_i_offset -= $l_i_complement_length + ( $l_i_len_process_delim * 2 );
					$l_i_offset += strlen( $l_s_complement_markup );

					$l_i_numero++;
				}

				/**
				 * Prepares data for lists.
				 */
				${"l_a_$l_s_type"}         = $l_a_complements;
				${"l_i_list_id_$l_s_type"} = $l_i_list_id;

				$l_i_list_id++;
			}
		}

		/**
		 * Assesses footer deferral for lists in the current section.
		 *
		 * @since 0.30.0 Configuration in block.
		 * The ‘Keep as configured’ value 'null' is not output.
		 * @see * Assesses footer deferral for the post.
		 */
		if ( isset( $l_a_sections['in_footer'][ $l_i_section_index ] ) ) {
			if ( 'true' === $l_a_sections['in_footer'][ $l_i_section_index ] ) {
				$l_b_footer = true;
			}
			if ( 1 === $l_a_sections['in_footer'][ $l_i_section_index ] ) {
				$l_b_footer = true;
			}
			if ( 'false' === $l_a_sections['in_footer'][ $l_i_section_index ] ) {
				$l_b_footer = false;
			}
			if ( 0 === $l_a_sections['in_footer'][ $l_i_section_index ] ) {
				$l_b_footer = false;
			}
		}

		/**
		 * Integrates the lists in Elementor leftover.
		 *
		 * @see * Assesses Elementor integration.
		 * @see * Completes Elementor integration if applicable.
		 */
		$l_b_elementor_mode = false;
		if ( $l_b_elementor_moot && $l_a_sections['remainder'][ $l_i_section_index ] && ! $l_b_footer ) {
			$l_m_result = anrghg_elementor_integration_opening( $l_s_section );
			if ( false !== $l_m_result ) {
				$l_s_section        = $l_m_result;
				$l_b_elementor_mode = true;
			}
		}

		/**
		 * Determines the heading level.
		 *
		 * @since 0.33.0
		 * @since 0.36.0 Keep last instance at top level.
		 * @since 0.55.2 Debug heading level downgrading.
		 * @since 0.63.0 Settings to choose HTML element and font size of list label and group label.
		 * The minimum is 0 for ‘keep automation’.
		 * The maximum is 7 for ‘use a div instead’.
		 */
		$l_i_group_heading_element = (int) anrghg_apply_config( 'anrghg_list_group_heading_element' );
		if ( 0 > $l_i_group_heading_element ) {
			$l_i_group_heading_element = 0;
		}
		if ( 7 < $l_i_group_heading_element ) {
			$l_i_group_heading_element = 7;
		}
		if ( ! $l_i_group_heading_element ) {
			$l_i_downgrade = 0;
			if ( $l_b_multiple_sections ) {
				$l_i_downgrade = 1;
			}
			$l_i_sect_h_level = anrghg_determine_level_top_heading( $l_s_section ) + $l_i_downgrade;
			if ( $l_i_sect_h_level > 6 ) {
				$l_i_sect_h_level = 6;
			}
		}

		/**
		 * Inserts list group heading if applicable.
		 *
		 * @since 0.33.0
		 * @since 0.63.0 Setting to choose HTML element of group label.
		 */
		if ( $l_b_list_group_heading && ! empty( $l_a_note ) && ! empty( $l_a_source ) && ! $l_b_footer ) {
			if ( ! $l_i_group_heading_element ) {
				if ( 6 === $l_i_sect_h_level ) {
					$l_i_sect_h_level = 5;
				}
				$l_s_group_heading_element = 'h' . $l_i_sect_h_level;
				$l_i_sect_h_level++;
			} else {
				if ( 7 === $l_i_group_heading_element ) {
					$l_s_group_heading_element = 'div';
				} else {
					$l_s_group_heading_element = 'h' . $l_i_group_heading_element;
				}
			}
			$l_s_section .= '<' . $l_s_group_heading_element . ' class="anrghg-list-heading anrghg-top-level-list-heading"';
			$l_s_section .= ' tabindex="0">';
			$l_s_section .= $l_s_list_group_heading . '</' . $l_s_group_heading_element . '>';
		}

		/**
		 * 1: Generates note list and appends it to section.
		 * 2: Appends source list to note list.
		 *
		 * Although tabular, the data is not displayed in a table but in divs
		 * for a more fluid layout, supporting a multi column display option,
		 * and for accessing complements by opening a direct link. This needs
		 * hard links and use of the `:target` selector (requires hard links)
		 * as documented in the CSS section.
		 *
		 * @reporter** @1a-spielwiese
		 * @link https://wordpress.org/support/topic/making-footnotes-unhidden-when-a-someone-tries-to-address-them-via-hyperlink/
		 * @see * Rules for complement lists.
		 */
		for ( $l_i_type = 1; $l_i_type < 3; $l_i_type++ ) {
			$l_s_type = 1 === $l_i_type ? 'note' : 'source';
			if ( ! empty( ${"l_a_$l_s_type"} ) ) {
				$l_s_list_id = $l_i_post_id . '_' . ${"l_i_list_id_$l_s_type"};
				$l_s_list    = "\r\n";

				/**
				 * Assesses collapsing behavior.
				 *
				 * @since 1.5.6
				 */
				$l_b_collapsible      = ${"l_b_collapsible_$l_s_type"};
				$l_b_collapsed        = ${"l_b_collapsed_$l_s_type"};
				$l_s_block_collapsing = $l_a_sections[ "collapse_$l_s_type" ][ $l_i_section_index ];
				if ( ! empty( $l_s_block_collapsing ) ) {
					switch ( $l_s_block_collapsing ) {
						case 'collapsed':
							$l_i_note_list_collapse = 1;
							break;
						case 'expanded':
							$l_i_note_list_collapse = -1;
							break;
						case 'uncollapsible':
							$l_i_note_list_collapse = 0;
							break;
					}
					$l_b_collapsible = (bool) $l_i_note_list_collapse;
					$l_b_collapsed   = 1 === $l_i_note_list_collapse;
				}

				/**
				 * Inserts optional expansion script.
				 *
				 * Adds a script on non-AMP pages if the list should
				 * fully expand on clicking an anchor. The default
				 * behavior of displaying the target item only, is
				 * supposedly preferred, except with ibid. notation.
				 *
				 * @since 0.50.0
				 */
				if ( ${"l_b_fully_expand_$l_s_type"} && ! $l_b_amp_active ) {
					$l_s_list .= '<script>' . anrghg_minilight(
						'js',
						"

							function anrghgExpandComplementList$l_s_list_id() {
								document.getElementById('anrghg_toggle_$l_s_list_id').checked = true;
							}

						"
					) . '</script>';
				}

				/**
				 * Generates the list head.
				 */
				$l_s_list .= "\r\n<div class=\"anrghg-list-wrapper\">\r\n";
				$l_s_list .= '<input type="checkbox" class="anrghg-display-toggle"';
				if ( empty( ${"l_s_list_label_$l_s_type"} )
					&& empty( $l_a_sections[ "label_$l_s_type" ][ $l_i_section_index ] )
				) {
					$l_s_list .= ' aria-label="' . ${"l_s_list_label_aria_$l_s_type"} . '"';
				}
				if ( $l_b_collapsible ) {
					$l_s_list .= ' id="anrghg_toggle_' . $l_s_list_id . '"';
					if ( ! $l_b_collapsed ) {
						$l_s_list .= ' checked="checked"';
					}
				} else {
					$l_s_list .= ' checked="checked" tabindex="-1"';
				}
				$l_s_list .= ' /><div role="table" class="anrghg-complement-list';
				$l_s_list .= " anrghg_$l_s_type" . 's';

				/**
				 * Sets the writing direction.
				 *
				 * @since 0.29.0
				 * Support writing direction tailored to the post and the complement type.
				 * @since 0.30.0
				 * Support writing direction tailored to the instance from section divider arguments.
				 */
				$l_s_dir = ${"l_s_writing_direction_$l_s_type"};
				if ( 'null' === $l_s_dir ) {
					$l_s_dir = '';
				}
				if ( isset( $l_a_sections[ "dir_$l_s_type" ][ $l_i_section_index ] ) ) {
					$l_s_block_dir = $l_a_sections[ "dir_$l_s_type" ][ $l_i_section_index ];
					switch ( $l_s_block_dir ) {
						case -1:
							$l_s_dir = 'rtl';
							break;
						case 1:
							$l_s_dir = 'ltr';
							break;
					}
				}
				if ( ! empty( $l_s_dir ) ) {
					$l_s_list .= '" dir="' . $l_s_dir;
				}

				/**
				 * Opens the label markup.
				 *
				 * @since 0.63.0 Setting to choose HTML element of list label.
				 */
				$l_i_label_element = (int) anrghg_apply_config( 'anrghg_complement_list_label_element' );
				if ( 0 > $l_i_label_element ) {
					$l_i_label_element = 0;
				}
				if ( 7 < $l_i_label_element ) {
					$l_i_label_element = 7;
				}
				if ( ! $l_i_label_element ) {
					$l_s_label_element = 'h' . $l_i_sect_h_level;
				} else {
					if ( 7 === $l_i_label_element ) {
						$l_s_label_element = 'div';
					} else {
						$l_s_label_element = 'h' . $l_i_label_element;
					}
				}
				if ( $l_b_collapsible ) {
					$l_s_list .= '"><label for="anrghg_toggle_' . $l_s_list_id . '"><a tabindex="-1';
				}
				$l_s_list .= '"><' . $l_s_label_element;
				$l_s_list .= " class=\"anrghg-list-heading anrghg_$l_s_type" . 's';
				if ( $l_b_collapsible ) {
					$l_s_list .= ' anrghg-pointer">';
				} else {
					$l_s_list .= '" tabindex="0" aria-label="' . ${"l_s_list_label_aria_$l_s_type"} . '">';
				}
				if ( ! empty( $l_a_sections[ "label_$l_s_type" ][ $l_i_section_index ] ) ) {
					$l_s_list .= $l_a_sections[ "label_$l_s_type" ][ $l_i_section_index ];
				} else {

					/**
					 * Accounts for singular and dual forms of list labels.
					 *
					 * @since 0.10.0
					 * The number sensitive `ngettext()` (or `_n()`) function does not seem to handle
					 * configurable strings since the number is required and strings cannot be passed
					 * by reference. The only way to do this seems to be to configure a set of cases,
					 * then handle programmatically a widely working scheme like singular/dual/plural
					 * and use `_x()` to disambiguate the dual and plural strings in English.
					 */
					if ( 1 === end( ${"l_a_$l_s_type"}['numero'] )
						&& ! empty( ${"l_s_1_list_label_$l_s_type"} )
					) {
						$l_s_list .= ${"l_s_1_list_label_$l_s_type"};
					} elseif ( 2 === end( ${"l_a_$l_s_type"}['numero'] )
						&& ! empty( ${"l_s_2_list_label_$l_s_type"} )
					) {
						$l_s_list .= ${"l_s_2_list_label_$l_s_type"};
					} else {
						$l_s_list .= ${"l_s_list_label_$l_s_type"};
					}
				}

				$l_s_list .= "</$l_s_label_element>";
				if ( $l_b_collapsible ) {
					$l_s_list .= '</a></label>';
				}

				/**
				 * Generates the list.
				 */
				$l_s_list .= '<div class="anrghg-complement-list-body">';
				foreach ( ${"l_a_$l_s_type"}['numero'] as $l_i_index => $l_i_numero ) {
					$l_s_number = anrghg_convert_number( $l_i_numero, ${"l_i_numbering_$l_s_type"} );

					$l_m_count = ${"l_a_$l_s_type"}['number'][ $l_i_index ];
					if ( $l_m_count ) {
						$l_s_item_endpoint  = $l_s_connector . $l_i_post_id;
						$l_s_item_endpoint .= $l_s_connector . ${"l_i_list_id_$l_s_type"};
						$l_s_item_endpoint .= $l_s_connector . $l_s_number;
						$l_s_fragment_id    = ${"l_s_id_prefix_$l_s_type"} . $l_s_item_endpoint;
						$l_s_list          .= "\r\n" . '<div class="anrghg-complement-row anrghg-offset-anchor"';
						$l_s_list          .= ' role="row" id="' . $l_s_fragment_id . '">';

						/**
						 * Generates the backlink.
						 *
						 * @since 0.9.0
						 * The number in the list is expected to be the backlink link text.
						 * @reporter** @rob900
						 * @link https://wordpress.org/support/topic/also-add-link-to-reference-number/
						 *
						 * @since 0.57.0 Optional tail backlink.
						 * @reporter @acka
						 * @link https://wordpress.org/support/topic/backlink-symbol-at-the-end-of-the-footnote/
						 */
						if ( 1 === $l_m_count ) {
							$l_s_backlink  = '<a class="anrghg-complement-backlink';
							$l_s_backlink .= '" target="_top" href="#' . $l_s_anchor_id_prefix . $l_s_item_endpoint;
						} else {
							$l_s_backlink = '<span class="anrghg-complement-backlink" tabindex="0';
						}
						$l_s_backlink .= '" title="' . $l_s_backlink_tooltip_text . '">';
						if ( 1 !== $l_m_count ) {
							$l_s_backlink .= '<span class="anrghg-backlink-tooltip">';
							$l_s_backlink .= $l_s_backlink_tooltip_first . '&nbsp; ';
							for ( $l_i_ind = 1; $l_i_ind <= $l_m_count; $l_i_ind++ ) {
								$l_s_backlink .= '<a class="anrghg-complement-backlink-item" target="_top" href="#';
								$l_s_backlink .= $l_s_anchor_id_prefix . $l_s_item_endpoint . $l_s_connector;
								$l_s_backlink .= $l_i_ind . '">' . $l_s_number . $l_s_connector . $l_i_ind;
								$l_s_backlink .= '</a>&nbsp; ';
							}
							$l_s_backlink .= '<br />' . $l_s_backlink_tooltip_last . '</span>';
						}

						/**
						 * Resumes generating the list
						 */
						$l_s_list .= $l_s_backlink;
						$l_s_list .= '<div class="anrghg-complement-number" role="rowheader" aria-label="';
						$l_s_list .= sprintf( ${"l_s_list_aria_label_$l_s_type"}, $l_s_number ) . '">';
						$l_s_list .= $l_s_number . '</div><!--.anrghg-complement-number-->';
						if ( 1 === $l_m_count ) {
							$l_s_list     .= '</a>';
							$l_s_backlink .= '</a>';
						} else {
							$l_s_list     .= '</span>';
							$l_s_backlink .= '</span>';
						}
						$l_s_list               .= '<div class="anrghg-complement-list-content" role="cell" tabindex="0">';
						$l_s_complement          = ${"l_a_$l_s_type"}['cptext'][ $l_i_index ];
						$l_i_length_tooltip_text = strpos( $l_s_complement, $l_s_tooltip_end );
						if ( $l_i_length_tooltip_text ) {
							$l_s_complement_text = substr(
								$l_s_complement,
								( $l_i_length_tooltip_text + strlen( $l_s_tooltip_end ) )
							);
						} else {
							$l_s_complement_text = $l_s_complement;
						}

						/**
						 * Prints parenthesized URL after anchor.
						 *
						 * @since 0.30.0
						 * @courtesy https://www.investopedia.com/terms/s/stagflation.asp#citation-3
						 * @reporter** @companydebt
						 * @link https://wordpress.org/support/topic/duplicate-but-same-number/
						 * @companydebt shared Investopedia’s homepage in an unrelated context.
						 * @since 0.35.0 Optionally as unselectable, clickable pseudo element.
						 * @see * Displays parenthesized URL after link text but inside the anchor.
						 */
						if ( anrghg_apply_config( 'anrghg_display_urls_selectable' )
							&& ${"l_b_list_display_urls_$l_s_type"}
						) {
							$l_s_complement_text = preg_replace(
								'/(<a\s[^>]*?href\s*=\s*(["\'])\s*([^"\']+)\s*\g{2}.+?<\/a\s*>)/',
								'$1 (<span class="anrghg-url-wrap">$3</span>) ',
								$l_s_complement_text
							);
						}

						/**
						 * Resumes generating the list
						 */
						$l_s_list .= $l_s_complement_text;
						if ( anrghg_apply_config( 'anrghg_tail_backlink_symbol_display' ) ) {
							$l_s_list .= $l_s_backlink;
						}
						$l_s_list .= "\r\n</div><!--.anrghg-complement-list-content-->";
						$l_s_list .= "\r\n</div><!--.anrghg-complement-row-->";
					}
				}
				$l_s_list .= "\r\n</div><!--.anrghg-complement-list-body-->";
				$l_s_list .= "\r\n</div><!--.anrghg-complement-list-->";
				$l_s_list .= "\r\n</div><!--.anrghg-list-wrapper-->\r\n";

				/**
				 * Appends the list where applicable.
				 */
				if ( $l_b_footer ) {
					$g_s_anrghg_footer .= $l_s_list;
				} else {
					$l_s_section .= $l_s_list;
				}
			}
		}

		/**
		 * Completes Elementor integration if applicable.
		 *
		 * @see * Assesses Elementor integration.
		 * @see * Integrates the lists in Elementor leftover.
		 */
		if ( $l_b_elementor_mode ) {
			$l_s_section = anrghg_elementor_integration_closing( $l_s_section );
		}

		/**
		 * Appends spacing at section end.
		 *
		 * @since 0.27.0
		 * Add bottom margin below a source list in case it is followed by another section.
		 */
		$l_s_section .= "\r\n<div class=\"anrghg-complements-section-spacing\"></div>\r\n";

		/**
		 * Reassembles the sections.
		 */
		$l_a_processed_sections[] = $l_s_section;
	}
	if ( isset( $l_a_processed_sections ) ) {
		$p_s_content = implode( $l_a_processed_sections );
	}

	/**
	 * Outputs a warning about unbalanced delimiter if applicable.
	 */
	if ( $g_m_unbalanced_delim && anrghg_apply_config( 'anrghg_complements_syntax_warning' ) ) {
		$l_s_warning = '<div';
		if ( -1 === (int) anrghg_apply_config( 'anrghg_complements_syntax_warning' ) ) {
			$l_s_warning .= ' hidden';
		}
		$l_s_warning .= ' class="anrghg-warning"><div>';
		$l_s_warning .= __( 'WARNING: An unbalanced opening delimiter is found before:', 'anrghg' );
		$l_s_warning .= '</div><div class="anrghg-quote">';
		$l_s_warning .= $g_m_unbalanced_delim;
		$l_s_warning .= '</div><div>';
		$l_s_warning .= sprintf(
			// Translators: %s: ‘Delimiter syntax error warning’.
			__( 'If this message is irrelevant, please deactivate %s.', 'anrghg' ),
			// .
			__( 'Delimiter syntax error warning', 'anrghg' )
		);
		$l_s_warning .= '</div></div>';
		$p_s_content  = $l_s_warning . $p_s_content;
	}

	return $p_s_content;
}
add_filter(
	'plugins_loaded',
	function() {
		if ( anrghg_apply_config( 'anrghg_complements_active' ) ) {
			$l_i_priority = anrghg_config_priority(
				'anrghg_complement_priority_select',
				'anrghg_complement_priority_input'
			);
			anrghg_filter_content( 'anrghg_process_complements', $l_i_priority );
			if ( anrghg_apply_config( 'anrghg_process_complements_in_widgets' ) ) {
				add_filter( 'widget_text', 'anrghg_process_complements', $l_i_priority );
			}
		}
	}
);

/**
 * Outputs complement lists in the footer.
 *
 * @since 0.11.0 The 'wp_footer' action outputs below the footer.
 * @since 0.12.2 Output buffer hooked on an early action.
 * @since 0.13.0 Insert lists beneath the last footer start tag.
 * Themes may have multiple footer elements.
 * In the absence of a footer element, the initial position before
 * the body end tag is maintained.
 * @since 0.13.1 Insert first at a fallback position, for the
 * CSS selectors to be there when AMP plugin shakes the tree.
 * @link https://stackoverflow.com/questions/772510/wordpress-filter-to-modify-final-html-output
 * @link https://stackoverflow.com/questions/38693992/notice-ob-end-flush-failed-to-send-buffer-of-zlib-output-compression-1-in
 * @link to answer (share) https://stackoverflow.com/a/60665230
 * @since 0.17.3 Not start output buffer by default, to avoid
 * notice about missing zlib extension in PHP 7.3.
 * @since 0.26.0 Setting to activate output buffering with notice
 * that PHP 7.3 requires zlib extension.
 * Support moving lists into footers of very old themes repurposing
 * other elements as footer.
 * @since 1.6.19 Warn about AMP incompatibility, since 'wp_footer' and
 * ob_end_flush() do not work in preventing AMP interference canceling
 * the effect of this output buffering.
 */
add_filter(
	'wp_footer',
	function() {
		global $g_s_anrghg_footer, $g_a_anrghg_config;
		if ( ! empty( $g_s_anrghg_footer ) ) {
			anrghg_kses_echo( "\r\n\r\n" . '<div class="anrghg-footer-complement-list">' );
			anrghg_kses_echo( $g_s_anrghg_footer );
			anrghg_kses_echo( "\r\n</div><!--.anrghg-footer-complement-list-->\r\n\r\n\r\n\r\n" );
		}
	},
	( -PHP_INT_MAX - 1 )
);
if ( $g_a_anrghg_config['anrghg_complement_list_output_buffer'] ) {
	add_filter(
		'after_setup_theme',
		function() {
			ob_start(
				function( $p_s_html ) {
					global $g_s_anrghg_footer;
					if ( ! empty( $g_s_anrghg_footer ) ) {
						if ( false !== strpos( $p_s_html, '<footer' ) || false !== preg_match( '/<[^>]+ id=(["\'])footer\g{1}/is', $p_s_html ) ) {
							$l_i_start = strpos( $p_s_html, '<div class="anrghg-footer-complement-list">' );
							$l_i_end   = strpos( $p_s_html, '</div><!--.anrghg-footer-complement-list-->' ) + 43;
							$l_s_move  = "\r\n\r\n" . substr( $p_s_html, $l_i_start, $l_i_end - $l_i_start ) . "\r\n";
							$p_s_html  = substr_replace( $p_s_html, '', $l_i_start, $l_i_end - $l_i_start );
							if ( false !== strpos( $p_s_html, '<footer' ) ) {
								preg_match_all( '/<footer[^>]*>/is', $p_s_html, $l_a_matches, PREG_OFFSET_CAPTURE );
							} else {
								preg_match_all( '/<[^>]+ id=(["\'])footer\g{1}[^>]*>/is', $p_s_html, $l_a_matches, PREG_OFFSET_CAPTURE );
							}
							$l_a_positions = array();
							if ( ! empty( $l_a_matches ) ) {
								foreach ( $l_a_matches[0] as $l_a_match ) {
									list(
										$l_s_match,
										$l_i_position
									)                = $l_a_match;
									$l_a_positions[] = ( $l_i_position + strlen( $l_s_match ) );
								}
								$l_i_last_index = ( count( $l_a_positions ) - 1 );
								$l_i_last_index = -1 ? 0 : $l_i_last_index;
								$l_i_target     = $l_a_positions[ $l_i_last_index ];
								$p_s_html       = substr_replace( $p_s_html, $l_s_move, $l_i_target, 0 );
							}
						}
					}
					return $p_s_html;
				}
			);
		},
		PHP_INT_MAX
	);
}
