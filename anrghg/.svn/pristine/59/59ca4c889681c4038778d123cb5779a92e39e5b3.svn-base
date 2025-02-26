<?php
/**
 * Support for the “Include partial” block.
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
 * Replaces the div output by the block with the HTML to be included.
 *
 * @since 1.15.0
 * Based on an original idea from 2023-10-06T0447+0200: A block with input fields
 * for the absolute path of a locally stored partial and a value (class names) of
 * a placeholder, output as data attributes, with backend preg_replace().
 *
 * Placeholder:
 * The partial may — but does not need to — contain a single instance or multiple
 * instances of the placeholder `{{{anrghg-value}}}`.
 * The Block Inspector input field for additional CSS classes is used to set up a
 * second placeholder, whose default name is `{{{anrghg-classes}}}`.
 * Both placeholders are configurable, and so is the file path in case a trunk is
 * to be configured, with an upside of shorter paths in the block input field.
 *
 * Rationale:
 * Previously, the partials needed to be pasted into Custom HTML blocks, provided
 * they were small enough. E.g. 2.1MB (5565 lines, 1.9 million characters) is too
 * much for a page to be saved to the database. This feature fixes the issues of
 * size and maintainability since the partials can be updated collectively by FTP
 * instead of opening each page in the Block Editor and updating the HTML blocks.
 *
 * @since 1.16.0 KSES filter the partial before output.
 * @since 1.16.0 Parse the classes added in the Block Inspector’s Advanced section.
 * @since 1.16.0 Configurable base directory and placeholders.
 *
 * @param  string $p_s_content  Content of the post or page.
 * @return string
 */
function anrghg_include_partial( $p_s_content ) {
	global $g_a_anrghg_config;

	preg_match_all(
		'/<div class="wp-block-anrghg-include([^"]*)" data-path="([^"]*)"(?: data-value="([^"]+)")?><\/div>/',
		$p_s_content,
		$l_a_matches,
		PREG_OFFSET_CAPTURE
	);

	$l_i_offset = 0;
	foreach ( $l_a_matches[0] as $l_i_index => $l_a_match ) {
		list(
			$l_s_data_div,
			$l_i_position
		)            = $l_a_match;
		$l_i_len_div = strlen( $l_s_data_div );

		$l_s_path = $l_a_matches[2][ $l_i_index ][0];
		if ( '/' !== $l_s_path[0] ) {
			$l_s_path = $g_a_anrghg_config['anrghg_include_base_directory'] . $l_s_path;
		}
		// Cannot use wp_remote_get() since this performs an HTTP request.
		// phpcs:ignore
		$l_s_include = $l_s_path ? file_get_contents( $l_s_path ) : '';

		$l_s_classes = $l_a_matches[1][ $l_i_index ][0];
		$l_s_include = str_replace( $g_a_anrghg_config['anrghg_include_classes_placeholder'], $l_s_classes, $l_s_include );

		if ( isset( $l_a_matches[3][ $l_i_index ][0] ) ) {
			$l_s_value = $l_a_matches[3][ $l_i_index ][0];
		} else {
			$l_s_value = '';
		}
		$l_s_include = str_replace( $g_a_anrghg_config['anrghg_include_value_placeholder'], $l_s_value, $l_s_include );

		/**
		 * Filters the partial using an extended KSES filter.
		 *
		 * @since 1.16.0
		 * @see filtered.php
		 * This filter is deactivatable by top level Admins (Admins in single site,
		 * Super Admins in multisite).
		 */
		if ( $g_a_anrghg_config['anrghg_include_html_filter_active'] ) {
			$l_s_include = anrghg_kses( $l_s_include );
		}

		$p_s_content = substr_replace(
			$p_s_content,
			$l_s_include,
			$l_i_offset + $l_i_position,
			$l_i_len_div
		);
		$l_i_offset += ( strlen( $l_s_include ) - $l_i_len_div );
	}

	return $p_s_content;
}
add_filter(
	'plugins_loaded',
	function() {
		anrghg_filter_content( 'anrghg_include_partial', 10 );
	}
);
