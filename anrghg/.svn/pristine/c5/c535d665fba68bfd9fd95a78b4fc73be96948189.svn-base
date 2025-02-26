<?php
/**
 * Options page 2: Settings callback functions part 4.
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
 * Anchor tooltips (Notes and sources) section callback function.
 *
 * @since 0.48.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_tooltips__notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'These tooltips work without JavaScript and are fully AMP compatible.', 'anrghg' )
	);
}

/**
 * Activate field callback function.
 *
 * @since 0.35.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchor_tooltips_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Display tooltips on complement anchors', 'anrghg' ),
		__( 'Complements show in tooltips on hovering their anchor.', 'anrghg' ),
		__( 'No tooltips are added to anchors.', 'anrghg' ),
		$p_a_params
	);
}

/**
 * Display tooltips on tap field callback function.
 *
 * @since 0.70.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_display_anchor_tooltips_on_tap_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Display tooltips on tapping or clicking the anchor', 'anrghg' ), // Label.
		__( 'Tooltips on tap.', 'anrghg' ), // On.
		__( 'Tooltips on hover.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This behavior is not recommended given the ability to hover on mobiles by tap-and-hold.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The simultaneous display of the contextual menu is an undesired side effect.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'This feature works by HTML and CSS only, without JavaScript.', 'anrghg' )
		)
	);
}

/**
 * Tooltip end delimiter field callback function.
 *
 * @since 0.40.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_tooltip_delimiter_preset_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'-1',
				// Translators: %s: Delimiter code.
				sprintf( __( 'Easy input %s', 'anrghg' ), '<code>' . esc_attr( $p_a_params['val_1'] ) . '</code>' ),
				$p_a_params
			),
			anrghg_save_preset( $p_a_params, 1 ),
			anrghg_discrete_radio_button(
				1,
				'1',
				// Translators: %s: Delimiter code.
				sprintf( __( 'Unambiguous %s', 'anrghg' ), '<code>' . esc_attr( $p_a_params['val_2'] ) . '</code>' ),
				$p_a_params
			),
			anrghg_save_preset( $p_a_params, 2 ),
			anrghg_discrete_radio_button(
				2,
				'0',
				__( 'Freely configured', 'anrghg' ),
				$p_a_params,
				0,
				'si box',
				anrghg_input_setting(
					'delims',
					'',
					'',
					'',
					'',
					$p_a_params,
					3
				)
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'A dedicated tooltip text is optional.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'There is no problem for tooltips to extensively display complements of any length.', 'anrghg' )
		)
	);
}

/**
 * List link delimiters field callback function.
 *
 * @since 0.40.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_list_link_delimiter_preset_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'-1',
				// Translators: %s: Delimiter code.
				sprintf( __( 'Easy input %s', 'anrghg' ), '<code>' . esc_attr( $p_a_params['val_1'] ) . '</code> … <code>' . esc_attr( $p_a_params['val_2'] ) . '</code>' ),
				$p_a_params
			),
			anrghg_save_preset( $p_a_params, 1 ),
			anrghg_save_preset( $p_a_params, 2 ),
			anrghg_discrete_radio_button(
				1,
				'1',
				// Translators: %s: Delimiter code.
				sprintf( __( 'Unambiguous %s', 'anrghg' ), '<code>' . esc_attr( $p_a_params['val_3'] ) . '</code> … <code>' . esc_attr( $p_a_params['val_4'] ) . '</code>' ),
				$p_a_params
			),
			anrghg_save_preset( $p_a_params, 3 ),
			anrghg_save_preset( $p_a_params, 4 ),
			anrghg_discrete_radio_button(
				2,
				'0',
				__( 'Freely configured', 'anrghg' ),
				$p_a_params,
				0,
				'si box',
				anrghg_input_setting(
					'delims',
					'',
					'',
					'',
					'',
					$p_a_params,
					5
				),
				'<span class="field-ellipsis">…</span>',
				anrghg_input_setting(
					'delims',
					'',
					'',
					'',
					'',
					$p_a_params,
					6
				)
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Optional links from the tooltip to the related list item may be useful in dedicated tooltip texts.', 'anrghg' )
		)
	);
}

/**
 * Read more link in dedicated note tooltips field callback function.
 *
 * @since 0.71.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_tooltip_list_link_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'0',
				__( 'Only the anchor is the link', 'anrghg' ),
				$p_a_params,
				0,
				'no'
			),
			anrghg_discrete_radio_button(
				1,
				'1',
				anrghg_input_setting(
					'medium',
					'',
					'',
					'',
					'',
					$p_a_params,
					1
				),
				$p_a_params,
				0,
				'si box'
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Read more link in dedicated source tooltips field callback function.
 *
 * @since 0.70.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_source_tooltip_list_link_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'0',
				__( 'Only the anchor is the link', 'anrghg' ),
				$p_a_params,
				0,
				'no'
			),
			anrghg_discrete_radio_button(
				1,
				'1',
				anrghg_input_setting(
					'medium',
					'',
					'',
					'',
					'',
					$p_a_params,
					1
				),
				$p_a_params,
				0,
				'si box'
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'These texts are appended to the content of dedicated tooltips.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The dedicated tooltip text is not shown in the list.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'By default, tooltips show untruncated text of any length.', 'anrghg' )
		)
	);
}

/**
 * Generic tooltips field callback function.
 *
 * @since 0.64.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_generic_note_tooltip_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			array(),
			anrghg_glide_switch(
				sprintf(
					// Translators: %s: Notes or Sources.
					__( 'Use generic tooltips for %s', 'anrghg' ), // Label.
					// .
					__( 'Notes', 'anrghg' )
				),
				sprintf(
					// Translators: %s: Notes or Sources.
					__( 'Anchor tooltips of %s are as configured below', 'anrghg' ), // On.
					// .
					__( 'Notes', 'anrghg' )
				),
				sprintf(
					// Translators: %s: Notes or Sources.
					__( 'Anchor tooltips of %s reflect the actual content.', 'anrghg' ), // Off.
					// .
					__( 'Notes', 'anrghg' )
				),
				$p_a_params
			),
			anrghg_description_textarea(
				'medium',
				__( 'Notes', 'anrghg' ),
				'',
				$p_a_params,
				1
			),
			anrghg_glide_switch(
				sprintf(
					// Translators: %s: Notes or Sources.
					__( 'Use generic tooltips for %s', 'anrghg' ), // Label.
					// .
					__( 'Sources', 'anrghg' )
				),
				sprintf(
					// Translators: %s: Notes or Sources.
					__( 'Anchor tooltips of %s are as configured below', 'anrghg' ), // On.
					// .
					__( 'Sources', 'anrghg' )
				),
				sprintf(
					// Translators: %s: Notes or Sources.
					__( 'Anchor tooltips of %s reflect the actual content.', 'anrghg' ), // Off.
					// .
					__( 'Sources', 'anrghg' )
				),
				$p_a_params,
				2
			),
			anrghg_description_textarea(
				'medium',
				__( 'Sources', 'anrghg' ),
				'',
				$p_a_params,
				3
			)
		),
		$p_a_params['user']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'A generic tooltip as requested has a predefined text with a dynamic link to the related list item.', 'anrghg' )
		)
	);
}

/**
 * Tooltip position subsection callback function.
 *
 * @since 1.8.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_tooltip_position__notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Maximum width field callback function.
 *
 * @since 0.35.0
 * @since 1.8.0 Reorder.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_small_anchor_tooltip_maximum_width_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				1000,
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
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Applies to classic tooltips and desktop page layout with a sidebar/margin to hang into.', 'anrghg' )
		)
	);
}

/**
 * Horizontal offset field callback function.
 *
 * @since 1.8.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_small_anchor_tooltip_horizontal_edge_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			array(),
			anrghg_adjacent_radio_buttons(
				array( 'left', 'right' ),
				array(
					__( 'Left' ),
					__( 'Right' ),
				),
				$p_a_params
			),
			anrghg_input_setting(
				array(
					-999,
					999,
					1,
					'small',
				),
				'',
				'',
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				1
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Vertical offset field callback function.
 *
 * @since 1.8.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_small_anchor_tooltip_vertical_edge_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			array(),
			anrghg_adjacent_radio_buttons(
				array( 'top', 'bottom' ),
				array(
					__( 'Top' ),
					__( 'Bottom' ),
				),
				$p_a_params
			),
			anrghg_input_setting(
				array(
					-999,
					999,
					1,
					'small',
				),
				'',
				'',
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				1
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Length breakpoint field callback function.
 *
 * @since 0.35.0
 * @since 1.8.0 Reorder.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchor_tooltip_str_length_breakpoint_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				PHP_INT_MAX,
				1,
				'medium',
			),
			'',
			'',
			__( 'characters', 'anrghg' ),
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Up to this length, display is classic; longer texts display in full-width tooltips.', 'anrghg' )
		)
	);
}

/**
 * Mobile breakpoint field callback function.
 *
 * @since 0.35.0
 * @since 1.8.0 Reorder.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_small_tooltip_mobile_breakpoint_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'On mobiles, these tooltips display full-width.', 'anrghg' )
		)
	);
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
 * Scrollable field callback function.
 *
 * @since 1.8.0
 * Max height: @since 0.35.0.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_scrollable_anchor_tooltips_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			array(),
			anrghg_glide_switch(
				__( 'Make long tooltips scrollable', 'anrghg' ), // Label.
				__( 'Tooltips may become scrollable and crop nested tooltips.', 'anrghg' ), // On.
				__( 'Height and nested tooltips are not cropped.', 'anrghg' ), // Off.
				$p_a_params
			),
			'<table class="text subsettings"><tbody>',
			anrghg_input_setting(
				array(
					0,
					1000,
					1,
					'small',
				),
				'',
				__( 'Maximum height', 'anrghg' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				1
			),
			'</tbody></table>'
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The maximum height applies to scrollable fullwidth anchor tooltips and to backlink tooltips.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'In scrollable tooltips, nested tooltips near the border are unable to display.', 'anrghg' )
		)
	);
}

/**
 * Tooltip aspect subsection callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_tooltip_aspect__notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Timing field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchor_tooltip_fade_in_delay_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_timing_setting( $p_a_params );
}

/**
 * Tooltip Font size field callback function.
 *
 * @since 1.8.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchor_tooltip_font_size_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				99,
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
 * Tooltip Line height field callback function.
 *
 * @since 1.8.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchor_tooltip_line_height_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				9,
				0.05,
				'small',
			),
			'',
			'',
			// Translators: %s: ‘Font size’.
			sprintf( __( 'times the %s', 'anrghg' ), __( 'Font size' ) ),
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Color field callback function.
 *
 * @since 0.74.0
 * @since 1.6.1 Field label from plural to singular for synergy with Core.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchor_tooltip_foreground_color_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_dual_color_setting( $p_a_params );
}

/**
 * Border field callback function.
 *
 * @since 0.74.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchor_tooltip_border_width_cb( $p_a_params ) {
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
function anrghg_anchor_tooltip_shadow_x_offset_cb( $p_a_params ) {
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
function anrghg_anchor_tooltip_padding_top_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_or_padding_setting(
		false,
		$p_a_params
	);
}

/**
 * Backlinks (Notes and sources) section callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backlinks__notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'Part of the settings are in common with anchor tooltips.', 'anrghg' )
	);
}

/**
 * Backlink symbol field callback function.
 *
 * @since 0.65.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_number_backlink_symbol_display_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '-1', '0' ),
			array(
				sprintf(
					// Translators: %s: ‘after’ or ‘before’.
					__( '%s the number', 'anrghg' ),
					// .
					_x( 'After', '%s the number', 'anrghg' )
				),
				sprintf(
					// Translators: %s: ‘after’ or ‘before’.
					__( '%s the number', 'anrghg' ),
					// .
					_x( 'Before', '%s the number', 'anrghg' )
				),
				__( 'No symbol around the number', 'anrghg' ),
			),
			$p_a_params,
			0,
			2
		),
		$p_a_params['ok']
	);
	echo wp_kses(
		anrghg_symbol_select_input(
			'anrghg_backlink_symbol_select_box',
			'',
			'',
			$p_a_params,
			1
		),
		$p_a_params['ok']
	);
}

/**
 * Trailing backlink field callback function.
 *
 * @since 0.65.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_tail_backlink_symbol_display_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Display a backlink at the end of the text', 'anrghg' ), // Label.
		__( 'The symbol configured below is appended to the text.', 'anrghg' ), // On.
		__( 'The backlink can only be around the number.', 'anrghg' ), // Off.
		$p_a_params
	);
	echo wp_kses(
		anrghg_symbol_select_input(
			'anrghg_backlink_symbol_select_box',
			'',
			'',
			$p_a_params,
			1,
			anrghg_paragraph(
				'description',
				// Translators: This information is optionally collapsible or hidden.
				__( 'Backlinks from the complement list entries to the complement anchors are provided for convenience.', 'anrghg' ),
				// Translators: This information is optionally collapsible or hidden.
				__( 'Since hard links are used for better interoperability, backlinks are not required for functionality.', 'anrghg' )
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Plain backlink tooltips field callback function.
 *
 * @since 0.51.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backlink_plain_tooltip_mode_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'2',
				__( 'Verbose', 'anrghg' ),
				$p_a_params,
				0,
				'si box',
				anrghg_input_setting( '', '', '', '', '', $p_a_params, 1 )
			),
			anrghg_discrete_radio_button(
				1,
				'1',
				__( 'Symbolic', 'anrghg' ),
				$p_a_params,
				0,
				'si box',
				anrghg_input_setting( '', '', '', '', '', $p_a_params, 2 )
			),
			anrghg_discrete_radio_button(
				2,
				'0',
				__( 'No plain tooltips on backlinks', 'anrghg' ),
				$p_a_params,
				0,
				'no'
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Rich backlink tooltips field callback function.
 *
 * @since 0.51.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backlink_rich_tooltip_first_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			array(),
			anrghg_input_setting(
				'fullwide',
				__( 'First part', 'anrghg' ),
				'',
				'',
				__( 'Leave empty to display the backlinks only.', 'anrghg' ),
				$p_a_params
			),
			anrghg_input_setting(
				'fullwide',
				__( 'Last part', 'anrghg' ),
				'',
				'',
				__( 'Leave empty to display the backlinks only.', 'anrghg' ),
				$p_a_params,
				1
			)
		),
		$p_a_params['user']
	);
	anrghg_return_information(
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This tooltip enumerating the numbers of the combined complements is mandatory on hovering the number of a combined complement.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The display is purely CSS.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'HTML formatting is fully supported.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Leave empty to display the backlinks only.', 'anrghg' )
		)
	);
}

/**
 * Backlink tooltip aspect subsection callback function.
 *
 * @since 1.6.1
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backlink_tooltip_aspect__notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Backlink tooltip timing field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backlink_tooltip_fade_in_delay_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_timing_setting( $p_a_params );
}

/**
 * Color field callback function.
 *
 * @since 0.74.0
 * @since 1.6.1 Field label from plural to singular for synergy with Core.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backlink_tooltip_foreground_color_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_dual_color_setting( $p_a_params );
}

/**
 * Border field callback function.
 *
 * @since 0.74.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backlink_tooltip_border_width_cb( $p_a_params ) {
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
function anrghg_backlink_tooltip_shadow_x_offset_cb( $p_a_params ) {
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
function anrghg_backlink_tooltip_padding_top_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_margin_or_padding_setting(
		false,
		$p_a_params
	);
}

/**
 * Lists (Notes and sources) section callback function.
 *
 * @since 0.55.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_lists__notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Accessibility field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_list_number_aria_label_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'ARIA labels for list numbers', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			__( 'Notes', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			__( 'Sources', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params,
			1
		),
		$p_a_params['ok']
	);
}

/**
 * URL readability field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_url_id_prefix_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Prefixes for identifiers', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'May be empty.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			'small',
			__( 'Notes', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	echo wp_kses(
		anrghg_input_setting(
			'small',
			__( 'Sources', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params,
			1
		),
		$p_a_params['ok']
	);
}

/**
 * List group heading field callback function.
 *
 * @since 0.34.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_list_grouping_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Group note and source lists under a top-level heading', 'anrghg' ),
		__( 'The heading configured below displays on top of instances with both notes and sources.', 'anrghg' ),
		__( 'The lists have only their own label each.', 'anrghg' ),
		$p_a_params
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			__( 'List group label', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params,
			1
		),
		$p_a_params['user']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This label may be marked up as a heading at the same level as the top-level subheading of the post or section, but at least level 5.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'HTML formatting is fully supported.', 'anrghg' )
		)
	);
}

/**
 * Group heading element field callback function.
 *
 * @since 0.65.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_list_group_heading_element_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				7,
				1,
				'tiny',
			),
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
			// Translators: This information is optionally collapsible or hidden.
			__( '0 means the heading level is determined algorithmically.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( '1 through 6 are the available heading levels.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( '7 stands for a non-heading element, a div for instance.', 'anrghg' )
		),
		anrghg_paragraph(
			' important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'For SEO, it is recommended not to use the heading one level in the article body.', 'anrghg' )
		)
	);
}

/**
 * Group heading font size field callback function.
 *
 * @since 0.64.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_list_group_heading_font_size_option_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: 1.5em.---This information is optionally collapsible or hidden.
			sprintf( __( 'For a non-heading label, the fallback size is %s.', 'anrghg' ), '1.5em' )
		)
	);
}

/**
 * List label element field callback function.
 *
 * @since 0.65.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_list_label_element_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				7,
				1,
				'tiny',
			),
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
			// Translators: This information is optionally collapsible or hidden.
			__( '0 means the heading level is determined algorithmically.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( '1 through 6 are the available heading levels.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( '7 stands for a non-heading element, a div for instance.', 'anrghg' )
		),
		anrghg_paragraph(
			' important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'For SEO, it is recommended not to use the heading one level in the article body.', 'anrghg' )
		)
	);
}

/**
 * List label font size field callback function.
 *
 * @since 0.64.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_list_label_font_size_opt_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: 1.5em.---This information is optionally collapsible or hidden.
			sprintf( __( 'For a non-heading label, the fallback size is %s.', 'anrghg' ), '1.5em' )
		)
	);
}

/**
 * Note list labels field callback function.
 *
 * @since 0.34.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_list_label_aria_label_cb( $p_a_params ) {
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
					__( 'This option is also configurable per instance in the Post Meta box, in the block or block inspector, in the positioner code arguments.', 'anrghg' ),
					// Translators: This information is optionally collapsible or hidden.
					__( 'HTML formatting is fully supported.', 'anrghg' )
				)
			),
			anrghg_input_setting(
				'',
				// Translators: %s: Expandable acronym ARIA.
				sprintf( __( '%s label, used if label is empty', 'anrghg' ), anrghg_expandable_aria() ),
				'',
				'',
				'',
				$p_a_params
			),
			anrghg_input_setting(
				'',
				_x( 'Plural', 'Grammatical number', 'anrghg' ),
				'',
				'',
				'',
				$p_a_params,
				1
			),
			anrghg_input_setting(
				'',
				_x( 'Dual', 'Grammatical number', 'anrghg' ),
				'',
				'',
				__( 'If empty, the plural form is used.', 'anrghg' ),
				$p_a_params,
				2
			),
			anrghg_input_setting(
				'',
				_x( 'Singular', 'Grammatical number', 'anrghg' ),
				'',
				'',
				__( 'If empty, the plural form is used.', 'anrghg' ),
				$p_a_params,
				3
			)
		),
		$p_a_params['user']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'These labels above and below may be marked up as heading at one level below the group heading level, or at the same level as the top-level subheading of the post or section, but at least level 6.', 'anrghg' )
		)
	);
}

/**
 * Source list labels field callback function.
 *
 * @since 0.34.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_source_list_label_aria_label_cb( $p_a_params ) {
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
					__( 'This option is also configurable per instance in the Post Meta box, in the block or block inspector, in the positioner code arguments.', 'anrghg' ),
					// Translators: This information is optionally collapsible or hidden.
					__( 'HTML formatting is fully supported.', 'anrghg' )
				)
			),
			anrghg_input_setting(
				'',
				// Translators: %s: Expandable acronym ARIA.
				sprintf( __( '%s label, used if label is empty', 'anrghg' ), anrghg_expandable_aria() ),
				'',
				'',
				'',
				$p_a_params
			),
			anrghg_input_setting(
				'',
				_x( 'Plural', 'Grammatical number', 'anrghg' ),
				'',
				'',
				'',
				$p_a_params,
				1
			),
			anrghg_input_setting(
				'',
				_x( 'Dual', 'Grammatical number', 'anrghg' ),
				'',
				'',
				__( 'If empty, the plural form is used.', 'anrghg' ),
				$p_a_params,
				2
			),
			anrghg_input_setting(
				'',
				_x( 'Singular', 'Grammatical number', 'anrghg' ),
				'',
				'',
				__( 'If empty, the plural form is used.', 'anrghg' ),
				$p_a_params,
				3
			)
		),
		$p_a_params['user']
	);
}

/**
 * Note list layout options field callback function.
 *
 * @since 0.28.0
 * Initially unified with source lists.
 * @since 0.30.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_list_layout_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '2', '3' ),
			array(
				__( 'Single column', 'anrghg' ),
				sprintf(
					// Translators: %s: ‘except on mobiles’.
					__( 'Two columns, %s', 'anrghg' ),
					// .
					__( 'except on mobiles', 'anrghg' )
				),
				sprintf(
					// Translators: %s: ‘except on mobiles’.
					__( 'Three columns, %s', 'anrghg' ),
					// .
					__( 'except on mobiles', 'anrghg' )
				),
			),
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Source list layout options field callback function.
 *
 * @since 0.30.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_source_list_layout_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '2', '3' ),
			array(
				__( 'Single column', 'anrghg' ),
				sprintf(
					// Translators: %s: ‘except on mobiles’.
					__( 'Two columns, %s', 'anrghg' ),
					// .
					__( 'except on mobiles', 'anrghg' )
				),
				sprintf(
					// Translators: %s: ‘except on mobiles’.
					__( 'Three columns, %s', 'anrghg' ),
					// .
					__( 'except on mobiles', 'anrghg' )
				),
			),
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Collapsible behavior and collapsed state field callback function.
 *
 * @since 0.50.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_list_collapsing_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	$l_a_values     = array( '1', '-1', '0' );
	$l_a_ui_strings = array(
		__( 'Collapsed', 'anrghg' ),
		__( 'Expanded', 'anrghg' ),
		__( 'Uncollapsible', 'anrghg' ),
	);
	echo wp_kses(
		anrghg_fieldset(
			array(
				'',
				__( 'Notes', 'anrghg' ),
			),
			'top',
			$p_a_params,
			anrghg_adjacent_radio_buttons(
				$l_a_values,
				$l_a_ui_strings,
				$p_a_params,
				0,
				-1,
				false
			),
			anrghg_single_checkbox(
				__( 'Display lists in full length on clicking any anchor.', 'anrghg' ),
				true,
				$p_a_params,
				1
			)
		),
		$p_a_params['ok']
	);

	echo wp_kses(
		anrghg_fieldset(
			array(
				'',
				__( 'Sources', 'anrghg' ),
			),
			'top',
			$p_a_params,
			anrghg_adjacent_radio_buttons(
				$l_a_values,
				$l_a_ui_strings,
				$p_a_params,
				2,
				-1,
				false
			),
			anrghg_single_checkbox(
				__( 'Display lists in full length on clicking any anchor.', 'anrghg' ),
				true,
				$p_a_params,
				3
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'When ‘ibid.’ notation is used, expanding full lists is preferred.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The display may be uncollapsible or collapsible, and if collapsible, either collapsed or expanded at page load.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'This option is also configurable per instance in the block or block inspector.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			__( 'Collapsed complement lists may display only the target complement.', 'anrghg' ),
			__( 'Expanding by clicking anything else than the twistie or label involves JavaScript but is AMP compatible.', 'anrghg' )
		)
	);
}

/**
 * Footer deferral of lists field callback function.
 *
 * @since 0.26.0
 * Setting to activate footer deferral globally or per post, or deactivate.
 * @since 0.30.0
 * Only two states, as post configuration must not be overridden.
 *
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_list_footer_deferral_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '0' ),
			array(
				__( 'Defer to footer', 'anrghg' ),
				__( 'Display in article', 'anrghg' ),
			),
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This configuration can be overridden on a per-post or per-instance basis.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'By default, there is no way to insert anything in the footer, only below the footer.', 'anrghg' ),
			// Translators: %s: the function name `wp_footer()`.---This information is optionally collapsible or hidden.
			sprintf( __( 'The classic way to insert content in the footer is by moving %s to the appropriate position while editing a child theme.', 'anrghg' ), '<code>wp_footer()</code>' )
		)
	);
}

/**
 * Automatic positioning in the footer field callback function.
 *
 * @since 0.26.0
 * Setting to activate output buffering with notice that PHP 7.3 requires zlib extension.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_list_output_buffer_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_return_must_read_information(
			anrghg_paragraph(
				'important top description',
				__( 'This facility is not AMP compatible.', 'anrghg' ),
				__( 'For AMP, please edit the child theme footer instead.', 'anrghg' )
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_glide_switch(
		__( 'Activate output buffering to automatically position complement lists in the footer', 'anrghg' ),
		__( 'An output buffer will be started for editing the footer.', 'anrghg' ),
		__( 'Output buffering is deactivated for this purpose.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: 1: the <footer> tag; 2: the code `id="footer"`.---This information is optionally collapsible or hidden.
			sprintf( __( 'Output buffering is a chance for moving the lists from below the footer to a best-guess position in the footer, right after the last opening %1$s tag or, if absent, after the element with %2$s.', 'anrghg' ), '<code>&lt;footer&gt;</code>', '<code>id="footer"</code>' )
		),
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'If using PHP 7.3, please be aware that the distribution may be lacking the zlib extension, triggering a notice.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This output buffer will be used only if complement lists may be inserted below the footer.', 'anrghg' )
		)
	);
}

/**
 * Display link URL as visible text in complement lists field callback function.
 *
 * @since 0.30.0
 * @since 0.35.0 Unified, extended.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_display_urls_note_list_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_glide_switch(
				sprintf(
					// Translators: %s: ’Notes’ or ‘Sources’.
					__( 'Expand URLs in lists of %s', 'anrghg' ),
					// .
					__( 'Notes', 'anrghg' )
				),
				sprintf(
					// Translators: 1, 2: the anchor element start and end tags; 3: the parenthesized URL after a leading space.
					__( '“Complement with %1$slink text%2$s” becomes “Complement with %1$slink text%2$s%3$s”.', 'anrghg' ),
					'<a'
					. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
					. ' href="https://example.net" target="_blank">',
					'</a>',
					' (https://example.net)'
				),
				sprintf(
					// Translators: 1, 2: the anchor element start and end tags.
					__( '“Complement with %1$slink text%2$s” stays “Complement with %1$slink text%2$s”.', 'anrghg' ),
					'<a'
					. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
					. ' href="https://example.net" target="_blank">',
					'</a>'
				),
				$p_a_params
			),
			anrghg_glide_switch(
				sprintf(
					// Translators: %s: ’Notes’ or ‘Sources’.
					__( 'Expand URLs in lists of %s', 'anrghg' ),
					// .
					__( 'Sources', 'anrghg' )
				),
				sprintf(
					// Translators: 1, 2: the anchor element start and end tags; 3: the parenthesized URL after a leading space.
					__( '“Complement with %1$slink text%2$s” becomes “Complement with %1$slink text%2$s%3$s”.', 'anrghg' ),
					'<a'
					. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
					. ' href="https://example.net" target="_blank">',
					'</a>',
					' (https://example.net)'
				),
				sprintf(
					// Translators: 1, 2: the anchor element start and end tags.
					__( '“Complement with %1$slink text%2$s” stays “Complement with %1$slink text%2$s”.', 'anrghg' ),
					'<a'
					. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
					. ' href="https://example.net" target="_blank">',
					'</a>'
				),
				$p_a_params,
				1
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The examples assume that display style 1 is selected below.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_fieldset(
			__( 'Display style', 'anrghg' ),
			'',
			$p_a_params,
			anrghg_adjacent_radio_buttons(
				array( '1', '0' ),
				array(
					__( '(1) Selectable, and not hyperlinked', 'anrghg' ),
					__( '(2) Extending the hyperlink, and unselectable', 'anrghg' ),
				),
				$p_a_params,
				2,
				-1,
				false
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'We recommend real text after the anchor as in 1, not extending the link text with a CSS pseudo-element as in 2.', 'anrghg' )
		),
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'In display style 2, the URL is displayed in link color consistently.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: %s: CSS code like `div.anrghg-dates-post-top span a`.---This information is optionally collapsible or hidden.
			sprintf( __( 'CSS selector: %s', 'anrghg' ), '<code>.anrghg-complement-list-content a[href^=http]::after</code>' )
		)
	);
}

/**
 * Reference list section callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_references_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'This standalone Reference list is not linked to the content.', 'anrghg' ),
		sprintf(
			// Translators: 1: ‘Reference list’; 2: ‘Gutenberg blocks’.
			__( 'To use this feature, please activate the ‘%1$s’ block in the ‘%2$s’ setting.', 'anrghg' ),
			// .
			__( 'Reference list', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="#id_anrghg_thank_you_block">' . __( 'Gutenberg blocks', 'anrghg' ) . '</a>'
		),
		sprintf(
			// Translators: %s: ‘Notes and sources’.
			__( 'For inline references, please use the ‘%s’ feature instead.', 'anrghg' ),
			// .
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="#notes_and_sources">' . __( 'Notes and sources', 'anrghg' ) . '</a>'
		)
	);
}

/**
 * Accessibility field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_aria_label_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: %s: the expandable acronym ARIA.---This information is optionally collapsible or hidden.
			sprintf( __( '%s labels', 'anrghg' ), anrghg_expandable_aria() )
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			__( 'For list heading if empty', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			sprintf(
				// Translators: %s: ‘The placeholder %s is mandatory’.
				__( 'For lists items (%s)', 'anrghg' ),
				// Translators: %s: the literal %s wrapped in a <code> element.
				sprintf( __( 'The placeholder %s is mandatory.', 'anrghg' ), '<code>%s</code>' )
			),
			'',
			'',
			'',
			$p_a_params,
			1
		),
		$p_a_params['ok']
	);
}

/**
 * List label field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_label_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
}

/**
 * List label element field callback function.
 *
 * @since 0.70.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_label_element_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				7,
				1,
				'tiny',
			),
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
			// Translators: This information is optionally collapsible or hidden.
			__( 'A 0 means the heading level is determined algorithmically.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( '1 through 6 are the available heading levels.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( '7 stands for a non-heading element, a div for instance.', 'anrghg' )
		),
		anrghg_paragraph(
			' important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'For SEO, it is recommended not to use the heading one level in the article body.', 'anrghg' )
		)
	);
}

/**
 * List label font size field callback function.
 *
 * @since 0.70.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_label_font_size_option_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_font_size_setting( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: 1.5em.---This information is optionally collapsible or hidden.
			sprintf( __( 'For a non-heading label, the fallback size is %s.', 'anrghg' ), '1.5em' )
		)
	);
}

/**
 * Numbering system for references field callback function.
 *
 * @since 0.72.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_numbering_system_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_numbering_system_setting( $p_a_params );
}

/**
 * Bullets field callback function.
 *
 * @since 0.72.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_bullet_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Bulleted list' ), // Label.
		__( 'Bulleted list' ), // On.
		__( 'Numbered list' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The numbering system is still used for ARIA labels and IDs.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_symbol_select_input(
			'anrghg_bullet_select_setting',
			'',
			'',
			$p_a_params,
			1
		),
		$p_a_params['ok']
	);
}

/**
 * List item link field callback function.
 *
 * @since 0.69.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_item_link_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Make each item’s number or bullet the link text of a fragment identifier', 'anrghg' ), // Label.
		__( 'Add a link to each item.', 'anrghg' ), // On.
		__( 'Do not add links.', 'anrghg' ), // Off.
		$p_a_params
	);
}

/**
 * Number tooltip field callback function.
 *
 * @since 0.67.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_item_tooltip_text_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'These tooltips should not be deactivated.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'To deactivate them anyway, please leave this field empty.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			'',
			'',
			'',
			__( 'Leave empty to deactivate these tooltips.', 'anrghg' ),
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * URL ID prefix field callback function.
 *
 * @since 0.67.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_url_id_prefix_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( 'small', '', '', '', '', $p_a_params ), $p_a_params['ok'] );
}

/**
 * Collapsible behavior and collapsed state field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_collapsing_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '-1', '0' ),
			array(
				__( 'Collapsed', 'anrghg' ),
				__( 'Expanded', 'anrghg' ),
				__( 'Uncollapsible', 'anrghg' ),
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
			__( 'The display may be uncollapsible or collapsible, and if collapsible, either collapsed or expanded at page load.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'This option is also configurable per instance in the block or block inspector.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Expanding and collapsing may be triggered by clicking the label or the twistie next to it, without JavaScript.', 'anrghg' )
		)
	);
}

/**
 * Priority level field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_reference_list_priority_select_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_priority_level_setting( $p_a_params );
}
