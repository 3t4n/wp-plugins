<?php
/**
 * Customization facilities other than CSS input.
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
 * Loads web fonts.
 *
 * @since 1.9.0
 * The format is a semicolon-separated list of URLs.
 * Adding the code directly is a recommended way of adding web fonts,
 * so that method is used here to avoid the overheads from enqueuing.
 * @link https://www.wpbeginner.com/wp-themes/how-to-add-custom-fonts-in-wordpress/
 * @since 1.9.2
 * Improve performance by preconnecting to Google Fonts.
 * @link https://www.cdnplanet.com/blog/faster-google-webfonts-preconnect/
 * @return void
 */
function anrghg_add_web_fonts() {
	if ( anrghg_apply_config( 'anrghg_web_fonts_active' ) ) {
		$l_s_urls = anrghg_apply_config( 'anrghg_web_font_urls' );
		if ( ! empty( trim( $l_s_urls ) ) ) {
			$l_a_fonts = explode( ';', $l_s_urls );
			echo wp_kses(
				"\t<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\r\n"
				. "\t<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\"  crossorigin>\r\n",
				array(
					'link' => array(
						'rel'         => true,
						'href'        => true,
						'crossorigin' => true,
					),
				)
			);
			foreach ( $l_a_fonts as $l_i_index => $l_s_font ) {
				$l_s_url = trim( $l_s_font );
				if ( ! empty( $l_s_url ) ) {
					echo wp_kses(
						// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet
						"\t<link rel=\"stylesheet\" href=\"" . $l_s_url . "\">\r\n",
						array(
							'link' => array(
								'rel'  => true,
								'href' => true,
							),
						)
					);
				}
			}
		}
	}
}
add_filter(
	'plugins_loaded',
	function() {
		if ( anrghg_apply_config( 'anrghg_web_fonts_active' ) ) {
			anrghg_filter_head( 'anrghg_add_web_fonts', 1 );
		}
	}
);

/**
 * Adds the URL slug as a class of the body element.
 *
 * @since 0.9.0
 * @courtesy WPBeginner.
 * @link https://www.wpbeginner.com/wp-themes/how-to-add-page-slug-in-body-class-of-your-wordpress-themes/
 * @since 0.12.1 Get the slug by calling functions rather than
 * from properties of the $post object.
 * @link https://wordpress.stackexchange.com/questions/42117/how-do-i-retrieve-the-slug-of-the-current-page
 * @since 0.26.0 Ensure valid CSS class names by prepending an
 * underscore to post or page slugs starting with a digit.
 * @since 0.80.5 Sanitize the class name using `sanitize_html_class()`.
 * @since 1.6.11 Improve as documented below.
 * Maybe use other method for gathering the data, but it didn’t make
 * any difference.
 * @link https://wordpress.stackexchange.com/questions/42117/how-do-i-retrieve-the-slug-of-the-current-page/188945#188945
 * @since 1.6.15 Add low priority to be sure it keeps working past WP v6.
 * @link https://developer.wordpress.org/reference/hooks/body_class/#comment-5871
 * @param  array $p_a_body_classes  Classes of the body element.
 * @return array $p_a_body_classes  Classes of the body element.
 */
add_filter(
	'plugins_loaded',
	function() {
		if ( anrghg_apply_config( 'anrghg_slug_body_class_active' ) ) {
			add_filter(
				'body_class',
				function( $p_a_body_classes ) {
					$l_i_post_id = get_the_ID();

					/**
					 * Adds a simplified class based on post ID.
					 *
					 * @since 1.6.11
					 */
					$l_s_based_on_id    = 'id-' . $l_i_post_id;
					$p_a_body_classes[] = $l_s_based_on_id;

					/**
					 * Adds “sanitized” class based on slug.
					 *
					 * @since 0.9.0
					 * @since 1.6.11 URL-decode.
					 * @since 1.6.13 Prefix configurable.
					 * @since 1.6.15 Sanitize the “sanitized” class name.
					 * “Sanitizing” a class may result in an invalid class
					 * when a hyphenated digit is appended to disambiguate
					 * multiple instances of a non-ASCII title.
					 * @link https://github.com/ampproject/amp-wp/issues/7238
					 * @see anrghg_sanitize_html_id_class() in ./modular.php
					 */
					$l_s_prefix = anrghg_apply_config( 'anrghg_slug_body_class_prefix' );
					$l_s_soslug = anrghg_sanitize_html_id_class(
						basename( get_permalink( $l_i_post_id ) ),
						$l_s_prefix
					);
					if ( isset( $l_s_soslug ) && ! empty( $l_s_soslug ) ) {
						$l_s_class          = anrghg_sanitize_html_id_class(
							sanitize_html_class( $l_s_soslug, $l_s_based_on_id ),
							$l_s_prefix
						);
						$p_a_body_classes[] = $l_s_class;

						/**
						 * Adds non-“sanitized” slug as an additional class.
						 *
						 * @since 1.6.11
						 * This feature is not AMP compatible, because
						 * the AMP plugin is not really CSS compatible
						 * and cannot handle the full character range.
						 * @link https://github.com/ampproject/amp-wp/issues/7238
						 * @since 1.6.15 Debug CSS compliant class names without ASCII.
						 * Adding a filter to `sanitize_html_class` so as to return the
						 * original class makes the function eat its non-ASCII argument
						 * and return the fallback.
						 */
						$p_a_body_classes[] = $l_s_soslug;

					}
					return $p_a_body_classes;
				},
				PHP_INT_MAX
			);
		}
	}
);

/**
 * Supports extended conversions in post/page slug generation.
 *
 * @since 0.74.0
 * @see wp-includes/formatting.php:2196
 * @since 1.6.14 Force lowercase for slugs.
 * @link https://stackoverflow.com/questions/7996919/should-url-be-case-sensitive
 * CAUTION: In the editor’s slug input field, this setting is partly ineffective.
 * @link https://github.com/WordPress/gutenberg/issues/44444
 * @param  string $p_s_title     Sanitized title.
 * @param  string $p_s_raw_title The title prior to sanitization.
 * @param  string $p_s_context   The context for which the title is being sanitized.
 * @return string $p_s_title     Title after alternative sanitization.
 */
add_filter(
	'sanitize_title',
	function( $p_s_title, $p_s_raw_title, $p_s_context ) {
		if ( anrghg_apply_config( 'anrghg_alternative_sanitize_title_active' ) ) {
			if ( '' === $p_s_raw_title || false === $p_s_raw_title ) {
				$p_s_raw_title = $p_s_title; // Already $fallback_title.
			}
			$p_s_title = anrghg_simplify_fragment_id(
				$p_s_raw_title,
				(int) anrghg_apply_config( 'anrghg_fragment_identifier_max_length' ),
				0,
				true
			);
		}
		return $p_s_title;
	},
	PHP_INT_MAX,
	3
);
