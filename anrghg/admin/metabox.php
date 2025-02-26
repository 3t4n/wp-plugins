<?php
/**
 * Post Meta box.
 *
 * @since 1.5.5  Split off `anrghg-admin.php`.
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
 * Adds a Post Meta box.
 *
 * @since 0.27.4 (provisional)
 * @since 0.29.0
 * @since 0.62.6 Hook on load-post.php and load-post-new.php
 * to debug its label for screen readers, and also visually.
 * @link https://www.smashingmagazine.com/2011/10/create-custom-post-meta-boxes-wordpress/
 *
 * This Meta box displays in the Classic Editor sidepane or
 * in the Block Editor Inspector. It contains all settings.
 * Each setting’s display may be toggled individually. This
 * is therefore a streamlined, configurable Meta box. These
 * settings override sitewide configuration and are in turn
 * overridden by block-level configuration.
 */
function anrghg_add_meta_box() {
	global $g_a_anrghg_config;
	$l_a_options = get_option( 'anrghg' );
	if (
		$g_a_anrghg_config['anrghg_meta_box_active']
		&& (
			( anrghg_apply_config( 'anrghg_dates_active' )
				&& $g_a_anrghg_config['anrghg_meta_box_published_first']
			)
			|| $g_a_anrghg_config['anrghg_meta_box_thank_you_message']
			|| ( anrghg_apply_config( 'anrghg_table_of_contents_active' )
				&& (
					$g_a_anrghg_config['anrghg_meta_box_contents_insert']
					|| $g_a_anrghg_config['anrghg_meta_box_contents_alignment']
					|| $g_a_anrghg_config['anrghg_meta_box_contents_label']
					|| $g_a_anrghg_config['anrghg_meta_box_contents_collapse']
				)
			)
			|| ( anrghg_apply_config( 'anrghg_complements_active' )
				&& (
					$g_a_anrghg_config['anrghg_meta_box_complements_process_active']
					|| $g_a_anrghg_config['anrghg_meta_box_complements_writing_dir']
					|| $g_a_anrghg_config['anrghg_meta_box_complement_delimiters']
					|| $g_a_anrghg_config['anrghg_meta_box_complement_list_labels']
					|| $g_a_anrghg_config['anrghg_meta_box_complement_list_collapse']
					|| $g_a_anrghg_config['anrghg_meta_box_complement_list_footer_defer']
				)
			)
		)
	) {
		$l_a_editors = array( 'post', 'page' );
		foreach ( $l_a_editors as $l_s_editor ) {
			add_meta_box(
				'anrghg_meta_box',
				_x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' ),
				'anrghg_meta_box_cb',
				$l_s_editor,
				'side', // Context: side, advanced, normal.
				'low'   // Priority: high, core, sorted, default, low.
			);
		}
	}
}
add_filter( 'add_meta_boxes', 'anrghg_add_meta_box' );

/**
 * Initializes the post meta keys.
 *
 * @since 0.29.1 First keys.
 * @global array $g_a_anrghg_meta_keys
 */
$g_a_anrghg_meta_keys = array(
	'anrghg_append_thank_you',
	'anrghg_thank_you_template',
	'anrghg_thank_you_text',
	'anrghg_published_first_top',
	'anrghg_published_first_top_prefill',
	'anrghg_published_first_end',
	'anrghg_published_first_end_prefill',
	'anrghg_insert_contents',
	'anrghg_align_contents',
	'anrghg_contents_label',
	'anrghg_collapse_contents',
	'anrghg_process_complements',
	'anrghg_writing_dir_notes',
	'anrghg_writing_dir_sources',
	'anrghg_post_note_start',
	'anrghg_post_note_end',
	'anrghg_post_source_start',
	'anrghg_post_source_end',
	'anrghg_post_complement_name_start',
	'anrghg_post_complement_name_end',
	'anrghg_post_tooltip_end',
	'anrghg_post_complement_list_link_start',
	'anrghg_post_complement_list_link_end',
	'anrghg_note_list_label',
	'anrghg_source_list_label',
	'anrghg_note_list_collapse',
	'anrghg_source_list_collapse',
	'anrghg_note_list_full_expansion',
	'anrghg_source_list_full_expansion',
	'anrghg_complement_list_footer_deferral',
);

/**
 * Modularized UI element functions for the Post Meta box.
 *
 * Like on the Settings page, generating HTML should be modular.
 * Ideally use the same functions to streamline both the Settings
 * and the Post Meta box UI elements, although the context is not
 * the same. These are called from within `anrghg_meta_box_cb()`.
 */

/**
 * Generates a Meta Box settings unit.
 *
 * @since 0.70.0
 * @since 0.81.7 Escape and echo instead of return.
 * @param  array        $p_a_post_meta   Data.
 * @param  string|array $p_m_legend      Status is 2nd element.
 * @param  array        ...$p_a_elements UI elements.
 * @return void
 */
function anrghg_metabox_unit(
	$p_a_post_meta,
	$p_m_legend,
	...$p_a_elements
) {
	if ( is_array( $p_m_legend ) ) {
		$l_s_legend = $p_m_legend[0];
		$l_s_status = $p_m_legend[1];
	} else {
		$l_s_legend = $p_m_legend;
	}
	$l_s_output = '<div class="anrghg-unit"><fieldset><legend>' . $l_s_legend . '</legend>';
	if ( isset( $l_s_status ) ) {
		$l_s_output .= anrghg_metabox_display_info(
			// Translators: %s: the label of the configured value.
			sprintf( __( 'Configured as “%s”', 'anrghg' ), $l_s_status )
		);
	}
	foreach ( $p_a_elements as $l_s_element ) {
		$l_s_output .= $l_s_element;
	}
	$l_s_output .= '</fieldset></div>';
	echo wp_kses( $l_s_output, anrghg_get_ui_with_user_input_whitelist() );
}

/**
 * Generates a hidden prefill saver.
 *
 * @since 0.70.0
 * The prefill is the input field’s default value, and it is also
 * held in a separate, dedicated key, whose value is saved to the
 * database so as to become immutable, to be used for reference.
 * @param  array  $p_a_post_meta  Data.
 * @param  string $p_s_key        Settings key.
 * @return string $l_s_output
 */
function anrghg_metabox_save_prefill(
	$p_a_post_meta,
	$p_s_key
) {
	$l_s_output  = '<input type="hidden" name="' . $p_s_key . '" value="';
	$l_s_output .= esc_attr( $p_a_post_meta[ $p_s_key ] ) . '" />';
	return $l_s_output;
}

/**
 * Displays information.
 *
 * @since 1.5.3
 * CAUTION: This only supports a single text argument.
 * @param  string $p_s_text  The information.
 * @param  string $p_s_class `info`: italic; `important`: bold.
 * @return string $l_s_output
 */
function anrghg_metabox_display_info(
	$p_s_text,
	$p_s_class = 'info'
) {
	$l_s_output  = '<div class="' . $p_s_class . '">';
	$l_s_output .= $p_s_text;
	$l_s_output .= '</div>';
	return $l_s_output;
}

/**
 * Generates a single radio button.
 *
 * @since 0.70.0
 * @param  array  $p_a_post_meta Data.
 * @param  string $p_s_key       Settings key.
 * @param  int    $p_i_index     Index.
 * @param  string $p_s_val       Value.
 * @param  string $p_s_label     Optional, may be generated elsewhere.
 * @return string $l_s_output
 */
function anrghg_metabox_radio_button(
	$p_a_post_meta,
	$p_s_key,
	$p_i_index,
	$p_s_val,
	$p_s_label = ''
) {
	$l_s_output  = '<div>';
	$l_s_output .= $p_s_label ? '<label>' : '';
	$l_s_output .= '<input type="radio" id="' . $p_s_key . '_' . $p_i_index . '"';
	$l_s_output .= ' name="' . $p_s_key . '" value="' . $p_s_val . '"';
	$l_s_output .= checked( $p_a_post_meta[ $p_s_key ], $p_s_val, false );
	$l_s_output .= ' /> ';
	$l_s_output .= $p_s_label;
	$l_s_output .= $p_s_label ? '</label>' : '';
	$l_s_output .= '</div>';
	return $l_s_output;
}

/**
 * Generates a set of adjacent radio buttons.
 *
 * @since 0.70.0
 * @param  array  $p_a_post_meta  Data.
 * @param  string $p_s_key        Settings key.
 * @param  string $p_a_values     Values.
 * @param  array  $p_a_labels     Labels.
 * @param  bool   $p_b_horizontal Layout.
 * @return string $l_s_output
 */
function anrghg_metabox_radio_button_set(
	$p_a_post_meta,
	$p_s_key,
	$p_a_values,
	$p_a_labels,
	$p_b_horizontal = false
) {
	$l_s_output  = '';
	$l_s_output .= $p_b_horizontal ? '<div class="anrghg-flex">' : '';
	foreach ( $p_a_values as $l_i_index => $l_s_value ) {
		$l_s_output .= anrghg_metabox_radio_button(
			$p_a_post_meta,
			$p_s_key,
			$l_i_index,
			$l_s_value,
			$p_a_labels[ $l_i_index ]
		);
	}
	$l_s_output .= $p_b_horizontal ? '</div>' : '';
	return $l_s_output;
}

/**
 * Generates a group and radio button label.
 *
 * @since 0.71.0
 * For a horizontal group of three radio buttons without
 * any label for the last (leftmost) button at the end.
 * @param  string $p_s_key         Settings key.
 * @param  string $p_s_group_label Group label.
 * @param  string $p_s_last_label  Last button label.
 * @return string $l_s_output
 */
function anrghg_metabox_label_partial(
	$p_s_key,
	$p_s_group_label,
	$p_s_last_label
) {
	$l_s_output  = '<div class="anrghg-flex"><div tabindex="0" style="flex-grow: 2;">';
	$l_s_output .= $p_s_group_label;
	$l_s_output .= '</div><div style="flex-shrink: 1;"><label for="' . $p_s_key . '_2">';
	$l_s_output .= $p_s_last_label . '</label></div></div>';
	return $l_s_output;
}

/**
 * Generates a writing direction setting.
 *
 * @since 0.70.0
 * @param  array  $p_a_post_meta  Data.
 * @param  string $p_s_key        Settings key.
 * @param  string $p_s_label      Upper label; optional.
 * @return string $l_s_output
 */
function anrghg_metabox_writing_dir(
	$p_a_post_meta,
	$p_s_key,
	$p_s_label = ''
) {
	$l_s_output  = anrghg_metabox_label_partial(
		$p_s_key,
		$p_s_label,
		__( 'Not set' )
	);
	$l_s_output .= '<div class="anrghg-flex anrghg-border">';
	$l_s_output .= anrghg_metabox_radio_button(
		$p_a_post_meta,
		$p_s_key,
		0,
		'ltr',
		_x( 'Left to right', 'editor button' )
	);
	$l_s_output .= anrghg_metabox_radio_button(
		$p_a_post_meta,
		$p_s_key,
		1,
		'rtl',
		_x( 'Right to left', 'editor button' )
	);
	$l_s_output .= anrghg_metabox_radio_button(
		$p_a_post_meta,
		$p_s_key,
		2,
		'null'
	);
	$l_s_output .= '</div>';
	return $l_s_output;
}

/**
 * Generates a full expansion setting.
 *
 * @since 0.71.0
 * Setting about fully expanding a complement list on
 * clicking an anchor, or not.
 * @param  array  $p_a_post_meta Data.
 * @param  string $p_s_key       Settings key.
 * @param  string $p_s_label     Upper label; optional.
 * @return string $l_s_output
 */
function anrghg_metabox_full_expansion(
	$p_a_post_meta,
	$p_s_key,
	$p_s_label = ''
) {
	$l_s_output  = anrghg_metabox_label_partial(
		$p_s_key,
		$p_s_label,
		__( 'Keep as configured', 'anrghg' )
	);
	$l_s_output .= '<div class="anrghg-flex">';
	$l_s_output .= anrghg_metabox_radio_button(
		$p_a_post_meta,
		$p_s_key,
		0,
		'false',
		__( 'Target', 'anrghg' )
	);
	$l_s_output .= anrghg_metabox_radio_button(
		$p_a_post_meta,
		$p_s_key,
		1,
		'true',
		__( 'All', 'anrghg' )
	);
	$l_s_output .= anrghg_metabox_radio_button(
		$p_a_post_meta,
		$p_s_key,
		2,
		'null'
	);
	$l_s_output .= '</div>';
	return $l_s_output;
}

/**
 * Generates a collapsible behavior setting.
 *
 * @since 0.71.0
 * @param  array  $p_a_post_meta Data.
 * @param  string $p_s_key       Settings key.
 * @return string $l_s_output
 */
function anrghg_metabox_collapsing(
	$p_a_post_meta,
	$p_s_key
) {
	$l_s_output = anrghg_metabox_radio_button_set(
		$p_a_post_meta,
		$p_s_key,
		array(
			'null',
			'collapsed',
			'expanded',
			'uncollapsible',
		),
		array(
			__( 'Keep as configured', 'anrghg' ),
			__( 'Collapsed', 'anrghg' ),
			__( 'Expanded', 'anrghg' ),
			__( 'Uncollapsible', 'anrghg' ),
		)
	);
	return $l_s_output;
}

/**
 * Generates a checkbox.
 *
 * @since 0.71.0
 * A checkbox is inappropriate in almost all use cases.
 * More intuitive, radio buttons are widely preferred.
 * @param  array  $p_a_post_meta Data.
 * @param  string $p_s_key       Settings key.
 * @param  string $p_s_label     Checkbox label.
 * @param  string $p_s_class     Optional.
 * @return string $l_s_output
 */
function anrghg_metabox_checkbox(
	$p_a_post_meta,
	$p_s_key,
	$p_s_label,
	$p_s_class = ''
) {
	$l_s_output  = '<input type="hidden" id="' . $p_s_key . '_0" name="' . $p_s_key . '" value="false" />';
	$l_s_output .= '<label><input type="checkbox" id="' . $p_s_key . '_1" name="' . $p_s_key . '"';
	$l_s_output .= '" value="true"' . checked( $p_a_post_meta[ $p_s_key ], 'true', false );
	$l_s_output .= $p_s_class ? ' class="' . $p_s_class . '"' : '';
	$l_s_output .= ' />' . $p_s_label . '</label>';
	return $l_s_output;
}

/**
 * Generates a text input field.
 *
 * @since 0.71.0
 * @param  array  $p_a_post_meta   Data.
 * @param  string $p_s_key         Settings key.
 * @param  string $p_s_label       Optional.
 * @param  string $p_s_placeholder Optional.
 * @param  string $p_s_information Optional.
 * @param  string $p_s_class       Optional.
 * @return string $l_s_output
 */
function anrghg_metabox_text_input(
	$p_a_post_meta,
	$p_s_key,
	$p_s_label = '',
	$p_s_placeholder = '',
	$p_s_information = '',
	$p_s_class = ''
) {
	$l_s_output  = '<label>';
	$l_s_output .= $p_s_label ? $p_s_label . '<br />' : '';
	$l_s_output .= '<input type="text" id="' . $p_s_key . '" name="' . $p_s_key . '"';
	$l_s_output .= ' class="anrghg-fullwidth';
	$l_s_output .= $p_s_class ? ' ' . $p_s_class : '';
	$l_s_output .= '" value="' . esc_attr( $p_a_post_meta[ $p_s_key ] ) . '"';
	$l_s_output .= $p_s_placeholder ? ' placeholder="' . $p_s_placeholder . '"' : '';
	$l_s_output .= ' />';
	$l_s_output .= $p_s_information ? '<br />' . $p_s_information : '';
	$l_s_output .= '</label>';
	return $l_s_output;
}

/**
 * Generates a pair of text input fields in a row.
 *
 * @since 0.71.0
 * This array makes sense for paired delimiters.
 * @param  array  $p_a_post_meta   Data.
 * @param  string $p_s_key_start   Settings key.
 * @param  string $p_s_key_end     Settings key.
 * @param  string $p_s_label_start Optional.
 * @param  string $p_s_label_end   Optional.
 * @param  string $p_s_class       Optional.
 * @return string $l_s_output
 */
function anrghg_metabox_delim_pair(
	$p_a_post_meta,
	$p_s_key_start,
	$p_s_key_end,
	$p_s_label_start = '',
	$p_s_label_end = '',
	$p_s_class = ''
) {
	$l_s_output  = '<div class="anrghg-flex">';
	$l_s_output .= '<div>';
	$l_s_output .= anrghg_metabox_text_input(
		$p_a_post_meta,
		$p_s_key_start,
		$p_s_label_start,
		'',
		'',
		$p_s_class
	);
	$l_s_output .= '</div>';
	$l_s_output .= '<div>';
	$l_s_output .= anrghg_metabox_text_input(
		$p_a_post_meta,
		$p_s_key_end,
		$p_s_label_end,
		'',
		'',
		$p_s_class
	);
	$l_s_output .= '</div>';
	$l_s_output .= '</div>';
	return $l_s_output;
}

/**
 * Generates a text area input field.
 *
 * @since 0.70.0
 * @param  array  $p_a_post_meta   Data.
 * @param  string $p_s_key         Settings key.
 * @param  string $p_s_class       Optional.
 * @param  string $p_s_label       Optional.
 * @param  string $p_s_placeholder Optional.
 * @param  string $p_s_information Optional.
 * @return string $l_s_output
 */
function anrghg_metabox_textarea(
	$p_a_post_meta,
	$p_s_key,
	$p_s_class = '',
	$p_s_label = '',
	$p_s_placeholder = '',
	$p_s_information = ''
) {
	$l_s_output  = '';
	$l_s_output .= $p_s_label ? '<label>' . $p_s_label . '<br />' : '';
	$l_s_output .= '<textarea id="' . $p_s_key . '" name="' . $p_s_key . '"';
	$l_s_output .= $p_s_placeholder ? ' placeholder="' . $p_s_placeholder . '"' : '';
	$l_s_output .= ' class="anrghg-fullwidth';
	$l_s_output .= $p_s_class ? ' ' . $p_s_class : '';
	$l_s_output .= '">' . esc_attr( $p_a_post_meta[ $p_s_key ] ) . '</textarea>';
	$l_s_output .= $p_s_information ? '<br />' . $p_s_information : '';
	$l_s_output .= $p_s_label ? '</label>' : '';
	return $l_s_output;
}

/**
 * Generates a simple select box.
 *
 * @since 0.71.0
 * @param  array  $p_a_post_meta Data.
 * @param  string $p_s_key       Settings key.
 * @param  array  $p_a_options   Options.
 * @param  string $p_s_label     Optional.
 * @return string $l_s_output
 */
function anrghg_metabox_simple_select(
	$p_a_post_meta,
	$p_s_key,
	$p_a_options,
	$p_s_label = ''
) {
	$l_s_output  = '';
	$l_s_output .= $p_s_label ? '<label>' . $p_s_label . '<br />' : '';
	$l_s_output .= '<select id="' . $p_s_key . '" name="' . $p_s_key . '"';
	$l_s_output .= ' class="anrghg-halfwidth">';
	foreach ( $p_a_options as $l_s_value ) {
		$l_s_output .= '<option value="' . $l_s_value . '"';
		$l_s_output .= selected( $p_a_post_meta[ $p_s_key ], $l_s_value, false );
		$l_s_output .= '>' . $l_s_value . '</option>';
	}
	$l_s_output .= '</select>';
	$l_s_output .= $p_s_label ? '</label>' : '';
	return $l_s_output;
}

/**
 * Generates this Post Meta box’s content.
 *
 * @since 0.29.0
 * While in setting pages we can use the value '1' for checkboxes,
 * in the editor meta boxes we cannot or the box will stay checked
 * regardless whether the saved value in the DB is '1' or not. So,
 * WordPress Core is using 'true' and 'false' instead. This bug is
 * not fixed by `autocomplete="off"`. It does not matter given the
 * meta box values may not be exposed to end-users like when using
 * configuration filters.
 * @since 0.30.0
 * Use 'true', 'false' and 'null' to fix a bug with radio buttons,
 * and for clarity with respect to website and plugin maintenance.
 * @return void
 */
function anrghg_meta_box_cb() {
	global $g_a_anrghg_config, $g_a_anrghg_meta_keys;
	wp_nonce_field( basename( __FILE__ ), 'anrghg_nonce' );

	/**
	 * Default values determined as they have become available.
	 */
	// phpcs:disable WordPress.Arrays.ArrayKeySpacingRestrictions
	$g_a_anrghg_meta_keys['anrghg_append_thank_you'                ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_thank_you_template'              ] = '';
	$g_a_anrghg_meta_keys['anrghg_thank_you_text'                  ] = '';
	$g_a_anrghg_meta_keys['anrghg_published_first_top'             ] = $g_a_anrghg_config['anrghg_published_first_top_prefill'];
	$g_a_anrghg_meta_keys['anrghg_published_first_top_prefill'     ] = $g_a_anrghg_config['anrghg_published_first_top_prefill'];
	$g_a_anrghg_meta_keys['anrghg_published_first_end'             ] = $g_a_anrghg_config['anrghg_published_first_end_prefill'];
	$g_a_anrghg_meta_keys['anrghg_published_first_end_prefill'     ] = $g_a_anrghg_config['anrghg_published_first_end_prefill'];
	$g_a_anrghg_meta_keys['anrghg_insert_contents'                 ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_align_contents'                  ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_contents_label'                  ] = '';
	$g_a_anrghg_meta_keys['anrghg_collapse_contents'               ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_process_complements'             ] = 'true';
	$g_a_anrghg_meta_keys['anrghg_writing_dir_notes'               ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_writing_dir_sources'             ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_post_note_start'                 ] = $g_a_anrghg_config['anrghg_note_start'];
	$g_a_anrghg_meta_keys['anrghg_post_note_end'                   ] = $g_a_anrghg_config['anrghg_note_end'];
	$g_a_anrghg_meta_keys['anrghg_post_source_start'               ] = $g_a_anrghg_config['anrghg_source_start'];
	$g_a_anrghg_meta_keys['anrghg_post_source_end'                 ] = $g_a_anrghg_config['anrghg_source_end'];
	$g_a_anrghg_meta_keys['anrghg_post_complement_name_start'      ] = $g_a_anrghg_config['anrghg_complement_name_start'];
	$g_a_anrghg_meta_keys['anrghg_post_complement_name_end'        ] = $g_a_anrghg_config['anrghg_complement_name_end'];
	$g_a_anrghg_meta_keys['anrghg_post_tooltip_end'                ] = $g_a_anrghg_config['anrghg_anchor_tooltip_end'];
	$g_a_anrghg_meta_keys['anrghg_post_complement_list_link_start' ] = $g_a_anrghg_config['anrghg_anchor_tooltip_list_link_start'];
	$g_a_anrghg_meta_keys['anrghg_post_complement_list_link_end'   ] = $g_a_anrghg_config['anrghg_anchor_tooltip_list_link_end'];
	$g_a_anrghg_meta_keys['anrghg_note_list_label'                 ] = '';
	$g_a_anrghg_meta_keys['anrghg_source_list_label'               ] = '';
	$g_a_anrghg_meta_keys['anrghg_note_list_collapse'              ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_source_list_collapse'            ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_note_list_full_expansion'        ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_source_list_full_expansion'      ] = 'null';
	$g_a_anrghg_meta_keys['anrghg_complement_list_footer_deferral' ] = 'null';
	// phpcs:enable WordPress.Arrays.ArrayKeySpacingRestrictions

	/**
	 * Takes in the saved values.
	 */
	$l_i_post_id = get_the_id();
	foreach ( $g_a_anrghg_meta_keys as $l_s_key => $l_s_val ) {
		$l_s_registered            = get_post_meta( $l_i_post_id, $l_s_key, true );
		$l_a_post_meta[ $l_s_key ] = empty( $l_s_registered ) ? $l_s_val : $l_s_registered;
	}

	/**
	 * Meta box internal CSS.
	 */
	echo wp_kses( "\r\n<style>/*ANRGHG Post Meta box*/", array( 'style' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'css',
			'

				div.anrghg-unit {
					width: 100%;
					margin-top: 10px;
				}

				div.anrghg-unit legend,
				div.anrghg-unit table caption {
					font-size: 13px;
					font-weight: bold;
				}

				div.anrghg-unit .anrghg-normal {
					font-weight: normal;
				}

				div.anrghg-unit label {
					font-size: 13px;
				}

				.anrghg-fullwidth {
					width: 100%;
				}

				.anrghg-halfwidth {
					min-width: 60%;
				}

				textarea.anrghg-taller {
					height: 90px;
				}

				.anrghg-flex {
					display: flex;
					justify-content: space-between;
				}
				
				.anrghg-flex.anrghg-border div {
					padding: 0 2px;
					border-left: 1px solid #000;
					border-right: 1px solid #000;
				}

				.anrghg-start {
					text-align: start;
				}

				.anrghg-inactive {
					cursor: default;
				}

				div.info {
					font-style: italic;
				}

				div.info.important {
					font-weight: bold;
				}

			'
		)
	);
	echo wp_kses( "\r\n</style>\r\n", array( 'style' => true ) );

	/**
	 * First published date.
	 *
	 * @since 0.36.0
	 * @since 0.49.1 Debug for robustness across changing prefill configuration.
	 * @since 0.70.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_dates_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_published_first']
	) {
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( '‘Published first’ information', 'anrghg' ),
			anrghg_metabox_display_info(
				// phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
				__( 'Supports templates', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'The optional placeholder %s inserts the post title.', 'anrghg' )
			),
			anrghg_metabox_textarea(
				$l_a_post_meta,
				'anrghg_published_first_top',
				'',
				__( 'Top' ),
				__( 'Unchanged prefills are ignored.', 'anrghg' )
			),
			anrghg_metabox_textarea(
				$l_a_post_meta,
				'anrghg_published_first_end',
				'',
				__( 'Bottom' ),
				__( 'Unchanged prefills are ignored.', 'anrghg' )
			),
			anrghg_metabox_save_prefill(
				$l_a_post_meta,
				'anrghg_published_first_top_prefill'
			),
			anrghg_metabox_save_prefill(
				$l_a_post_meta,
				'anrghg_published_first_end_prefill'
			)
		);
	}

	/**
	 * Thank You message.
	 *
	 * @since 0.53.0
	 * @since 0.70.0 Refactored.
	 * This feature is permanently active to cater for the eventuality that
	 * its Gutenberg block is used in a post.
	 */
	if ( $g_a_anrghg_config['anrghg_meta_box_thank_you_message'] ) {
		$l_s_conf = anrghg_apply_config( 'anrghg_thank_you_active' );
		switch ( $l_s_conf ) {
			case '1':
				// Translators: %s: ‘All Posts’, or ‘All Pages’.
				$l_s_status = sprintf( __( 'Append a message to %s only', 'anrghg' ), __( 'All Posts' ) );
				break;
			case '2':
				// Translators: 1: ‘All Posts’; 2: ‘All Pages’.
				$l_s_status = sprintf( __( 'Append one message to %1$s and another one to %2$s', 'anrghg' ), __( 'All Posts' ), __( 'All Pages' ) );
				break;
			case '3':
				// Translators: %s: ‘All Posts’, or ‘All Pages’.
				$l_s_status = sprintf( __( 'Append a message to %s only', 'anrghg' ), __( 'All Pages' ) );
				break;
			case '0':
			default:
				$l_s_status = __( 'Do not append any message by default', 'anrghg' );
		}
		$l_s_select_box = '';
		$l_s_config     = anrghg_apply_config( 'anrghg_thank_you_select_list' );
		$l_s_config     = trim( $l_s_config );
		if ( ! empty( $l_s_config ) ) {
			$l_s_config    = preg_replace( '/\s+/', ' ', $l_s_config );
			$l_a_list      = explode( ' ', $l_s_config );
			$l_a_options   = array();
			$l_a_options[] = '';
			foreach ( $l_a_list as $l_s_item ) {
				if ( ! in_array( $l_s_item, $l_a_options, true ) ) {
					$l_a_options[] = $l_s_item;
				}
			}
			$l_s_select_box = anrghg_metabox_simple_select(
				$l_a_post_meta,
				'anrghg_thank_you_template',
				$l_a_options,
				__( 'Choose template:', 'anrghg' )
			) . '<br />';
		}
		anrghg_metabox_unit(
			$l_a_post_meta,
			array(
				__( 'Thank You message', 'anrghg' ),
				$l_s_status,
			),
			anrghg_metabox_radio_button_set(
				$l_a_post_meta,
				'anrghg_append_thank_you',
				array(
					'null',
					'true',
					'false',
				),
				array(
					__( 'Keep as configured', 'anrghg' ),
					__( 'Append configured message', 'anrghg' ),
					__( 'Do not append any message', 'anrghg' ),
				)
			),
			$l_s_select_box,
			anrghg_metabox_textarea(
				$l_a_post_meta,
				'anrghg_thank_you_text',
				'anrghg-taller',
				__( 'This overrides the configured text:', 'anrghg' ),
				// phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
				__( 'Supports templates', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'The optional placeholder %s inserts the post title.', 'anrghg' )
			)
		);
	}

	/**
	 * Table of contents insertion.
	 *
	 * @since 0.30.0
	 * @since 0.70.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_table_of_contents_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_contents_insert']
	) {
		if ( has_block( 'anrghg/table-of-contents', $l_i_post_id ) ) {
			anrghg_metabox_unit(
				$l_a_post_meta,
				// Translators: This string is not used if syncing with WordPress Core is active.
				anrghg_i18n( __( 'Table of contents' ), __( 'Table of contents', 'anrghg' ) ),
				'<label class="anrghg-inactive"><input type="checkbox" checked="checked" disabled="disabled" class="anrghg-inactive" />',
				_x( 'Inserted as positioned by block.', 'table of contents', 'anrghg' ) . '</label>'
			);
		} else {
			$l_s_conf = anrghg_apply_config( 'anrghg_table_of_contents_active' );
			switch ( $l_s_conf ) {
				case '1':
					$l_s_status = __( 'Insert by default if applicable', 'anrghg' );
					break;
				case '-1':
				default:
					$l_s_status = __( 'Insert on demand', 'anrghg' );
			}
			anrghg_metabox_unit(
				$l_a_post_meta,
				array(
					// Translators: This string is not used if syncing with WordPress Core is active.
					anrghg_i18n( __( 'Table of contents' ), __( 'Table of contents', 'anrghg' ) ),
					$l_s_status,
				),
				anrghg_metabox_radio_button_set(
					$l_a_post_meta,
					'anrghg_insert_contents',
					array(
						'null',
						'true',
						'false',
					),
					array(
						__( 'Keep as configured', 'anrghg' ),
						__( 'Insert', 'anrghg' ),
						__( 'Do not insert', 'anrghg' ),
					)
				)
			);
		}
	}

	/**
	 * Table of contents alignment.
	 *
	 * @since 0.39.0
	 * @since 0.70.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_table_of_contents_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_contents_alignment']
	) {
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( 'Alignment' ),
			anrghg_metabox_radio_button_set(
				$l_a_post_meta,
				'anrghg_align_contents',
				array(
					'left',
					'center',
					'right',
					'null',
				),
				array(
					__( 'Left' ),
					__( 'Center' ),
					__( 'Right' ),
					__( 'Unspecified', 'anrghg' ),
				),
				true
			)
		);
	}

	/**
	 * Table of contents label.
	 *
	 * @since 0.38.0
	 * @since 0.71.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_table_of_contents_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_contents_label']
	) {
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( 'Label' ),
			anrghg_metabox_text_input(
				$l_a_post_meta,
				'anrghg_contents_label',
				__( 'Keep as configured', 'anrghg' ) . C_S_ANRGHG_SPACE . '–>' . C_S_ANRGHG_SPACE . __( 'Leave empty', 'anrghg' ),
				anrghg_apply_config( 'anrghg_table_of_contents_label' ),
				// Translators: %s: the literal %s wrapped in a <code> element.
				sprintf( __( 'The optional placeholder %s inserts the post title.', 'anrghg' ), '<code>%s</code>' )
			)
		);
	}

	/**
	 * Table of contents collapsing.
	 *
	 * @since 0.39.0
	 * @since 0.71.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_table_of_contents_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_contents_collapse']
	) {
		$l_s_conf = anrghg_apply_config( 'anrghg_table_of_contents_collapsing' );
		switch ( $l_s_conf ) {
			case '1':
				$l_s_status = __( 'Collapsed', 'anrghg' );
				break;
			case '-1':
				$l_s_status = __( 'Expanded', 'anrghg' );
				break;
			default:
				$l_s_status = __( 'Uncollapsible', 'anrghg' );
		}
		anrghg_metabox_unit(
			$l_a_post_meta,
			array(
				__( 'Collapsing', 'anrghg' ),
				$l_s_status,
			),
			anrghg_metabox_collapsing(
				$l_a_post_meta,
				'anrghg_collapse_contents'
			)
		);
	}

	/**
	 * Complements processing.
	 *
	 * @since 0.53.0
	 * @since 0.71.0 Refactored.
	 * @since 0.81.7 Replace checkbox with radio button pair.
	 */
	if ( anrghg_apply_config( 'anrghg_complements_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_complements_process_active']
	) {
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( 'Notes and sources', 'anrghg' ),
			anrghg_metabox_radio_button_set(
				$l_a_post_meta,
				'anrghg_process_complements',
				array( 'true', 'false' ),
				array(
					__( 'Yes' ),
					__( 'Off' ),
				)
			)
		);
	}

	/**
	 * Writing direction of complement lists and anchor tooltips.
	 *
	 * @since 0.29.0
	 * @since 0.70.0 Refactored.
	 * @reporter** @nujuminstitute
	 * @link https://wordpress.org/support/topic/alignment-71/
	 */
	if ( anrghg_apply_config( 'anrghg_complements_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_complements_writing_dir']
	) {
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Anchor tooltips', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Text direction', 'anrghg' ),
			anrghg_metabox_writing_dir(
				$l_a_post_meta,
				'anrghg_writing_dir_notes',
				__( 'Notes', 'anrghg' )
			),
			anrghg_metabox_writing_dir(
				$l_a_post_meta,
				'anrghg_writing_dir_sources',
				__( 'Sources', 'anrghg' )
			)
		);
	}

	/**
	 * Complement, name, tooltip and list link delimiters.
	 *
	 * @since 0.49.0
	 * @since 0.71.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_complements_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_complement_delimiters']
	) {
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Delimiters', 'anrghg' ),
			anrghg_metabox_delim_pair(
				$l_a_post_meta,
				'anrghg_post_note_start',
				'anrghg_post_note_end',
				__( 'Notes', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Start', 'anrghg' ),
				__( 'Notes', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'End', 'anrghg' )
			),
			anrghg_metabox_delim_pair(
				$l_a_post_meta,
				'anrghg_post_source_start',
				'anrghg_post_source_end',
				__( 'Sources', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Start', 'anrghg' ),
				__( 'Sources', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'End', 'anrghg' )
			),
			anrghg_metabox_delim_pair(
				$l_a_post_meta,
				'anrghg_post_complement_name_start',
				'anrghg_post_complement_name_end',
				__( 'Name', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Start', 'anrghg' ),
				__( 'Name', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'End', 'anrghg' )
			),
			anrghg_metabox_text_input(
				$l_a_post_meta,
				'anrghg_post_tooltip_end',
				__( 'Dedicated tooltip text', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'End', 'anrghg' )
			),
			anrghg_metabox_delim_pair(
				$l_a_post_meta,
				'anrghg_post_complement_list_link_start',
				'anrghg_post_complement_list_link_end',
				__( 'List link', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Start', 'anrghg' ),
				__( 'List link', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'End', 'anrghg' )
			)
		);
	}

	/**
	 * Labels of complement lists.
	 *
	 * @since 0.30.0
	 * @since 0.71.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_complements_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_complement_list_labels']
	) {
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Label' ),
			anrghg_metabox_display_info(
				__( 'Keep as configured', 'anrghg' ) . C_S_ANRGHG_SPACE . '–>' . C_S_ANRGHG_SPACE . __( 'Leave empty', 'anrghg' )
			),
			anrghg_metabox_text_input(
				$l_a_post_meta,
				'anrghg_note_list_label',
				__( 'Notes', 'anrghg' ),
				anrghg_apply_config( 'anrghg_note_list_label_plural' )
			),
			anrghg_metabox_text_input(
				$l_a_post_meta,
				'anrghg_source_list_label',
				__( 'Sources', 'anrghg' ),
				anrghg_apply_config( 'anrghg_source_list_label_plural' )
			)
		);
	}

	/**
	 * Complement lists collapsing.
	 *
	 * @since 0.50.0
	 * @since 0.71.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_complements_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_complement_list_collapse']
	) {
		$l_s_conf = anrghg_apply_config( 'anrghg_note_list_collapsing' );
		switch ( $l_s_conf ) {
			case '1':
				$l_s_status = __( 'Collapsed', 'anrghg' );
				break;
			case '-1':
				$l_s_status = __( 'Expanded', 'anrghg' );
				break;
			default:
				$l_s_status = __( 'Uncollapsible', 'anrghg' );
		}
		anrghg_metabox_unit(
			$l_a_post_meta,
			array(
				__( 'Notes', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Collapsing', 'anrghg' ),
				$l_s_status,
			),
			anrghg_metabox_collapsing(
				$l_a_post_meta,
				'anrghg_note_list_collapse'
			)
		);
		$l_s_conf = anrghg_apply_config( 'anrghg_source_list_collapsing' );
		switch ( $l_s_conf ) {
			case '1':
				$l_s_status = __( 'Collapsed', 'anrghg' );
				break;
			case '-1':
				$l_s_status = __( 'Expanded', 'anrghg' );
				break;
			default:
				$l_s_status = __( 'Uncollapsible', 'anrghg' );
		}
		anrghg_metabox_unit(
			$l_a_post_meta,
			array(
				__( 'Sources', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Collapsing', 'anrghg' ),
				$l_s_status,
			),
			anrghg_metabox_collapsing(
				$l_a_post_meta,
				'anrghg_source_list_collapse'
			)
		);
		anrghg_metabox_unit(
			$l_a_post_meta,
			__( 'Expansion on clicking an anchor', 'anrghg' ),
			anrghg_metabox_full_expansion(
				$l_a_post_meta,
				'anrghg_note_list_full_expansion',
				__( 'Notes', 'anrghg' )
			),
			anrghg_metabox_full_expansion(
				$l_a_post_meta,
				'anrghg_source_list_full_expansion',
				__( 'Sources', 'anrghg' )
			)
		);
	}

	/**
	 * Footer deferral of complement lists.
	 *
	 * @since 0.30.0
	 * @since 0.71.0 Refactored.
	 */
	if ( anrghg_apply_config( 'anrghg_complements_active' )
		&& $g_a_anrghg_config['anrghg_meta_box_complement_list_footer_defer']
	) {
		$l_s_conf = $g_a_anrghg_config['anrghg_complement_list_footer_deferral'];
		switch ( $l_s_conf ) {
			case '1':
				$l_s_status = __( 'Defer to footer', 'anrghg' );
				break;
			case '0':
			default:
				$l_s_status = __( 'Display in article', 'anrghg' );
		}
		anrghg_metabox_unit(
			$l_a_post_meta,
			array(
				__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Footer deferral', 'anrghg' ),
				$l_s_status,
			),
			anrghg_metabox_radio_button_set(
				$l_a_post_meta,
				'anrghg_complement_list_footer_deferral',
				array(
					'null',
					'true',
					'false',
				),
				array(
					__( 'Keep as configured', 'anrghg' ),
					__( 'Defer to footer', 'anrghg' ),
					__( 'Display in article', 'anrghg' ),
				)
			)
		);
	}

}

/**
 * Saves the form fields.
 *
 * @since 1.4.3 Remove `sanitize_option()`.
 * This does not work and prevents the Post Meta box data from being saved:
 *
 *     $l_s_val = sanitize_option( wp_unslash( $_POST[ $l_s_key ] ) );
 *
 * Neither `sanitize_option()` nor `wp_unslash()` (nor both) are usable.
 * PHPCS “Detected usage of a non-sanitized input variable: $_POST[$l_s_key]”
 * is not actionable and needs to be whitelisted as-is.
 */
add_filter(
	'save_post',
	function( $p_i_post_id ) {
		global $g_a_anrghg_meta_keys;
		$l_b_autosave    = wp_is_post_autosave( $p_i_post_id );
		$l_b_revision    = wp_is_post_revision( $p_i_post_id );
		$l_b_nonce_valid = (bool) ( isset( $_POST['anrghg_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['anrghg_nonce'] ), basename( __FILE__ ) ) );
		if ( $l_b_autosave || $l_b_revision || ! $l_b_nonce_valid ) {
			return;
		}
		foreach ( $g_a_anrghg_meta_keys as $l_s_key ) {
			$l_s_key = sanitize_key( $l_s_key );
			if ( array_key_exists( $l_s_key, $_POST ) ) {
				// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				$l_s_val = ( $_POST[ $l_s_key ] );
				update_post_meta(
					$p_i_post_id,
					$l_s_key,
					$l_s_val
				);
			}
		}
	}
);
