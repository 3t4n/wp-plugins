<?php
/**
 * Purple Number substitutes, heading hyperlinks and table of contents.
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
 * Adds purple Number substitutes, heading hyperlinks and table of contents.
 *
 * @since 0.9.0
 * @courtesy Douglas Engelbart
 * Based on an original idea from Douglas Engelbart and name-giving by his daughter.
 *
 * @contributor* Karolína Vyskočilová @vyskoczilova
 * Part of the heading ID algorithm is based on the Add Anchor Links plugin from Karolína Vyskočilová @vyskoczilova.
 * @link https://github.com/vyskoczilova/add-anchor-links
 * @link https://github.com/pewgeuges/add-anchor-links/compare/version-1.0.4...pewgeuges:extend-to-paragraphs
 * @link https://github.com/pewgeuges/add-anchor-links/blob/extend-to-paragraphs/include/class-add-anchor-links.php
 *
 * Expanding and collapsing the table of contents works without JavaScript
 * and is fully AMP compatible also when expanding the table on clicking a
 * backlink next to a heading, which is not fully functional without JS at
 * least as used by AMP action `toggleChecked()`, relying on JavaScript as
 * well.
 * @reporter** @thechangeyourlife
 * @link https://wordpress.org/support/topic/allow-the-user-to-toggle-the-visibility-of-the-table-of-contents-plus-not-worki/
 *
 * Adds fragment ID and anchor element to headings and/or paragraphs.
 * Generates the associated table of contents as well if configured accordingly.
 * Does not support blockquote, because WordPress consistently uses p elements inside.
 * @since 0.33.0 Supports also preformatted and code, anything enclosed in `pre` tags.
 *
 * @param  string $p_s_content  Content of the post or page.
 * @param  string $p_s_scope    'headings' or 'paragraphs' (also list-items).
 * @return string $p_s_content  Content of the post or page.
 */
function anrghg_process_fragment_ids( $p_s_content, $p_s_scope ) {
	global $g_a_anrghg_fragment_ids;
	if ( did_action( 'wp' ) && function_exists( 'amp_is_request' ) ) {
		$l_b_amp_active = amp_is_request();
	} else {
		$l_b_amp_active = false;
	}
	$l_i_post_id             = get_the_ID();
	$l_b_heading_links       = (bool) anrghg_apply_config( 'anrghg_heading_links_active' );
	$l_i_heading_number_pos  = (int) anrghg_apply_config( 'anrghg_heading_number_position' );
	$l_i_contents_position   = (int) anrghg_apply_config( 'anrghg_table_of_contents_position' );
	$l_s_toc_positioner_name = anrghg_apply_config( 'anrghg_table_of_contents_positioner_name' );
	$l_i_contents_config     = (int) anrghg_apply_config( 'anrghg_table_of_contents_active' );
	$l_b_contents            = 1 === $l_i_contents_config;
	$l_b_force_contents      = false;
	$l_s_contents_post_meta  = get_post_meta( $l_i_post_id, 'anrghg_insert_contents', true ); // May be empty.
	if ( 'false' === $l_s_contents_post_meta ) {
		$l_b_contents = false;
	}
	if ( 'true' === $l_s_contents_post_meta ) {
		$l_b_contents       = true;
		$l_b_force_contents = true;
	}
	$l_b_has_toc_positioner   = false;
	$l_b_html_toc_positioner  = false;
	$l_s_toc_positioner_regex = anrghg_regex_ready( $l_s_toc_positioner_name );
	if ( false !== strpos( $p_s_content, '<div class="wp-block-anrghg-table-of-contents' ) ) {
		$l_b_contents            = true;
		$l_b_force_contents      = true;
		$l_b_has_toc_positioner  = true;
		$l_b_html_toc_positioner = true;
	}
	if ( false !== strpos( $p_s_content, '[anrghg_toc' )
		|| false !== strpos( $p_s_content, '[' . $l_s_toc_positioner_name )
	) {
		$l_b_contents           = true;
		$l_b_force_contents     = true;
		$l_b_has_toc_positioner = true;
	}
	if ( 0 === $l_i_contents_config ) {
		$l_b_contents = false;
	}

	$l_s_contents_alignment = anrghg_apply_config( 'anrghg_table_of_contents_alignment' );// May be empty.
	switch ( $l_s_contents_alignment ) {
		case '-1':
			$l_s_contents_alignment = 'left';
			break;
		case '0':
			$l_s_contents_alignment = 'center';
			break;
		case '1':
			$l_s_contents_alignment = 'right';
			break;
	}
	$l_s_contents_align_post = get_post_meta( $l_i_post_id, 'anrghg_align_contents', true );
	if ( ! empty( $l_s_contents_align_post ) ) {
		$l_s_contents_alignment = $l_s_contents_align_post;
	}

	$l_i_contents_collapse_config = (int) anrghg_apply_config( 'anrghg_table_of_contents_collapsing' );
	$l_s_contents_collapse_post   = get_post_meta( $l_i_post_id, 'anrghg_collapse_contents', true );
	switch ( $l_s_contents_collapse_post ) {
		case 'collapsed':
			$l_i_contents_collapse_config = 1;
			break;
		case 'expanded':
			$l_i_contents_collapse_config = -1;
			break;
		case 'uncollapsible':
			$l_i_contents_collapse_config = 0;
			break;
	}
	$l_b_collapsible         = (bool) $l_i_contents_collapse_config;
	$l_b_collapsed           = 1 === $l_i_contents_collapse_config;
	$l_s_contents_label      = anrghg_apply_config( 'anrghg_table_of_contents_label' );
	$l_s_contents_label_post = get_post_meta( $l_i_post_id, 'anrghg_contents_label', true );
	if ( ! empty( $l_s_contents_label_post ) ) {
		$l_s_contents_label = $l_s_contents_label_post;
	}
	$l_i_contents_depth      = (int) anrghg_apply_config( 'anrghg_table_of_contents_depth' );
	$l_i_contents_min_number = (int) anrghg_apply_config( 'anrghg_table_of_contents_min_number' );
	$l_s_contents_id_prefix  = rawurlencode( anrghg_apply_config( 'anrghg_table_of_contents_heading_id_prefix' ) );
	if ( empty( $l_s_contents_id_prefix ) ) {
		$l_s_contents_id_prefix = '_';
	}
	$l_s_connector = rawurlencode( anrghg_apply_config( 'anrghg_fragment_id_separator' ) );
	// The separator is required for disambiguation in edge cases and needs to fall back from empty.
	if ( empty( $l_s_connector ) ) {
		$l_s_connector = '-';
	}
	$l_b_top_level_font_weight  = (bool) anrghg_apply_config( 'anrghg_table_of_contents_top_heading_bold' );
	$l_s_top_level_font_weight  = $l_b_top_level_font_weight ? 'bold' : 'normal';
	$l_b_stepped                = (bool) anrghg_apply_config( 'anrghg_table_of_contents_stepped_indentation' );
	$l_i_pad_step               = $l_b_stepped ? (int) anrghg_apply_config( 'anrghg_table_of_contents_desktop_indent_px' ) : 0;
	$l_s_contents_h2_pad        = $l_i_pad_step . 'px';
	$l_s_contents_h3_pad        = ( $l_i_pad_step * 2 ) . 'px';
	$l_s_contents_h4_pad        = ( $l_i_pad_step * 3 ) . 'px';
	$l_s_contents_h5_pad        = ( $l_i_pad_step * 4 ) . 'px';
	$l_s_contents_h6_pad        = ( $l_i_pad_step * 5 ) . 'px';
	$l_s_breakpoint_width       = (int) anrghg_apply_config( 'anrghg_general_mobile_breakpoint' ) . 'px'; // 480,768.
	$l_i_pad_step               = $l_b_stepped ? (int) anrghg_apply_config( 'anrghg_table_of_contents_mobile_indent_px' ) : 0;
	$l_s_contents_h2_pad_mobile = $l_i_pad_step . 'px';
	$l_s_contents_h3_pad_mobile = ( $l_i_pad_step * 2 ) . 'px';
	$l_s_contents_h4_pad_mobile = ( $l_i_pad_step * 3 ) . 'px';
	$l_s_contents_h5_pad_mobile = ( $l_i_pad_step * 4 ) . 'px';
	$l_s_contents_h6_pad_mobile = ( $l_i_pad_step * 5 ) . 'px';

	/**
	 * Updates counter rules of internal CSS for errand h1 support.
	 *
	 * @since 0.15.0
	 * Supports h1 because h1 heading level formatting is available in WP.
	 * WP inherits h1 formatting from TinyMCE where it makes actual sense.
	 * Support for h1 is also consistent with standard word processing UX.
	 * Users should be warned that stray h1 have a negative impact on SEO.
	 *
	 * @since 0.24.2
	 * Debug rules by moving them from the head to a body style element.
	 *
	 * @since 0.24.13
	 * Debug list item indentation when h1 is present in the article.
	 */
	if ( $l_b_contents ) {
		preg_match_all( '/<h1[\s>]/is', $p_s_content, $l_a_matches );
		if ( 0 < count( $l_a_matches[0] ) ) {
			$l_s_internal_css_complement = anrghg_minilight(
				'css',
				"

					.anrghg-contents-h1 {
						font-weight: $l_s_top_level_font_weight;
					}

					.anrghg-contents-h2 {
						padding: 0 $l_s_contents_h2_pad;
						font-weight: $l_s_top_level_font_weight;
					}

					.anrghg-contents-h3 {
						padding: 0 $l_s_contents_h3_pad;
					}

					.anrghg-contents-h4 {
						padding: 0 $l_s_contents_h4_pad;
					}

					.anrghg-contents-h5 {
						padding: 0 $l_s_contents_h5_pad;
					}

					.anrghg-contents-h6 {
						padding: 0 $l_s_contents_h6_pad;
					}

					@media screen and (max-width: $l_s_breakpoint_width) {

						.anrghg-contents-h2 {
							padding: 0 $l_s_contents_h2_pad_mobile;
						}

						.anrghg-contents-h3 {
							padding: 0 $l_s_contents_h3_pad_mobile;
						}

						.anrghg-contents-h4 {
							padding: 0 $l_s_contents_h4_pad_mobile;
						}

						.anrghg-contents-h5 {
							padding: 0 $l_s_contents_h5_pad_mobile;
						}

						.anrghg-contents-h6 {
							padding: 0 $l_s_contents_h6_pad_mobile;
						}

					}

					body {counter-reset: h1}
					h1 {counter-reset: h2}
					h2 {counter-reset: h3}
					h3 {counter-reset: h4}
					h4 {counter-reset: h5}
					h5 {counter-reset: h6}

					h1 .anrghg-heading-number::before {counter-increment: h1; content: counter(h1) '.'}
					h2 .anrghg-heading-number::before {counter-increment: h2; content: counter(h1) '.' counter(h2) '.'}
					h3 .anrghg-heading-number::before {counter-increment: h3; content: counter(h1) '.' counter(h2) '.' counter(h3) '.'}
					h4 .anrghg-heading-number::before {counter-increment: h4; content: counter(h1) '.' counter(h2) '.' counter(h3) '.' counter(h4) '.'}
					h5 .anrghg-heading-number::before {counter-increment: h5; content: counter(h1) '.' counter(h2) '.' counter(h3) '.' counter(h4) '.' counter(h5) '.'}
					h6 .anrghg-heading-number::before {counter-increment: h6; content: counter(h1) '.' counter(h2) '.' counter(h3) '.' counter(h4) '.' counter(h5) '.' counter(h6) '.'}

					.anrghg-contents-list {counter-reset: toc_h1}
					.anrghg-contents-h1 {counter-reset: toc_h2}
					.anrghg-contents-h2 {counter-reset: toc_h3}
					.anrghg-contents-h3 {counter-reset: toc_h4}
					.anrghg-contents-h4 {counter-reset: toc_h5}
					.anrghg-contents-h5 {counter-reset: toc_h6}

					.anrghg-contents-h1 a::before {counter-increment: toc_h1; content: counter(toc_h1) '.'}
					.anrghg-contents-h2 a::before {counter-increment: toc_h2; content: counter(toc_h1) '.' counter(toc_h2) '.'}
					.anrghg-contents-h3 a::before {counter-increment: toc_h3; content: counter(toc_h1) '.' counter(toc_h2) '.' counter(toc_h3) '.'}
					.anrghg-contents-h4 a::before {counter-increment: toc_h4; content: counter(toc_h1) '.' counter(toc_h2) '.' counter(toc_h3) '.' counter(toc_h4) '.'}
					.anrghg-contents-h5 a::before {counter-increment: toc_h5; content: counter(toc_h1) '.' counter(toc_h2) '.' counter(toc_h3) '.' counter(toc_h4) '.' counter(toc_h5) '.'}
					.anrghg-contents-h6 a::before {counter-increment: toc_h6; content: counter(toc_h1) '.' counter(toc_h2) '.' counter(toc_h3) '.' counter(toc_h4) '.' counter(toc_h5) '.' counter(toc_h6) '.'}

				"
			);

			$p_s_content = '<style amp-custom>' . $l_s_internal_css_complement . '</style>' . $p_s_content;
		}
	}

	/**
	 * Initializes the data storage.
	 */
	$l_a_contents = array(
		'hlevel' => array(),
		'tctext' => array(),
		'toc_id' => array(),
	);

	/**
	 * Collects raw strings and their position.
	 *
	 * @since 0.9.0
	 * @since 0.33.0 Wraps preformatted elements in a paragraph element.
	 * The normal system does not work with `pre`, as of CSS `::before`,
	 * because `pre` blocks are given `overflow: auto` cutting off these
	 * protruding paragraph link symbols. So `pre` needs wrapping into a
	 * `p` element despite that is suboptimal, as the `pre` causes it to
	 * be cut into two.
	 */
	$p_s_content = anrghg_remove_block_comment_nodes( $p_s_content );
	if ( 'headings' === $p_s_scope ) {
		$l_s_pattern = '/(<h([1-6])( [^>]+)?>)(.+?)<\/h\g{2}\s*>/is';
	} elseif ( 'paragraphs' === $p_s_scope ) {
		$p_s_content = preg_replace( '/(<pre.+?<\/pre\s*>)/is', '<p>$1</p>', $p_s_content );
		$l_s_pattern = '/(<(p|li)( [^>]+)?>)(.+?)<\/\g{2}\s*>/is';
	}
	preg_match_all( $l_s_pattern, $p_s_content, $l_a_search_results, PREG_OFFSET_CAPTURE );
	$l_i_post_id  = get_the_ID();
	$l_i_offset   = 0;
	$l_s_contents = '';
	if ( $l_a_search_results ) {
		foreach ( $l_a_search_results[1] as $l_i_index => $l_s_item ) {
			list( $l_s_tag, $l_i_start_tag_position ) = $l_s_item;
			list( $l_s_level, $l_i_element_position ) = $l_a_search_results[2][ $l_i_index ];
			list( $l_s_args, $l_i_argument_position ) = $l_a_search_results[3][ $l_i_index ];
			list( $l_s_text, $l_i_text_position )     = $l_a_search_results[4][ $l_i_index ];

			$l_s_text_length = strlen( $l_s_text );
			if ( $l_s_text_length ) {

				/**
				 * Assesses whether the heading is a generated list label.
				 *
				 * @since 0.41.3
				 */
				$l_b_generated_list_label = false;
				if ( ! empty( $l_s_args ) && false !== strpos( $l_s_args, 'anrghg-list-heading' ) ) {
					$l_b_generated_list_label = true;
				}

				/**
				 * Checks for a predefined custom fragment identifier.
				 *
				 * @since 0.49.0
				 */
				$l_b_predefined_id = false;
				if ( ! empty( $l_s_args ) && false !== strpos( $l_s_args, ' id' ) ) {
					preg_match( '/ id\s*=\s*(["\'])([^"\']+)\g{1}/i', $l_s_args, $l_a_matches );
					if ( ! empty( $l_a_matches[2] ) ) {
						$l_s_fragment_id   = $l_a_matches[2];
						$l_b_predefined_id = true;
					}
				}

				/**
				 * Derives a fragment identifier from the content.
				 */
				if ( ! $l_b_predefined_id ) {

					/**
					 * Removes complements from raw IDs.
					 *
					 * @since 0.35.1
					 */
					$l_s_fragment_id = anrghg_remove_complements( $l_s_text );

					/**
					 * Derives shareable fragment identifiers.
					 */
					if ( 'paragraphs' === $p_s_scope ) {
						$l_i_max_len = (int) anrghg_apply_config( 'anrghg_paragraph_identifier_max_length' );
					} else {
						$l_i_max_len = (int) anrghg_apply_config( 'anrghg_fragment_identifier_max_length' );
					}
					$l_s_fragment_id = anrghg_simplify_fragment_id(
						$l_s_fragment_id,
						$l_i_max_len,
						$l_s_text_length
					);
				}

				/**
				 * Disambiguates identical derived identifiers.
				 *
				 * @since 0.9.0
				 */
				$l_i_counter = 0;
				foreach ( $g_a_anrghg_fragment_ids as $l_s_existing ) {
					if (
						$l_s_fragment_id === $l_s_existing
						|| ( $l_s_fragment_id . $l_s_connector . $l_i_counter ) === $l_s_existing
					) {
						$l_i_counter++;
					}
				}
				if ( 0 !== $l_i_counter ) {
					$l_s_fragment_id .= $l_s_connector . $l_i_counter;
				}
				$g_a_anrghg_fragment_ids[] = $l_s_fragment_id;

				/**
				 * Collects data for table of contents.
				 *
				 * @since 0.9.0
				 * @since 0.35.1 Remove complements from raw IDs.
				 * @since 0.59.0 Optionally discard generated list labels.
				 */
				$l_s_unique_id = $l_i_post_id . $l_s_connector . $l_s_fragment_id;
				if ( 'headings' === $p_s_scope ) {
					$l_s_list_item      = anrghg_remove_complements( $l_s_text );
					$l_b_has_complement = $l_s_text !== $l_s_list_item;
					if ( $l_b_contents ) {
						$l_b_exclude_generated = (bool) anrghg_apply_config( 'anrghg_table_of_contents_exclude_generated' );
						if ( ! ( $l_b_generated_list_label && $l_b_exclude_generated ) ) {
							$l_i_level = (int) $l_s_level;
							if ( $l_i_level <= $l_i_contents_depth ) {
								$l_a_contents['hlevel'][] = 'h' . $l_s_level;
								$l_a_contents['tctext'][] = $l_s_list_item;
								$l_a_contents['toc_id'][] = $l_s_unique_id;
							}
						}
					}

					/**
					 * Adds markup to headings.
					 *
					 * @since 0.9.0
					 * @since 0.23.1 Fully expand the table of contents on accessing it
					 * from a heading backlink, too (if JavaScript is not turned off).
					 * @since 0.25.0 Use new AMP action `toggleChecked()` to make table
					 * of contents collapsible also when JavaScript is turned off.
					 * @courtesy @kristoferbaxter and @jridgewell from AMP Project.
					 * @contributor** @kristoferbaxter for the action name.
					 * @contributor** @jridgewell for the implementation.
					 * @link https://github.com/ampproject/amphtml/pull/35795
					 * @link https://github.com/ampproject/amphtml/issues/35794
					 * @courtesy @zhangsu and @jridgewell for fixing the new action.
					 * @link https://github.com/ampproject/amphtml/issues/38312
					 * @link https://github.com/ampproject/amphtml/pull/38314
					 * `toggleChecked()` was released on 2021-09-16.
					 * @link https://github.com/ampproject/amphtml/releases/tag/2109102127000
					 * @since 0.71.0 Optional plain tooltips.
					 */
					$l_s_title = '';
					if ( anrghg_apply_config( 'anrghg_heading_link_plain_tooltip_active' ) ) {
						$l_s_tooltip_text = htmlentities( anrghg_apply_config( 'anrghg_heading_link_plain_tooltip_text' ) );
						if ( ! empty( trim( $l_s_tooltip_text ) ) ) {
							$l_s_title = ' title="' . $l_s_tooltip_text . '"';
						}
					}
					$l_s_toc_title = '';
					if ( anrghg_apply_config( 'anrghg_heading_backlink_plain_tooltip_active' ) ) {
						$l_s_tooltip_text = anrghg_apply_config( 'anrghg_heading_backlink_plain_tooltip_text' );
						if ( ! empty( trim( $l_s_tooltip_text ) ) ) {
							$l_s_toc_title = ' title="' . $l_s_tooltip_text . '"';
						}
					}
					$l_s_prepended = '<span class="anrghg-offset-anchor" id="' . $l_s_unique_id . '"></span>';

					/**
					 * Adds prepended heading number if configured accordingly.
					 */
					if ( ! $l_b_generated_list_label ) {
						if ( $l_b_contents && -1 === $l_i_heading_number_pos ) {
							$l_s_prepended .= '<a class="anrghg-heading-number anrghg-before" href="#';
							$l_s_prepended .= $l_s_contents_id_prefix . $l_s_connector . $l_s_unique_id;
							$l_s_prepended .= '"' . $l_s_toc_title;
							if ( $l_b_amp_active ) {
								$l_s_prepended .= ' on="tap:anrghg_toggle_contents_' . $l_i_post_id;
								$l_s_prepended .= '.toggleChecked(force=true),';
								$l_s_prepended .= ' anrghg_contents_list_' . $l_i_post_id;
								$l_s_prepended .= '.toggleClass(class=anrghg-instant, force=true),';
								$l_s_prepended .= ' anrghg_contents_list_' . $l_i_post_id;
								$l_s_prepended .= '.toggleClass(class=anrghg-is-amp, force=true)"';
							} else {
								$l_s_prepended .= " onclick=\"anrghgExpandContents$l_i_post_id()\"";
							}
							$l_s_prepended .= '></a>';
						}

						/**
						 * Adds heading link tag(s) before if configured accordingly.
						 */
						if ( $l_b_heading_links
							&& ( ( $l_b_contents && -1 !== $l_i_heading_number_pos )
								|| ! $l_b_contents
							)
						) {
							$l_s_prepended .= '<a tabindex="0" class="anrghg-heading-link';
							if ( $l_b_has_complement || $l_b_generated_list_label ) {
								$l_s_prepended .= ' anrghg-separate anrghg-before';
							}
							$l_s_prepended .= '" href="#' . $l_s_unique_id . '"' . $l_s_title . '>';
							if ( $l_b_has_complement || $l_b_generated_list_label ) {
								$l_s_prepended .= '</a>';
							}
						}
					}

					$p_s_content = substr_replace(
						$p_s_content,
						$l_s_prepended,
						$l_i_text_position + $l_i_offset,
						0
					);
					$l_i_offset += strlen( $l_s_prepended );

					/**
					 * Adds heading link tag(s) after if configured accordingly.
					 */
					if ( ! $l_b_generated_list_label ) {
						$l_s_appended = '';
						if ( $l_b_heading_links
							&& ( ( $l_b_contents && 1 !== $l_i_heading_number_pos )
								&& $l_b_has_complement
							)
						) {
							$l_s_appended .= '<a tabindex="0" class="anrghg-heading-link';
							$l_s_appended .= ' anrghg-separate anrghg-after';
							$l_s_appended .= '" href="#' . $l_s_unique_id . '"' . $l_s_title . '>';
						}
						if ( $l_b_heading_links
							&& ( ( $l_b_contents && 1 !== $l_i_heading_number_pos )
								|| ! $l_b_has_complement
							)
							&& ! $l_b_generated_list_label
						) {
							$l_s_appended .= '</a>';
						}

						/**
						 * Adds appended heading numbers if configured accordingly.
						 */
						if ( $l_b_contents
							&& ( 1 === $l_i_heading_number_pos || 0 === $l_i_heading_number_pos )
						) {
							$l_s_appended .= '<a class="anrghg-heading-number anrghg-after" href="#';
							$l_s_appended .= $l_s_contents_id_prefix . $l_s_connector . $l_s_unique_id;
							$l_s_appended .= '"' . $l_s_toc_title;
							if ( $l_b_amp_active ) {
								$l_s_appended .= ' on="tap:anrghg_toggle_contents_' . $l_i_post_id;
								$l_s_appended .= '.toggleChecked(force=true),';
								$l_s_appended .= ' anrghg_contents_list_' . $l_i_post_id;
								$l_s_appended .= '.toggleClass(class=anrghg-instant, force=true),';
								$l_s_appended .= ' anrghg_contents_list_' . $l_i_post_id;
								$l_s_appended .= '.toggleClass(class=anrghg-is-amp, force=true)"';
							} else {
								$l_s_appended .= " onclick=\"anrghgExpandContents$l_i_post_id()\"";
							}
							$l_s_appended .= '></a>';
						}

						$p_s_content = substr_replace(
							$p_s_content,
							$l_s_appended,
							$l_i_text_position + $l_s_text_length + $l_i_offset,
							0
						);
						$l_i_offset += strlen( $l_s_appended );
					}
				} elseif ( 'paragraphs' === $p_s_scope ) {

					/**
					 * Adds paragraph links sort of modern purple numbers.
					 *
					 * @since 0.71.0 Optional plain tooltips.
					 * @since 1.6.9  Target as adjacent sibling for highlighting.
					 */
					$l_s_prepended_lead  = '<span class="anrghg-offset-anchor" id="' . $l_s_unique_id . '"></span>';
					$l_s_prepended_trail = '<a tabindex="-1" class="anrghg-fragment-link" href="#' . $l_s_unique_id;
					if ( anrghg_apply_config( 'anrghg_paragraph_link_plain_tooltip_active' ) ) {
						$l_s_tooltip_text = anrghg_apply_config( 'anrghg_paragraph_link_plain_tooltip_text' );
						if ( ! empty( trim( $l_s_tooltip_text ) ) ) {
							$l_s_prepended_trail .= '" title="' . $l_s_tooltip_text;
						}
					}
					$l_s_prepended_trail .= '"></a>';

					$p_s_content = substr_replace(
						$p_s_content,
						$l_s_prepended_lead,
						$l_i_start_tag_position + $l_i_offset,
						0
					);
					$l_i_offset += strlen( $l_s_prepended_lead );

					$p_s_content = substr_replace(
						$p_s_content,
						$l_s_prepended_trail,
						$l_i_text_position + $l_i_offset,
						0
					);
					$l_i_offset += strlen( $l_s_prepended_trail );
				}
			}
		}

		/**
		 * Determines whether to add the table of contents.
		 *
		 * @since 0.9.0
		 * @since 0.27.0 Check for minimum number of headings.
		 */
		if ( $l_b_contents && 'headings' === $p_s_scope && ! empty( $l_a_contents['toc_id'][0] )
			&& ( $l_b_force_contents || count( $l_a_contents['toc_id'] ) >= $l_i_contents_min_number )
		) {

			/**
			 * Parses the table of contents positioner.
			 *
			 * @since 0.35.0 Label configurable in block, alignment in toolbar.
			 * @since 0.42.0 Collapsing behavior configurable in block inspector.
			 * @since 0.42.2 Alternative input for left, center, right as -1,0,1.
			 */
			if ( $l_b_has_toc_positioner ) {
				if ( $l_b_html_toc_positioner ) {

					/**
					 * Parses the HTML positioner.
					 *
					 * @since 0.58.3
					 */
					preg_match(
						'/<div class="wp-block-anrghg-table-of-contents([^>]+)><div data-anrghg="label">(.*?)<\/div><\/div>/s',
						$p_s_content,
						$l_a_matches
					);
					$l_s_toc_positioner = $l_a_matches[0];
					$l_s_args           = $l_a_matches[1];

					if ( preg_match( '/ data-align="([^"]+)"/s', $l_s_args, $l_a_data_matches ) ) {
						$l_s_contents_alignment = $l_a_data_matches[1];
					}

					if ( preg_match( '/ data-display="([^"]+)"/s', $l_s_args, $l_a_data_matches ) ) {
						$l_s_display = $l_a_data_matches[1];
						switch ( $l_s_display ) {
							case 'collapsed':
								$l_i_collapsing = 1;
								break;
							case 'expanded':
								$l_i_collapsing = -1;
								break;
							case 'uncollapsible':
								$l_i_collapsing = 0;
								break;
						}
						$l_b_collapsible = (bool) $l_i_collapsing;
						$l_b_collapsed   = 1 === $l_i_collapsing;
					}

					if ( ! empty( $l_a_matches[2] ) ) {
						$l_s_contents_label = $l_a_matches[2];
					}
				} else {

					/**
					 * Parses the manual positioner.
					 */
					$l_s_toc_positioner = '';
					if ( preg_match(
						'/\[\s*(?:anrghg_toc|' . $l_s_toc_positioner_regex . ')(?:\s+_1\s*=\s*\|([^|]+?)\|)?(?:\s+_2\s*=\s*\|([^|]+?)\|)?(?:\s+_3\s*=\s*\|([^|]+?)\|)?\s*\]/si',
						$p_s_content,
						$l_a_matches
					) ) {
						$l_s_toc_positioner = $l_a_matches[0];
						if ( ! empty( $l_a_matches[1] ) ) {
							$l_s_contents_label = $l_a_matches[1];
						}
						if ( ! empty( $l_a_matches[2] ) ) {
							$l_s_contents_alignment = $l_a_matches[2];

							/**
							 * Converts numeric code to keyword.
							 *
							 * Since keywords are supported as values, there is no default.
							 */
							switch ( $l_s_contents_alignment ) {
								case '-1':
									$l_s_contents_alignment = 'left';
									break;
								case '0':
									$l_s_contents_alignment = 'center';
									break;
								case '1':
									$l_s_contents_alignment = 'right';
									break;
							}
						}
						if ( ! empty( $l_a_matches[3] ) ) {
							$l_s_contents_collapse_arg = $l_a_matches[3];
							$l_b_collapsible           = (bool) $l_s_contents_collapse_arg;
							$l_b_collapsed             = '1' === $l_s_contents_collapse_arg;
						}
					}
				}
			}

			/**
			 * Replaces a placeholder with the post title in the table of contents label.
			 *
			 * @since 0.38.0
			 */
			$l_s_contents_label = sprintf( $l_s_contents_label, get_the_title( $l_i_post_id ) );

			/**
			 * Generates the markup of the table of contents.
			 *
			 * @since 0.13.0
			 * @since 0.23.1 JavaScript to fully expand the table from heading backlink.
			 * Use AMP action `toggleClass()` for the same in AMP, provided JS is turned on.
			 * @since 0.25.0 Use checkbox for AMP too, so the table stays collapsible when JS is off.
			 * @link https://github.com/ampproject/amphtml/pull/35795
			 * @since 0.30.0/2021-09-16 Fully functional in AMP too thanks to `toggleChecked()`.
			 * @since 0.31.0 Instant expand to mitigate scroll target flaw.
			 * @since 0.31.2 Keep class `instant` on clicking label to mitigate `<noscript>` unwrapping.
			 * @since 0.31.3 Use dedicated class `anrghg-is-amp` so as to remove `anrghg-instant` again.
			 */
			$l_s_contents = "\r\n";

			/**
			 * Noscript style for table of contents.
			 *
			 * @since 0.24.11
			 * @since 0.31.0 Deactivate on AMP pages.
			 * @since 0.31.1 Reactivate on AMP pages.
			 * @since 0.31.2 Conditionally cancel `noscript` rule by repurposing class `instant`.
			 * @since 0.31.3 (2021-09-28) Override `noscript` rule if `anrghg-is-amp` is present.
			 * @since 1.6.9  Move from head to body (here).
			 * @link https://github.com/ampproject/amp-wp/issues/7234#issuecomment-1233008744
			 *
			 * “the AMP plugin will automatically unwrap noscript tags to become the AMP version
			 * by default. Since AMP doesn't allow JavaScript loaded in the traditional way in
			 * order to help guarantee performance and security, the AMP plugin scripts it out.
			 * When markup has been coded to account for visitors who have JS turned off, to
			 * provide a fallback experience, then this is what the AMP plugin tries to provide
			 * by unwrapping noscript elements”
			 * @link https://wordpress.org/support/topic/sorry-you-have-javascript-disabled-2/#post-14530166
			 *
			 * Support for `<noscript amp-noscript>` was requested on 2022-08-30T0043+0200.
			 * Turns out it is already implemented! Attribute name is `data-amp-no-unwrap`.
			 * @link https://github.com/ampproject/amp-wp/issues/6030
			 * (opened on 2021-03-31T1222+0200)
			 * @link https://github.com/ampproject/amp-wp/pull/6528
			 * (merged on 2021-08-19T0310+0200)
			 * @link https://github.com/ampproject/amp-wp/issues/7227
			 * @since 1.6.8 Table of contents: Use new feature of AMP-WP plugin to fix display on reloaded AMP.
			 * `data-amp-no-unwrap` is ineffective in the `<head>` element.
			 * @link https://github.com/ampproject/amp-wp/issues/7234
			 * This will be addressed by supporting noscript styles.
			 * @link https://github.com/ampproject/amp-wp/issues/7234#issuecomment-1232282640
			 * @link https://github.com/ampproject/amp-wp/issues/6603
			 * Moving this to the `body` for the time being does not fix it.
			 */
			$l_f_item_line_height = 1.4;
			$l_s_row_spacing      = 6 . 'px';
			$l_s_contents        .= "\r\n<noscript data-amp-no-unwrap>";
			if ( $l_b_amp_active ) {
				$l_s_contents .= '<style amp-noscript>';
			} else {
				if ( current_theme_supports( 'html5', 'style' ) ) {
					$l_s_contents .= '<style media="all">';
				} else {
					$l_s_contents .= '<style type="text/css" media="all">';
				}
			}
			$l_s_contents .= anrghg_minilight(
				'css',
				"
					.anrghg-display-toggle:not(:checked) + .anrghg-tocontents .anrghg-contents-list .anrghg-contents-heading:target {
						opacity: 1;
						margin-bottom: $l_s_row_spacing;
						line-height: $l_f_item_line_height;
						visibility: visible;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-tocontents .anrghg-contents-list.anrghg-is-amp .anrghg-contents-heading:target {
						opacity: 0;
						padding-top: 0;
						margin-top: 0;
						margin-bottom: 0;
						line-height: 0;
						visibility: hidden;
					}

				"
			);
			$l_s_contents .= "\r\n</style></noscript>\r\n";

			/**
			 * Adds JavaScript for non-AMP.
			 */
			if ( ! $l_b_amp_active ) {
				$l_s_contents .= '<script>' . anrghg_minilight(
					'js',
					"

						function anrghgExpandContents$l_i_post_id() {
							document.getElementById('anrghg_contents_list_$l_i_post_id').classList.add('anrghg-instant');
							document.getElementById('anrghg_toggle_contents_$l_i_post_id').checked = true;
						}

						function anrghgDeactivateInstantExpand$l_i_post_id() {
							document.getElementById('anrghg_contents_list_$l_i_post_id').classList.remove('anrghg-instant');
						}

					"
				) . '</script>';
			}

			/**
			 * Adds the table.
			 */
			$l_s_contents .= "\r\n<div class=\"anrghg-list-wrapper\">\r\n";
			$l_s_contents .= '<input type="checkbox" class="anrghg-display-toggle"';
			if ( $l_b_collapsible ) {
				$l_s_contents .= ' id="anrghg_toggle_contents_' . $l_i_post_id . '"';
			} else {
				$l_s_contents .= ' tabindex="-1"';
			}
			if ( ! $l_b_collapsed ) {
				$l_s_contents .= ' checked="checked"';
			}
			$l_s_contents .= " />\r\n<div class=\"anrghg-tocontents";
			if ( ! empty( $l_s_contents_alignment ) ) {
				$l_s_contents .= ' anrghg-' . $l_s_contents_alignment;
			}
			$l_s_contents .= '"><label for="anrghg_toggle_contents_' . $l_i_post_id . '"';
			if ( $l_b_collapsible ) {
				if ( $l_b_amp_active ) {
					$l_s_contents .= ' on="tap:anrghg_contents_list_' . $l_i_post_id;
					$l_s_contents .= '.toggleClass(class=NONE, force=false)"';
				} else {
					$l_s_contents .= " onclick=\"anrghgDeactivateInstantExpand$l_i_post_id()\"";
				}
				$l_s_contents .= '><a class="anrghg-contents-anchor"><div class="anrghg-pointer ';
			} else {
				$l_s_contents .= '><div tabindex="0" aria-label="' . $l_s_contents_label . '" class="';
			}
			$l_s_contents .= 'anrghg-contents-label">' . $l_s_contents_label . '</div><!--.anrghg-contents-label-->';
			if ( $l_b_collapsible ) {
				$l_s_contents .= '</a>';
			}
			$l_s_contents .= "</label>\r\n<div class=\"anrghg-contents-list\"";
			$l_s_contents .= ' id="anrghg_contents_list_' . $l_i_post_id . "\">\r\n";
			foreach ( $l_a_contents['toc_id'] as $l_i_index => $l_s_id ) {
				if ( ! $l_b_collapsible ) {
					$l_s_contents .= '<span class="anrghg-offset-anchor" id="';
					$l_s_contents .= $l_s_contents_id_prefix . $l_s_connector . $l_s_id . '"></span>';
				}
				$l_s_contents .= '<div class="anrghg-contents-' . $l_a_contents['hlevel'][ $l_i_index ];
				if ( $l_b_collapsible ) {
					$l_s_contents .= ' anrghg-offset-anchor anrghg-contents-heading" id="';
					$l_s_contents .= $l_s_contents_id_prefix . $l_s_connector . $l_s_id;
				}
				$l_s_contents .= '"><a target="_top" href="#' . $l_s_id . '" title="';
				$l_s_contents .= $l_a_contents['tctext'][ $l_i_index ];
				$l_s_contents .= '"><span class="anrghg-inline-spacer"></span>';
				$l_s_contents .= $l_a_contents['tctext'][ $l_i_index ] . '</a></div>';
				$l_s_contents .= '<!--.anrghg-contents-' . $l_a_contents['hlevel'][ $l_i_index ] . "-->\r\n";
			}
			$l_s_contents .= "</div><!--.anrghg-contents-list-->\r\n</div><!--.anrghg-tocontents-->";
			$l_s_contents .= "\r\n</div><!--.anrghg-list-wrapper-->\r\n";

			/**
			 * Inserts the table of contents in the post.
			 */
			if ( $l_b_has_toc_positioner ) {
				$p_s_content = str_replace( $l_s_toc_positioner, $l_s_contents, $p_s_content );
			} elseif ( 0 === $l_i_contents_position ) {
				$p_s_content = preg_replace( '/(<h\d[^>]*>)/', $l_s_contents . '$1', $p_s_content, 1 );
			} elseif ( -1 === $l_i_contents_position ) {
				$p_s_content .= $l_s_contents;
			} else {
				$p_s_content = $l_s_contents . $p_s_content;
			}
		}
	}
	return $p_s_content;
}

/**
 * Is called back and dispatches the action to the above.
 *
 * @since 0.9.0
 * @see anrghg_process_fragment_ids()
 * @param  string $p_s_content              Content of the post or page.
 * @return string $p_s_content              Content of the post or page.
 */
function anrghg_fragment_ids( $p_s_content ) {
	global $g_a_anrghg_fragment_ids;
	$l_b_paragraphs = (bool) anrghg_apply_config( 'anrghg_paragraph_links_active' );
	$l_b_headings   = (bool) (
		anrghg_apply_config( 'anrghg_heading_links_active' )
		|| anrghg_apply_config( 'anrghg_table_of_contents_active' )
	);
	if ( is_singular() || is_category() ) {
		$g_a_anrghg_fragment_ids = array();
		if ( $l_b_headings ) {
			$p_s_content = anrghg_process_fragment_ids( $p_s_content, 'headings' );
		}
		if ( $l_b_paragraphs ) {
			$p_s_content = anrghg_process_fragment_ids( $p_s_content, 'paragraphs' );
		}
		return $p_s_content;
	} else {
		return $p_s_content;
	}
}
add_filter(
	'plugins_loaded',
	function() {
		if ( anrghg_apply_config( 'anrghg_paragraph_links_active' )
			|| anrghg_apply_config( 'anrghg_heading_links_active' )
			|| anrghg_apply_config( 'anrghg_table_of_contents_active' )
		) {
			anrghg_filter_content( 'anrghg_supply_shortcode_unautop', 11 );
			$l_i_priority = anrghg_config_priority(
				'anrghg_fragment_identifiers_priority_select',
				'anrghg_fragment_identifiers_priority_input'
			);
			anrghg_filter_content( 'anrghg_fragment_ids', $l_i_priority );
		}
	}
);
