<?php
/**
 * Functions for interoperability.
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
 * Filters all content-related hooks.
 *
 * @since 0.33.0 Modularized.
 * To add support for additional hooks, please filter the config hook
 * `anrghg_additional_content_hooks`.
 *
 * @since 0.9.0 Support for category pages.
 * @reporter** @vitaefit
 * @link https://wordpress.org/support/topic/footnote-doesntwork-on-category-page/
 * @contributor** @misfist
 * @link https://wordpress.org/support/topic/footnote-doesntwork-on-category-page/#post-13864859
 * Category pages can have rich HTML content in a term description with article status
 * when WordPress’ built-in partial HTML blocker is deactivated.
 * @see * Allows HTML in term (category, tag) descriptions.
 *
 * @since 0.34.2 Support for Popup Maker (Code Atlantic) `pum_popup_content`.
 * @since 0.34.3 Support for Popup Builder (Sygnoos) `sgpbSubscriptionForm`.
 * @since 0.40.0 Dedicated content filter hook `anrghg_content_filter_hook`.
 *
 * @since 0.63.0 Support for Advanced Custom Fields (Delicious Brains) `acf_the_content`.
 * Optional ability to process custom fields separately.
 * @reporter** @gregfuller
 * @link https://wordpress.org/support/topic/enhancement-request-8/
 *
 * @since 0.66.0 Change extra content hook name from `anrghg_content_filter_hook` to
 * `anrghg_the_content`. Leave old hook for backcompat but remove it from documentation.
 * @since 1.14.1 Set default priority.
 * @since 1.16.0 Move from `modular.php` to new `interoperability.php`.
 *
 * @param  string $p_s_callback The callback function name.
 * @param  int    $p_i_priority The priority. Defaults to 10.
 * @return void
 */
function anrghg_filter_content( $p_s_callback, $p_i_priority = 10 ) {
	$l_a_hooks = array(

		/**
		 * WordPress basics.
		 */
		'the_content',
		'term_description',

		/**
		 * Vendors.
		 */
		'pum_popup_content',
		'sgpbSubscriptionForm',

		/**
		 * A.N.R.GHG Publishing Toolkit.
		 */
		'anrghg_the_content',
		'anrghg_content_filter_hook', // Backcompat.
	);
	if ( anrghg_apply_config( 'anrghg_filter_acf_the_content_hook' ) ) {
		$l_a_hooks[] = 'acf_the_content';
	}
	$l_a_hooks = anrghg_support_more_hooks( $l_a_hooks, 'anrghg_additional_content_hooks' );
	foreach ( $l_a_hooks as $l_s_hook ) {
		add_filter( $l_s_hook, $p_s_callback, $p_i_priority );
	}
}

/**
 * Adds custom hook names to hook the filters on.
 *
 * @since 0.38.0
 * Designed to support custom post types using non-standard hooks.
 * @reporter** @aenniss
 * @link https://wordpress.org/support/topic/doesnt-work-in-custon-post-types/
 *
 * @param  array  $p_a_hooks      Hooks already supported.
 * @param  string $p_s_config_key Setting to add hook names.
 * @return array  $p_a_hooks      Augmented hooks array.
 */
function anrghg_support_more_hooks( $p_a_hooks, $p_s_config_key ) {
	$l_s_hooks = anrghg_apply_config( $p_s_config_key );
	if ( ! empty( $l_s_hooks ) ) {
		$l_a_hooks = explode( ',', $l_s_hooks );
		foreach ( $l_a_hooks as $l_i_index => $l_s_hook ) {
			$p_a_hooks[] = trim( $l_s_hook );
		}
	}
	return $p_a_hooks;
}

/**
 * Filters both AMP and non-AMP head hooks.
 *
 * @since 0.34.3 Modularized.
 *
 * @since 0.9.0 Compatibility with AMP legacy Reader theme.
 * @contributor** Milind More @milindmore22
 * @link https://github.com/ampproject/amp-wp/issues/6055#issuecomment-815691739
 *
 * @param  string $p_s_callback The callback function name.
 * @param  int    $p_i_priority The priority.
 * @return void
 */
function anrghg_filter_head( $p_s_callback, $p_i_priority ) {
	$l_a_hooks = array(
		'wp_head',
		'amp_post_template_head',
	);
	foreach ( $l_a_hooks as $l_s_hook ) {
		add_filter( $l_s_hook, $p_s_callback, $p_i_priority );
	}
}

/**
 * Adds pseudo Elementor markup for test purposes.
 *
 * @since 0.30.0
 * @since 0.56.0 Modularized.
 * @since 0.63.0 Invisible; activatable on the settings page.
 * @see * Assesses Elementor integration.
 * @see * Integrates the lists in Elementor leftover.
 * @see * Completes Elementor integration if applicable.
 * @param  string $p_s_content Article.
 * @return string $p_s_content
 */
function anrghg_elementor_integration_test( $p_s_content ) {
	global $g_b_elementor_test_markup;
	if ( anrghg_apply_config( 'anrghg_activate_elementor_test_mode' ) && ! $g_b_elementor_test_markup ) {
		$l_s_test_start  = "\r\n\t\t<!-- Elementor Integration test markup start tags -->";
		$l_s_test_start .= "\r\n\t\t<div>\r\n\t\t\t<div>\r\n\t\t\t\t<section>";
		$l_s_test_start .= "\r\n\t\t\t\t\t<div>\r\n\t\t\t\t\t\t<div>\r\n\t\t\t\t\t\t\t<div>";
		$l_s_test_start .= "\r\n\t\t\t\t\t\t\t\t<div class=\"elementor-element other-class\"></div>";
		$l_s_test_end    = "\r\n\t\t\t\t\t\t\t<!-- Elementor Integration test markup end tags -->";
		$l_s_test_end   .= "\r\n\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t</div>\r\n\t\t\t\t\t</div>";
		$l_s_test_end   .= "\r\n\t\t\t\t</section>\r\n\t\t\t</div>\r\n\t\t</div>";

		$p_s_content               = $l_s_test_start . $p_s_content . $l_s_test_end;
		$g_b_elementor_test_markup = true;
	}
	return $p_s_content;
}

/**
 * Assesses Elementor integration.
 *
 * @since 0.30.0
 * @since 0.56.0 Modularized.
 * @reporter** @morsagmon
 * @link https://wordpress.org/support/topic/references-section-not-expanding-with-elementor-accordion/
 * @reporter** @drjkiel
 * @link https://wordpress.org/support/topic/references-not-aligned-with-rest-of-page/
 * Needed if lists are appended to a section with remainder status,
 * not inserted at a final positioner which is the state-of-the-art
 * workaround solution by lack of equivalent Elementor integration.
 * @see * Integrates the lists in Elementor leftover.
 * @see * Completes Elementor integration if applicable.
 * @param  string $p_s_content         Article.
 * @return bool   $l_b_elementor_moot  True if the page is built with Elementor.
 */
function anrghg_elementor_integration_assessment( $p_s_content ) {
	$l_b_elementor_moot = true;
	if ( 1 !== preg_match( '/<div\s+class="elementor-element/i', $p_s_content ) ) {
		$l_b_elementor_moot = false;
	}
	return $l_b_elementor_moot;
}

/**
 * Integrates the lists in Elementor leftover.
 *
 * @since 0.30.0
 * @since 0.56.0 Modularized.
 * @reporter** @morsagmon
 * @link https://wordpress.org/support/topic/references-section-not-expanding-with-elementor-accordion/
 * @reporter** @drjkiel
 * @link https://wordpress.org/support/topic/references-not-aligned-with-rest-of-page/
 * @see * Assesses Elementor integration.
 * @see * Completes Elementor integration if applicable.
 * Based on the assumption that the six last end tags are stable.
 * Enters fallback mode in case unexpected markup is encountered.
 * @param  string $p_s_content  The post or section.
 * @return mixed  $p_s_content  Same with opened tags, or false.
 */
function anrghg_elementor_integration_opening( $p_s_content ) {
	$l_a_tag_names = array( 'div', 'div', 'section', 'div', 'div', 'div' );
	$l_s_edited    = $p_s_content;
	$l_b_done      = true;
	foreach ( $l_a_tag_names as $l_s_tag_name ) {
		$l_s_end_tag = '</' . $l_s_tag_name . '>';
		if ( substr( trim( $l_s_edited ), -( strlen( $l_s_end_tag ) ) ) === $l_s_end_tag ) {
			$l_s_edited = substr( trim( $l_s_edited ), 0, -( strlen( $l_s_end_tag ) ) );
		} else {
			$l_b_done = false;
			break;
		}
	}
	if ( $l_b_done ) {
		return $l_s_edited;
	} else {
		return false;
	}
}

/**
 * Completes Elementor integration if applicable.
 *
 * @since 0.30.0
 * @since 0.56.0 Modularized.
 * @reporter** @morsagmon
 * @link https://wordpress.org/support/topic/references-section-not-expanding-with-elementor-accordion/
 * @reporter** @drjkiel
 * @link https://wordpress.org/support/topic/references-not-aligned-with-rest-of-page/
 * @see * Assesses Elementor integration.
 * @see * Integrates the lists in Elementor leftover.
 * @param  string $p_s_content Article.
 * @return string $p_s_content
 */
function anrghg_elementor_integration_closing( $p_s_content ) {
	$p_s_content .= "\r\n\t\t\t\t\t\t\t</div>";
	$p_s_content .= "\r\n\t\t\t\t\t\t</div>";
	$p_s_content .= "\r\n\t\t\t\t\t</div>";
	$p_s_content .= "\r\n\t\t\t\t</section>";
	$p_s_content .= "\r\n\t\t\t</div>";
	$p_s_content .= "\r\n\t\t</div>\r\n";
	return $p_s_content;
}

/**
 * Cleans up leftover block comment nodes.
 *
 * @since 0.35.1
 * Required before processing rich term descriptions.
 * Innocuous when called on other content.
 * Removes empty paragraph elements in the wake.
 * @param  string $p_s_content Article.
 * @return string $p_s_content
 */
function anrghg_remove_block_comment_nodes( $p_s_content ) {
	$p_s_content = excerpt_remove_blocks( $p_s_content );
	$p_s_content = str_replace( '<p></p>', '', $p_s_content );
	return $p_s_content;
}

/**
 * Cleans up errand meta tags in the content.
 *
 * @since 0.74.0
 * @since 1.15.0 Remove end tag too in case it is present.
 * This meta tag appears to be added in the post, multiple times.
 * Initially, an entire empty element is added in front of internal paste, when
 * the clipboard content originates from a paragraph block in the block editor.
 * Block recovery removes the end tag, still not making it valid HTML in body.
 * Once there, it may appear likewise that these tags are escaped.
 * @link https://github.com/WordPress/gutenberg/issues/53978
 * @param  string $p_s_content  The post or page.
 * @return string $p_s_content
 */
function anrghg_clean_up_meta_tags( $p_s_content ) {
	$p_s_content = str_replace(
		array(
			'<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>',
			'<meta http-equiv="content-type" content="text/html; charset=utf-8">',
			'\u003cmeta http-equiv=\u0022content-type\u0022 content=\u0022text/html; charset=utf-8\u0022\u003e',
		),
		'',
		$p_s_content
	);
	return $p_s_content;
}
