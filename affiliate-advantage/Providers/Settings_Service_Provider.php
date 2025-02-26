<?php


namespace Level_Wp\Affiliate_Advantage\Providers;


use Level_Wp\Affiliate_Advantage\Controllers\Settings_Controller;
use Level_Wp\Affiliate_Advantage\Plugin;

class Settings_Service_Provider extends Base_Service_Provider {

	private $settings_controller;

	public function __construct() {
		$this->settings_controller = new Settings_Controller();
	}

	/**
	 * Registers wordpress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'admin_init', [ $this, 'run' ] );
	}

	public function run() {
		register_setting( 'general', Plugin::get_instance()->prefix . 'keep_data_on_uninstall' );
		register_setting( 'links', Plugin::get_instance()->prefix . 'link_prefix' );
		register_setting( 'links', Plugin::get_instance()->prefix . 'is_custom_link_prefix' );
		register_setting( 'links', Plugin::get_instance()->prefix . 'redirection_type' );
		register_setting( 'links', Plugin::get_instance()->prefix . 'open_in_new_tab' );
		register_setting( 'links', Plugin::get_instance()->prefix . 'add_no_follow' );
		register_setting( 'links', Plugin::get_instance()->prefix . 'uncloak' );
		register_setting( 'links', Plugin::get_instance()->prefix . 'forward_parameters' );

		add_settings_section( 'general', 'General', [
			$this->settings_controller,
			'display_general_settings'
		], 'general' );
		add_settings_section( 'links', 'Links Settings', [
			$this->settings_controller,
			'display_links_settings'
		], 'links' );

		add_settings_field( Plugin::get_instance()->prefix . 'keep_data_on_uninstall', 'Keep plugin data after uninstalling the plugin?', [
			$this->settings_controller,
			'display_setting_field'
		], 'general', 'general', [ 'field' => 'keep_data_on_uninstall' ] );

		add_settings_field( Plugin::get_instance()->prefix . 'link_prefix', 'Link Prefix', [
			$this->settings_controller,
			'display_setting_field'
		], 'links', 'links', [ 'field' => 'link_prefix' ] );
		add_settings_field( Plugin::get_instance()->prefix . 'redirection_type', 'Redirection Type', [
			$this->settings_controller,
			'display_setting_field'
		], 'links', 'links', [ 'field' => 'redirection_type' ] );
		add_settings_field( Plugin::get_instance()->prefix . 'open_in_new_tab', 'Open Links in New Tab?', [
			$this->settings_controller,
			'display_setting_field'
		], 'links', 'links', [ 'field' => 'open_in_new_tab' ] );
		add_settings_field( Plugin::get_instance()->prefix . 'add_no_follow', 'Add nofollow attribute?', [
			$this->settings_controller,
			'display_setting_field'
		], 'links', 'links', [ 'field' => 'add_no_follow' ] );
		add_settings_field( Plugin::get_instance()->prefix . 'uncloak', 'Uncloak links?', [
			$this->settings_controller,
			'display_setting_field'
		], 'links', 'links', [ 'field' => 'uncloak' ] );
		add_settings_field( Plugin::get_instance()->prefix . 'forward_parameters', 'Forward parameters to affiliate links?', [
			$this->settings_controller,
			'display_setting_field'
		], 'links', 'links', [ 'field' => 'forward_parameters' ] );


	}
}
