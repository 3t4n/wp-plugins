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

if ( ! class_exists( 'ACFC_HTML_Components' ) ) {

	class ACFC_HTML_Components {
		/**
		 * Consturtor.
		 */
		function __construct() {
			// Add constructor content...
		}

		/**
		 * Read and load up all the static template components.
		 */
		public function load() {
			$components = array(
				'base'      => array( '0' => '&mdash; Base Components &mdash;' ),
				'bootstrap' => array( '1' => '&mdash; Bootstrap Components &mdash;' ),
				'custom'    => array( '2' => '&mdash; Custom Components &mdash;' ),
			);

			$base_files = list_files( ACFC_PLUGIN_DIR_PATH . '/static/base' );

			foreach ( $base_files as $file_path ) {
				if ( is_file( $file_path ) ) {
					$filename = pathinfo( $file_path, PATHINFO_FILENAME );

					if ( 'tpl' === pathinfo( $file_path, PATHINFO_EXTENSION ) && 'text/plain' === mime_content_type( $file_path ) ) {
						$response = wp_remote_get( $file_path );

						if ( ! is_wp_error( $response ) ) {
							$file_contents = wp_remote_retrieve_body( $response );
						} else {
							$file_contents = '';
						}

						$components['base'][ htmlspecialchars( $file_contents ) ] = 'base/components/' . $filename;
					}
				}
			}

			$bootstrap_files = list_files( ACFC_PLUGIN_DIR_PATH . '/static/bootstrap' );

			foreach ( $bootstrap_files as $file_path ) {
				if ( is_file( $file_path ) ) {
					$filename = pathinfo( $file_path, PATHINFO_FILENAME );

					if ( 'tpl' === pathinfo( $file_path, PATHINFO_EXTENSION ) && 'text/plain' === mime_content_type( $file_path ) ) {
						$response = wp_remote_get( $file_path );

						if ( ! is_wp_error( $response ) ) {
							$file_contents = wp_remote_retrieve_body( $response );
						} else {
							$file_contents = '';
						}

						$components['bootstrap'][ htmlspecialchars( $file_contents ) ] = 'bootstrap/components/' . $filename;
					}
				}
			}

			return array_merge( $components['base'], $components['bootstrap'], $components['custom'] );
		}
	}

	// Initialize.
	new ACFC_HTML_Components();
}
