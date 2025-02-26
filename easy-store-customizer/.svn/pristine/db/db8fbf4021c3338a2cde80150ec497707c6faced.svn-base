<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://100xwpdev.com
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/admin
 * @author     Bheru Lal Gameti  <bherulalgameti24@gmail.com>
 */
class Easy_Store_Customizer_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	private $settings;

	public function __construct($plugin_name, $version, $settings)
	{
		/**
		 * The class responsible for defining settings for the plugin.
		 */

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->settings = $settings;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Store_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Store_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/easy-store-customizer-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 
	 */
	public function enqueue_scripts($hook)
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Store_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Store_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ($hook === 'woocommerce_page_easy-store-customizer') {
			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/easy-store-customizer-admin.js', array('jquery'), $this->version, false);

			wp_localize_script($this->plugin_name, 'escAjax', array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('esc_settings_nonce')
			));
		}
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 
	 */
	public function add_plugin_admin_menu()
	{
		add_submenu_page('woocommerce', 'Easy Store Customizer', 'ES Customizer', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 
	 */
	public function add_action_links($links)
	{

		$settings_link = array(
			'<a href="' . esc_url(admin_url('admin.php?page=' . $this->plugin_name)) . '">' .
				esc_html__('Settings', 'easy-store-customizer') .
				'</a>'
		);

		return array_merge($settings_link, $links);
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 
	 */
	public function display_plugin_setup_page()
	{

		include_once('partials/' . $this->plugin_name . '-admin-display.php');
	}

	public function save_esc_settings()
	{
		$nonce = isset($_POST['nonce']) ? sanitize_text_field(wp_unslash($_POST['nonce'])) : null;


		if (!wp_verify_nonce($nonce, 'esc_settings_nonce')) {
			wp_send_json_error(array(
				'message' => 'You do not have permission to perform this action.'
			));
		}

		// Verify user capabilities
		if (!current_user_can('manage_options')) {
			wp_send_json_error(array(
				'message' => 'You do not have permission to perform this action.'
			));
		}

		/**
		 * Since wordpress don't have option to sanitize array, we need to sanitize it manually
		 * 
		 * I have created a method in settings class to sanitize the settings - sanitize_settings. 
		 * It's recusively sanitize the settings array.
		 * 
		 * 
		 */

		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$settings_data = isset($_POST[$this->plugin_name]) ? wp_unslash($_POST[$this->plugin_name]) : null;

		if (!$settings_data) {
			wp_send_json_error(array(
				'message' => 'No settings data received.'
			));
		}

		// Sanitize settings
		$settings = $this->settings->sanitize_settings($settings_data);

		if (is_wp_error($settings)) {
			wp_send_json_error(array(
				'message' => $settings->get_error_message()
			));
		}

		update_option($this->plugin_name, $settings);

		wp_send_json_success(array(
			'message' => 'Settings saved successfully!'
		));
	}
	/**
	 * Generate a feature control element
	 * 
	 * @param string $feature_key    The feature key
	 * @param array $feature_data    The feature data
	 * @param array $settings        The settings
	 */

	function generate_feature_control($feature_key, $settings)
	{
		$feature_data = $this->settings->get_defaults()[$feature_key];
		$status = isset($settings[$feature_key]['status']) && $settings[$feature_key]['status'] === 1;
?>
		<div class="esc-feature-control">
			<div class="esc-feature-header">
				<label class="esc-switch">
					<input type="checkbox"
						name="<?php echo esc_attr($this->plugin_name); ?>[<?php echo esc_attr($feature_key); ?>][status]"
						value="1"
						<?php checked($status, true); ?>>
					<span class="esc-slider round"></span>
				</label>
				<h3><?php echo esc_attr($feature_data['label']); ?></h3>
			</div>
			<div class="esc-feature-description">
				<p><?php echo wp_kses_post($feature_data['description']); ?></p>
			</div>

			<?php if (isset($feature_data['options'])) : ?>
				<div class="esc-feature-settings <?php echo esc_attr($status ? 'active' : ''); ?>">
					<?php foreach ($feature_data['options'] as $option_key => $default_value) : ?>
						<div class="esc-field-group">
							<label for="<?php echo esc_attr($feature_key . '_' . $option_key); ?>">
								<?php
								$label = ucwords(str_replace('_', ' ', $option_key));
								echo esc_html($label);
								?>
							</label>
							<input
								type="<?php echo is_numeric($default_value) ? 'number' : 'text'; ?>"
								id="<?php echo esc_attr($feature_key . '_' . $option_key); ?>"
								placeholder="<?php echo esc_attr($default_value); ?>"
								name="<?php echo esc_attr($this->plugin_name); ?>[<?php echo esc_attr($feature_key); ?>][options][<?php echo esc_attr($option_key); ?>]"
								value="<?php echo esc_attr($settings[$feature_key]['options'][$option_key] ?? $default_value); ?>"
								class="regular-text">
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
<?php
	}
}
