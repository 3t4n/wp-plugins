<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://michalrobak.pl
 * @since      1.0.0
 *
 * @package    Admin_Plugins_Description
 * @subpackage Admin_Plugins_Description/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Admin_Plugins_Description
 * @subpackage Admin_Plugins_Description/admin
 * @author     Michał Robak <hello@michalrobak.pl>
 */
class Admin_Plugins_Description_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Admin_Plugins_Description_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Admin_Plugins_Description_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/admin-plugins-description-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Admin_Plugins_Description_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Admin_Plugins_Description_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin-plugins-description-admin.js', array('jquery'), $this->version, false);
		wp_localize_script($this->plugin_name, 'adminPluginsDesription', array('ajaxurl' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('apd-nonce')));
	}

	public function add_description_form($plugin_file, $plugin_data)
	{
		$description = $this->get_plugin_description(sanitize_title($plugin_data['Name']));
		echo '<div class="apd-description">' . esc_html($description) . '</div>';
		echo '<div class="apd-form hidden">';
		echo '<textarea type="textarea" class="apd-textarea" placeholder="' . esc_attr__('Add custom description...', 'admin-plugins-description') . '">' . esc_textarea($description) . '</textarea>';
		echo '<div class="apd-buttons-container">';
		echo '<button data-plugin="' . esc_attr(sanitize_title($plugin_data['Name'])) . '" type="button" class="apd-button button button-primary">' . esc_html__('Save plugin description', 'admin-plugins-description') . '</button>';
		echo '<a data-plugin="' . esc_attr(sanitize_title($plugin_data['Name'])) . '" type="button" class="apd-delete-button">' . esc_html__('Delete description', 'admin-plugins-description') . '</a>';
		echo '</div>';
		echo '</div>';
	}

	public function add_description_link($links, $file)
	{
		$plugin_path = WP_PLUGIN_DIR . '/' . $file;
		$plugin_data = get_plugin_data($plugin_path);
		$plugin_name = sanitize_title($plugin_data['Name']);
		$icon = '<span class="dashicons dashicons-edit"></span>';
		$link_add  = '<span class="apd-link add" data-plugin="' . $plugin_name . '">' . $icon . __('Add description', 'admin-plugins-description') . '</span>';
		$link_edit = '<span class="apd-link edit" data-plugin="' . $plugin_name . '">' . $icon . __('Edit description', 'admin-plugins-description') . '</span>';
		$links[] = $link_add . $link_edit;
		return $links;
	}

	public function handle_ajax_request()
	{
		check_ajax_referer('apd-nonce', 'nonce');

		$descriptions = get_option('apd-descriptions', array());
		empty($descriptions) ? $descriptions = array() : $descriptions;

		if (isset($_POST['description']) && !empty($_POST['description'])) {
			$description = sanitize_text_field(wp_unslash($_POST['description']));
		} else {
			wp_send_json_error(__('Description cannot be empty', 'admin-plugins-description'));
		}
		if (isset($_POST['plugin'])) {
			$plugin = sanitize_text_field(wp_unslash($_POST['plugin']));
		} else {
			wp_send_json_error(__('Plugin identifier is missing', 'admin-plugins-description'));
		}

		if (empty($description)) {
			wp_send_json_error(__('Description cannot be empty', 'admin-plugins-description'));
		} else {
			$descriptions[$plugin] = $description;
			update_option('apd-descriptions', $descriptions, false);
			wp_send_json_success(array(
				'description' => $description,
				'plugin' => $plugin,
			));
		}
	}

	public function handle_remove_description()
	{
		check_ajax_referer('apd-nonce', 'nonce');

		$descriptions = get_option('apd-descriptions', array());
		if (empty($descriptions)) {
			wp_send_json_error(__('There is no descriptions', 'admin-plugins-description'));
		}

		if (isset($_POST['plugin'])) {
			$plugin = sanitize_text_field(wp_unslash($_POST['plugin']));
		} else {
			wp_send_json_error(__('Plugin identifier is missing', 'admin-plugins-description'));
		}
		unset($descriptions[$plugin]);

		update_option('apd-descriptions', $descriptions, false);
		wp_send_json_success(array(
			'plugin' => $plugin,
		));
	}

	private function get_plugin_description($plugin)
	{
		$descriptions = get_option('apd-descriptions', array());
		return isset($descriptions[$plugin]) ? $descriptions[$plugin] : '';
	}
}
