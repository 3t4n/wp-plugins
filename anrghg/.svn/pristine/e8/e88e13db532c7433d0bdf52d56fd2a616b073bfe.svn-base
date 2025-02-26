<?php
/**
 * Options page 3: Converters.
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
 * ANRGHG conversion page callback function.
 *
 * @since 0.24.6
 * Initially a test environment to try to implement a concept from @erling007.
 * @reporter** @erling007
 * @link https://wordpress.org/support/topic/transforming-older-source-list-to-footnotes-plugin/
 * @since 0.33.0 Demo.
 * @since 0.76.0 Conversion tool Word ➔ WordPress with plugin-compatible footnotes (provisional).
 * @reporter** @russianicons
 * @link https://wordpress.org/support/topic/counter-styles-not-working/#post-13765309
 * @link https://wordpress.org/support/topic/counter-styles-not-working/#post-13766584
 * @link https://wordpress.org/support/topic/counter-styles-not-working/page/2/#post-13771755
 * There is the NoteStripper plugin for Word that already does the conversion.
 * @link https://wordpress.org/support/topic/convert-ms-word-footnotes-to-easy-footnotes/
 * @link http://www.editorium.com/15078.htm
 * Whether it’s convenient is another (unanswered) question.
 * @link https://wordpress.org/support/topic/counter-styles-not-working/page/2/#post-13800538
 * @return void
 */
function anrghg_conversion_page_cb() {
	global $g_a_anrghg_config, $g_a_anrghg_admin_page_titles;
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
	if ( isset( $_POST['anrghg_convert_save_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_convert_save_nonce'] ), 'anrghg_convert_save_nonce' ) ) {
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
			'anrghg_convert_messages',
			'anrghg_convert_message',
			__( 'Changes saved.' ),
			'success'
		);
	}
	settings_errors( 'anrghg_convert_messages' );

	/**
	 * Conversion page internal CSS.
	 */
	$l_s_name_font_family    = 'sans-serif'; // monospace, sans-serif, serif.
	$l_s_content_font_family = 'sans-serif'; // monospace, sans-serif, serif.
	$l_i_name_width_value    = 200;
	$l_s_name_field_width    = ( $l_i_name_width_value + 7 ) . 'px';
	$l_s_name_column_width   = $l_i_name_width_value . 'px';
	$l_s_empty_editor        = __( 'Content' );
	echo wp_kses( "\r\n<style>", array( 'style' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'css',
			"

			:root {
				--clear: #FFF;
				--inactive: #E7E7E7;
				--border: #006EBF;
				--edit: #7E8993;
				--empty: #72767D;
				--focus: #09D260;
				--h00: #8BFFA300;
				--h66: #8BFFA366;
				--hff: #8BFFA3FF;
			}

				h2 {
					margin: 10px 2px;
					font-size: 16px;
				}

				h2.section {
					border-top: 3px solid var(--border);
					padding-top: 10px;
					font-size: 25px;
					line-height: 1em;
					z-index: 99;
				}

				div.h2 {
					background: linear-gradient(to right, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
				}

				html[dir=rtl] div.h2 {
					background: linear-gradient(to left, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
				}

				p.section {
					margin-inline-start: 7px;
					margin-bottom: 3px;
				}

				td {
					vertical-align: top;
					color: black;
				}

				td:last-child {
					width: 100%;
				}

				div.edit,
				textarea,
				input[type=text] {
					color: black;
					font-family: $l_s_content_font_family;
					font-size: 15px;
					margin-inline-start: -4px;
				}

				input[type=text] {
					font-family: $l_s_name_font_family;
					width: $l_s_name_field_width;
					margin: 0;
					padding-inline-end: 0;
				}

				div.edit,
				textarea {
					width: 100%;
					resize: vertical;
				}

				textarea {
					height: 80px;
				}

				#input textarea {
					height: 362px;
					margin-bottom: -4px;
					padding: 6px 6px 2px;
				}

				div.edit {
					min-height: 362px;
					max-width: 100%;
					padding: 6px 6px 2px;
					background: white;
					border: 1px solid var(--edit);
					border-radius: 4px;
					box-sizing: border-box;
					resize: vertical;
					overflow: auto;
					line-height: 1.3em;
				}

				div.edit:focus,
				textarea:focus,
				input[type=text]:focus {
					outline: 3px solid var(--focus);
				}

				div.edit:empty::before {
					content: '$l_s_empty_editor';
					color: var(--empty);
				}

				div.submit {
					position: fixed;
					bottom: -8px;
					width: 0;
					margin-top: -30px;
				}

				button.command {
					margin-inline-start: 5px;
					cursor: pointer;
				}

				button.view {
					padding: 0 15px;
					height: 30px;
					border-radius: 0;
					margin: 10px 4px -5px;
					cursor: pointer;
					outline: none;
				}

				div#text {
					display: none;
				}

				#visual-tab {
					background: var(--clear);
					border-width: 4px;
				}

				#text-tab {
					background: var(--inactive);
					border-width: 1px;
				}

				div.bottom-spacer {
					height: 42px;
				}

			"
		)
	);
	echo wp_kses( "\r\n</style>\r\n", array( 'style' => true ) );

	/**
	 * Header menu.
	 */
	anrghg_header_menu( 'conver' );

	/**
	 * Start of form.
	 */
	$l_s_output  = "\r\n<div class=\"wrap\"><h1>";
	$l_s_output .= esc_html(
		'none' === $g_a_anrghg_config['anrghg_menu_level'] ?
		$g_a_anrghg_admin_page_titles['conver'] :
		get_admin_page_title()
	);
	$l_s_output .= '</h1>';

	/**
	 * Import conversion form.
	 */
	$l_s_output .= '<div class="h2"><h2 class="section">' . __( 'Import conversion' ) . '</h2></div>';
	$l_s_output .= '<p>';
	// This text is provisional only and shall be removed.
	$l_s_output .= 'This form to import a .docx file is currently provisional for an upcoming feature.' . C_S_ANRGHG_SPACE;
	$l_s_output .= '</p>';
	$l_s_output .= '<form method="post" enctype="multipart/form-data">';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	settings_fields( 'anrghg_convert' ); // Security.
	$l_s_output  = '<div class="import">';
	$l_s_output .= '<input type="file" name="import_file" style="position: relative;" />';
	$l_s_output .= '<input type="hidden" name="anrghg_action" value="import_docx" />';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	wp_nonce_field( 'anrghg_convert_file_nonce', 'anrghg_convert_file_nonce' );
	submit_button( __( 'Import' ) );
	$l_s_output = "</div></form>\r\n";

	/**
	 * Input conversion form.
	 */
	$l_s_output .= '<div class="h2"><h2 class="section">' . __( 'Input conversion' ) . '</h2></div>';
	$l_s_output .= '<form action="options.php" method="post"';
	$l_s_output .= ' onsubmit="return copyEditableDiv()">';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	settings_fields( 'anrghg_convert' ); // Security.
	do_settings_sections( 'anrghg_convert' );
	$l_s_output  = '<div  class="bottom-spacer"></div>';
	$l_s_output .= '<div class="submit">';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	wp_nonce_field( 'anrghg_convert_save_nonce', 'anrghg_convert_save_nonce' );
	submit_button( __( 'Save Changes' ) );
	echo wp_kses( "</div></form></div><!--.wrap-->\r\n", anrghg_get_ui_whitelist() );
}

/**
 * Adds the conversion page.
 *
 * @since 0.24.6
 * @return void
 */
add_filter(
	'admin_init',
	function() {
		$l_s_option_name  = 'anrghg_convert';
		$l_s_option_group = $l_s_option_name;
		register_setting( $l_s_option_group, $l_s_option_name );
		$l_s_section = 'anrghg_conversion';
		add_settings_section(
			$l_s_section,
			__( 'Convert hand-formatted or markdown-style notes to inline complements', 'anrghg' ),
			$l_s_section . '_cb',
			'anrghg_convert'
		);
		return;
	}
);

/**
 * Conversion page section callback function.
 *
 * @since 0.24.6
 * @return void
 */
function anrghg_conversion_cb() {
	global $g_a_anrghg_config;
	$l_s_output         = '';
	$l_s_anrghg_convert = get_option( 'anrghg_convert' );
	if ( null === $l_s_anrghg_convert ) {
		$l_s_anrghg_convert = '';
	}
	if ( empty( $l_s_anrghg_convert ) ) {
		// This text is provisional only and shall be removed.
		$l_s_anrghg_convert = '<div>This is still a demo to illustrate the idea.</div><div><br></div><div>On clicking ‘Convert’, each anchor should be replaced with its text.</div><div><br></div><div>Text(1) about(2) subject(1) matter.(3)</div><div><br></div><div>(1) First source.</div><div>(2) Second source.</div><div>(3) Third source.</div><div><br></div><div>At this point, prior to converting the content, it is recommended to save it by clicking the ‘Save’ button at the bottom of the window. It can then be restored by reloading this page.</div><div><br></div><div>To see this message again, please save the form emptied in text mode.</div>';
	}
	// This text is provisional only and shall be removed.
	$l_s_output .= '<p class="section">Carets and colons are not mandatory, but at this point only numeric identifiers shall be supported, and both square brackets and parentheses.<br />';
	$l_s_output .= 'Alternatively, the sources may be in a (numbered) HTML list.</p>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );

	/**
	 * Conversion form JavaScript.
	 *
	 * @since 0.24.6 Internal.
	 * @since 0.81.7 Enqueue.
	 * Enqueuing does not work. Internal kept as a fallback.
	 */
	add_filter(
		'admin_enqueue_scripts',
		function() {
			global $pagenow;
			if ( false !== strpos( anrghg_cur_slug( 'conver' ), $pagenow ) ) {
				return;
			}
			wp_register_script(
				'anrghg-admin-convert',
				plugin_dir_url( __FILE__ ) . 'convert.js',
				array(),
				C_S_ANRGHG_VER,
				false
			);
			wp_enqueue_script( 'anrghg-admin-convert' );
		}
	);
	// Cannot use wp_remote_get() since this performs an HTTP request.
	// phpcs:ignore
	$l_s_script = file_get_contents( plugin_dir_url( __FILE__ ) . 'convert.js' );
	$l_s_script = anrghg_minilight( 'js', $l_s_script );
	// Fallback script cannot be escaped. Leaving as-is until enqueue works.
	// phpcs:ignore
	echo "\r\n<!--convert--><script>\r\n" . $l_s_script . "\r\n</script>\r\n";

	/**
	 * Delimiters.
	 */
	$l_s_output  = '<div hidden id="delimiter_start">' . anrghg_apply_config( 'anrghg_source_start' ) . '</div>';
	$l_s_output .= '<div hidden id="delimiter_end">' . anrghg_apply_config( 'anrghg_source_end' ) . '</div>';

	/**
	 * Conversion editor.
	 */
	$l_s_output .= '<button type="button" class="view" id="visual-tab" onclick="viewVisual()">';
	$l_s_output .= __( 'Visual Editor' ) . '</button>';
	$l_s_output .= '<button type="button" class="view" id="text-tab" onclick="viewText()">';
	$l_s_output .= __( 'Text' ) . '</button>';
	$l_s_output .= '<div hidden id="mode">visual</div>';
	$l_s_output .= "\r\n<table class='conversion'><tbody>";
	$l_s_output .= '<tr id="input">';
	$l_s_output .= "<td></td><td>\r\n";
	$l_s_output .= '<div id="visual">';
	$l_s_output .= '<div contenteditable autofocus class="edit" id="content">';
	$l_s_output .= $l_s_anrghg_convert . '</div>';
	$l_s_output .= '<input type="hidden" id="save" />';
	$l_s_output .= '</div><div id="text">';
	$l_s_output .= '<textarea class="edit" id="gethtml" name="anrghg_convert" placeholder="';
	$l_s_output .= __( 'Content' ) . '">' . $l_s_anrghg_convert . '</textarea>';
	$l_s_output .= '</div></td></tr></tbody></table>';
	$l_s_output .= '<button type="button" class="command" onclick="convert()">';
	$l_s_output .= __( 'Convert' ) . '</button>';
	echo wp_kses( $l_s_output, anrghg_get_ui_with_user_input_whitelist() );

	/**
	 * Conversion form internal JavaScript.
	 *
	 * Editor scripts.
	 * Toggle views, and manage getting content saved out of the editable div.
	 * (The condition is only to get rid of a pointless console error message.)
	 */
	echo wp_kses( "\r\n<!--editable div--><script>", array( 'script' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'js',
			"

				function viewVisual() {
					if ( document.getElementById('mode').innerHTML === 'text' ) {
						let content = document.getElementById('gethtml').value;
						content = content.replace(/&lt;/g, '
			"
		)
	);

	echo '<';

	anrghg_protected_echo(
		anrghg_minilight(
			'js',
			"
						');
						content = content.replace(/&gt;/g, '>');
						content = content.replace(/&amp;/g, '&');
						document.getElementById('content').innerHTML = content;
					}
					document.getElementById('visual').style.display = 'block';
					document.getElementById('text').style.display = 'none';
					document.getElementById('mode').textContent = 'visual';
					document.getElementById('visual-tab').style.background = 'white';
					document.getElementById('visual-tab').style.borderWidth = '4px';
					document.getElementById('text-tab').style.background = '#E7E7E7';
					document.getElementById('text-tab').style.borderWidth = '1px';
				}

				function viewText() {
					if ( document.getElementById('mode').textContent === 'visual' ) {
						document.getElementById('gethtml').value = document.getElementById('content').innerHTML;
					}
					document.getElementById('visual').style.display = 'none';
					document.getElementById('text').style.display = 'block';
					document.getElementById('mode').textContent = 'text';
					document.getElementById('visual-tab').style.background = '#E7E7E7';
					document.getElementById('visual-tab').style.borderWidth = '1px';
					document.getElementById('text-tab').style.background = 'white';
					document.getElementById('text-tab').style.borderWidth = '4px';
				}

				function copyEditableDiv() {
					if ( document.getElementById('content') !== null ) {
						let mode = document.getElementById('mode').textContent;
						content = '';
						if ( mode = 'visual' ) {
							viewText();
							viewVisual();
							content = document.getElementById('content').innerHTML;
						} else {
							content = document.getElementById('gethtml').value;
						}
						content = content.replace(/&lt;/g, '
			"
		)
	);

	echo '<';

	anrghg_protected_echo(
		anrghg_minilight(
			'js',
			"
						');
						content = content.replace(/&gt;/g, '>');
						content = content.replace(/&amp;/g, '&');
						document.getElementById('save').value = content;
						document.getElementById('gethtml').removeAttribute('name');
						document.getElementById('save').setAttribute('name', 'anrghg_convert');
					}
					return true;
				}

			"
		)
	);
	echo wp_kses( "\r\n</script>\r\n", array( 'script' => true ) );
}

/**
 * .docx ➔ WordPress conversion process.
 *
 * @since 0.76.0 (provisional)
 */
add_filter(
	'admin_init',
	function() {
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
		if ( isset( $_POST['anrghg_convert_file_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_convert_file_nonce'] ), 'anrghg_convert_file_nonce' ) ) {
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
		if ( ! array_key_exists( 'anrghg_action', $_POST ) ) {
			return;
		}
		if ( 'import_docx' === sanitize_key( $_POST['anrghg_action'] ) ) {
			$l_o_import_file = '';
			if ( isset( $_FILES['import_file']['tmp_name'] ) ) {
				// JSON data mustn't be unslashed or it will be broken.
				// phpcs:ignore
				$l_o_import_file = $_FILES['import_file']['tmp_name'];
			}
			if ( ! isset( $_FILES['import_file']['tmp_name'] ) || empty( $l_o_import_file ) ) {
				wp_die(
					wp_kses( __( 'There is no file. Please choose the desired file.', 'anrghg' ), array() ),
					'',
					array(
						'back_link' => true,
					)
				);
			}

			// Retrieves the data from the file.
			$l_s_data = wp_remote_get( $l_o_import_file );

			// @todo: Unzip the .docx.
			// @todo: Do the conversion.

			wp_safe_redirect( admin_url( anrghg_cur_slug( 'conver' ) ) );
			exit;
		}
	}
);
