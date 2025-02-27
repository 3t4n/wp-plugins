<?php
/**
 * Scripts and Styles
 *
 * Register and enqueue plugin scripts and styles.
 *
 * @package Extended_Simple_History_Beaver_Builder
 * @since 1.0.0
 */

namespace WEBDOGS\Extended_Simple_History_Beaver_Builder\Scripts_Styles;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

use WEBDOGS\Extended_Simple_History_Beaver_Builder as Plugin;

/**
 * Get script/style resource handle.
 *
 * @since 1.0.0
 *
 * @param string $slug The resource slug.
 * @return string The resource handle.
 */
function get_resource_handle( string $slug ): string {
	return implode( '-', array( Plugin\BASENAME, $slug ) );
}

/**
 * Get script/style resource url.
 *
 * @since 1.0.0
 *
 * @param string $slug The resource slug.
 * @param string $type css or js. Optional, default css.
 * @param bool   $minified Add min to the url extension. Optional, default true.
 * @return string The resource url.
 */
function get_resource_url( string $slug, ?string $type = 'css', ?bool $minified = true ): string {
	switch ( $type ) {
		case 'js':
		case 'script':
			$type = 'js';
			break;
		case 'css':
		case 'style':
		default:
			$type = 'css';
			break;
	}

	$file_path      = 'assets/' . $type . '/' . $slug;
	$file_extension = ( $minified ? 'min.' : '' ) . $type;

	return plugins_url( $file_path . '.' . $file_extension, Plugin\ROOT_FILE );
}

/**
 * Get script resource url.
 *
 * @since 1.0.0
 *
 * @param string $slug The script slug.
 * @param bool   $minified Add min to the url extension. Optional, default true.
 * @return string The script url.
 */
function get_script_url( string $slug, ?bool $minified = true ): string {
	return get_resource_url( $slug, 'js', $minified );
}

/**
 * Get style resource url.
 *
 * @since 1.0.0
 *
 * @param string $slug The style slug.
 * @param bool   $minified Add min to the url extension. Optional default true.
 * @return string The style url.
 */
function get_style_url( string $slug, ?bool $minified = true ): string {
	return get_resource_url( $slug, 'css', $minified );
}

// Register scripts on init.
add_action(
	'init',
	function(): void {
		$tracking_dependencies = array(
			'fl-builder-system',
		);

		if ( defined( 'FL_BUILDER_VERSION' ) && version_compare( \FL_BUILDER_VERSION, '2.4.2', '<' ) ) {
			$tracking_dependencies = array(
				'fl-builder-bundle',
			);
		}

		wp_register_script( get_resource_handle( 'builder-tracking' ), get_script_url( 'builder-tracking' ), $tracking_dependencies, Plugin\VERSION, true );
	}
);

// Register admin-only scripts/styles on admin_init.
add_action(
	'admin_init',
	function(): void {
		wp_register_style( get_resource_handle( 'dashboard' ), get_style_url( 'dashboard' ), array(), Plugin\VERSION );
		wp_register_script( get_resource_handle( 'dashboard' ), get_script_url( 'dashboard' ), array( 'simple_history_script' ), Plugin\VERSION, true );

		wp_localize_script(
			get_resource_handle( 'dashboard' ),
			'extendedSimpleHistoryBeaverBuilder',
			array(
				'loggerSlug' => substr( Plugin\ROOT_NAMESPACE_BASENAME, 0, min( 30, strlen( Plugin\ROOT_NAMESPACE_BASENAME ) ) ),
				'cssPrefix'  => Plugin\BASENAME,
			)
		);
	}
);

// Enqueue the dashboard widget scripts when the dashboard widget is on the page.
add_filter(
	'simple_history/show_dashboard_widget',
	function( bool $show_dashboard_widget ): bool {
		if ( $show_dashboard_widget ) {
			wp_enqueue_style( get_resource_handle( 'dashboard' ) );
			wp_enqueue_script( get_resource_handle( 'dashboard' ) );
		}

		return $show_dashboard_widget;
	}
);

// Enqueue the builder tracking script on fl_builder_init_ui.
add_action(
	'fl_builder_init_ui',
	function(): void {
		$post_type_object = get_post_type_object( get_post_type() );

		$localize_success = wp_localize_script(
			get_resource_handle( 'builder-tracking' ),
			'simpleHistoryBuilderTracking',
			array(
				'restNonce'        => wp_create_nonce( 'wp_rest' ),
				'postId'           => get_the_ID(),
				'postTypeRestBase' => isset( $post_type_object->rest_base ) && $post_type_object->rest_base ? $post_type_object->rest_base : $post_type_object->name,
			)
		);

		wp_enqueue_script( get_resource_handle( 'builder-tracking' ) );
	}
);

// Enqueue the dashboard scripts when on the Simple History page.
add_action(
	'simple_history/history_page/before_gui',
	function() {
		wp_enqueue_style( get_resource_handle( 'dashboard' ) );
		wp_enqueue_script( get_resource_handle( 'dashboard' ) );
	}
);
