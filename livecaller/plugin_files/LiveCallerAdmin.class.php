<?php
/**
 * Class LiveCallerAdmin
 *
 * @package LiveCaller
 */

namespace LiveCaller;

class LiveCallerAdmin extends LiveCaller {
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'settings_page' ] );
		add_action( 'admin_init', [ $this, 'setup_init' ] );
	}

	public function settings_page() {
		// Create the menu item and page
		$page_title = 'LiveCaller Settings';
		$menu_title = 'LiveCaller' . ( ! $this->is_installed() ? ' <span class="awaiting-mod">!</span>' : '' );
		$capability = 'manage_options';
		$slug       = 'livecaller_settings';
		$callback   = [ $this, 'settings_page_content' ];
		$image      = plugin_dir_url( __DIR__ . '..' ) . 'images/livecaller.png';

		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $image );
		add_filter( 'plugin_action_links', array( $this, 'livecaller_settings_link' ), 10, 2 );
	}

	public function livecaller_settings_link( $links, $file ) {
		if ( basename( $file ) !== 'livecaller.php' ) {
			return $links;
		}

		$settings_link = sprintf( '<a href="admin.php?page=livecaller_settings">%s</a>', __( 'Settings' ) );
		array_unshift( $links, $settings_link );
		return $links;
	}

	public function settings_page_content() {
		require_once __DIR__ . '/../views/settings.php';
	}

	public function setup_init() {
		add_settings_section(
			'livecaller_settings_general',
			'General Settings',
			null, // Description
			'livecaller_settings'
		);

		add_settings_field( 'livecaller_widget_id', 'Widget ID: ', [ $this, 'widget_id_input_callback', ], 'livecaller_settings', 'livecaller_settings_general' );
		add_settings_field( 'livecaller_locale', 'Locale: ', [ $this, 'locale_input_callback', ], 'livecaller_settings', 'livecaller_settings_general' );

		register_setting( 'livecaller_settings', 'livecaller_widget_id' );
		register_setting( 'livecaller_settings', 'livecaller_locale' );
	}

	public function widget_id_input_callback( $arguments ) {
		echo '<input name="livecaller_widget_id" id="livecaller_widget_id" type="text" style="width: 320px;" value="' . $this->widget_id() . '"\>';
	}

	public function locale_input_callback( $arguments ) {
		$selected = $this->widget_locale();

		echo '<select name="livecaller_locale">';

		foreach ( [
				'ka' => 'ქართული',
				'en' => 'English',
				'ru' => 'Русский',
			] as $key => $value ) {
			echo '<option value="' . $key . '" ' . ( $key == $selected ? ' selected' : '' ) . '>' . $value . '</option>';
		}

		echo '</select>';
	}
}
