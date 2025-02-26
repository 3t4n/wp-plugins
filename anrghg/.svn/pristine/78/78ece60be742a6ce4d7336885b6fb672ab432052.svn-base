<?php
/**
 * Gutenberg blocks.
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
 * Adds Gutenberg blocks.
 *
 * @since 0.27.0
 * Only on the Admin frontend, no JavaScript added to public pages.
 * Block contents are processed server-side, for AMP compatibility.
 * @link https://weston.ruter.net/2018/12/18/creating-gutenberg-blocks-without-a-build-step-via-htm/
 *
 * The final block scripts are built by Node Package Manager based on
 * extended JavaScript (JSX) as in the React framework, per WordPress
 * instructions and guidelines except that Docker is not used because
 * it was uninstallable. The build environment is Webpack, following:
 * https://awhitepixel.com/blog/wordpress-gutenberg-complete-guide-development-environment/
 * @courtesy A White Pixel and Novo-Media.
 * @link https://awhitepixel.com/blog/wordpress-gutenberg-create-custom-block-tutorial/
 * @link https://awhitepixel.com/blog/wordpress-gutenberg-create-custom-block-part-2-register-block/
 * @link https://novo-media.ch/en/programming-coding/gutenberg-plugin-development-wp-data-wordpress-rest-api/
 * The configuration files package[-lock].json, webpack.config.js are
 * edited in the build folder, and so is the `build.sh` script. Their
 * copies in the plugin folder are informative, and required for Open
 * Source compliance.
 *
 * @since 1.5.11 Previews.
 * @courtesy Ronald Huereca.
 * @link https://mediaron.com/how-to-enable-gutenberg-block-previews/
 * Displaying (in the Gutenberg Editor) auto-generated block previews
 * on hovering the new block library menu items only takes adding the
 * `example` property, with an empty object as value: `example: {},`.
 * Note: These are editor block previews, not images of public pages.
 * For generated previews and images, please refer to the above post.
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/#example-optional
 *
 * To prevent duplicate `-js-js`, no `-js` is appended to the handle.
 */
add_filter(
	'enqueue_block_editor_assets',
	function() {
		global $g_a_anrghg_config;
		$l_i_post_id = get_the_id();

		/**
		 * Adds the block ‘Thank You message’.
		 *
		 * @since 0.54.0 This code
		 * @since 0.58.0 The block.
		 * @uses ./anrghg-thanks-block.js
		 */
		if ( $g_a_anrghg_config['anrghg_thank_you_block'] ) {
			wp_register_script(
				'anrghg-thanks-block',
				plugin_dir_url( __FILE__ ) . 'blocks/anrghg-thanks-block.min.js',
				array( 'wp-blocks', 'wp-element', 'wp-block-editor' ),
				C_S_ANRGHG_VER,
				false
			);
			// Translators: Description of the ‘Thank You message’ block.
			$l_s_description  = _x( 'Helps configure a message displayed in a box in the post.', 'block description', 'anrghg' );
			$l_s_description .= C_S_ANRGHG_SPACE;
			$l_s_description .= sprintf(
				// Translators: %s: Plugin long name ‘A.N.R.GHG Publishing Toolkit’.
				_x( 'Other options are available within the plugin %s.', 'block description', 'anrghg' ),
				sprintf(
					// Translators: %s: the plugin’s initialism, in English ‘A.N.R.GHG’.
					__( '%s Publishing Toolkit', 'anrghg' ),
					// .
					_x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' )
				)
			);
			wp_add_inline_script(
				'anrghg-thanks-block',
				'const anrghgThanks = ' . wp_json_encode(
					array(
						'description'          => $l_s_description,
						'blockSettingElements' => $g_a_anrghg_config['anrghg_block_setting_elements'],
						'defaultStyleSheet'    => anrghg_apply_config( 'anrghg_thank_you_default_style' ),
						'dash'                 => C_S_ANRGHG_DASH,
					)
				),
				'before'
			);
			register_block_type(
				'anrghg/thank-you-message',
				array(
					'editor_script' => 'anrghg-thanks-block',
				)
			);
		}

		/**
		 * Adds the block ‘Table of contents’.
		 *
		 * @since 0.27.0
		 * @uses ./anrghg-contents-block.js
		 */
		if ( $g_a_anrghg_config['anrghg_table_of_contents_block'] ) {
			wp_register_script(
				'anrghg-contents-block',
				plugin_dir_url( __FILE__ ) . 'blocks/anrghg-contents-block.min.js',
				array( 'wp-blocks', 'wp-element', 'wp-block-editor' ),
				C_S_ANRGHG_VER,
				false
			);
			// Translators: Description of the ‘Table of contents’ block.
			$l_s_description  = _x( 'Helps configure the table of contents.', 'block description', 'anrghg' );
			$l_s_description .= C_S_ANRGHG_SPACE;
			$l_s_description .= sprintf(
				// Translators: %s: Plugin long name ‘A.N.R.GHG Publishing Toolkit’.
				_x( 'Other options are available within the plugin %s.', 'block description', 'anrghg' ),
				sprintf(
					// Translators: %s: the plugin’s initialism, in English ‘A.N.R.GHG’.
					__( '%s Publishing Toolkit', 'anrghg' ),
					// .
					_x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' )
				)
			);
			$l_s_configured   = anrghg_apply_config( 'anrghg_table_of_contents_label' );
			$l_s_post_meta    = get_post_meta( $l_i_post_id, 'anrghg_contents_label', true );
			$l_s_config_label = empty( $l_s_post_meta ) ? $l_s_configured : $l_s_post_meta;
			wp_add_inline_script(
				'anrghg-contents-block',
				'const anrghgContents = ' . wp_json_encode(
					array(
						'description'           => $l_s_description,
						'blockSettingElements'  => $g_a_anrghg_config['anrghg_block_setting_elements'],
						'tableOfContentsActive' => anrghg_apply_config( 'anrghg_table_of_contents_active' ),
						'configContentsLabel'   => $l_s_config_label,
						'helpContentsLabel'     => sprintf(
							// Translators: %s: the label of the configured value.
							__( 'Configured as “%s”', 'anrghg' )
								. C_S_ANRGHG_DASH
								// This arrow with an ASCII arrowhead is bidi-mirrored.
								. __( 'Keep as configured', 'anrghg' ) . C_S_ANRGHG_SPACE . '–>' . C_S_ANRGHG_SPACE . __( 'Leave empty', 'anrghg' ),
							$l_s_config_label
							// phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
						) . C_S_ANRGHG_DASH . __( 'The optional placeholder %s inserts the post title.', 'anrghg' ),
						'dash'                  => C_S_ANRGHG_DASH,
					)
				),
				'before'
			);
			register_block_type(
				'anrghg/table-of-contents',
				array(
					'editor_script' => 'anrghg-contents-block',
				)
			);
		}

		/**
		 * Adds the block ‘Notes and sources’ section.
		 *
		 * @since 0.27.0
		 * @uses ./anrghg-section-block.js
		 */
		if ( anrghg_apply_config( 'anrghg_complements_active' )
			&& $g_a_anrghg_config['anrghg_complements_block']
		) {
			wp_register_script(
				'anrghg-section-block',
				plugin_dir_url( __FILE__ ) . 'blocks/anrghg-section-block.min.js',
				array( 'wp-blocks', 'wp-element', 'wp-block-editor' ),
				C_S_ANRGHG_VER,
				false
			);
			// Translators: Description of the ‘Notes and sources’ block.
			$l_s_description  = _x( 'Helps configure listings of inline notes and sources.', 'block description', 'anrghg' );
			$l_s_description .= C_S_ANRGHG_SPACE;
			$l_s_description .= sprintf(
				// Translators: %s: Plugin long name ‘A.N.R.GHG Publishing Toolkit’.
				_x( 'Other options are available within the plugin %s.', 'block description', 'anrghg' ),
				sprintf(
					// Translators: %s: the plugin’s initialism, in English ‘A.N.R.GHG’.
					__( '%s Publishing Toolkit', 'anrghg' ),
					// .
					_x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' )
				)
			);
			$l_s_configured         = anrghg_apply_config( 'anrghg_note_list_label_plural' );
			$l_s_post_meta          = get_post_meta( $l_i_post_id, 'anrghg_note_list_label', true );
			$l_s_conf_label_notes   = empty( $l_s_post_meta ) ? $l_s_configured : $l_s_post_meta;
			$l_s_configured         = anrghg_apply_config( 'anrghg_source_list_label_plural' );
			$l_s_post_meta          = get_post_meta( $l_i_post_id, 'anrghg_source_list_label', true );
			$l_s_conf_label_sources = empty( $l_s_post_meta ) ? $l_s_configured : $l_s_post_meta;
			wp_add_inline_script(
				'anrghg-section-block',
				'const anrghgSection = ' . wp_json_encode(
					array(
						'description'            => $l_s_description,
						'blockSettingElements'   => $g_a_anrghg_config['anrghg_block_setting_elements'],
						'configListLabelNotes'   => $l_s_conf_label_notes,
						'configListLabelSources' => $l_s_conf_label_sources,
						'helpListLabelNotes'     => sprintf(
							// Translators: %s: the label of the configured value.
							__( 'Configured as “%s”', 'anrghg' )
								. C_S_ANRGHG_DASH
								. __( 'Keep as configured', 'anrghg' ) . C_S_ANRGHG_SPACE . '–>' . C_S_ANRGHG_SPACE . __( 'Leave empty', 'anrghg' ),
							$l_s_conf_label_notes
						),
						'helpListLabelSources'   => sprintf(
							// Translators: %s: the label of the configured value.
							__( 'Configured as “%s”', 'anrghg' )
								. C_S_ANRGHG_DASH
								. __( 'Keep as configured', 'anrghg' ) . C_S_ANRGHG_SPACE . '–>' . C_S_ANRGHG_SPACE . __( 'Leave empty', 'anrghg' ),
							$l_s_conf_label_sources
						),
						'dash'                   => C_S_ANRGHG_DASH,
					)
				),
				'before'
			);
			register_block_type(
				'anrghg/notes-and-sources',
				array(
					'editor_script' => 'anrghg-section-block',
				)
			);
		}

		/**
		 * Adds the block ‘Reference list’.
		 *
		 * @since 0.58.0
		 * @uses ./anrghg-references-block.js
		 */
		if ( $g_a_anrghg_config['anrghg_references_block'] ) {
			wp_register_script(
				'anrghg-references-block',
				plugin_dir_url( __FILE__ ) . 'blocks/anrghg-references-block.min.js',
				array( 'wp-blocks', 'wp-element', 'wp-block-editor' ),
				C_S_ANRGHG_VER,
				false
			);
			$l_s_description = sprintf(
				// Translators: Description of the ‘Reference list’ block. 1: Name of the ‘Notes and sources’ block; 2: Plugin long name ‘A.N.R.GHG Publishing Toolkit’.
				_x( 'Helps configure a standalone reference list supporting templates. For listing inline notes and sources, please use the ‘%1$s’ block, or the options configured within the plugin %2$s.', 'block description', 'anrghg' ),
				// .
				__( 'Notes and sources', 'anrghg' ),
				sprintf(
					// Translators: %s: the plugin’s initialism, in English ‘A.N.R.GHG’.
					__( '%s Publishing Toolkit', 'anrghg' ),
					// .
					_x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' )
				)
			);
			$l_s_config_label = anrghg_apply_config( 'anrghg_reference_list_label' );
			wp_add_inline_script(
				'anrghg-references-block',
				'const anrghgReferences = ' . wp_json_encode(
					array(
						'description'          => $l_s_description,
						'blockSettingElements' => $g_a_anrghg_config['anrghg_block_setting_elements'],
						'configReferenceLabel' => $l_s_config_label,
						'labelInputLegend'     => __( 'Label' ),
						'helpReferenceLabel'   => sprintf(
							// Translators: %s: the label of the configured value.
							__( 'Configured as “%s”', 'anrghg' )
								. C_S_ANRGHG_DASH
								// This arrow with an ASCII arrowhead is bidi-mirrored.
								. __( 'Keep as configured', 'anrghg' ) . C_S_ANRGHG_SPACE . '–>' . C_S_ANRGHG_SPACE . __( 'Leave empty', 'anrghg' ),
							$l_s_config_label
						),
						'dash'                 => C_S_ANRGHG_DASH,
					)
				),
				'before'
			);
			register_block_type(
				'anrghg/references',
				array(
					'editor_script' => 'anrghg-references-block',
				)
			);
		}

		/**
		 * Adds the block ‘Include partial’.
		 *
		 * @since 1.15.0
		 * @uses ./anrghg-include-block.js
		 */
		if ( $g_a_anrghg_config['anrghg_include_block'] ) {
			wp_register_script(
				'anrghg-include-block',
				plugin_dir_url( __FILE__ ) . 'blocks/anrghg-include-block.min.js',
				array( 'wp-blocks', 'wp-element', 'wp-block-editor' ),
				C_S_ANRGHG_VER,
				false
			);
			$l_s_description = _x( 'Helps include a locally stored HTML partial that may contain placeholders for additional classes and for a freely confígurable value.', 'block description', 'anrghg' );
			wp_add_inline_script(
				'anrghg-include-block',
				'const anrghgInclude = ' . wp_json_encode(
					array(
						'description'          => $l_s_description,
						'blockSettingElements' => $g_a_anrghg_config['anrghg_block_setting_elements'],
						'configuredPath'       => $g_a_anrghg_config['anrghg_include_base_directory'],
						'classesPlaceholder'   => $g_a_anrghg_config['anrghg_include_classes_placeholder'],
						'valuePlaceholder'     => $g_a_anrghg_config['anrghg_include_value_placeholder'],
						'dash'                 => C_S_ANRGHG_DASH,
					)
				),
				'before'
			);
			register_block_type(
				'anrghg/include',
				array(
					'editor_script' => 'anrghg-include-block',
				)
			);
		}
	}
);
