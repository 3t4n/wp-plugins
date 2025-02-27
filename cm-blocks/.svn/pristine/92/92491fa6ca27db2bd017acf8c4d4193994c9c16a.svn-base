<?php

namespace Codemanas\CmBlocks;

use Plugin_Upgrader;
use WP_Ajax_Upgrader_Skin;


require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
require_once ABSPATH . 'wp-admin/includes/misc.php';

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Patterns {
	public static ?Patterns $instance = null;

	public static function get_instance(): ?Patterns {
		return is_null( self::$instance ) ? self::$instance = new self()
			: self::$instance;
	}

	protected function __construct() {
		//register pattern code goes here
		add_action( 'init', [ $this, 'register_block_pattern' ] );

		//register pattern category
		add_action( 'init', [ $this, 'register_block_pattern_categories' ] );

		// callback for install and activate plugin
		add_action( 'wp_ajax_install_plugin_action',
			[ $this, 'install_plugin_callback' ] );
	}

	public function register_block_pattern() {
		// Default headers remain the same
		$default_headers = array(
			'title'         => 'Title',
			'slug'          => 'Slug',
			'description'   => 'Description',
			'viewportWidth' => 'Viewport Width',
			'inserter'      => 'Inserter',
			'categories'    => 'Categories',
			'keywords'      => 'Keywords',
			'blockTypes'    => 'Block Types',
			'postTypes'     => 'Post Types',
			'templateTypes' => 'Template Types',
		);

		$dir_path = CM_BLOCKS_DIR_PATH . '/patterns/';
		$this->register_block_patterns_recursively( $dir_path,
			$default_headers );
	}

	private function register_block_patterns_recursively(
		$dir_path,
		$default_headers
	) {
		$files = scandir( $dir_path );

		foreach ( $files as $file ) {
			if ( $file === '.' || $file === '..' ) {
				continue;
			}

			$full_path = $dir_path . $file;

			if ( is_dir( $full_path ) ) {
				// If directory, recursively register patterns
				$this->register_block_patterns_recursively( $full_path . '/',
					$default_headers );
			} elseif ( is_file( $full_path )
			           && pathinfo( $full_path, PATHINFO_EXTENSION ) === 'php'
			) {
				// If PHP file, include and register pattern
				$pattern_data = get_file_data( $full_path, $default_headers );

				ob_start();
				include $full_path;
				$pattern_data['content'] = ob_get_clean();

				if ( ! $pattern_data['content'] ) {
					continue;
				}

				//parse properties of type array.
				foreach (
					array(
						'categories',
						'keywords',
						'blockTypes',
						'postTypes',
						'templateTypes',
					) as $property
				) {
					if ( ! empty( $pattern_data[ $property ] ) ) {
						$pattern_data[ $property ] = array_filter(
							preg_split(
								'/[\s,]+/',
								(string) $pattern_data[ $property ]
							)
						);
					} else {
						unset( $pattern_data[ $property ] );
					}
				}

				// Parse properties of type int.
				foreach ( array( 'viewportWidth' ) as $property ) {
					if ( ! empty( $pattern_data[ $property ] ) ) {
						$pattern_data[ $property ]
							= (int) $pattern_data[ $property ];
					} else {
						unset( $pattern_data[ $property ] );
					}
				}

				// Parse properties of type boolean .
				foreach ( array( 'inserter' ) as $property ) {
					if ( ! empty( $pattern_data[ $property ] ) ) {
						$pattern_data[ $property ] = in_array(
							strtolower( $pattern_data[ $property ] ),
							array( 'yes', 'true' ),
							true
						);
					} else {
						unset( $pattern_data[ $property ] );
					}
				}

				register_block_pattern( 'codemanas/cmblocks'
				                        . $pattern_data['slug'],
					$pattern_data );
			}
		}
	}

	public function register_block_pattern_categories() {
		register_block_pattern_category(
			'codemanas',
			array( 'label' => __( 'Codemanas', 'cm-blocks' ) )
		);
	}

	public function installAndActivate(
		$plugin_slug,
		$filename,
		$callback_type
	) {
		if ( 'inactive' == $callback_type ) {
			// Activate the plugin after installation
			$activate_result = activate_plugin( $plugin_slug . '/' . $filename
			                                    . '.php' );

			if ( is_wp_error( $activate_result ) ) {
				// Deactivate the plugin if activation fails
				deactivate_plugins( $plugin_slug . '/' . $filename . '.php' );

				return $activate_result;
			}
		} else {

			$pluginInformation = plugins_api(
				'plugin_information',
				array(
					'slug'   => $plugin_slug,
					'fields' => array(
						'short_description' => false,
						'sections'          => false,
						'requires'          => false,
						'tested'            => false,
						'downloaded'        => false,
						'download_link'     => true,
						'last_updated'      => false,
						'added'             => false,
					),
				)
			);

			if ( is_wp_error( $pluginInformation ) ) {
				return $pluginInformation;
			}

			$skin     = new WP_Ajax_Upgrader_Skin();
			$upgrader = new Plugin_Upgrader( $skin );

			// Install the plugin
			$install_result
				= $upgrader->install( $pluginInformation->download_link );

			if ( is_wp_error( $install_result ) ) {
				return $install_result;
			}

			// Activate the plugin after installation
			$activate_result = activate_plugin( $plugin_slug . '/' . $filename
			                                    . '.php' );

			if ( is_wp_error( $activate_result ) ) {
				// Deactivate the plugin if activation fails
				deactivate_plugins( $plugin_slug . '/' . $filename . '.php' );

				return $activate_result;
			}
		}

		return true;
	}


	public function install_plugin_callback() {

		// Verify nonce from the single point i.e. License nonce which is already locazlized
		check_ajax_referer( 'cm-blocks-license-nonce', 'nonce' );

		$plugin_slug   = isset( $_POST['plugin_slug'] )
			? sanitize_text_field( $_POST['plugin_slug'] ) : '';
		$filename      = isset( $_POST['filename'] )
			? sanitize_text_field( $_POST['filename'] ) : '';
		$callback_type = isset( $_POST['callback_type'] )
			? sanitize_text_field( $_POST['callback_type'] ) : '';

		// Check if the plugin slug is provided
		if ( empty( $plugin_slug ) ) {
			wp_send_json_error( 'Plugin slug is missing.' );
		}
		// Check if the plugin is already installed
		if ( ! is_plugin_active( $plugin_slug ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

			// Install and activate the plugin
			$result = $this->installAndActivate( $plugin_slug, $filename,
				$callback_type );

			if ( is_wp_error( $result ) ) {
				wp_send_json_error( 'Error installing the plugin: '
				                    . $result->get_error_message() );
			} else {
				wp_send_json_success( 'Plugin installed and activated successfully!' );
			}
		} else {
			wp_send_json_error( 'Plugin is already installed and activated.' );
		}

		// Always exit to prevent further processing
		exit();
	}

}
