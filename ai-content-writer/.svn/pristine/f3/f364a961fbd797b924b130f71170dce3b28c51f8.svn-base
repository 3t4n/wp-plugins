<?php

namespace AIContentWriter\Admin;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * The main admin class.
 *
 * @since 1.0.0
 * @package AIContentWriter\Admin
 */
class Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		// Add admin menu.
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		// Add Settings sub menu.
		add_action( 'admin_menu', array( $this, 'settings_menu' ) );
		// Add Help sub menu.
		add_action( 'admin_menu', array( $this, 'help_menu' ) );
		// Enqueue admin scripts.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Add admin menu.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_menu() {
		add_menu_page(
			__( 'AI Content Writer', 'ai-content-writer' ),
			__( 'AI Content Writer', 'ai-content-writer' ),
			'manage_options',
			'ai-content-writer',
			null,
			'dashicons-edit-page',
			25,
		);

		// Add sub menu associated with the main menu.
		add_submenu_page(
			'ai-content-writer',
			__( 'Generate Content', 'ai-content-writer' ),
			__( 'Generate Content', 'ai-content-writer' ),
			'manage_options',
			'ai-content-writer',
			array( $this, 'admin_page' ),
		);
	}

	/**
	 * Add settings menu.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function settings_menu() {
		add_submenu_page(
			'ai-content-writer',
			__( 'Settings', 'ai-content-writer' ),
			__( 'Settings', 'ai-content-writer' ),
			'manage_options',
			'aicw-settings',
			array( $this, 'settings_page' ),
		);
	}

	/**
	 * Add help menu.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function help_menu() {
		add_submenu_page(
			'ai-content-writer',
			__( 'Help', 'ai-content-writer' ),
			__( 'Help', 'ai-content-writer' ),
			'manage_options',
			'aicw-help',
			array( $this, 'help_page' ),
		);
	}

	/**
	 * Admin page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_page() {
		wp_verify_nonce( '_nonce' );
		$is_featured_image = filter_input( INPUT_GET, 'featured_image', FILTER_VALIDATE_INT );
		$post_id           = filter_input( INPUT_GET, 'post_id', FILTER_VALIDATE_INT );

		if ( $is_featured_image && $post_id ) {
			// Get the post object.
			$post = get_post( $post_id );
			include __DIR__ . '/views/featured-image.php';
		} else {
			// Include the admin view.
			include __DIR__ . '/views/admin.php';
		}
	}

	/**
	 * Settings page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function settings_page() {
		include __DIR__ . '/views/settings.php';
	}

	/**
	 * Help page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function help_page() {
		include __DIR__ . '/views/help.php';
	}

	/**
	 * Enqueue admin scripts.
	 *
	 * @param string $hook The current page ID.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function enqueue_scripts( $hook ) {
		if ( 'toplevel_page_ai-content-writer' === $hook || 'ai-content-writer_page_aicw-settings' === $hook || 'ai-content-writer_page_aicw-help' === $hook ) {
			wp_enqueue_style( 'aicw-admin', AICW_ASSETS_URL . 'css/aicw-admin.css', array(), AICW_VERSION );
			wp_enqueue_script( 'aicw-admin', AICW_ASSETS_URL . 'js/aicw-admin.js', array( 'jquery' ), AICW_VERSION, true );
		}
	}
}
