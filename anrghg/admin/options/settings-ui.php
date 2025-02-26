<?php
/**
 * Options page 2: Settings User Interface elements.
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
 * Wraps in a flex div.
 *
 * @since 0.60.5
 * @since 0.61.0 Return instead of echo.
 * For unwrapped checkboxes.
 * @param  string ...$p_a_ui_elements Checkboxes or other.
 * @return string $l_s_output
 */
function anrghg_flex_div( ...$p_a_ui_elements ) {
	$l_s_output = '<div class="flex">';
	foreach ( $p_a_ui_elements as $l_s_ui_element ) {
		$l_s_output .= $l_s_ui_element;
	}
	$l_s_output .= "</div>\r\n";
	return $l_s_output;
}

/**
 * Wraps table rows in a table body.
 *
 * @since 0.74.0 Modularized.
 * @param  array  ...$p_a_rows Table rows.
 * @return string $l_s_output
 */
function anrghg_table( ...$p_a_rows ) {
	$l_s_output = '<table class="text subsettings"><tbody>';
	foreach ( $p_a_rows as $p_s_row ) {
		$l_s_output .= $p_s_row;
	}
	$l_s_output .= '</tbody></table>';
	return $l_s_output;
}

/**
 * Generates a textarea with an optional descriptive upper label.
 *
 * @since 0.60.0
 * @since 0.61.0 Return instead of echo.
 * @since 1.5.1 Upper label to support multiphrase.
 * @param  string $p_s_class         Class (height): `medium` (157px), `flat` (90px).
 * @param  mixed  $p_m_upper_label   String or array, default class `input-upper-label`.
 * @param  string $p_s_placeholder   Configured value, or information about filling in.
 * @param  array  $p_a_params        Settings keys and other parameters.
 * @param  int    $p_i_index         If not first in field.
 * @param  bool   $p_s_uplabel_class Additional classes of the upper label.
 * @return string $l_s_output
 */
function anrghg_description_textarea(
	$p_s_class,
	$p_m_upper_label,
	$p_s_placeholder,
	$p_a_params,
	$p_i_index = 0,
	$p_s_uplabel_class = 'description'
) {
	$l_s_output = '';
	if ( $p_m_upper_label ) {
		$l_s_output .= '<div class="input-upper-label' . ( $p_s_uplabel_class ? ' ' . $p_s_uplabel_class : '' ) . '">';
		$l_s_output .= '<label for="' . $p_a_params[ 'key_' . $p_i_index ] . '">';
		if ( is_array( $p_m_upper_label ) ) {
			foreach ( $p_m_upper_label as $l_s_phrase ) {
				$l_s_output .= $l_s_phrase . C_S_ANRGHG_SPACE;
			}
		} else {
			$l_s_output .= $p_m_upper_label;
		}
		$l_s_output .= '</label></div>';
	}
	$l_s_output .= '<textarea' . ( $p_s_class ? ' class="' . $p_s_class . '"' : '' ) . ' id="';
	$l_s_output .= $p_a_params[ 'key_' . $p_i_index ] . '"';
	$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']"';
	$l_s_output .= $p_s_placeholder ? ' placeholder="' . $p_s_placeholder . '"' : '';
	$l_s_output .= '>' . esc_attr( $p_a_params[ 'val_' . $p_i_index ] ) . "</textarea>\r\n";
	return $l_s_output;
}

/**
 * Generates a numeric, text or color input field only.
 *
 * @since 0.60.0
 * @since 0.60.5 May generate numeric field.
 * @since 0.61.0 Return instead of echo.
 * @since 0.62.4 Move class name to array offset 3.
 * @since 0.70.0 Extend to support color input.
 * @since 0.74.0 Limit in scope to the bare input field.
 * For a color picker, set the keyword ‘color’ as the first argument.
 * Add class `close-up-start` to set the `padding-inline-start` to zero.
 * By default (<empty> class argument), the input box is pretty large.
 * @param  string|array $p_m_var As follows.
 * If string: If $p_m_var == 'color': Color input.
 *            Else:  Class: tiny,small,delims,medium,fullwide,<empty>.
 * If array:  [0] => min
 *            [1] => max
 *            [2] => step
 *            [3] => class: tiny, small, medium.
 *            [4] => list
 * @param  string       $p_s_aria_label  Important when without visible label.
 * @param  string       $p_s_placeholder Configured value, or information about filling in.
 * @param  array        $p_a_params      Settings keys and other parameters.
 * @param  int          $p_i_index       If not first in field.
 * @return string       $l_s_output
 */
function anrghg_input_field(
	$p_m_var,
	$p_s_aria_label,
	$p_s_placeholder,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = '';
	if ( is_array( $p_m_var ) ) {
		// phpcs:disable WordPress.WhiteSpace.OperatorSpacing
		$l_s_output .= '<input type="number"';
		$l_s_output .= ( ( isset( $p_m_var[3] ) && ( ! empty( $p_m_var[3] ) || 0 === $p_m_var[3] ) ) ? ' class="' . $p_m_var[3] . '"' : '' );
		$l_s_output .= ( ( isset( $p_m_var[0] ) && ( ! empty( $p_m_var[0] ) || 0 === $p_m_var[0] ) ) ?   ' min="' . $p_m_var[0] . '"' : '' );
		$l_s_output .= ( ( isset( $p_m_var[1] ) && ( ! empty( $p_m_var[1] ) || 0 === $p_m_var[1] ) ) ?   ' max="' . $p_m_var[1] . '"' : '' );
		$l_s_output .= ( ( isset( $p_m_var[2] ) && ( ! empty( $p_m_var[2] ) || 0 === $p_m_var[2] ) ) ?  ' step="' . $p_m_var[2] . '"' : '' );
		$l_s_output .= ( ( isset( $p_m_var[4] ) && ( ! empty( $p_m_var[4] ) || 0 === $p_m_var[4] ) ) ?  ' list="' . $p_m_var[4] . '"' : '' );
		// phpcs:enable WordPress.WhiteSpace.OperatorSpacing
	} else {
		if ( 'color' === $p_m_var ) {
			$l_s_output .= '<input type="color"';
		} else {
			$l_s_output .= '<input type="text"' . ( $p_m_var ? ' class="' . $p_m_var . '"' : '' );
		}
	}
	$l_s_output .= ' id="' . $p_a_params[ 'key_' . $p_i_index ] . '"';
	$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']"';
	$l_s_output .= $p_s_aria_label ? ' aria-label="' . $p_s_aria_label . '"' : '';
	$l_s_output .= $p_s_placeholder ? ' placeholder="' . $p_s_placeholder . '"' : '';
	$l_s_output .= ' value="' . esc_attr( $p_a_params[ 'val_' . $p_i_index ] ) . '" />';
	return $l_s_output;
}

/**
 * Generates an input setting with labels.
 *
 * @since 0.60.0
 * @since 0.60.1 Support for leading label.
 * @since 0.74.0 Limit in scope to labels and other markup.
 * For a color picker, set the keyword ‘color’ as the first argument.
 * Add class `close-up-start` to set the `padding-inline-start` to zero.
 * By default (<empty> class argument), the input box is pretty large.
 *
 * IMPORTANT LIMITATION: An upper label and a leading label are exclusive of each other.
 *
 * CAUTION: Whenever the leading label is a string, the function must be either:
 * a) Wrapped into `anrghg_table()`.
 * b) Wrapped into '<table class="text subsettings"><tbody>' and '</tbody></table>'.
 *
 * A leading label as an array (➔mixed) is a surrounding label, split in lead and trail.
 * CAUTION: THE SPACE before and after the input CANNOT be included by default!
 *
 * The trailing label (➔mixed) may be an array, with its class(es) as the first element.
 *
 * @param  string|array $p_m_var As follows.
 * If string: If $p_m_var == 'color': Color input.
 *            Else:  Class: tiny,small,delims,medium,wide,fullwide,<empty>.
 * If array:  [0] => min
 *            [1] => max
 *            [2] => step
 *            [3] => class: tiny, small, medium.
 *            [4] => list ID
 * @param  string       $p_s_upper_label   Label in a div with the class `input-upper-label`.
 * @param  string|array $p_m_leading_label As follows.
 * If string: A stack is assumed, wrapped in a table for vertical alignment:
 *            '<table class="text subsettings"><tbody>',
 *            [Label and input in a <td> each, wrapped in a <tr>,]
 *            '</tbody></table>',
 * If array:  [0] is the leading part of a single instance’s surrounding label,
 *            [1] is the trailing part, if any, with a trailing <br />.
 * @param  string       $p_m_trailing_label Appended label with `for` att and trailing <br />.
 * @param  string|array $p_m_placeholder    As follows.
 * If string:     Configured value, or information about filling in.
 * If array:  [0] ARIA-Label.
 *            [1] Placeholder.
 * @param  array        $p_a_params         Settings keys and other parameters.
 * @param  int          $p_i_index          If not first in field.
 * @param  string       $p_s_field          The UI element, if not `anrghg_input_field()`.
 * @return string       $l_s_output
 */
function anrghg_input_setting(
	$p_m_var,
	$p_s_upper_label,
	$p_m_leading_label,
	$p_m_trailing_label,
	$p_m_placeholder,
	$p_a_params,
	$p_i_index = 0,
	$p_s_field = ''
) {
	$l_s_output = '';
	if ( $p_s_upper_label ) {
		$l_s_output .= '<div class="input-upper-label"><label for="';
		$l_s_output .= $p_a_params[ 'key_' . $p_i_index ] . '">' . $p_s_upper_label . '</label></div>';
	}
	if ( $p_m_leading_label ) {
		if ( is_array( $p_m_leading_label ) ) {
			$l_s_surrounding_label_lead  = $p_m_leading_label[0];
			$l_s_surrounding_label_trail = $p_m_leading_label[1];
			$l_s_output                 .= '<label class="input-around-label">' . $l_s_surrounding_label_lead;
		} else {
			$l_s_leading_label = $p_m_leading_label;
			$l_s_output       .= '<tr><td><label class="input-leading-label" for="';
			$l_s_output       .= $p_a_params[ 'key_' . $p_i_index ] . '">' . $l_s_leading_label . '</label></td><td>';
		}
	}
	if ( empty( $p_s_field ) ) {
		if ( is_array( $p_m_placeholder ) ) {
			$l_s_aria_label  = $p_m_placeholder[0];
			$l_s_placeholder = $p_m_placeholder[1];
		} else {
			$l_s_aria_label  = '';
			$l_s_placeholder = $p_m_placeholder;
		}
		$l_s_output .= anrghg_input_field(
			$p_m_var,
			$l_s_aria_label,
			$l_s_placeholder,
			$p_a_params,
			$p_i_index
		);
	} else {
		$l_s_output .= $p_s_field;
	}
	$l_s_output .= isset( $l_s_surrounding_label_trail ) ? $l_s_surrounding_label_trail . '</label><br />' : '';
	if ( $p_m_trailing_label ) {
		if ( is_array( $p_m_trailing_label ) ) {
			$l_s_trailing_class = $p_m_trailing_label[0];
			$l_s_trailing_label = $p_m_trailing_label[1];
		} else {
			$l_s_trailing_label = $p_m_trailing_label;
		}
		$l_s_output .= ' <label' . ( isset( $l_s_trailing_class ) ? ' class="' . $l_s_trailing_class . '"' : '' );
		$l_s_output .= ' for="' . $p_a_params[ 'key_' . $p_i_index ] . '">' . $l_s_trailing_label;
		$l_s_output .= '</label>' . ( isset( $l_s_leading_label ) ? "</td></tr>\r\n" : "<br />\r\n" );
	}
	$l_s_output .= ( isset( $l_s_leading_label ) && ! $p_m_trailing_label ) ? "</td></tr>\r\n" : '';
	return $l_s_output;
}

/**
 * Generates a datalist.
 *
 * @since 0.60.5
 * @since 0.61.0 Return instead of echo.
 * @param  string $p_s_id        ID.
 * @param  array  ...$p_a_values Values.
 * @return string $l_s_output
 */
function anrghg_datalist( $p_s_id, ...$p_a_values ) {
	$l_s_output = "\r\n<datalist id=\"" . $p_s_id . '">';
	foreach ( $p_a_values as $p_s_value ) {
		$l_s_output .= '<option value="' . $p_s_value . '">';
	}
	$l_s_output .= "</datalist>\r\n";
	return $l_s_output;
}

/**
 * Generates a glide switch.
 *
 * @since 0.24.8 Design.
 * @since 0.60.0 Modularized.
 * @since 0.61.0 Refactored; return instead of echo.
 * @param  string $p_s_label  Label.
 * @param  string $p_s_on     Effect when on.
 * @param  string $p_s_off    Effect when off.
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return string $l_s_output
 */
function anrghg_glide_switch(
	$p_s_label,
	$p_s_on,
	$p_s_off,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output  = '<input type="hidden" id="' . $p_a_params[ 'key_' . $p_i_index ] . '_false"';
	$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="0" />';
	$l_s_output .= '<input type="checkbox" class="switch" id="' . $p_a_params[ 'key_' . $p_i_index ];
	$l_s_output .= '" name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="1"';
	$l_s_output .= checked( $p_a_params[ 'val_' . $p_i_index ], '1', false ) . ' />';
	$l_s_output .= '<label for="' . $p_a_params[ 'key_' . $p_i_index ] . '">';
	$l_s_output .= '<div class="flex"><div class="switch"><div class="slot"></div><div class="knob"></div></div>';
	$l_s_output .= '<div class="labels"><div class="label1">' . $p_s_label . '</div>';
	$l_s_output .= '<div class="state1" aria-hidden="true">' . $p_s_on . '<span class="apply';
	$l_s_output .= substr( checked( $p_a_params[ 'val_' . $p_i_index ], '1', false ), 0, 8 ) . '"></span></div>';
	$l_s_output .= '<div class="state0" aria-hidden="true">' . $p_s_off . '<span class="apply';
	$l_s_output .= substr( checked( $p_a_params[ 'val_' . $p_i_index ], '1', false ), 0, 8 ) . '"></span></div>';
	$l_s_output .= "</div></div></label>\r\n";
	return $l_s_output;
}

/**
 * Echoes a glide switch.
 *
 * @since 0.81.7
 * @param  string $p_s_label  Label.
 * @param  string $p_s_on     Effect when on.
 * @param  string $p_s_off    Effect when off.
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return void
 */
function anrghg_echo_glide_switch(
	$p_s_label,
	$p_s_on,
	$p_s_off,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_glide_switch(
		$p_s_label,
		$p_s_on,
		$p_s_off,
		$p_a_params,
		$p_i_index
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates adjacent radio buttons.
 *
 * @since 0.60.0
 * @since 0.61.0 Return instead of echo.
 * @since 0.70.0 Debug composite labels.
 * Other UI elements in between: Use `anrghg_discrete_radio_button()` instead.
 * For all buttons green set `$p_i_index_red` to any number but a valid index.
 * @param  array  $p_a_values     Specified.
 * @param  array  $p_a_ui_strings Supports composite labels.
 * @param  array  $p_a_params     Settings keys and other parameters.
 * @param  int    $p_i_index      If not first in field.
 * @param  int    $p_i_index_red  Optional highlighting for OFF.
 * @param  bool   $p_b_fieldset   Defined separately if false.
 * @return string $l_s_output
 */
function anrghg_adjacent_radio_buttons(
	$p_a_values,
	$p_a_ui_strings,
	$p_a_params,
	$p_i_index = 0,
	$p_i_index_red = -1,
	$p_b_fieldset = true
) {
	$l_s_output = '';
	foreach ( $p_a_ui_strings as $l_i_index => $l_m_label ) {
		if ( is_array( $l_m_label ) ) {
			$l_s_text  = $l_m_label[0] . C_S_ANRGHG_DASH;
			$l_s_text .= '<span class="description">' . $l_m_label[1] . '</span>';
		} else {
			$l_s_text = $l_m_label;
		}
		$l_s_output .= '<div class="flex"><input type="radio" class="' . ( $p_i_index_red === $l_i_index ? 'no' : 'si' );
		$l_s_output .= '" id="' . $p_a_params[ 'key_' . $p_i_index ] . '_' . $l_i_index . '"';
		$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="' . $p_a_values[ $l_i_index ];
		$l_s_output .= '"' . checked( $p_a_params[ 'val_' . $p_i_index ], $p_a_values[ $l_i_index ], false ) . ' />';
		$l_s_output .= '<label for="' . $p_a_params[ 'key_' . $p_i_index ] . '_' . $l_i_index . '">';
		$l_s_output .= $l_s_text . "</label></div>\r\n";
	}
	$l_s_output = $p_b_fieldset ? anrghg_fieldset( '', '', $p_a_params, $l_s_output ) : $l_s_output;
	return $l_s_output;
}

/**
 * Generates a discrete radio button for interspersing other elements.
 *
 * @since 0.60.0
 * @since 0.60.5 Called without arguments, it outputs remote end tags.
 * @since 0.61.0 Return instead of echo.
 * @since 0.61.3 Close end tags itself in the presence of UI elements.
 * @param  int    $p_i_order        Its 0-based number in the fieldset.
 * @param  string $p_s_value        Discrete.
 * @param  mixed  $p_m_label        Supports composite labels.
 * @param  array  $p_a_params       Settings keys and other parameters.
 * @param  int    $p_i_index        If not first in field.
 * @param  int    $p_s_class        `box` (input), `no`(red), else `si`.
 * @param  array  ...$p_a_elements  Presence postpones '</label></div>'.
 * @return string $l_s_output
 */
function anrghg_discrete_radio_button(
	$p_i_order,
	$p_s_value,
	$p_m_label,
	$p_a_params,
	$p_i_index = 0,
	$p_s_class = 'si',
	...$p_a_elements
) {
	if ( is_array( $p_m_label ) ) {
		$l_s_text  = $p_m_label[0] . C_S_ANRGHG_DASH;
		$l_s_text .= '<span class="description">' . $p_m_label[1] . '</span>';
	} else {
		$l_s_text = $p_m_label;
	}
	$l_s_output  = '<div class="flex"><input type="radio" class="' . $p_s_class;
	$l_s_output .= '" id="' . $p_a_params[ 'key_' . $p_i_index ] . '_' . $p_i_order . '"';
	$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="' . $p_s_value;
	$l_s_output .= '"' . checked( $p_a_params[ 'val_' . $p_i_index ], $p_s_value, false ) . ' />';
	$l_s_output .= '<label for="' . $p_a_params[ 'key_' . $p_i_index ] . '_' . $p_i_order . '">' . $l_s_text;
	if ( 0 === count( $p_a_elements ) ) {
		$l_s_output .= "</label></div>\r\n";
	} else {
		$l_s_output .= C_S_ANRGHG_SPACE;
		foreach ( $p_a_elements as $l_s_element ) {
			$l_s_output .= $l_s_element;
		}
		$l_s_output .= "</label></div>\r\n";
	}
	return $l_s_output;
}

/**
 * Generates a single checkbox.
 *
 * @since 0.60.0
 * @since 0.60.5 Called without arguments, it outputs remote end tags.
 * @since 0.61.0 Return instead of echo.
 * @since 0.61.4 Close end tags itself in the presence of UI elements.
 * Requires wrapping in `anrghg_flex_div()` if unwrapped.
 * @param  array  $p_m_label       Supports composite labels.
 * @param  bool   $p_b_indented    Adds class .indented if true.
 * @param  array  $p_a_params      Settings keys and other parameters.
 * @param  int    $p_i_index       Set index If not first in field.
 * @param  bool   $p_b_wrapped     Wrapped in a <div> of class `flex`.
 * @param  array  ...$p_a_elements Presence postpones '</label></div>'.
 * @return string $l_s_output      May require `anrghg_flex_div()`.
 */
function anrghg_single_checkbox(
	$p_m_label,
	$p_b_indented,
	$p_a_params,
	$p_i_index = 0,
	$p_b_wrapped = true,
	...$p_a_elements
) {
	if ( is_array( $p_m_label ) ) {
		$l_s_text  = $p_m_label[0] . C_S_ANRGHG_DASH;
		$l_s_text .= '<span class="description">' . $p_m_label[1] . '</span>';
	} else {
		$l_s_text = $p_m_label;
	}
	$l_s_output  = '';
	$l_s_output .= $p_b_wrapped ? '<div class="flex' . ( $p_b_indented ? ' indented' : '' ) . '">' : '';
	$l_s_output .= '<input type="hidden" id="' . $p_a_params[ 'key_' . $p_i_index ] . '_false"';
	$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="0" />';
	$l_s_output .= '<input type="checkbox" id="' . $p_a_params[ 'key_' . $p_i_index ] . '"';
	$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="1"';
	$l_s_output .= checked( $p_a_params[ 'val_' . $p_i_index ], '1', false ) . ' />';
	$l_s_output .= '<label for="' . $p_a_params[ 'key_' . $p_i_index ] . '">' . $l_s_text;

	if ( 0 === count( $p_a_elements ) ) {
		$l_s_output .= '</label>' . ( $p_b_wrapped ? '</div>' : '' );
	} else {
		$l_s_output .= '<br />';
		foreach ( $p_a_elements as $l_s_element ) {
			$l_s_output .= $l_s_element;
		}
		$l_s_output .= '</label>' . ( ! $p_b_indented ? '</div>' : '' ) . "\r\n";
	}
	return $l_s_output;
}

/**
 * Generates checkbox cluster markup.
 *
 * @since 0.60.6
 * @since 0.61.0 Return instead of echo.
 * @since 0.61.3 Rename since enclosing by single call.
 * @param  string $p_s_id             The cluster’s ID.
 * @param  array  ...$p_a_ui_elements Checkboxes and other.
 * @return string $l_s_output
 */
function anrghg_checkbox_cluster( $p_s_id, ...$p_a_ui_elements ) {
	$l_s_output = '<div' . ( $p_s_id ? ' id="' . $p_s_id . '"' : '' ) . ' class="checkbox-cluster">';
	foreach ( $p_a_ui_elements as $l_s_ui_element ) {
		$l_s_output .= $l_s_ui_element;
	}
	$l_s_output .= "</div>\r\n";
	return $l_s_output;
}

/**
 * Generates a checkbox list.
 *
 * @since 0.60.0
 * @since 0.61.0 Return instead of echo.
 * @param  array  $p_a_ui_strings Supports composite labels.
 * @param  bool   $p_b_indented   Adds class .indented if true.
 * @param  array  $p_a_params     Settings keys and other parameters.
 * @param  int    $p_i_index      If not first in field.
 * @param  bool   $p_b_fieldset   Defined separately if false.
 * @return string $l_s_output
 */
function anrghg_checkbox_list(
	$p_a_ui_strings,
	$p_b_indented,
	$p_a_params,
	$p_i_index = 0,
	$p_b_fieldset = true
) {
	$l_s_output = '';
	foreach ( $p_a_ui_strings as $l_m_label ) {
		if ( is_array( $l_m_label ) ) {
			$l_s_text  = $l_m_label[0] . C_S_ANRGHG_DASH;
			$l_s_text .= '<span class="description">' . $l_m_label[1] . '</span>';
		} else {
			$l_s_text = $l_m_label;
		}
		$l_s_output .= '<div class="flex' . ( $p_b_indented ? ' indented' : '' ) . '">';
		$l_s_output .= '<input type="hidden" id="' . $p_a_params[ 'key_' . $p_i_index ] . '_false"';
		$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="0" />';
		$l_s_output .= '<input type="checkbox" id="' . $p_a_params[ 'key_' . $p_i_index ] . '"';
		$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']" value="1"';
		$l_s_output .= checked( $p_a_params[ 'val_' . $p_i_index ], '1', false ) . ' />';
		$l_s_output .= '<label for="' . $p_a_params[ 'key_' . $p_i_index ] . '">' . $l_s_text;
		$l_s_output .= "</label></div>\r\n";
		$p_i_index++;
	}
	$l_s_output = $p_b_fieldset ? anrghg_fieldset( '', '', $p_a_params, $l_s_output ) : $l_s_output;
	return $l_s_output;
}

/**
 * Generates an option item in a select box.
 *
 * @since 0.74.0
 * Gets screen readers to spell unicodes as prefixed hex numbers.
 * @param  array  $p_s_value  Passed on.
 * @param  array  $p_s_label  Passed on.
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return string $l_s_output
 */
function anrghg_select_option(
	$p_s_value,
	$p_s_label,
	$p_a_params,
	$p_i_index
) {
	$l_s_output = '<option value="' . $p_s_value . '"';
	if ( strpos( $p_s_label, '(U+' ) ) {
		$l_s_output .= ' aria-label="';
		$l_s_aria    = '';
		foreach ( str_split( $p_s_label ) as $l_s_char ) {
			$l_s_aria .= $l_s_char . ', ';
			$l_s_aria  = str_replace( 'U, +', 'U+', $l_s_aria );
			$l_s_aria  = substr( $l_s_aria, strpos( $l_s_aria, 'U+' ) );
			$l_s_aria  = str_replace( ', ), ', '', $l_s_aria );
		}
		$l_s_output .= $l_s_aria;
		$l_s_output .= '"';
	}
	$l_s_output .= selected( $p_a_params[ 'val_' . $p_i_index ], $p_s_value, false );
	$l_s_output .= '>' . $p_s_label . '</option>';
	return $l_s_output;
}

/**
 * Generates a select box.
 *
 * @since 0.60.6
 * @since 0.61.0 Return instead of echo.
 * @param  array  $p_a_data   Values and labels.
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return string $l_s_output
 */
function anrghg_select_box(
	$p_a_data,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output  = '<select id="' . $p_a_params[ 'key_' . $p_i_index ] . '"';
	$l_s_output .= ' name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']">';
	foreach ( $p_a_data as $l_s_key => $l_m_val ) {
		if ( is_array( $l_m_val ) ) {
			$l_s_output .= '<optgroup label="' . $l_s_key . '">';
			foreach ( $l_m_val as $l_s_value => $l_s_label ) {
				$l_s_output .= anrghg_select_option( $l_s_value, $l_s_label, $p_a_params, $p_i_index );
			}
			$l_s_output .= "</optgroup>\r\n";
		} else {
			$l_s_output .= anrghg_select_option( $l_s_key, $l_m_val, $p_a_params, $p_i_index );
		}
	}
	$l_s_output .= "</select>\r\n";
	return $l_s_output;
}

/**
 * Generates a text align select box.
 *
 * @since 0.77.0
 * @since 0.77.1 Move Center to Stable section.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return string $l_s_output
 */
function anrghg_text_align( $p_a_params ) {
	$l_s_output = anrghg_select_box(
		array(
			__( 'Writing direction sensitive', 'anrghg' ) => array(
				'start' => __( 'Start', 'anrghg' ),
				'end'   => __( 'End', 'anrghg' ),
			),
			__( 'Stable across locales', 'anrghg' )       => array(
				'left'   => __( 'Left' ),
				'center' => __( 'Center' ),
				'right'  => __( 'Right' ),
			),
		),
		$p_a_params
	);
	return $l_s_output;
}

/**
 * Generates a select box setting.
 *
 * @since 0.74.0
 * @param  array        $p_a_data          Values and labels.
 * @param  string       $p_s_upper_label   Label in a div with the class `input-upper-label`.
 * @param  string|array $p_m_leading_label As follows.
 * If string: A stack is assumed, wrapped in a table for vertical alignment:
 *            '<table class="text subsettings"><tbody>',
 *            Label and input in a <td> each, wrapped in a <tr>,
 *            Label and input in a <td> each, wrapped in a <tr>,
 *            '</tbody></table>',
 * If array:  [0] is the leading part of a single instance’s surrounding label,
 *            [1] is the trailing part, if any, with a trailing <br />.
 * @param  string       $p_m_trailing_label Appended label with `for` att and trailing <br />.
 * @param  array        $p_a_params         Settings keys and other parameters.
 * @param  int          $p_i_index          If not first in field.
 * @return string       $l_s_output
 */
function anrghg_select_setting(
	$p_a_data,
	$p_s_upper_label,
	$p_m_leading_label,
	$p_m_trailing_label,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_input_setting(
		$p_a_data,
		$p_s_upper_label,
		$p_m_leading_label,
		$p_m_trailing_label,
		'',
		$p_a_params,
		$p_i_index,
		anrghg_select_box(
			$p_a_data,
			$p_a_params,
			$p_i_index
		)
	);
	return $l_s_output;
}

/**
 * Generates a select setting with an overriding manual input.
 *
 * @since 0.65.0
 * @since 1.5.5 More information parameter for inclusion in the box.
 * Requires dual field: '_symbol_select'
 *                      '_symbol_input'
 * @param  mixed  $p_m_select           Values and labels, or callback.
 * @param  string $p_s_upper_label      Upper label.
 * @param  string $p_m_leading_label    Leading label.
 * @param  array  $p_a_params           Settings keys and other parameters.
 * @param  int    $p_i_index            If not first in field.
 * @param  string $p_s_more_information Added to collapsible set.
 * @return string $l_s_output
 */
function anrghg_symbol_select_input(
	$p_m_select,
	$p_s_upper_label,
	$p_m_leading_label,
	$p_a_params,
	$p_i_index = 0,
	$p_s_more_information = ''
) {
	if ( is_array( $p_m_select ) ) {
		$l_s_output = anrghg_select_setting(
			$p_m_select,
			$p_s_upper_label,
			$p_m_leading_label,
			'',
			$p_a_params,
			$p_i_index
		);
	} else {
		$l_s_output = call_user_func( $p_m_select, $p_a_params, $p_i_index );
	}
	$l_s_output .= anrghg_input_setting(
		'small',
		'',
		'',
		array( 'description', __( 'Non-empty overrides selection.', 'anrghg' ) ),
		'',
		$p_a_params,
		$p_i_index + 1
	);
	$l_s_output .= anrghg_return_information(
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The input may be a Unicode character, HTML entity or numeric character reference.', 'anrghg' )
		),
		$p_s_more_information
	);
	return $l_s_output;
}

/**
 * Generates the backlink symbol select box.
 *
 * @since 0.53.0 Provisional.
 * This is used in two instances, and is therefore modularized.
 * @since 0.58.1 Relabel and reordered, removed ⥾ U+297E, ⥿ U+297F, ⯦ U+2BE6
 * VULCANUS of Uranian astrological symbols (Miscellaneous Symbols and Arrows).
 * @since 0.58.3 Remove less supported ⭡ U+2B61, ⭫ U+2B6B, ⭱ U+2B71, ⮉ U+2B89,
 * ⯭ U+2BED, 🠁 U+1F801, 🠅 U+1F805, 🠉 U+1F809, 🠑 U+1F811, 🠕 U+1F815, 🠙 U+1F819,
 * 🠝 U+1F81D, 🠱 U+1F831, 🠵 U+1F835, 🠹 U+1F839, 🠽 U+1F83D, 🡁 U+1F841, 🡅 U+1F845,
 * 🠹 U+1F839, 🠽 U+1F83D, 🡁 U+1F841, 🡅 U+1F845, 🡑 U+1F851, 🡡 U+1F861, 🡩 U+1F869,
 * 🡱 U+1F871, 🡹 U+1F879, 🢁 U+1F881, 🢙 U+1F899, ⮭ U+2BAD, ⮬ U+2BAC, ⮙ U+2B99,
 * ⮝ U+2B9D, ⮹ U+2BB9, ⟎ U+27CE, ⯅ U+2BC5, ⏶ U+23F6, 🞁 U+1F781, 🖢 U+1F5A2,
 * 🖠 U+1F5A0, 🖞 U+1F59E, with the latter three being confusable and no emoji.
 * Among the return-like arrows, only the first two are well supported.
 * @since 0.60.6 Syntax update.
 * @since 0.61.0 Return instead of echo.
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return string $l_s_output
 */
function anrghg_backlink_symbol_select_box( $p_a_params, $p_i_index = 0 ) {
	$l_s_output = anrghg_select_setting(
		array(
			__( 'Upwards Arrows', 'anrghg' )          => array(
				'↑' => '↑ (U+2191)',
				'↟' => '↟ (U+219F)',
				'↥' => '↥ (U+21A5)',
				'⇈' => '⇈ (U+21C8)',
				'⇑' => '⇑ (U+21D1)',
				'⇞' => '⇞ (U+21DE)',
				'⇡' => '⇡ (U+21E1)',
				'⇧' => '⇧ (U+21E7)',
				'⇪' => '⇪ (U+21EA)',
				'⇫' => '⇫ (U+21EB)',
				'⇮' => '⇮ (U+21EE)',
				'⇯' => '⇯ (U+21EF)',
				'⟰' => '⟰ (U+27F0)',
				'⤊' => '⤊ (U+290A)',
				'⤉' => '⤉ (U+2909)',
				'⤒' => '⤒ (U+2912)',
				'⥉' => '⥉ (U+2949)',
				'⥣' => '⥣ (U+2963)',
			),
			__( 'Emoji', 'anrghg' )                   => array(
				'⬆' => '⬆ (U+2B06)',
				'⤴' => '⤴ (U+2934)',
				'⏫' => '⏫ (U+23EB)',
				'🔼' => '🔼 (U+1F53C)',
				'🔺' => '🔺 (U+1F53A)',
			),
			__( 'Upwards-pointing shapes', 'anrghg' ) => array(
				'^' => '^ (U+005E)',
				'⌃' => '⌃ (U+2303)',
				'⋀' => '⋀ (U+22C0)',
				'⨇' => '⨇ (U+2A07)',
				'⩕' => '⩕ (U+2A55)',
				'⩓' => '⩓ (U+2A53)',
				'⋏' => '⋏ (U+22CF)',
				'⩚' => '⩚ (U+2A5A)',
				'⟑' => '⟑ (U+27D1)',
				'⩑' => '⩑ (U+2A51)',
				'⍍' => '⍍ (U+234D)',
				'⍓' => '⍓ (U+2353)',
				'⌅' => '⌅ (U+2305)',
				'⌆' => '⌆ (U+2306)',
				'⌤' => '⌤ (U+2324)',
				'⍙' => '⍙ (U+2359)',
				'▲' => '▲ (U+25B2)',
				'△' => '△ (U+25B3)',
				'▴' => '▴ (U+25B4)',
				'▵' => '▵ (U+25B5)',
				'◬' => '◬ (U+25EC)',
				'◭' => '◭ (U+25ED)',
				'◮' => '◮ (U+25EE)',
				'⍋' => '⍋ (U+234B)',
				'⟁' => '⟁ (U+27C1)',
				'≜' => '≜ (U+225C)',
				'≙' => '≙ (U+2259)',
			),
			__( 'Return-like Arrows', 'anrghg' )      => array(
				'⬏' => '⬏ (U+2B0F)',
				'⭜' => '⭜ (U+2B5C)',
				'⮠' => '⮠ (U+2BA0)',
				'⮡' => '⮡ (U+2BA1)',
				'⮥' => '⮥ (U+2BA5)',
				'⮤' => '⮤ (U+2BA4)',
				'⮍' => '⮍ (U+2B8D)',
				'⮵' => '⮵ (U+2BB5)',
				'⮴' => '⮴ (U+2BB4)',
			),
		),
		__( 'Symbol', 'anrghg' ),
		'',
		'',
		$p_a_params,
		$p_i_index
	);
	return $l_s_output;
}

/**
 * Generates a bullet select box.
 *
 * @since 0.72.0
 * @since 0.74.0 Bigger choice.
 * Remove less supported ◦ (U+25E6), ▪ (U+25AA), ⁍ (U+204D), ⁌ (U+204C),
 * ⋇ (U+22C7), ∷ (U+2237), ⸪ (U+2E2A), ⸫ (U+2E2B), ⸬ (U+2E2C), ⸭ (U+2E2D),
 * ⁘ (U+2058), ⁙ (U+2059), ◆ (U+25C6), ▣ (U+25A3), ⏵ (U+23F5).
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return string $l_s_output
 */
function anrghg_bullet_select_setting( $p_a_params, $p_i_index = 0 ) {
	$l_s_output = anrghg_select_setting(
		array(
			__( 'Bullets', 'anrghg' )          => array(
				'•' => '• (U+2022)',
				'‣' => '‣ (U+2023)',
				'◉' => '◉ (U+25C9)',
			),
			__( 'Emoji', 'anrghg' )            => array(
				// phpcs:disable WordPress.Arrays.MultipleStatementAlignment
				'⭐' => '⭐ (U+2B50)',
				'❇' => '❇ (U+2747)',
				'✳' => '✳ (U+2733)',
				'✴️' => '✴️ (U+2734️)', // This character counts double.
				'✨' => '✨ (U+2728)',
				'☀' => '☀ (U+2600)',
				'⚪' => '⚪ (U+26AA)',
				'⚫' => '⚫ (U+26AB)',
				'▶' => '▶ (U+25B6)',
				'◀' => '◀ (U+25C0)',
				'ℹ' => 'ℹ (U+2139)',
				// phpcs:enable WordPress.Arrays.MultipleStatementAlignment
			),
			__( 'Symbols', 'anrghg' )          => array(
				'🔗' => '🔗 (U+1F517)',
				'∗' => '∗ (U+2217)',
				'፠' => '፠ (U+1360)',
				'፨' => '፨ (U+1368)',
				'※' => '※ (U+203B)',
				'⁜' => '⁜ (U+205C)',
				'⁛' => '⁛ (U+205B)',
				'☐' => '☐ (U+2610)',
				'☑' => '☑ (U+2611)',
				'☒' => '☒ (U+2612)',
			),
			__( 'Dashes', 'anrghg' )           => array(
				'‐' => '‐ (U+2010)',
				'-' => '- (U+002D)',
				'=' => '= (U+003D)',
				'+' => '+ (U+002B)',
				'−' => '− (U+2212)',
				'‒' => '‒ (U+2012)',
				'–' => '– (U+2013)',
				'―' => '― (U+2015)',
				'—' => '— (U+2014)',
				'⸺' => '⸺ (U+2E3A)',
				'⸻' => '⸻ (U+2E3B)',
			),
			__( 'Geometric shapes', 'anrghg' ) => array(
				'⯃' => '⯃ (U+2BC3)',
				'◈' => '◈ (U+25C8)',
				'◇' => '◇ (U+25C7)',
				'⯁' => '⯁ (U+2BC1)',
				'▪' => '▪ (U+25AA)',
				'▫' => '▫ (U+25AB)',
				'◾' => '◾ (U+25FE)',
				'◽' => '◽ (U+25FD)',
				'◼' => '◼ (U+25FC)',
				'◻' => '◻ (U+25FB)',
				'■' => '■ (U+25A0)',
				'□' => '□ (U+25A1)',
				'▢' => '▢ (U+25A2)',
				'▸' => '▸ (U+25B8)',
				'◂' => '◂ (U+25C2)',
				'▹' => '▹ (U+25B9)',
				'◃' => '◃ (U+25C3)',
				'►' => '► (U+25BA)',
				'◄' => '◄ (U+25C4)',
				'▻' => '▻ (U+25BB)',
				'◅' => '◅ (U+25C5)',
				'▶' => '▶ (U+25B6)',
				'◀' => '◀ (U+25C0)',
				'▷' => '▷ (U+25B7)',
				'◁' => '◁ (U+25C1)',
				'⏴' => '⏴ (U+23F4)',
			),
			__( 'Arrows', 'anrghg' )           => array(
				'→' => '→ (U+2192)',
				'←' => '← (U+2190)',
				'⇾' => '⇾ (U+21FE)',
				'⇽' => '⇽ (U+21FD)',
				'⇨' => '⇨ (U+21E8)',
				'⇦' => '⇦ (U+21E6)',
				'➔' => '➔ (U+2794)',
			),
		),
		__( 'Bullet character', 'anrghg' ),
		'',
		'',
		$p_a_params,
		$p_i_index
	);
	return $l_s_output;
}

/**
 * Generates a numbering system setting.
 *
 * @since 0.69.0
 * @since 0.71.0 Correct labels for base-26 alphabetic Latin numerals.
 * @since 0.81.7 Escape and echo instead of return.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_numbering_system_setting( $p_a_params ) {
	$l_s_output = anrghg_adjacent_radio_buttons(
		array( '0', '1', '2', '3', '4', '5' ),
		array(
			__( 'Western Arabic numerals (Arabic numerals)', 'anrghg' ),
			__( 'Eastern Arabic numerals (Hindi numerals)', 'anrghg' ),
			__( 'Uppercase Roman numerals', 'anrghg' ),
			__( 'Lowercase Roman numerals', 'anrghg' ),
			__( 'Uppercase base-26 alphabetic Latin numerals', 'anrghg' ),
			__( 'Lowercase base-26 alphabetic Latin numerals', 'anrghg' ),
		),
		$p_a_params
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a priority level setting.
 *
 * @since 0.24.7 Design.
 * @since 0.60.0 Modularized.
 * @since 0.61.2 Refactored.
 * @since 0.61.5 Reverted due to a missing argument causing validation to fail.
 * @since 0.62.3 Refactored correctly.
 * @since 0.64.0 Return string.
 * @since 0.74.0 Fix undocumented bug in HTML number input field increment/decrement buttons.
 * @since 0.81.7 Escape and echo instead of return.
 * It looks like the ±PHP_INT_MAX == 9223372036854775807 is too big for HTML.
 * Normally it would depend on 4 === PHP_INT_SIZE ? and span
 * either `−2×10⁹…2×10⁹` or `−9×10¹⁸…9×10¹⁸` depending on the system.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_priority_level_setting( $p_a_params ) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		anrghg_discrete_radio_button(
			0,
			'-1',
			_x( 'Highest', 'priority', 'anrghg' ),
			$p_a_params,
			0,
			'no'
		),
		anrghg_discrete_radio_button(
			1,
			'0',
			anrghg_input_setting(
				array(
					-2 * 10 ** 9, // Minimum.
					2 * 10 ** 9, // Maximum.
					1, // Step.
				),
				'',
				'',
				// Translators: %s: 9…2×10⁹.
				sprintf( __( 'Safe range: %s', 'anrghg' ), '9…2×10⁹' ) . C_S_ANRGHG_DASH
				// Translators: %s: −2×10⁹…2×10⁹.
				. sprintf( __( 'Possible range: %s', 'anrghg' ), '−2×10⁹…2×10⁹' ),
				'',
				$p_a_params,
				1
			),
			$p_a_params,
			0,
			'si box'
		),
		anrghg_discrete_radio_button(
			2,
			'1',
			_x( 'Lowest', 'priority', 'anrghg' ),
			$p_a_params
		)
	);
	$l_s_output .= anrghg_return_must_read_information(
		anrghg_paragraph(
			'important description',
			// Translators: 1: 9; 2: 8; 3: Notes and sources.
			sprintf( __( 'Priority higher than %1$s (from %2$s downwards) for %3$s causes image and list blocks to disappear on public pages.', 'anrghg' ), '9', '8', __( 'Notes and sources', 'anrghg' ) )
		),
		anrghg_paragraph(
			'important description',
			// Translators: 1: 11; 2: 10.
			sprintf( __( 'If a priority level is higher than %1$s (from %2$s downwards), the WordPress function adding paragraph tags is automatically deactivated to prevent it from disturbing the already added markup.', 'anrghg' ), '11', '10' )
		)
	);
	$l_s_output .= anrghg_return_information(
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This priority level determines the position relative to other features.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The greater the number, the lower the insertion point.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Highest priority is the least possible negative number (PHP_INT_MIN).', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Lowest priority is the greatest possible positive number (PHP_INT_MAX).', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'WordPress default is 10.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Negative levels are allowed.', 'anrghg' )
		)
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a single color setting.
 *
 * @since 0.70.0
 * @param  string $p_s_upper_label    Upper label.
 * @param  string $p_m_leading_label  Leading label.
 * @param  string $p_m_trailing_label Appended label with `for` att and trailing <br />.
 * @param  array  $p_a_params         Settings keys and other parameters.
 * @param  int    $p_i_index          If not first in field.
 * @return string $l_s_output
 */
function anrghg_single_color_setting(
	$p_s_upper_label,
	$p_m_leading_label,
	$p_m_trailing_label,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_input_setting(
		'color',
		$p_s_upper_label,
		$p_m_leading_label,
		$p_m_trailing_label,
		'',
		$p_a_params,
		$p_i_index
	);
	return $l_s_output;
}

/**
 * Generates a dual color setting.
 *
 * @since 0.70.0
 * @since 0.81.7 Escape and echo instead of return.
 * Requires 2 settings keys listed in this order:
 *     '_foreground_color',
 *     '_background_color',
 * @param  array $p_a_params Settings keys and other parameters.
 * @param  int   $p_i_index  If not first in field.
 * @return void
 */
function anrghg_dual_color_setting(
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		anrghg_table(
			anrghg_single_color_setting(
				'',
				__( 'Text' ),
				'',
				$p_a_params,
				$p_i_index
			),
			anrghg_single_color_setting(
				'',
				__( 'Background' ),
				'',
				$p_a_params,
				$p_i_index + 1
			)
		)
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a border setting.
 *
 * @since 0.71.0
 * @since 0.81.7 Escape and echo instead of return.
 * Requires 4 settings keys listed in this order:
 *     '_border_width'
 *     '_border_style'
 *     '_border_radius'
 *     '_border_color'
 * @param  array $p_a_params Settings keys and other parameters.
 * @param  int   $p_i_index  If not first in field.
 * @return void
 */
function anrghg_border_setting(
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		anrghg_table(
			anrghg_input_setting(
				array(
					0,
					99,
					1,
					'small',
				),
				'',
				__( 'Width' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				$p_i_index
			),
			anrghg_select_setting(
				array(
					'dotted' => __( 'Dotted' ),
					'dashed' => __( 'Dashed' ),
					'solid'  => __( 'Solid' ),
					'double' => __( 'Double line', 'anrghg' ),
					'groove' => __( 'Carved appearance', 'anrghg' ),
					'ridge'  => __( 'Extruded appearance', 'anrghg' ),
					'inset'  => __( 'Embedded appearance', 'anrghg' ),
					'outset' => __( 'Embossed appearance', 'anrghg' ),
					// Translators: %s: lowest or highest.
					'none'   => sprintf( __( 'No border with %s priority', 'anrghg' ), _x( 'lowest', 'Priority', 'anrghg' ) ),
					// Translators: %s: lowest or highest.
					'hidden' => sprintf( __( 'No border with %s priority', 'anrghg' ), _x( 'highest', 'Priority', 'anrghg' ) ),
				),
				'',
				__( 'Style' ),
				'',
				$p_a_params,
				$p_i_index + 1
			),
			anrghg_input_setting(
				array(
					0,
					99,
					1,
					'small',
				),
				'',
				__( 'Radius' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				$p_i_index + 2
			),
			anrghg_single_color_setting(
				'',
				__( 'Color' ),
				'',
				$p_a_params,
				$p_i_index + 3
			)
		)
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a shadow setting.
 *
 * @since 0.74.0
 * @since 0.81.7 Escape and echo instead of return.
 * Requires 5 settings keys listed in this order:
 *     '_shadow_x_offset'
 *     '_shadow_y_offset'
 *     '_shadow_blur'
 *     '_shadow_spread'
 *     '_shadow_color'
 * @param  array $p_a_params Settings keys and other parameters.
 * @param  int   $p_i_index  If not first in field.
 * @return void
 */
function anrghg_shadow_setting(
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		anrghg_table(
			anrghg_input_setting(
				array(
					-99,
					99,
					1,
					'small',
				),
				'',
				__( 'Offset' ) . C_S_ANRGHG_DASH . __( 'Horizontal' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				$p_i_index
			),
			anrghg_input_setting(
				array(
					-99,
					99,
					1,
					'small',
				),
				'',
				__( 'Offset' ) . C_S_ANRGHG_DASH . __( 'Vertical' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				$p_i_index + 1
			),
			anrghg_input_setting(
				array(
					0,
					99,
					1,
					'small',
				),
				'',
				__( 'Blur', 'anrghg' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				$p_i_index + 2
			),
			anrghg_input_setting(
				array(
					-99,
					99,
					1,
					'small',
				),
				'',
				__( 'Spread', 'anrghg' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				$p_i_index + 3
			),
			anrghg_single_color_setting(
				'',
				__( 'Color' ),
				'',
				$p_a_params,
				$p_i_index + 4
			)
		)
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a top-start-end-bottom input group.
 *
 * @since 0.76.0
 * @since 0.81.7 Escape and echo instead of return.
 * Intended for padding and margin settings.
 * Requires 4 settings keys listed in this order:
 *     '_top'
 *     '_start'
 *     '_end'
 *     '_bottom'
 * @param  string|array $p_m_var As follows.
 * If string: Class: tiny,small,delims,medium,fullwide,<empty>.
 * If array:  $p_m_var = array(
 *               0 => min
 *               1 => max
 *               2 => step
 *               3 => class: tiny, small, medium.
 *               4 => list ID
 *            )
 * @param  string       $p_m_trailing_label Appended label with `for` att and trailing <br />.
 * @param  array        $p_a_params         Settings keys and other parameters.
 * @param  int          $p_i_index          If not first in field.
 * @return void
 */
function anrghg_top_start_end_bottom_setting(
	$p_m_var,
	$p_m_trailing_label,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		'<div class="top-bottom">',
		anrghg_input_setting(
			$p_m_var,
			'',
			'',
			'',
			array(
				__( 'Top' ) . C_S_ANRGHG_SPACE . $p_m_trailing_label,
				'',
			),
			$p_a_params,
			$p_i_index
		),
		'</div>',
		anrghg_input_setting(
			$p_m_var,
			'',
			'',
			'',
			array(
				__( 'Start', 'anrghg' ) . C_S_ANRGHG_SPACE . $p_m_trailing_label,
				'',
			),
			$p_a_params,
			$p_i_index + 1
		),
		'<div class="rectangle"></div>',
		anrghg_input_setting(
			$p_m_var,
			'',
			'',
			$p_m_trailing_label,
			array(
				__( 'End', 'anrghg' ) . C_S_ANRGHG_SPACE . $p_m_trailing_label,
				'',
			),
			$p_a_params,
			$p_i_index + 2
		),
		'<div class="top-bottom">',
		anrghg_input_setting(
			$p_m_var,
			'',
			'',
			'',
			array(
				__( 'Bottom' ) . C_S_ANRGHG_SPACE . $p_m_trailing_label,
				'',
			),
			$p_a_params,
			$p_i_index + 3
		),
		'</div>'
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a margin or padding setting.
 *
 * @since 1.7.6
 * Requires 4 settings keys listed in this order:
 *     '_top'
 *     '_start'
 *     '_end'
 *     '_bottom'
 * @param  bool  $p_b_signed True for margin, false for padding.
 * @param  array $p_a_params Settings keys and other parameters.
 * @param  int   $p_i_index  If not first in field.
 * @return void
 */
function anrghg_margin_or_padding_setting(
	$p_b_signed,
	$p_a_params,
	$p_i_index = 0
) {
	anrghg_top_start_end_bottom_setting(
		array(
			$p_b_signed ? -99 : 0,
			99,
			1,
			'small',
		),
		__( 'Pixels (px)' ),
		$p_a_params,
		$p_i_index
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Left and right is writing direction sensitive start and end.', 'anrghg' )
		)
	);
}

/**
 * Generates a margin above-below input group.
 *
 * @since 0.77.0
 * @since 0.81.7 Escape and echo instead of return.
 * Requires 2 settings keys listed in this order:
 *     '_margin_above'
 *     '_margin_below'
 * @param  string $p_m_trailing_label Appended label with `for` att and trailing <br />.
 * @param  array  $p_a_params         Settings keys and other parameters.
 * @param  int    $p_i_index          If not first in field.
 * @return void
 */
function anrghg_margin_above_below_setting(
	$p_m_trailing_label,
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		anrghg_table(
			anrghg_input_setting(
				array(
					-999,
					999,
					1,
					'small',
				),
				'',
				__( 'Above', 'anrghg' ),
				$p_m_trailing_label,
				'',
				$p_a_params,
				$p_i_index
			),
			anrghg_input_setting(
				array(
					-999,
					999,
					1,
					'small',
				),
				'',
				__( 'Below', 'anrghg' ),
				$p_m_trailing_label,
				'',
				$p_a_params,
				$p_i_index + 1
			)
		)
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a font size setting.
 *
 * @since 0.64.0
 * @since 0.81.7 Escape and echo instead of return.
 * Requires 4 settings keys listed in this order:
 *     '_font_size_option'
 *     '_font_size_px'
 *     '_font_size_em'
 *     '_font_size_rem
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_font_size_setting( $p_a_params ) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		anrghg_discrete_radio_button(
			0,
			'0',
			__( 'Default, fallback or inherit', 'anrghg' ),
			$p_a_params,
			0,
			'no'
		),
		anrghg_discrete_radio_button(
			1,
			'1',
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
				$p_a_params,
				1
			),
			$p_a_params,
			0,
			'si box'
		),
		anrghg_discrete_radio_button(
			2,
			'2',
			anrghg_input_setting(
				array(
					0,
					100,
					.05,
					'small',
				),
				'',
				'',
				__( 'Relative to parent font size (em)' ),
				'',
				$p_a_params,
				2
			),
			$p_a_params,
			0,
			'si box'
		),
		anrghg_discrete_radio_button(
			3,
			'3',
			anrghg_input_setting(
				array(
					0,
					100,
					.05,
					'small',
				),
				'',
				'',
				__( 'Relative to root font size (rem)' ),
				'',
				$p_a_params,
				3
			),
			$p_a_params,
			0,
			'si box'
		)
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a timing function select box.
 *
 * @since 0.77.0
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return string $l_s_output
 */
function anrghg_timing_function_select(
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_select_setting(
		array(
			'linear'      => __( 'Evenly all along', 'anrghg' ),
			'ease-out'    => __( 'Start abruptly, end smoothly', 'anrghg' ),
			'ease'        => __( 'Start softly, end smoothly', 'anrghg' ),
			'ease-in-out' => __( 'Start and end smoothly', 'anrghg' ),
			'ease-in'     => __( 'Start smoothly, end abruptly', 'anrghg' ),
		),
		'',
		'',
		'',
		$p_a_params,
		$p_i_index
	);
	return $l_s_output;
}

/**
 * Generates a timing setting.
 *
 * @since 0.77.0
 * @since 0.81.7 Escape and echo instead of return.
 * Requires 6 settings keys listed in this order:
 *     '_fade_in_delay'
 *     '_fade_in_duration'
 *     '_fade_in_function'
 *     '_fade_out_delay'
 *     '_fade_out_duration'
 *     '_fade_out_function'
 * @param  array $p_a_params Settings keys and other parameters.
 * @param  int   $p_i_index  If not first in field.
 * @return void
 */
function anrghg_timing_setting(
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output = anrghg_fieldset(
		'',
		'',
		$p_a_params,
		anrghg_table(
			anrghg_input_setting(
				array(
					0,
					9999,
					10,
					'small',
				),
				'',
				sprintf(
					// Translators: %s: delay or duration.
					__( 'Fade-in %s', 'anrghg' ),
					// .
					__( 'delay', 'anrghg' )
				),
				__( 'milliseconds', 'anrghg' ),
				'',
				$p_a_params,
				$p_i_index
			),
			anrghg_input_setting(
				array(
					0,
					9999,
					10,
					'small',
				),
				'',
				sprintf(
					// Translators: %s: delay or duration.
					__( 'Fade-in %s', 'anrghg' ),
					// .
					__( 'duration', 'anrghg' )
				),
				anrghg_timing_function_select(
					$p_a_params,
					$p_i_index + 2
				),
				'',
				$p_a_params,
				$p_i_index + 1
			),
			anrghg_input_setting(
				array(
					0,
					9999,
					10,
					'small',
				),
				'',
				sprintf(
					// Translators: %s: delay or duration.
					__( 'Fade-out %s', 'anrghg' ),
					// .
					__( 'delay', 'anrghg' )
				),
				__( 'milliseconds', 'anrghg' ),
				'',
				$p_a_params,
				$p_i_index + 3
			),
			anrghg_input_setting(
				array(
					0,
					9999,
					10,
					'small',
				),
				'',
				sprintf(
					// Translators: %s: delay or duration.
					__( 'Fade-out %s', 'anrghg' ),
					// .
					__( 'duration', 'anrghg' )
				),
				anrghg_timing_function_select(
					$p_a_params,
					$p_i_index + 5
				),
				'',
				$p_a_params,
				$p_i_index + 4
			)
		)
	);
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}
