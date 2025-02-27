<?php

namespace BULKYWP\Admin;

use VI_CORE\Core\Helper;
use BULKYWP\Includes\Data;
use VI_CORE\Core\VI_Settings;
use BULKYWP\Includes\Support;

defined( 'ABSPATH' ) || exit;

class Settings extends VI_Settings {
	protected static $instance = null;

	public function __construct() {
		$this->slug         = BULKYWP_CONST_F['full_slug'];
		$this->title        = esc_html__( 'Settings', 'wpbulky-wp-bulk-edit-post-types' );
		$this->nonce_action = 'wpbulky_nonce';
		parent::__construct();

		add_action( "{$this->slug}_admin_field_update", [ $this, 'update' ] );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function register_tabs() {
		return [
			'general' => esc_html__( 'General', 'wpbulky-wp-bulk-edit-post-types' ),
		];
	}

	public function register_fields() {
		$post_types     = [];
		$obj_post_types = get_post_types( [ 'show_in_menu' => true ], 'objects' );

		foreach ( $obj_post_types as $post_type => $data ) {
			if ( in_array( $post_type, [ 'post', 'page', 'attachment' ] ) ) {
				$post_types[ $post_type ] = $data->label;
			}
		}

		$suggest = '';

		if ( class_exists( 'WooCommerce' ) ) {
			$suggest = sprintf( "%s <a target='_blank' href='https://1.envato.market/vn4ZEA'>Bulky - Bulk Edit Products for WooCommerce Premium</a>
 										or <a target='_blank' href='https://wordpress.org/plugins/bulky-bulk-edit-products-for-woo/'>Bulky - Bulk Edit Products for WooCommerce</a> %s",
				esc_html__( 'If you want edit WooCommerce post types (product, shop_coupon, shop_order) in bulk. Please use', 'wpbulky-wp-bulk-edit-post-types' ), esc_html__( 'for just only product post type', 'wpbulky-wp-bulk-edit-post-types' ) );
		}

		return [
			'general' => [
				[
					'type' => 'section_start'
				],
				[
					'type'    => 'multiselect',
					'key'     => 'post_types',
					'title'   => esc_html__( 'Post types', 'wpbulky-wp-bulk-edit-post-types' ),
					'class'   => 'vi-select2',
					'options' => $post_types,
					'desc'    => $suggest
				],
				[
					'type' => 'section_end'
				]
			],
		];
	}

	public function get_settings() {
		return Data::get_params();
	}

	public function update() {
		Support::get_pro_version();
	}
}

