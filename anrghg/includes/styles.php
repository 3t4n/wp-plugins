<?php
/**
 * Internal CSS for public pages, part 1.
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
 * Adds internal CSS.
 *
 * @since 0.9.0
 * To work around the downsides of external style sheets, all CSS is internal,
 * as most of it is configurable. For the code to be both streamlined and WPCS
 * compliant it is minified at runtime.
 * @see * Style sheets.
 * @since 0.22.0 Raise priority level from PHP_INT_MAX to 100 so that settings
 * are overridden by Theme Additional CSS, output at priority level 101.
 * Priority matters since Theme Additional CSS is expected to override plugins.
 * @see wp-includes/default-filters.php:299
 * @since 1.0.1 Split CSS into 2 files for online editability.
 * @see ./stylesplit.php
 *
 * @since 1.16.4 Cancel splitting since the technical limitation does not apply
 * any longer, so this CSS is reunited in a single place for maintainability.
 * @see ./stylesplit.php
 *
 * For this to work properly, internal CSS is added to an enqueued stylesheet,
 * so the AMP plugin can easily fetch and process it.
 * @courtesy @westonruter
 * @link https://make.wordpress.org/core/2023/10/17/replacing-hard-coded-style-tags-with-wp_add_inline_style/
 *
 * Moving the few immutable CSS rules into a stylesheet would be pointless, and
 * keeping all of the CSS in a single place is preferable for maintainability.
 * To get the required style sheet handle, a placeholder stylesheet is enqueued
 * as if it was a real style sheet, but without any rules in it.
 * @link https://developer.wordpress.org/reference/functions/wp_add_inline_style/
 * @see ../css/external.css
 *
 * Internal CSS needs to be added with high priority so as to enable Custom CSS
 * to override it, in order to meet user expectations about the power of Custom
 * CSS. However, having this priority configurable in the Settings is desirable
 * for adaptability.
 *
 * The stylesheet handle ends in “internal” because it is about adding internal
 * CSS. However, this stylesheet, despite being empty, is named “external.css”.
 */
add_filter(
	'wp_enqueue_scripts',
	function() {
		$l_s_handle = 'a.n.r.ghg-publishing-toolkit-' . C_S_ANRGHG_VER . '-internal';
		wp_enqueue_style(
			$l_s_handle,
			plugin_dir_url( __FILE__ ) . '../css/external.css',
			array(),
			C_S_ANRGHG_VER
		);
		wp_add_inline_style(
			$l_s_handle,
			anrghg_internal_css()
		);
	},
	anrghg_config_priority( 'anrghg_css_priority_select', 'anrghg_css_priority_input', false )
);

/**
 * Returns the internal CSS for public pages.
 *
 * @since 0.9.0
 * @since 0.22.0 Opening style tag compatible with HTML < 5.
 * @see wp-includes/theme.php:1822
 * @since 0.22.0 Streamline CSS selectors to reduce their footprint on the CSS
 * budget for AMP compatibility. Examples:
 * anrghg_tc_lst    = anrghg-contents-list
 * anrghg_tt_mo     = anrghg-tooltip-more
 * @since 0.24.9 Revert class name abbreviations as almost insignificant for
 * AMP CSS budget control while screwing up configuration (and maintenance).
 * @link https://plugins.trac.wordpress.org/browser/anrghg/tags/0.22.0/anrghg.php?rev=2557253#L1485
 * @since 0.81.4 Revert to 0.81.0, fix broken plugin, remove KSES.
 * @since 0.81.5 Use sufficiently protecting HTML tag removal.
 * @since 1.6.10 Rename function from `anrghg_internal_styles()`.
 * @since 1.14.1 Add ID to internal CSS element like WordPress does but `internal`, not `inline`.
 * @link https://github.com/WordPress/gutenberg/issues/54232
 * @since 1.16.4 Merge into a single function, returning, without `style` tags.
 * @return string
 */
function anrghg_internal_css() {
	global $g_a_anrghg_config;
	$l_i_post_id = get_the_ID();
	if ( did_action( 'wp' ) && function_exists( 'amp_is_request' ) ) {
		$l_b_amp_active = amp_is_request();
	} else {
		$l_b_amp_active = false;
	}
	$l_s_css = '';

	/**
	 * Rule to control CSS smooth scrolling.
	 *
	 * @since 0.9.0
	 * @since 1.6.6
	 * @reporter** @paulgpetty
	 * @link https://wordpress.org/support/topic/functionally-great/#post-13607795
	 * @reporter** @bogosavljev
	 * @link https://wordpress.org/support/topic/compatibility-issue-with-wpforms/#post-14214720
	 * Native CSS-based smooth scrolling only works in recent browsers.
	 */
	$l_s_scroll_behavior = 'auto';
	if ( anrghg_apply_config( 'anrghg_css_smooth_scrolling' ) ) {
		$l_s_scroll_behavior = 'smooth';
	}
	$l_s_css .= wp_kses( '/* Scrolling */', array() );
	$l_s_css .= anrghg_protected_return(
		anrghg_minilight(
			'css',
			"

				html {
					scroll-behavior: $l_s_scroll_behavior !important;
				}

			"
		)
	);

	/**
	 * Rules for scroll offset to fragment identifiers on public pages.
	 *
	 * @since 0.9.0 Use nested base-anchor spans with position offset.
	 * Reportedly, the scroll-padding property could not be used yet.
	 * Only its shorthand notation was supported only by modern browsers.
	 * @link https://css-tricks.com/almanac/properties/s/scroll-padding/
	 * @since 0.24.11 Need to have scroll offset in px, not viewport
	 * height (15vh), and to have its scalar be a distinct variable.
	 * @since 0.50.0 Use the CSS `scroll-margin-top` property instead.
	 * @since 1.6.6 Make universal for consistent user experience.
	 * A bug occurs on AMP pages with scrolling on clicking a link.
	 * Turning JavaScript off or opening link in new tab fixes it.
	 * @link https://github.com/ampproject/amphtml/issues/38423
	 * Duplicate of issue #34378 reported on 2021-05-14.
	 * @link https://github.com/ampproject/amphtml/issues/34378
	 * Fixed by @alanorozco for `scroll-padding-*` in #35366.
	 * @link https://github.com/ampproject/amphtml/pull/35366
	 * Using `scroll-padding-top` instead of `scroll-margin-top` solves the problem.
	 * Per MDN, `scroll-padding-top` is more versatile than `scroll-margin-top`
	 * as it includes `auto` and percentage.
	 * @link https://developer.mozilla.org/en-US/docs/Web/CSS/scroll-padding-top
	 * @link https://developer.mozilla.org/en-US/docs/Web/CSS/scroll-margin-top
	 * With AMP restricting support to `scroll-padding-*`, `scroll-margin-*` is
	 * de facto deprecated.
	 * @link https://github.com/ampproject/amphtml/issues/34378#issuecomment-1234672593
	 * `scroll-margin-*` was deliberately skipped when support for
	 * `scroll-padding-*` was implemented.
	 * @link https://github.com/ampproject/amphtml/pull/35366/files
	 * Despite support for both was requested.
	 * scroll-padding and scroll-margin won't work in AMP page #34378
	 * @link https://github.com/ampproject/amphtml/issues/34378
	 * This issue is *the only existing documentation*
	 * about de facto deprecation of `scroll-margin-*`.
	 * @since 1.10.2 Prevent WordPress from hiding the scroll padding when
	 * it sets `overflow-x: auto;` for all figures that are a parent of a
	 * table. So in WordPress, tables cannot have scroll padding, so that
	 * the table header row is prone to hide behind a fixed page header.
	 * Setting just `overflow-y: visible;` does not work. That is why the
	 * `.wp-block-table {overflow-x: auto;}` rule needs to be overridden.
	 */
	$l_s_scroll_offset = anrghg_apply_config( 'anrghg_css_scroll_offset' ) . 'px';
	$l_s_css          .= anrghg_protected_return(
		anrghg_minilight(
			'css',
			"

				.anrghg-offset-anchor,
				* {
					scroll-padding: $l_s_scroll_offset 0 0 !important;
					scroll-padding-top: $l_s_scroll_offset !important;
					overflow: visible !important;
				}

			"
		)
	);

	/**
	 * Rules for scriptless display toggle.
	 *
	 * @since 0.13.0
	 * Invisible checkbox as adjacent sibling replaces JavaScript class toggle
	 * and AMP classToggle action on tap event, and is actioned by clicking an
	 * unlimited number of labels.
	 * @usedby anrghg_fragment_ids()
	 * @usedby anrghg_process_complements()
	 */
	$l_s_css .= wp_kses( "\r\n/* Display toggle */", array() );
	$l_s_css .= anrghg_protected_return(
		anrghg_minilight(
			'css',
			'

				.anrghg-tooltip-display-toggle,
				.anrghg-display-toggle {
					opacity: 0;
					position: absolute;
					left: -999px;
				}

				.anrghg-pointer {
					cursor: pointer;
				}

			'
		)
	);

	/**
	 * Rules for Thank You messages.
	 *
	 * @since 0.9.0
	 * @since 0.54.0 Never deactivate these style rules.
	 * Based on Justin Busa’s example feature.
	 * @link https://www.wpbeaverbuilder.com/creating-wordpress-plugin-easier-think/
	 * @since 1.6.15 Remove direct child combinator, for AMP compatibility.
	 * @see ./stylesplit.php * Rules for anchor tooltips.
	 */
	$l_s_home_display = 'none';
	if ( anrghg_apply_config( 'anrghg_thank_you_display_on_home' ) ) {
		$l_s_home_display = 'block';
	}
	$l_s_align = '-1'; // -1 start, 0 center, 1 end.
	switch ( $l_s_align ) {
		case '-1':
			$l_s_align_start = '0';
			$l_s_align_end   = 'auto';
			break;
		case '1':
			$l_s_align_start = 'auto';
			$l_s_align_end   = '0';
			break;
		case '0':
		default:
			$l_s_align_start = 'auto';
			$l_s_align_end   = 'auto';
	}
	$l_s_color          = anrghg_apply_config( 'anrghg_thank_you_foreground_color' );
	$l_s_background     = anrghg_apply_config( 'anrghg_thank_you_background_color' );
	$l_s_font_size_unit = (int) anrghg_apply_config( 'anrghg_thank_you_font_size_option' );
	if ( 0 > $l_s_font_size_unit ) {
		$l_s_font_size_unit = 0;
	}
	if ( 3 < $l_s_font_size_unit ) {
		$l_s_font_size_unit = 3;
	}
	switch ( $l_s_font_size_unit ) {
		case 0:
			$l_s_font_size = 'inherit';
			break;
		case 1:
			$l_s_font_size = anrghg_apply_config( 'anrghg_thank_you_font_size_px' ) . 'px';
			break;
		case 2:
			$l_s_font_size = anrghg_apply_config( 'anrghg_thank_you_font_size_em' ) . 'em';
			break;
		case 3:
			$l_s_font_size = anrghg_apply_config( 'anrghg_thank_you_font_size_rem' ) . 'rem';
			break;
	}
	$l_s_font_style      = 'normal'; // normal italic oblique.
	$l_s_font_weight     = 'normal'; // normal bold bolder lighter 1..9×10².
	$l_s_text_align      = 'start'; // start end left center right justify.
	$l_s_max_width       = 400 . 'px';
	$l_s_padding_top     = anrghg_apply_config( 'anrghg_thank_you_padding_top' ) . 'px';
	$l_s_padding_start   = anrghg_apply_config( 'anrghg_thank_you_padding_start' ) . 'px';
	$l_s_padding_end     = anrghg_apply_config( 'anrghg_thank_you_padding_end' ) . 'px';
	$l_s_padding_bottom  = anrghg_apply_config( 'anrghg_thank_you_padding_bottom' ) . 'px';
	$l_s_margin_top      = anrghg_apply_config( 'anrghg_thank_you_margin_top' ) . 'px';
	$l_s_margin_start    = anrghg_apply_config( 'anrghg_thank_you_margin_start' ) . 'px';
	$l_s_margin_end      = anrghg_apply_config( 'anrghg_thank_you_margin_end' ) . 'px';
	$l_s_margin_bottom   = anrghg_apply_config( 'anrghg_thank_you_margin_bottom' ) . 'px';
	$l_s_border_width    = anrghg_apply_config( 'anrghg_thank_you_border_width' ) . 'px';
	$l_s_border_style    = anrghg_apply_config( 'anrghg_thank_you_border_style' );
	$l_s_border_color    = anrghg_apply_config( 'anrghg_thank_you_border_color' );
	$l_s_radius_top      = anrghg_apply_config( 'anrghg_thank_you_border_radius' ) . 'px';
	$l_s_radius_right    = 2 . 'px'; // px,%.
	$l_s_radius_right    = '';
	$l_s_radius_bottom   = 2 . 'px'; // px,%.
	$l_s_radius_bottom   = '';
	$l_s_radius_left     = 2 . 'px'; // px,%.
	$l_s_radius_left     = '';
	$l_s_shadow_x_offset = anrghg_apply_config( 'anrghg_thank_you_shadow_x_offset' ) . 'px';
	$l_s_shadow_y_offset = anrghg_apply_config( 'anrghg_thank_you_shadow_y_offset' ) . 'px';
	$l_s_shadow_blur     = anrghg_apply_config( 'anrghg_thank_you_shadow_blur' ) . 'px';
	$l_s_shadow_spread   = anrghg_apply_config( 'anrghg_thank_you_shadow_spread' ) . 'px';
	$l_s_shadow_color    = anrghg_apply_config( 'anrghg_thank_you_shadow_color' );

	$l_s_css .= wp_kses( "\r\n/* Messages */", array() );
	$l_s_css .= anrghg_protected_return(
		anrghg_minilight(
			'css',
			"

				body.home div.anrghg-thank-you {
					display: $l_s_home_display;
				}

				div.anrghg-thank-you {
					display: block;
					width: fit-content;
					margin-inline-end: $l_s_align_end;
					margin-inline-start: $l_s_align_start;
				}

				div.anrghg-thank-you.anrghg-left {
					margin-left: 0;
					margin-right: auto;
				}

				div.anrghg-thank-you.anrghg-center {
					margin-left: auto;
					margin-right: auto;
				}

				div.anrghg-thank-you.anrghg-right {
					margin-left: auto;
					margin-right: 0;
				}

				div.anrghg-thank-you div.anrghg-inner-thank-you {
					color: $l_s_color;
					background-color: $l_s_background;
					font-size: $l_s_font_size;
					font-style: $l_s_font_style;
					font-weight: $l_s_font_weight;
					text-align: $l_s_text_align;
					max-width: $l_s_max_width;
					padding: $l_s_padding_top $l_s_padding_end $l_s_padding_bottom $l_s_padding_start;
					margin: $l_s_margin_top $l_s_margin_end $l_s_margin_bottom $l_s_margin_start;
					border: $l_s_border_width $l_s_border_style $l_s_border_color;
					border-radius: $l_s_radius_top $l_s_radius_right $l_s_radius_bottom $l_s_radius_left;
					box-shadow: $l_s_shadow_x_offset $l_s_shadow_y_offset $l_s_shadow_blur $l_s_shadow_spread $l_s_shadow_color;
				}

			"
		)
	);

	/**
	 * Rules for Last modified and published dates.
	 *
	 * @since 0.9.0
	 * @since 0.22.0 Configure styles for posts and pages separately.
	 * @since 0.77.0 Implement settings, streamline CSS generation.
	 * The post/page top/bottom CSS cannot depend on activation & scope,
	 * because Published-first information is added depending on whether
	 * the then-prefill matches the now-field value in Post Meta config.
	 */
	if ( anrghg_apply_config( 'anrghg_dates_active' ) ) {
		$l_s_link_decoration  = 'none';
		$l_s_link_border_btm  = 'none';
		$l_s_hover_decoration = 'underline';
		$l_s_hover_border_btm = 'none';

		$l_s_css .= wp_kses( "\r\n/* Dates */", array() );
		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-date-published-first a,
					.anrghg-date-published a,
					.anrghg-date-edited a,
					.anrghg-date-published-first a:any-link,
					.anrghg-date-published a:any-link,
					.anrghg-date-edited a:any-link,
					.anrghg-date-published-first a:-webkit-any-link,
					.anrghg-date-published a:-webkit-any-link,
					.anrghg-date-edited a:-webkit-any-link {
						text-decoration: $l_s_link_decoration;
						border-bottom: $l_s_link_border_btm;
					}

					.anrghg-date-published-first a:focus,
					.anrghg-date-published a:focus,
					.anrghg-date-edited a:focus,
					.anrghg-date-published-first a:hover,
					.anrghg-date-published a:hover,
					.anrghg-date-edited a:hover {
						text-decoration: $l_s_hover_decoration;
						border-bottom: $l_s_hover_border_btm;
					}

				"
			)
		);

		$l_s_text_align     = anrghg_apply_config( 'anrghg_dates_post_top_text_align' );
		$l_s_margin_top     = anrghg_apply_config( 'anrghg_dates_post_top_margin_above' ) . 'px';
		$l_s_margin_bottom  = anrghg_apply_config( 'anrghg_dates_post_top_margin_below' ) . 'px';
		$l_s_font_size_unit = (int) anrghg_apply_config( 'anrghg_dates_post_top_font_size_option' );
		if ( 0 > $l_s_font_size_unit ) {
			$l_s_font_size_unit = 0;
		}
		if ( 3 < $l_s_font_size_unit ) {
			$l_s_font_size_unit = 3;
		}
		switch ( $l_s_font_size_unit ) {
			case 0:
				$l_s_font_size = 'inherit';
				break;
			case 1:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_post_top_font_size_px' ) . 'px';
				break;
			case 2:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_post_top_font_size_em' ) . 'em';
				break;
			case 3:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_post_top_font_size_rem' ) . 'rem';
				break;
		}
		$l_s_color = anrghg_apply_config( 'anrghg_dates_post_top_color' );

		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-dates-post-top {
						text-align: $l_s_text_align;
						margin: $l_s_margin_top 0 $l_s_margin_bottom;
						font-size: $l_s_font_size;
						color: $l_s_color;
					}

				"
			)
		);

		$l_s_text_align     = anrghg_apply_config( 'anrghg_dates_page_top_text_align' );
		$l_s_margin_top     = anrghg_apply_config( 'anrghg_dates_page_top_margin_above' ) . 'px';
		$l_s_margin_bottom  = anrghg_apply_config( 'anrghg_dates_page_top_margin_below' ) . 'px';
		$l_s_font_size_unit = (int) anrghg_apply_config( 'anrghg_dates_page_top_font_size_option' );
		if ( 0 > $l_s_font_size_unit ) {
			$l_s_font_size_unit = 0;
		}
		if ( 3 < $l_s_font_size_unit ) {
			$l_s_font_size_unit = 3;
		}
		switch ( $l_s_font_size_unit ) {
			case 0:
				$l_s_font_size = 'inherit';
				break;
			case 1:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_page_top_font_size_px' ) . 'px';
				break;
			case 2:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_page_top_font_size_em' ) . 'em';
				break;
			case 3:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_page_top_font_size_rem' ) . 'rem';
				break;
		}
		$l_s_color = anrghg_apply_config( 'anrghg_dates_page_top_color' );

		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-dates-page-top {
						text-align: $l_s_text_align;
						margin: $l_s_margin_top 0 $l_s_margin_bottom;
						font-size: $l_s_font_size;
						color: $l_s_color;
					}

				"
			)
		);

		$l_s_text_align     = anrghg_apply_config( 'anrghg_dates_post_end_text_align' );
		$l_s_margin_top     = anrghg_apply_config( 'anrghg_dates_post_end_margin_above' ) . 'px';
		$l_s_margin_bottom  = anrghg_apply_config( 'anrghg_dates_post_end_margin_below' ) . 'px';
		$l_s_font_size_unit = (int) anrghg_apply_config( 'anrghg_dates_post_end_font_size_option' );
		if ( 0 > $l_s_font_size_unit ) {
			$l_s_font_size_unit = 0;
		}
		if ( 3 < $l_s_font_size_unit ) {
			$l_s_font_size_unit = 3;
		}
		switch ( $l_s_font_size_unit ) {
			case 0:
				$l_s_font_size = 'inherit';
				break;
			case 1:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_post_end_font_size_px' ) . 'px';
				break;
			case 2:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_post_end_font_size_em' ) . 'em';
				break;
			case 3:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_post_end_font_size_rem' ) . 'rem';
				break;
		}
		$l_s_color = anrghg_apply_config( 'anrghg_dates_post_end_color' );

		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-dates-post-end {
						text-align: $l_s_text_align;
						margin: $l_s_margin_top 0 $l_s_margin_bottom;
						font-size: $l_s_font_size;
						color: $l_s_color;
					}

				"
			)
		);

		$l_s_text_align     = anrghg_apply_config( 'anrghg_dates_page_end_text_align' );
		$l_s_margin_top     = anrghg_apply_config( 'anrghg_dates_page_end_margin_above' ) . 'px';
		$l_s_margin_bottom  = anrghg_apply_config( 'anrghg_dates_page_end_margin_below' ) . 'px';
		$l_s_font_size_unit = (int) anrghg_apply_config( 'anrghg_dates_page_end_font_size_option' );
		if ( 0 > $l_s_font_size_unit ) {
			$l_s_font_size_unit = 0;
		}
		if ( 3 < $l_s_font_size_unit ) {
			$l_s_font_size_unit = 3;
		}
		switch ( $l_s_font_size_unit ) {
			case 0:
				$l_s_font_size = 'inherit';
				break;
			case 1:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_page_end_font_size_px' ) . 'px';
				break;
			case 2:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_page_end_font_size_em' ) . 'em';
				break;
			case 3:
				$l_s_font_size = anrghg_apply_config( 'anrghg_dates_page_end_font_size_rem' ) . 'rem';
				break;
		}
		$l_s_color = anrghg_apply_config( 'anrghg_dates_page_end_color' );

		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-dates-page-end {
						text-align: $l_s_text_align;
						margin: $l_s_margin_top 0 $l_s_margin_bottom;
						font-size: $l_s_font_size;
						color: $l_s_color;
					}

				"
			)
		);
	}

	/**
	 * Rules for anchor elements in paragraphs.
	 *
	 * @since 0.9.0
	 */
	if ( anrghg_apply_config( 'anrghg_paragraph_links_active' ) ) {
		$l_s_fragment_link_character = anrghg_apply_config( 'anrghg_paragraph_link_character_input' );
		if ( empty( $l_s_fragment_link_character ) ) {
			$l_s_fragment_link_character = $g_a_anrghg_config['anrghg_paragraph_link_character_select'];
		}
		$l_s_fragment_link_position       = -2.7 . 'em';
		$l_s_fragment_link_padding_before = 1.2 . 'em';
		$l_s_fragment_link_padding_after  = .8 . 'em';
		$l_s_fade_in_delay                = 0 . 'ms';
		$l_s_fade_in_duration             = 200 . 'ms';
		$l_s_fade_in_function             = 'ease-in-out'; // linear,ease-out,ease,ease-in-out,ease-in.
		$l_s_fade_out_delay               = 500 . 'ms';
		$l_s_fade_out_duration            = 1000 . 'ms';
		$l_s_fade_out_function            = 'ease-in-out'; // linear,ease-out,ease,ease-in-out,ease-in.
		$l_s_highlight_color              = 'yellow';

		$l_s_css .= wp_kses( "\r\n/* Paragraph links */", array() );
		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					p,
					li,
					pre {
						position: relative;
					}

					.anrghg-fragment-link::before {
						content: '$l_s_fragment_link_character';
						position: absolute;
						left: $l_s_fragment_link_position;
						padding: 0 $l_s_fragment_link_padding_after 0 $l_s_fragment_link_padding_before;
						opacity: 0;
						transition: opacity $l_s_fade_out_duration $l_s_fade_out_function $l_s_fade_out_delay;
					}

					html[dir=rtl] .anrghg-fragment-link::before {
						right: $l_s_fragment_link_position;
						padding: 0 $l_s_fragment_link_padding_before 0 $l_s_fragment_link_padding_after;
					}

					p:hover .anrghg-fragment-link::before,
					li:hover .anrghg-fragment-link::before,
					pre:hover .anrghg-fragment-link::before {
						opacity: 1;
						transition: opacity $l_s_fade_in_duration $l_s_fade_in_function $l_s_fade_in_delay;
					}

					.anrghg-offset-anchor:target + p .anrghg-fragment-link::before,
					.anrghg-offset-anchor:target + li .anrghg-fragment-link::before {
						background-color: $l_s_highlight_color;
						opacity: 1;
					}

				"
			)
		);
	}

	/**
	 * Rules for anchor elements in headings with transitioning multiline underline.
	 *
	 * @since 0.9.0
	 * @contributor** user2046
	 * @link https://stackoverflow.com/a/58895717
	 * @link https://stackoverflow.com/questions/30352431/css-transition-not-working-with-underline
	 */
	if ( anrghg_apply_config( 'anrghg_heading_links_active' ) ) {
		$l_s_heading_link_character       = '➔'; // '🔗';
		$l_s_heading_link_padding         = .4 . 'em';
		$l_s_text_color_link              = 'inherit';
		$l_s_text_color_hover             = 'inherit';
		$l_s_text_color_active            = '#008000';
		$l_s_text_decoration_color_link   = 'transparent';
		$l_s_text_decoration_color_hover  = 'inherit';
		$l_s_text_decoration_color_active = 'transparent';
		$l_s_text_decoration_style_link   = 'solid'; // solid,double,dotted,wavy.
		$l_s_text_decoration_style_hover  = 'solid'; // solid,double,dotted,wavy.
		$l_s_text_decoration_style_active = 'solid'; // solid,double,dotted,wavy.
		$l_s_transition_delay_link        = 3000 . 'ms';
		$l_s_transition_delay_hover       = 0 . 'ms';
		$l_s_transition_delay_active      = 200 . 'ms';
		$l_s_transition_duration_link     = 4000 . 'ms';
		$l_s_transition_duration_hover    = 400 . 'ms';
		$l_s_transition_duration_active   = 300 . 'ms';
		$l_s_transition_function_link     = 'ease-out';
		$l_s_transition_function_hover    = 'ease-in';
		$l_s_transition_function_active   = 'ease-in-out';

		$l_s_css .= wp_kses( "\r\n/* Heading links */", array() );
		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-heading-link:not(:hover) {
						border-bottom: none !important;
						color: $l_s_text_color_link;
						text-decoration-line: underline;
						text-decoration-color: $l_s_text_decoration_color_link;
						text-decoration-style: $l_s_text_decoration_style_link;
						transition: $l_s_transition_duration_link $l_s_transition_function_link $l_s_transition_delay_link;
					}

					.anrghg-heading-link:hover {
						color: $l_s_text_color_hover;
						text-decoration-line: underline;
						text-decoration-color: $l_s_text_decoration_color_hover;
						text-decoration-style: $l_s_text_decoration_style_hover;
						transition: $l_s_transition_duration_hover $l_s_transition_function_hover $l_s_transition_delay_hover;
					}

					.anrghg-heading-link:active {
						color: $l_s_text_color_active;
						text-decoration-line: underline;
						text-decoration-color: $l_s_text_decoration_color_active;
						text-decoration-style: $l_s_text_decoration_style_active;
						transition: $l_s_transition_duration_active $l_s_transition_function_active $l_s_transition_delay_active;
					}

					a.anrghg-heading-link.anrghg-separate,
					a.anrghg-heading-link.anrghg-separate:any-link,
					a.anrghg-heading-link.anrghg-separate:-webkit-any-link {
						text-decoration: none;
						border-bottom: none;
					}

					.anrghg-heading-link.anrghg-separate:hover::before {
						content: '$l_s_heading_link_character';
					}

					.anrghg-heading-link.anrghg-separate.anrghg-before {
						padding-inline-start: 1em;
						margin-inline-start: -1em;
					}

					.anrghg-heading-link.anrghg-separate.anrghg-after {
						padding-inline-end: 1em;
					}

					.anrghg-heading-link.anrghg-separate.anrghg-before:hover::before {
						padding-inline-end: $l_s_heading_link_padding;
						margin-inline-start: -1em;
					}

					.anrghg-heading-link.anrghg-separate.anrghg-after:hover::before {
						padding-inline-start: $l_s_heading_link_padding;
					}

				"
			)
		);
	}

	/**
	 * Rules for table of contents and heading numbers.
	 *
	 * @since 0.9.0
	 * Mobile breakpoint is 480, or 768 is often used.
	 * @link https://www.geeksforgeeks.org/how-to-target-desktop-tablet-and-mobile-using-media-query/
	 *
	 * @since 0.24.11 Debug keyboard actionability for a11y.
	 * Animate expand/collapse with CSS in sync with twistie rotation.
	 * @since 0.24.14 Debug line height in collapsible table for almost all themes.
	 * Debug line height in collapsible table for themes where the general fix does not work.
	 * Set a (soon optional) collapsed width of the table for use with most themes.
	 * @since 0.24.15 Debug collapsed height of the table of contents.
	 * @since 0.29.1 Apply the 0.29.0 writing direction fix to twistie.
	 * @link https://github.com/mdn/content/pull/8691
	 */
	if ( anrghg_apply_config( 'anrghg_table_of_contents_active' ) ) {
		$l_s_contents_align = '-1'; // -1 start, 0 center, 1 end.
		switch ( $l_s_contents_align ) {
			case '-1':
				$l_s_contents_margin_start = '0';
				$l_s_contents_margin_end   = 'auto';
				break;
			case '1':
				$l_s_contents_margin_start = 'auto';
				$l_s_contents_margin_end   = '0';
				break;
			case '0':
			default:
				$l_s_contents_margin_start = 'auto';
				$l_s_contents_margin_end   = 'auto';
		}
		$l_s_list_wrapper_margin_top    = anrghg_apply_config( 'anrghg_list_wrapper_margin_top' ) . 'px';
		$l_s_list_wrapper_margin_bottom = anrghg_apply_config( 'anrghg_list_wrapper_margin_bottom' ) . 'px';
		$l_s_contents_margin_top        = 12 . 'px';
		$l_s_contents_margin_bottom     = 9 . 'px';
		$l_s_contents_padding_y         = 14 . 'px';
		$l_s_contents_padding_start     = 45 . 'px';
		$l_s_contents_padding_end       = 7 . 'px';
		$l_s_contents_border_width      = 1 . 'px'; // 0 for borderless.
		$l_s_contents_border_style      = 'solid';
		$l_s_contents_border_color      = '#ABABAB';
		$l_s_collapsed_border           = '0'; // 0,fix,normal.
		$l_s_contents_collapsed_width   = '';
		if ( $l_s_collapsed_border ) {
			$l_s_contents_border_collapsed = '';
			if ( 'fix' === $l_s_collapsed_border ) {
				$l_s_contents_collapsed_width = 'width: ' . 340 . 'px;';
			}
		} else {
			$l_s_contents_border_collapsed = 'border-color: ' . $l_s_contents_border_color . '00;';
		}
		$l_s_label_twistie_char         = '❰'; // ⟨, ❰, ❮, ‹, «.
		$l_s_twistie_color_collapsed    = 'inherit'; // inherit (link color), or #6A6A6A.
		$l_s_twistie_color_expanded     = '#CBCBCB'; // inherit (link color), or #CBCBCB.
		$l_s_label_margin_bottom        = 10 . 'px';
		$l_s_contents_numbering_pad     = 14 . 'px';
		$l_b_top_level_font_weight      = (bool) '1'; // 1 bold, 0 normal.
		$l_s_top_level_font_weight      = $l_b_top_level_font_weight ? 'bold' : 'normal';
		$l_b_stepped                    = (bool) '1';
		$l_i_pad_step                   = $l_b_stepped ? 22 : 0; // 12,22.
		$l_s_contents_h3_pad            = $l_i_pad_step . 'px';
		$l_s_contents_h4_pad            = ( $l_i_pad_step * 2 ) . 'px';
		$l_s_contents_h5_pad            = ( $l_i_pad_step * 3 ) . 'px';
		$l_s_contents_h6_pad            = ( $l_i_pad_step * 4 ) . 'px';
		$l_s_breakpoint_width           = anrghg_apply_config( 'anrghg_general_mobile_breakpoint' ) . 'px'; // 480,768.
		$l_i_pad_step                   = $l_b_stepped ? 7 : 0; // 4,7.
		$l_s_contents_h3_pad_mobile     = $l_i_pad_step . 'px';
		$l_s_contents_h4_pad_mobile     = ( $l_i_pad_step * 2 ) . 'px';
		$l_s_contents_h5_pad_mobile     = ( $l_i_pad_step * 3 ) . 'px';
		$l_s_contents_h6_pad_mobile     = ( $l_i_pad_step * 4 ) . 'px';
		$l_s_generic_backlink           = '⬆';
		$l_s_backlink_pad_scalar        = 22;
		$l_s_backlink_pad_delta         = 9;
		$l_s_backlink_pad_inside        = $l_s_backlink_pad_scalar . 'px';
		$l_s_backlink_pad_hover_inside  = ( $l_s_backlink_pad_scalar - $l_s_backlink_pad_delta ) . 'px';
		$l_s_backlink_pad_hover_outside = $l_s_backlink_pad_delta . 'px';
		$l_f_backlink_opacity           = 0.3;
		$l_s_headings_move_duration     = 500 . 'ms';
		$l_s_contents_move_duration     = 300 . 'ms';
		$l_s_item_font_size             = 16 . 'px';
		$l_f_item_line_height           = 1.4;
		$l_s_row_spacing                = 6 . 'px';
		$l_s_contents_white_space_prop  = 'normal';

		$l_s_css .= wp_kses( "\r\n/* Table of contents */", array() );
		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-list-wrapper {
						margin-top: $l_s_list_wrapper_margin_top;
						margin-bottom: $l_s_list_wrapper_margin_bottom;
						padding: 0;
					}

					.anrghg-tocontents {
						width: fit-content;
						max-width: 100%;
						margin-top: $l_s_contents_margin_top;
						margin-inline-end: $l_s_contents_margin_end;
						margin-bottom: $l_s_contents_margin_bottom;
						margin-inline-start: $l_s_contents_margin_start;
						border: $l_s_contents_border_width $l_s_contents_border_style $l_s_contents_border_color;
						padding-top: $l_s_contents_padding_y;
						padding-inline-end: $l_s_contents_padding_end;
						padding-bottom: $l_s_contents_padding_y;
						padding-inline-start: $l_s_contents_padding_start;
					}

					.anrghg-tocontents.anrghg-left {
						margin-left: 0;
						margin-right: auto;
					}

					.anrghg-tocontents.anrghg-center {
						margin-left: auto;
						margin-right: auto;
					}

					.anrghg-tocontents.anrghg-right {
						margin-left: auto;
						margin-right: 0;
					}

					.anrghg-contents-label {
						width: fit-content;
						margin-bottom: $l_s_label_margin_bottom;
					}

					a.anrghg-contents-anchor .anrghg-contents-label {
						text-decoration: none;
						border-bottom: none;
					}

					.anrghg-contents-label:focus {
						outline: 2px solid #0606066B;
					}

					a.anrghg-contents-anchor .anrghg-contents-label::after {
						display: inline-block;
						content: '$l_s_label_twistie_char';
						padding: 0 20px;
					}

					@media print {

						a.anrghg-contents-anchor .anrghg-contents-label::after {
							display: none;
						}

					}

					.anrghg-display-toggle:not(:checked) + .anrghg-tocontents {
						$l_s_contents_border_collapsed
						$l_s_contents_collapsed_width
						transition: all $l_s_contents_move_duration;
					}

					.anrghg-display-toggle:focus + .anrghg-tocontents a .anrghg-contents-label,
					.anrghg-display-toggle + .anrghg-tocontents a:active .anrghg-contents-label {
						border: 2px solid #ABABAB;
					}

					a.anrghg-contents-anchor .anrghg-contents-label::after {
						color: $l_s_twistie_color_collapsed;
						transform: rotate(-.25turn) translateY(-.15em);
						transition: all $l_s_contents_move_duration ease-in-out;
					}

					html[dir=rtl] a.anrghg-contents-anchor .anrghg-contents-label::after {
						transform: rotate(.25turn) translateY(-.15em);
					}

					.anrghg-display-toggle:checked + .anrghg-tocontents a .anrghg-contents-label::after {
						color: $l_s_twistie_color_expanded;
						transform: rotate(.25turn) translateY(-.15em);
						transition: all $l_s_contents_move_duration ease-in-out;
					}

					html[dir=rtl] .anrghg-display-toggle:checked + .anrghg-tocontents a .anrghg-contents-label::after {
						transform: rotate(-.25turn) translateY(-.15em);
					}

					.anrghg-display-toggle + .anrghg-tocontents .anrghg-contents-list .anrghg-contents-heading {
						opacity: 0;
						padding-top: 0;
						padding-bottom: 0;
						margin-top: 0;
						line-height: 0;
						font-size: 0;
						transition: all $l_s_contents_move_duration ease-in-out;
						white-space: $l_s_contents_white_space_prop;
						visibility: hidden;
					}

					@media print {

						.anrghg-display-toggle + .anrghg-tocontents .anrghg-contents-list .anrghg-contents-heading {
							opacity: 1;
							visibility: visible;
							margin-bottom: $l_s_row_spacing;
							line-height: $l_f_item_line_height;
						}

					}

					.anrghg-display-toggle:checked + .anrghg-tocontents .anrghg-contents-list .anrghg-contents-heading {
						opacity: 1;
						margin-bottom: $l_s_row_spacing;
						line-height: $l_f_item_line_height;
						font-size: $l_s_item_font_size;
						transition: all $l_s_contents_move_duration ease-in-out;
						visibility: visible;
					}

					.anrghg-display-toggle:checked + .anrghg-tocontents .anrghg-contents-list.anrghg-instant .anrghg-contents-heading {
						transition: all 0 ease-in-out;
					}

					.anrghg-contents-list .anrghg-contents-heading a {
						text-decoration: none;
						border-bottom: none;
					}

					.anrghg-inline-spacer {
						display: inline-block;
						width: $l_s_contents_numbering_pad;
					}

					.anrghg-contents-h2 {
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

						.anrghg-tocontents {
							padding-inline-end: 0;
							padding-inline-start: 3px;
						}

						.anrghg-display-toggle:focus + .anrghg-tocontents a .anrghg-contents-label,
						.anrghg-display-toggle + .anrghg-tocontents a:active .anrghg-contents-label {
							padding-inline-start: 3px;
							margin-inline-start: -3px;
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

					a.anrghg-heading-number.anrghg-before::before,
					a.anrghg-heading-number.anrghg-after::before,
					a.anrghg-heading-number.anrghg-before:any-link,
					a.anrghg-heading-number.anrghg-after:any-link,
					a.anrghg-heading-number.anrghg-before:-webkit-any-link,
					a.anrghg-heading-number.anrghg-after:-webkit-any-link {
						text-decoration: none;
						border-bottom: none;
					}

					.anrghg-heading-number::before {
						content: '$l_s_generic_backlink';
						opacity: $l_f_backlink_opacity;
						transition: all $l_s_headings_move_duration ease-in-out;
					}

					.anrghg-heading-number:hover::before {
						text-decoration: underline;
						opacity: 1;
						transition: all $l_s_headings_move_duration ease-in-out;
					}

					.anrghg-heading-number.anrghg-after::before {
						padding-inline-start: $l_s_backlink_pad_inside;
					}

					.anrghg-heading-number.anrghg-after:hover::before {
						padding-inline-start: $l_s_backlink_pad_hover_inside;
						padding-inline-end: $l_s_backlink_pad_hover_outside;
					}

					.anrghg-heading-number.anrghg-before::before {
						padding-inline-end: $l_s_backlink_pad_inside;
					}

					.anrghg-heading-number.anrghg-before:hover::before {
						padding-inline-end: $l_s_backlink_pad_hover_inside;
						padding-inline-start: $l_s_backlink_pad_hover_outside;
					}

					body {counter-reset: h2}
					h2 {counter-reset: h3}
					h3 {counter-reset: h4}
					h4 {counter-reset: h5}
					h5 {counter-reset: h6}

					h2 .anrghg-heading-number::before {counter-increment: h2; content: counter(h2) '.'}
					h3 .anrghg-heading-number::before {counter-increment: h3; content: counter(h2) '.' counter(h3) '.'}
					h4 .anrghg-heading-number::before {counter-increment: h4; content: counter(h2) '.' counter(h3) '.' counter(h4) '.'}
					h5 .anrghg-heading-number::before {counter-increment: h5; content: counter(h2) '.' counter(h3) '.' counter(h4) '.' counter(h5) '.'}
					h6 .anrghg-heading-number::before {counter-increment: h6; content: counter(h2) '.' counter(h3) '.' counter(h4) '.' counter(h5) '.' counter(h6) '.'}

					.anrghg-contents-list {counter-reset: toc_h2}
					.anrghg-contents-h2 {counter-reset: toc_h3}
					.anrghg-contents-h3 {counter-reset: toc_h4}
					.anrghg-contents-h4 {counter-reset: toc_h5}
					.anrghg-contents-h5 {counter-reset: toc_h6}

					.anrghg-contents-h2 a::before {counter-increment: toc_h2; content: counter(toc_h2) '.'}
					.anrghg-contents-h3 a::before {counter-increment: toc_h3; content: counter(toc_h2) '.' counter(toc_h3) '.'}
					.anrghg-contents-h4 a::before {counter-increment: toc_h4; content: counter(toc_h2) '.' counter(toc_h3) '.' counter(toc_h4) '.'}
					.anrghg-contents-h5 a::before {counter-increment: toc_h5; content: counter(toc_h2) '.' counter(toc_h3) '.' counter(toc_h4) '.' counter(toc_h5) '.'}
					.anrghg-contents-h6 a::before {counter-increment: toc_h6; content: counter(toc_h2) '.' counter(toc_h3) '.' counter(toc_h4) '.' counter(toc_h5) '.' counter(toc_h6) '.'}

				"
			)
		);
	}

	/**
	 * Rules for the Notes and sources feature.
	 *
	 * @since 0.9.0
	 */
	if ( anrghg_apply_config( 'anrghg_complements_active' ) ) {

		/**
		 * Rules for complement syntax error warning.
		 *
		 * @since 0.77.0
		 * @since 1.14.0 Output CSS on condition of activation.
		 */
		if ( anrghg_apply_config( 'anrghg_complements_syntax_warning' ) ) {
			$l_s_background_color = '#532CBB';
			$l_s_css             .= wp_kses( "\r\n/* Complements */", array() );
			$l_s_css             .= anrghg_protected_return(
				anrghg_minilight(
					'css',
					"

						div.anrghg-warning {
							text-align: center;
							padding: 10px 30px;
							color: white;
							background: $l_s_background_color;
						}

						div.anrghg-warning div {
							padding: 1em 12px;
						}

						div.anrghg-warning div.anrghg-quote {
							text-align: start;
							color: black;
							background: white;
						}

					"
				)
			);
		}

		/**
		 * Rules for complement anchors.
		 *
		 * @since 0.68.0 Option to space out the anchor by fixed-width CSS.
		 * @reporter** @pavelberg1
		 * @link https://wordpress.org/support/topic/non-breaking-space-after-the-indexes/
		 * @link https://www.influencewatch.org/non-profit/pew-charitable-trusts/
		 *
		 * Option for underlining both anchors and backlinks (is:todo).
		 * @reporter** @acka
		 * @link https://wordpress.org/support/topic/underline-referrer-and-backlink-symbol/
		 */
		$l_s_vertical_align          = 'text-top'; // baseline, middle, text-top, super, top.
		$l_s_vertical_align          = 0.4 . 'em';
		$l_s_referrer_font_size      = 'smaller'; // smaller, normal.
		$l_s_referrer_font_size      = 0.8 . 'em';
		$l_s_referrer_font_weight    = 'normal';
		$l_s_referrer_decoration     = 'none'; // none, underline.
		$l_s_referrer_bottom_border  = 'none'; // none / width, style, color.
		$l_s_referrer_letter_spacing = 'normal';
		if ( 1 === (int) anrghg_apply_config( 'anrghg_complement_anchor_spacing' ) ) {
			$l_s_referrer_padding_start = anrghg_apply_config( 'anrghg_complement_anchor_padding' ) . 'em';
			$l_s_referrer_padding_rule  = 'padding-inline-start: ' . $l_s_referrer_padding_start . 'em;';
		} else {
			$l_s_referrer_padding_rule = '';
		}
		$l_s_concatenator_spacing = ''; // provisional @todo.
		$l_s_referrer_color       = 'inherit'; // Optionally not stand out.
		$l_s_referrer_color       = '#008000'; // Optional contrast with other links.
		$l_s_referrer_color_rule  = ''; // For link color, there must be no color rule.
		if ( ! true ) {
			$l_s_referrer_color_rule = "color: $l_s_referrer_color;";
		}
		$l_s_css .= wp_kses( "\r\n/* Complement anchors */", array() );
		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-complement-referrer {
						white-space: nowrap;
						$l_s_referrer_padding_rule
					}

					.anrghg-complement-referrer a label {
						cursor: pointer;
					}

					.anrghg-referrer-source,
					.anrghg-referrer-note,
					.anrghg-referrer-concatenator {
						vertical-align: $l_s_vertical_align;
						font-size: $l_s_referrer_font_size !important;
						font-weight: $l_s_referrer_font_weight;
						letter-spacing: $l_s_referrer_letter_spacing;
						line-height: 0;
					}

					.anrghg-referrer-source,
					.anrghg-referrer-note {
						$l_s_referrer_color_rule
						text-decoration: $l_s_referrer_decoration !important;
						border-bottom: $l_s_referrer_bottom_border !important;
					}

					.anrghg-referrer-concatenator::after {
						padding-inline-end: $l_s_concatenator_spacing;
					}

				"
			)
		);

		/**
		 * Rules for anchor tooltips.
		 *
		 * Display triggered using `:hover` and `:focus-within` pseudo-classes,
		 * a script-free solution benefitting AMP compatibility.
		 *
		 * @contributor** @milindmore22
		 * @link https://github.com/ampproject/amp-wp/issues/5913#issuecomment-785306933
		 * @contributor** @westonruter
		 * @link https://github.com/ampproject/amp-wp/issues/5913#issuecomment-785419655
		 *
		 * @since 1.4.12 Debug fullwidth tooltip and its nested tooltips.
		 * Scrollable tooltips are not an option, because such tooltips would
		 * be unable to display the tooltips of some of the nested sources if
		 * there are any.
		 * The display of overflowing tooltips depends on visible overflow,
		 * while all scrolling options imply hidden overflow.
		 * @since 1.6.4 Option for scrollable tooltips with caveat (provisional).
		 * @since 1.6.15 Remove direct child combinators, for AMP compatibility.
		 * Like non-ASCII characters in class names and IDs, the AMP plugin does
		 * not seem to keep rules using ‘>’. There were 12 instances for tooltips
		 * and one for Thank You messages, and both features were disabled by AMP
		 * due to entirely discarding their style rules with a ‘>’ in selectors.
		 * @link https://github.com/ampproject/amp-wp/issues/7239
		 * @since 1.14.0 Output anchor tooltip style rules on the condition of tooltip activation.
		 * @since 1.14.0 Debug display of scrollable tooltips.
		 */
		if ( anrghg_apply_config( 'anrghg_anchor_tooltips_active' ) || anrghg_apply_config( 'anrghg_combine_identical_complements' ) ) {
			$l_s_max_width  = (int) anrghg_apply_config( 'anrghg_small_anchor_tooltip_maximum_width' ) . 'px';
			$l_s_property_x = anrghg_apply_config( 'anrghg_small_anchor_tooltip_horizontal_edge' );
			if ( 'left' !== $l_s_property_x && 'right' !== $l_s_property_x ) {
				$l_s_property_x = 'left';
			}
			$l_s_inset_x    = (int) anrghg_apply_config( 'anrghg_small_anchor_tooltip_horizontal_inset' ) . 'px';
			$l_s_property_y = anrghg_apply_config( 'anrghg_small_anchor_tooltip_vertical_edge' );
			if ( 'top' !== $l_s_property_y && 'bottom' !== $l_s_property_y ) {
				$l_s_property_y = 'bottom';
			}
			$l_s_inset_y              = (int) anrghg_apply_config( 'anrghg_small_anchor_tooltip_vertical_inset' ) . 'px';
			$l_s_breakpoint_width     = (int) anrghg_apply_config( 'anrghg_small_tooltip_mobile_breakpoint' ) . 'px';
			$l_s_gen_breakpoint_width = (int) anrghg_apply_config( 'anrghg_general_mobile_breakpoint' ) . 'px';
			$l_s_max_height           = (int) anrghg_apply_config( 'anrghg_anchor_tooltip_maximum_height' ) . 'px';
			if ( (bool) anrghg_apply_config( 'anrghg_scrollable_anchor_tooltips' ) ) {
				$l_s_max_height_property = "max-height: $l_s_max_height;";
				$l_s_overflow_y_property = 'overflow-y: auto !important;';
			} else {
				$l_s_max_height_property = '';
				$l_s_overflow_y_property = '';
			}
			$l_s_line_height = (float) anrghg_apply_config( 'anrghg_anchor_tooltip_line_height' );
			$l_s_font_size   = anrghg_apply_config( 'anrghg_anchor_tooltip_font_size' ) . 'px;';
		}

		if ( anrghg_apply_config( 'anrghg_anchor_tooltips_active' ) ) {
			$l_s_fade_in_delay            = anrghg_apply_config( 'anrghg_anchor_tooltip_fade_in_delay' ) . 'ms';
			$l_s_fade_in_duration         = anrghg_apply_config( 'anrghg_anchor_tooltip_fade_in_duration' ) . 'ms';
			$l_s_fade_in_function         = anrghg_apply_config( 'anrghg_anchor_tooltip_fade_in_function' );
			$l_s_fade_out_delay_scalar    = anrghg_apply_config( 'anrghg_anchor_tooltip_fade_out_delay' );
			$l_s_fade_out_delay           = $l_s_fade_out_delay_scalar . 'ms';
			$l_s_fade_out_duration_scalar = anrghg_apply_config( 'anrghg_anchor_tooltip_fade_out_duration' );
			$l_s_fade_out_duration        = $l_s_fade_out_duration_scalar . 'ms';
			$l_s_fade_out_function        = anrghg_apply_config( 'anrghg_anchor_tooltip_fade_out_function' );
			$l_s_visibility_persistence   = ( $l_s_fade_out_delay_scalar + $l_s_fade_out_duration_scalar ) . 'ms';
			$l_s_tooltip_color            = anrghg_apply_config( 'anrghg_anchor_tooltip_foreground_color' );
			$l_s_tooltip_background       = anrghg_apply_config( 'anrghg_anchor_tooltip_background_color' );
			$l_s_padding_top              = anrghg_apply_config( 'anrghg_anchor_tooltip_padding_top' ) . 'px';
			$l_s_padding_start            = anrghg_apply_config( 'anrghg_anchor_tooltip_padding_start' ) . 'px';
			$l_s_padding_end              = anrghg_apply_config( 'anrghg_anchor_tooltip_padding_end' ) . 'px';
			$l_s_padding_bottom           = anrghg_apply_config( 'anrghg_anchor_tooltip_padding_bottom' ) . 'px';
			$l_s_border_width             = anrghg_apply_config( 'anrghg_anchor_tooltip_border_width' ) . 'px';
			$l_s_border_style             = anrghg_apply_config( 'anrghg_anchor_tooltip_border_style' );
			$l_s_border_radius            = anrghg_apply_config( 'anrghg_anchor_tooltip_border_radius' ) . 'px';
			$l_s_border_color             = anrghg_apply_config( 'anrghg_anchor_tooltip_border_color' );
			$l_s_shadow_x_offset          = anrghg_apply_config( 'anrghg_anchor_tooltip_shadow_x_offset' ) . 'px';
			$l_s_shadow_y_offset          = anrghg_apply_config( 'anrghg_anchor_tooltip_shadow_y_offset' ) . 'px';
			$l_s_shadow_blur              = anrghg_apply_config( 'anrghg_anchor_tooltip_shadow_blur' ) . 'px';
			$l_s_shadow_spread            = anrghg_apply_config( 'anrghg_anchor_tooltip_shadow_spread' ) . 'px';
			$l_s_shadow_color             = anrghg_apply_config( 'anrghg_anchor_tooltip_shadow_color' );

			$l_s_css .= wp_kses( "\r\n/* Anchor tooltips */", array() );
			$l_s_css .= anrghg_protected_return(
				anrghg_minilight(
					'css',
					"

						.anrghg-complement-tooltip.anrghg-fullwidth {
							right: 0;
							left: auto;
							top: auto;
							bottom: auto;
							width: 100%;
							max-width: 70vw;
							$l_s_max_height_property
							$l_s_overflow_y_property
						}

						@media screen and (max-width: $l_s_breakpoint_width) {

							.anrghg-complement-tooltip.anrghg-fullwidth {
								max-width: 100%;
							}

						}

						.anrghg-complement-referrer.anrghg-relative {
							position: relative;
						}

						.anrghg-complement-tooltip {
							display: block;
							position: absolute;
							$l_s_property_x: $l_s_inset_x;
							$l_s_property_y: $l_s_inset_y;
							z-index: 2147483647;
							width: max-content;
							max-width: $l_s_max_width;
							visibility: hidden;
							opacity: 0;
							transition: visibility 0s $l_s_visibility_persistence, opacity $l_s_fade_out_duration $l_s_fade_out_function $l_s_fade_out_delay;
							padding-top: $l_s_padding_top;
							padding-inline-start: $l_s_padding_start;
							padding-inline-end: $l_s_padding_end;
							padding-bottom: $l_s_padding_bottom;
							line-height: $l_s_line_height;
							font-size: $l_s_font_size;
							color: $l_s_tooltip_color;
							background-color: $l_s_tooltip_background;
							border: $l_s_border_width $l_s_border_style $l_s_border_color;
							border-radius: $l_s_border_radius;
							box-shadow: $l_s_shadow_x_offset $l_s_shadow_y_offset $l_s_shadow_blur $l_s_shadow_spread $l_s_shadow_color;
							white-space: normal;
							word-wrap: normal;
						}

						.anrghg-tooltip-display-toggle:checked + .anrghg-complement-tooltip,
						.anrghg-complement-referrer:hover > .anrghg-complement-tooltip,
						.anrghg-complement-referrer:focus-within > .anrghg-complement-tooltip,
						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target .anrghg-complement-referrer:hover > .anrghg-complement-tooltip,
						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target .anrghg-complement-referrer:focus-within > .anrghg-complement-tooltip {
							visibility: visible;
							opacity: 1;
							transition: opacity $l_s_fade_in_duration $l_s_fade_in_function $l_s_fade_in_delay;
						}

						@media screen and (max-width: $l_s_breakpoint_width) {

							.anrghg-complement-referrer.anrghg-relative {
								position: static;
							}

							.anrghg-complement-tooltip {
								right: 0;
								left: auto;
								top: auto;
								bottom: auto;
								width: fit-content;
							}

						}

						@media screen and (max-width: $l_s_gen_breakpoint_width) {

							.anrghg-tooltip-display-toggle:checked + .anrghg-complement-tooltip,
							.anrghg-complement-referrer:hover > .anrghg-complement-tooltip,
							.anrghg-complement-referrer:focus-within > .anrghg-complement-tooltip {
								transition-delay: 0;
								transition-duration: 80ms;
							}

						}

						.anrghg-tooltip-more {
							white-space: nowrap;
							font-style: italic;
							text-decoration: none;
							border-bottom: none;
						}

						.anrghg-tooltip-close-button {
							display: block;
							position: absolute;
							top: 2px;
							right: 2px;
							height: 12px;
							width: 12px;
							border: 1px solid gray;
							color: gray;
							cursor: pointer;
						}
						.anrghg-tooltip-close-button:hover {
							background: red;
							color: white;
						}

						.anrghg-tooltip-close-button:before {
							content: '×';
							font-size: 20px;
							position: relative;
							top: -7px;
							right: 1px;
							overflow: hidden;
						}

						span.anrghg-p-emulate {
							display: block;
							height: .6em;
						}

					"
				)
			);
		}

		/**
		 * Rules for backlink tooltips.
		 *
		 * Part of the settings are in common with anchor tooltips.
		 *
		 * @since 1.14.0 Output backlink tooltip style rules on the condition of identical complement combination.
		 * @since 1.14.0 Prevent backlink texts from line-wrapping.
		 */
		if ( anrghg_apply_config( 'anrghg_combine_identical_complements' ) ) {
			$l_s_tooltip_color            = anrghg_apply_config( 'anrghg_backlink_tooltip_foreground_color' );
			$l_s_tooltip_background       = anrghg_apply_config( 'anrghg_backlink_tooltip_background_color' );
			$l_s_padding_top              = anrghg_apply_config( 'anrghg_backlink_tooltip_padding_top' ) . 'px';
			$l_s_padding_start            = anrghg_apply_config( 'anrghg_backlink_tooltip_padding_start' ) . 'px';
			$l_s_padding_end              = anrghg_apply_config( 'anrghg_backlink_tooltip_padding_end' ) . 'px';
			$l_s_padding_bottom           = anrghg_apply_config( 'anrghg_backlink_tooltip_padding_bottom' ) . 'px';
			$l_s_border_width             = anrghg_apply_config( 'anrghg_backlink_tooltip_border_width' ) . 'px';
			$l_s_border_style             = anrghg_apply_config( 'anrghg_backlink_tooltip_border_style' );
			$l_s_border_radius            = anrghg_apply_config( 'anrghg_backlink_tooltip_border_radius' ) . 'px';
			$l_s_border_color             = anrghg_apply_config( 'anrghg_backlink_tooltip_border_color' );
			$l_s_shadow_x_offset          = anrghg_apply_config( 'anrghg_backlink_tooltip_shadow_x_offset' ) . 'px';
			$l_s_shadow_y_offset          = anrghg_apply_config( 'anrghg_backlink_tooltip_shadow_y_offset' ) . 'px';
			$l_s_shadow_blur              = anrghg_apply_config( 'anrghg_backlink_tooltip_shadow_blur' ) . 'px';
			$l_s_shadow_spread            = anrghg_apply_config( 'anrghg_backlink_tooltip_shadow_spread' ) . 'px';
			$l_s_shadow_color             = anrghg_apply_config( 'anrghg_backlink_tooltip_shadow_color' );
			$l_s_fade_in_delay            = anrghg_apply_config( 'anrghg_backlink_tooltip_fade_in_delay' ) . 'ms';
			$l_s_fade_in_duration         = anrghg_apply_config( 'anrghg_backlink_tooltip_fade_in_duration' ) . 'ms';
			$l_s_fade_in_function         = anrghg_apply_config( 'anrghg_backlink_tooltip_fade_in_function' );
			$l_s_fade_out_delay_scalar    = anrghg_apply_config( 'anrghg_backlink_tooltip_fade_out_delay' );
			$l_s_fade_out_delay           = $l_s_fade_out_delay_scalar . 'ms';
			$l_s_fade_out_duration_scalar = anrghg_apply_config( 'anrghg_backlink_tooltip_fade_out_duration' );
			$l_s_fade_out_duration        = $l_s_fade_out_duration_scalar . 'ms';
			$l_s_fade_out_function        = anrghg_apply_config( 'anrghg_backlink_tooltip_fade_out_function' );
			$l_s_visibility_persistence   = ( $l_s_fade_out_delay_scalar + $l_s_fade_out_duration_scalar ) . 'ms';

			$l_s_css .= wp_kses( "\r\n/* Backlink tooltips */", array() );
			$l_s_css .= anrghg_protected_return(
				anrghg_minilight(
					'css',
					"

						.anrghg-backlink-tooltip {
							$l_s_property_x: $l_s_inset_x;
							$l_s_property_y: $l_s_inset_y;
							width: max-content;
							max-width: $l_s_max_width;
							max-height: $l_s_max_height;
							overflow-y: auto;
						}

						.anrghg-backlink-tooltip {
							display: block;
							position: absolute;
							z-index: 2147483647;
							visibility: hidden;
							opacity: 0;
							transition: visibility 0s $l_s_visibility_persistence, opacity $l_s_fade_out_duration $l_s_fade_out_function $l_s_fade_out_delay;
							padding-top: $l_s_padding_top;
							padding-inline-start: $l_s_padding_start;
							padding-inline-end: $l_s_padding_end;
							padding-bottom: $l_s_padding_bottom;
							line-height: $l_s_line_height;
							font-size: $l_s_font_size;
							color: $l_s_tooltip_color;
							background-color: $l_s_tooltip_background;
							border: $l_s_border_width $l_s_border_style $l_s_border_color;
							border-radius: $l_s_border_radius;
							box-shadow: $l_s_shadow_x_offset $l_s_shadow_y_offset $l_s_shadow_blur $l_s_shadow_spread $l_s_shadow_color;
							white-space: normal;
							word-wrap: normal;
						}

						.anrghg-complement-backlink:hover .anrghg-backlink-tooltip,
						.anrghg-complement-backlink:focus .anrghg-backlink-tooltip,
						.anrghg-backlink-tooltip:focus-within,
						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target .anrghg-complement-backlink:hover .anrghg-backlink-tooltip,
						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target .anrghg-complement-backlink:focus-within .anrghg-backlink-tooltip {
							visibility: visible;
							opacity: 1;
							transition: opacity $l_s_fade_in_duration $l_s_fade_in_function $l_s_fade_in_delay;
						}

						@media screen and (max-width: $l_s_gen_breakpoint_width) {

							.anrghg-complement-backlink:hover .anrghg-backlink-tooltip,
							.anrghg-complement-backlink:focus .anrghg-backlink-tooltip,
							.anrghg-backlink-tooltip:focus-within {
								transition-delay: 0;
								transition-duration: 80ms;
							}

						}

						.anrghg-complement-backlink {
							position: relative;
							white-space: nowrap;
						}

						span.anrghg-complement-backlink {
							cursor: help;
						}

						.anrghg-complement-backlink-item {
							white-space: nowrap;
						}

						@media screen and (max-width: $l_s_breakpoint_width) {

							.anrghg-complement-backlink {
								position: static;
							}

							.anrghg-backlink-tooltip {
								right: 0;
								left: auto;
								top: auto;
								bottom: auto;
								width: fit-content;
							}

						}

					"
				)
			);
		}

		/**
		 * Rules for note and source lists.
		 *
		 * @since 0.9.0
		 * The CSS `:target` selector is used thanks to @westonruter code contribution.
		 * @contributor** @westonruter
		 * @link https://github.com/markcheret/footnotes/issues/48#issuecomment-799582394
		 * CSS flexbox layout:
		 * @link https://coder-coder.com/display-divs-side-by-side/
		 * Padding between number and backlink symbol matters.
		 * @link https://wordpress.org/support/topic/hyperlink-symbol-in-reference-container/
		 * Append rotating twisties in pseudo-elements to labels of collapsible lists.
		 * @link https://help.hcltechsw.com/dom_designer/9.0.1/appdev/H_CUSTOMIZING_THE_EXPAND_AND_COLLAPSE_ICONS_OVER.html
		 *
		 * @since 0.28.0 Optional three-column layout, and a two-column option.
		 * @reporter** @spaceling
		 * @link https://wordpress.org/support/topic/change-the-position-5/page/2/#post-13671138
		 *
		 * @since 0.29.0 Fix bug in twisties of collapsible lists due to mirrored
		 * CSS rotation in right-to-left writing direction.
		 *
		 * @since 0.63.0 Settings to choose elements and font size for list labels.
		 * @reporter** @xaari
		 * @link https://wordpress.org/support/topic/change-size-of-reference-label-move-reference-container/
		 * @reporter** @leonardlai
		 * @link https://wordpress.org/support/topic/change-size-of-reference-label/
		 *
		 * @since 1.14.1 The `:target-within` selector has no browser support, so
		 * backlinks of nested sources cannot expand the note, despite the unique IDs.
		 * @link https://developer.mozilla.org/en-US/docs/Web/CSS/:target-within#browser_compatibility
		 * @since 1.14.5 Remove gap between Note list label and Source list label in collapsed state.
		 *
		 * @see `styles.php` * Rules for table of contents and heading numbers.
		 */
		$l_s_list_wrapper_margin_top        = anrghg_apply_config( 'anrghg_list_wrapper_margin_top' ) . 'px';
		$l_s_list_wrapper_margin_bottom     = anrghg_apply_config( 'anrghg_list_wrapper_margin_bottom' ) . 'px';
		$l_s_list_heading_margin_top        = 0 . 'px'; // 20.
		$l_s_list_heading_margin_top_mobile = 0 . 'px'; // 60.
		$l_s_list_heading_margin_bottom     = 0 . 'px';
		$l_s_heading_twistie_char           = '❰'; // ⟨, ❰, ❮, ‹, «.
		$l_s_twistie_color_collapsed        = 'inherit'; // inherit (link color), or #6A6A6A.
		$l_s_twistie_color_expanded         = '#CBCBCB'; // inherit (link color), or #CBCBCB.
		$l_s_transition_duration            = 300 . 'ms';
		$l_i_list_column_number_note        = anrghg_apply_config( 'anrghg_note_list_layout' );
		$l_i_list_column_number_source      = anrghg_apply_config( 'anrghg_source_list_layout' );
		$l_s_list_row_padding               = 6 . 'px';
		$l_s_list_row_line_height           = 1.5 . 'em';
		$l_s_list_number_symbol             = anrghg_apply_config( 'anrghg_number_backlink_symbol_input' );
		if ( empty( $l_s_list_number_symbol ) ) {
			$l_s_list_number_symbol = $g_a_anrghg_config['anrghg_number_backlink_symbol_select'];
		}
		$l_s_tail_backlink_symbol = anrghg_apply_config( 'anrghg_tail_backlink_symbol_input' );
		if ( empty( $l_s_tail_backlink_symbol ) ) {
			$l_s_tail_backlink_symbol = $g_a_anrghg_config['anrghg_tail_backlink_symbol_select'];
		}
		$l_s_list_number_symbol_position = anrghg_apply_config( 'anrghg_number_backlink_symbol_display' );
		$l_s_list_number_symbol          = $l_s_list_number_symbol_position ? $l_s_list_number_symbol : '';
		switch ( $l_s_list_number_symbol_position ) {
			case '-1':
				$l_s_list_number_symbol_position = 'before';
				break;
			case '1':
			case '0':
			default:
				$l_s_list_number_symbol_position = 'after';
		}
		$l_s_list_number_min_width     = 3.3 . 'em';
		$l_s_list_number_pad_after     = 12 . 'px';
		$l_b_list_number_font_weight   = (bool) '1'; // 1 bold, 0 normal.
		$l_s_list_number_font_weight   = $l_b_list_number_font_weight ? 'bold' : 'normal';
		$l_s_list_symbol_pad_before    = 4 . 'px';
		$l_s_list_symbol_pad_after     = 0 . 'px';
		$l_s_tail_backlink_pad_before  = 10 . 'px';
		$l_s_list_symbol_decoration    = 'none'; // none, underline.
		$l_s_list_symbol_bottom_border = 'none'; // none / width, style, color.
		$l_s_footer_list_pad_top       = 50 . 'px';
		$l_s_footer_list_width         = 80 . '%';
		$l_s_footer_list_color         = '#1DC14D'; // #237AF3.
		$l_s_list_end_margin_bottom    = 30 . 'px';
		$l_s_breakpoint_width          = anrghg_apply_config( 'anrghg_general_mobile_breakpoint' ) . 'px'; // 480,768.

		$l_i_group_heading_element = (int) anrghg_apply_config( 'anrghg_list_group_heading_element' );
		if ( 0 > $l_i_group_heading_element ) {
			$l_i_group_heading_element = 0;
		}
		if ( 7 < $l_i_group_heading_element ) {
			$l_i_group_heading_element = 7;
		}
		$l_s_group_heading_font_size_unit = (int) anrghg_apply_config( 'anrghg_list_group_heading_font_size_option' );
		if ( 0 > $l_s_group_heading_font_size_unit ) {
			$l_s_group_heading_font_size_unit = 0;
		}
		if ( 3 < $l_s_group_heading_font_size_unit ) {
			$l_s_group_heading_font_size_unit = 3;
		}
		switch ( $l_s_group_heading_font_size_unit ) {
			case 0:
				$l_s_group_heading_font_size = 7 === $l_i_group_heading_element ? 'font-size: 1.5em' : '';
				break;
			case 1:
				$l_s_group_heading_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_list_group_heading_font_size_px' ) . 'px;';
				break;
			case 2:
				$l_s_group_heading_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_list_group_heading_font_size_em' ) . 'em;';
				break;
			case 3:
				$l_s_group_heading_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_list_group_heading_font_size_rem' ) . 'rem;';
				break;
		}

		$l_i_list_label_element = (int) anrghg_apply_config( 'anrghg_complement_list_label_element' );
		if ( 0 > $l_i_list_label_element ) {
			$l_i_list_label_element = 0;
		}
		if ( 7 < $l_i_list_label_element ) {
			$l_i_list_label_element = 7;
		}
		$l_s_list_label_font_size_unit = (int) anrghg_apply_config( 'anrghg_complement_list_label_font_size_opt' );
		if ( 0 > $l_s_list_label_font_size_unit ) {
			$l_s_list_label_font_size_unit = 0;
		}
		if ( 3 < $l_s_list_label_font_size_unit ) {
			$l_s_list_label_font_size_unit = 3;
		}
		switch ( $l_s_list_label_font_size_unit ) {
			case 0:
				$l_s_list_label_font_size = 7 === $l_i_list_label_element ? 'font-size: 1.5em;' : '';
				break;
			case 1:
				$l_s_list_label_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_complement_list_label_font_size_px' ) . 'px;';
				break;
			case 2:
				$l_s_list_label_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_complement_list_label_font_size_em' ) . 'em;';
				break;
			case 3:
				$l_s_list_label_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_complement_list_label_font_size_rem' ) . 'rem;';
				break;
		}

		$l_s_css .= wp_kses( "\r\n/* Complement lists */", array() );
		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-top-level-list-heading {
						$l_s_group_heading_font_size
					}

					.anrghg-list-wrapper {
						margin-top: $l_s_list_wrapper_margin_top;
						margin-bottom: $l_s_list_wrapper_margin_bottom;
						padding: 0;
					}

					.anrghg-list-heading {
						margin-top: $l_s_list_heading_margin_top;
						margin-bottom: $l_s_list_heading_margin_bottom;
						$l_s_list_label_font_size
					}

					.anrghg-display-toggle:focus + .anrghg-complement-list .anrghg-list-heading {
						outline: 2px solid #0606066B;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-list-heading {
						margin-bottom: 0;
					}

					.anrghg-complement-list a,
					a .anrghg-list-heading {
						text-decoration: none;
						border-bottom: none;
					}

					.anrghg-list-heading:focus {
						outline: 2px solid #0606066B;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-list-heading:focus {
						outline: 2px solid #060606E5;
					}

					a .anrghg-list-heading::after {
						display: inline-block;
						content: '$l_s_heading_twistie_char';
						padding: 0 20px;
						color: $l_s_twistie_color_expanded;
						transform: rotate(.25turn) translateY(-.15em);
						transition: all $l_s_transition_duration ease-in-out;
					}

					div[dir=rtl] a .anrghg-list-heading::after {
						transform: rotate(-.25turn) translateY(-.15em);
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list a .anrghg-list-heading::after {
						color: $l_s_twistie_color_collapsed;
						transform: rotate(-.25turn) translateY(-.15em);
						transition: all $l_s_transition_duration ease-in-out;
					}

					@media print {

						.anrghg-display-toggle:checked + .anrghg-complement-list a .anrghg-list-heading::after {
							display: none;
						}

						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list a .anrghg-list-heading::after {
							display: none;
						}

					}

					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list[dir=rtl] a .anrghg-list-heading::after {
						transform: rotate(.25turn) translateY(-.15em);
					}

					.anrghg-display-toggle:checked + .anrghg-complement-list.anrghg-notes .anrghg-complement-list-body {
						display: block;
						columns: $l_i_list_column_number_note;
					}

					.anrghg-display-toggle:checked + .anrghg-complement-list.anrghg-sources .anrghg-complement-list-body {
						display: block;
						columns: $l_i_list_column_number_source;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-list-body {
						columns: 1;
					}

					@media screen and (max-width: $l_s_breakpoint_width) {

						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-list-body {
							columns: 1;
						}

						.anrghg-list-heading {
							margin-top: $l_s_list_heading_margin_top_mobile;
						}

					}

					@media print {

						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list.anrghg-notes .anrghg-complement-list-body {
							display: block !important;
							columns: $l_i_list_column_number_note !important;
						}

						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list.anrghg-sources .anrghg-complement-list-body {
							display: block !important;
							columns: $l_i_list_column_number_source !important;
						}

					}

					.anrghg-complement-row {
						display: flex;
						visibility: visible;
						opacity: 1;
						font-size: $l_s_font_size;
						line-height: $l_s_list_row_line_height;
						padding: $l_s_list_row_padding 0 $l_s_list_row_padding;
						transition: visibility 0s, opacity $l_s_transition_duration ease-in-out, line-height $l_s_transition_duration ease-in-out, padding-top $l_s_transition_duration ease-in-out;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row,
					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row * {
						visibility: hidden;
						opacity: 0;
						padding: 0;
						max-height: 0;
						line-height: 0;
						font-size: 0;
						transition: visibility 0s $l_s_transition_duration, opacity $l_s_transition_duration ease-out, line-height $l_s_transition_duration ease-in-out, padding-top $l_s_transition_duration ease-in-out, margin $l_s_transition_duration ease-in-out;
					}

					@media print {

						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row,
						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row *:not(.anrghg-complement-tooltip):not(.anrghg-backlink-tooltip),
						.anrghg-display-toggle:checked + .anrghg-complement-list .anrghg-complement-row,
						.anrghg-display-toggle:checked + .anrghg-complement-list .anrghg-complement-row *:not(.anrghg-complement-tooltip):not(.anrghg-backlink-tooltip) {
							visibility: visible;
							opacity: 1 !important;
							max-height: unset;
							line-height: $l_s_list_row_line_height !important;
							font-size: $l_s_font_size;
							widows: 2;
							orphans: 2;
						}

						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row,
						.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row *:not(.anrghg-complement-number),
						.anrghg-display-toggle:checked + .anrghg-complement-list .anrghg-complement-row,
						.anrghg-display-toggle:checked + .anrghg-complement-list .anrghg-complement-row *:not(.anrghg-complement-number) {
							padding: $l_s_list_row_padding 0 $l_s_list_row_padding !important;
						}

						.anrghg-complement-number {
							padding-top: 0 !important;
						}

					}

					.anrghg-display-toggle:checked + .anrghg-complement-list .anrghg-complement-row:target,
					.anrghg-display-toggle:checked + .anrghg-complement-list .anrghg-complement-row:target *,
					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target,
					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target * {
						max-height: unset;
						font-size: $l_s_font_size;
						line-height: $l_s_list_row_line_height;
						padding: $l_s_list_row_padding 0 $l_s_list_row_padding;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target,
					.anrghg-display-toggle:not(:checked) + .anrghg-complement-list .anrghg-complement-row:target *:not(.anrghg-complement-tooltip):not(.anrghg-backlink-tooltip) {
						opacity: 1;
						visibility: visible;
					}

					.anrghg-complement-number {
						min-width: $l_s_list_number_min_width;
						padding-inline-end: $l_s_list_number_pad_after;
						font-weight: $l_s_list_number_font_weight;
						text-align: end;
						margin-top: 0 !important;
						padding-top: 0 !important;
					}

					.anrghg-complement-number::$l_s_list_number_symbol_position {
						content: '$l_s_list_number_symbol';
						padding-inline-start: $l_s_list_symbol_pad_before;
						padding-inline-end: $l_s_list_symbol_pad_after;
					}

					.anrghg-complement-list-content .anrghg-complement-backlink::after {
						content: '$l_s_tail_backlink_symbol';
						padding-inline-start: $l_s_tail_backlink_pad_before;
					}

					@media print {

						.anrghg-complement-number::$l_s_list_number_symbol_position,
						.anrghg-complement-list-content .anrghg-complement-backlink::after {
							opacity: 0;
						}

					}

					.anrghg-complement-backlink {
						text-decoration: $l_s_list_symbol_decoration !important;
						border-bottom: $l_s_list_symbol_bottom_border !important;
					}

					.anrghg-complements-section-spacing {
						margin-bottom: $l_s_list_end_margin_bottom;
					}

					.anrghg-url-wrap {
						word-wrap: anywhere;
						overflow-wrap: anywhere;
						word-break: break-all;
					}

					.anrghg-footer-complement-list {
						width: $l_s_footer_list_width;
						margin: 0 auto 0;
						padding-top: $l_s_footer_list_pad_top;
						text-align: start;
						text-transform: initial;
						z-index: 2147483647;
						color: $l_s_footer_list_color;
					}

					.anrghg-footer-complement-list h2,
					.anrghg-footer-complement-list h3,
					.anrghg-footer-complement-list h4,
					.anrghg-footer-complement-list h5,
					.anrghg-footer-complement-list h6,
					.anrghg-footer-complement-list p,
					.anrghg-footer-complement-list a {
						color: $l_s_footer_list_color;
					}

				"
			)
		);

		/**
		 * Complement lists (continued): Styles for parenthesized URL after link text.
		 *
		 * @since 0.35.0
		 * @courtesy https://www.investopedia.com/terms/s/stagflation.asp#citation-3
		 * Closer to Investopedia’s implementation of the feature.
		 * Investopedia uses WordPress with Mantle framework.
		 * @link https://packagist.org/packages/alleyinteractive/mantle-framework
		 * @see * Prints parenthesized URL after anchor.
		 * Note: The link anchor styling is maintained for consistency.
		 */
		if ( ! anrghg_apply_config( 'anrghg_display_urls_selectable' )
			&& anrghg_apply_config( 'anrghg_display_urls_note_list' )
		) {
			$l_s_css .= anrghg_protected_return(
				anrghg_minilight(
					'css',
					"

						.anrghg-complement-list.anrghg-notes .anrghg-complement-list-content a[href^=http]::after {
							content: ' (' attr(href) ')';
						}

					"
				)
			);
		}
		if ( ! anrghg_apply_config( 'anrghg_display_urls_selectable' )
			&& anrghg_apply_config( 'anrghg_display_urls_source_list' )
		) {
			$l_s_css .= anrghg_protected_return(
				anrghg_minilight(
					'css',
					"

						.anrghg-complement-list.anrghg-sources .anrghg-complement-list-content a[href^=http]::after {
							content: ' (' attr(href) ')';
						}

					"
				)
			);
		}
	}

	/**
	 * Styles for Reference lists.
	 *
	 * @since 0.58.1
	 * Reuses part of ‘Notes and sources’ CSS.
	 */
	if ( has_block( 'anrghg/references', $l_i_post_id ) ) {
		$l_s_list_wrapper_margin_top        = anrghg_apply_config( 'anrghg_list_wrapper_margin_top' ) . 'px';
		$l_s_list_wrapper_margin_bottom     = anrghg_apply_config( 'anrghg_list_wrapper_margin_bottom' ) . 'px';
		$l_s_list_heading_margin_top        = 0 . 'px'; // 20.
		$l_s_list_heading_margin_top_mobile = 0 . 'px'; // 60.
		$l_s_heading_twistie_char           = '❰'; // ⟨, ❰, ❮, ‹, «.
		$l_s_twistie_color_collapsed        = 'inherit'; // inherit, or #6A6A6A.
		$l_s_twistie_color_expanded         = '#CBCBCB'; // inherit, or #CBCBCB.
		$l_s_transition_duration            = 300 . 'ms';
		$l_s_list_row_padding               = 6 . 'px';
		$l_s_list_row_line_height           = 2 . 'em';
		$l_s_list_number_min_width          = 3.3 . 'em';
		$l_s_list_number_pad_after          = 12 . 'px';
		$l_b_list_number_font_weight        = (bool) '1'; // 1 bold, 0 normal.
		$l_s_list_number_font_weight        = $l_b_list_number_font_weight ? 'bold' : 'normal';
		$l_s_list_symbol_decoration         = 'none'; // none, underline.
		$l_s_list_symbol_bottom_border      = 'none'; // none / width, style, color.
		$l_s_footer_list_pad_top            = 50 . 'px';
		$l_s_footer_list_width              = 80 . '%';
		$l_s_footer_list_color              = '#1DC14D'; // #237AF3.
		$l_s_breakpoint_width               = anrghg_apply_config( 'anrghg_general_mobile_breakpoint' ) . 'px'; // 480,768.
		$l_s_list_end_margin_bottom         = 30 . 'px';
		$l_i_list_label_element             = (int) anrghg_apply_config( 'anrghg_reference_list_label_element' );
		if ( 0 > $l_i_list_label_element ) {
			$l_i_list_label_element = 0;
		}
		if ( 7 < $l_i_list_label_element ) {
			$l_i_list_label_element = 7;
		}
		$l_s_list_label_font_size_unit = (int) anrghg_apply_config( 'anrghg_reference_list_label_font_size_option' );
		if ( 0 > $l_s_list_label_font_size_unit ) {
			$l_s_list_label_font_size_unit = 0;
		}
		if ( 3 < $l_s_list_label_font_size_unit ) {
			$l_s_list_label_font_size_unit = 3;
		}
		switch ( $l_s_list_label_font_size_unit ) {
			case 0:
				$l_s_list_label_font_size = 7 === $l_i_list_label_element ? 'font-size: 1.5em;' : '';
				break;
			case 1:
				$l_s_list_label_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_reference_list_label_font_size_px' ) . 'px;';
				break;
			case 2:
				$l_s_list_label_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_reference_list_label_font_size_em' ) . 'em;';
				break;
			case 3:
				$l_s_list_label_font_size = 'font-size: ' . anrghg_apply_config( 'anrghg_reference_list_label_font_size_rem' ) . 'rem;';
				break;
		}

		$l_s_css .= wp_kses( "\r\n/* Reference lists */", array() );
		$l_s_css .= anrghg_protected_return(
			anrghg_minilight(
				'css',
				"

					.anrghg-list-wrapper {
						margin-top: $l_s_list_wrapper_margin_top;
						margin-bottom: $l_s_list_wrapper_margin_bottom;
						padding: 0;
					}

					.anrghg-reference-list {
						margin-bottom: $l_s_list_end_margin_bottom;
					}

					.anrghg-list-heading {
						margin-top: $l_s_list_heading_margin_top;
						margin-bottom: $l_s_list_heading_margin_top;
						$l_s_list_label_font_size
					}

					.anrghg-display-toggle:focus + .anrghg-reference-list .anrghg-list-heading {
						outline: 2px solid #0606066B;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-list-heading {
						margin-bottom: 0;
					}

					a .anrghg-list-heading {
						text-decoration: none;
						border-bottom: none;
					}

					.anrghg-list-heading:focus {
						outline: 2px solid #0606066B;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-list-heading:focus {
						outline: 2px solid #060606E5;
					}

					a .anrghg-list-heading::after {
						display: inline-block;
						content: '$l_s_heading_twistie_char';
						padding: 0 20px;
						color: $l_s_twistie_color_expanded;
						transform: rotate(.25turn) translateY(-.15em);
						transition: all $l_s_transition_duration ease-in-out;
					}

					div[dir=rtl] a .anrghg-list-heading::after {
						transform: rotate(-.25turn) translateY(-.15em);
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list a .anrghg-list-heading::after {
						color: $l_s_twistie_color_collapsed;
						transform: rotate(-.25turn) translateY(-.15em);
						transition: all $l_s_transition_duration ease-in-out;
					}

					@media print {

						.anrghg-display-toggle:checked + .anrghg-reference-list a .anrghg-list-heading::after {
							display: none;
						}

						.anrghg-display-toggle:not(:checked) + .anrghg-reference-list a .anrghg-list-heading::after {
							display: none;
						}

					}

					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list[dir=rtl] a .anrghg-list-heading::after {
						transform: rotate(.25turn) translateY(-.15em);
					}

					.anrghg-reference-row {
						display: flex;
						visibility: visible;
						opacity: 1;
						padding: $l_s_list_row_padding 0 $l_s_list_row_padding;
						line-height: $l_s_list_row_line_height;
						transition: visibility 0s, opacity $l_s_transition_duration ease-in-out, line-height $l_s_transition_duration ease-in-out, padding-top $l_s_transition_duration ease-in-out;
					}

					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-row,
					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-row * {
						visibility: hidden;
						opacity: 0;
						padding-bottom: 0;
						line-height: 0;
						margin: 0;
						transition: visibility 0s $l_s_transition_duration, opacity $l_s_transition_duration ease-out, line-height $l_s_transition_duration ease-in-out, padding-top $l_s_transition_duration ease-in-out, margin $l_s_transition_duration ease-in-out;
					}

					@media print {

						.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-row,
						.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-row *:not(.anrghg-complement-tooltip):not(.anrghg-backlink-tooltip) {
							visibility: visible;
							opacity: 1;
							line-height: $l_s_list_row_line_height;
							padding: $l_s_list_row_padding 0 $l_s_list_row_padding;
						}

					}

					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-row:target,
					.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-row:target * {
						opacity: 1;
						line-height: $l_s_list_row_line_height;
						padding: $l_s_list_row_padding 0 $l_s_list_row_padding;
					}

					.anrghg-reference-number {
						min-width: $l_s_list_number_min_width;
						padding-inline-end: $l_s_list_number_pad_after;
						font-weight: $l_s_list_number_font_weight;
						text-align: end;
					}

					.anrghg-reference-link {
						text-decoration: $l_s_list_symbol_decoration !important;
						border-bottom: $l_s_list_symbol_bottom_border !important;
					}

					@media screen and (max-width: $l_s_breakpoint_width) {

						.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-list-body {
							columns: 1;
						}

						.anrghg-list-heading {
							margin-top: $l_s_list_heading_margin_top_mobile;
						}

					}

					@media print {

						.anrghg-display-toggle:not(:checked) + .anrghg-reference-list .anrghg-reference-list-body {
							display: block !important;
						}

					}

					.anrghg-url-wrap {
						word-wrap: anywhere;
						overflow-wrap: anywhere;
						word-break: break-all;
					}

					.anrghg-refs .anrghg-label {
						font-weight: bold;
						margin-bottom: 10px;
					}

				"
			)
		);
	}

	return $l_s_css;

}
