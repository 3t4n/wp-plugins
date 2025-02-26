<?php
/**
 * Filtered HTML related functions.
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
 * Allows HTML in term (category, tag) descriptions.
 *
 * @since 0.35.1
 * @since 0.62.4 Make optional.
 * @since 0.62.5 Debug by moving the condition.
 * @courtesy WooCommerce
 * @link https://docs.woocommerce.com/document/allow-html-in-term-category-tag-descriptions/
 * @date 2012-04-27 Article published.
 * @date 2018-05-19 Article modified.
 * Many plugins, including Yoast, are working around the same limitation.
 * @see interoperability.php: * Filters all content-related hooks.
 *
 * @since 0.66.0 Added information below the setting about
 * making term descriptions editable in Block Editor.
 * @link https://wordpress.stackexchange.com/questions/383263/how-to-enable-gutenberg-block-editor-on-taxonomy-term-pages
 * This is already worked on.
 * @link https://developer.wordpress.org/block-editor/how-to-guides/platform/custom-block-editor/tutorial/
 * ‘Enabling Gutenberg in WP categories’ (open)
 * @link https://github.com/WordPress/gutenberg/issues/17099
 * Taxonomies are already editable in the Classic Editor when using
 * the plugin Visual Term Description Editor.
 * @link https://wordpress.org/plugins/visual-term-description-editor/
 * ‘Give categories a full gutenberg editor’ (duplicate)
 * @link https://github.com/WordPress/gutenberg/issues/37746
 * @link https://www.pootlepress.com/storefront-blocks/
 *
 * @since 1.16.0 Move from `helpers.php` to new `filtered.php`.
 */
add_filter(
	'after_setup_theme',
	function() {
		if ( anrghg_apply_config( 'anrghg_allow_html_term_description' ) ) {
			remove_filter( 'term_description', 'wp_kses_data' );
			remove_filter( 'pre_term_description', 'wp_filter_kses' );
			if ( ! current_user_can( 'unfiltered_html' ) ) {
				add_filter( 'pre_term_description', 'wp_filter_post_kses' );
			}
		}
	}
);

/**
 * Removes HTML tags and echoes CSS or a subset of JS.
 *
 * @since 0.81.5
 * Calls `wp_strip_all_tags()`.
 * This is considered sufficiently protecting.
 * Approved by WordPress Plugin Review Team on June 17, 2022.
 * NOTE: Manually whitelisted for PHPCS (not knowing so far).
 * WARNING: This works for JS only on the condition
 * that less-than signs do not occur in the script.
 * All less-than signs and following characters are
 * deleted. (Obviously, `<` is not used in CSS.)
 * @see * Style sheets.
 *
 * @since 1.16.0 Move from `modular.php` to new `filtered.php`.
 * @param  string $p_s_output CSS.
 * @return void
 */
function anrghg_protected_echo( $p_s_output ) {
	echo (
		// phpcs:ignore
		wp_strip_all_tags( $p_s_output )
	);
}

/**
 * Removes HTML tags and returns CSS or a subset of JS.
 *
 * @since 1.16.4
 * Calls `wp_strip_all_tags()`.
 * This is considered sufficiently protecting.
 * Approved by WordPress Plugin Review Team on June 17, 2022.
 * NOTE: Manually whitelisted for PHPCS (not knowing so far).
 * WARNING: This works for JS only on the condition
 * that less-than signs do not occur in the script.
 * All less-than signs and following characters are
 * deleted. (Obviously, `<` is not used in CSS.)
 * @see * Style sheets.
 *
 * @param  string $p_s_output CSS.
 * @return string
 */
function anrghg_protected_return( $p_s_output ) {
	// phpcs:ignore
	$p_s_output = wp_strip_all_tags( $p_s_output );
	return $p_s_output;
}

/**
 * Extends global KSES attributes.
 *
 * @since 0.81.7
 * The global whitelist is lacking most of the aria-* attributes,
 * and the tabindex attribute. So these should be added for a11y.
 * @see wp-includes/kses.php:2520 `$global_attributes`.
 * This only whitelists 8 ARIA attributes, namely aria-controls,
 * aria-current, aria-describedby, aria-details, aria-expanded,
 * aria-label, aria-labelledby, aria-hidden, out of 49.
 * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes
 * @since 1.16.0 Whitelist also all data-* attributes.
 * @since 1.16.0 Move from `modular.php` to new `filtered.php`.
 * @since 1.16.1 data-* are already whitelisted in $global_attributes.
 * @since 1.16.1 The aria-* wildcard does not work. A full list does.
 * @param  array $p_a_element An element in a KSES whitelist.
 * @return array That element with all ARIA attributes plus tabindex.
 */
function anrghg_extend_kses_whitelist_atts( $p_a_element ) {
	return array_merge(
		$p_a_element,
		array(
			'aria-*'                => true,
			'aria-activedescendant' => true,
			'aria-atomic'           => true,
			'aria-autocomplete'     => true,
			'aria-busy'             => true,
			'aria-checked'          => true,
			'aria-colcount'         => true,
			'aria-colindex'         => true,
			'aria-colspan'          => true,
			'aria-controls'         => true,
			'aria-current'          => true,
			'aria-describedby'      => true,
			'aria-description'      => true,
			'aria-details'          => true,
			'aria-disabled'         => true,
			'aria-dropeffect'       => true,
			'aria-errormessage'     => true,
			'aria-expanded'         => true,
			'aria-flowto'           => true,
			'aria-grabbed'          => true,
			'aria-haspopup'         => true,
			'aria-hidden'           => true,
			'aria-invalid'          => true,
			'aria-keyshortcuts'     => true,
			'aria-label'            => true,
			'aria-labelledby'       => true,
			'aria-level'            => true,
			'aria-live'             => true,
			'aria-modal'            => true,
			'aria-multiline'        => true,
			'aria-multiselectable'  => true,
			'aria-orientation'      => true,
			'aria-owns'             => true,
			'aria-placeholder'      => true,
			'aria-posinset'         => true,
			'aria-pressed'          => true,
			'aria-readonly'         => true,
			'aria-relevant'         => true,
			'aria-required'         => true,
			'aria-roledescription'  => true,
			'aria-rowcount'         => true,
			'aria-rowindex'         => true,
			'aria-rowspan'          => true,
			'aria-selected'         => true,
			'aria-setsize'          => true,
			'aria-sort'             => true,
			'aria-valuemax'         => true,
			'aria-valuemin'         => true,
			'aria-valuenow'         => true,
			'aria-valuetext'        => true,
			'tabindex'              => true,
		)
	);
}

/**
 * Generates an extended public whitelist for `wp_kses()`.
 *
 * @since 0.81.5
 * @since 0.81.6 Fix bug in whitelist extension.
 * @since 0.81.6 Tailor whitelists to the instance for more efficiency.
 * Global KSES whitelists are a non-starter, because they defeat the
 * KSES design goals, e.g. the button[onclick] should not be allowed
 * on public pages. But the input[checked class id type] is required
 * on public pages to support display toggle checkboxes.
 * The class and id attributes are global so these could be skipped.
 *
 * The global whitelist is lacking most of the aria-* attributes and
 * the tabindex attribute.
 * @see anrghg_extend_kses_whitelist_atts()
 *
 * User input is hopefully supported by $allowedposttags.
 * @see wp-includes/kses.php
 * NOTE: Usage discouraged when output contains CSS (or JS), because
 * `wp_kses()` MTML-escapes not only `<`, but also `>`.
 * @see anrghg_protected_echo()
 *
 * global $allowedtags provided along with $allowedposttags is a very
 * limited subset of the latter, so merging it in would be pointless.
 * @global $allowedposttags             WordPress KSES whitelist.
 * @global $g_m_anrghg_public_whitelist Extended KSES whitelist.
 * @return array Completed extended public KSES whitelist.
 */
function anrghg_get_public_whitelist() {
	global $allowedposttags, $g_m_anrghg_public_whitelist;
	if ( false === $g_m_anrghg_public_whitelist ) {
		$g_m_anrghg_public_whitelist = $allowedposttags;
		$l_a_whitelist               = array(
			'input' => array(
				'checked' => true,
				'class'   => true,
				'id'      => true,
				'type'    => true,
			),
			'style' => array(),
		);
		foreach ( $l_a_whitelist as $l_s_name => $l_m_val ) {
			if ( array_key_exists( $l_s_name, $g_m_anrghg_public_whitelist ) ) {
				$g_m_anrghg_public_whitelist[ $l_s_name ] = array_merge( $g_m_anrghg_public_whitelist[ $l_s_name ], $l_a_whitelist[ $l_s_name ] );
			} else {
				$g_m_anrghg_public_whitelist[ $l_s_name ] = $l_a_whitelist[ $l_s_name ];
			}
		}
		$g_m_anrghg_public_whitelist = array_map( 'anrghg_extend_kses_whitelist_atts', $g_m_anrghg_public_whitelist );
	}
	return $g_m_anrghg_public_whitelist;
}

/**
 * Escapes and echoes also outside Settings and Post Meta box.
 *
 * @since 0.81.5
 * @since 1.0.4 Document that `wp_kses()` calls `wp_kses_split()`,
 * that calls `_wp_kses_split_callback()`, that calls `wp_kses_split2()`.
 * @link https://docs.classicpress.net/reference/functions/_wp_kses_split_callback/
 * And the first thing `wp_kses_split2()` does is to “fix” the data by calling
 * `wp_kses_stripslashes()`, that strips backslashes from in front of double quotes.
 * @link https://docs.classicpress.net/reference/functions/wp_kses_split2/
 * @link https://developer.wordpress.org/reference/functions/wp_kses_stripslashes/
 * @param  string $p_s_output HTML.
 * @return void
 */
function anrghg_kses_echo( $p_s_output ) {
	echo wp_kses(
		$p_s_output,
		anrghg_get_public_whitelist()
	);
}

/**
 * Escapes and returns also outside Settings and Post Meta box.
 *
 * @since 1.1.2
 * @param  string $p_s_output HTML.
 * @return string $l_s_output HTML.
 */
function anrghg_kses( $p_s_output ) {
	$l_s_output = wp_kses(
		$p_s_output,
		anrghg_get_public_whitelist()
	);
	return $l_s_output;
}
