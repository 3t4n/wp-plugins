<?php
/**
 * Options page 2: Settings callback functions part 2.
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
 * @see COPYING.txt
 */

defined( 'ABSPATH' ) || exit( nl2br( "\r\n\r\n&nbsp; &nbsp; &nbsp; Sorry, this PHP file cannot be displayed in the browser." ) );

// phpcs:disable Squiz.Commenting.FunctionComment.SpacingAfterParamType
// phpcs:disable Squiz.Commenting.FunctionComment.ParamCommentFullStop

/**
 * Callback functions of settings sections and fields.
 *
 * @since 0.30.1 Identity scheme for radio buttons and checkboxes more consistent:
 * - Hidden checkboxes with `_false` suffix, not `_0`.
 * - Topmost radio buttons with `_0` suffix, not ID === name, also to prevent
 *   accidental linking of the left label, if `label_for` is not deactivated.
 * - All numeric ID suffixes start with an underscore.
 * Void is a valid return type and should be mentioned.
 * @link https://www.php.net/manual/en/migration71.new-features.php
 * @link https://stackoverflow.com/questions/29792827/void-as-return-type
 * @link https://stackoverflow.com/questions/2061550/phpdoc-return-void-necessary
 * @since 1.8.1 Split `admin/options/settings.php` into 8 files for maintainability.
 */

/**
 * Interoperability section callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_interoperability_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Line-wrap long URLs field callback function.
 *
 * @since 0.70.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_url_wrap_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Allow to line-wrap URLs anywhere', 'anrghg' ), // Label.
		__( 'URLs may line wrap anywhere.', 'anrghg' ), // On.
		__( 'Supporting browsers may break at slashes.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Applied to URLs displayed in notes, sources or references.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'This prevents long URLs from hanging out of tooltips, and prevents lists from being expanded beyond the window edge.', 'anrghg' )
		)
	);
}

/**
 * HTML in term descriptions field callback function.
 *
 * @since 0.63.0
 * @since 0.66.0 Added information 2 and 3 below the setting.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_allow_html_term_description_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_introduction(
		'',
		sprintf(
			// Translators: %s: Author or website.
			__( 'This feature is based on code from %s', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="https://docs.woocommerce.com/document/allow-html-in-term-category-tag-descriptions/" target="_blank">'
			. 'WooCommerce'
			. '</a>'
		)
	);
	anrghg_echo_glide_switch(
		__( 'Allow HTML in term descriptions', 'anrghg' ), // Label.
		__( 'Term descriptions may contain HTLM tags.', 'anrghg' ), // On.
		__( 'Tags are deleted in term descriptions.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: %s: 'Yoast SEO' linked to the plugin in the WordPress plugin directory.---This information is optionally collapsible or hidden.
				__( 'Many plugins, including ‘%s’, are working around the same limitation.', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">Yoast SEO</a>'
			)
		),
		anrghg_paragraph(
			'important description',
			sprintf(
				// Translators: %s: 'Visual Term Description Editor' linked to the plugin in the WordPress plugin directory.---This information is optionally collapsible or hidden.
				__( 'For a seamless editing experience using the Classic Editor, please turn this feature off and use the ‘%s’ plugin instead.', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://wordpress.org/plugins/visual-term-description-editor/" target="_blank">Visual Term Description Editor</a>'
			)
		),
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: %s: 'GitHub' linked to the issue ‘Enabling Gutenberg in WP categories’.---This information is optionally collapsible or hidden.
				__( 'Using the Block Editor instead is the subject of an issue on %s.', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://github.com/WordPress/gutenberg/issues/17099" target="_blank">GitHub</a>'
			)
		)
	);
}

/**
 * Elementor test mode field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_activate_elementor_test_mode_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate Elementor test mode', 'anrghg' ), // Label.
		__( 'Test markup is added.', 'anrghg' ), // On.
		__( 'No test markup.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: %s: 'Elementor' linked to the plugin in the WordPress plugin directory.---This information is optionally collapsible or hidden.
				__( '‘%s’ integration may be tested in the page source (with or without the plugin).', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://wordpress.org/plugins/elementor/" target="_blank">Elementor</a>'
			)
		)
	);
}

/**
 * Advanced Custom Fields field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_filter_acf_the_content_hook_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Add filters to the ACF wysiwyg hook', 'anrghg' ), // Label.
		__( 'Fields are processed individually.', 'anrghg' ), // On.
		__( 'Fields may be processed as part of other content.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: 1: ‘Advanced Custom Fields’ with link to the Plugin Directory; 2: ‘acf_the_content’.---This information is optionally collapsible or hidden.
				__( '‘%1$s’ applies filters added to the ‘%2$s’ hook in wysiwyg fields.', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Advanced Custom Fields</a>',
				'acf_the_content'
			),
			// Translators: This information is optionally collapsible or hidden.
			__( 'However, processing complements in every single field separately may not be desired.', 'anrghg' )
		)
	);
}

/**
 * Support alternative content hooks field callback function.
 *
 * @since 0.38.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_additional_content_hooks_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_description_textarea(
			'flat',
			__( 'The format is a comma-separated names list of hooks applying filters to the content.', 'anrghg' ),
			// Translators: %s: an enumeration of hook names.
			sprintf( __( 'The following hooks are already supported: %s', 'anrghg' ), 'the_content, term_description, pum_popup_content, sgpbSubscriptionForm, anrghg_the_content' ),
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * User experience section callback function.
 *
 * @since 0.53.0
 * @since 0.62.4 Call it UX instead of ‘Shared configuration’,
 * but use a slug other than `ux` by choosing `anrghg_user_xp`
 * as the section ID, rather than `anrghg_ux`, given that this
 * ID shows up in the URL bar. There, the word `user` needs to
 * appear (while full-length `experience` does not) expressing
 * user centricity, one of this plugin’s cornerstones.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_user_xp_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * CSS Smooth scrolling field callback function.
 *
 * @since 0.60.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_css_smooth_scrolling_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate' ),
		__( 'Scrolling is smooth by CSS.', 'anrghg' ),
		__( 'Scrolling is immediate.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Affects public pages. For efficiency, this settings page does not smooth-scroll.', 'anrghg' )
		)
	);
}

/**
 * CSS Scroll offset field callback function.
 *
 * @since 0.60.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_css_scroll_offset_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Make sure the scroll target is not hidden by a fixed upper pane of less than this height.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				1200,
				1,
				'small',
			),
			'',
			'',
			__( 'Pixels (px)' ),
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * General mobile breakpoint field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_general_mobile_breakpoint_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				1366,
				1,
				'medium',
				'mobile_breakpoints',
			),
			'',
			'',
			__( 'Pixels (px)' ) . C_S_ANRGHG_DASH . __( 'Width' ),
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	echo wp_kses(
		anrghg_datalist(
			'mobile_breakpoints',
			360,
			375,
			414,
			768,
			864,
			1080
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The most common screen width breakpoints are suggested for input.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Please clear this field to see the full list.', 'anrghg' )
		)
	);
}

/**
 * Generic list margins field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_list_wrapper_margin_top_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			array(),
			anrghg_return_information(
				anrghg_paragraph(
					'top description',
					// Translators: This information is optionally collapsible or hidden.
					__( 'These margins are applied to all lists.', 'anrghg' )
				)
			),
			anrghg_table(
				anrghg_input_setting(
					array(
						0,
						1000,
						1,
						'small',
					),
					'',
					__( 'Top margin', 'anrghg' ),
					__( 'Pixels (px)' ),
					'',
					$p_a_params
				),
				anrghg_input_setting(
					array(
						0,
						1000,
						1,
						'small',
					),
					'',
					__( 'Bottom margin', 'anrghg' ),
					__( 'Pixels (px)' ),
					'',
					$p_a_params,
					1
				)
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Customization section callback function.
 *
 * @since 1.9.0
 * @since 1.11.0 Add link to the Theme Editor.
 * @since 1.11.0 Advice for Custom CSS on multisite.
 * @link https://core.trac.wordpress.org/ticket/58610#comment:1
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_customize_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'Custom CSS must not be supported here.', 'anrghg' ),
		sprintf(
			// Translators: 1: Start tag with Theme Customizer URL. 2: End tag.
			__( 'The %1$s Theme Customizer%2$s helps with adding Custom CSS.', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="' . admin_url( 'customize.php' ) . '">',
			'</a>'
		),
		sprintf(
			// Translators: %s: Link to Multisite Custom CSS plugin.
			__( 'On multisite, Custom CSS requires the plugin ʼ%s’.', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="https://wordpress.org/plugins/multisite-custom-css/">Multisite&nbsp;Custom&nbsp;CSS</a>'
		),
		sprintf(
			// Translators: 1: Start tag with Theme Editor URL. 2: End tag.
			__( 'In the %1$s Theme Editor%2$s, Custom CSS can be stored in a child theme.', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="' . admin_url( 'theme-editor.php' ) . '">',
			'</a>'
		)
	);
}

/**
 * Web fonts field callback function.
 *
 * @since 1.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_web_fonts_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Load the web fonts configured below.', 'anrghg' ),
		__( 'These fonts are loaded on public pages.', 'anrghg' ),
		__( 'No web fonts are loaded.', 'anrghg' ),
		$p_a_params
	);
	echo wp_kses(
		anrghg_description_textarea(
			'flat',
			__( 'The format is a semicolon-separated list of URLs.', 'anrghg' ),
			__( 'Line breaks, tabs and spaces are ignored.', 'anrghg' ),
			$p_a_params,
			1
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'important description',
			sprintf(
				// Translators: %s: Link to https://fonts.google.com/ with link text “Google Fonts”.
				__( 'Many webfonts are available on %s.', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://fonts.google.com/" target="_blank">Google Fonts</a>'
			)
		)
	);
}

/**
 * URL slug as a CSS selector field callback function.
 *
 * @since 0.9.0
 * @since 0.24.8 Checkbox-based vertical glide switch.
 * @since 1.5.0 Remove ‘URL slug as a CSS selector’ section.
 * Move setting to the ‘Interoperability’ section.
 * @since 1.6.12 Prefix configuration setting.
 * @since 1.9.0 Move settings field to the new ‘Customization’ section.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_slug_body_class_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			sprintf(
				// Translators: %s: Author or website.
				__( 'This feature is based on code from %s', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://www.wpbeginner.com/wp-themes/how-to-add-page-slug-in-body-class-of-your-wordpress-themes/" target="_blank">'
				. 'WPBeginner'
				. '</a>'
			)
		)
	);
	anrghg_echo_glide_switch(
		// Translators: %s: the start tag `<body>` formatted as code.
		sprintf( __( 'Add the post’s slug as a class to the %s element.', 'anrghg' ), '<code>&lt;body&gt;</code>' ),
		__( 'The slug is a class name.', 'anrghg' ),
		__( 'The slug cannot be used as a CSS selector.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Apply page-specific style rules using the page slug as a selector in CSS.', 'anrghg' ),
			// Translators: 1: a post number example; 2: a page number example; 3: the body start tag.---This information is optionally collapsible or hidden.
			sprintf( __( 'The page slug may then be used instead of the number %1$s or %2$s already included in the %3$s class names.', 'anrghg' ), '<code>postid-1234</code>', '<code>page-id-1234</code>', '<code>&lt;body&gt;</code>' )
		),
		anrghg_paragraph(
			'important description',
			__( 'Slugs starting with a digit or hyphen-digit are prefixed with the string configured below for easier-to-use CSS class names:', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			'small',
			'',
			'',
			'',
			'',
			$p_a_params,
			1
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'important description',
			sprintf(
				// Translators: %s: <code>_</code>.
				__( 'The suggested value is an underscore %s or an ASCII letter.', 'anrghg' ),
				'<code>_</code>'
			),
			sprintf(
				// Translators: 1: Start tag of a link to https://www.w3.org/International/questions/qa-escapes#css_identifiers. 2: End tag.
				__( 'CSS cannot have any leading ASCII digit, hyphen-digit or double hyphen unless they are %1$s escaped%2$s.', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://www.w3.org/International/questions/qa-escapes#css_identifiers" target="_blank">',
				'</a>'
			)
		)
	);
}

/**
 * Include HTML partials section callback function.
 *
 * @since 1.16.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_include_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'The content of a locally stored file is included in the page.', 'anrghg' ),
		sprintf(
			// Translators: %s: Custom HTML.
			__( 'This content may be bigger than what WordPress can save in a %s block.', 'anrghg' ),
			__( 'Custom HTML' )
		),
		__( 'Included content may be updated in bulk by replacing the files via FTP.', 'anrghg' )
	);
}

/**
 * Base directory field callback function.
 *
 * @since 1.16.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_include_base_directory_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'fullwide',
			'',
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			__( 'The start of the file path can be configured here for all relative paths.', 'anrghg' ),
			sprintf(
				// Translators: %s: Include partial.
				__( 'Absolute paths can still be input in the “%s” blocks.', 'anrghg' ),
				__( 'Include partial', 'anrghg' )
			),
			sprintf(
				// Translators: %s: /home/.
				__( 'In shared hosting, the absolute path typically starts with “%s” followed by the name of the hosting account.', 'anrghg' ),
				'/home/'
			)
		)
	);
}

/**
 * Placeholder for the classes field callback function.
 *
 * @since 1.16.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_include_classes_placeholder_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'wide',
			'',
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: 1: Additional CSS classes; 2: Advanced.
				__( 'This value can be set in the “%1$s” box in the “%2$s” section of the Block Inspector.', 'anrghg' ),
				__( 'Additional CSS classes' ),
				__( 'Advanced' )
			)
		)
	);
}

/**
 * Placeholder for the value field callback function.
 *
 * @since 1.16.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_include_value_placeholder_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'wide',
			'',
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			__( 'These placeholders may occur in 0, 1, or multiple instances in the content of the included file.', 'anrghg' )
		)
	);
}

/**
 * Security HTML filter field callback function.
 *
 * @since 1.16.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_include_html_filter_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );

	if ( ( ! is_multisite() && is_admin( wp_get_current_user() ) )
		|| ( is_multisite() && is_super_admin( wp_get_current_user() ) )
	) {

		anrghg_echo_glide_switch(
			__( 'Apply extended KSES filter', 'anrghg' ), // Label.
			__( 'The file content is filtered for security.', 'anrghg' ), // On.
			__( 'The file content remains unfiltered.', 'anrghg' ), // Off.
			$p_a_params
		);
		anrghg_echo_information(
			$p_a_params,
			anrghg_paragraph(
				'description',
				__( 'Only top level Admins can see and use this switch.', 'anrghg' )
			)
		);

	} else {

		if ( $p_a_params['val_0'] ) {
			anrghg_echo_information(
				$p_a_params,
				anrghg_paragraph(
					'description',
					__( 'Top level Admins can deactivate the KSES filter and let the included HTML unfiltered.', 'anrghg' )
				)
			);
		} else {
			anrghg_echo_information(
				$p_a_params,
				anrghg_paragraph(
					'description',
					__( 'The KSES filter is deactivated. Top level Admins can reactivate it.', 'anrghg' )
				)
			);
		}
	}
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: %s: includes/filtered.php.
				__( 'This KSES filter is documented in %s.', 'anrghg' ),
				'<code>includes/filtered.php</code>'
			)
		)
	);
}

/**
 * Excerpts section callback function.
 *
 * @since 0.68.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_excerpts_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'Excerpts generated by WordPress are not automatically fixed, due to not using shortcodes.', 'anrghg' ),
		__( 'An extra feature is required to generate auto excerpts.', 'anrghg' )
	);
}

/**
 * Clean auto excerpts field callback function.
 *
 * @since 0.68.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_clean_auto_excerpts_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Use redesigned excerpt generation', 'anrghg' ), // Label.
		__( 'Excerpts are re-generated properly.', 'anrghg' ), // On.
		__( 'Default excerpt generation applies.', 'anrghg' ), // Off.
		$p_a_params
	);
}

/**
 * Filter automatic excerpts field callback function.
 *
 * @since 0.68.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_apply_the_content_auto_excerpts_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		// Translators: %s: 'the_content'.
		sprintf( __( 'Apply filters to ‘%s’', 'anrghg' ), 'the_content' ), // Label.
		__( 'Content filters are applied.', 'anrghg' ), // On.
		__( 'The excerpt stays unfiltered.', 'anrghg' ), // Off.
		$p_a_params
	);
}

/**
 * Filter manual excerpts field callback function.
 *
 * @since 0.68.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_apply_the_content_manual_excerpts_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		// Translators: %s: 'the_content'.
		sprintf( __( 'Apply filters to ‘%s’', 'anrghg' ), 'the_content' ), // Label.
		__( 'Content filters are applied.', 'anrghg' ), // On.
		__( 'The excerpt stays unfiltered.', 'anrghg' ), // Off.
		$p_a_params
	);
}

/**
 * Thank You message section callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'A configurable text box is optionally displayed at the end of posts, and it may also display with another message at the end of pages.', 'anrghg' )
	);
	anrghg_introduction(
		'',
		sprintf(
			// Translators: %s: Author or website.
			__( 'This feature is based on code from %s', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="https://www.wpbeaverbuilder.com/creating-wordpress-plugin-easier-think/" target="_blank">'
			. 'Justin Busa'
			. '</a>'
		)
	);
}

/**
 * Basic behavior field callback function.
 *
 * @since 0.9.0
 * The 4th option is *not* a deactivation. That is why
 * the deactivation color code class `no` is not used.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '3', '2', '0' ),
			array(
				sprintf(
					// Translators: %s: ‘All Posts’, or ‘All Pages’.
					__( 'Append a message to %s only', 'anrghg' ),
					// .
					__( 'All Posts' )
				),
				sprintf(
					// Translators: 1: ‘All Posts’; 2: ‘All Pages’.
					__( 'Append one message to %1$s and another one to %2$s', 'anrghg' ),
					// .
					__( 'All Posts' ),
					__( 'All Pages' )
				),
				sprintf(
					// Translators: %s: ‘All Posts’, or ‘All Pages’.
					__( 'Append a message to %s only', 'anrghg' ),
					// .
					__( 'All Pages' )
				),
				__( 'Do not append any message by default', 'anrghg' ),
			),
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Display on home page field callback function.
 *
 * @since 0.71.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_display_on_home_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Show a message also on the home page', 'anrghg' ), // Label.
		__( 'The message displays even when a post is the home page.', 'anrghg' ), // On.
		__( 'The message is hidden on any page with home page status.', 'anrghg' ), // Off.
		$p_a_params
	);
}

/**
 * Content of post Thank You message field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_content_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			sprintf(
				// Translators: %s: the label of the ‘Template editor’.---This information is optionally collapsible or hidden.
				__( 'The message may be configured in the ‘%s’ and inserted by its name. with the same syntax, simple or complex.', 'anrghg' ),
				// Label.
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="' . $p_a_params['urls']['templt'] . '">' . __( 'Template editor', 'anrghg' ) . '</a>'
			),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The name of a template will be replaced with that template if it is alone or comes first or last, or is bracketed by delimiters as configured.', 'anrghg' )
		),
		anrghg_paragraph(
			'top description',
			sprintf(
				// Translators: %s: the name of the ‘Thank You messsage’ block.
				__( 'The message may also be configured in the Post Meta box, and multiple instances in the ‘%s’ block.', 'anrghg' ),
				// .
				__( 'Thank You message', 'anrghg' )
			)
		),
		anrghg_paragraph(
			'top description',
			// Translators: %s: the literal %s wrapped in a <code> element.
			sprintf( __( 'The optional placeholder %s inserts the post title.', 'anrghg' ), '<code>%s</code>' )
		)
	);
	echo wp_kses(
		anrghg_description_textarea(
			'medium',
			'',
			'',
			$p_a_params
		),
		$p_a_params['user']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-post-thanks p</code>' )
		)
	);
}

/**
 * Content of page Thank You message field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_content_page_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: %s: the literal %s wrapped in a <code> element.
			sprintf( __( 'The optional placeholder %s inserts the post title.', 'anrghg' ), '<code>%s</code>' )
		)
	);
	echo wp_kses(
		anrghg_description_textarea(
			'medium',
			'',
			'',
			$p_a_params
		),
		$p_a_params['user']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-page-thanks p</code>' )
		)
	);
}

/**
 * Template selection in Post Meta box field callback function.
 *
 * @since 0.71.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_select_list_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_description_textarea(
			'medium',
			__( 'Space-separated enumeration of template names', 'anrghg' ),
			anrghg_paragraph(
				true,
				__( 'Please separate template names with space or newline.', 'anrghg' )
			),
			$p_a_params
		),
		$p_a_params['user']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The templates in this list are the options of a select box in the Post Meta box.', 'anrghg' )
		)
	);
}

/**
 * Default style sheet selection in Block setting field callback function.
 *
 * @since 0.75.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_default_style_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_select_box(
			array(
				'1' => 'Style 1',
				'2' => 'Style 2',
				'3' => 'Style 3',
				'4' => 'Style 4',
				'5' => 'Style 5',
				'6' => 'Style 6',
				'7' => 'Style 7',
				'8' => 'Style 8',
				'9' => 'Style 9',
				'0' => 'Style 10',
				''  => 'No style',
			),
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This sets the default value of the Style select box in the block.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>.anrghg-thank-you.anrghg-style-1</code>' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'where the number is as selected.', 'anrghg' )
		)
	);
}

/**
 * Priority level of Thank You message field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_priority_select_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_priority_level_setting( $p_a_params );
}

/**
 * Aspect subsection callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_aspect__thank_you_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Font size field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_font_size_option_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
}

/**
 * Color field callback function.
 *
 * @since 0.70.0
 * @since 1.6.1 Field label from plural to singular for synergy with Core.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_foreground_color_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_dual_color_setting( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The color input fields display the browser’s default color picker.', 'anrghg' )
		)
	);
}

/**
 * Border field callback function.
 *
 * @since 0.74.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_border_width_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_border_setting( $p_a_params );
}

/**
 * Shadow field callback function.
 *
 * @since 0.74.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_shadow_x_offset_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_shadow_setting( $p_a_params );
}

/**
 * Padding field callback function.
 *
 * @since 0.76.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_padding_top_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_or_padding_setting(
		false,
		$p_a_params
	);
}

/**
 * Margin field callback function.
 *
 * @since 0.76.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_margin_top_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_or_padding_setting(
		true,
		$p_a_params
	);
}

/**
 * Date information section callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'Consistently with current practice, dates are link text of the permalink, and a tooltip shows the time.', 'anrghg' )
	);
	anrghg_introduction(
		'',
		sprintf(
			// Translators: %s: Author or website.
			__( 'This feature is based on code from %s', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="https://pagely.com/blog/display-post-last-updated-wordpress/" target="_blank">'
			. 'Shaun Quarton'
			. '</a>'
		)
	);
}

/**
 * Activate and scope field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Add date information', 'anrghg' ),
		__( 'Dates are added as specified below.', 'anrghg' ),
		__( 'No extra dates are added.', 'anrghg' ),
		$p_a_params
	);
	echo wp_kses(
		anrghg_checkbox_cluster(
			'dates_scope',
			anrghg_flex_div(
				anrghg_single_checkbox(
					__( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
					false,
					$p_a_params,
					1,
					false
				),
				anrghg_single_checkbox(
					__( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
					false,
					$p_a_params,
					2,
					false
				)
			),
			anrghg_flex_div(
				anrghg_single_checkbox(
					__( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
					false,
					$p_a_params,
					3,
					false
				),
				anrghg_single_checkbox(
					__( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
					false,
					$p_a_params,
					4,
					false
				)
			),
			anrghg_return_must_read_information(
				anrghg_paragraph(
					'description',
					// Translators: This information is optionally collapsible or hidden.
					__( 'For posts, the last modified date information may add below the already present published date.', 'anrghg' )
				)
			),
			anrghg_flex_div(
				anrghg_single_checkbox(
					__( 'Published' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
					false,
					$p_a_params,
					5,
					false
				),
				anrghg_single_checkbox(
					__( 'Published' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
					false,
					$p_a_params,
					6,
					false
				)
			),
			anrghg_flex_div(
				anrghg_single_checkbox(
					__( 'Published' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
					false,
					$p_a_params,
					7,
					false
				),
				anrghg_single_checkbox(
					__( 'Published' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
					false,
					$p_a_params,
					8,
					false
				)
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Chronological order field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_top_chrono_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_checkbox_cluster(
				'',
				anrghg_flex_div(
					anrghg_single_checkbox(
						__( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
						false,
						$p_a_params,
						0,
						false
					),
					anrghg_single_checkbox(
						__( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
						false,
						$p_a_params,
						1,
						false
					)
				),
				anrghg_flex_div(
					anrghg_single_checkbox(
						__( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
						false,
						$p_a_params,
						2,
						false
					),
					anrghg_single_checkbox(
						__( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
						false,
						$p_a_params,
						3,
						false
					)
				)
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Date metadata label configuration field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_uni_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'1',
				__( 'Unified', 'anrghg' ),
				$p_a_params
			),
			'<table class="text subsettings" id="unified_labels"><tbody>',
			'<tr><td colspan="2">',
			anrghg_return_must_read_information(
				anrghg_paragraph(
					'important top description',
					// Translators: %s: the literal %s wrapped in a <code> element.
					sprintf( __( 'These placeholders %s are mandatory.', 'anrghg' ), '<code>%s</code>' )
				)
			),
			'</td></tr>',
			anrghg_input_setting(
				'',
				'',
				__( 'Modified', 'anrghg' ),
				'',
				'',
				$p_a_params,
				1
			),
			anrghg_input_setting(
				'',
				'',
				__( 'Published', 'anrghg' ),
				'',
				'',
				$p_a_params,
				2
			),
			'<tr><td colspan="2">',
			anrghg_return_information(
				anrghg_paragraph(
					'description',
					// Translators: This information is optionally collapsible or hidden.
					__( 'HTML formatting is fully supported.', 'anrghg' ),
					// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
					sprintf( __( 'CSS selector: %s', 'anrghg' ), '' ),
					'<br /><code>div.anrghg-dates-post-top span a</code>',
					'<br /><code>div.anrghg-dates-page-top span a</code>',
					'<br /><code>div.anrghg-dates-post-end span a</code>',
					'<br /><code>div.anrghg-dates-page-end span a</code>'
				)
			),
			'</td></tr></tbody></table>',
			anrghg_discrete_radio_button(
				1,
				'0',
				__( 'Differentiated', 'anrghg' ),
				$p_a_params
			)
		),
		$p_a_params['ok']
	);
	echo wp_kses( '<noscript>', $p_a_params['ok'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'important description',
			// Translators: This information is displayed only when JavaScript is turned off.
			__( 'As JavaScript is currently turned off in your browser, please make sure that the label configuration field list displayed below is up-to-date.', 'anrghg' )
		)
	);
	echo wp_kses( '</noscript>', $p_a_params['ok'] );
}

/**
 * Date metadata label post top modified field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_post_top_modif_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-post-top span a</code>' )
		)
	);
}

/**
 * Date metadata label page top modified field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_page_top_modif_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-page-top span a</code>' )
		)
	);
}

/**
 * Date metadata label post top published field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_post_top_publi_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-post-top span a</code>' )
		)
	);
}

/**
 * Date metadata label page top published field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_page_top_publi_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-page-top span a</code>' )
		)
	);
}

/**
 * Date metadata label post end modified field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_post_end_modif_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-post-end span a</code>' )
		)
	);
}

/**
 * Date metadata label page end modified field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_page_end_modif_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-page-end span a</code>' )
		)
	);
}

/**
 * Date metadata label post end publishd field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_post_end_publi_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-post-end span a</code>' )
		)
	);
}

/**
 * Date metadata label page end published field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_label_page_end_publi_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>div.anrghg-dates-page-end span a</code>' )
		)
	);
}

/**
 * ‘Published first’ information prefill field callback function.
 *
 * @since 0.36.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_published_first_top_prefill_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'',
			__( 'Top' ),
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['user']
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			__( 'Bottom' ),
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['user']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Whether the information is displayed on public pages depends on whether the input field value differs from the initial prefill, saved to the post metadata alongside.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'HTML formatting is fully supported.', 'anrghg' )
		)
	);
}

/**
 * Priority level of date metadata field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_priority_select_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_priority_level_setting( $p_a_params );
}

/**
 * Aspect at post top (Last modified and published dates) section callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_post_top__dates_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		sprintf(
			// Translators: %s: ‘Published first’ information.
			__( 'Any of these 4 subsections may be required also to format %s added depending on Post Meta data.', 'anrghg' ),
			// .
			__( '‘Published first’ information', 'anrghg' )
		)
	);
}

/**
 * Text align field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_top_text_align_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_text_align( $p_a_params ),
		$p_a_params['ok']
	);
}

/**
 * Margin field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_top_margin_above_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_above_below_setting(
		__( 'Pixels (px)' ),
		$p_a_params
	);
}

/**
 * Font size field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_top_font_size_option_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
}

/**
 * Label color field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_top_color_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_single_color_setting(
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Aspect at page top (Last modified and published dates) section callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_page_top__dates_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Text align field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_top_text_align_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_text_align(
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Margin field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_top_margin_above_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_above_below_setting(
		__( 'Pixels (px)' ),
		$p_a_params
	);
}

/**
 * Font size field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_top_font_size_option_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
}

/**
 * Label color field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_top_color_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_single_color_setting(
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Aspect at post end (Last modified and published dates) section callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_post_end__dates_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Text align field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_end_text_align_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_text_align(
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Margin field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_end_margin_above_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_above_below_setting(
		__( 'Pixels (px)' ),
		$p_a_params
	);
}

/**
 * Font size field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_end_font_size_option_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
}

/**
 * Label color field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_post_end_color_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_single_color_setting(
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Aspect at page end (Last modified and published dates) section callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_page_end__dates_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Text align field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_end_text_align_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_text_align(
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Margin field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_end_margin_above_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_above_below_setting(
		__( 'Pixels (px)' ),
		$p_a_params
	);
}

/**
 * Font size field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_end_font_size_option_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
}

/**
 * Label color field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_dates_page_end_color_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_single_color_setting(
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Date meta tags section callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_date_meta_tags_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		sprintf(
			// Translators: %s: 'Yoast SEO' linked to the plugin in the WordPress plugin directory.
			__( 'These tags may be parsed by bibliography software and are useful in case structured data is not added already for Search Engine Optimization, for which a plugin like %s is highly recommended.', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">Yoast SEO</a>'
		)
	);
	anrghg_introduction(
		'',
		sprintf(
			// Translators: %s: Author or website.
			__( 'This feature is based on code from %s', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="https://developer.wordpress.org/reference/hooks/wp_head/" target="_blank">'
			. 'Aurovrata Venet'
			. '</a>'
		)
	);
}

/**
 * Activate date meta tags field callback function.
 *
 * @since 0.9.0
 * @since 0.24.8 Checkbox-based vertical glide switch.
 * @since 0.34.0 Checkboxes for dates and formats instead of extra radio buttons.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_date_meta_tags_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Add date meta tags', 'anrghg' ),
		__( 'The date meta tags selected below are added.', 'anrghg' ),
		__( 'No extra meta tags are added.', 'anrghg' ),
		$p_a_params
	);
	echo wp_kses(
		anrghg_checkbox_cluster(
			'date_meta_tag_checkboxes',
			anrghg_flex_div(
				anrghg_single_checkbox(
					__( 'Date of last edit', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'common protocol', 'anrghg' ),
					false,
					$p_a_params,
					1,
					false
				),
				anrghg_single_checkbox(
					__( 'Date of last edit', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Open Graph protocol', 'anrghg' ),
					false,
					$p_a_params,
					2,
					false
				)
			),
			anrghg_flex_div(
				anrghg_single_checkbox(
					__( 'Date of publication', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'common protocol', 'anrghg' ),
					false,
					$p_a_params,
					3,
					false
				),
				anrghg_single_checkbox(
					__( 'Date of publication', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Open Graph protocol', 'anrghg' ),
					false,
					$p_a_params,
					4,
					false
				)
			),
			anrghg_return_must_read_information(
				anrghg_paragraph(
					'description',
					__( 'Preview' )
				),
				anrghg_paragraph(
					'description',
					'<span id="pre_meta_common_published"><code>&lt;meta name="date" content="' . current_time( 'Y-m-d\TH:i:sO' ) . '" /&gt;</code><br /></span>',
					'<span id="pre_meta_common_last_edit"><code>&lt;meta name="last-modified" content="' . current_time( 'Y-m-d\TH:i:sO' ) . '" /&gt;</code><br /></span>',
					'<span id="pre_meta_open_g_published"><code>&lt;meta property="article:published_time" content="' . current_time( 'Y-m-d\TH:i:sO' ) . '" /&gt;</code><br /></span>',
					'<span id="pre_meta_open_g_last_edit"><code>&lt;meta property="article:modified_time" content="' . current_time( 'Y-m-d\TH:i:sO' ) . '" /&gt;</code><br /></span>'
				)
			)
		),
		$p_a_params['ok']
	);
}
