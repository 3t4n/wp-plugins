<?php
/**
 * Visible and meta tag published and last modified dates.
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
 * Prepends or appepends published and/or last modified dates to the post or page.
 *
 * @since 0.9.0
 * @courtesy Shaun Quarton
 * @link https://pagely.com/blog/display-post-last-updated-wordpress/
 * @date 2019-04-07
 * Consistently with current practice, both dates are link text of
 * the permalink, and a tooltip shows the time.
 * @since 0.36.0 Meta box field to manually add Published first information.
 * @since 0.56.0 Prevent isolated dates from being accessed by tab, to avoid
 * screenreader output of technical information out of context.
 * @since 1.6.20 Prevent custom post types from causing undefined variable.
 * @since 1.7.6  Fix missing date on category pages and date-based archives.
 * Display dates on category pages and date-based archives since it matters.
 * @param  string $p_s_content Content of the post or page.
 * @return string
 */
function anrghg_display_dates( $p_s_content ) {
	if ( ! is_singular() && ! is_category() && ! is_date() ) {
		return $p_s_content;
	}
	$l_i_post_id = get_the_ID();
	$l_s_url     = get_permalink( $l_i_post_id );
	$l_s_type    = get_post_type( $l_i_post_id );
	if ( 'post' !== $l_s_type && 'page' !== $l_s_type ) {
		return $p_s_content;
	}
	$l_b_chrono_top_post     = (bool) anrghg_apply_config( 'anrghg_dates_post_top_chrono' );
	$l_b_chrono_end_post     = (bool) anrghg_apply_config( 'anrghg_dates_post_end_chrono' );
	$l_b_chrono_top_page     = (bool) anrghg_apply_config( 'anrghg_dates_page_top_chrono' );
	$l_b_chrono_end_page     = (bool) anrghg_apply_config( 'anrghg_dates_page_end_chrono' );
	$l_b_top_mod_post        = (bool) anrghg_apply_config( 'anrghg_dates_post_top_modif' );
	$l_b_top_pub_post        = (bool) anrghg_apply_config( 'anrghg_dates_post_top_publi' );
	$l_b_end_mod_post        = (bool) anrghg_apply_config( 'anrghg_dates_post_end_modif' );
	$l_b_end_pub_post        = (bool) anrghg_apply_config( 'anrghg_dates_post_end_publi' );
	$l_b_top_mod_page        = (bool) anrghg_apply_config( 'anrghg_dates_page_top_modif' );
	$l_b_top_pub_page        = (bool) anrghg_apply_config( 'anrghg_dates_page_top_publi' );
	$l_b_end_mod_page        = (bool) anrghg_apply_config( 'anrghg_dates_page_end_modif' );
	$l_b_end_pub_page        = (bool) anrghg_apply_config( 'anrghg_dates_page_end_publi' );
	$l_s_published_first_top = get_post_meta( $l_i_post_id, 'anrghg_published_first_top', true ); // May be empty.
	$l_s_published_first_end = get_post_meta( $l_i_post_id, 'anrghg_published_first_end', true ); // May be empty.
	$l_s_first_top_prefill   = get_post_meta( $l_i_post_id, 'anrghg_published_first_top_prefill', true ); // Stable across setting changes.
	$l_s_first_end_prefill   = get_post_meta( $l_i_post_id, 'anrghg_published_first_end_prefill', true ); // Stable across setting changes.
	if ( trim( $l_s_first_top_prefill ) === trim( $l_s_published_first_top ) ) {
		$l_s_published_first_top = '';
	}
	if ( trim( $l_s_first_end_prefill ) === trim( $l_s_published_first_end ) ) {
		$l_s_published_first_end = '';
	}
	$l_b_top_pub_first      = ! empty( $l_s_published_first_top );
	$l_b_end_pub_first      = ! empty( $l_s_published_first_end );
	$l_b_uni                = (bool) anrghg_apply_config( 'anrghg_dates_label_uni' );
	$l_s_label_mod          = anrghg_apply_config( 'anrghg_dates_label_modified' );
	$l_s_label_pub          = anrghg_apply_config( 'anrghg_dates_label_published' );
	$l_s_label_top_mod_post = anrghg_apply_config( 'anrghg_dates_label_post_top_modif' );
	$l_s_label_top_pub_post = anrghg_apply_config( 'anrghg_dates_label_post_top_publi' );
	$l_s_label_end_mod_post = anrghg_apply_config( 'anrghg_dates_label_post_end_modif' );
	$l_s_label_end_pub_post = anrghg_apply_config( 'anrghg_dates_label_post_end_publi' );
	$l_s_label_top_mod_page = anrghg_apply_config( 'anrghg_dates_label_page_top_modif' );
	$l_s_label_top_pub_page = anrghg_apply_config( 'anrghg_dates_label_page_top_publi' );
	$l_s_label_end_mod_page = anrghg_apply_config( 'anrghg_dates_label_page_end_modif' );
	$l_s_label_end_pub_page = anrghg_apply_config( 'anrghg_dates_label_page_end_publi' );
	$l_s_updated_day        = get_the_modified_time( get_option( 'date_format' ) );
	$l_s_updated_time       = get_the_modified_time( 'H:iO' );
	$l_s_updated_iso8601    = get_the_modified_time( 'Y-m-d\TH:i:sO' );
	$l_s_published_day      = get_the_time( get_option( 'date_format' ) );
	$l_s_published_time     = get_the_time( 'H:iO' );
	$l_s_published_iso8601  = get_the_time( 'Y-m-d\TH:i:sO' );
	$l_s_updated            = "<time datetime=\"$l_s_updated_iso8601\"><a href=\"$l_s_url\" tabindex=\"-1\"";
	$l_s_updated           .= " title=\"$l_s_updated_time\">$l_s_updated_day</a></time>";
	$l_s_published          = "<time datetime=\"$l_s_published_iso8601\"><a href=\"$l_s_url\" tabindex=\"-1\"";
	$l_s_published         .= " title=\"$l_s_published_time\">$l_s_published_day</a></time>";

	$l_a_top = array();
	if ( $l_b_top_pub_first ) {
		$l_a_top[] = '<span class="anrghg-date-published-first">' . anrghg_parse_message(
			$l_s_published_first_top
		);
	}
	if ( ${"l_b_top_pub_$l_s_type"} ) {
		$l_a_top[] = '<span class="anrghg-date-published">' . sprintf( ( $l_b_uni ? $l_s_label_pub : ${"l_s_label_top_pub_$l_s_type"} ), $l_s_published );
	}
	if ( ${"l_b_top_mod_$l_s_type"} ) {
		$l_a_top[] = '<span class="anrghg-date-edited">' . sprintf( ( $l_b_uni ? $l_s_label_mod : ${"l_s_label_top_mod_$l_s_type"} ), $l_s_updated );
	}

	$l_a_end = array();
	if ( $l_b_end_pub_first ) {
		$l_a_end[] = '<span class="anrghg-date-published-first">' . anrghg_parse_message(
			$l_s_published_first_end
		);
	}
	if ( ${"l_b_end_pub_$l_s_type"} ) {
		$l_a_end[] = '<span class="anrghg-date-published">' . sprintf( ( $l_b_uni ? $l_s_label_pub : ${"l_s_label_end_pub_$l_s_type"} ), $l_s_published );
	}
	if ( ${"l_b_end_mod_$l_s_type"} ) {
		$l_a_end[] = '<span class="anrghg-date-edited">' . sprintf( ( $l_b_uni ? $l_s_label_mod : ${"l_s_label_end_mod_$l_s_type"} ), $l_s_updated );
	}

	if ( 0 !== count( $l_a_top ) ) {
		$l_s_add = '';
		foreach ( $l_a_top as $l_s_line ) {
			if ( ${"l_b_chrono_top_$l_s_type"} ) {
				$l_s_add .= $l_s_line . '</span><br />';
			} else { // See `array_reverse()` in docblock.
				$l_s_add = $l_s_line . '</span><br />' . $l_s_add;
			}
		}
		$l_s_add     = substr( $l_s_add, 0, -6 );
		$l_s_add     = "\r\n\r\n<div class=\"anrghg-dates-$l_s_type-top\" tabindex=\"0\">$l_s_add</div><!--.anrghg-dates-$l_s_type-top-->\r\n\r\n";
		$p_s_content = $l_s_add . $p_s_content;
	}
	if ( 0 !== count( $l_a_end ) ) {
		$l_s_add = '';
		foreach ( $l_a_end as $l_s_line ) {
			if ( ${"l_b_chrono_end_$l_s_type"} ) {
				$l_s_add .= $l_s_line . '</span><br />';
			} else { // See `array_reverse()` in docblock.
				$l_s_add = $l_s_line . '</span><br />' . $l_s_add;
			}
		}
		$l_s_add      = substr( $l_s_add, 0, -6 );
		$l_s_add      = "\r\n\r\n<div class=\"anrghg-dates-$l_s_type-end\" tabindex=\"0\">$l_s_add</div><!--.anrghg-dates-$l_s_type-end-->\r\n\r\n";
		$p_s_content .= $l_s_add;
	}
	return $p_s_content;
}
add_filter(
	'plugins_loaded',
	function() {
		if ( anrghg_apply_config( 'anrghg_dates_active' ) ) {
			$l_i_priority = anrghg_config_priority(
				'anrghg_dates_priority_select',
				'anrghg_dates_priority_input'
			);
			anrghg_filter_content( 'anrghg_display_dates', $l_i_priority );
		}
	}
);

/**
 * Adds published and last modified date meta tags.
 *
 * @since 0.9.0
 * @courtesy Aurovrata Venet
 * Code Reference WordPress.org, wp_head, Re, 2017.
 * @link https://developer.wordpress.org/reference/hooks/wp_head/
 * Code Reference WordPress.org, `the_modified_date()`, Source.
 * @link https://developer.wordpress.org/reference/functions/the_modified_date/#source
 *
 * WordPress doesn’t routinely insert the published and last modified dates,
 * with respect to authors who do not wish to disclose this information.
 * That backfires when it comes to bibliography software grabbing metadata from
 * the page head, and citation styles filling in the “no date”, n.d. placeholder.
 * @link https://wordpress.org/support/topic/display-meta-propertyarticlepublished_time/
 * @link https://wordpress.org/support/topic/remove-propertyarticlepublished_time/
 *
 * The `post` object can be modified by third parties and is thus unreliable.
 * The recommended way to access this metadata is by calling `get_the_*()`.
 * @return void
 */
function anrghg_add_date_meta_tags() {
	if ( anrghg_apply_config( 'anrghg_date_meta_common_published' ) ) {
		echo wp_kses(
			"\t<meta name=\"date\" content=\"" . get_the_date( 'Y-m-d\TH:i:sO' ) . "\" />\r\n",
			array(
				'meta' => array(
					'name'    => true,
					'content' => true,
				),
			)
		);
	}
	if ( anrghg_apply_config( 'anrghg_date_meta_common_last_edit' ) ) {
		echo wp_kses(
			"\t<meta name=\"last-modified\" content=\"" . get_the_modified_date( 'Y-m-d\TH:i:sO' ) . "\" />\r\n",
			array(
				'meta' => array(
					'name'    => true,
					'content' => true,
				),
			)
		);
	}
	if ( anrghg_apply_config( 'anrghg_date_meta_open_g_published' ) ) {
		echo wp_kses(
			"\t<meta property=\"article:published_time\" content=\"" . get_the_date( 'Y-m-d\TH:i:sO' ) . "\" />\r\n",
			array(
				'meta' => array(
					'property' => true,
					'content'  => true,
				),
			)
		);
	}
	if ( anrghg_apply_config( 'anrghg_date_meta_open_g_last_edit' ) ) {
		echo wp_kses(
			"\t<meta property=\"article:modified_time\" content=\"" . get_the_modified_date( 'Y-m-d\TH:i:sO' ) . "\" />\r\n",
			array(
				'meta' => array(
					'property' => true,
					'content'  => true,
				),
			)
		);
	}
}
add_filter(
	'plugins_loaded',
	function() {
		if ( anrghg_apply_config( 'anrghg_date_meta_tags_active' ) ) {
			anrghg_filter_head( 'anrghg_add_date_meta_tags', 1 );
		}
	}
);
