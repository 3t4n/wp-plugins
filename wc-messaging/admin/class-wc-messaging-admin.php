<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woom_Messaging
 * @subpackage Woom_Messaging/admin
 * @author     Sevengits <sevengits@gmail.com>
 */
class Woom_Messaging_Admin
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
	 * Whatsapp api init class
	 *
	 */
	private $woom_whatsapp_class;

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
		$this->woom_whatsapp_class = new WCWhatsapp();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook)
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woom_Messaging_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woom_Messaging_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style('chosen', plugin_dir_url(__FILE__) . 'packages/chosen/chosen.min.css', array(), '1.8.7', 'all');
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wc-messaging-admin.css', array(), $this->version, 'all');
		if (!wp_style_is('sgits-admin-common-css', 'enqueued')) {
			wp_enqueue_style('sgits-admin-common', plugin_dir_url(__FILE__) . 'css/common.css', array(), $this->version, 'all');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook)
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woom_Messaging_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woom_Messaging_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script('chosen', plugin_dir_url(__FILE__) . 'packages/chosen/chosen.jquery.min.js', array('jquery'), '1.8.7', true);
		wp_enqueue_script($this->plugin_name . '-admin', plugin_dir_url(__FILE__) . 'js/wc-messaging-admin.js', array('jquery'), $this->version, true);
		wp_localize_script($this->plugin_name . '-admin', 'woom_ajax', array('url' => admin_url('admin-ajax.php'), 'woom_post_nonce' => wp_create_nonce('woom-ajax-post')));
	}

	/**
	 * Helper function for checking checkboxes multiple values
	 * 
	 * @param string $value
	 * @return bool
	 * @since    1.0.0
	 */
	function woom_checkbox_valid($value = 'no')
	{
		$valid_values = array('yes', 1, 'on');
		$status = false;
		if (in_array(strtolower($value), $valid_values)) {
			$status = true;
		}
		return $status;
	}

	/**
	 * Helper function for checking checkboxes valid
	 * 
	 * @param string $error
	 * @return void
	 * @since    1.0.0
	 */
	function woom_report_error($error = '')
	{
		if ($this->woom_checkbox_valid(get_option('woom_enable_report_error'))) {
			// error_log(print_r($error, true));
		}
	}

	/**
	 * Custom type settings function
	 * @since 1.0.0
	 *
	 * @param string $section: unique id for settings 
	 * @param string $field
	 * @return array()
	 */
	function get_settings_statuses($section = '', $statuses = array(), $editable = false, $actions = array('preview'), $has_admin_row = true)
	{
		$recipients = array(__('Customer', 'wc-messaging'));
		if ($has_admin_row) {
			$recipients[] = __('Admin', 'wc-messaging');
		}
		$result = array();
		$templates = $this->woom_whatsapp_class->get_message_template('template');
		if (empty($templates)) {
			$templates_result = $this->woom_get_message_templates();
			if ($templates_result['success']) {
				$templates = update_option('woom_wa_templates', $templates_result['data']);
			} else {
				$class = 'notice notice-error';
				printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($templates_result['message']));
			}
		}
		$template_name_list = array('' => __('Select a template', 'wc-messaging'));
		$template_param_count_list = array();
		$available_params = array();

		foreach ($this->woom_whatsapp_class->woom_get_mparams('keys', 'array') as $value) {
			$available_params[$value] = $value;
		}
		if (is_array($templates)) {
			$template_ids = array_keys($templates);
			$template_names = array_column($templates, 'name');

			for ($id = 0; $id < count($template_names); $id++) {
				$template_param_count_list[$template_ids[$id]]['params_count'] = array('header' => 0, 'body' => 0, 'footer' => 0);
				if (isset($templates[$template_ids[$id]]['header_params_count'])) {
					$template_param_count_list[$template_ids[$id]]['params_count']['header'] = $templates[$template_ids[$id]]['header_params_count'];
				}
				if (isset($templates[$template_ids[$id]]['body_params_count'])) {
					$template_param_count_list[$template_ids[$id]]['params_count']['body'] = $templates[$template_ids[$id]]['body_params_count'];
				}
				if (isset($templates[$template_ids[$id]]['footer_params_count'])) {
					$template_param_count_list[$template_ids[$id]]['params_count']['footer'] = $templates[$template_ids[$id]]['footer_params_count'];
				}
				$template_name_list[$template_ids[$id]] = $template_names[$id];
			}
		}

		if (!empty($recipients)) {
			foreach ($statuses as $status_key => $status_label) :
				foreach ($recipients as $recipient_id => $reciever) {
					$fields = array();
					if ($recipient_id > 0) {
						$id_prefix = $section . '_' . strtolower($reciever) . '_' . str_replace('-', '_', $status_key);
					} else {
						$id_prefix = $section . '_' . str_replace('-', '_', $status_key);
					}
					if (!$editable) {
						$label_description = ucfirst(trim(str_replace('-', ' ', str_replace('wc', '', $status_key)) . ' order notification sent to the customer when orders have been marked ' . strtolower($status_label) . '.'));
					} else {
						$label_description = '';
					}
					if ($recipient_id === 0) {
						if ($editable) {
							$fields[] = array(
								'id' => $id_prefix . '_label',
								'type' => 'text',
								'default' => $status_label,
								'desc' => $label_description,
								'desc_tip'	=> true,
								'custom_attributes' => (count($recipients) > 1) ? array('rowspan' => count($recipients)) : array()
							);
						} else {
							$fields[] = array(
								'id' => $id_prefix . '_label',
								'name' => $status_label,
								'type' => 'label',
								'desc' => $label_description,
								'desc_tip'	=> true,
								'custom_attributes' => array('rowspan' => count($recipients))
							);
						}
					}
					$template_header_params_count = (isset($template_param_count_list[get_option($id_prefix . '_template', '')]['params_count']['header']) ? $template_param_count_list[get_option($id_prefix . '_template', '')]['params_count']['header'] : 0);
					$template_body_params_count = (isset($template_param_count_list[get_option($id_prefix . '_template', '')]['params_count']['body']) ? $template_param_count_list[get_option($id_prefix . '_template', '')]['params_count']['body'] : 0);
					$fields[] = array(
						'id' => $id_prefix . '_enabled',
						'type' => 'switch',
						'has_admin_row' => $has_admin_row,
						'label' => $reciever,
						'custom_attributes' => array(
							'onchange' => 'woom_handle_templates()',
						)

					);
					$fields[] = array(
						'id' => $id_prefix . '_template',
						'type' => "select",
						'placeholder' => __('template name', 'wc-messaging'),
						'options' => $template_name_list,
						'desc_tip'	=> true,
						'custom_attributes' => array(
							'onchange' => 'woom_update_template_preview(this,' . json_encode($template_param_count_list) . ')',
						)
					);
					if (in_array($section, array('woom_abandoned_cart_trigger', 'woom_abandoned_cart_admin_trigger'))) {
						$fields[] = array(
							'id' => $id_prefix . '_trigger_within',
							'type' => "woom_trigger_inline_options",
							'default' => false,
							'options' => array(
								array(
									'id' => $id_prefix . '_duration',
									'type' => 'number',
									'default' => 10
								),
								array(
									'id' => $id_prefix . '_duration_unit',
									'type' => 'select',
									'options' => array(
										'minute' => __('Minute', 'wc-messaging'),
										'hour' => __('Hour', 'wc-messaging'),
										'day' => __('Day', 'wc-messaging')
									),
									'default' => 'minute'
								)
							)
						);
					}
					$fields[] = array(
						'id' => $id_prefix . '_header_params',
						'type' => "select",
						'default' => '',
						'options' => array_merge(array('' => ($template_header_params_count === 0) ? __('No variables..', 'wc-messaging') :  __('Add variables..', 'wc-messaging')), $available_params),
						'desc' => __('This is text that you specify in the API that will be personalized to the customer, such as their name or order number.', 'wc-messaging'),
						'desc_tip'	=> true,
						'disabled' => ($template_header_params_count === 0),
						'custom_attributes' => array(
							'data-params_count' => $template_header_params_count,
							'onChange' => 'woom_handle_templates()',
						)
					);
					$fields[] = array(
						'id' => $id_prefix . '_body_params',
						'type' => "chosen-select",
						'placeholder' => __('Select variables..', 'wc-messaging'),
						'default' => '',
						'options' => $available_params,
						'desc' => __('This is text that you specify in the API that will be personalized to the customer, such as their name or order number.', 'wc-messaging'),
						'desc_tip'	=> true,
						'disabled' => ($template_body_params_count === 0),
						'custom_attributes' => array(
							'multiple' => 'true',
							'data-params_label_empty' => __('No variables..', 'wc-messaging'),
							'data-params_label' => __('Add variables..', 'wc-messaging'),
							'data-params_count' => $template_body_params_count,
							'data-error_message' => __("{{count}} variable missing", 'wc-messaging'),
							'data-chosen_value' => implode(',', get_option($id_prefix . '_body_params', array())),
						)
					);

					$row_actions = array();
					if (in_array('preview', $actions)) {
						$row_actions[] = array(
							'id' => $id_prefix . '_preview',
							'type' => "link",
							'name' => __('Preview', 'wc-messaging'),
							'data' => array('prefix' => $id_prefix)
						);
					}
					if (in_array('remove', $actions)) {
						$row_actions[] = array(
							'id' => $id_prefix . '_remove',
							'type' => "button",
							'show_only_if_editable' => $editable,
							'name' => __('Remove', 'wc-messaging'),
							'data' => array('prefix' => $id_prefix)
						);
					}
					if (in_array('adandoned_coupon', $actions)) {
						$row_actions[] = array(
							'id' => $id_prefix . '_coupon',
							'type' => "abandoned_coupon",
							'name' => __('Additional Settings', 'wc-messaging'),
							'field_title' => __('Collapse for additional settings', 'wc-messaging'),
							'data' => array('prefix' => $id_prefix)
						);
					}
					if (!empty($actions)) {
						$fields[] = array(

							'id' => $id_prefix . '_actions',
							'type' => "actions",
							'options' => $row_actions

						);
					}
					$result[] = $fields;
				}
			endforeach;
		}
		return $result;
	}


	/**
	 * get selected order status from array of statuses
	 * @since 1.0.0
	 *
	 * @param array $statuses
	 * @param string $status
	 * @return mixed
	 */
	function get_filtered_status($statuses = array(), $status = '')
	{
		foreach ($statuses as $status_key => $status_value) {
			if (str_replace('wc-', '', $status_key) === $status) {
				return array($status_key => $status_value);
			}
		}
		return array();
	}

	/**
	 * Woocommerce advanced tab custom sub tab
	 * @since 1.0.0
	 *
	 * @param [type] $settings_tab
	 * @return void
	 */
	public function woom_tab($settings_tab)
	{

		$settings_tab['woom_settings'] = __('WC Messaging', 'wc-messaging');
		return $settings_tab;
	}

	/**
	 * Function for adding WC Messaging sub sections
	 * 
	 * @param mixed $sections
	 * @return mixed
	 * @since 1.0.0
	 */
	function woom_add_tab_subsections($sections)
	{
		$new_sections = array(
			'woom_settings' => array(
				''              => __('General', 'wc-messaging'),
				'templates'  => __('Templates', 'wc-messaging'),
				'abandoned_cart'  => __('Abandoned cart', 'wc-messaging'),
			)
		);
		return array_merge($sections, $new_sections);
	}

	/**
	 * Function for adding WC Messaging settings
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	function woom_action_woocommerce_sections_woom_settings_tab()
	{
		global $current_section;
		$tab_id = 'woom_settings';
		$subsections = apply_filters('woom_tab_subsections', array());
		$links_html = '';
		$subsections['woom_settings']['support'] = __('Support & Premium', 'wc-messaging');
		foreach ($subsections as $tab_id => $sections) {
			$array_keys = array_keys($sections);
			foreach ($sections as $id => $label) {
				$link_url = esc_url(admin_url('admin.php?page=wc-settings&tab=' . $tab_id . '&section=' . sanitize_title($id)));
				$class_list = ($current_section == $id ? 'current' : '');
				$seperator = (end($array_keys) == $id) ? '' : '|';
				$links_html .= sprintf('<li><a href="%1$s" class="%2$s">%3$s</a>%4$s</li>', $link_url, $class_list, ucfirst($label), $seperator);
			}
			printf('<ul class="subsubsub">%1$s</ul><br class="clear"/>', wp_kses_post($links_html));
		}
		echo '<p id="woom-ajax-result"></p>';


		return;
	}


	function woom_trigger_opt_settings($link)
	{
?>
		<table class="wc_status_table wc_status_table--tools widefat">

			<tr class="clear_transients">
				<th>
					<?php
					printf('<strong class="name">%1$s</strong>', esc_html($link['name']));
					printf('<p class="description">%1$s</p>', esc_html($link['desc'])); ?>
				</th>
				<td class="run-tool">
					<?php
					$action = $link['option'];
					$custom_attributes = '';
					if (isset($action['custom_attributes'])) {
						foreach ($action['custom_attributes'] as $attr_key => $attr_val) {
							if (!empty($custom_attributes)) {
								$custom_attributes .= ' ';
							}
							$custom_attributes .= sprintf('%1$s=%2$s', $attr_key, $attr_val);
						}
					}
					$classes = '';
					if (isset($action['classname'])) {
						if (!empty($action['classname'])) {
							$classes .= ' ' . $action['classname'];
						} else {
							$classes = $action['classname'];
						}
					}
					switch ($action['type']) {
						case 'button':
							if (!empty($action['classname'])) {
								$classes .= ' button button-large';
							} else {
								$classes = 'button button-large';
							}
							printf('<button  %2$s class="%3$s">%1$s</button>', esc_html(ucfirst($action['name'])), esc_attr($custom_attributes), esc_attr($classes));
							break;

						default:
							# code...
							break;
					}
					?>
				</td>
			</tr>

		</table>
	<?php
	}


	function woom_update_wa_templates()
	{
		$result = array("success" => false, "templates" => array(), "message" => __("Failed to update", 'wc-messaging'));
		if ($_POST !== null) :
			if (!empty(sanitize_text_field(wp_unslash($_POST['data']['woom_nonce']))) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['data']['woom_nonce'])), 'woom-ajax-post') && !empty(sanitize_text_field(wp_unslash($_POST['data']['woom_access_token'])))) {
				$token = sanitize_text_field(wp_unslash($_POST['data']['woom_access_token']));
				$template_results = $this->woom_get_message_templates();
				$result = array("success" => $template_results['success'], "templates" => $template_results['data'], "message" => $template_results['message']);
			}
		endif;
		if ($result['success']) {
			update_option('woom_wa_templates', $result['templates']);
			$class = 'notice notice-success';
		} else {
			$class = 'notice notice-error';
		}
		$result = array("success" => $result['success'], "message" => $result['message']);
		$result['data'] = sprintf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($result['message']));
		return wp_send_json($result);
	}

	/**
	 * Function for  WC Messaging custom settings
	 * 
	 * @return mixed
	 * @since 1.0.0
	 */
	function get_custom_settings()
	{
		global $current_section;
		$settings = array();
		$subsections = apply_filters('woom_tab_subsections', array());
		$subsections['woom_settings']['support'] = __('Support', 'wc-messaging');

		foreach ($subsections as $sections) {
			foreach (array_keys($sections) as $section) {
				if ($current_section == $section) {
					if ($section !== '') {
						$settings = apply_filters('woom_subsection_settings_' . $section, array());
					} else {
						$settings = apply_filters('woom_subsection_settings', array());
					}
				}
			}
		}
		return $settings;
	}

	/**
	 * Function for  WC Messaging general settings
	 * 
	 * @return mixed $settings
	 * @return mixed
	 * @since 1.0.0
	 */
	function woom_general_settings($settings)
	{
		$new_settings = array();
		if (file_exists(plugin_dir_path(__FILE__) . 'partials/settings/general.php')) {
			include(plugin_dir_path(__FILE__) . 'partials/settings/general.php');
		}
		return array_merge($settings, $new_settings);
	}

	/**
	 * Function for  WC Messaging template settings
	 * 
	 * @return mixed $settings
	 * @return mixed
	 * @since 1.0.0
	 */
	function woom_template_settings($settings)
	{
		$new_settings = array();
		if (file_exists(plugin_dir_path(__FILE__) . 'partials/settings/template.php')) {
			include(plugin_dir_path(__FILE__) . 'partials/settings/template.php');
		}
		$additional_settings = apply_filters('woom_additional_settings', $new_settings);

		return array_merge($settings, $additional_settings);
	}


	/**
	 * Function for custom actions settings
	 * 
	 * @param mixed $settings
	 * @return mixed
	 * @since 1.0.0
	 */
	function woom_custom_actions_settings($settings)
	{
		$new_settings = array(

			array(
				'id'	=> 'woom_template_woomactions_tab',
				'type' => 'title',
				'name' => __('Custom trigger buttons', 'wc-messaging'),
				// 'desc'	=>	__('WC messaging configuration', 'wc-messaging'),
			),
			array(
				'id' => 'woom_triggers',
				'type' => 'woom_config_template_settings',
				'name' => __('Custom trigger buttons', 'wc-messaging'),
				'template_titles' => array(
					'title' => __('Button name', 'wc-messaging')
				),
				'label_editable' => true,
				'add_new_row' => true,
				'fields' => $this->get_settings_statuses(
					'woom_trigger',
					$this->woom_custom_options('trigger_actions'),
					$editable = true,
					$actions = array('preview', 'remove'),
					$has_admin_row = false
				),

			),
			array(
				'id'	=> 'woom_wcb_general_settings',
				'type'	=> 'sectionend',
				'name'	=> 'end_section',
			),
		);
		$settings = array_merge($settings, $new_settings);
		return $settings;
	}





	/**
	 * Function for custom options
	 * 
	 * @param string $section
	 * @return array
	 * @since 1.0.0
	 */
	function woom_custom_options($section = 'wc_bookings')
	{
		$result = array();
		switch ($section) {
			case 'wc_bookings':
				if (function_exists('get_wc_booking_statuses') && !empty(get_wc_booking_statuses())) {
					$result = array(
						'pending-confirmation' => __('Pending confirmation', 'wc-messaging'),
						'confirmed' => __('Confirmed', 'wc-messaging'),

					);
				}
				break;
			case 'trigger_actions':
				$result = array();
				$options = get_option('woom_triggers', array('action_1'));
				if (count($options) === 0) {
					delete_option('woom_triggers');
				}
				foreach (get_option('woom_triggers', array('action_1')) as $action) {
					$result[$action] = get_option('woom_trigger_' . $action . '_label', 'Action 1');
				}
				break;
			case 'trigger_hooks':
				$result = array();
				foreach (get_option('woom_trigger_hooks', array('hook_1')) as $hook) {
					if (!empty(get_option('woom_trigger_' . $hook . '_label', ''))) {
						$result[$hook] = get_option('woom_trigger_' . $hook . '_label', '');
					}
				}
				break;
			case 'abandoned_cart_triggers':
				$result = array();
				$options = get_option('woom_abandoned_cart_triggers', array('action_1'));
				if (count($options) === 0) {
					delete_option('woom_abandoned_cart_triggers');
				}
				foreach (get_option('woom_abandoned_cart_triggers', array('action_1')) as $action) {
					$result[$action] = get_option('woom_abandoned_cart_trigger_' . $action . '_label', 'Action 1');
				}
				break;

			default:
				$result = array();
				break;
		}
		return $result;
	}

	function woom_tools_settings($settings)
	{
		$new_settings = array();
		if (file_exists(plugin_dir_path(__FILE__) . 'partials/settings/tools.php')) {
			include(plugin_dir_path(__FILE__) . 'partials/settings/tools.php');
		}
		return array_merge($new_settings, $settings);
	}
	function woom_support_settings($settings)
	{
		$new_settings = array();
		if (file_exists(plugin_dir_path(__FILE__) . 'partials/settings/support.php')) {
			include(plugin_dir_path(__FILE__) . 'partials/settings/support.php');
		}
		return array_merge($settings, $new_settings);
	}
	function woom_get_site_diagnostic_info()
	{

		// Site URLs
		$site_url = get_site_url();
		$home_url = get_home_url();

		// Server Info
		$web_server = (!empty(sanitize_text_field(wp_unslash($_SERVER['SERVER_SOFTWARE'])))) ? sanitize_text_field(wp_unslash($_SERVER['SERVER_SOFTWARE'])) : 'Not available';

		// WordPress Info
		$wp_version = get_bloginfo('version');
		$multisite = is_multisite();
		$multisite_site_count = function_exists('get_blog_count') ? get_blog_count() : 'N/A';
		$wp_locale = get_locale();

		// PHP Info
		$php_version = phpversion();
		$php_memory_limit = ini_get('memory_limit');
		$wp_memory_limit = WP_MEMORY_LIMIT;

		// Construct the diagnostic info
		$diagnostic_info = array(
			'site url' => $site_url,
			'home url' => $home_url,
			'Web Server' => $web_server,
			'WordPress' => $wp_version . ($multisite ? "Multisite (subdirectory)" : ""),
			'Multisite Site Count' => $multisite_site_count,
		);
		$site_info = array(
			'WP Locale' => $wp_locale,
			'PHP' => $php_version,
			'PHP Memory Limit' => $php_memory_limit,
			'WP Memory Limit' => $wp_memory_limit
		);
		$woom_content = '';
		foreach ($diagnostic_info as $info_key => $info_val) {
			$woom_content .= sprintf('%1$s: %2$s <br>', ucfirst($info_key), $info_val);
		}
		$woom_content .= '<br>';
		foreach ($site_info as $info_key => $info_val) {
			$woom_content .= sprintf('%1$s: %2$s <br>', ucfirst($info_key), $info_val);
		}
		$woom_content .= '<br>Active Theme details<br>';
		$woom_active_theme_data = array(get_template() => array(
			'name' => wp_get_theme()->name,
		));
		if (!empty(wp_get_theme()->parent_theme)) {
			$woom_active_theme_data[get_template()]['Parent'] = wp_get_theme()->parent_theme;
		}
		$woom_active_theme_data[get_template()]['version'] = wp_get_theme()->version;
		foreach ($woom_active_theme_data[get_template()] as $theme_data => $theme_data_val) {
			$woom_content .= sprintf('%1$s: %2$s </br>', ucfirst($theme_data), $theme_data_val);
		}
		$woom_content .= '<br>Active plugins<br>';
		foreach ($this->woom_get_active_plugins_with_versions() as $text_domain => $plugin) {
			$woom_content .= sprintf('%1$s: %2$s </br>', ucfirst($plugin['name']), $plugin['version']);
		}
		return nl2br($woom_content);
	}
	function woom_get_active_plugins_with_versions()
	{
		$active_plugins = get_option('active_plugins');
		$plugins_info = array();

		foreach ($active_plugins as $plugin) {
			$plugin_path = WP_PLUGIN_DIR . '/' . $plugin;
			$plugin_data = get_plugin_data($plugin_path);

			$plugin_info = array(
				'name' => $plugin_data['Name'],
				'version' => $plugin_data['Version']
			);

			$plugins_info[$plugin_data['TextDomain']] = $plugin_info;
		}

		return $plugins_info;
	}

	function woom_html_to_plaintext($html)
	{
		$text = wp_strip_all_tags($html);
		$text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
		$text = preg_replace('/\s+/', ' ', $text);
		$text = preg_replace('/\s*<br\s*\/?>\s*/i', "\n", $text);
		return $text;
	}


	function woom_sidebar_config($sidebar_section)
	{
		$content = '';
		include(plugin_dir_path(__FILE__) . "partials/sidebar/$sidebar_section.php");
		return wp_kses($content, array(
			'div' => array('class' => array()),
			'p' => array('class' => array()),
			'a' => array('class' => array(), 'href' => array(), 'target' => array()),
			'ul' => array('class' => array()),
			'li' => array('class' => array())
		));
	}

	function woom_info_downlaoder($field)
	{
		echo '<style>.submit {display: none;}</style>';

		$content = '';
		$disabled = (isset($field['disabled']) && $field['disabled'] === true) ? 'readonly' : '';

		if (isset($field['content']) && !empty($field['content'])) {
			if (is_array($field['content'])) {
				foreach ($field['content'] as $data) {
					$content .= sprintf('<p>%1$s</p>', $data);
				}
			} else {
				$content = sprintf($field['content']);
			}
			$content = sprintf('<div data-html="' . $this->woom_html_to_plaintext($content) . '" class="woom-fullwidth woom_support_diagnostic_info" %2$s>%1$s</div>', $content, $disabled);
		}
		$buttons = '';
		if (isset($field['download_actions']) && !empty($field['download_actions'])) {
			foreach ($field['download_actions'] as $action) {
				$button_text = (isset($action['button_text']) && !empty($action['button_text'])) ? $action['button_text'] : '';
				$button_class = (isset($action['button_class']) && !empty($action['button_class'])) ? $action['button_class'] : '';
				$onclick_func = '';
				if (isset($action['button_action']) && !empty($action['button_action'])) {
					switch ($action['button_action']) {
						case 'download':
							$onclick_func = 'woom_doc_download(event)';
							break;
						case 'copy':
							$onclick_func = 'woom_doc_copy(event)';
							break;
					}
				}
				if ($onclick_func !== '') {
					$buttons .= sprintf('<button class="%2$s" onclick="' . $onclick_func . '">%1$s</button>', $button_text, $button_class, $onclick_func);
				} else {
					$buttons .= sprintf('<button class="%2$s">%1$s</button>', $button_text, $button_class);
				}
			}
			$woom_sidebar = '';
			if (isset($field['sidebar'])) {
				$woom_sidebar = apply_filters('woom_settings_sidebar', $field['sidebar']);
			}
			$description = '';
			foreach ($field['introduction'] as $descripition) {
				$description .= sprintf('<p>%1$s</p>', $descripition);
			}
			$content = printf(
				'<div class="woom-support-settings-container"><div class="woom-support-settings">%1$s<div class="woom-info-container">%2$s <p class="woom-buttons-group">%3$s</p></div></div><div class="woom-settings-sidebar">%4$s</div></div>',
				wp_kses($description, array(
					'div' => array('class' => array()),
					'p' => array('class' => array()),
					'a' => array('class' => array(), 'href' => array(), 'target' => array()),
				)),
				wp_kses($content, array(
					'div' => array('class' => array()),
					'p' => array('class' => array()),
					'br' => array(),
				)),
				wp_kses(
					$buttons,
					array('button' => array(
						'class' => array()
					))
				),
				wp_kses($woom_sidebar, array(
					'div' => array('class' => array()),
					'p' => array('class' => array()),
					'a' => array('class' => array()),
					'ul' => array(
						'class' => array()
					),
					'li' => array('class' => array()),
					'a' => array(
						'href' => array(),
						'target' => array(),
						'class' => array(),
					),
					'br' => array(),
				))
			);
		}
		return wp_kses($content, array(
			'div' => array('class' => array()),
			'p' => array('class' => array()),
			'br' => array(),
			'button' => array('class' => array()),
			'ul' => array(
				'class' => array(),
			),
			'a' => array(
				'href' => array(),
				'target' => array(),
				'class' => array(),
			)
		));
	}

	function woom_inline_fields($fields)
	{

		$field_val = get_option($fields['id'], '');
		$placeholder = (!empty($fields['placeholder']) && isset($fields['placeholder'])) ? $fields['placeholder'] : '';
		if (!isset($fields['desc'])) {
			$fields['desc'] = '';
		}
		if (!isset($fields['desc_tip'])) {
			$fields['desc_tip'] = false;
		}
	?>

		<table class="form-table">

			<tbody>
				<tr class="">
					<th scope="row" class="titledesc">
						<?php
						if (isset($fields['name'])) {
							echo esc_html($fields['name']);
						}


						if ($fields['desc_tip'] === true) {
							echo wp_kses(wc_help_tip($fields['desc']), array(
								'div' => array('class' => array()),
								'p' => array('class' => array()),
								'a' => array(
									'href' => array(),
									'target' => array(),
									'class' => array(),
								)
							));
						}
						?></th>
					<td class="forminp forminp-checkbox ">
						<fieldset>
							<legend class="screen-reader-text"><span><?php echo esc_html($fields['name']); ?></span></legend>
							<label for="woom_abandoned_cart_enable_webhook">
								<?php

								$woom_fields = $fields['fields'];
								foreach ($woom_fields as $field) {
									$field_val = get_option($field['id'], '');

									switch ($field['type']) {
										case 'button':
											$custom_attributes = '';
											if (isset($field['custom_attributes'])) {
												foreach ($field['custom_attributes'] as $attr_key => $attr_val) {
													if (!empty($custom_attributes)) {
														$custom_attributes .= ' ';
													}
													$custom_attributes .= sprintf('%1$s=%2$s', $attr_key, $attr_val);
												}
											}
											printf('<button class="button" %2$s>%1$s</button>', esc_html($field['name']), esc_attr($custom_attributes));
								?>
										<?php
											break;

										default:
										?>
											<input
												type="<?php echo esc_attr($field['type']); ?>"
												name="<?php echo esc_attr($field['id']); ?>"
												id="<?php echo esc_attr($field['id']); ?>"
												value="<?php echo esc_attr($field_val); ?>">

								<?php
											if ($fields['desc_tip'] !== true) {
												printf('<span>%s</span>', wp_kses_post($fields['desc']));
											} else {
												printf(wp_kses_post(wc_help_tip($field['desc'])));
											}
											break;
									}
								}

								?>
							</label>
						</fieldset>
						<?php
						if (!empty($fields['note'])) {
							printf('<b>Note: </b><span>%s</span>', wp_kses_post($fields['note']));
						}
						?>
					</td>
				</tr>

			</tbody>
		</table>
	<?php

	}

	function woom_fields_with_note($fields)
	{
		$field_val = get_option($fields['id'], '');
		$placeholder = (!empty($fields['placeholder']) && isset($fields['placeholder'])) ? $fields['placeholder'] : '';
		if (!isset($fields['desc'])) {
			$fields['desc'] = '';
		}
		if (!isset($fields['desc_tip'])) {
			$fields['desc_tip'] = false;
		}
	?>

		<table class="form-table">

			<tbody>
				<tr class="">
					<th scope="row" class="titledesc">
						<?php
						echo esc_html($fields['name']);

						if (isset($fields['desc']) && $fields['desc_tip'] === true) {
							echo wp_kses_post(wc_help_tip($fields['desc']));
						}
						?></th>
					<td class="forminp forminp-checkbox ">
						<fieldset>
							<label for="<?php echo esc_attr($fields['id']); ?>">

								<?php
								# available field types: button, input:text, checkbox
								switch ($fields['field_type']) {
									case 'button':
										if (!isset($fields['button_text'])) {
											$fields['button_text'] = $fields['name'];
										}
										$custom_attributes = '';
										if (isset($fields['custom_attributes'])) {
											foreach ($fields['custom_attributes'] as $attr_key => $attr_val) {
												if (!empty($custom_attributes)) {
													$custom_attributes .= ' ';
												}
												$custom_attributes .= sprintf('%1$s=%2$s', $attr_key, $attr_val);
											}
										}
										printf('<button class="button" %2$s>%1$s</button>', esc_html($fields['button_text']), esc_attr($custom_attributes));
										break;
									case 'checkbox':
										$field_val = get_option($fields['id'], 'no');
								?>
										<input type="checkbox"
											name="<?php echo esc_attr($fields['id']); ?>"
											id="<?php echo esc_attr($fields['id']); ?>"
											<?php echo ($field_val === 'yes') ? esc_attr('checked') : ''; ?>
											value="yes" />
									<?php
										break;

									default:
									?>
										<input
											type="<?php echo esc_attr($fields['field_type']); ?>"
											name="<?php echo esc_attr($fields['id']); ?>"
											id="<?php echo esc_attr($fields['id']); ?>"
											placeholder="<?php echo esc_attr($placeholder); ?>"
											value="<?php echo esc_attr($field_val); ?>" />
								<?php
										# code...
										break;
								}
								if ($fields['desc_tip'] !== true) {
									printf('<span>%s</span>', wp_kses_post($fields['desc']));
								}

								?>
							</label>
						</fieldset>
						<?php
						if ($fields['note'] !== true) {
							printf('<b>Note: </b><span>%s</span>', wp_kses_post($fields['note']));
						}
						?>
					</td>
				</tr>


			</tbody>
		</table>
	<?php
	}



	/**
	 * Function for display settings in the WooCommerce settings page.
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	function woom_action_woocommerce_settings_woom_settings_tab()
	{
		// Call settings function
		$settings = $this->get_custom_settings();
		WC_Admin_Settings::output_fields($settings);
	}
	/**
	 * Function for processing and saving custom settings 
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	function woom_action_woocommerce_settings_save_woom_settings_tab()
	{

		global $current_section;
		$tab_id = 'woom_settings';
		// Call settings function
		$settings = array();
		foreach ($this->get_custom_settings() as $fields) {
			if (array_key_exists('fields', $fields)) {
				foreach ($fields['fields'] as $custom_fields) {
					if (array_key_exists('id', $custom_fields)) {
						array_push($settings, $custom_fields);
					} else {
						if (is_array($custom_fields)) {
							foreach ($custom_fields as $custom_fields2) {
								array_push($settings, $custom_fields2);
							}
						}
					}
				}
			} else {
				array_push($settings, $fields);
			}
		}
		foreach ($settings as $option_id => $option) {
			delete_option($option['id']);
			if ($option['type'] === 'switch') {
				$option['type'] = 'checkbox';
			}
			if ($option['type'] === 'woom_copy_url') {
				$option['type'] = 'text';
			}
			if (isset($option['field_type'])) {
				$option['type'] = $option['field_type'];
			}
			if ($option['type'] === 'woom_trigger_inline_options') {
				foreach ($option['options'] as $custom_option) {
					$settings[] = $custom_option;
				}
			}
		}

		if ($current_section === 'abandoned_cart') :
			$fields = $this->woom_abandoned_cart_settings(array());
			$trigger_options = array();
			foreach ($fields as $setting) :
				if (isset($setting['toggle_settings'])) {
					$dynamic_triggers = $this->woom_get_trigger_actions('woom_abandoned_cart_triggers');
					if (!empty($dynamic_triggers)) {
						foreach ($dynamic_triggers as $trigger) {
							$settings_options = $this->woom_retrieve_custom_settings($setting['toggle_settings'], $trigger);
							$trigger_options = array_merge($trigger_options, $settings_options);
						}
					}
				}
			endforeach;
			foreach ($trigger_options as $trigger_option) {
				delete_option($trigger_option['id']);
			}
			$settings = array_merge($settings, $trigger_options);
		endif;

		WC_Admin_Settings::save_fields($settings);
		if ($current_section) {
			if ($current_section !== '') {
				do_action('woocommerce_update_options_' . $tab_id . '_' . $current_section, $settings);
			} else {
				do_action('woocommerce_update_options_' . $tab_id, $settings);
			}
		}
	}

	function woom_get_message_templates()
	{
		$result = array("data" => array(), "success" => false, "message" => __('Failed to retrieve data', 'wc-messaging'));

		$templates = [];
		$response = $this->woom_whatsapp_class->sync_message_templates();
		if ($response['success']) {
			$response_data = $response['data']->data;

			foreach ($response_data as $res) {
				if (strtolower($res->status) === 'approved') {

					$templates[$res->id] = array(
						'name' => $res->name,
						'language' => $res->language,
						'category' => $res->category,
						'status' => $res->status,
					);

					if (isset($res->components)) :

						foreach ($res->components as $comp_key => $comp_val) {
							if (!in_array(strtolower($comp_val->type), array('body', 'footer', 'header'))) {
								if (strtolower($comp_val->type) === 'buttons') {
									if (in_array('FLOW', get_object_vars($comp_val->buttons[0]))) {
										$templates[$res->id]['type'] = 'flow';
									}
								}
							}

							if (strtolower($comp_val->type) === 'body') {
								$templates[$res->id]['Body'] = $comp_val->text;
								if (isset($comp_val->example->body_text)) {

									$templates[$res->id]['body_params_opts'] = $comp_val->example->body_text[0];
									$templates[$res->id]['body_params_count'] = count($comp_val->example->body_text[0]);
								} elseif (isset($comp_val->example->body_text_named_params)) {

									$templates[$res->id]['body_params_opts'] = get_object_vars($comp_val->example->body_text_named_params[0]);
									$templates[$res->id]['body_params_count'] = count($comp_val->example->body_text_named_params);
								} else {

									$templates[$res->id]['body_params_count'] = 0;
								}
							} else if (strtolower($comp_val->type) === 'header') {
								if (isset($comp_val->text)) {
									$templates[$res->id]['Header'] = $comp_val->text;
								}
								if (isset($comp_val->format)) {
									$templates[$res->id]['format'] = $comp_val->format;
								}

								if (isset($comp_val->example->header_text)) {
									if (is_array($comp_val->example->header_text)) {
										$templates[$res->id]['header_params_opts'] = $comp_val->example->header_text;
										$templates[$res->id]['header_params_count'] = count($comp_val->example->header_text);
									} else {
										$this->woom_report_error($comp_val->example->header_text);
									}
								} else if (isset($comp_val->example->header_text_named_params)) {
									$templates[$res->id]['header_params_opts'] = get_object_vars($comp_val->example->header_text_named_params[0]);
									$templates[$res->id]['header_params_count'] = count($comp_val->example->header_text_named_params);
								} else {

									$templates[$res->id]['header_params_count'] = 0;
								}
							} else if (strtolower($comp_val->type) === 'footer') {

								$templates[$res->id]['Footer'] = $comp_val->text;

								if (isset($comp_val->example->footer_text)) {

									$templates[$res->id]['footer_params_count'] = $comp_val->example->footer_text;
									$templates[$res->id]['footer_params_count'] = count($comp_val->example->footer_text);
								} else if (isset($comp_val->example->footer_text_named_params)) {

									$templates[$res->id]['footer_params_count'] = get_object_vars($comp_val->example->footer_text_named_params[0]);
									$templates[$res->id]['footer_params_count'] = count($comp_val->example->footer_text_named_params);
								} else {

									$templates[$res->id]['footer_params_count'] = 0;
								}
							} else {
								$templates[$res->id]['extra'] = $comp_val;
							}
							if (!isset($templates[$res->id]['format'])) {

								$templates[$res->id]['format'] = 'TEXT';
							}


							if (!isset($templates[$res->id]['type'])) {

								$templates[$res->id]['type'] = 'template';
							}
						}
					endif;
				}
			}
		} else {
			return $response;
		}
		$result = array("data" => $templates, "success" => true, "message" => __("Data update successful.", 'wc-messaging'));

		return $result;
	}

	/**
	 * Custom display for settings type of "woom_config_template_settings"
	 * 
	 * @param [type] $links
	 * @return void
	 * @since 1.0.0
	 */
	public function woom_config_settings($links)
	{
		if (file_exists(plugin_dir_path(__FILE__) . 'partials/settings/config-settings-table.php')) {
			include(plugin_dir_path(__FILE__) . 'partials/settings/config-settings-table.php');
		}
	}

	function woom_settings_field_template($settings, $id_prefix = '')
	{
		if (!isset($settings['value']) && isset($settings['id'])) {
			$settings['id'] = $id_prefix . $settings['id'];
			if (!isset($settings['default'])) {
				$settings['default'] = '';
			}
			$settings['value'] = get_option($settings['id'], $settings['default']);
			if ($settings['type'] === 'checkbox' && $settings['value'] === 'no') {
				$settings['value'] = '';
			}
		}
		$input = '';
		if (!isset($settings['type'])) {
			$this->woom_report_error($settings);
			return $input;
		}
		switch ($settings['type']) {
			case 'checkbox':
				$input .= sprintf('<input type="%1$s" name="%2$s" id="%2$s" value="yes" class="woom-input" %3$s />', esc_attr($settings['type']), esc_attr($settings['id']), !empty($settings['value']) ? esc_attr('checked') : '');
				break;

			case 'select':
				if (!empty($settings['options'])) {
					$input = '';
					foreach ($settings['options'] as $opt_val => $opt_text) {
						$input .= sprintf('<option value="%1$s" %3$s>%2$s</option>', esc_attr($opt_val), esc_html($opt_text), esc_attr(selected(esc_attr($settings['value']), esc_attr($opt_val), false)));
					}

					$input = sprintf('<select name="%1$s" class="woom-input">%2$s</select>', esc_attr($settings['id']), $input);
				}
				break;

			case 'woom_inline_fields':
				$inline_inputs = '';
				foreach ($settings['fields'] as $field) {
					$inline_inputs .= $this->woom_settings_field_template($field, $id_prefix);
				}
				$input .= sprintf('<div class="woom-inline-fields">%1$s</div>', $inline_inputs);

				break;

			default:
				$input .= sprintf('<input type="%1$s" class="woom-input" name="%2$s" id="%2$s" value="%3$s" />', esc_attr($settings['type']), esc_attr($settings['id']), esc_attr($settings['value']));
				break;
		}
		return $input;
	}

	function woom_callback_popup()
	{
		$result = array(
			"success" => false,
			"message" => __("Something went wrong", 'wc-messaging')
		);
		if (!isset($_POST['data']['woom_nonce'])) {
			$result['message'] = __('Nonce missing', 'wc-messaging');
			return wp_send_json($result);
		}
		if ($_POST !== null) :
			if (wp_verify_nonce(sanitize_key($_POST['data']['woom_nonce']), 'woom-ajax-post')) {
				# popup template starts here 
				$html = '';
				$classes = 'woom-popup-dismiss dashicons dashicons-dismiss';
				$header = '';
				$closeBtn = sprintf('<span class="%1$s" onclick="woom_toggle_template_popup(event, this, false)"></span>', esc_attr($classes));
				$content = '';
				if (!empty(sanitize_text_field(wp_unslash($_POST['data']['template'])))) {
					#case preview: 
					$template_id = sanitize_text_field(wp_unslash($_POST['data']['template']));
					$header = sprintf('<h3>%s</h3>', esc_html(__('Selected template details', 'wc-messaging')));
					$template = $this->woom_whatsapp_class->get_message_template('template', $template_id);
					foreach ($template as $field_name => $field_val) {
						$exclude_fields = array('format', 'type');
						if (!in_array($field_name, $exclude_fields)) {
							if (!str_contains($field_name, 'params_count') && !is_object($field_val) && !is_array($field_val)) {
								$content .= sprintf('<tr><td><b>%1$s</b></td><td>%2$s</td></tr>', esc_html(ucfirst($field_name)), wp_kses($field_val, array('p' => array())));
							}
						}
					}
					$content = sprintf('<table class="popup-content wc_emails" id="%1$s">%2$s</table>', esc_attr('woom_template_table_' . $template_id), $content);
				}
				$content = sprintf('<div class="woom-popup-content">%1$s</div>', $content);
				#case preview ends: 


				$header = sprintf('<div class="woom-popup-header">%1$s %2$s</div>', $closeBtn, $header);
				$html = sprintf('<div class="woom-popup-panel" onclick="woom_prevent_element(event, false)">%1$s%2$s</div>', $header, $content);
				$html = sprintf('<div class="woom-popup-window" id="woom-wa-templates" onclick="woom_toggle_template_popup(event, this, false)">%1$s</div>', $html);
				$result = array(
					"success" => true,
					"content" => $html
				);
			}
		endif;

		return wp_send_json($result);
	}

	function woom_hidden_settings($link)
	{
		if (isset($link['default']) && !isset($link['value'])) {
			$link['value'] = get_option($link['id'], $link['default']);
		}
		if (!isset($link['value'])) {
			$link['value'] = '';
		}
		$link['value'] = get_option($link['id'], $link['value']);
		printf('<input style="display: none;" type="text" name="%1$s" id="%1$s" value="%2$s">', esc_attr($link['id']), esc_attr($link['value']));
	}

	/**
	 * Function for custom template options
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	function woom_save_custom_template_options()
	{

		if (!isset($_POST['data']['woom_nonce'])) {
			return;
		}
		if (!isset($_POST['data']['key'])) {
			return;
		}
		$result = array("status" => 'failed', "message" => __('Something went wrong', 'wc-messaging'));
		if (isset($_POST)) :
			if (wp_verify_nonce(sanitize_key($_POST['data']['woom_nonce']), 'woom-ajax-post')) {
				$key = sanitize_text_field(sanitize_key($_POST['data']['key']));
				$actions_key = (!empty(sanitize_text_field(wp_unslash($_POST['data']['actions_key'])))) ? sanitize_text_field(wp_unslash($_POST['data']['actions_key'])) : '';
				if (!empty($actions_key)) {
					$key_arr = get_option($actions_key, array('action_1'));
					array_push($key_arr, $key);
					update_option($actions_key, $key_arr);
					$result = array("status" => 'success', "message" => __('New row added successfully', 'wc-messaging'));
				} else {
					$result = array("status" => 'failed', "message" => __('something went wrong', 'wc-messaging'));
				}
			}
		endif;
		return wp_send_json($result);
	}

	/**
	 * Function for remove custom template options
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	function woom_remove_custom_template_options()
	{
		if ((empty(sanitize_key(wp_unslash($_POST['data']['woom_nonce']))))) {
			return;
		}
		if ((empty(sanitize_text_field(wp_unslash($_POST['data']['prefix']))))) {
			return;
		}

		if (isset($_POST)) :
			if (wp_verify_nonce(sanitize_key(wp_unslash($_POST['data']['woom_nonce'])), 'woom-ajax-post')) {
				$actions_container = (!empty(sanitize_text_field(wp_unslash($_POST['data']['container'])))) ? sanitize_text_field(wp_unslash($_POST['data']['container'])) : null;

				if (!empty($actions_container)) {
					$prefix = sanitize_text_field(wp_unslash($_POST['data']['prefix']));
					$action_name = (!empty(sanitize_text_field(wp_unslash($_POST['data']['item'])))) ? sanitize_text_field(wp_unslash($_POST['data']['item'])) : null;
					$woom_trigger_actions = get_option($actions_container, array('action_1'));

					$opts = array('_label', '_enabled', '_template', '_sent_admin', '_header_params', '_body_params', '_remove');
					foreach ($opts as $opt) {
						delete_option($prefix . '_' . $action_name . $opt);
					}
					update_option($actions_container, array_diff($woom_trigger_actions, array($action_name)));
					$result = array('status' => 'success', 'message' => "trigger action $action_name removed");
				} else {
					$result = array('status' => 'error', 'message' => __("Something went wrong", 'wc-messaging'));
				}
				return wp_send_json($result);
			}
		endif;
	}

	/**
	 * get order status options and id prefix
	 * 
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function get_order_status_settings($key = '')
	{
		$result = array();
		if (is_plugin_active('woocommerce/woocommerce.php') && ($key === '' || $key === 'woocommerce')) {
			$result[] = array('woom_woocommerce_config_per_status', wc_get_order_statuses());
		}
		return $result;
	}

	/**
	 * Send whatsapp message
	 * 
	 *
	 * @param [type] $template
	 * @param string $order_id
	 * @param array $order_status = array(old => OLD-STATUS, new => NEW-STATUS)
	 * @return void
	 * @since 1.0.0
	 */
	public function woom_trigger_msg($order_id = '', $template_prefix = '', $prefix_end = '', $contact = array())
	{
		if ($order_id !== '') {
			$order = wc_get_order($order_id);
			if (get_option('woom_whatsapp_api', '') !== '') {
				$template_prefixes = array($template_prefix);
				if (!empty($prefix_end)) {
					$template_prefixes[] = str_replace($prefix_end, '', $template_prefix) . 'admin_' . $prefix_end;
				}
				foreach ($template_prefixes as $prefix) {
					if ($prefix === str_replace($prefix_end, '', $template_prefix) . 'admin_' . $prefix_end) {
						$admin_numbers = get_option('woom_sent_admin_numbers', '');
						$admin_numbers = explode(",", $admin_numbers);
						$numbers = $admin_numbers;
					} else {
						$numbers = $contact;
					}
					if ($this->woom_checkbox_valid(get_option($prefix . '_enabled', 'no'))) {
						if (!empty(get_option($prefix . '_params', array()))) {
							delete_option($prefix . '_params');
						}
						$header_param_options = get_option($prefix . '_header_params', array());
						$body_param_options = get_option($prefix . '_body_params', array());
						if (is_array($header_param_options) && (in_array('order_number', $header_param_options) || in_array('order_date', $header_param_options))) {
							array_walk($header_param_options, function (&$value) {
								if ($value === 'order_number') {
									$value = 'order_id';
								}
								if ($value === 'order_date') {
									$value = 'order_date_created';
								}
							});
							update_option($prefix . '_header_params', $header_param_options);
						}
						if (is_array($body_param_options) && (in_array('order_number', $body_param_options) || in_array('order_date', $body_param_options))) {
							array_walk($body_param_options, function (&$value) {
								if ($value === 'order_number') {
									$value = 'order_id';
								}
								if ($value === 'order_date') {
									$value = 'order_date_created';
								}
							});
							update_option($prefix . '_body_params', $body_param_options);
						}
						$template = get_option('woom_wa_templates', array())[get_option($prefix . '_template', '')];

						$body_params = array();
						$header_params = array();
						if (!empty($template['body_params_count'])) {
							$body_params = $this->woom_whatsapp_class->woom_get_mparams($type = "both", $method = "array", $order, $body_param_options);
						}
						if (!empty($template['header_params_count'])) {
							$header_params = $this->woom_whatsapp_class->woom_get_mparams($type = "both", $method = "array", $order, $header_param_options);
						}

						$htmlspecifies = wp_specialchars_decode($this->woom_whatsapp_class->woom_get_whatsapp_template_by_name($template['name'], array('body' => $body_params, 'header' => $header_params)));
						$msg = "--------------------------------------------\n" . $htmlspecifies;
						if (count($numbers) > 0) {
							foreach ($numbers as $num) {
								$num = str_replace([' ', '+'], '', $num);
								$response = $this->woom_whatsapp_class->send_message_template($num, $template['name'], $template['language'], $body_params, $header_params);
								if ($response['success']) {
									$message_container = array(
										'comment_content' => $template['name'],
										'post_id' => $order->get_id(),
										'parent_id' => 0,
										'comment_agent' => $num,
										'parameters' => array('body' => $body_params, 'header' => $header_params)
									);
									if ($prefix === $template_prefix) {
										do_action('woom_whatsapp_msg_sent_success', array('wam_id' => $response['wam_id'], 'comment' => $message_container));
									}
									if ($prefix === str_replace($prefix_end, '', $template_prefix) . 'admin_' . $prefix_end) {
										do_action('woom_whatsapp_msg_sent_admin_success', array('wam_data' => $response['wam_id'], 'comment' => $message_container));
										$order->add_order_note(sprintf('%1$s - %2$s | %3$s %4$s', __('WC Messaging', 'wc-messaging'), ucfirst($order->get_status()), __('Admin notification', 'wc-messaging'), $msg), $is_customer_note = 0, $added_by_user = false);
									} else {
										$order->add_order_note(sprintf('%1$s - %2$s | %3$s %4$s', __('WC Messaging', 'wc-messaging'), ucfirst($order->get_status()), __('Customer notification', 'wc-messaging'), $msg), $is_customer_note = 0, $added_by_user = false);
									}
								} else {
									do_action('woom_whatsapp_msg_sent_fail', array('result' => $response['message']));
								}
							}
						} else {

							$this->woom_report_error("Sentable numbers array is empty");
						}
					}
				}
			} else {
				$this->woom_report_error("Whatsapp token is empty. Please update in settings");
			}
		}
	}


	/**
	 * Function for action buttons of meta boxes
	 * 
	 * @return void 
	 * @since 1.0.0
	 */
	function woom_action_buttons_meta_box()
	{
		$screen_id = "shop_order";
		if (get_current_screen()->post_type === $screen_id && get_current_screen()->id !== $screen_id) {
			$screen_id = get_current_screen()->id;
		}
		if (!empty(get_option('woom_whatsapp_api', ''))) {
			add_meta_box(
				'woom-manual-trigger-actions',
				__('Whatsapp notifications', 'wc-messaging'),
				array($this, 'woom_action_buttons_display'),
				$screen_id,
				'side'
			);
		}
	}

	/**
	 * Function for action button display
	 * 
	 * @param mixed $order
	 * @return void
	 * @since 1.0.0
	 */
	function woom_action_buttons_display($order)
	{

		if ($order instanceof WP_Post) {
			$order = new WC_Order($order->ID);
		}
		$woom_order_id = $order->get_id();
	?>
		<section>
			<div class="wcw-buttons">
				<?php
				foreach (get_option('woom_triggers', array('action_1')) as $button) {
					if ($this->woom_checkbox_valid(get_option('woom_trigger_' . $button . '_enabled', 'no'))) {
						$button_prefix = "woom_trigger_$button";
						$button_label = get_option('woom_trigger_' . $button . '_label', '');
						printf('<button data-order-id="%1$s" data-prefix="%2$s" class="button btn button-secondary" onClick="woom_trigger_button(event, this)">%3$s</button>', esc_attr($woom_order_id), esc_attr($button_prefix), esc_html($button_label));
					}
				}
				?>
			</div>
			<div id="woom_trigger_status"></div>
		</section>
	<?php
	}

	/**
	 * Function for send manual messages
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	function woom_send_manual_msg()
	{
		if (!isset($_POST['data']['woom_nonce'])) {
			return;
		}
		if (!isset($_POST['data']['order_id'])) {
			return;
		}
		if (!isset($_POST['data']['slug_prefix'])) {
			return;
		}
		$result = array();
		if ($_POST !== null) :
			if (wp_verify_nonce(sanitize_key($_POST['data']['woom_nonce']), 'woom-ajax-post')) {
				$order_id = sanitize_text_field(wp_unslash($_POST['data']['order_id']));
				$slug_prefix = sanitize_text_field(wp_unslash($_POST['data']['slug_prefix']));
				$result = array('success' => true, 'message' => __("Message sent successfully", 'wc-messaging'));
				$woom_wa_notification_status = get_option('woom_send_order_notification', 'all');
				$is_user_wa_msg_billing_accepted = in_array($woom_wa_notification_status, array('all', 'billing'));
				$is_user_wa_msg_shipping_accepted = in_array($woom_wa_notification_status, array('all', 'shipping'));
				$order = wc_get_order($order_id);
				$contact_numbers = array();
				if ($is_user_wa_msg_billing_accepted && !empty($order->get_billing_phone())) {
					$contact_numbers[] = str_replace([' ', '+'], '', $order->get_billing_phone());
				}
				if ($is_user_wa_msg_shipping_accepted && !empty($order->get_shipping_phone())) {
					$contact_numbers[] = str_replace([' ', '+'], '', $order->get_shipping_phone());
				}
				do_action('woom_trigger_wa_msg', $order_id, $slug_prefix, '', array_unique($contact_numbers));
				return wp_send_json($result);
			}
			return wp_send_json(array('success' => false, 'message' => __("Failed to verify nonce", 'wc-messaging')));
		endif;
		$result = array('success' => false, 'message' => __("Failed to fetch post data", 'wc-messaging'));
		return wp_send_json($result);
	}


	/**
	 * get array of data if array has multiple arrays
	 *
	 * @param [type] $list
	 * @return mixed
	 */
	function get_params_from_object($list, $prefix, $result = array())
	{
		foreach ($list as $key => $value) {
			if (in_array(gettype($value), ['object', 'array'])) {
				$this->get_params_from_object($value, $prefix . $key . '_', $result);
			} else {
				$result[$prefix . $key] = $value;
			}
		}
		return $result;
	}

	/**
	 * Send whatsapp message trigger if order status changed
	 *
	 * @param [type] $order_id
	 * @param [type] $old_status
	 * @param [type] $new_status
	 * @return void
	 * @since 1.0.0
	 */

	public function woom_send($order_id, $old_status, $new_status)
	{
		$order = wc_get_order($order_id);

		foreach (array_merge(array(), $this->get_order_status_settings()) as $get_order_status_settings) {
			$get_filtered_status = array_merge(array(), $this->get_filtered_status($get_order_status_settings[1], $new_status));

			if (count($get_filtered_status) > 0) {
				$get_filtered_status = str_replace('-', '_', array_keys($get_filtered_status)[0]);
				$slug_prefix = $get_order_status_settings[0] . '_' . $get_filtered_status;
				if (!empty(get_option($slug_prefix . '_template', '')) && $this->woom_checkbox_valid(get_option($slug_prefix . '_enabled', 'no'))) {

					$woom_wa_notification_status = get_option('woom_send_order_notification', 'all');
					$is_trigger_msg_opt_disabled = $woom_wa_notification_status === 'disable';
					$is_userconsent_disabled = get_option('woom_order_notification_permission', 'enable') === 'disable';
					$is_user_wa_msg_billing_accepted = in_array($woom_wa_notification_status, array('all', 'billing'));
					$is_user_wa_msg_shipping_accepted = in_array($woom_wa_notification_status, array('all', 'shipping'));
					if (!$is_userconsent_disabled) {
						if (in_array($woom_wa_notification_status, array('all', 'billing'))) {

							if ($order->get_meta('_wc_billing/namespace/woom_notification', true)) {
								if (empty($order->get_meta('_wc_billing/namespace/woom_notification'))) {
									$is_user_wa_msg_billing_accepted =  false;
								}
							} else if (empty($order->get_meta('_billing_woom_notification'))) {
								$is_user_wa_msg_billing_accepted = false;
							}
						}
						if (in_array($woom_wa_notification_status, array('all', 'shipping'))) {

							if ($order->get_meta('_wc_shipping/namespace/woom_notification', true)) {
								if (empty($order->get_meta('_wc_shipping/namespace/woom_notification'))) {
									$is_user_wa_msg_shipping_accepted =  false;
								}
							} else if (empty($order->get_meta('_shipping_woom_notification'))) {
								$is_user_wa_msg_shipping_accepted = false;
							}
						}
					}
					$contact_numbers = array();
					if ($is_user_wa_msg_billing_accepted && $is_user_wa_msg_shipping_accepted) {
						if (!empty($order->get_billing_phone()) && !empty($order->get_shipping_phone()) && ($order->get_billing_phone() !== $order->get_shipping_phone())) {
							$contact_numbers[] = $order->get_billing_phone();
							$contact_numbers[] = $order->get_shipping_phone();
						} else if (!empty($order->get_billing_phone())) {
							$contact_numbers[] = $order->get_billing_phone();
						} else if (!empty($order->get_shipping_phone())) {
							$contact_numbers[] = $order->get_shipping_phone();
						}
					} else if ($is_user_wa_msg_billing_accepted && !empty($order->get_billing_phone())) {
						$contact_numbers[] = $order->get_billing_phone();
					} else if ($is_user_wa_msg_shipping_accepted && !empty($order->get_shipping_phone())) {
						$contact_numbers[] = $order->get_shipping_phone();
					}
					if (!$is_trigger_msg_opt_disabled && ($is_user_wa_msg_billing_accepted || $is_user_wa_msg_shipping_accepted || $is_userconsent_disabled)) {
						do_action('woom_trigger_wa_msg', $order_id, $slug_prefix, $get_filtered_status, $contact_numbers);
					}
				} else {

					if (!$this->woom_checkbox_valid(get_option($slug_prefix . '_enabled', 'no'))) {
						$this->woom_report_error(__("notification disabled in template configuration", 'wc-messaging'));
					} else if (empty(get_option($slug_prefix . '_template', ''))) {
						$this->woom_report_error(__("Template name not specified", 'wc-messaging'));
						$this->woom_report_error('Order status: ' . $new_status);
					}
				}
			}
		}
	}

	/**
	 * Retrieves a list of trigger actions based on a given prefix.
	 *
	 * @param string $prefix The prefix to filter trigger actions by.
	 * @return iterable An array of trigger actions.
	 *
	 * @since 1.0.0
	 */
	function woom_get_trigger_actions($prefix = '')
	{
		#woom_abandoned_cart_triggers || woom_triggers
		$result = array();
		if (!empty($prefix)) {
			foreach (get_option($prefix, array()) as $action) {
				$result[] = substr($prefix, 0, -1) . "_" . $action;
			}
		}
		return $result;
	}


	/**
	 * function is designed to handle the saving of custom field values based on their types
	 * 
	 * @param mixed $fields
	 * @return mixed
	 * @since 1.0.0
	 */

	function woom_retrieve_custom_settings($settings, $prefix, $new_settings = array())
	{
		foreach ($settings as $option) {
			if ($option['type'] === 'woom_inline_fields' && isset($option['fields'])) {
				$new_settings = $this->woom_retrieve_custom_settings($option['fields'], $prefix, $new_settings);
			} else {
				$option['id'] = $prefix . "_" . $option['id'];
				$new_settings[] = $option;
			}
		}
		return $new_settings;
	}

	/**
	 * Addition of new links to an existing list of links
	 * 
	 * @param mixed $old_list
	 * @param mixed $new_list
	 * @param string $position
	 * @return mixed
	 * @since 1.0.0
	 */
	public function woom_merge_links($old_list, $new_list, $position = "end")
	{
		$settings = array();
		foreach ($new_list as $name => $item) {
			$target = (array_key_exists("target", $item)) ? $item['target'] : '';
			$classList = (array_key_exists("classList", $item)) ? $item['classList'] : '';
			$settings[$name] = '<a href="' . esc_url($item['link']) . '" target="' . $target . '" class="' . $classList . '">' . esc_html($item['name']) . '</a>';
		}
		if ($position !== "start") {
			// push into $links array at the end
			return array_merge($old_list, $settings);
		} else {
			return array_merge($settings, $old_list);
		}
	}

	/**
	 *  modify the list of links displayed in the WordPress admin area
	 * 
	 * @param mixed $links
	 * @return mixed
	 * @since 1.0.0
	 */
	public function woom_links_below_title_begin($links)
	{
		// if plugin is installed $links listed below the plugin title in plugins page. add custom links at the begin of list

		$link_list = array(
			'settings' => array(
				"name" => __('Settings', 'wc-messaging'),
				"classList" => "",
				"link" => esc_url(admin_url('admin.php?page=wc-settings&tab=woom_settings'))
			)
		);
		return $this->woom_merge_links($links, $link_list, "start");
	}

	/**
	 * Designed to modify the list of links displayed below the title of the plugin on the plugins page in the WordPress admin area.
	 * 
	 * @param mixed $links
	 * @return mixed
	 * @since 1.0.0
	 */
	public function woom_links_below_title_end($links)
	{
		// if plugin is installed $links listed below the plugin title in plugins page. add custom links at the end of list
		$link_list = array(
			'docs' => array(
				"name" => __('Docs', 'wc-messaging'),
				"target" => '_blank',
				"link" => esc_url('https://sevengits.com/docs/wc-messaging/?utm_source=dashboard&utm_medium=plugins-link&utm_campaign=Free-plugin')
			),
			'buy-pro' => array(
				"name" => 'Buy Premium',
				"classList" => "pro-purchase get-pro-link",
				"target" => '_blank',
				"link" => 'https://sevengits.com/plugin/wc-messaging-pro/?utm_source=Wordpress&utm_medium=plugins-link&utm_campaign=Free-plugin'
			)
		);
		return $this->woom_merge_links($links, $link_list, "end");
	}

	/**
	 * Function used to provide additional links related to the wc messaging
	 * 
	 * @param mixed $links
	 * @param mixed $file
	 * @return mixed
	 * @since 1.0.0
	 */
	function woom_plugin_description_below_end($links, $file)
	{
		if (strpos($file, 'wc-messaging.php') !== false) {
			$new_links = array(
				'docs' => array(
					"name" => __('Docs', 'wc-messaging'),
					"target" => '_blank',
					"link" => esc_url('https://sevengits.com/docs/wc-messaging-pro/?utm_source=dashboard&utm_medium=plugins-link&utm_campaign=Free-plugin')
				),
				'support' => array(
					"name" => __('Support', 'wc-messaging'),
					"target" => '_blank',
					"link" => esc_url('https://sevengits.com/contact/?utm_source=dashboard&utm_medium=plugins-link&utm_campaign=Free-plugin')
				),

				'pro' => array(
					"name" => 'Buy Premium',
					"classList" => "pro-purchase get-pro-link",
					"target" => '_blank',
					"link" => 'https://sevengits.com/plugin/wc-messaging-pro/?utm_source=dashboard&utm_medium=plugins-link&utm_campaign=Free-plugin'
				),

			);
			$links = $this->woom_merge_links($links, $new_links, "end");
		}
		return $links;
	}

	/**
	 * 	Callback function to fetch health status and display widget content
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	public function woom_actions_buttons_display()
	{
		// Transient keys
		$transient_key = 'wc_messaging_health_status';
		$update_time_transient = $transient_key . '_update_time';

		// Retrieve the transient data
		$woom_response_data = get_transient($transient_key);

		// Retrieve the last updated time
		$update_time = get_transient($update_time_transient);
		$formatted_update_time = $update_time ? gmdate('Y-m-d H:i:s', $update_time) : 'Unknown';

		if ($woom_response_data === false) {
			// Fetch the health status from Facebook API
			$woom_whatsapp_number_id = get_option('woom_whatsapp_number_id');
			$woom_whatsapp_api = get_option('woom_whatsapp_api');
			$api_url = 'https://graph.facebook.com/v20.0/' . $woom_whatsapp_number_id . '?fields=health_status';
			$bearer_token = $woom_whatsapp_api;

			// Set up the request arguments
			$args = array(
				'timeout'     => 45,
				'redirection' => 5,
				'headers'     => array(
					'Content-Type'  => 'application/json; charset=utf-8',
					'Authorization' => 'Bearer ' . $bearer_token,
				),
				'cookies'     => array(),
			);

			// Perform the request
			$response = wp_remote_get($api_url, $args);

			// Check for errors
			if (is_wp_error($response)) {
				echo '<p>Error fetching health status.</p>';
				return;
			}

			// Get the response body
			$woom_body = wp_remote_retrieve_body($response);

			// Decode the JSON response
			$woom_response_data = json_decode($woom_body, true);

			// Store the response in a transient, set to expire in 1 hour
			set_transient($transient_key, $woom_response_data, HOUR_IN_SECONDS);

			// Store the current timestamp as the update time
			$update_time = time();
			set_transient($update_time_transient, $update_time, HOUR_IN_SECONDS);

			// Update the formatted update time
			$formatted_update_time = gmdate('Y-m-d H:i:s', $update_time);
		}

		// Extract the relevant status for each entity
		$statuses = array();
		if (isset($woom_response_data['health_status']['entities'])) {
			foreach ($woom_response_data['health_status']['entities'] as $entity) {
				if (isset($entity['entity_type']) && isset($entity['can_send_message'])) {
					$statuses[$entity['entity_type']] = $entity['can_send_message'];
				}
			}
		}

		// Display widget content
		$default_status = 'Unavailable';
		$phone_status = isset($statuses['PHONE_NUMBER']) ? $statuses['PHONE_NUMBER'] : $default_status;
		$waba_status = isset($statuses['WABA']) ? $statuses['WABA'] : $default_status;
		$business_status = isset($statuses['BUSINESS']) ? $statuses['BUSINESS'] : $default_status;
		$app_status = isset($statuses['APP']) ? $statuses['APP'] : $default_status;
	?>
		<div class="wrap">
			<h2>Health Status</h2>
			<div class="wc-messaging-overview">
				<div class="status">
					<table>
						<tr>
							<td><b>Phone Number</b></td>
							<td><?php echo esc_html($phone_status); ?></td>
						</tr>
						<tr>
							<td><b>WABA</b></td>
							<td><?php echo esc_html($waba_status); ?></td>
						</tr>
						<tr>
							<td><b>Business</b></td>
							<td><?php echo esc_html($business_status); ?></td>
						</tr>
						<tr>
							<td><b>APP</b></td>
							<td><?php echo esc_html($app_status); ?></td>
						</tr>
					</table>
				</div>
				<div class="links">
					<a href="https://wordpress.org/support/plugin/wc-messaging/">Support</a> |
					<a href="https://sevengits.com/docs/wc-messaging-pro/">Documentation</a> |
					<a href="https://sevengits.com/blog/">Blog</a> |
					<a href="https://wordpress.org/support/plugin/wc-messaging/reviews/">Write Review</a>
				</div>
				<div class="wc-updated-last">
					<?php echo " * Last updated " . esc_html($formatted_update_time); ?>
				</div>
			</div>
		</div>
		<style>
			.wc-messaging-overview {
				border: 1px solid #e5e5e5;
				padding: 10px;
				background: #fff;
			}

			.wc-messaging-overview .status table {
				width: 100%;
			}

			.wc-messaging-overview .status table td {
				padding: 5px;
				border-bottom: 1px solid #e5e5e5;
			}

			.wc-messaging-overview .links {
				margin-top: 10px;
			}

			.wc-messaging-overview .links a {
				margin-right: 10px;
			}

			.wc-updated-last {
				text-align: end;
				font-size: 10px;
			}
		</style>
<?php
	}

	// Hook to add the widget to the dashboard
	public function woom_add_wc_messaging_overview_widget()
	{
		wp_add_dashboard_widget(
			'wc_messaging_overview_widget', // Widget slug
			'WC Messaging Overview', // Title
			array($this, 'woom_actions_buttons_display') // Display function
		);
	}


	function woom_abandoned_cart_settings($settings)
	{
		$new_settings = array();
		if (file_exists(plugin_dir_path(__FILE__) . 'abandoned/settings.php')) {
			include(plugin_dir_path(__FILE__) . 'abandoned/settings.php');
		}
		return array_merge($settings, $new_settings);
	}
	/**
	 * Custom whatsapp template parameters for abandoned settings
	 *
	 * @param array $parameters
	 * @param [type] $order
	 * @param array $options
	 * @return iterable
	 */
	function woom_abandoned_wa_params($parameters = array(), $order = null, $options = array())
	{
		global $current_section;
		if (!empty($current_section) && $current_section === 'abandoned_cart' && $order === null) {
			$parameters = array(
				'coupon_code' => '',
				'Payment_url' => '',
				'offer_amount' => '',
				'offer_type' => ''
			);
		} else if (!empty($order) && is_array($options)) {
			if (in_array('coupon_code', $options)) {
				$parameters['coupon_code'] = '';
			}
			if (in_array('offer_amount', $options)) {
				$parameters['offer_amount'] = '';
			}
			if (in_array('offer_type', $options)) {
				$parameters['offer_type'] = '';
			}
			if (in_array('Payment_url', $options)) {
				$parameters['Payment_url'] = esc_url($order->get_checkout_payment_url());
			}
		}
		return $parameters;
	}

	/**
	 * Add cron scheduler by duration
	 *
	 * @param [type] $schedules
	 * @return iterable
	 */
	public function add_cron_schedule($schedules)
	{
		$schedules['every_five_minutes'] = array(
			'interval'  => 300,
			'display'   => __('Every 5 Minutes', 'wc-messaging')
		);
		return $schedules;
	}

	public function register_cron()
	{
		if (get_option('woom_abandoned_enable', 'no') === 'yes') {
			// Schedule the cron event if not already scheduled
			if (!wp_next_scheduled('woom_messaging_check_abandonment')) {
				wp_schedule_event(time(), 'every_five_minutes', 'woom_messaging_check_abandonment');
			}

			// schedule auto delete expired abandoned coupons
			if (get_option('woom_abandoned_auto_delete_coupon', 'no') === 'yes') {
				$auto_delete_coupons_class = new WCM_Abandoned_Coupon_Delete();
				$auto_delete_coupons_class->schedule_coupon_deletion();
			}
		}
	}
	/**
	 * check and trigger abandoned offer
	 *
	 * @return void
	 */
	public function check_abandonment()
	{
		if (get_option('woom_abandoned_enable', 'no') === 'yes') {
			// Instantiate and call method
			$abandonment_checker = new Wcm_Abandoned_Checker();
			$abandonment_checker->trigger_abandoned_offer();
		}
	}

	/**
	 * Deletes abandoned coupons.
	 *
	 * This function initializes necessary objects and triggers the deletion of abandoned coupons
	 * based on a specific prefix.
	 *
	 * @return mixed The result of the coupon deletion process, typically returned by the delete_coupons method.
	 */
	function delete_abandoned_coupons()
	{
		// Get coupon prefix from Wcm_Abandoned_Checker class
		$abandonment_checker = new Wcm_Abandoned_Checker();
		$coupon_prefix = $abandonment_checker->get_abandoned_coupon_prefix();

		// delete coupons by prefix
		$auto_delete_coupons_class = new WCM_Abandoned_Coupon_Delete();
		return $auto_delete_coupons_class->delete_coupons($coupon_prefix);
	}

	/**
	 * Handles the AJAX request to delete abandoned coupons manually.
	 *
	 * This function verifies the nonce for security, then calls the method to delete
	 * abandoned coupons. It returns a JSON response indicating the success or failure
	 * of the operation.
	 *
	 * @return void This function doesn't return anything directly, but sends a JSON response.
	 */
	function woom_delete_abandoned_coupons()
	{
		if (!isset($_POST['woom_nonce'])) {
			return;
		}
		$result = array(
			'success' => false,
			'message' => __('Failed to remove coupons', 'wc-messaging')
		);

		if (wp_verify_nonce(sanitize_key($_POST['woom_nonce']), 'woom-ajax-post')) {
			// delete coupons if exists
			$result = $this->delete_abandoned_coupons();
		}
		return wp_send_json($result);
	}

	/**
	 * Function for ajax retun call to send trigger sample message to url
	 * 
	 * @return void
	 * @since 2.0.5
	 */
	public function abandoned_trigger_sample()
	{
		if (class_exists('Wcm_Send_Abandoned_Status')) {
			$new_ob = new Wcm_Send_Abandoned_Status();
			// Call the method to send data
			$new_ob->send_trigger_sample_to_url();
		}
	}

	/**
	 * After abandoned order init
	 *
	 * @param [type] $order_id
	 * @return void
	 */
	public function woom_abandonment_created_data($order_id)
	{
		if (class_exists('Wcm_Send_Abandoned_Status')) {
			$abandoned_data = new Wcm_Send_Abandoned_Status();
			// Call the method to send abandoned cart data
			$abandoned_datas = $abandoned_data->abandonment_created_data($order_id);
		}
	}

	/**
	 * mark as abandoned order recovered
	 *
	 * @param [type] $order_id
	 * @param [type] $order
	 * @return void
	 */
	function woom_abandoned_recovery_complete($order_id, $order)
	{
		if ($order->get_meta('woom_abandonment_order_created', true)) {
			$order->update_meta_data('woom_abandoned_recovered', true);
			$order->save();
			do_action('woom_abandoned_order_recovered', $order_id);
		}
	}

	/**
	 * after abandoned order recovered
	 *
	 * @param [type] $order_id
	 * @return void
	 */
	public function woom_abadonment_recovery_data($order_id = null)
	{
		if (class_exists('Wcm_Send_Abandoned_Status') && !empty($order_id)) {
			$recovery_data = new Wcm_Send_Abandoned_Status();
			// Call the method to send abandoned cart data
			$recovery_datas = $recovery_data->abadonment_recovery_data($order_id);
		}
	}

	/**
	 * Function for deleting system user
	 */
	function woom_delete_wa_system_user()
	{
		if (!get_option('wa_system_user_deleted')) {
			$username = 'wa-system-user';
			$user = get_user_by('login', $username);

			if ($user) {
				wp_delete_user($user->ID);
				delete_option('wa-system-user');
			}

			// Set an option to ensure it runs only once
			update_option('wa_system_user_deleted', true);
		}
		return;
	}
}
?>