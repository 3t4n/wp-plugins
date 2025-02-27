<?php

namespace UTM_Event_Tracker;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Main class plugin
 */
final class Admin {

	/**
	 * The single instance of the class.
	 *
	 * @var Admin
	 * @since 1.1.2
	 */
	protected static $_instance = null;

	/**
	 * Admin Instance.
	 *
	 * @since 1.1.2
	 * @return Admin - Main instance.
	 */
	public static function get_instance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Hold the instance of Report Widget
	 * 
	 * @var Admin\Report_Widgets
	 */
	public $report_widgets = null;

	/** 
	 * Constructor 
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->load();
		$this->init();

		add_action('admin_menu', [$this, 'admin_menu'], 0);
		add_action('admin_footer', [$this, 'include_components']);
		add_action('init', array($this, 'handle_settings_form'));
		add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
		add_action('wp_ajax_utm_event_tracker/dismiss_cache_notice', array($this, 'dismiss_cache_notice'));

		add_action('utm_event_tracker/admin_settings', array($this, 'add_cookie_setting_field'), 2);
		add_action('utm_event_tracker/admin_settings', array($this, 'add_append_parameters_field'), 10);
		add_action('utm_event_tracker/admin_settings', array($this, 'add_ipinfo_token_field'), 15);
		add_action('utm_event_tracker/admin_settings', array($this, 'add_webhook_url_field'), 20);
		add_action('utm_event_tracker/admin_settings', array($this, 'add_custom_event_field'), 25);
		add_action('utm_event_tracker/after_custom_events', array($this, 'add_custom_events_fields'));
	}

	/**
	 * Load files
	 * 
	 * @since 1.0.0
	 */
	public function load() {
		require_once UTM_EVENT_TRACKER_PATH . 'inc/admin/class-utm-sessions.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/admin/class-utm-campaign.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/admin/class-utm-medium.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/admin/class-utm-source.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/admin/class-utm-content.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/admin/class-utm-term.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/admin/class-event.php';
	}

	/**
	 * Initialize classes
	 * 
	 * @since 1.0.0
	 */
	public function init() {
		new Admin\UTM_Sessions();
		new Admin\UTM_Campaign();
		new Admin\UTM_Medium();
		new Admin\UTM_Source();
		new Admin\UTM_Content();
		new Admin\UTM_Term();
		new Admin\Sessoin_Event();
	}

	/**
	 * Handle submitted settings form
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function handle_settings_form() {
		if (!isset($_POST['_wpnonce']) || !isset($_POST['utm_event_tracker_settings'])) {
			return;
		}

		if (!wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']), '_nonce_utm_event_tracker_settings')) {
			return;
		}

		$settings = sanitize_text_field($_POST['utm_event_tracker_settings']);

		$settings_data = json_decode(stripslashes($settings), true);

		if (isset($settings_data['custom_events']) && is_array($settings_data['custom_events'])) {
			$settings_data['custom_events'] = array_map(function ($event) {
				return Settings::sanitize_custom_event($event);
			}, $settings_data['custom_events']);
		}

		update_option('utm_event_tracker_settings', wp_json_encode($settings_data));
		wp_safe_redirect(sanitize_text_field($_POST['_wp_http_referer'])); //phpcs:ignore WordPress.Security.SafeRedirect.wp_redirect_wp_redirect
		exit;
	}

	/**
	 * Handle dismiss cache notice request
	 * 
	 * @since 1.0.9
	 * @return void
	 */
	public function dismiss_cache_notice() {
		if (!isset($_POST['_wpnonce'])) {
			wp_send_json_error();
		}

		if (!wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']), 'utm_event_tracker/dismiss_cache_notice_nonce')) {
			wp_send_json_error();
		}

		update_option('utm_event_tracker_dismiss_cache_notice', 'yes');
		wp_send_json_success();
	}

	/**
	 * Register admin page
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_menu() {
		add_menu_page(__('UTM Analytics', 'utm-event-tracker'), __('UTM Analytics', 'utm-event-tracker'), 'manage_options', 'utm-event-tracker', array($this, 'screen_overview'), 'dashicons-chart-bar', 25);
		add_submenu_page('utm-event-tracker', __('UTM Analytics', 'utm-event-tracker'), __('Overview', 'utm-event-tracker'), 'manage_options', 'utm-event-tracker', [$this, 'screen_overview'], 0);
		do_action('utm_event_tracker/admin_menu');
		add_submenu_page('utm-event-tracker', __('UTM Analytics Settings', 'utm-event-tracker'), __('Settings', 'utm-event-tracker'), 'manage_options', 'utm-event-tracker-settings', array($this, 'screen_settings'));
	}

	/**
	 * Enqueue scripts
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_enqueue_scripts() {
		$screen = get_current_screen();
		preg_match('/(utm-event-tracker)/', $screen->id, $matches);
		if (empty($matches)) {
			return;
		}

		if (defined('UTM_EVENT_TRACKER_DEV_MODE')) {
			wp_register_script('utm-event-tracker-vue', UTM_EVENT_TRACKER_URL . 'assets/vue.js', [], '3.5.13', true);
		} else {
			wp_register_script('utm-event-tracker-vue', UTM_EVENT_TRACKER_URL . 'assets/vue.min.js', [], '3.5.13', true);
		}

		wp_register_style('utm-event-tracker-icons', UTM_EVENT_TRACKER_URL . 'assets/utm-event-tracker-icons/iconly.min.css', [], UTM_EVENT_TRACKER_VERSION);
		wp_register_style('daterangepicker', UTM_EVENT_TRACKER_URL . 'assets/daterangepicker.css');
		wp_enqueue_style('utm-event-tracker-admin', UTM_EVENT_TRACKER_URL . 'assets/admin.css', ['daterangepicker', 'utm-event-tracker-icons'], UTM_EVENT_TRACKER_VERSION);

		wp_register_script('daterangepicker', UTM_EVENT_TRACKER_URL . 'assets/daterangepicker.min.js', ['moment'], 3.1, true);
		do_action('utm_event_tracker/admin_enqueue_scripts');
		wp_enqueue_script('utm-event-tracker', UTM_EVENT_TRACKER_URL . 'assets/admin.min.js', ['utm-event-tracker-vue', 'wp-hooks', 'daterangepicker'], UTM_EVENT_TRACKER_VERSION, true);
		wp_localize_script('utm-event-tracker', 'utm_event_tracker', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'setting_models' => Settings::get_instance()->get_all_data(),
			'i10n' => array(
				'confirm_delete_custom_event' => esc_html__('Are you sure you want to delete this custom event?', 'utm-event-tracker')
			)
		));
	}

	/**
	 * Implement overview page
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function screen_overview() {
		include_once UTM_EVENT_TRACKER_PATH . '/template/overview.php';
	}

	/**
	 * Implement settings page
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function screen_settings() { ?>
		<div class="wrap wrap-utm-event-tracker">
			<h1 class="wp-heading-inline"><?php esc_html_e('UTM Event Tracker Settings', 'utm-event-tracker'); ?></h1>
			<hr class="wp-header-end">

			<form id="utm-event-tracker-settings" method="post">
				<?php wp_nonce_field('_nonce_utm_event_tracker_settings'); ?>
				<input type="hidden" name="utm_event_tracker_settings" :value="get_settings_data">

				<div class="utm-event-tracker-box">
					<div class="utm-event-tracker-heading">
						<h2><?php esc_html_e('Settings', 'utm-event-tracker'); ?></h2>
					</div>

					<table class="form-table">
						<?php do_action('utm_event_tracker/admin_settings'); ?>
					</table>
				</div>

				<div class="form-footer">
					<button class="button button-primary" name="submit" value="save"><?php esc_html_e('Save Changes', 'utm-event-tracker'); ?></button>
				</div>

				<?php if (!Utils::license_activated()) : ?>
					<div id="utm-event-tracker-custom-events-modal" class="utm-event-tracker-modal" v-if="show_custom_event_locked_modal">
						<div class="utm-modal-container">
							<a @click.prevent="show_custom_event_locked_modal = false" class="btn-close-modal dashicons dashicons-no-alt" href="#"></a>

							<?php if (!Utils::is_pro_installed()) : ?>
								<div class="utm-modal-body">
									<i class="modal-icon dashicons dashicons-lock"></i>
									<div></div>
									<?php esc_html_e('To add more custom events, you need to install the Pro version.', 'utm-event-tracker') ?>
								</div>

								<div class="utm-modal-footer">
									<a @click.prevent="show_custom_event_locked_modal = false" class="button" href="#"><?php esc_html_e('Back', 'utm-event-tracker') ?></a>
									<a target="_blank" class="button button-primary" href="https://codiepress.com/plugins/utm-event-tracker-and-analytics-pro/?utm_campaign=utm+event+tracker&utm_source=custom+events&utm_medium=add+new+event"><?php esc_html_e('Get Pro', 'utm-event-tracker') ?></a>
								</div>
							<?php endif; ?>

							<?php if (Utils::is_pro_installed() && !Utils::is_pro_activated()) : ?>
								<div class="utm-modal-body">
									<i class="modal-icon dashicons dashicons-lock"></i>
									<div></div>
									<?php esc_html_e('Please activate the "UTM Event Tracker & Analytics" plugin to add more custom events."', 'utm-event-tracker') ?>
								</div>

								<div class="utm-modal-footer">
									<a @click.prevent="show_custom_event_locked_modal = false" class="button" href="#"><?php esc_html_e('Back', 'utm-event-tracker') ?></a>

									<?php $plugin_activate_url = wp_nonce_url('plugins.php?action=activate&plugin=utm-event-tracker-and-analytics-pro/utm-event-tracker-and-analytics-pro.php&plugin_status=all&paged=1', 'activate-plugin_utm-event-tracker-and-analytics-pro/utm-event-tracker-and-analytics-pro.php'); ?>
									<a target="_blank" class="button button-primary" href="<?php echo esc_url($plugin_activate_url) ?>"><?php esc_html_e('Activate Now', 'utm-event-tracker') ?></a>
								</div>
							<?php endif; ?>


							<?php if (Utils::is_pro_activated() && !Utils::license_activated()) : ?>
								<div class="utm-modal-body">
									<i class="modal-icon dashicons dashicons-lock"></i>
									<div></div>
									<?php esc_html_e('Please activate "UTM Event Tracker & Analytics" plugin license to add more custom events."', 'utm-event-tracker') ?>
								</div>

								<div class="utm-modal-footer">
									<a @click.prevent="show_custom_event_locked_modal = false" class="button" href="#"><?php esc_html_e('Back', 'utm-event-tracker') ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</form>
		</div>
	<?php
	}

	/**
	 * Add component templates for vuejs
	 * 
	 * @since 1.0.0
	 */
	public function include_components() {
		echo '<template id="utm-event-tracker-pagination">';
		include_once UTM_EVENT_TRACKER_PATH . '/component/pagination.php';
		echo '</template>';

		echo '<template id="utm-event-tracker-keyword-stats">';
		include_once UTM_EVENT_TRACKER_PATH . '/component/keyword-stats.php';
		echo '</template>';

		echo '<template id="utm-event-tracker-session-list-all">';
		include_once UTM_EVENT_TRACKER_PATH . '/component/session-list-all.php';
		echo '</template>';

		echo '<template id="utm-event-tracker-session-list-param">';
		include_once UTM_EVENT_TRACKER_PATH . '/component/session-list-param.php';
		echo '</template>';

		echo '<template id="session-summary">';
		include_once UTM_EVENT_TRACKER_PATH . '/component/session-summary.php';
		echo '</template>';

		echo '<template id="utm-event-tracker-overview-widget">';
		include_once UTM_EVENT_TRACKER_PATH . '/component/overview-widget.php';
		echo '</template>';
	}

	/**
	 * Add cookie setting field
	 * 
	 * @since 1.1.2
	 */
	public function add_cookie_setting_field() { ?>
		<tr>
			<th>
				<label for="cookie-duration"><?php esc_html_e('Cookie Duration', 'utm-event-tracker'); ?></label>
				<p class="field-note"><?php esc_html_e('Specify the days of cookie duration. Default is 30 days.', 'utm-event-tracker'); ?></p>
			</th>
			<td>
				<input style="width: 60px;padding-right: 0" type="number" id="cookie-duration" v-model="cookie_duration">
				<?php esc_html_e('days', 'utm-event-tracker'); ?>
			</td>
		</tr>
	<?php
	}

	/**
	 * Add append parameter setting field
	 * 
	 * @since 1.1.2
	 */
	public function add_append_parameters_field() { ?>
		<tr>
			<th>
				<label for="append-utm-parameters"><?php esc_html_e('Append UTM Parameters', 'utm-event-tracker'); ?></label>
				<p class="field-note"><?php esc_html_e('Append UTM parameters within the URL.', 'utm-event-tracker'); ?></p>
			</th>
			<td>
				<div class="switch-input-field">
					<label>
						<input type="radio" value="yes" v-model="append_utm_parameter">
						<?php esc_html_e('Yes', 'utm-event-tracker'); ?>
					</label>

					<label>
						<input type="radio" value="no" v-model="append_utm_parameter">
						<?php esc_html_e('No', 'utm-event-tracker'); ?>
					</label>
				</div>
			</td>
		</tr>
	<?php
	}

	/**
	 * Add ipinfo token setting field
	 * 
	 * @since 1.1.2
	 */
	public function add_ipinfo_token_field() { ?>
		<tr>
			<th>
				<label for="ipinfo-token"><?php esc_html_e('IP Info Token', 'utm-event-tracker'); ?></label>

				<?php
				$note_text = sprintf(
					/* translators: 1 for ipinfo link */
					__('Get token from %s. 50k requests free per month.', 'utm-event-tracker'),
					'<a target="_blank" href="https://ipinfo.io/pricing">IP Info</a>'
				);
				?>

				<p class="field-note"><?php echo wp_kses($note_text, array('a' => array('href' => true, 'target' => true))); ?></p>
			</th>
			<td>
				<input v-model="ipinfo_token" type="password" id="ipinfo-token" placeholder="<?php esc_html_e('Enter your IP Info Token', 'utm-event-tracker'); ?>">
			</td>
		</tr>
	<?php
	}

	/**
	 * Add webhook url setting field
	 * 
	 * @since 1.1.2
	 */
	public function add_webhook_url_field() { ?>
		<tr>
			<th>
				<label for="webhook-url"><?php esc_html_e('Webhook URL', 'utm-event-tracker'); ?></label>
				<p class="field-note"><?php esc_html_e('Enter the webhook URL to receive UTM tracking data in real time. Compatible with Zapier for automation.', 'utm-event-tracker'); ?></p>
			</th>
			<td>
				<input v-model="webhook_url" type="url" id="webhook-url" placeholder="<?php esc_html_e('Enter your webhook URL', 'utm-event-tracker'); ?>">
			</td>
		</tr>
	<?php
	}

	/**
	 * Add custom event field
	 * 
	 * @since 1.1.2
	 * @return void
	 */
	public function add_custom_event_field() { ?>
		<tr>
			<th>
				<label><?php esc_html_e('Custom Events', 'utm-event-tracker'); ?></label>
				<p class="field-note"><?php esc_html_e('Add custom events to track button or link clicks. Use CSS selectors to target the elements you want to track.', 'utm-event-tracker'); ?></p>
			</th>
			<td style="vertical-align:top">

				<label>
					<input type="checkbox" v-model="capture_custom_events">
					<?php esc_html_e('Capture custom events', 'utm-event-tracker'); ?>
				</label>

				<div style="margin-bottom: 8px;"></div>

				<template v-if="capture_custom_events">
					<table class="utm-event-tracker-custom-events" v-for="(event_item, event_item_key) in custom_events" :key="event_item_key">
						<tr>
							<th>
								<?php esc_html_e('Event Title', 'utm-event-tracker'); ?>
								<p class="field-note"><?php esc_html_e('Specify the event title for the element you want to track.', 'utm-event-tracker'); ?></p>
							</th>
							<td>
								<?php $placeholder = esc_html__('Enter event title', 'utm-event-tracker'); ?>
								<input type="text" v-model="event_item.title" required placeholder="<?php echo esc_attr($placeholder) ?>" title="<?php echo esc_attr($placeholder) ?>">
							</td>

							<td class="custom-event-action" rowspan="3">
								<div class="event-action-container">
									<a class="dashicons dashicons-admin-page" href="#" @click.prevent="copy_custom_event(event_item_key)"></a>
									<a class="dashicons dashicons-trash" href="#" @click.prevent="delete_custom_event(event_item_key)"></a>
								</div>
							</td>
						</tr>

						<tr>
							<th>
								<?php esc_html_e('Event Selector', 'utm-event-tracker'); ?>
								<p class="field-note"><?php esc_html_e('Use CSS selector for this event like .container .button-phone, #btn-email.', 'utm-event-tracker'); ?></p>
							</th>
							<td>
								<?php $placeholder = esc_html__('Use commas for multiple selectors.', 'utm-event-tracker'); ?>
								<textarea type="text" v-model="event_item.selector" required title="<?php echo esc_attr($placeholder) ?>" placeholder="<?php echo esc_attr($placeholder) ?>"></textarea>
							</td>
						</tr>

						<tr>
							<th>
								<?php esc_html_e('Event Type', 'utm-event-tracker'); ?>
								<p class="field-note"><?php esc_html_e('Enter value like phone_click or button_click.', 'utm-event-tracker'); ?></p>
							</th>
							<td>
								<?php $placeholder = esc_html__('Enter the event type', 'utm-event-tracker'); ?>
								<input type="text" v-model="event_item.event_type" required title="<?php echo esc_attr($placeholder) ?>" placeholder="<?php echo esc_attr($placeholder) ?>">
							</td>
						</tr>
					</table>

					<?php do_action('utm_event_tracker/after_custom_events') ?>
				</template>
			</td>
		</tr>
	<?php
	}

	/**
	 * Add custom events fields
	 * 
	 * @since 1.1.2
	 * @return void
	 */
	public function add_custom_events_fields() { ?>
		<template v-if="custom_events.length > 0">
			<label>
				<input type="checkbox" disabled>
				<?php esc_html_e('Track custom events without UTM data', 'utm-event-tracker'); ?>
			</label>

			<?php Utils::get_field_note(esc_html__('Track custom events even if the visitor does not arrive with UTM values in the URL\'s query string.', 'utm-event-tracker'), '', 'custom+events', 'track+custom+events') ?>
		</template>

		<div style="margin-top: 10px;"></div>
		<button class="button button-primary button-add-custom-event" @click.prevent="add_custom_event()">
			<?php esc_html_e('Add a Custom Event', 'utm-event-tracker'); ?>
			<span class="dashicons dashicons-lock" v-if="custom_events.length >= 1"></span>
		</button>
<?php
	}
}

Admin::get_instance();
