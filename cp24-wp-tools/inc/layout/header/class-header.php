<?php

namespace CP24\Tools\Inc\Layout\Header;

defined( 'ABSPATH' ) || exit;

use CP24\Tools\Inc\Settings;
use CP24\Tools\Inc\Init;
use Error;

class Header {
	/**
	 * Constructor method.
	 *
	 * @since 1.2.0
	 */
	public function __construct() {
		add_filter( Settings::DASHBOARD_MENU_ITEMS, [ $this, 'add_menu_items' ], 10 );
		add_action( 'wp', [ $this, 'set_cp24_header' ], 10 );
		add_action( 'wp_ajax_cp24_tools_settings_dashboard_header', [ $this, 'ajax_handler' ] );
	}

	/**
	 * Add menu items to the dashboard menu.
	 *
	 * @param array $menu_items The existing menu items.
	 * @return array The updated menu items.
	 *
	 * @since 1.2.0
	 */
	public function add_menu_items( $menu_items ) {
		$menu_items['header'] = [
			'title'    => esc_html__( 'Header', 'cp24-wp-tools' ),
			'slug'     => 'cp24-header',
			'priority' => 1,
		];

		return $menu_items;
	}

	/**
	 * Handle the AJAX request to save the footer content.
	 *
	 * @since 1.2.0
	 */
	public function ajax_handler() {
		check_ajax_referer( Init::NONCE, 'nonce' );

		if ( empty( $_REQUEST['sub_action'] ) ) { // phpcs:ignore
			wp_send_json_error();
		}

		$action = filter_var( wp_unslash( $_REQUEST['sub_action'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ); // phpcs:ignore
		$action = sanitize_text_field( $action );

		if ( ! method_exists( $this, $action ) ) {
			wp_send_json_error();
		}

		call_user_func( [ $this, $action ] );
	}

	/**
	 * Save the header template details.
	 *
	 * @since 1.2.0
	 */
	public function save_header_template() {
		$template_id = filter_var( wp_unslash( $_REQUEST['template_id'] ), FILTER_SANITIZE_NUMBER_INT ); // phpcs:ignore
		$template_id = intval( sanitize_text_field( $template_id ) );

		$post  = get_post( $template_id );
		$title = $post->post_title;

		$settings = Settings::get_instance()->get_all();

		if ( ! array_key_exists( 'header', $settings ) ) {
			$settings['header'] = [];
		}

		$settings['header']['template_id'] = $template_id;
		$settings['header']['title']       = $title;

		Settings::get_instance()->save_all( $settings );

		wp_send_json_success( esc_html__( 'Settings saved', 'cp24' ) );
	}

	/**
	 * Search for header templates.
	 *
	 * @since 1.2.0
	 */
	public function search_header_templates() {
		$string = filter_var( wp_unslash( $_REQUEST['string'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ); // phpcs:ignore
		$string = sanitize_text_field( $string );

		$args = [
			'post_type'      => [ 'post', 'elementor_library' ],
			'posts_per_page' => -1,
			's'              => $string,
		];

		$query     = new \WP_Query( $args );
		$templates = [];

		foreach ( $query->posts as $post ) {
			$templates[] = [
				'value' => $post->ID,
				'label' => $post->post_title,
			];
		}

		wp_send_json_success( $templates );
	}

	/**
	 * Get the saved header template details.
	 *
	 * @since 1.2.0
	 */
	public function get_header_template() {
		$settings = Settings::get_instance()->get( 'header' );

		$settings = [
			'value' => $settings['template_id'] ?? 0,
			'label' => $settings['title'] ?? '',
		];

		wp_send_json_success( $settings );
	}

	/**
	 * Set CP24 header.
	 */
	public function set_cp24_header() {
		$settings = Settings::get_instance()->get( 'header' );

		if ( empty( $settings['template_id'] ) ) {
			return;
		}

		add_filter( 'cp24_frontend_header_settings', function() use ( $settings ) {
			return $settings;
		}, 10, 0 );

		if ( is_page_template( 'cp24_default' ) ) {
			return;
		}

		remove_all_actions( 'get_header' );
		add_action( 'get_header', [ $this, 'load_cp24_header' ], 5 );
	}

	/**
	 * Load CP24 header.
	 */
	public function load_cp24_header() {
		include_once CP24_MULTI_SMTP_PATH . 'inc/layout/header/header-template.php';

		$templates = [];
		$name = (string) $name;
		if ( '' !== $name ) {
			$templates[] = "header-{$name}.php";
		}

		$templates[] = 'header.php';

		// Avoid running wp_head hooks again
		remove_all_actions( 'wp_head' );
		ob_start();
		// It cause a `require_once` so, in the get_header it self it will not be required again.
		locate_template( $templates, true );
		ob_get_clean();
	}
}
