<?php

namespace QuadLayers\QLTGM\Controllers;

class Display extends Base {

	protected static $instance;

	private function __construct() {
		add_action( 'wp_ajax_qltgm_get_posts', array( $this, 'ajax_get_posts' ) );
		add_action( 'wp_ajax_qltgm_save_display', array( $this, 'ajax_qltgm_save_display' ) );
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
	}

	function add_menu() {
		add_submenu_page( QLTGM_DOMAIN, esc_html__( 'Display', 'quadlayers-telegram-chat' ), esc_html__( 'Display', 'quadlayers-telegram-chat' ), 'manage_options', QLTGM_DOMAIN . '_display', array( $this, 'add_panel' ) );
	}

	function add_panel() {
		global $submenu;
		$display_model        = new \QuadLayers\QLTGM\Models\Display();
		$display              = $display_model->get();
		$visibility_component = new \QuadLayers\QLTGM\Models\Display_Component();
		$post_types           = $visibility_component->get_entries();
		$taxonomies           = $visibility_component->get_taxonomies();
		include QLTGM_PLUGIN_DIR . 'lib/view/backend/pages/parts/header.php';
		include QLTGM_PLUGIN_DIR . 'lib/view/backend/pages/display.php';
	}

	function ajax_qltgm_save_display() {
		$display_model = new \QuadLayers\QLTGM\Models\Display();
		if ( current_user_can( 'manage_options' ) ) {
			if ( check_ajax_referer( 'qltgm_save_display', 'nonce', false ) && isset( $_REQUEST['form_data'] ) ) {
				$form_data = array();
				parse_str( $_REQUEST['form_data'], $form_data );
				if ( is_array( $form_data ) ) {
					$display_model->save( $form_data );
					return parent::success_save( $form_data );
				}
				return parent::error_reload_page();
			}
			return parent::error_access_denied();
		}
	}

	function ajax_get_posts() {

		if ( current_user_can( 'manage_options' ) ) {

			if ( ! empty( $_REQUEST ) && check_admin_referer( 'qltgm_get_posts', 'nonce' ) ) {

				$data = array( 'all' => esc_html__( 'All', 'quadlayers-telegram-chat' ) );

				$args = array(
					'post_type'           => sanitize_key( $_REQUEST['name'] ),
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => 10,
					'exclude'             => array_map( 'intval', (array) $_REQUEST['selected'] ),
				);

				if ( $_REQUEST['q'] ) {
					$args['s'] = sanitize_text_field( $_REQUEST['q'] );
				}

				$posts = get_posts( $args );

				foreach ( $posts as $post ) {
					$data[ $post->ID ] = mb_substr( $post->post_title, 0, 49 );
				}

				wp_send_json( $data );
			}
		}

		wp_die();
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
	}
}
