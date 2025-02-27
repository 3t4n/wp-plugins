<?php

namespace UTM_Event_Tracker;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Main class plugin
 */
final class Main {

	/**
	 * The single instance of the class.
	 *
	 * @var Main
	 * @since 1.0.0
	 */
	protected static $_instance = null;

	/**
	 * Main Instance.
	 *
	 * Ensures only one instance of Main is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @static
	 * @return Main - Main instance.
	 */
	public static function get_instance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/** 
	 * Constructor 
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->add_tables();
		require_once UTM_EVENT_TRACKER_PATH . 'inc/utils.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/class-migrate.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/class-settings.php';

		if (version_compare(PHP_VERSION, UTM_EVENT_TRACKER_MIN_PHP_VERSION, '<')) {
			return add_action('admin_notices', array($this, 'php_version_missing'));
		}

		$this->include_files();
		$this->init();
	}

	/**
	 * Add tables variables at $wpdb 
	 * 
	 * @since 1.0.0
	 */
	public function add_tables() {
		global $wpdb;
		$wpdb->utm_event_tracker_sessions_table = $wpdb->prefix . 'utm_event_tracker_sessions';
		$wpdb->utm_event_tracker_views_table = $wpdb->prefix . 'utm_event_tracker_views';
		$wpdb->utm_event_tracker_events_table = $wpdb->prefix . 'utm_event_tracker_events';
	}

	public function php_version_missing() {
		$notice = sprintf(
			/* translators: 1 for plugin name, 2 for PHP, 3 for PHP version */
			esc_html__('%1$s need %2$s version %3$s or greater.', 'utm-event-tracker'),
			'<strong>' . __('UTM Event Tracker and Analytics', 'utm-event-tracker') . '</strong>',
			'<strong>' . __('PHP', 'utm-event-tracker') . '</strong>',
			UTM_EVENT_TRACKER_MIN_PHP_VERSION
		);

		printf('<div class="notice notice-warning"><p>%1$s</p></div>', wp_kses_post($notice));
	}

	/**
	 * Include required files
	 * 
	 * @since 1.0.0
	 */
	public function include_files() {
		require_once UTM_EVENT_TRACKER_PATH . 'inc/webhook.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/class-cache.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/class-event.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/class-query.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/class-session.php';

		require_once UTM_EVENT_TRACKER_PATH . 'third-party/wpforms.php';
		require_once UTM_EVENT_TRACKER_PATH . 'third-party/elementor.php';
		require_once UTM_EVENT_TRACKER_PATH . 'third-party/formidable.php';
		require_once UTM_EVENT_TRACKER_PATH . 'third-party/woocommerce.php';
		require_once UTM_EVENT_TRACKER_PATH . 'third-party/ninja-forms.php';
		require_once UTM_EVENT_TRACKER_PATH . 'third-party/gravity-form.php';
		require_once UTM_EVENT_TRACKER_PATH . 'third-party/contact-form-7.php';
		require_once UTM_EVENT_TRACKER_PATH . 'third-party/easy-digital-download.php';
		require_once UTM_EVENT_TRACKER_PATH . 'inc/class-admin.php';
	}

	/**
	 * Init the UTM analytics plugin
	 * 
	 * @since 1.0.0
	 */
	public function init() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_script'));
		add_action('template_redirect', array($this, 'generate_session'), 1000);
		add_filter('plugin_action_links', array($this, 'add_plugin_links'), 10, 2);
		add_action('wp_ajax_utm_event_tracker/capture_custom_event', array($this, 'capture_custom_event'));
		add_action('wp_ajax_nopriv_utm_event_tracker/capture_custom_event', array($this, 'capture_custom_event'));
		new Query();
	}

	/**
	 * Generate user session
	 * 
	 * @since 1.0.0
	 */
	public function generate_session() {
		if (!Session::is_available() || is_admin()) {
			return;
		}

		$session = Session::get_current_session();

		$result = $session->save();
		if (!$result) {
			return;
		}

		$session->add_view();
	}

	/**
	 * Add links at the plugin action
	 * 
	 * @since 1.0.0
	 * @return array $actions
	 */
	public function add_plugin_links($actions, $plugin_file) {
		if (UTM_EVENT_TRACKER_BASENAME == $plugin_file) {
			$new_links = array(
				'overview' => sprintf('<a href="%s">%s</a>', menu_page_url('utm-event-tracker', false), __('Overview', 'utm-event-tracker')),
				'settings' => sprintf('<a href="%s">%s</a>', menu_page_url('utm-event-tracker-settings', false), __('Settings', 'utm-event-tracker')),
				'get-pro' => '<a target="_blank" href="https://codiepress.com/plugins/utm-event-tracker-and-analytics-pro/?utm_campaign=utm+event+tracker&utm_source=get+pro&utm_medium=plugins+page">' . __('Get Pro', 'utm-event-tracker') . '</a>'
			);

			$actions = array_merge($new_links, $actions);
		}

		return $actions;
	}

	/**
	 * Enqueue script on frontend
	 * 
	 * @since 1.0.1
	 * @return void
	 */
	public function enqueue_script() {
		$session = Session::get_current_session();

		wp_enqueue_script('utm-event-tracker', UTM_EVENT_TRACKER_URL . 'assets/frontend.min.js', ['jquery'], UTM_EVENT_TRACKER_VERSION, true);

		$utm_event_tracker_parameters = array();

		$parameters = array_keys(Utils::get_all_parameters());
		while ($key = current($parameters)) {
			$utm_event_tracker_parameters[$key] = $session->get($key);
			next($parameters);
		}

		wp_localize_script('utm-event-tracker', 'utm_event_tracker', array(
			'site_url' => home_url(),
			'ajax_url' => admin_url('admin-ajax.php'),
			'settings' => Settings::get_instance()->get_all_data(),
			'nonce' => wp_create_nonce('_nonce_utm_event_tracker_frontend'),
			'has_custom_events' => Settings::get_instance()->has_custom_events(),
			'utm_parameters' => $utm_event_tracker_parameters,
		));
	}

	/**
	 * Capture custom event
	 * 
	 * @since 1.1.2
	 * @return void
	 */
	public function capture_custom_event() {
		if (!isset($_POST['nonce'])) {
			return;
		}

		if (!wp_verify_nonce(sanitize_text_field($_POST['nonce']), '_nonce_utm_event_tracker_frontend')) {
			return;
		}

		$session_id = isset($_POST['session_id']) ? sanitize_text_field($_POST['session_id']) : '';
		$session = Session::get_by_session_id($session_id);

		$capture_without_session = Settings::get_instance()->get('capture_custom_events_without_session', false);
		if (false == $capture_without_session && !$session->is_exists()) {
			return;
		}

		$session->save();

		$event_title = !empty($_POST['title']) ? sanitize_text_field($_POST['title']) : null;
		$event_type = !empty($_POST['event_type']) ? sanitize_text_field($_POST['event_type']) : null;

		$session->add_event(array(
			'type' => $event_type,
			'title' => $event_title
		));
	}
}
