<?php
/**
 * Options page 2: Settings textual information display.
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
 * Generates the expandable Latin acronym ARIA.
 *
 * @since 0.67.0
 * @return string
 */
function anrghg_expandable_aria() {
	return '<span class="expandable">A<span class="fulltext">ccessible </span>R<span class="fulltext">ich </span>I<span class="fulltext">nternet </span>A<span class="fulltext">pplications</span></span>';
}

/**
 * Whitelists the UI HTML for KSES.
 *
 * @since 0.81.7
 * @return array KSES whitelist.
 */
function anrghg_get_ui_whitelist() {
	return array(
		'a'        => array(
			'aria-label' => true,
			'class'      => true,
			'href'       => true,
			'tabindex'   => true,
			'target'     => true,
			'title'      => true,
		),
		'br'       => array(),
		'button'   => array(
			'class'   => true,
			'onclick' => true,
			'title'   => true,
			'type'    => true,
		),
		'code'     => array(
			'class' => true,
		),
		'datalist' => array(
			'id' => true,
		),
		'div'      => array(
			'aria-hidden'     => true,
			'autofocus'       => true,
			'class'           => true,
			'contenteditable' => true,
			'hidden'          => true,
			'id'              => true,
			'style'           => true,
			'tabindex'        => true,
		),
		'em'       => array(),
		'fieldset' => array(),
		'form'     => array(
			'action'   => true,
			'enctype'  => true,
			'method'   => true,
			'onsubmit' => true,
		),
		'h1'       => array(),
		'h2'       => array(
			'class'    => true,
			'id'       => true,
			'tabindex' => true,
		),
		'input'    => array(
			'aria-label'  => true,
			'autofocus'   => true,
			'checked'     => true,
			'class'       => true,
			'disabled'    => true,
			'id'          => true,
			'list'        => true,
			'max'         => true,
			'min'         => true,
			'name'        => true,
			'onkeyup'     => true,
			'placeholder' => true,
			'step'        => true,
			'type'        => true,
			'value'       => true,
		),
		'label'    => array(
			'aria-hidden' => true,
			'aria-label'  => true,
			'class'       => true,
			'for'         => true,
		),
		'legend'   => array(
			'aria-hidden' => true,
			'aria-label'  => true,
			'class'       => true,
		),
		'li'       => array(
			'class' => true,
		),
		'nav'      => array(
			'aria-labelledby' => true,
			'class'           => true,
		),
		'noscript' => array(),
		'ol'       => array(),
		'option'   => array(
			'aria-label' => true,
			'selected'   => true,
			'value'      => true,
		),
		'optgroup' => array(
			'label' => true,
		),
		'p'        => array(
			'class' => true,
		),
		'select'   => array(
			'class' => true,
			'id'    => true,
			'name'  => true,
		),
		'span'     => array(
			'class' => true,
			'id'    => true,
		),
		'strong'   => array(),
		'table'    => array(
			'class' => true,
			'id'    => true,
		),
		'tbody'    => array(),
		'td'       => array(
			'colspan' => true,
		),
		'textarea' => array(
			'class'       => true,
			'id'          => true,
			'name'        => true,
			'placeholder' => true,
		),
		'tr'       => array(
			'id' => true,
		),
		'ul'       => array(
			'class' => true,
		),
	);
}

/**
 * Whitelists HTML for UI elements with user input.
 *
 * @since 0.81.7
 * @return array
 */
function anrghg_get_ui_with_user_input_whitelist() {
	$l_a_ui_whitelist     = anrghg_get_ui_whitelist();
	$l_a_public_whitelist = anrghg_get_public_whitelist();
	foreach ( $l_a_ui_whitelist as $l_s_name => $l_a_atts ) {
		if ( array_key_exists( $l_s_name, $l_a_public_whitelist ) ) {
			$l_a_public_whitelist[ $l_s_name ] = array_merge( $l_a_public_whitelist[ $l_s_name ], $l_a_ui_whitelist[ $l_s_name ] );
		} else {
			$l_a_public_whitelist[ $l_s_name ] = $l_a_ui_whitelist[ $l_s_name ];
		}
	}
	return $l_a_public_whitelist;
}

/**
 * Generates the settings page table of contents.
 *
 * @since 0.75.0
 * @since 0.81.7 Escape and echo instead of return.
 * @param   array ...$p_a_sections Settings sections.
 * @return void
 */
function anrghg_settings_toc( ...$p_a_sections ) {
	$l_s_output  = "\r\n" . '<nav class="toc" aria-labelledby="a11y_toc_heading">';
	$l_s_output .= '<h2 class="screen-reader-text" id="a11y_toc_heading" tabindex="0">';
	$l_s_output .= __( 'Table of settings sections', 'anrghg' ) . "</h2>\r\n<ol>\r\n";
	foreach ( $p_a_sections as $l_s_section ) {
		$l_s_output .= $l_s_section;
	}
	$l_s_output .= "</ol></nav>\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
}

/**
 * Generates a section in the table of contents.
 *
 * @since 0.75.0
 * A subsection ID has two parts.
 * @see anrghg_add_settings_subsection()
 * @param  string $p_s_id             Section ID, required.
 * @param  string $p_s_heading        Section heading, required.
 * @param  mixed  ...$p_m_subsections Arrays, or boolean.
 * @return string $l_s_output
 */
function anrghg_toc_section( $p_s_id, $p_s_heading, ...$p_m_subsections ) {
	$l_s_subsecs = '';
	$l_s_class   = 'section';
	if ( ! empty( $p_m_subsections ) ) {
		foreach ( $p_m_subsections as $l_m_subsection ) {
			if ( true === $l_m_subsection ) {
				$l_s_class = 'quick-access';
			} else {
				$l_s_subsecs .= '<li class="subsec"><a href="#';
				$l_s_subsecs .= $l_m_subsection[0] . '__' . $p_s_id . '">';
				$l_s_subsecs .= $l_m_subsection[1] . ' (' . $p_s_heading . ")</a></li>\r\n";
			}
		}
	}
	$l_s_output = '<li class="' . $l_s_class . '"><a href="#' . $p_s_id;
	if ( 'quick-access' === $l_s_class ) {
		$l_s_output .= '" title="' . __( 'Quick access', 'anrghg' );
	}
	$l_s_output .= '">' . $p_s_heading . "</a></li>\r\n";
	$l_s_output .= $l_s_subsecs;
	return $l_s_output;
}

/**
 * Adds a settings section.
 *
 * @since 0.60.0
 * @param  string $p_s_label        Label.
 * @param  string $p_s_section_name ID.
 * @return void
 */
function anrghg_add_settings_section( $p_s_label, $p_s_section_name ) {
	add_settings_section( $p_s_section_name, $p_s_label, $p_s_section_name . '_cb', 'anrghg' );
}

/**
 * Adds a settings subsection.
 *
 * @since 0.75.0
 * @see anrghg_settings_toc()
 * @see anrghg_toc_section()
 * @param  string $p_s_label        Subsection label.
 * @param  string $p_s_over_label   Section label.
 * @param  string $p_s_section_name ID.
 * @return void
 */
function anrghg_add_settings_subsection( $p_s_label, $p_s_over_label, $p_s_section_name ) {
	add_settings_section(
		$p_s_section_name,
		$p_s_label . ' (' . $p_s_over_label . ')',
		$p_s_section_name . '_cb',
		'anrghg'
	);
}

/**
 * Generates the settings section link.
 *
 * @since 0.60.0
 * @since 0.61.0 Return instead of echo.
 * @since 0.81.7 Escape and echo instead of return.
 * @since 1.12.0 More fluid tab navigation by always skipping the section headings.
 * @since 1.13.0 Replicate Save button at section headings when full tab navigation is active.
 * @since 1.14.0 Save buttons: Display info in section headings on focus.
 * @since 1.14.0 Save buttons: Correct tab navigation by moving buttons before.
 * @since 1.14.0 Section headings: To the top functionality when full tab navigation is active.
 * The label itself is output by `add_settings_section()`,
 * here wrapped in `anrghg_add_settings_section()`.
 * @param  array $p_a_params Section heading and ID.
 * @return void
 */
function anrghg_settings_section_link( $p_a_params ) {
	if ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ) {
		$l_s_output = '<div class="submit section">';
		anrghg_kses_echo( $l_s_output );
		wp_nonce_field( 'anrghg_settings_nonce', 'anrghg_settings_nonce' );
		submit_button( __( 'Save Changes' ) );
		anrghg_kses_echo( "</div>\n\r" );
	}
	$l_s_ui_id   = substr( $p_a_params['id'], 7 );
	$l_s_output  = '<div class="base"><a aria-label="' . $p_a_params['title'] . C_S_ANRGHG_DASH;
	$l_s_output .= __( 'Section', 'anrghg' ) . '"'
	. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' );
	$l_s_output .= ' href="#' . ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? 'wpwrap' : $l_s_ui_id );
	$l_s_output .= '" class="link"></a>' . (
		anrghg_apply_config( 'anrghg_settings_tab_nav' ) ?
		// Translators: This string is not used if syncing with WordPress Core is active.
		'<div class="save-info">' . anrghg_i18n( __( 'Top' ) . C_S_ANRGHG_DASH . C_S_ANRGHG_DASH . __( 'Previous' ) . C_S_ANRGHG_DASH . __( 'Save Changes' ), __( 'To the top', 'anrghg' ) . C_S_ANRGHG_DASH . sprintf( __( 'Previous: %s', 'anrghg' ), __( 'Save Changes' ) ) ) . '</div>' :
		''
	) . '<span class="id" id="' . $l_s_ui_id . "\"></span></div>\n\r";
	anrghg_kses_echo( $l_s_output );
}

/**
 * Formats introductory text below a section heading.
 *
 * @since 0.60.5
 * @since 0.61.1 Return instead of echo.
 * @since 0.81.7 Escape and echo instead of return.
 * Helps cut information into smaller units for easier translation.
 * @param string $p_s_classes      Zero, one, or more space-separated CSS class names.
 * @param  array ...$p_a_sentences Content.
 * @return void
 */
function anrghg_introduction( $p_s_classes, ...$p_a_sentences ) {
	$l_s_output  = '<p class="anrghg';
	$l_s_output .= empty( $p_s_classes ) ? '' : ' ' . $p_s_classes;
	$l_s_output .= '">';
	$l_i_number  = count( $p_a_sentences );
	foreach ( $p_a_sentences as $l_i_index => $l_s_sentence ) {
		$l_s_output .= $l_s_sentence;
		$l_s_output .= $l_i_number - 1 !== $l_i_index ? C_S_ANRGHG_SPACE : '';
	}
	$l_s_output .= "</p>\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
}

/**
 * Adds a settings field.
 *
 * @since 0.60.0
 * For maintainability `$p_b_label_for` comes next to `$p_s_label` so
 * the assignation of `true` as its default value would be pointless.
 * @param  string $p_s_label        Label.
 * @param  string $p_b_label_for    `false` to unlink the field label.
 * @param  string $p_s_class_name   Mostly `main`, sometimes key name.
 * @param  string $p_s_section_name Visually sets off the `class` key.
 * @param  array  ...$p_a_keys      The field name is: `$p_a_keys[0]`.
 * @return void
 */
function anrghg_add_settings_field(
	$p_s_label,
	$p_b_label_for,
	$p_s_class_name,
	$p_s_section_name,
	...$p_a_keys
) {
	global $g_a_anrghg_config;
	$l_a_params['ok']        = anrghg_get_ui_whitelist();
	$l_a_params['user']      = anrghg_get_ui_with_user_input_whitelist();
	$l_a_params['name']      = _x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' );
	$l_a_params['urls']      = array(
		'templt' => admin_url( anrghg_cur_slug( 'templt' ) ),
		'config' => admin_url( anrghg_cur_slug( 'config' ) ),
		'export' => admin_url( anrghg_cur_slug( 'export' ) ),
		'import' => admin_url( anrghg_cur_slug( 'import' ) ),
		'conver' => admin_url( anrghg_cur_slug( 'conver' ) ),
	);
	$l_a_params['class']     = $p_s_class_name;
	$l_a_params['label']     = $p_s_label;
	$l_a_params['label_for'] = $p_b_label_for ? $p_a_keys[0] : '';
	foreach ( $p_a_keys as $l_i_index => $l_s_key ) {
		$l_a_params[ 'key_' . $l_i_index ] = $l_s_key;
		$l_a_params[ 'val_' . $l_i_index ] = $g_a_anrghg_config[ $l_s_key ];
	}
	add_settings_field(
		$p_a_keys[0],
		$p_s_label,
		$p_a_keys[0] . '_cb',
		'anrghg',
		$p_s_section_name,
		$l_a_params
	);
}

/**
 * Generates the settings field link.
 *
 * @since 0.60.0
 * @since 0.61.2 Return instead of echo.
 * @since 0.81.7 Escape and echo instead of return.
 * The symbol is very discreet at the top end of the field heading
 * but is visible without hovering. Clicking it takes you directly
 * to the field, for the link to be copied and used where it would
 * be needed.
 * @since 1.7.4 Highlight and advertise pinning functionality.
 *
 * Note: This function still uses the position scroll offset, from
 * before the time since when for public pages `scroll-margin-top`
 * is used.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_settings_field_link( $p_a_params ) {
	$l_s_output  = '<span class="anrghg base"><span class="anrghg id" id="id_' . $p_a_params['key_0'];
	$l_s_output .= '"></span>';
	$l_s_output .= '<a class="field-id" href="#id_' . $p_a_params['key_0'] . '" tabindex="-1"';
	$l_s_output .= ' title="' . __( 'Click to pin', 'anrghg' ) . "\"></a></span>\r\n";
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Generates a hidden preset saver.
 *
 * @since 0.70.0 For Post Meta box.
 * @see anrghg_metabox_save_prefill().
 * @since 1.4.7 Port to settings page.
 * @since 1.4.7 Centralize delimiter preset configuration.
 * @since 1.4.7 Get delimiter presets saved to the DB.
 * The preset is the delimiter’s default value that must be saved
 * to the database so as to become immutable, to avoid disrupting
 * existing installations when the default needs to be changed.
 * In Gutenberg, square brackets are used as a shortcut, for page link insertion.
 * Thus, these must not be used any longer to delimit inline sources or endnotes.
 * @param  array  $p_a_params Settings keys and other parameters.
 * @param  int    $p_i_index  If not first in field.
 * @return string $l_s_output
 */
function anrghg_save_preset(
	$p_a_params,
	$p_i_index = 0
) {
	$l_s_output  = '<input type="hidden" name="anrghg[' . $p_a_params[ 'key_' . $p_i_index ] . ']"';
	$l_s_output .= ' value="' . esc_attr( $p_a_params[ 'val_' . $p_i_index ] ) . '" />';
	return $l_s_output;
}

/**
 * Generates a fieldset with a versatile legend.
 *
 * @since 0.60.4
 * @since 0.61.0 Return instead of echo.
 * @since 0.61.3 Proper implementation (designed for a single call).
 * If the field label should not be a label for the 1st input field,
 * set the 2nd argument of `anrghg_add_settings_field()` to `false`,
 * then enclose the setting in a fieldset, with the field label as a
 * legend.
 * WordPress does that if the field is a radio button group, so that
 * the label of the field should not select that field, because that
 * would select the first radio button, not the entire button group.
 *
 * A custom screen reader text is passed as the first argument while
 * the class is empty.
 * For a visible custom legend instead, an appropriate class must be
 * passed as the second argument.
 * For the visible legend to be preceded, for screen readers, by the
 * field label, `$p_m_legend` must be set to be an array whose first
 * element is empty, and whose second element is the visible legend.
 * @param  mixed  $p_m_legend      String, or array with empty element.
 * @param  string $p_s_class       Of the legend. `top`, `description`.
 * @param  array  $p_a_params      Settings keys and other parameters.
 * @param  string ...$p_a_elements UI elements.
 * @return string $l_s_output
 */
function anrghg_fieldset(
	$p_m_legend,
	$p_s_class,
	$p_a_params,
	...$p_a_elements
) {
	$l_s_output = '<fieldset>';
	if ( 0 !== count( $p_a_params ) ) {
		$l_s_output .= '<legend' . ( $p_s_class ? ' class="' . $p_s_class . '"' : '' );
		if ( is_array( $p_m_legend ) ) {
			$l_s_output .= ' aria-label="' . $p_a_params['label'] . C_S_ANRGHG_DASH;
			$l_s_output .= $p_m_legend[1] . '" aria-hidden="true">' . $p_m_legend[1];
		} else {
			$l_s_output .= (
				$p_s_class ?
				'>' . $p_m_legend :
				' aria-label="' . ( $p_m_legend ? $p_m_legend : $p_a_params['label'] ) . '">'
			);
		}
		$l_s_output .= "</legend>\r\n";
	}
	foreach ( $p_a_elements as $l_s_element ) {
		$l_s_output .= $l_s_element;
	}
	$l_s_output .= "</fieldset>\r\n";
	return $l_s_output;
}

/**
 * Wraps information in a box that may be collapsible.
 *
 * @since 0.60.4
 * @since 0.61.0 Return instead of echo.
 * @since 0.62.12 Collapsing option.
 * @since 0.81.7 Call by wrappers only.
 * @since 1.5.5 Support for must-read information.
 * To be wrapped into `anrghg_return_information()` or `anrghg_echo_information()`.
 * The label must display as an inline-block.
 * @param  bool   $p_b_collapsible Box optionally hidden.
 * @param  array  $p_a_sentences   Content.
 * @return string $l_s_output
 */
function anrghg_information( $p_b_collapsible, $p_a_sentences ) {
	$l_s_output = '';
	if ( $p_b_collapsible ) {
		global $g_a_anrghg_config, $g_i_anrghg_infoblock_id;
		$l_s_infoblock_id  = 'infoblock_' . $g_i_anrghg_infoblock_id;
		$l_i_display_level = (int) $g_a_anrghg_config['anrghg_settings_display_information'];
		if ( 1 === $l_i_display_level ) {
			$l_s_output .= '<div><label for="' . $l_s_infoblock_id . '" class="expander" aria-label="';
			$l_s_output .= __( 'Expandable information', 'anrghg' ) . '" aria-hidden="true">ℹ</label></div>';
		}
		if ( 2 !== $l_i_display_level ) {
			$l_s_output .= '<input type="checkbox" class="display-toggle" id="';
			$l_s_output .= $l_s_infoblock_id . '" />';
		}
	}
	$l_s_output .= '<div class="information">';
	foreach ( $p_a_sentences as $l_s_element ) {
		$l_s_output .= "\r\n" . $l_s_element;
	}
	$l_s_output .= "</div>\r\n";
	if ( $p_b_collapsible ) {
		$g_i_anrghg_infoblock_id++;
	}
	return $l_s_output;
}

/**
 * Returns information in a box that may be collapsible.
 *
 * @since 0.81.7
 * @param  array  ...$p_a_sentences Content.
 * @return string $l_s_output
 */
function anrghg_return_information( ...$p_a_sentences ) {
	foreach ( $p_a_sentences as $l_s_element ) {
		$l_a_sentences[] = $l_s_element;
	}
	$l_s_output = anrghg_information( true, $l_a_sentences );
	return $l_s_output;
}

/**
 * Returns information in an always uncollapsible box.
 *
 * @since 1.5.5
 * @param  array  ...$p_a_sentences Content.
 * @return string $l_s_output
 */
function anrghg_return_must_read_information( ...$p_a_sentences ) {
	foreach ( $p_a_sentences as $l_s_element ) {
		$l_a_sentences[] = $l_s_element;
	}
	$l_s_output = anrghg_information( false, $l_a_sentences );
	return $l_s_output;
}

/**
 * Echoes information in a box that may be collapsible.
 *
 * @since 0.81.7
 * @param  array $p_a_params       Settings keys and other parameters.
 * @param  array ...$p_a_sentences Content.
 * @return void
 */
function anrghg_echo_information( $p_a_params, ...$p_a_sentences ) {
	foreach ( $p_a_sentences as $l_s_element ) {
		$l_a_sentences[] = $l_s_element;
	}
	$l_s_output = anrghg_information( true, $l_a_sentences );
	echo wp_kses( $l_s_output, $p_a_params['ok'] );
}

/**
 * Wraps sentences in a paragraph element.
 *
 * @since 0.60.4
 * @since 0.61.0 Option to concatenate an input field label (w/o p).
 * @since 0.62.5 Option to not add a space between sentences.
 *
 * Helps chop information into smaller units for easier translation.
 * May be called as an argument of `anrghg_echo_information()` or
 * `anrghg_return_information()`.
 * @param  string|bool $p_m_classes Also controls the output as follows.
 * Class name(s): Wrap in a p element. Separate sentences with a space.
 * Boolean true:  No p element.        Separate sentences with a space.
 * Boolean false: No p element. No space added when concatenating.
 * Empty:         No p element. No space added when concatenating.
 * @param  array       ...$p_a_sentences Content.
 * @return string      $l_s_output
 */
function anrghg_paragraph( $p_m_classes, ...$p_a_sentences ) {
	$l_s_output = ( ( is_string( $p_m_classes ) && ! empty( $p_m_classes ) ) ?
		'<p class="' . $p_m_classes . '">' :
		''
	);
	$l_i_number = count( $p_a_sentences );
	foreach ( $p_a_sentences as $l_i_index => $l_s_sentence ) {
		$l_s_output .= $l_s_sentence;
		$l_s_output .= ( $l_i_number - 1 !== $l_i_index && $p_m_classes ) ? C_S_ANRGHG_SPACE : '';
	}
	$l_s_output .= ( ( is_string( $p_m_classes ) && ! empty( $p_m_classes ) ) ? "</p>\r\n" : '' );
	return $l_s_output;
}

/**
 * Wraps bullet list items in their markup.
 *
 * @since 0.60.4
 * Called as an argument of `anrghg_return_information()`.
 * @param  string $p_s_ul_classes    List classes.
 * @param  string $p_s_li_classes    List item classes.
 * @param  array  ...$p_a_list_items List items.
 * @return string $l_s_output
 */
function anrghg_bullet_list( $p_s_ul_classes, $p_s_li_classes, ...$p_a_list_items ) {
	$l_s_output = '<ul class="' . $p_s_ul_classes . '">';
	foreach ( $p_a_list_items as $l_s_item ) {
		$l_s_output .= '<li class="' . $p_s_li_classes . '">' . $l_s_item . '</li>';
	}
	$l_s_output .= "</ul>\r\n";
	return $l_s_output;
}
