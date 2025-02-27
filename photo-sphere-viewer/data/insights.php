<?php

/**
 * Insights SDK File
 * SDK Version 1.0.0
 */

if (! defined('ABSPATH')) {
	exit;
}

if (! class_exists('XERO_SDK')) {

	/**
	 * Insights SDK Class
	 */
	class XERO_SDK {

		public $version;

		public $xero_name;
		public $xero_allow_name;
		public $xero_insights_date_name;
		public $xero_insights_count_name;
		public $nonce;
		public $params;
		public $text_domain;

		/**
		 * Insights SDK Version
		 * param array $params
		 * @return void
		 */
		public function __construct($params) {
			$this->params      = $params;
			$this->text_domain = isset($params['text_domain']) ? $params['text_domain'] : 'xero';
			$this->version     = isset($params['sdk_version']) ? $params['sdk_version'] : '1.0.0';

			add_action('wp_ajax_data_sdk_insights', array($this, 'data_sdk_insights'));
			add_action('wp_ajax_xero_sdk_dismiss_notice', array($this, 'xero_sdk_dismiss_notice'));
			add_action('wp_ajax_data_sdk_insights_deactivate_feedback', array($this, 'insights_deactivate_feedback'));

			$security_key         = md5($params['plugin_name']);
			$this->xero_name       = 'xero_' . str_replace('-', '_', sanitize_title($params['plugin_name']) . '_' . $security_key);
			$this->xero_allow_name = 'xero_allow_status_' . $this->xero_name;
			$this->xero_insights_date_name  = 'xero_status_date_' . $this->xero_name;
			$xero_insights_count_name       = 'xero_attempt_count_' . $this->xero_name;
			$xero_status_db        = get_option($this->xero_allow_name, false);

			$this->nonce = wp_create_nonce($this->xero_allow_name);

			/**
			 * Deactivate Feedback
			 * Visible only in plugins.php
			 */
			$this->deactivation_feedback($params);

			/**
			 * Modal Trigger if not init
			 * Show Notice Modal
			 */
			if (! $xero_status_db) {
				$delay_check = $this->show_notice_delay_init($params);
				if ($delay_check) {
					return;
				}

				$this->notice_modal($params);
				return;
			}

			/**
			 * If Disallow
			 */
			if ('disallow' == $xero_status_db) {
				return;
			}

			/**
			 * Skip & Date Not Expired
			 * Show Notice Modal
			 */
			if ('skip' == $xero_status_db && true == $this->check_date()) {
				$this->notice_modal($params);
				return;
			}

			/**
			 * Allowed & Date not Expired
			 * No need send data to server
			 * Else Send Data to Server
			 */
			if (! $this->check_date()) {
				return;
			}

			/**
			 * Count attempt every time
			 */
			$xero_attempt = get_option($xero_insights_count_name, 0);

			if (! $xero_attempt) {
				update_option($xero_insights_count_name, 1);
			}
			update_option($xero_insights_count_name, $xero_attempt + 1);

			/**
			 * Next schedule date for attempt
			 */
			update_option($this->xero_insights_date_name, gmdate('Y-m-d', strtotime("+1 month")));

			/**
			 * Prepare data
			 */
			$this->data_prepare($params);
		}

		/**
		 * Show Notice after time/days delay first time init
		 *
		 * Installed time less than means hide notice
		 */
		public function show_notice_delay_init($params) {
			if (! isset($params['delay_time'])) {
				return false;
			}
			$installed = get_option($this->xero_name . '_installed', false);

			if (! $installed) {
				update_option($this->xero_name . '_installed', time());
			}

			$time = isset($params['delay_time']['time']) ? $params['delay_time']['time'] : 60 * MINUTE_IN_SECONDS;

			$installed = get_option($this->xero_name . '_installed', false);

			if ($installed && (time() - $installed) < $time) {
				return true;
			}

			return false;
		}

		/**
		 * Insights Deactivate Feedback
		 */
		public function insights_deactivate_feedback() {
			$api_endpoint = isset($_POST['api_endpoint']) ? sanitize_text_field($_POST['api_endpoint']) : '';
			$public_key   = isset($_POST['public_key']) ? sanitize_text_field($_POST['public_key']) : '';
			$product_id   = isset($_POST['product_id']) ? sanitize_text_field($_POST['product_id']) : '';
			$feedback     = isset($_POST['feedback']) ? sanitize_text_field($_POST['feedback']) : '';
			$nonce        = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';

			if (! wp_verify_nonce($nonce, 'xero_sdk')) {
				wp_send_json(array(
					'status'  => 'error',
					'title'   => 'Error',
					'message' => 'Nonce verification failed',
				));
				wp_die();
			}

			if (! current_user_can('manage_options')) {
				wp_send_json(array(
					'status'  => 'error',
					'title'   => 'Error',
					'message' => 'Denied, you don\'t have right permission',
				));
				wp_die();
			}

			$feedback = json_decode(stripslashes($feedback), true);

			$data = array(
				'api_endpoint' => $api_endpoint,
				'public_key'   => $public_key,
				'product_id'   => $product_id,
				'feedback'     => $feedback,
			);

			$this->data_prepare($data);

			wp_send_json(array(
				'status'  => 'success',
				'title'   => 'Success',
				'message' => 'Success.',
			));
			wp_die();
		}

		/**
		 * Notice Modal
		 *
		 * @return void
		 */
		public function notice_modal($params) {

			$xero_data                = array();
			$xero_data['name']        = $this->xero_name;
			$xero_data['date_name']   = $this->xero_insights_date_name;
			$xero_data['allow_name']  = $this->xero_allow_name;
			$xero_data['nonce']       = wp_create_nonce('xero_sdk');
			$xero_data['slug']        = $params['slug'];
			$xero_data['text_domain'] = $this->text_domain;

			add_action('admin_enqueue_scripts', array($this, 'xero_enqueue_scripts'));

			/**
			 * If not current page
			 * Show Notice Modal & Return
			 */
			if ($params['current_page'] !== $params['menu_slug']) {
				if (! get_transient('dismissed_notice_' . $this->xero_name)) {
					add_action('admin_notices', array($this, 'display_global_notice'));
				}
				return;
			}

			/**
			 * If Dismissed but always show welcome is true then show notice on welcome page
			 */
			if (! isset($params['always_show_welcome']) && get_transient('dismissed_notice_' . $this->xero_name)) {
				return;
			}

			add_action('admin_notices', array($this, 'display_global_notice'));

			if (isset($params['popup_notice']) && true === $params['popup_notice']) {

				include_once dirname(__FILE__) . '/notice.php';

				add_action(
					'in_admin_header',
					function () use ($xero_data) {
						if (function_exists('xero_popup_notice')) {
							xero_popup_notice($xero_data);
						}
					},
					99999
				);
			}
		}

		/**
		 * Deactivate Feedback
		 *
		 * @return void
		 */
		public function deactivation_feedback($params) {
			$xero_data                         = array();
			$xero_data['nonce']                = wp_create_nonce('xero_sdk');
			$xero_data['slug']                 = $params['slug'];
			$xero_data['text_domain']          = $this->text_domain;
			$xero_data['api_endpoint']         = $params['api_endpoint'];
			$xero_data['public_key']           = $params['public_key'];
			$xero_data['product_id']           = $params['product_id'];
			$xero_data['core_file']            = isset($params['core_file']) ? $params['core_file'] : false;
			$xero_data['plugin_deactivate_id'] = isset($params['plugin_deactivate_id']) ? $params['plugin_deactivate_id'] : false;

			add_action('admin_enqueue_scripts', array($this, 'xero_enqueue_scripts'));

			if (isset($params['deactivate_feedback']) && true === $params['deactivate_feedback']) {

				include_once dirname(__FILE__) . '/deactivate-feedback.php';

				$current_screen = get_admin_page_parent();

				if (isset($current_screen) && ! empty($current_screen) && 'plugins.php' === $current_screen) {
					add_action(
						'in_admin_header',
						function () use ($xero_data) {
							if (function_exists('xero_deactivate_feedback')) {
								xero_deactivate_feedback($xero_data);
							}
						},
						99999
					);
				}
			}
		}

		/**
		 * If date is expired immidiate action
		 *
		 * @return boolean
		 */
		public function check_date() {
			$current_date    = strtotime(gmdate('Y-m-d'));
			$xero_status_date = strtotime(get_option($this->xero_insights_date_name, false));

			if (! $xero_status_date) {
				return true;
			}

			if ($xero_status_date && $current_date >= $xero_status_date) {
				return true;
			}
			return false;
		}

		/**
		 * Modal Trigger
		 *
		 * Not used
		 * @return boolean
		 */
		public function modal_trigger() {

			if (! wp_verify_nonce($this->xero_allow_name, $this->nonce)) {
				echo 'Nonce Verification Failed';
				return false;
			}

			$sanitized_status = sanitize_text_field($_GET['xero_allow_status']);

			if ($sanitized_status == 'skip') {
				update_option($this->xero_allow_name, 'skip');
				/**
				 * Next schedule date for attempt
				 */
				update_option($this->xero_insights_date_name, gmdate('Y-m-d', strtotime("+1 month")));
				return false;
			} elseif ($sanitized_status == 'yes') {
				update_option($this->xero_allow_name, 'yes');
				return true;
			}

			return false;
		}

		/**
		 * Reset Options Settings
		 * @return void
		 */
		public function reset_settings() {
			delete_option($this->xero_allow_name);
			delete_option($this->xero_insights_date_name);
		}

		/**
		 * Data prepare for send server
		 *
		 * @param array $server_url
		 * @return void
		 */
		public function data_prepare($params) {
			$server_url  = isset($params['api_endpoint']) ? $params['api_endpoint'] : false;
			$public_key  = isset($params['public_key']) ? $params['public_key'] : false;
			$custom_data = isset($params['custom_data']) ? $params['custom_data'] : false;
			$product_id  = isset($params['product_id']) ? $params['product_id'] : false;

			if (! $server_url || ! $public_key) {
				return;
			}

			/**
			 * ==================================
			 *
			 * Start Own Custom Important Data
			 *
			 * ==================================
			 */

			// $custom_data = array(
			// 	'active_modules' => array(),
			// 	'third_party'    => array(),
			// 	'extend'         => array(),
			// 	'other_settings' => array(),
			// );

			// $custom_data = wp_json_encode($custom_data, true);

			/**
			 * ==================================
			 *
			 * End Own Custom Important Data
			 *
			 * ==================================
			 */

			$data                = array();
			$data['public_key']  = $public_key;
			$data['product_id']  = $product_id;
			$data['custom_data'] = $custom_data;

			if (isset($params['feedback']) && ! empty($params['feedback'])) {
				$data['feedback'] = $params['feedback'];
			}

			$non_sensitive_data = $this->xero_non_sensitve_data();
			$data               = array_merge($data, $non_sensitive_data);

			$this->xero_send_data_to_server($server_url, $data);
		}

		/**
		 * Get the list of active and inactive plugins
		 *
		 * @return array
		 */
		private function get_all_plugins() {
			// Ensure get_plugins function is loaded
			if (! function_exists('get_plugins')) {
				include ABSPATH . '/wp-admin/includes/plugin.php';
			}

			$plugins             = get_plugins();
			$active_plugins_keys = get_option('active_plugins', []);
			$active_plugins      = [];

			foreach ($plugins as $k => $v) {
				// Take care of formatting the data how we want it.
				$formatted         = [];
				$formatted['name'] = wp_strip_all_tags($v['Name']);

				if (isset($v['Version'])) {
					$formatted['version'] = wp_strip_all_tags($v['Version']);
				}

				if (isset($v['Author'])) {
					$formatted['author'] = wp_strip_all_tags($v['Author']);
				}

				if (isset($v['Network'])) {
					$formatted['network'] = wp_strip_all_tags($v['Network']);
				}

				if (isset($v['PluginURI'])) {
					$formatted['plugin_uri'] = wp_strip_all_tags($v['PluginURI']);
				}

				if (in_array($k, $active_plugins_keys, true)) {
					// Remove active plugins from list so we can show active and inactive separately
					unset($plugins[$k]);
					$active_plugins[$k] = $formatted;
				} else {
					$plugins[$k] = $formatted;
				}
			}

			$plugins_data = [];
			foreach ($active_plugins as $slug => $_plugin) {
				$slug = strstr($slug, '/', true);

				if (! $slug) {
					continue;
				}

				$plugins_data[$slug] = [
					'name'    => isset($_plugin['name']) ? $_plugin['name'] : '',
					'version' => isset($_plugin['version']) ? $_plugin['version'] : '',
				];
			}

			return [
				'active_plugins'   => $active_plugins,
				'inactive_plugins' => $plugins,
				'plugins_data'     => $plugins_data,
			];
		}

		/**
		 * Non sensitive data
		 *
		 * @return array
		 */
		public function xero_non_sensitve_data() {
			$current_user = wp_get_current_user();
			$all_plugins  = $this->get_all_plugins();

			$users = get_users(
				[
					'role'    => 'administrator',
					'orderby' => 'ID',
					'order'   => 'ASC',
					'number'  => 1,
					'paged'   => 1,
				]
			);

			$admin_user = (is_array($users) && ! empty($users)) ? $users[0] : false;
			$first_name = $current_user->first_name;
			$last_name  = $current_user->last_name;

			if (empty($first_name) && empty($last_name)) {
				$first_name = $current_user->display_name;
				$last_name  = null;
			}

			if ($admin_user) {
				$first_name = $admin_user->first_name ? $admin_user->first_name : $admin_user->display_name;
				$last_name  = $admin_user->last_name;
			}

			$theme = wp_get_theme(get_stylesheet());

			$data = array(
				'first_name'   => $first_name,
				'last_name'    => $last_name,
				'email'        => get_option('admin_email'),
				'user_role'    => $current_user->roles[0],
				'website_url'  => $current_user->user_url,
				'website_data' => array(
					'sdk_version'            => $this->version,
					'website_name'           => get_bloginfo('name'),
					'wp_version'             => get_bloginfo('version'),
					'php_version'            => phpversion(),
					'locale'                 => get_locale(),
					'wp_multisite'           => is_multisite() ? 'Yes' : 'No',
					'wp_memory_limit'        => defined(WP_MEMORY_LIMIT) ? WP_MEMORY_LIMIT : false,
					'memory_limit'           => ini_get('memory_limit'),

					'inactive_plugins'       => $all_plugins['inactive_plugins'],
					'active_plugins'         => $all_plugins['active_plugins'],
					'active_plugins_count'   => count($all_plugins['active_plugins']),
					'inactive_plugins_count' => count($all_plugins['inactive_plugins']),

					'theme_name'             => $theme->get('Name'),
					'theme_version'          => $theme->get('Version'),
					'theme_uri'              => $theme->get('ThemeURI'),
					'theme_author'           => $theme->get('Author'),
				),
			);

			return $data;
		}

		/**
		 * Send data to server
		 *
		 * @param [string] $server_url
		 * @param [array] $data
		 * @return void
		 */
		public function xero_send_data_to_server($server_url, $data = null) {

			$args = array(
				'method'  => 'POST',
				'timeout' => 60,
				'headers' => array(
					'Content-Type' => 'application/json',
					'X-API-KEY'    => $data['public_key'],
				),
				'body'    => wp_json_encode($data),
			);

			// error_log( print_r( $args, true ) );

			$response = wp_remote_request($server_url, $args);

			if (is_wp_error($response)) {
				// echo 'Error: ' . $response->get_error_message();
				$this->reset_settings();
			} else {
				$response_data = wp_remote_retrieve_body($response);
				$response_data = json_decode($response_data, true);
				// print_r( $response_data );
				if (isset($response_data['data']['status']) && 401 == $response_data['data']['status']) {
					update_option($this->xero_insights_date_name, gmdate('Y-m-d', strtotime("+3 days")));
				}
			}
		}

		/**
		 * Ajax callback
		 */
		public function data_sdk_insights() {
			$sanitized_status = isset($_POST['button_val']) ? sanitize_text_field($_POST['button_val']) : '';
			$nonce            = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';
			$allow_name       = isset($_POST['allow_name']) ? sanitize_text_field($_POST['allow_name']) : '';
			$date_name        = isset($_POST['date_name']) ? sanitize_text_field($_POST['date_name']) : '';

			if (! wp_verify_nonce($nonce, 'xero_sdk')) {
				wp_send_json(array(
					'status'  => 'error',
					'title'   => 'Error',
					'message' => 'Nonce verification failed',
				));
				wp_die();
			}

			if (! current_user_can('manage_options')) {
				wp_send_json(array(
					'status'  => 'error',
					'title'   => 'Error',
					'message' => 'Denied, you don\'t have right permission',
				));
				wp_die();
			}

			if ('disallow' == $sanitized_status) {
				update_option($allow_name, 'disallow');
			}

			if ($sanitized_status == 'skip') {
				update_option($allow_name, 'skip');
				/**
				 * Next schedule date for attempt
				 */
				update_option($date_name, gmdate('Y-m-d', strtotime("+1 month")));
			} elseif ($sanitized_status == 'yes') {
				update_option($allow_name, 'yes');
			}

			wp_send_json(array(
				'status'  => 'success',
				'title'   => 'Success',
				'message' => 'Success.',
			));
			wp_die();
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since 1.0.0
		 */
		public function xero_enqueue_scripts() {
			wp_enqueue_style('xero-sdk', plugins_url('assets/css/data.css', __FILE__), array(), $this->version, 'all');
			wp_enqueue_script('xero-sdk', plugins_url('assets/js/xero.js', __FILE__), array('jquery'), $this->version, true);
		}

		/**
		 * Display Global Notice
		 *
		 * @return void
		 */
		public function display_global_notice() {
			$menu_slug = isset($this->params['menu_slug']) ? $this->params['menu_slug'] : 'javascript:void(0);';

			$admin_url = add_query_arg(array(
				'page' => $menu_slug,
			), admin_url('admin.php'));

			$plugin_title = isset($this->params['plugin_title']) ? $this->params['plugin_title'] : '';
			$plugin_msg   = isset($this->params['plugin_msg']) ? $this->params['plugin_msg'] : '';
			$plugin_icon  = isset($this->params['plugin_icon']) ? $this->params['plugin_icon'] : '';

?>
			<div
				class="xero-global-notice xero-notice-data notice notice-success is-dismissible <?php echo esc_attr(substr($this->xero_name, 0, -33)); ?>">
				<div class="xero-global-header bdt-xero-notice-global-header">
					<?php if (! empty($plugin_icon)) : ?>
						<div class="xero-notice-logo">
							<img src="<?php echo esc_url($plugin_icon); ?>" alt="xero icon">
						</div>
					<?php endif; ?>
					<div class="xero-notice-content">
						<h3>
							<?php echo wp_kses_post($plugin_title); ?>
						</h3>
						<?php echo wp_kses_post($plugin_msg); ?>

						<input type="hidden" name="xero_name" value="<?php echo esc_html($this->xero_name); ?>">
						<input type="hidden" name="xero_date_name" value="<?php echo esc_html($this->xero_insights_date_name); ?>">
						<input type="hidden" name="xero_allow_name" value="<?php echo esc_html($this->xero_allow_name); ?>">
						<input type="hidden" name="nonce" value="<?php echo esc_html(wp_create_nonce('xero_sdk')); ?>">

						<div class="bdt-xero-notice-button-wrap">
							<button name="xero_allow_status" value="yes" class="xero-button-allow">
								<?php esc_html_e('Count Me In!', 'data-collector-insights'); ?>
							</button>
							<button name="xero_allow_status" value="skip" class="xero-button-skip">
								<?php esc_html_e('Skip For Now', 'data-collector-insights'); ?>
							</button>
							<button name="xero_allow_status" value="disallow" class="xero-button-disallow xero-button-danger">
								<?php esc_html_e('No, Thanks', 'data-collector-insights'); ?>
							</button>
						</div>
					</div>
				</div>

			</div>

		<?php
		}
		public function __display_global_notice() {
			$menu_slug = isset($this->params['menu_slug']) ? $this->params['menu_slug'] : 'javascript:void(0);';

			$admin_url = add_query_arg(array(
				'page' => $menu_slug,
			), admin_url('admin.php'));

			$plugin_title = isset($this->params['plugin_title']) ? $this->params['plugin_title'] : '';
			$plugin_msg   = isset($this->params['plugin_msg']) ? $this->params['plugin_msg'] : '';
			$plugin_icon  = isset($this->params['plugin_icon']) ? $this->params['plugin_icon'] : '';

		?>
			<div class="xero-global-notice xero-notice-data notice notice-success is-dismissible">
				<div class="xero-global-header">
					<?php if (! empty($plugin_icon)) : ?>
						<div>
							<img src="<?php echo esc_url($plugin_icon); ?>" alt="icon">
						</div>
					<?php endif; ?>
					<h3>
						<?php echo wp_kses_post($plugin_title); ?>
					</h3>
				</div>
				<?php echo wp_kses_post($plugin_msg); ?>
				<p>
					<?php esc_html_e('What we', 'data-collector-insights'); ?> <a
						href="<?php echo esc_url($admin_url); ?>"><?php esc_html_e('collect', 'data-collector-insights'); ?></a>?
				</p>
				<input type="hidden" name="xero_name" value="<?php echo esc_html($this->xero_name); ?>">
				<input type="hidden" name="xero_date_name" value="<?php echo esc_html($this->xero_insights_date_name); ?>">
				<input type="hidden" name="xero_allow_name" value="<?php echo esc_html($this->xero_allow_name); ?>">
				<input type="hidden" name="nonce" value="<?php echo esc_html(wp_create_nonce('xero_sdk')); ?>">
				<p>
					<button name="xero_allow_status" value="yes" class="button button-primary xero-button-allow">
						<?php esc_html_e('Allow', 'data-collector-insights'); ?>
					</button>
					<button name="xero_allow_status" value="skip" class="button xero-button-skip button-secondary">
						<?php esc_html_e('I\'ll Skip For Now', 'data-collector-insights'); ?>
					</button>
					<button name="xero_allow_status" value="disallow" class="button xero-button-disallow xero-button-danger">
						<?php esc_html_e('Don\'t Allow', 'data-collector-insights'); ?>
					</button>
				</p>
			</div>
<?php
		}

		/**
		 * Dismiss Notice
		 *
		 * @return void
		 */
		public function xero_sdk_dismiss_notice() {
			$nonce    = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';
			$xero_name = isset($_POST['xero_name']) ? sanitize_text_field($_POST['xero_name']) : '';

			if (! wp_verify_nonce($nonce, 'xero_sdk')) {
				wp_send_json(array(
					'status'  => 'error',
					'title'   => 'Error',
					'message' => 'Nonce verification failed',
				));
				wp_die();
			}

			if (! current_user_can('manage_options')) {
				wp_send_json(array(
					'status'  => 'error',
					'title'   => 'Error',
					'message' => 'Denied, you don\'t have right permission',
				));
				wp_die();
			}

			set_transient('dismissed_notice_' . $xero_name, true, 7 * DAY_IN_SECONDS);

			wp_send_json(array(
				'status'  => 'success',
				'title'   => 'Success',
				'message' => 'Success.',
			));
			wp_die();
		}
	}
}

/**
 * Main Insights Function
 */
if (! function_exists('data_sdk_insights')) {
	function data_sdk_insights($params) {
		if (class_exists('XERO_SDK')) {
			new XERO_SDK($params);
		}
	}
}
