<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Lexilink_Settings {
	
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		
	}

	/**
	 * enqueue_scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts( $hook_suffix ) {

		if ( 'lexilink-glossary_page_lexilink-settings' === $hook_suffix ) {
			$settings_assets = include( LEXILINK_PLUGIN_PATH . 'public/assets/build/admin-settings-page.asset.php' );
			$deps = array_merge( $settings_assets['dependencies'], array( 'wp-color-picker' ) );
			wp_enqueue_style( 'lexilink-admin-page-settings', LEXILINK_PLUGIN_URL . 'public/assets/build/admin-settings-page.css', array('wp-color-picker'), $settings_assets['version'], 'all' );
			wp_enqueue_script( 'lexilink-admin-page-settings', LEXILINK_PLUGIN_URL . 'public/assets/build/admin-settings-page.js', $deps, $settings_assets['version'], true );
		}
	}
		
	/**
	 * add_settings_menu
	 *
	 * @return void
	 */
	public function add_settings_menu() {

		add_submenu_page(
			'edit.php?post_type=lexilink-glossary',
			__('Lexilink Settings', 'lexilink'),
			__('Settings', 'lexilink'),
			'manage_options',
			'lexilink-settings',
			array( $this, 'render_settings_page' ),
		);
	}
	
	/**
	 * render_settings_page
	 *
	 * @return void
	 */
	public function render_settings_page() {

		$settings = $this->get_settings();
		$size     = size_format( Lexilink_Import::FILE_SIZE );

		require_once LEXILINK_PLUGIN_PATH . 'admin/templates/page-settings.php';
	}

	/**
	 * Save settings page
	 */
	public function save_settings_page() {

		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['_wpnonce'] ) ) , 'lexilink-settings' ) ) return;

		$is_import = isset( $_POST['lexilink_import'] );
		if ( $is_import ) {

			$class_import = new Lexilink_Import();
			$file         = $class_import->get_file();

			if ( ! $file ) {
				/* translators: %s: error message */
				wp_admin_notice( sprintf( __( 'Sorry, there has been an error: (%s)', 'lexilink' ), 'No file selected' ), array( 'type' => 'error' ) );
				return;
			}

			if ( ! $class_import->check_file_type() ) {
				/* translators: %s: error message */
				wp_admin_notice( sprintf( __( 'Sorry, there has been an error: (%s)', 'lexilink' ), 'Wrong file type' ), array( 'type' => 'error' ) );
				return;
			}

			if ( ! $class_import->check_file_size() ) {
				/* translators: %s: error message */
				wp_admin_notice( sprintf( __( 'Sorry, there has been an error: (%s)', 'lexilink' ), 'File too big' ), array( 'type' => 'error' ) );
				return;
			}

			if ( $class_import->import() ) {
				/* translators: %s: success message */
				wp_admin_notice( __( 'File imported successfully', 'lexilink' ), array( 'type' => 'success' ) );
			} else {
				/* translators: %s: error message */
				wp_admin_notice( sprintf( __( 'Sorry, there has been an error: (%s)', 'lexilink' ), 'Something went wrong' ), array( 'type' => 'error' ) );
			}
			return;
		}

		$is_export = isset( $_POST['lexilink_export'] );
		if ( $is_export ) {
			$class_export = new Lexilink_Export();
			$class_export->export();
		} else {
			$dedicated_page   = sanitize_text_field( $_POST['lexilink']['dedicated_page'] ?? '' );
			$accordion        = sanitize_text_field( $_POST['lexilink']['accordion'] ?? '' );
			$search_bar       = sanitize_text_field( $_POST['lexilink']['search_bar'] ?? '' );
			$text_color       = sanitize_text_field( $_POST['lexilink']['text_color'] ?? '' );
			$background_color = sanitize_text_field( $_POST['lexilink']['background_color'] ?? '' );
			$accent_color     = sanitize_text_field( $_POST['lexilink']['accent_color'] ?? '' );

			$new_lexilink = array(
				'dedicated_page'   => '1' === $dedicated_page ? '1' : '0',
				'accordion'        => '1' === $accordion ? '1' : '0',
				'search_bar'       => '1' === $search_bar ? '1' : '0',
				'text_color'       => empty( $text_color ) ? '#0D0F10' : $text_color,
				'background_color' => empty( $background_color ) ? '#F3F3F1BF' : $background_color,
				'accent_color'     => empty( $accent_color ) ? '#00D420' : $accent_color
			);
			update_option( 'lexilink', $new_lexilink );
		}
	}

	/**
	 * Get settings
	 */
	public function get_settings() {

		$settings       = get_option( 'lexilink', array() );
		$settings_array = array();

		$settings_array['dedicated_page']   = $settings['dedicated_page'] ?? '0';
		$settings_array['accordion']        = $settings['accordion'] ?? '0';
		$settings_array['search_bar']       = $settings['search_bar'] ?? '0';
		$settings_array['text_color']       = $settings['text_color'] ?? '#0D0F10';
		$settings_array['background_color'] = $settings['background_color'] ?? '#F3F3F1BF';
		$settings_array['accent_color']     = $settings['accent_color'] ?? '#00D420';

		return $settings_array;
	}
}
