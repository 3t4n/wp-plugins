<?php
/**
 * Options page 2: Settings callback functions part 3.
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
 * Paragraph links section callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_paragraph_links_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'A direct link is visually prepended to every single paragraph and list item, also within blockquotes.', 'anrghg' )
	);
	anrghg_introduction(
		'',
		__( 'For stability, identifiers are based on HTML anchors if configured, on the content if not.', 'anrghg' ),
		__( 'Identical strings are disambiguated numerically.', 'anrghg' )
	);
}

/**
 * Activation field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_paragraph_links_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate' ),
		__( 'Links to paragraphs are added.', 'anrghg' ),
		__( 'No links are added to paragraphs.', 'anrghg' ),
		$p_a_params
	);
}

/**
 * Symbol field callback function.
 *
 * @since 0.27.2
 * @since 0.52.0 Select box for multiple presets.
 * @since 0.77.0 Remove less supported ⋇ (U+22C7), ∷ (U+2237), ⸪ (U+2E2A),
 * ⸫ (U+2E2B), ⸬ (U+2E2C), ⸭ (U+2E2D), ⁘ (U+2058), ⁙ (U+2059).
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_paragraph_link_character_select_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The character is prepended visually only, not in the text stream.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_symbol_select_input(
			array(
				'¶' => '¶ (U+00B6)',
				'⁋' => '⁋ (U+204B)',
				'❡' => '❡ (U+2761)',
				'⸿' => '⸿ (U+2E3F)',
				'ǁ' => 'ǁ (U+01C1)',
				'‖' => '‖ (U+2016)',
				'∥' => '∥ (U+2225)',
				'፠' => '፠ (U+1360)',
				'፨' => '፨ (U+1368)',
				'※' => '※ (U+203B)',
				'⁜' => '⁜ (U+205C)',
				'🔗' => '🔗 (U+1F517)',
				'§' => '§ (U+00A7)',
				'⁚' => '⁚ (U+205A)',
				'⁛' => '⁛ (U+205B)',
				'⁝' => '⁝ (U+205D)',
				'⁞' => '⁞ (U+205E)',
				'▶' => '▶ (U+25B6)',
				'◀' => '◀ (U+25C0)',
			),
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Plain tooltips field callback function.
 *
 * @since 0.71.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_paragraph_link_plain_tooltip_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate' ), // Label.
		__( 'Plain tooltip on hovering a link', 'anrghg' ), // On.
		__( 'No information added', 'anrghg' ), // Off.
		$p_a_params
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			'',
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
 * ID maximum length field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_paragraph_identifier_max_length_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			sprintf(
				// Translators: 1, 2: link tags to setting; 3: the ‘Localization’ section name.---This information is optionally collapsible or hidden.
				__( 'This setting overrides %1$s a similar one%2$s in the %3$s section.', 'anrghg' ),
				// .
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="#id_anrghg_fragment_identifier_max_length">',
				'</a>',
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="#localization">'
				. __( 'Localization', 'anrghg' )
				. '</a>'
			)
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				999,
				1,
				'small',
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
			__( 'Content-derived fragment IDs are cropped to the latest space.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'With a length set to zero, the IDs are entirely numeric.', 'anrghg' )
		)
	);
}

/**
 * Heading links section callback function.
 *
 * @since 0.60.0 Split off.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_heading_links_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Activate field callback function.
 *
 * @since 0.27.4
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_heading_links_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Make headings link text of their fragment identifier', 'anrghg' ),
		__( 'Headings are hyperlinked to their ID', 'anrghg' ),
		__( 'No ID is accessible on the headings', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Except when containing an endnote anchor, headings are used as link text of their fragment identifier.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The table of contents item of the heading is linked from the CSS counter heading number.', 'anrghg' )
		)
	);
}

/**
 * Plain tooltips field callback function.
 *
 * @since 0.73.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_heading_link_plain_tooltip_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate' ), // Label.
		__( 'Plain tooltip on hovering a link', 'anrghg' ), // On.
		__( 'No information added', 'anrghg' ), // Off.
		$p_a_params
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			'',
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
 * Table of contents section callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Activate table of contents field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '-1' ),
			array(
				__( 'Insert by default if applicable', 'anrghg' ),
				__( 'Insert on demand', 'anrghg' ),
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
			__( 'This switch has only two positions as there is a block, and another switch in the Post Meta box.', 'anrghg' )
		)
	);
}

/**
 * Minimum number of headings field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_min_number_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				1,
				9,
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
}

/**
 * Table of contents depth field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_depth_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				2,
				6,
				1,
				'tiny close-up-start',
			),
			'',
			array(
				// Translators: %s: the letter h to be completed by the number in the input field.
				sprintf( __( 'Until %s', 'anrghg' ), '<code class="surround">h</code>' ),
				'',
			),
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
			// Translators: %s: the 'h6' tag name.---This information is optionally collapsible or hidden.
			sprintf( __( 'By including all levels down to %s, dead-linked heading numbers are avoided.', 'anrghg' ), '<code>h6</code>' )
		),
		anrghg_paragraph(
			'description',
			// Translators: 1: the 'h1' tag name.---This information is optionally collapsible or hidden.
			sprintf( __( 'If %1$s are present in an article body, the table of contents will support them, although %1$s in the article body are bad for SEO, as is not using %1$s for the post title.', 'anrghg' ), '<code>h1</code>' )
		)
	);
}

/**
 * Heading number position field callback function.
 *
 * @since 0.35.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_heading_number_position_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '-1', '1', '0' ),
			array(
				sprintf(
					// Translators: %s: before or after.
					__( 'Number %s the heading', 'anrghg' ),
					// .
					_x( 'before', 'Number %s the heading', 'anrghg' )
				),
				sprintf(
					// Translators: %s: before or after.
					__( 'Number %s the heading', 'anrghg' ),
					// .
					_x( 'after', 'Number %s the heading', 'anrghg' )
				),
				__( 'Arrow after the heading to yield the backlink', 'anrghg' ),
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
			__( 'The heading numbering has 3 options, because beyond being added, heading numbers may be either prepended, or appended as an alternative with less layout impact.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'These numbers are generated by CSS counters and are not selectable.', 'anrghg' )
		)
	);
}

/**
 * Plain backlink tooltips field callback function.
 *
 * @since 0.73.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_heading_backlink_plain_tooltip_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate' ), // Label.
		__( 'Plain tooltip on hovering a backlink', 'anrghg' ), // On.
		__( 'No information added', 'anrghg' ), // Off.
		$p_a_params
	);
	echo wp_kses(
		anrghg_input_setting(
			'',
			'',
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
 * Table of contents label field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_label_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses( anrghg_input_setting( '', '', '', '', '', $p_a_params ), $p_a_params['user'] );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: the literal %s wrapped in a <code> element.
			sprintf( __( 'The optional placeholder %s inserts the post title.', 'anrghg' ), '<code>%s</code>' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'HTML formatting is fully supported.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'This option is also configurable per instance in the Post Meta box, in the block or block inspector, in the positioner code arguments.', 'anrghg' )
		)
	);
}

/**
 * Collapsing behavior field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_collapsing_cb( $p_a_params ) {
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
			__( 'This option is also configurable per instance in the Post Meta box, in the block or block inspector, in the positioner code arguments.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Expanding and collapsing may be triggered by clicking the label or the twistie next to it, without JavaScript.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'That toggle may also be actioned by clicking a heading backlink, on the condition that JavaScript is turned on.', 'anrghg' ),
			sprintf(
				// Translators: %s: `toggleChecked()`.---This information is optionally collapsible or hidden.
				__( 'JavaScript is also used in the AMP action %s involved in this process.', 'anrghg' ),
				'<code>toggleChecked()</code>'
			),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Without JavaScript, only the target item displays, and expanding the table takes another click.', 'anrghg' )
		)
	);
}

/**
 * Table of contents alignment field callback function.
 *
 * @since 0.39.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_alignment_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '-1', '0', '1', '' ),
			array(
				__( 'Left' ),
				__( 'Center' ),
				__( 'Right' ),
				__( 'Not set' ),
			),
			$p_a_params,
			0,
			3
		),
		$p_a_params['ok']
	);
}

/**
 * Default position of the table field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_position_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '0', '-1' ),
			array(
				__( 'Top' ),
				__( 'Before the first heading', 'anrghg' ),
				__( 'Bottom' ),
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
			__( 'The default position is ignored when a positioner is present in the article.', 'anrghg' )
		)
	);
}

/**
 * Code to manually position the table field callback function.
 *
 * @since 0.27.2
 * @since 0.47.0 Document attributes.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_positioner_name_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'medium close-up-start',
			'',
			array(
				'<code class="surround">[</code>',
				__( 'optional arguments', 'anrghg' ) . '<code class="surround">]</code>',
			),
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	$l_s_complex_sentence  = __( 'Label' );
	$l_s_complex_sentence .= '<code> _1=|.......|</code>';
	$l_s_complex_sentence .= C_S_ANRGHG_DASH;
	// Translators: %s: the literal %s wrapped in a <code> element.
	$l_s_complex_sentence .= sprintf( __( 'The optional placeholder %s inserts the post title.', 'anrghg' ), '<code>%s</code>' );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This may be any string in your script and language; the brackets are mandatory.', 'anrghg' )
		),
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The Block Editor has a block to automatically insert an invisible positioner in HTML if the feature is active.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The positioner configured here is for manual use only.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Argument names are preceded by a space and start with an underscore. Values are delimited by vertical bars. Both are designed for easy, script-independent input.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The equals sign may or may not be space-padded.', 'anrghg' )
		),
		anrghg_bullet_list(
			'arguments',
			'description',
			$l_s_complex_sentence,
			__( 'Alignment' ) . C_S_ANRGHG_DASH . '<code> _2=|0|</code> ' . _x( 'or', 'Uploader: Drop files here - or - Select Files' ) . '<code> _2=|center|</code>' . C_S_ANRGHG_DASH . '<code> _2=|-1| ' . _x( 'or', 'Uploader: Drop files here - or - Select Files' ) . '_2=|left|</code>' . C_S_ANRGHG_DASH . '<code> _2=|1| ' . _x( 'or', 'Uploader: Drop files here - or - Select Files' ) . '_2=|right|</code>',
			__( 'Collapsing', 'anrghg' ) . C_S_ANRGHG_DASH . '<code> _3=|-1|</code> ' . sprintf(
				// Translators: 1: ‘-1’; 2: ‘Expanded’; 3: ‘1’; 4: ‘Collapsed’; 5: ‘0’; 6: ‘Uncollapsible’.
				__( 'With %1$s for %2$s, %3$s for %4$s, and %5$s for %6$s.', 'anrghg' ),
				'<code>-1</code>',
				// .
				__( 'Expanded', 'anrghg' ),
				'<code>1</code>',
				__( 'Collapsed', 'anrghg' ),
				'<code>0</code>',
				__( 'Uncollapsible', 'anrghg' )
			)
		)
	);
}

/**
 * Heading URL ID prefix field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_heading_id_prefix_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'tiny',
			'',
			'',
			// Translators: %s: fallback character literal.
			sprintf( __( 'Empty falls back to ‘%s’.', 'anrghg' ), '<code>_</code>' ),
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
			__( 'Required to disambiguate heading fragment identifiers in the post and in the table of contents.', 'anrghg' )
		)
	);
}

/**
 * Top level heading font weight field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_top_heading_bold_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Highlight top level headings with bold', 'anrghg' ), // Label.
		sprintf(
			// Translators: %1$s: ‘Font weight’; %2$s: ‘bold’ or ‘normal’.
			__( '%1$s is %2$s.', 'anrghg' ), // On.
			// .
			__( 'Font weight' ),
			__( 'Bold' )
		),
		sprintf(
			// Translators: %1$s: ‘Font weight’; %2$s: ‘bold’ or ‘normal’.
			__( '%1$s is %2$s.', 'anrghg' ), // Off.
			// .
			__( 'Font weight' ),
			__( 'Normal' )
		),
		$p_a_params
	);
}

/**
 * Indentation field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_stepped_indentation_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Show hierarchy by progressive indentation', 'anrghg' ), // Label.
		__( 'Heading levels are indented.', 'anrghg' ), // On.
		__( 'Headings are vertically aligned.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Each level is indented by one step of a number of pixels defined next for desktop and for mobile.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Level 1 headings in the article body are irregular, bad for SEO and strongly discouraged.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Therefore, level 1 headings are excluded from indentation and would align with level 2 headings.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_table(
			anrghg_input_setting(
				array(
					0,
					100,
					1,
					'small',
				),
				'',
				__( 'Desktop' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				1
			),
			anrghg_input_setting(
				array(
					0,
					100,
					1,
					'small',
				),
				'',
				__( 'Mobile' ),
				__( 'Pixels (px)' ),
				'',
				$p_a_params,
				2
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Exclude labels of generated lists field callback function.
 *
 * @since 0.36.0
 * @since 0.59.0 Move from Complements to Table of contents,
 * include Reference list.
 * Change key name, invert meaning, change from glide switch
 * to a pair of radio buttons.
 * New implementation not relying on priority levels.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_table_of_contents_exclude_generated_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '0' ),
			array(
				__( 'Those labels mustn’t show up in the table of contents.', 'anrghg' ),
				__( 'These labels may be included in the table of contents.', 'anrghg' ),
			),
			$p_a_params,
			0,
			0
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'For the labels to be actually included, the table of contents’ priority level must be a greater figure than those of the features that should have their labels included.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: 1, 2: the block names ‘Notes and sources’ and ‘Reference list’.---This information is optionally collapsible or hidden.
				__( 'This switch works with the included ‘%1$s’ and ‘%2$s’ features. Other list labels may be controlled by adjusting the respective priority levels.', 'anrghg' ),
				// Block name.
				__( 'Notes and sources', 'anrghg' ),
				__( 'Reference list', 'anrghg' )
			)
		)
	);
}

/**
 * Priority level of fragment identifiers field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_fragment_identifiers_priority_select_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_priority_level_setting( $p_a_params );
}

/**
 * Notes and sources section callback function.
 *
 * @since 0.24.7
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Activate field callback function.
 *
 * @since 0.27.3
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complements_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Parse the content for inline delimiters', 'anrghg' ),
		sprintf(
			// Translators: %s: ‘Notes and sources’.
			__( '%s may be processed.', 'anrghg' ),
			// .
			__( 'Notes and sources', 'anrghg' )
		),
		__( 'Delimiters are disregarded.', 'anrghg' ),
		$p_a_params
	);
}

/**
 * Exclude posts field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complements_excluded_posts_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_description_textarea(
			'flat',
			array(
				__( 'The posts or pages enumerated below are not processed for complements.', 'anrghg' ),
				__( 'The format is a comma-separated list of post IDs.', 'anrghg' ),
				__( 'The ID of a post is found in the URL of its editor.', 'anrghg' ),
			),
			anrghg_paragraph(
				true,
				__( 'Please separate post IDs with a comma.', 'anrghg' ),
				__( 'Line breaks, tabs and spaces are ignored.', 'anrghg' )
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
			__( 'Alternatively, the related setting in the Post Meta box may be used to deactivate processing of individual posts and pages.', 'anrghg' )
		)
	);
}

/**
 * Delimiter syntax error warning field callback function.
 *
 * @since 0.77.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complements_syntax_warning_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '1', '-1', '0' ),
			array(
				__( 'Display a warning in the presence of an unbalanced opening delimiter', 'anrghg' ),
				__( 'Output in that case a hidden warning visible in the page source only', 'anrghg' ),
				__( 'Deactivate', 'anrghg' ),
			),
			$p_a_params,
			0,
			2
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: ‘anrghg-warning’.---This information is optionally collapsible or hidden.
			sprintf( __( 'If hidden, the warning is found by searching for ‘%s’ in the page source.', 'anrghg' ), 'anrghg-warning' )
		)
	);
}

/**
 * Note delimiters field callback function.
 *
 * @since 0.21.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_delimiter_preset_cb( $p_a_params ) {
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
			),
			anrghg_return_information(
				anrghg_paragraph(
					'description',
					// Translators: This information is optionally collapsible or hidden.
					__( 'Notes are processed last, listed first, and cannot be nested in sources (nor in themselves).', 'anrghg' )
				)
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Source delimiters field callback function.
 *
 * @since 0.21.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_source_delimiter_preset_cb( $p_a_params ) {
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
			__( 'Sources are processed first, listed last, and may be nested in notes (but not in themselves).', 'anrghg' )
		)
	);
}

/**
 * Name delimiters field callback function.
 *
 * @since 0.40.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_name_delimiter_preset_cb( $p_a_params ) {
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
			__( 'New complements reusable within a post are defined with a leading name, using the end delimiter only.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'At the start or the end of a complement, a reusable’s name goes without any delimiter but an ordinary space.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'These name delimiters are used in pairs to add text on either side, and when multiple named complements are reused in one instance.', 'anrghg' )
		)
	);
}

/**
 * Automatically cut posts into sections field callback function.
 *
 * @since 0.35.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_subheadings_as_section_dividers_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Use top-level subheadings as section dividers', 'anrghg' ),
		__( 'Each top-level subheading starts a new section from the second on.', 'anrghg' ),
		__( 'Subheadings do not affect how complements are processed.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The level of the top-level subheadings is determined automatically.', 'anrghg' )
		)
	);
}

/**
 * Process complements in widgets field callback function.
 *
 * @since 0.35.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_process_complements_in_widgets_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate' ),
		__( 'Each text widget’s content is processed separately.', 'anrghg' ),
		__( 'In widgets, complements are not processed except as part of the post content.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Parts of the post, like accordion sections, may be widgets.', 'anrghg' )
		)
	);
}

/**
 * Section end delimiter field callback function.
 *
 * @since 0.38.0
 * @since 0.47.0 Document attributes.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_section_end_name_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'medium close-up-start',
			'',
			array(
				'<code class="surround">[</code>',
				__( 'optional arguments', 'anrghg' ) . '<code class="surround">]</code>',
			),
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
			__( 'This may be any string in your script and language; the brackets are mandatory.', 'anrghg' )
		),
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The Block Editor has a block to automatically insert an invisible positioner in HTML if the feature is active.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The positioner configured here is for manual use only.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Argument names are preceded by a space and start with an underscore. Values are delimited by vertical bars. Both are designed for easy, script-independent input.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The equals sign may or may not be space-padded.', 'anrghg' )
		),
		anrghg_bullet_list(
			'arguments',
			'description',
			__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Notes', 'anrghg' ) . '<code> _11=|.......|</code> ' . __( 'Sources', 'anrghg' ) . '<code> _12=|.......|</code>',
			__( 'Text direction', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Notes', 'anrghg' ) . '<code> _21=|-1|</code> ' . __( 'Sources', 'anrghg' ) . '<code> _22=|-1|</code> ' . __( 'All' ) . '<code> _20=|-1|</code> '
			. sprintf(
				// Translators: 1: ‘-1’; 2: ‘Right to left’; 3: ‘1’; 4: ‘Left to right’.
				__( 'With %1$s for %2$s, and %3$s for %4$s.', 'anrghg' ),
				'<code>-1</code>',
				// Only available with 'editor button' context.
				_x( 'Right to left', 'editor button' ),
				'<code>1</code>',
				_x( 'Left to right', 'editor button' )
			),
			// Collapsing.
			__( 'Collapsing', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Notes', 'anrghg' ) . '<code> _31=|-1|</code> ' . __( 'Sources', 'anrghg' ) . '<code> _32=|-1|</code> ' . __( 'All' ) . '<code> _30=|-1|</code> ' . sprintf(
				// Translators: 1: ‘-1’; 2: ‘Expanded’; 3: ‘1’; 4: ‘Collapsed’; 5: ‘0’; 6: ‘Uncollapsible’.
				__( 'With %1$s for %2$s, %3$s for %4$s, and %5$s for %6$s.', 'anrghg' ),
				'<code>-1</code>',
				// .
				__( 'Expanded', 'anrghg' ),
				'<code>1</code>',
				__( 'Collapsed', 'anrghg' ),
				'<code>0</code>',
				__( 'Uncollapsible', 'anrghg' )
			),
			__( 'Footer deferral', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Yes' ) . '<code> _40=|1|</code> ' . __( 'No' ) . '<code> _40=|0|</code>'
		)
	);
}

/**
 * Priority level of complements field callback function.
 *
 * @since 0.36.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_priority_select_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_priority_level_setting( $p_a_params );
}

/**
 * Anchors (Notes and sources) section callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_anchors__notes_and_sources_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'These anchors are sometimes called referrers.', 'anrghg' )
	);
}

/**
 * Numbering system for notes field callback function.
 *
 * @since 0.69.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_numbering_system_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_numbering_system_setting( $p_a_params );
}

/**
 * Numbering system for sources field callback function.
 *
 * @since 0.69.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_source_numbering_system_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_numbering_system_setting( $p_a_params );
}

/**
 * Combine identical complements field callback function.
 *
 * @since 0.35.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_combine_identical_complements_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Activate' ),
		__( 'Notes or sources that are exactly the same are combined sectionwise.', 'anrghg' ),
		__( 'Each note or source is numbered and listed individually.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Assessment operates on finished strings because templates may be extended on either side.', 'anrghg' )
		)
	);
}

/**
 * Word joiner prefix field callback function.
 *
 * @since 0.68.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_anchor_prefix_word_joiner_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: %s: U+2060.---This information is optionally collapsible or hidden.
			sprintf( __( 'The word joiner %s is an invisible character preventing a line break.', 'anrghg' ), 'U+2060' )
		)
	);
	anrghg_echo_glide_switch(
		__( 'Prefix the anchor with a word joiner', 'anrghg' ), // Label.
		__( 'Word joiner is added.', 'anrghg' ), // On.
		__( 'Word joiner is missing.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The line may be broken in front of punctuation like opening parenthesis.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Starting the anchor with a word joiner solves this problem.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Old systems may not support the word joiner and display a .notdef box instead.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Therefore, adding a word joiner can be deactivated if unnecessary.', 'anrghg' )
		)
	);
}

/**
 * Bracketing characters field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_anchor_prefix_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'small align-end',
			__( 'Notes', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	echo wp_kses( '<span class="field-ellipsis">…</span>', $p_a_params['ok'] );
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
	echo wp_kses(
		anrghg_input_setting(
			'small align-end',
			__( 'Sources', 'anrghg' ),
			'',
			'',
			'',
			$p_a_params,
			2
		),
		$p_a_params['ok']
	);
	echo wp_kses( '<span class="field-ellipsis">…</span>', $p_a_params['ok'] );
	echo wp_kses(
		anrghg_input_setting(
			'small',
			'',
			'',
			'',
			'',
			$p_a_params,
			3
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Complement anchors may optionally be bracketed with distinctive strings to differentiate the two sorts of anchors: notes, sources.', 'anrghg' )
		),
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Adding paired punctuation is mandatory when anchors are not superscript as they mostly are in print and on the web.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Other options include prepending a letter or a word to note anchors, as source anchors are often left unadorned.', 'anrghg' )
		)
	);
}

/**
 * ARIA labels field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_note_anchor_aria_label_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'medium',
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
			'medium',
			__( 'Sources', 'anrghg' ),
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
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'For screen readers not to spell out a bare number out of context, the anchor numbers as link text are ARIA-hidden.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Instead, a full label is present to be read by screen readers.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The placeholder represents the note or source number.', 'anrghg' )
		)
	);
}

/**
 * Separator field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_adjacent_complement_anchor_separator_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'tiny',
			'',
			'',
			'',
			__( 'None' ),
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'As complements may occur in series, with the next start delimiter immediately following the preceding end delimiter, this character is automatically inserted to separate adjacent anchors.', 'anrghg' )
		),
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'If no separator should appear, please set this field to empty.', 'anrghg' )
		)
	);
}

/**
 * URL ID prefix field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_anchor_url_id_prefix_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'tiny',
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
			__( 'The anchor ID prefix is being used for disambiguation, but its uniqueness is checked, and fixed at runtime if necessary.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Characters from all Unicode blocks are allowed, non-ASCII will be percent-encoded by the browser.', 'anrghg' )
		)
	);
}

/**
 * Spacing field callback function.
 *
 * @since 0.68.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_complement_anchor_spacing_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'0',
				__( 'No spacing, close up', 'anrghg' ),
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
						5,
						.05,
						'small',
					),
					'',
					array(
						__( 'Padding' ) . C_S_ANRGHG_SPACE,
						C_S_ANRGHG_SPACE . __( 'Relative to parent font size (em)' ),
					),
					'',
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
				__( 'Prepend a justifying space to the anchor', 'anrghg' ),
				$p_a_params
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Some house styles may require spacing the anchors out.', 'anrghg' )
		)
	);
}
