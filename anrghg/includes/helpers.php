<?php
/**
 * Helping features.
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
 * Fixes automatic excerpts.
 *
 * @since 0.27.4 Bare complement removal without anything else.
 * @since 0.35.1 Fully fledged excerpt generation.
 *
 * @contributor** @martinneumannat
 * @link https://wordpress.org/support/topic/problem-with-footnotes-in-excerpts-of-the-blog-page/
 * @reporter** @andrebraselmann
 * @link https://wordpress.org/support/topic/footnotes-in-text-excerpts-on-home-page/
 *
 * The automatic excerpt generation, lacking an early hook, is replicated,
 * with complement removal, and without applying `the_content` filters.
 * Else the table of contents, if prepended, fills the excerpt.
 * In manual excerpts, complements are processed as usual.
 * @since 0.68.0 Settings to control filter application in both cases.
 * @since 0.68.0 Setting to turn off redesigned automatic excerpts.
 *
 * @see `wp_trim_excerpt()` in wp-includes/formatting.php:3840..3900
 * We cannot use `has_excerpt()` since it fails to trim.
 */
add_filter(
	'plugins_loaded',
	function() {
		add_filter(
			'the_excerpt',
			function( $p_s_content ) {
				global $post;
				$l_s_raw_excerpt    = $p_s_content;
				$l_s_manual_excerpt = trim( $post->post_excerpt );
				if ( empty( $l_s_manual_excerpt ) ) {
					if ( anrghg_apply_config( 'anrghg_clean_auto_excerpts' ) ) {
						$p_s_content = get_the_content( '', false, get_the_ID() );
						$p_s_content = strip_shortcodes( $p_s_content );
						$p_s_content = excerpt_remove_blocks( $p_s_content );
						$p_s_content = anrghg_remove_complements( $p_s_content );
						if ( anrghg_apply_config( 'anrghg_apply_the_content_auto_excerpts' ) ) {
							$p_s_content = apply_filters( 'the_content', $p_s_content );
						}
						$p_s_content        = str_replace( ']]>', ']]&gt;', $p_s_content );
						$l_i_excerpt_length = (int) _x( '55', 'excerpt_length' );
						$l_i_excerpt_length = (int) apply_filters( 'excerpt_length', $l_i_excerpt_length );
						$l_s_excerpt_more   = apply_filters( 'excerpt_more', ' [&hellip;]' );
						$p_s_content        = wp_trim_words( $p_s_content, $l_i_excerpt_length, $l_s_excerpt_more );
					}
				} else {
					$p_s_content = anrghg_process_complements( $l_s_manual_excerpt );
					if ( anrghg_apply_config( 'anrghg_apply_the_content_manual_excerpts' ) ) {
						$p_s_content = apply_filters( 'the_content', $p_s_content );
					}
				}
				return apply_filters( 'wp_trim_excerpt', $p_s_content, $l_s_raw_excerpt );
			}
		);
	}
);

/**
 * Optionally deactivates WPTexturize.
 *
 * @since 0.9.0
 * Protects ASCII quotation marks against replacement with curly quotation marks.
 * @courtesy THE WEB FLASH
 * @link https://www.thewebflash.com/how-to-properly-disable-wptexturize-in-wordpress/
 * @link https://web.archive.org/web/20211123083648/https://www.thewebflash.com/how-to-properly-disable-wptexturize-in-wordpress/
 */
add_filter(
	'plugins_loaded',
	function() {
		if ( ! anrghg_apply_config( 'anrghg_wptexturize_active' ) ) {
			add_filter( 'run_wptexturize', '__return_false' );
		}
	}
);

/**
 * Cleans up errand meta tags and removes stray meta elements on public pages.
 *
 * @since 0.74.0 As part of Notes and sources.
 * @since 1.14.1 Move to dedicated feature and make it the default behavior.
 * Copes with Chromium prepending a charset meta tag to internal cut/copy-paste,
 * and this becoming invalid HTML, while the Block Editor attempts to fix it.
 * @link https://github.com/WordPress/gutenberg/issues/33585
 * @link https://github.com/WordPress/gutenberg/issues/34867
 * @link https://github.com/WordPress/gutenberg/pull/36356
 * Unsolved issue as of 2023-09-06T1840+0200.
 * @link https://github.com/WordPress/gutenberg/issues/53978
 * This is the option removing stray meta tags from output. Prevents stray meta tags
 * from showing up on public pages.
 * @see ./interoperability.php
 * While the proper fix is added and deployed, for the time being, this can be fixed
 * reusing a similar fix addressing a different charset meta tag.
 * @see block-editor.js:54907
 * @link https://bugs.chromium.org/p/chromium/issues/detail?id=1264616
 * Issue temporarily fixed as of 2023-10-19T0646+0200.
 * In wp-includes/js/dist/block-editor.min.js, replace `<meta charset='utf-8'>` with
 * `<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">`.
 * @see wp-includes/js/dist/block-editor.js:54916
 * @link https://github.com/WordPress/gutenberg/issues/53978#issuecomment-1769880114
 * The final fix requires adding a new function.
 * @link https://github.com/WordPress/gutenberg/issues/53978#issuecomment-1770395361
 */
add_filter(
	'plugins_loaded',
	function() {
		anrghg_filter_content( 'anrghg_clean_up_meta_tags' );
	}
);
