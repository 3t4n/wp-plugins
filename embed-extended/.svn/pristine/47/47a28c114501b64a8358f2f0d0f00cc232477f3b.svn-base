<?php

/**
 * Administrator panel settings page class.
 *
 * @since 1.1.0
 */
class Embed_Extended_Admin_Settings {
	/**
	 * Constructor.
	 */
	public function __construct() {
		if (isset($_POST['submit'])) {
			$this->save();
		}

		$this->render();
	}

	/**
	 * Get available tabs.
	 *
	 * @since 1.2.2
	 *
	 * @return array
	 */
	private function tabs() {
		$tabs = [
			'general' => __('General', 'embed-extended'),
			'auth' => __('Third-Party Auth', 'embed-extended'),
		];

		return apply_filters('embed_extended_admin_settings_tabs', $tabs);
	}

	/**
	 * Get current tab.
	 *
	 * @since 1.2.2
	 *
	 * @return string
	 */
	private function tab() {
		$tabs = $this->tabs();
		$tab_keys = array_keys($tabs);

		$tab = isset($_GET['tab']) ? $_GET['tab'] : null;
		if (!in_array($tab, $tab_keys)) {
			$tab = $tab_keys[0];
		}

		return $tab;
	}

	/**
	 * Get available settings for a particular tab.
	 *
	 * @since 1.2.2
	 *
	 * @param string $tab
	 * @return array
	 */
	private function settings($tab) {
		switch ($tab) {
			case 'general':
				$settings = [
					'embed_extended_url_patterns_mode' => 'exclude',
					'embed_extended_url_patterns' => '',
					'embed_extended_parse_html_content' => true,
					'embed_extended_custom_css' => '',
					'embed_extended_thumbnail_position' => 'top',
				];
				break;

			case 'auth':
				$settings = [
					'embed_extended_gmaps_api_key' => '',
				];
				break;

			default:
				$settings = [];
				break;
		}

		return apply_filters('embed_extended_admin_settings', $settings, $tab);
	}

	/**
	 * Save method for settings page.
	 *
	 * @since 1.1.0
	 */
	private function save() {
		$tab = $this->tab();
		$settings = $this->settings($tab);

		foreach ($settings as $key => $default) {
			$value = isset($_POST[$key]) ? $_POST[$key] : '';
			// Save boolean-type setting as integer.
			$value = is_bool($default) ? (int) $value : $value;

			update_option($key, $value);
		}
	}

	/**
	 * Render mathod for settings page.
	 *
	 * @since 1.1.0
	 */
	private function render() {
		$tabs = $this->tabs();
		$tab = $this->tab();
		$settings = $this->settings($tab);

		foreach ($settings as $key => $default) {
			$value = get_option($key, $default);
			settype($value, gettype($default));
			$settings[$key] = $value;
		}

		$data = [
			'tabs' => $tabs,
			'tab' => $tab,
			'settings' => $settings,
		];

		echo Embed_Extended()->get_template('admin-settings', $data);
	}
}
