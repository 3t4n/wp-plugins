<?php
/**
 * Options page 1: Templates.
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
 * Template editor page callback function.
 *
 * @since 0.9.0
 * @since 0.61.0 Use the term ‘Templates’ instead of ‘Reusable complements’.
 * ‘Templates’ is appropriate and more common, and it’s localized by WP Core.
 * @return void
 */
function anrghg_reusables_page_cb() {
	global $g_a_anrghg_config, $g_a_anrghg_reuse, $g_a_anrghg_admin_page_titles;
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(
			wp_kses(
				sprintf(
					// Translators: %s: ‘the nonce’, or ‘the role’.
					__( 'There is a problem with %s.', 'anrghg' ),
					// .
					_x( 'the role', 'There is a problem with %s.', 'anrghg' )
				),
				array()
			),
			'',
			array(
				'back_link' => true,
			)
		);
	}
	if ( isset( $_POST['anrghg_templates_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_templates_nonce'] ), 'anrghg_templates_nonce' ) ) {
		wp_die(
			wp_kses(
				sprintf(
					// Translators: %s: ‘the nonce’, or ‘the role’.
					__( 'There is a problem with %s.', 'anrghg' ),
					// .
					_x( 'the nonce', 'There is a problem with %s.', 'anrghg' )
				),
				array()
			),
			'',
			array(
				'back_link' => true,
			)
		);
	}
	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error(
			'anrghg_templates_messages',
			'anrghg_templates_message',
			__( 'Your Templates have been updated.', 'anrghg' ),
			'success'
		);
	}
	settings_errors( 'anrghg_templates_messages' );

	/**
	 * Template editor internal CSS.
	 *
	 * @since 0.9.0
	 * @since 0.67.0 Fix display of TinyMCE color pickers.
	 */
	$l_s_scroll_offset       = 115 . 'px';
	$l_s_name_font_family    = 'sans-serif'; // monospace, sans-serif, serif.
	$l_s_content_font_family = 'sans-serif'; // monospace, sans-serif, serif.
	$l_i_name_width_value    = 200;
	$l_s_name_field_width    = ( $l_i_name_width_value + 7 ) . 'px';
	$l_s_new_name_width      = ( $l_i_name_width_value - 3 ) . 'px';
	$l_s_name_column_width   = $l_i_name_width_value . 'px';
	$l_s_empty_editor        = __( 'Content' );
	echo wp_kses( "\r\n<style>", array( 'style' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'css',
			"

				.mce-floatpanel.mce-popover.mce-bottom {
					max-width: min-content;
					margin-left: auto;
				}

				:root {
					--dark: #00400E;
					--a_hover: #8BFFA3;
				}

				h2 {
					margin: 10px 2px;
					font-size: 16px;
				}

				.offset-anchor {
					scroll-margin-top: $l_s_scroll_offset;
				}

				td {
					vertical-align: top;
					color: black;
				}

				td:last-child {
					width: 100%;
				}

				#new {
					height: 1px;
				}

				#new td:first-child {
					height: inherit;
					margin: 0;
				}

				div.flex {
					display: flex;
				}

				div.edit,
				textarea,
				input[type=text] {
					color: black;
					font-family: $l_s_content_font_family;
					font-size: 15px;
				}

				input[type=text] {
					font-family: $l_s_name_font_family;
					width: $l_s_name_field_width;
					margin: 0;
					padding-inline-end: 0;
				}

				#name {
					width: $l_s_new_name_width;
					margin-top: 3px;
				}

				div.edit,
				textarea {
					width: 100%;
					resize: vertical;
				}

				textarea {
					height: 80px;
				}

				textarea#editor {
					height: 273px;
				}

				#new textarea {
					height: 220px;
				}

				div.edit {
					min-height: 62px;
					max-width: 100%;
					padding: 6px 6px 2px;
					background: white;
					border: 1px solid #7E8993;
					border-radius: 4px;
					box-sizing: border-box;
					resize: vertical;
					overflow: auto;
					line-height: 1.3em;
				}

				div.edit:focus,
				textarea:focus,
				input[type=text]:focus {
					outline: 2px solid #09D260;
				}

				div.edit:empty::before {
					content: '$l_s_empty_editor';
					color: #72767D;
				}

				#use {
					height: 100%;
					width: $l_s_name_column_width;
					padding: 0 0 0 2px;
					overflow: auto;
					resize: vertical;
					line-height: 1.1em;
				}

				#caption {
					margin-top: 5px;
					color: #F24400;
					font-size: 88%;
					font-style: italic;
					white-space: nowrap;
				}

				#init,
				#len {
					visibility: collapse;
					height: 0;
				}

				.description a:hover {
					color: var(--dark);
					background: var(--a_hover);
				}

				.edit-button {
					text-align: end;
				}

				button.edit {
					cursor: pointer;
				}

				div.submit input#submit.button {
					position: fixed;
					bottom: 24px;
					right: 24px;
					z-index: 2147483647;
				}

				html[dir=rtl] div.submit input#submit.button {
					right: unset;
					left: 24px;
				}

				@media screen and (max-width: 782px) {

					div.submit input#submit.button {
						bottom: 7px;
						right: 7px;
					}

					html[dir=rtl] div.submit input#submit.button {
						right: unset;
						left: 7px;
					}

					td {
						display: block;
					}

					input[type=text] {
						width: 100%;
					}

				}

				div.bottom-spacer {
					height: 42px;
				}

			"
		)
	);
	echo wp_kses( "\r\n</style>\r\n", array( 'style' => true ) );

	/**
	 * Back up the templates.
	 *
	 * @since 0.9.0 Using `fopen()` and `fwrite()`.
	 * As this is done behind the scenes without user involvement,
	 * use of PHP file functions avoids logging into an FTP client
	 * but brings the need to add PHPCS whitelisting instructions.
	 * The usual safe wrappers `wp_fopen()` and `wp_fwrite()` seem
	 * to not exist.
	 * @since 1.4.6 Remove backup preview and bulk upload advice.
	 * @since 1.4.6 Fix uploads directory for multisite installations.
	 * @link https://stackoverflow.com/questions/35781410/wordpress-multisite-wp-upload-dir-wrong
	 * @link https://stackoverflow.com/a/70847759
	 * @link https://developer.wordpress.org/reference/functions/switch_to_blog/
	 */
	$l_a_upload_infos = wp_upload_dir();
	if ( is_multisite() ) {
		switch_to_blog( get_current_blog_id() );
		$l_a_upload_infos = wp_upload_dir();
		restore_current_blog();
	}
	$l_s_json = wp_json_encode( $g_a_anrghg_reuse, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
	if ( ! is_dir( $l_a_upload_infos['basedir'] . '/anrghg' ) ) {
		mkdir( $l_a_upload_infos['basedir'] . '/anrghg' );
	}
	if ( ! is_dir( $l_a_upload_infos['basedir'] . '/anrghg/templates' ) ) {
		mkdir( $l_a_upload_infos['basedir'] . '/anrghg/templates' );
	}
	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fopen
	$l_o_json = fopen( $l_a_upload_infos['basedir'] . '/anrghg/templates/anrghg-templates-latest.json', 'w' );
	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fwrite
	fwrite( $l_o_json, $l_s_json );
	if ( $g_a_anrghg_config['anrghg_keep_reusables_history'] ) {
		$l_s_datetime = current_time( 'Y-m-d\TH:i:sO' );
		// phpcs:disable Generic.Formatting.MultipleStatementAlignment
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fopen
		$l_o_json     = fopen( $l_a_upload_infos['basedir'] . "/anrghg/templates/anrghg-templates-$l_s_datetime.json", 'w' );
		// phpcs:enable Generic.Formatting.MultipleStatementAlignment
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fwrite
		fwrite( $l_o_json, $l_s_json );
	}

	/**
	 * Header menu.
	 */
	anrghg_header_menu( 'templt' );

	/**
	 * Start of page.
	 */
	$l_s_output  = "\r\n<div class=\"wrap\"><h1>";
	$l_s_output .= esc_html(
		'none' === $g_a_anrghg_config['anrghg_menu_level'] ?
		$g_a_anrghg_admin_page_titles['templt'] :
		get_admin_page_title()
	);
	$l_s_output .= '</h1>';

	/**
	 * Start of form.
	 */
	$l_s_output .= '<div id="scroll"></div>';
	$l_s_output .= '<form action="options.php" method="post"';
	if ( $g_a_anrghg_config['anrghg_template_editor_list_rich_text_view'] ) {
		$l_s_output .= ' onsubmit="return copyEditableDivs()"';
	}
	$l_s_output .= '>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	settings_fields( 'anrghg_reuse' ); // Security.

	/**
	 * Form body.
	 */
	do_settings_sections( 'anrghg_reuse' );
	$l_s_output  = '<div  class="bottom-spacer"></div>';
	$l_s_output .= '<div class="submit">';
	anrghg_kses_echo( $l_s_output );
	wp_nonce_field( 'anrghg_templates_nonce', 'anrghg_templates_nonce' );
	submit_button( __( 'Save Changes' ) );
	echo wp_kses( "</div></form></div><!--.wrap-->\r\n", anrghg_get_ui_whitelist() );
}

/**
 * Adds the Template editor page.
 *
 * @since 0.9.0
 * @return void
 */
add_filter(
	'admin_init',
	function() {
		$l_s_option_name  = 'anrghg_reuse';
		$l_s_option_group = $l_s_option_name;
		register_setting( $l_s_option_group, $l_s_option_name );
		$l_s_section = 'anrghg_reusables';
		add_settings_section(
			$l_s_section,
			_x( 'Add New', 'Template' ),
			$l_s_section . '_cb',
			'anrghg_reuse'
		);
		return;
	}
);

/**
 * Template editor & list section callback function.
 *
 * @since 0.9.0
 * @return void
 * The duplicate names check warns about no more than a single pair of duplicates
 * at a time, consistently with the real-world case scenario, not overloading the
 * edge cases with undisambiguated duplicate fragment identifiers.
 */
function anrghg_reusables_cb() {
	global $g_a_anrghg_config, $g_a_anrghg_reuse;

	/**
	 * Empty, duplicate, disintegrated name warnings.
	 *
	 * @since 0.9.0
	 */
	$l_b_warned = false;
	$l_s_output = '';
	foreach ( $g_a_anrghg_reuse['key'] as $l_i_index => $l_s_name ) {
		if ( empty( $l_s_name ) && ! empty( $g_a_anrghg_reuse['val'][ $l_i_index ] ) && ! $l_b_warned ) {
			$l_s_output .= "\r\n<div class='noname'><p><strong><em>";
			$l_s_output .= __( 'Missing name:', 'anrghg' );
			$l_s_output .= '</em></strong> ';
			// Translators: 1, 2: the tags of the anchor element linking to a list item.
			$l_s_output .= sprintf( __( '%1$sThis%2$s complement has no name.', 'anrghg' ), "<a href='#noname'>", '</a>' ) . '</p>';
			$l_s_output .= '<p>' . __( 'Please give it a name.', 'anrghg' ) . '</p></div>';
			$l_b_warned  = true;
		}
		if ( preg_match( '/\s/', $l_s_name ) && ! $l_b_warned ) {
			$l_s_output .= "\r\n<div class=\"problem\"><p><strong><em>";
			$l_s_output .= __( 'Name cannot be used:', 'anrghg' );
			$l_s_output .= '</em></strong> ';
			// Translators: 1, 2: the tags of the anchor element linking to a list item.
			$l_s_output .= sprintf( __( '%1$sThis%2$s name has space in it.', 'anrghg' ), "<a href='#problem'>", '</a>' ) . '</p>';
			$l_s_output .= '<p>' . __( 'Please replace the space, e.g. with an underscore.', 'anrghg' ) . '</p></div>';
			$l_b_warned  = true;
		}
	}
	$l_a_warn = array();
	foreach ( $g_a_anrghg_reuse['key'] as $l_i_index => $l_s_name ) {
		$l_i_lookup = $l_i_index;
		do {
			$l_i_lookup++;
			if ( ! isset( $g_a_anrghg_reuse['key'][ $l_i_lookup ] ) || empty( $l_s_name ) || $l_b_warned ) {
				break;
			}
			if ( $l_s_name === $g_a_anrghg_reuse['key'][ $l_i_lookup ] ) {
				$l_a_warn[] = $l_s_name;
				if ( $l_a_warn[0] === $l_s_name ) {
					$l_s_output .= "\r\n<div class='warn'><p><strong><em>";
					$l_s_output .= __( 'Warning duplicate name:', 'anrghg' );
					$l_s_output .= "</em></strong><span class='warn'> $l_s_name </span>";
					// Translators: 1, 2: the tags of the anchor element linking to a list item.
					$l_s_output .= sprintf( __( 'already used %1$shere%2$s.', 'anrghg' ), "<a href='#2$l_s_name'>", '</a>' ) . '</p>';
					$l_s_output .= '<p>' . __( 'Please change the new instance, to keep your previous content displayed.', 'anrghg' ) . '</p></div>';
					$l_b_warned  = true;
				}
			}
		} while ( true && ! $l_b_warned );
	}
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	if ( $l_b_warned ) {
		echo wp_kses( "\r\n<style>", array( 'style' => true ) );
		anrghg_protected_echo(
			anrghg_minilight(
				'css',
				'

					td.warn input[type=text] {
						font-weight: bold;
						color: #BE0022;
						background: #EDC800;
					}

					div.noname,
					div.warn,
					div.problem {
						border: 3px solid #A52435;
						padding: 5% 10%;
						margin: 5px;
					}

					div.noname {
						background: #B1A2FF;
					}

					div.warn {
						background: #C4FF00;
					}

					div.problem {
						background: #C0166E;
						color: white;
					}

					div.problem a {
						color: #7CC2EE;
					}

					div.noname p,
					div.warn p,
					div.problem p {
						font-size: 20px;
					}

					span.warn {
						font-weight: bold;
						font-family: monospace;
						font-size: 200%;
					}

				'
			)
		);
		echo wp_kses( "\r\n</style>\r\n", array( 'style' => true ) );
	}

	/**
	 * Template list table.
	 */
	$l_s_output = "\r\n<table class='complements'><tbody>";

	/**
	 * Row of the new template.
	 */
	$l_s_output .= '<tr id="new"><td><div id="use" tabindex="-1">';
	$l_s_output .= '<input type="text" id="name" name="anrghg_reuse[key][]" value=""';
	$l_s_output .= ' placeholder="' . __( 'Name', 'anrghg' ) . '" autocomplete="off"';
	if ( ! $l_b_warned ) {
		$l_s_output .= ' autofocus';
	}
	$l_s_output .= ' /><div id="caption">';
	$l_s_output .= __( 'Names in use, alphabetically ordered:', 'anrghg' ) . '</div>';
	foreach ( $g_a_anrghg_reuse['key'] as $l_s_name ) {
		if ( ! empty( $l_s_name ) ) {
			$l_a_names[] = $l_s_name;
		}
	}
	if ( ! empty( $l_a_names ) ) {
		sort( $l_a_names );
		$l_s_output .= implode( '<br />', $l_a_names );
	}
	$l_s_output .= "</div></td><td>\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_with_user_input_whitelist() );

	/**
	 * TinyMCE template editor.
	 *
	 * @since 0.19.0
	 * @since 0.70.0 Setting to switch to textarea.
	 */
	$l_s_output = '';
	if ( anrghg_apply_config( 'anrghg_template_editor_tinymce_active' ) ) {

		/**
		 * Swaps default behavior in TinyMCE to insert `<br />` tags on Enter.
		 *
		 * @since 0.20.2
		 * @link https://shellcreeper.com/wordpress-editor-tinymce-how-to-make-it-use-br-break-on-enter-instead-of-creating-p-paragraph/
		 * @link https://shellcreeper.com/?p=1041
		 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/tiny_mce_before_init
		 * @link http://www.tinymce.com/wiki.php/Configuration:forced_root_block
		 * Replace paragraph breaks with double line breaks in anchor tooltips.
		 * @since 0.64.0 Emulate paragraph breaks by spacing span.
		 * @since 0.70.0 Setting to control this behavior.
		 */
		if ( anrghg_apply_config( 'anrghg_template_editor_line_break_on_enter' ) ) {
			add_filter(
				'tiny_mce_before_init',
				function ( $l_a_settings ) {
					$l_a_settings['forced_root_block'] = false;
					return $l_a_settings;
				}
			);
		}

		/**
		 * Integrates Tiny Moxiecode Content Editor.
		 *
		 * @since 0.19.0
		 * @since 0.20.1.1 Advise to install the TinyMCE Color Picker plugin
		 * to enable fore- and background color formatting.
		 * @link https://wordpress.org/plugins/tinymce-colorpicker/
		 * @since 0.20.2 Switch off reliance on wpautop to get TinyMCE insert
		 * `<br />` tags on Shift+Enter.
		 * @link https://stackoverflow.com/questions/27508157/p-p-missing-with-wp-editor-get-option
		 * Restrict toolbar to functionalities working with typical inline complements.
		 * @link https://wordpress.stackexchange.com/questions/141708/tinymce-4-x-how-to-customize-toolbar-on-wp-editor
		 * @link https://www.tiny.cloud/blog/custom-font-sizes-in-tinymce/
		 * @see wp-includes/class-wp-editor.php:632..686
		 * @since 0.22.0 Super- and subscript, underline buttons in toolbar.
		 * Fore- and background color in the toolbar optional.
		 * Warn about installing TinyMCE Color Picker plugin.
		 * @link https://securityboulevard.com/2019/04/how-to-protect-wordpress-websites-from-sql-injection/
		 * @since 0.67.0 Fix color picker display bug affecting usability.
		 * @since 0.73.0 Display browser alert when editor not clean.
		 */
		$l_a_args = array(
			'textarea_name' => 'anrghg_reuse[val][]',
			'wpautop'       => false,
			'tinymce'       => array(
				'toolbar1' => 'link,bold,italic,superscript,subscript,underline,strikethrough',
				'toolbar2' => '',
				'toolbar3' => '',
			),
		);

		$l_a_args['tinymce']['toolbar1'] .= ',forecolor,backcolor,wpemoji,charmap,fontsizeselect';
		$l_a_args['tinymce']['toolbar1'] .= ',selectall,copy,cut,paste,pastetext,removeformat,undo,redo';
		if ( ! wp_is_mobile() ) {
			$l_a_args['tinymce']['toolbar1'] .= ',fullscreen,wp_help';
		}

		/**
		 * Calls TinyMCE.
		 */
		wp_editor( '', 'editor', $l_a_args );

		/**
		 * Sets up functionality of 'Move into editor' button.
		 *
		 * @since 0.80.6 Debug: Make button functional in Text mode too.
		 * @since 0.80.6 Mitigate a bug occurring when clicking the button after switching to Text mode.
		 * @link https://wordpress.stackexchange.com/questions/284817/how-to-replace-the-content-of-tinymce-editor-in-both-text-and-visual-mode-using
		 * @since 1.8.0 Revert to 0.80.5 due to a temporary switch alert bug.
		 * @since 1.8.1 Add pre-1.8.0 as an option, activated by default.
		 */
		$l_s_occupied_alert  = __( 'The template cannot be moved because the editor is not clean.', 'anrghg' );
		$l_s_occupied_alert .= ' ' . __( 'Please clear the name input field and the editor.', 'anrghg' );
		$l_s_switch_alert    = sprintf(
			// Translators: 1: Text; 2: Move into editor.
			__( 'Please do not switch to ‘%1$s’ mode before clicking the ‘%2$s’ button.', 'anrghg' ),
			_x( 'Text', 'Name for the Text editor tab (formerly HTML)' ),
			__( 'Move into editor', 'anrghg' )
		);
		$l_s_text_mode_alert = sprintf(
			// Translators: %s: ‘Text’, Name for the Text editor tab (formerly HTML).
			__( 'Currently this button cannot be used while in %s mode.', 'anrghg' ),
			_x( 'Text', 'Name for the Text editor tab (formerly HTML)' )
		);
		$l_s_text_mode_alert .= C_S_ANRGHG_DASH . sprintf(
			// Translators: 1: ‘Support Text mode for moving into editor’; 2: ‘Settings’.
			__( 'Please toggle the ‘%1$s’ switch in the %2$s.', 'anrghg' ),
			sprintf(
				// Translators: %s: ‘Text’, Name for the Text editor tab (formerly HTML).
				__( 'Support %s mode for moving into editor', 'anrghg' ), // Label.
				_x( 'Text', 'Name for the Text editor tab (formerly HTML)' )
			),
			__( 'Settings' )
		);
		echo wp_kses( "\r\n<!--'Move into editor' buttons--><script>", array( 'script' => true ) );
		if ( $g_a_anrghg_config['anrghg_template_editor_move_into_text_mode'] ) {

			anrghg_protected_echo(
				anrghg_minilight(
					'js',
					"

						function moveIntoEditor(index) {

							var nameItem    = document.getElementById('name' + index);
							var contentItem = document.getElementById('content' + index);

							var name    = nameItem.value;
							var content = contentItem.innerHTML;

					"
				)
			);
			if ( $g_a_anrghg_config['anrghg_template_editor_unescape_pointy_brack'] ) {
				anrghg_protected_echo(
					"content = content.replace(/&lt;/g, '"
				);
				echo '<';
				anrghg_protected_echo(
					"'); content = content.replace(/&gt;/g, '>');"
				);
			}
			anrghg_protected_echo(
				anrghg_minilight(
					'js_with_alert',
					"
							var nameInput    = document.getElementById('name');
							var nameSet      = nameInput.value;
							var contentInput = '';
							var contentSet   = '';

							var editor = tinymce.get('editor');

							if ( editor !== null ) /*may be Visual*/ {
								contentSet = editor.getContent();
							} else /*is Text*/ {
								contentInput = document.getElementById('editor');
								contentSet   = contentInput.value;
							}

							if ( nameSet === '' && contentSet === '' ) {
								nameInput.value = name;

								if ( editor === null ) /*is Text*/ {
									contentInput.value = content;
									if ( nameInput.value === name && contentInput.value === content ) {
										nameItem.value        = '';
										contentItem.innerHTML = '';
									}

								} else /*may be Visual*/ {

									if ( getUserSetting('editor') === 'tinymce' ) {
										editor.setContent(content);
										if ( nameInput.value === name && editor.getContent() === content ) {
											nameItem.value        = '';
											contentItem.innerHTML = '';
										}

									} else {
										contentInput.value = content;
										if ( nameInput.value === name && contentInput.value === content ) {
											nameItem.value        = '';
											contentItem.innerHTML = '';
										} else {
											alert( '$l_s_switch_alert' );
										}

									}

								}

								document.getElementById('scroll').scrollIntoView();

							} else {
								alert( '$l_s_occupied_alert' );
							}

						}

					"
				)
			);

		} else {

			anrghg_protected_echo(
				anrghg_minilight(
					'js_with_alert',
					"

						function moveIntoEditor(index) {

							var editor  = tinymce.get('editor');
							if ( editor === null ) /*is Text*/ {
								alert( '$l_s_text_mode_alert' );
								editor = 'x';
							} else {
								if ( editor.getContent() === '' && document.getElementById('name').value === '' ) {
									document.getElementById('name').value =
									document.getElementById('name' + index).value;
									document.getElementById('name' + index).value = '';
									var content = document.getElementById('content' + index).innerHTML;
					"
				)
			);
			if ( $g_a_anrghg_config['anrghg_template_editor_unescape_pointy_brack'] ) {
				anrghg_protected_echo(
					"content = content.replace(/&lt;/g, '"
				);
				echo '<';
				anrghg_protected_echo(
					"'); content = content.replace(/&gt;/g, '>');"
				);
			}
			anrghg_protected_echo(
				anrghg_minilight(
					'js_with_alert',
					"
									editor.setContent(content);
									document.getElementById('content' + index).innerHTML = '';
									document.getElementById('scroll').scrollIntoView();

								} else {
									alert( '$l_s_occupied_alert' );
								}
							}

						}

					"
				)
			);
		}
		echo wp_kses( "\r\n</script>\r\n", array( 'script' => true ) );
	} else {
		$l_s_output .= '<textarea name="anrghg_reuse[val][]" placeholder="';
		$l_s_output .= __( 'Content' );
		$l_s_output .= '"></textarea>';
	}
	$l_s_output .= '</td></tr></tbody></table>';

	/**
	 * Existing complement list.
	 *
	 * @since 0.9.0
	 * @since 0.61.0 Second subheading.
	 */
	$l_s_output .= '<h2>';
	$l_s_output .= __( 'Template Editing' );
	$l_s_output .= '</h2><table><tbody>';
	$l_i_number  = 0;
	$l_i_warn    = 0;
	$l_b_init    = true;
	$l_b_fix     = false;
	foreach ( $g_a_anrghg_reuse['key'] as $l_i_index => $l_s_name ) {
		if ( ! empty( $l_s_name ) || ! empty( $g_a_anrghg_reuse['val'][ $l_i_index ] ) ) {
			$l_s_output .= "\r\n<tr><td";
			if ( empty( $l_s_name ) ) {
				$l_s_output .= ' class="warn"';
				if ( $l_i_warn < 1 ) {
					$l_i_warn    = 1;
					$l_b_fix     = true;
					$l_s_output .= "><span class='offset-anchor' id='noname'></span";
				}
			}
			if ( preg_match( '/\s/', $l_s_name ) ) {
				$l_s_output .= ' class="warn"';
				if ( $l_i_warn < 1 ) {
					$l_i_warn    = 1;
					$l_b_fix     = true;
					$l_s_output .= "><span class='offset-anchor' id='problem'></span";
				}
			}
			if ( isset( $l_a_warn ) ) {
				if ( in_array( $l_s_name, $l_a_warn, true ) && $l_i_warn < 2 ) {
					$l_i_warn++;
					$l_b_fix     = true;
					$l_s_output .= " class='warn'><span class='offset-anchor' id='$l_i_warn$l_s_name'></span";
				}
			}
			$l_s_output .= '><input type="text" id="name' . $l_i_index . '" name="anrghg_reuse[key][]" value="';
			$l_s_output .= $l_s_name . '" placeholder="' . __( 'Name', 'anrghg' ) . '" autocomplete="off"';
			if ( $l_b_fix ) {
				$l_s_output .= ' autofocus';
				$l_b_fix     = false;
			}
			$l_s_output .= ' /><div class="edit-button"><button type="button" class="edit"';
			$l_s_output .= ' title="' . __( 'You may edit the text area opposite.', 'anrghg' );
			if ( ! $g_a_anrghg_config['anrghg_template_editor_move_into_text_mode'] ) {
				$l_s_output .= "\r\n\r\n" . sprintf(
					// Translators: %s: ‘Text’, Name for the Text editor tab (formerly HTML).
					__( 'Currently this button cannot be used while in %s mode.', 'anrghg' ),
					_x( 'Text', 'Name for the Text editor tab (formerly HTML)' )
				);
			}
			$l_s_output .= '" onclick="moveIntoEditor(\'' . $l_i_index . '\')">';
			$l_s_output .= __( 'Move into editor', 'anrghg' ) . '</button></div></td><td>';
			if ( $g_a_anrghg_config['anrghg_template_editor_list_rich_text_view'] ) {
				if ( $l_b_init ) {
					$l_s_output .= '<div id="init">' . $l_i_index . '</div>';
					$l_s_output .= '<div id="len">' . count( $g_a_anrghg_reuse['key'], COUNT_RECURSIVE ) . '</div>';
					$l_b_init    = false;
				}
				$l_s_output .= '<div contenteditable class="edit" id="content' . $l_i_index;
				$l_s_output .= '">' . $g_a_anrghg_reuse['val'][ $l_i_index ] . '</div>';
				$l_s_output .= '<input type="hidden" id="save' . $l_i_index . '" />';
				$l_s_output .= '<textarea class="content" id="fallback' . $l_i_index;
				$l_s_output .= '" name="anrghg_reuse[val][]" placeholder="' . __( 'Content' ) . '">';
				$l_s_output .= $g_a_anrghg_reuse['val'][ $l_i_index ] . '</textarea>';
			} else {
				$l_s_output .= '<textarea id="content' . $l_i_index;
				$l_s_output .= '" name="anrghg_reuse[val][]" placeholder="' . __( 'Content' ) . '">';
				$l_s_output .= $g_a_anrghg_reuse['val'][ $l_i_index ] . '</textarea>';
			}
			$l_s_output .= "</td></tr>\r\n";
			$l_i_number++;
		}
	}
	$l_s_output .= '</tbody></table>';
	echo wp_kses( $l_s_output, anrghg_get_ui_with_user_input_whitelist() );

	/**
	 * Adapt page to JavaScript disabled status.
	 *
	 * @since 0.20.0
	 */
	echo wp_kses(
		"\r\n<noscript><style>",
		array(
			'noscript' => true,
			'style'    => true,
		)
	);
	anrghg_protected_echo(
		anrghg_minilight(
			'css',
			'

				button.edit,
				div.edit {
				  display: none;
				}

				textarea#editor {
				  height: 374px;
				  border: 1px solid #7E8993;
				  border-radius: 4px;
				  font-size: 15px;
				}

				#use {
				  height: 340px;
				}

			'
		)
	);
	echo wp_kses(
		"</style></noscript>\r\n",
		array(
			'noscript' => true,
			'style'    => true,
		)
	);

	/**
	 * Template editor internal JavaScript.
	 *
	 * @since 0.20.2
	 * Manages getting content saved out of editable divs.
	 * The condition is only to get rid of a pointless console error message.
	 */
	if ( $g_a_anrghg_config['anrghg_template_editor_list_rich_text_view'] ) {
		echo wp_kses( "\r\n<!--editable divs--><script>", array( 'script' => true ) );
		anrghg_protected_echo(
			anrghg_minilight(
				'js',
				"

					window.onload = function() {
						var areas = document.getElementsByClassName('content');
						for ( let i = 0; areas.length > i; i++ ) {
							areas[i].style.display = 'none';
						}
					};

					function copyEditableDivs() {
						const init = document.getElementById('init').innerHTML;
						const len  = document.getElementById('len').innerHTML;
						for ( let index = init; ( init + len - 1 ) > index; index++ ) {
							if ( document.getElementById('content' + index) !== null ) {
								let content = document.getElementById('content' + index).innerHTML;
				"
			)
		);
		if ( $g_a_anrghg_config['anrghg_template_editor_unescape_pointy_brack'] ) {
			anrghg_protected_echo(
				"content = content.replace(/&lt;/g, '"
			);
			echo '<';
			anrghg_protected_echo(
				"'); content = content.replace(/&gt;/g, '>');"
			);
		}
		anrghg_protected_echo(
			anrghg_minilight(
				'js',
				"
								document.getElementById('save' + index).value = content;
								document.getElementById('fallback' + index).removeAttribute('name');
								document.getElementById('save' + index).setAttribute('name', 'anrghg_reuse[val][]');
							}
						}
						return true;
					}

				"
			)
		);
		echo wp_kses( "\r\n</script>\r\n", array( 'script' => true ) );
	}

	/**
	 * Displays current number of stored templates.
	 *
	 * @since 0.9.0
	 * @since 0.81.7 Escape and echo instead of merely echo.
	 */
	$l_s_output = '<p class="number">';
	if ( 0 === $l_i_number ) {
		$l_s_output .= __( 'No templates yet.', 'anrghg' );
	} else {
		// Translators: %d: the number of registered templates.
		$l_s_output .= sprintf( _n( 'You have %d template.', 'You have %d templates.', $l_i_number, 'anrghg' ), $l_i_number );
	}
	$l_s_output .= '</p>';
	anrghg_kses_echo( $l_s_output );
}
