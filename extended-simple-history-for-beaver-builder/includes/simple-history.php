<?php
/**
 * Simple History Hooks
 *
 * Hooks to extend the Simple History plugin.
 *
 * @package Extended_Simple_History_Beaver_Builder
 * @since 1.0.0
 */

namespace WEBDOGS\Extended_Simple_History_Beaver_Builder\Simple_History;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

use WEBDOGS\Extended_Simple_History_Beaver_Builder\Classes\Simple_History\Loggers\Beaver_Builder as Logger_Beaver_Builder;
use WEBDOGS\Extended_Simple_History_Beaver_Builder\Classes\Simple_History\Loggers\Beaver_Builder_Legacy as Logger_Beaver_Builder_Legacy;

// Register the custom logger.
add_action(
	'simple_history/add_custom_logger',
	function( $simple_history = null ): void {
		if ( $simple_history
			&& method_exists( $simple_history, 'register_logger' )
		) {
			if ( class_exists( 'Simple_History\Loggers\Logger' )
				&& class_exists( 'Simple_History\Log_Levels' )
				&& class_exists( 'WEBDOGS\Extended_Simple_History_Beaver_Builder\Classes\Simple_History\Loggers\Beaver_Builder' )
			) {
				$simple_history->register_logger( Logger_Beaver_Builder::class );
			} elseif ( class_exists( 'SimpleLogger' )
				&& class_exists( 'WEBDOGS\Extended_Simple_History_Beaver_Builder\Classes\Simple_History\Loggers\Beaver_Builder_Legacy' )
			) {
				$simple_history->register_logger( Logger_Beaver_Builder_Legacy::class );
			}
		}
	}
);

// Register post meta on init.
add_action(
	'init',
	function(): void {
		if ( class_exists( 'FLBuilderModel' ) && method_exists( 'FLBuilderModel', 'get_post_types' ) ) {
			foreach ( \FLBuilderModel::get_post_types() as $builder_post_type_name ) {
				register_meta(
					'post',
					'node_moved',
					array(
						'type'           => 'string',
						'single'         => false,
						'show_in_rest'   => true,
						'object_subtype' => $builder_post_type_name,
					)
				);
			}
		}
	}
);

// Make sure builder post types are available to the REST API and support post meta.
add_filter(
	'register_post_type_args',
	function( array $arguments, string $post_type ): array {
		if ( ! current_user_can( 'edit_posts' ) ) {
			return $arguments;
		}

		if ( ! class_exists( 'FLBuilderModel' )
			|| ! method_exists( 'FLBuilderModel', 'get_post_types' )
			|| ! in_array( $post_type, \FLBuilderModel::get_post_types(), true )
		) {
			return $arguments;
		}

		if ( ! isset( $arguments['show_in_rest'] ) || true !== $arguments['show_in_rest'] ) {
			$arguments['show_in_rest'] = true;
		}

		if ( ! isset( $arguments['supports'] ) || ! is_array( $arguments['supports'] ) ) {
			$arguments['supports'] = array();
		}

		if ( ! in_array( 'custom-fields', $arguments['supports'], true ) ) {
			$arguments['supports'][] = 'custom-fields';
			$arguments['supports']   = array_unique( $arguments['supports'] );
		}

		return $arguments;
	},
	10,
	2
);

// Prevent changes to the node_moved post meta from being logged.
add_filter(
	'simple_history/simple_logger/log_message_key',
	function( bool $do_log ): bool {
		if ( ( ( defined( 'REST_API_REQUEST' ) && REST_API_REQUEST ) || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) && preg_match( '/\?fl_builder$/', wp_get_referer() ) ) {

			$posted_data = json_decode( file_get_contents( 'php://input' ), true );

			if ( $posted_data
				&& $posted_data['meta']
				&& 1 === count( $posted_data['meta'] )
				&& $posted_data['meta']['node_moved']
			) {
				return false;
			}
		}

		return $do_log;
	}
);
