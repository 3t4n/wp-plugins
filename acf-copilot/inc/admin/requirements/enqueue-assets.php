<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Enqueue admin assets (styles and scripts) for the plugin.
 */
function acfc_enqueue_admin_assets() {
	if ( ! is_admin() ) {
		return;
	}

	global $post;

	$localized_vars = array(
		'plugin_url'       => ACFC_PLUGIN_DIR_URL,
		'plugin_domain'    => ACFC_PLUGIN_DOMAIN,
		'ajax_url'         => esc_url( admin_url( 'admin-ajax.php' ) ),
		'ajax_nonce'       => wp_create_nonce( 'acfc_ajax_nonce' ),
		'supported_fields' => json_decode( ACFC_SUPPORTED_FIELDS ),
	);

	$acf_copilot = new ACF_Copilot();

	// Enqueue global assest available for the whole WP.
	wp_enqueue_style(
		'acfc-admin',
		ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-admin.min.css',
		array(),
		ACFC_PLUGIN_VERSION,
		'all'
	);

	$screen = get_current_screen();

	// Enqueue main plugin pages assest, staring with prefix acfc-.
	if ( strpos( $screen->id, 'acfc_' ) ) {
		wp_enqueue_script(
			'acfc-admin',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/acfc-admin.min.js',
			array( 'jquery' ),
			ACFC_PLUGIN_VERSION,
			true
		);

		wp_localize_script(
			'acfc-admin',
			'acfc',
			array(
				'plugin_url'    => ACFC_PLUGIN_DIR_URL,
				'plugin_domain' => ACFC_PLUGIN_DOMAIN,
				'ajax_url'      => esc_url( admin_url( 'admin-ajax.php' ) ),
				'ajax_nonce'    => wp_create_nonce( 'acfc_ajax_nonce' ),
			)
		);
	}

	if ( null === $post || ! property_exists( $post, 'post_type' ) ) {
		return;
	}

	if ( 'post' !== $screen->base || ! isset( $screen->base, $screen->post_type ) ) {
		return;
	}

	if ( ! array_intersect( wp_get_current_user()->roles, $acf_copilot->user_access ) ) { // Has user access.
		return;
	}

	// Enqueue assets on the ACF field group admin page.
	if ( 'acf-field-group' === $screen->post_type
		&& '' === $acf_copilot->disable_field_group_addons ) {
		// Common variables to localize.
		$localized_vars = array(
			'plugin_url'       => ACFC_PLUGIN_DIR_URL,
			'plugin_domain'    => ACFC_PLUGIN_DOMAIN,
			'ajax_url'         => esc_url( admin_url( 'admin-ajax.php' ) ),
			'ajax_nonce'       => wp_create_nonce( 'acfc_ajax_nonce' ),
			'supported_fields' => json_decode( ACFC_SUPPORTED_FIELDS ),
		);

		// 3rd-party external libraries.
		wp_enqueue_style(
			'acfc-prism',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-prism.min.css',
			array(),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'acfc-prism',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/prism.min.js',
			array(),
			ACFC_PLUGIN_VERSION,
			true
		);

		wp_enqueue_script(
			'acfc-beautify-html',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/beautify-html.min.js',
			array(),
			ACFC_PLUGIN_VERSION,
			true
		);

		// Enqueue CodeMirror Editor assets.
		wp_enqueue_code_editor(
			array(
				'type'       => 'text/html',
				'codemirror' => array( 'theme' => 'moxer' ),
			)
		);

		wp_enqueue_style( 'wp-codemirror' );

		wp_enqueue_style(
			'acfc-codemirror-theme',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-codemirror-theme.min.css',
			array( 'wp-codemirror' ),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		// Enqueue Bulk Delete assets.
		wp_enqueue_style(
			'acfc-bulk-delete',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-bulk-delete.min.css',
			array(),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'acfc-bulk-delete',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/acfc-bulk-delete.min.js',
			array( 'jquery' ),
			ACFC_PLUGIN_VERSION,
			true
		);

		// Localize the variables once
		wp_localize_script(
			'acfc-bulk-delete',  // Use the first script handle for localization.
			'acfc',
			$localized_vars
		);

		// Enqueue Bulk Drag & Drop assets.
		wp_enqueue_style(
			'acfc-bulk-drag-drop',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-bulk-drag-drop.min.css',
			array(),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'acfc-bulk-drag-drop',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/acfc-bulk-drag-drop.min.js',
			array( 'jquery' ),
			ACFC_PLUGIN_VERSION,
			true
		);

		wp_add_inline_script(
			'acfc-bulk-drag-drop',
			'var acfc = window.acfc || {};',
			'before'
		);

		// Enqueue Custom Help assets.
		wp_enqueue_style(
			'acfc-custom-help',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-custom-help.min.css',
			array(),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'acfc-custom-help',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/acfc-custom-help.min.js',
			array( 'jquery' ),
			ACFC_PLUGIN_VERSION,
			true
		);

		wp_add_inline_script(
			'acfc-custom-help',
			'var acfc = window.acfc || {};',
			'before'
		);

		// Enqueue Code Snippets assets.
		wp_enqueue_style(
			'acfc-code-snippets',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-code-snippets.min.css',
			array(),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'acfc-code-snippets',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/acfc-code-snippets.min.js',
			array( 'jquery' ),
			ACFC_PLUGIN_VERSION,
			true
		);

		wp_add_inline_script(
			'acfc-code-snippets',
			'var acfc = window.acfc || {};',
			'before'
		);

		// Enqueue HTML components assets.
		wp_enqueue_style(
			'acfc-html-components',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-html-components.min.css',
			array(),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'acfc-html-components',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/acfc-html-components.min.js',
			array( 'jquery' ),
			ACFC_PLUGIN_VERSION,
			true
		);
	}

	if ( ! in_array( $screen->post_type, $acf_copilot->types_supported, true ) ) { // // Post type supported.
		return;
	}

	// Enqueue LivePreview assets for the edit and new posts for supported types and users.
	if ( '' === $acf_copilot->livepreview_mode // Global setting is On
		&& in_array( get_post_meta( $post->ID, 'acfc_livepreview_mode', true ), array( '', 'on' ), true )
		&& '' === $acf_copilot->disable_livepreview ) {
		wp_enqueue_style(
			'acfc-livepreview',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/css/acfc-livepreview.min.css',
			array(),
			ACFC_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'acfc-livepreview',
			ACFC_PLUGIN_DIR_URL . 'assets/dist/js/acfc-livepreview.min.js',
			array( 'jquery' ),
			ACFC_PLUGIN_VERSION,
			true
		);

		$post_type_object = get_post_type_object( $screen->post_type );

		if ( $post_type_object && ! empty( $post_type_object->rest_base ) ) {
			$rest_base = $post_type_object->rest_base;
		} else {
			// Fallback to post type if REST base is not set
			$rest_base = $screen->post_type;
		}

		wp_localize_script(
			'acfc-livepreview',
			'acfc',
			array(
				'rest_base'     => esc_url_raw( rest_url( "wp/v2/{$rest_base}/" ) ),
				'rest_base_acf' => esc_url_raw( rest_url( "acfc/v3/{$rest_base}/" ) ), // e.g. if using ACF to REST plugin
				'rest_nonce'    => wp_create_nonce( 'wp_rest' ),
				'i18n'          => array(
					'success' => __( 'Page updated successfully!', 'acf-copilot' ),
					'failure' => __( 'Error updating page: ', 'acf-copilot' ),
				),
			)
		);
	}
}
