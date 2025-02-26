<?php
/**
 * Support for the “Reference list” block.
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
 * Formats Reference lists configured by block.
 *
 * @since 0.58.0 Block.
 * @since 0.58.1 Provisional processing.
 * @since 0.58.2 Effective processing.
 *
 * @reporter** @anandhft
 * @link https://wordpress.org/support/topic/adding-additional-references/
 * @reporter** @ivladak
 * @link https://wordpress.org/support/topic/adding-additional-references/#post-10970772
 * @reporter** @ahmadword
 * @link https://wordpress.org/support/topic/remove-the-blank-at-the-end-of-the-article-where-references-are-written/
 * @link https://www.a7eaha.com/%d8%aa%d8%a3%d8%ab%d9%8a%d8%b1-%d8%a7%d9%84%d9%82%d9%88%d9%84%d9%88%d9%86-%d8%a7%d9%84%d9%85%d8%aa%d9%87%d9%8a%d8%ac-%d8%b9%d9%84%d9%89-%d8%a7%d9%84%d8%ad%d9%85%d9%84/
 * @link https://www.betterhealth.vic.gov.au/health/healthyliving/physical-activity-for-seniors
 *
 * @param  string $p_s_content        Content of the post or page.
 * @return string $p_s_content        Content of the post or page.
 */
function anrghg_reference_lists( $p_s_content ) {
	if ( false !== strpos( $p_s_content, '<div class="wp-block-anrghg-references' ) ) {
		if ( did_action( 'wp' ) && function_exists( 'amp_is_request' ) ) {
			$l_b_amp_active = amp_is_request();
		} else {
			$l_b_amp_active = false;
		}
		$l_i_post_id       = get_the_ID();
		$l_i_list_id       = 0;
		$l_i_numbering     = (int) anrghg_apply_config( 'anrghg_reference_list_numbering_system' );
		$l_b_bullet_active = (bool) anrghg_apply_config( 'anrghg_reference_list_bullet_active' );
		$l_s_bullet        = anrghg_apply_config( 'anrghg_reference_list_bullet_input' );
		if ( empty( $l_s_bullet ) ) {
			$l_s_bullet = anrghg_apply_config( 'anrghg_reference_list_bullet_select' );
		}
		$l_s_url_id_prefix     = rawurlencode( anrghg_apply_config( 'anrghg_reference_list_url_id_prefix' ) );
		$l_s_conf_label        = anrghg_apply_config( 'anrghg_reference_list_label' );
		$l_s_conf_aria_label   = anrghg_apply_config( 'anrghg_reference_list_aria_label' );
		$l_s_item_aria_label   = anrghg_apply_config( 'anrghg_reference_item_aria_label' );
		$l_s_link_tooltip_text = anrghg_apply_config( 'anrghg_reference_item_tooltip_text' );
		$l_s_connector         = rawurlencode( anrghg_apply_config( 'anrghg_fragment_id_separator' ) );
		// The separator is required for disambiguation in edge cases and needs to fall back from empty.
		if ( empty( $l_s_connector ) ) {
			$l_s_connector = '-';
		}
		$l_i_conf_collapsing = (int) anrghg_apply_config( 'anrghg_reference_list_collapsing' );

		preg_match_all(
			'/<div class="wp-block-anrghg-references([^>]+)><div class="anrghg-label">(.*?)<\/div>(.*?)<span data-anrghg="refs-end"><\/span><\/div>/s',
			$p_s_content,
			$l_a_matches,
			PREG_OFFSET_CAPTURE
		);
		$l_i_offset = 0;
		foreach ( $l_a_matches[0] as $l_i_index => $l_a_match ) {
			list(
				$l_s_positioner,
				$l_i_position
			)                   = $l_a_match;
			$l_s_args           = $l_a_matches[1][ $l_i_index ][0];
			$l_s_label          = $l_a_matches[2][ $l_i_index ][0];
			$l_s_reflist        = $l_a_matches[3][ $l_i_index ][0];
			$l_i_len_positioner = strlen( $l_s_positioner );

			$l_s_writing_dir = '';
			if ( preg_match( '/ dir="(...)"/s', $l_s_args, $l_a_dir_matches ) ) {
				$l_s_writing_dir = $l_a_dir_matches[1];
			}

			$l_i_collapsing = $l_i_conf_collapsing;
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
			}
			$l_b_collapsible = (bool) $l_i_collapsing;
			$l_b_collapsed   = 1 === $l_i_collapsing;

			$l_s_display_label = $l_s_conf_label;
			if ( ! empty( $l_s_label ) ) {
				$l_s_display_label = $l_s_label;
			}

			$l_a_parsed_refs = array();
			$l_a_references  = explode( '<br>', $l_s_reflist );
			foreach ( $l_a_references as $l_i_index => $l_s_reference ) {
				if ( ! empty( $l_s_reference ) ) {
					$l_s_reference = anrghg_reusable_complements( $l_s_reference );
					if ( anrghg_apply_config( 'anrghg_url_wrap' ) ) {
						$l_s_reference = anrghg_line_wrap_urls( $l_s_reference );
					}
					$l_a_parsed_refs[] = $l_s_reference;
				}
			}
			$l_i_list_id++;
			$l_s_list_id = $l_i_post_id . $l_s_connector . 'r' . $l_s_connector . $l_i_list_id;

			/**
			 * Generates the list head.
			 */
			$l_s_list  = "\r\n<div class=\"anrghg-list-wrapper\">\r\n\t";
			$l_s_list .= '<input type="checkbox" class="anrghg-display-toggle"';
			if ( empty( $l_s_display_label ) ) {
				$l_s_list .= ' aria-label="' . $l_s_conf_aria_label . '"';
			}
			if ( $l_b_collapsible ) {
				$l_s_list .= ' id="anrghg_toggle_' . $l_s_list_id . '"';
				if ( ! $l_b_collapsed ) {
					$l_s_list .= ' checked="checked"';
				}
			} else {
				$l_s_list .= ' checked="checked" tabindex="-1"';
			}
			$l_s_list .= " />\r\n\t<div role=\"table\" class=\"anrghg-reference-list";

			/**
			 * Sets the writing direction.
			 */
			if ( ! empty( $l_s_writing_dir ) ) {
				$l_s_list .= '" dir="' . $l_s_writing_dir;
			}

			/**
			 * Opens the label markup.
			 *
			 * @since 0.70.0 Setting to choose HTML element of list label.
			 */
			$l_i_label_element = (int) anrghg_apply_config( 'anrghg_reference_list_label_element' );
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
			$l_s_list .= ' class="anrghg-list-heading';
			if ( $l_b_collapsible ) {
				$l_s_list .= ' anrghg-pointer">';
			} else {
				$l_s_list .= '" tabindex="0" aria-label="' . $l_s_conf_aria_label . '">';
			}
			$l_s_list .= $l_s_display_label;
			$l_s_list .= "</$l_s_label_element>";
			if ( $l_b_collapsible ) {
				$l_s_list .= '</a></label>';
			}

			/**
			 * Generates the list.
			 */
			$l_i_count = 1;
			$l_s_list .= "\r\n\t\t" . '<div class="anrghg-reference-list-body">';
			foreach ( $l_a_parsed_refs as $l_i_index => $l_s_parsed_ref ) {
				$l_s_number       = anrghg_convert_number( $l_i_count, $l_i_numbering );
				$l_s_fragment_id  = $l_s_url_id_prefix . $l_s_connector . $l_s_list_id;
				$l_s_fragment_id .= $l_s_connector . $l_s_number;
				$l_s_list        .= "\r\n\t\t\t" . '<div class="anrghg-reference-row anrghg-offset-anchor"';
				$l_s_list        .= ' role="row" id="' . $l_s_fragment_id . '">';

				/**
				 * Generates the list item link.
				 */
				$l_b_list_link = (bool) anrghg_apply_config( 'anrghg_reference_item_link_active' );
				if ( $l_b_list_link ) {
					$l_s_list .= '<a class="anrghg-reference-link';
					$l_s_list .= '" target="_top" href="#' . $l_s_fragment_id;
					$l_s_list .= '" title="' . $l_s_link_tooltip_text . '">';
				}
				$l_s_list .= "\r\n\t\t\t\t" . '<div class="anrghg-reference-number" role="rowheader" aria-label="';
				$l_s_list .= sprintf( $l_s_item_aria_label, $l_s_number ) . '">';
				$l_s_list .= $l_b_bullet_active ? $l_s_bullet : $l_s_number;
				$l_s_list .= '</div><!--.anrghg-reference-number-->';
				if ( $l_b_list_link ) {
					$l_s_list .= '</a>';
				}
				$l_s_list .= "\r\n\t\t\t\t" . '<div class="anrghg-reference-content" role="cell" tabindex="0">';
				$l_s_list .= $l_s_parsed_ref . '</div><!--.anrghg-reference-content-->';
				$l_s_list .= "\r\n\t\t\t</div><!--.anrghg-reference-row-->";
				$l_i_count++;
			}
			$l_s_list .= "\r\n\t\t</div><!--.anrghg-reference-list-body-->";
			$l_s_list .= "\r\n\t</div><!--.anrghg-reference-list-->";
			$l_s_list .= "\r\n</div><!--.anrghg-list-wrapper-->\r\n";

			/**
			 * Inserts the list.
			 */
			$p_s_content = substr_replace(
				$p_s_content,
				$l_s_list,
				$l_i_offset + $l_i_position,
				$l_i_len_positioner
			);
			$l_i_offset += ( strlen( $l_s_list ) - $l_i_len_positioner );
		}
	}
	return $p_s_content;
}
add_filter(
	'plugins_loaded',
	function() {
		$l_i_priority = anrghg_config_priority(
			'anrghg_reference_list_priority_select',
			'anrghg_reference_list_priority_input'
		);
		anrghg_filter_content( 'anrghg_reference_lists', $l_i_priority );
	}
);
