<?php

namespace BULKYWP\Admin;

use BULKYWP\Includes\Data;

defined( 'ABSPATH' ) || exit;

class Admin {

	protected static $instance = null;

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );

	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function admin_menu() {
		$settings = Settings::instance();

		add_menu_page(
			esc_html__( 'WordPress Bulk Edit Post Types', 'wpbulky-wp-bulk-edit-post-types' ),
			esc_html__( 'WPBulky', 'wpbulky-wp-bulk-edit-post-types' ),
			BULKYWP_CONST_F['capability'],
			'vi_wpbulky_settings',
			'',
			'dashicons-media-spreadsheet',
			40
		);

		add_submenu_page( 'vi_wpbulky_settings',
			esc_html__( 'Settings', 'wpbulky-wp-bulk-edit-post-types' ),
			esc_html__( 'Settings', 'wpbulky-wp-bulk-edit-post-types' ),
			'manage_options',
			'vi_wpbulky_settings',
			[ $settings, 'setting_page' ]
		);

		$post_types     = Data::get_param( 'post_types' );
		$obj_post_types = get_post_types( [ 'show_ui' => true ], 'objects' );

		if ( ! empty( $post_types ) && is_array( $post_types ) ) {
			foreach ( $post_types as $post_type ) {

				$post_type_data = $obj_post_types[ $post_type ] ?? '';
				if ( ! $post_type_data ) {
					continue;
				}

				$label = $post_type_data->label;

				add_submenu_page(
					'vi_wpbulky_settings',
					"{$label} editor",
					"{$label}",
					BULKYWP_CONST_F['capability'],
					"vi_wpbulky_edit_{$post_type}",
					[ Editor::instance(), 'editor' ]
				);
			}
		}

	}

}