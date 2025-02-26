<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ad.ink
 * @since      1.0.0
 *
 * @package    Ad_Ink
 * @subpackage Ad_Ink/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ad_Ink
 * @subpackage Ad_Ink/admin
 * @author     Ad.Ink <contact@ad.ink>
 */
class Ad_Ink_Admin
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

	private $errors;
	private $alerts;
	private $page;
	private $subPage = "register";
	private $loaded = false;

	private $user;
	private $website;
	private $adstxt;
	private $categories;
	private $samples;

	private $api;

	private $url;

	const AD_INK_API_TOKEN_OPTION_NAME = 'ad-ink-api-token';
	const ACTIVE_POST_TYPES_OPTION_NAME = 'ad-ink-post-types';
	const TAG_ID_OPTION_NAME = 'ad-ink-tag-id';
	const POSITION_OPTION_NAME = 'ad-ink-position';

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
		$this->errors = [];
		$this->alerts = [];
		$this->page = "auth";

		$this->url = $this->getSiteUrl();
		$this->api = new AdInkApi($this->getApiToken());
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name . '-admin', plugin_dir_url(__FILE__) . 'css/ad-ink-admin.css', [], $this->version, 'all');
		wp_enqueue_style($this->plugin_name . '-normalize', plugin_dir_url(__FILE__) . 'css/normalize.css', [], $this->version, 'all');
		wp_enqueue_style($this->plugin_name . '-tailwind', plugin_dir_url(__FILE__) . 'css/tailwind.min.css', [], $this->version, 'all');
		wp_enqueue_style($this->plugin_name . '-daterangepicker', plugin_dir_url(__FILE__) . 'css/daterangepicker.css', [], $this->version, 'all');
		wp_enqueue_style($this->plugin_name . '-datatables', plugin_dir_url(__FILE__) . 'css/datatables.min.css', [], $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name . '-dailymotion', "https://api.dmcdn.net/all.js", [], $this->version, false);
		//wp_enqueue_script($this->plugin_name . '-moment', plugin_dir_url(__FILE__) . 'js/moment.min.js', [], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-daterangepicker', plugin_dir_url(__FILE__) . 'js/daterangepicker.js', ['jquery', 'moment'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-switch', plugin_dir_url(__FILE__) . 'js/switch.js', ['jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-categories', plugin_dir_url(__FILE__) . 'js/categories.js', ['jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-position', plugin_dir_url(__FILE__) . 'js/position.js', ['jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-mini-player', plugin_dir_url(__FILE__) . 'js/mini-player.js', ['jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-ads-txt', plugin_dir_url(__FILE__) . 'js/ads-txt.js', ['jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-auth', plugin_dir_url(__FILE__) . 'js/auth.js', ['jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-datatables', plugin_dir_url(__FILE__) . 'js/datatables.min.js', ['jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-filters', plugin_dir_url(__FILE__) . 'js/filters.js', ['moment'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-player', plugin_dir_url(__FILE__) . 'js/player.js', [$this->plugin_name . '-dailymotion', 'jquery'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-affiliation', plugin_dir_url(__FILE__) . 'js/affiliation.js', [$this->plugin_name . '-daterangepicker', 'jquery', 'moment'], $this->version, false);
		wp_enqueue_script($this->plugin_name . '-report', plugin_dir_url(__FILE__) . 'js/report.js', [$this->plugin_name . '-daterangepicker', 'jquery', 'moment'], $this->version, false);
	}

	/**
	 * Create the Creativs menu page with add_menu_page()
	 *
	 * @since    1.0.0
	 */
	public function add_admin_page()
	{
		add_menu_page(
			'ad.ink',
			'ad.ink',
			'manage_options',
			$this->plugin_name,
			array($this, 'load_admin_page_tag'), // Calls function to require the partial
			plugins_url( 'ad-ink/admin/images/menu.png' )
		);

		add_submenu_page($this->plugin_name, "Mon tag", "Mon tag", "manage_options", $this->plugin_name, array($this, 'load_admin_page_tag'));
		add_submenu_page($this->plugin_name, "Rapport", "Rapport", "manage_options", $this->plugin_name . '-report', array($this, 'load_admin_page_report'));
		add_submenu_page($this->plugin_name, "Affiliation", "Affiliation", "manage_options", $this->plugin_name . '-affiliation', array($this, 'load_admin_page_affiliation'));
		add_submenu_page($this->plugin_name, "Mon compte", "Mon compte", "manage_options", $this->plugin_name . '-account', array($this, 'load_admin_page_account'));
	}

	private function load($props = [])
	{
		if (!$this->loaded && count($props) > 0) {


			if (in_array("categories", $props)) {
				$this->categories = $this->api->getCategories();
			}

			if (in_array("samples", $props)) {
				$this->samples = $this->api->getVideoSamples();
			}

			if (in_array("user", $props)) {
				$this->user = $this->api->getUser();
			}

			if (in_array("website", $props)) {
				$this->website = $this->api->getWebsite($this->url, ["category"]);
			}
			if (in_array("adstxt", $props)) {
				$this->adstxt = $this->api->getAdsTxt($this->website["id"]);
			}

			$this->loaded = true;
		}
	}

	/**
	 * Load the plugin admin tag page.
	 *
	 * @since    1.0.0
	 */
	public function load_admin_page_tag()
	{
		// forms action
		if (isset($_POST["action"])) {
			$action = sanitize_text_field($_POST["action"]);
			call_user_func([$this, "post_" . $action]);
		}

		try {
			$this->load([
				"categories", "samples", "website", "adstxt", "user"
			]);

			/*if ($this->user === AdInkApi::ERROR || $this->website === AdInkApi::ERROR) {
				$this->user = null;
				$this->website = null;
				$this->load_admin_error_page();
				exit();
			}*/
			if ($this->website !== null) {
				$this->page = "index";
				update_option(self::TAG_ID_OPTION_NAME, $this->website["id"], false);
			} else {
				// error
			}
		} catch (AdInkApiUnauthenticatedExeption $e) {
			return $this->load_admin_page_auth();
		}

		require_once plugin_dir_path(__FILE__) . 'partials/ad-ink-admin-display.php';
	}

	/**
	 * Load the plugin admin auth page.
	 *
	 * @since    1.0.0
	 */
	public function load_admin_page_auth()
	{
		$this->page = "auth";

		require_once plugin_dir_path(__FILE__) . 'partials/ad-ink-admin-display.php';
	}

	/**
	 * Load the plugin admin report page.
	 *
	 * @since    1.0.0
	 */
	public function load_admin_page_report()
	{
		// forms action
		if (isset($_POST["action"])) {
			$action = sanitize_text_field($_POST["action"]);
			call_user_func([$this, "post_" . $action]);
		}

		try {
			$this->load(["website", "user"]);
			$this->page = "report";
		} catch (AdInkApiUnauthenticatedExeption $e) {
			return $this->load_admin_page_auth();
		}

		require_once plugin_dir_path(__FILE__) . 'partials/ad-ink-admin-display.php';
	}

	/**
	 * Load the plugin admin affiiliation page.
	 *
	 * @since    1.0.0
	 */
	public function load_admin_page_affiliation()
	{
		// forms action
		if (isset($_POST["action"])) {
			$action = sanitize_text_field($_POST["action"]);
			call_user_func([$this, "post_" . $action]);
		}

		try {
			$this->load(["user"]);
			$this->page = "affiliation";
		} catch (AdInkApiUnauthenticatedExeption $e) {
			return $this->load_admin_page_auth();
		}

		require_once plugin_dir_path(__FILE__) . 'partials/ad-ink-admin-display.php';
	}

	/**
	 * Load the plugin admin account page.
	 *
	 * @since    1.0.0
	 */
	public function load_admin_page_account()
	{
		// forms action
		if (isset($_POST["action"])) {
			$action = sanitize_text_field($_POST["action"]);
			call_user_func([$this, "post_" . $action]);
		}

		try {
			$this->load(["user"]);
			$this->page = "account";
		} catch (AdInkApiUnauthenticatedExeption $e) {
			return $this->load_admin_page_auth();
		}

		require_once plugin_dir_path(__FILE__) . 'partials/ad-ink-admin-display.php';
	}

	public function load_admin_error_page()
	{
		$this->page = "none";
		$this->alerts[] = ["type" => "danger", "content" => "Une erreur est survenue. Veuillez réessayer dans quelques instants."];
		require_once plugin_dir_path(__FILE__) . 'partials/ad-ink-admin-display.php';
	}

	// nonce
	private function verifyNonce()
	{
		return isset($_POST['ad-ink-nonce']) && wp_verify_nonce($_POST['ad-ink-nonce'], 'ad-ink-nonce');
	}

	private function nonce()
	{
		return '<input type="hidden" name="ad-ink-nonce" value="' . wp_create_nonce('ad-ink-nonce') . '" />';
	}

	// post actions
	public function post_login()
	{
		$this->subPage = "login";

		if ($this->verifyNonce()) {
			try {

				// verify data
				if (empty($_POST["email"])) {
					$this->pushErrors(["email" => ["The email field is required."]]);
					return;
				}

				if (empty($_POST["password"])) {
					$this->pushErrors(["password" => ["The password field is required."]]);
					return;
				}

				// validate data
				$email = sanitize_email($_POST["email"]);
				$email = $this->validate("email", $email);
				if ($email === false) {
					$this->pushErrors(["email" => ["The email must be a valid email address."]]);
					return;
				}

				$password = sanitize_text_field($_POST["password"]);

				// send api request
				$response = $this->api->login($email, $password, $this->getSiteUrl());
				if ($response["success"]) {
					$this->updateApiToken($response["token"]);
					$this->api->setToken($response["token"]);
				} else {
					$this->pushErrors($response["errors"]);
					return;
				}
			} catch (\Exception $e) {
				$this->alerts[] = ["type" => "danger", "content" => "An error has occurred. Try Again."];
			}
		}
	}

	public function post_logout()
	{
		if ($this->verifyNonce()) {
			$this->updateApiToken(null);
			wp_redirect(admin_url('admin.php?page=ad-ink'));
			die();
		}
	}

	public function post_register()
	{
		$this->subPage = "register";

		if ($this->verifyNonce()) {

			// verify data
			if (empty($_POST["category"])) {
				$this->pushErrors(["category" => ["The category field is required."]]);
				return;
			}

			if (empty($_POST["email"])) {
				$this->pushErrors(["email" => ["The email field is required."]]);
				return;
			}

			if (empty($_POST["password"])) {
				$this->pushErrors(["password" => ["The password field is required."]]);
				return;
			}

			// validate data
			$category = sanitize_text_field($_POST["category"]);
			$category = $this->validate("number", $category);
			if ($category === false) {
				$this->pushErrors(["category" => ["The category must be a valid number."]]);
				return;
			}

			$email = sanitize_email($_POST["email"]);
			$email = $this->validate("email", $email);
			if ($email === false) {
				$this->pushErrors(["email" => ["The email must be a valid email address."]]);
				return;
			}

			$password = sanitize_text_field($_POST["password"]);
			$password_confirmation = sanitize_text_field($_POST["password_confirmation"]);
			if ($this->validate("confirm", $password, $password_confirmation) === false) {
				$this->pushErrors(["password" => ["The password confirmation does not match."]]);
				return;
			}

			$eula = $this->validate("boolean", $_POST["eula"]);

			// send api request
			$data = [
				"website" => $this->getSiteUrl(),
				"category" => $category,
				"email" => $email,
				"password" => $password,
				"password_confirmation" => $password_confirmation,
				"eula" => $eula,
			];
			try {
				$response = $this->api->register($data);

				if ($response["success"]) {
					$this->updateApiToken($response["token"]);
					$this->api->setToken($response["token"]);
				} else {
					$this->pushErrors($response["errors"]);
				}
			} catch (\Exception $e) {
				$this->alerts[] = ["type" => "danger", "content" => "An error has occurred. Try Again."];
			}
		}
	}

	public function post_update()
	{
		if ($this->verifyNonce()) {

			// verify data
			if (empty($_POST["website"])) {
				$this->alerts[] = ["type" => "danger", "content" => "An error has occurred. Try Again."];
				return;
			}

			if (empty($_POST["position"])) {
				$this->alerts[] = ["type" => "danger", "content" => "An error has occurred. Try Again."];
				return;
			}

			if (empty($_POST["category"])) {
				$this->pushErrors(["category" => ["The category field is required."]]);
				return;
			}

			// validate data
			$data = [];

			$website = sanitize_text_field($_POST["website"]);

			$category = sanitize_text_field($_POST["category"]);
			$category = $this->validate("number", $category);
			if ($category === false) {
				$this->pushErrors(["category" => ["The category must be a valid number."]]);
				return;
			}
			$data["category"] = $category;

			$data["player_controls"] = $this->validate("boolean", $_POST["player_controls"]);
			$data["player_social"] = $this->validate("boolean", $_POST["player_social"]);

			if (!empty($_POST["player_color_foreground"])) {
				$data["player_color_foreground"] = sanitize_text_field($_POST["player_color_foreground"]);
			}
			if (!empty($_POST["player_color_background"])) {
				$data["player_color_background"] = sanitize_text_field($_POST["player_color_background"]);
			}
			if (!empty($_POST["player_color_text"])) {
				$data["player_color_text"] = sanitize_text_field($_POST["player_color_text"]);
			}

			$player_mini_player = 0;
			if (!empty($_POST["player_mini_player"])) {
				$player_mini_player = sanitize_text_field($_POST["player_mini_player"]);
				$player_mini_player = $this->validate("number", $player_mini_player);
				if ($category === false) {
					$this->pushErrors(["player_mini_player" => ["The player_mini_player must be a valid number."]]);
					return;
				}
			}
			$data["player_mini_player"] = $player_mini_player;

			$data["devices_desktop"] = $this->validate("boolean", $_POST["devices_desktop"]);
			$data["devices_mobile"] = $this->validate("boolean", $_POST["devices_mobile"]);
			$data["seo"] = $this->validate("boolean", $_POST["seo"]);

			if (!empty($_POST["vast"])) {
				$data["vast"] = sanitize_text_field($_POST["vast"]);
			}

			$data["enabled"] = $this->validate("boolean", $_POST["enabled"]);

			$position = sanitize_text_field($_POST["position"]);
			if (!$this->validate("in", $position, ["automatic", "manual"])) {
				$this->alerts[] = ["type" => "danger", "content" => "An error has occurred. Try Again."];
				return;
			}

			$postTypesEnabled = [];
			if (isset($_POST["post_types"])) {
				$postTypes = array_keys(get_post_types(['public'   => true], 'objects'));
				foreach ($_POST["post_types"] as $type => $value) {
					if ($this->validate("in", $type, $postTypes) && $this->validate("boolean", $value)) {
						$postTypesEnabled[] = $type;
					}
				}
			}

			// send api request
			try {
				$response = $this->api->updateWebsite($website, $data);

				if ($response["success"]) {
					$this->alerts[] = ["type" => "success", "content" => "Modifications sauvegardées."];
				} else {
					$this->pushErrors($response["errors"]);
				}
			} catch (\Exception $e) {
				$this->alerts[] = ["type" => "danger", "content" => "An error has occurred. Try Again."];
			}

			// update local position
			update_option(self::POSITION_OPTION_NAME, $position, false);

			// update local post_types
			if (count($postTypesEnabled) > 0) {
				update_option(self::ACTIVE_POST_TYPES_OPTION_NAME, $postTypesEnabled, false);
			} else {
				delete_option(self::ACTIVE_POST_TYPES_OPTION_NAME);
			}
		}
	}

	// api token
	private function getApiToken()
	{
		return get_option(self::AD_INK_API_TOKEN_OPTION_NAME, null);
	}
	private function updateApiToken($token)
	{
		if ($token === null) {
			delete_option(self::AD_INK_API_TOKEN_OPTION_NAME);
		} else {
			update_option(self::AD_INK_API_TOKEN_OPTION_NAME, $token, false);
		}
	}

	private function getSiteUrl()
	{
		$url = 'http://' . str_replace(['https://', 'http://'], '', get_site_url());
		$pieces = parse_url($url);
		$domain = isset($pieces['host']) ? $pieces['host'] : '';
		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
			return $regs['domain'];
		}
		return null;
	}

	// errors
	private function pushErrors($errors)
	{
		$this->errors = array_merge($this->errors, $errors);
	}
	private function getErrors($key)
	{
		if (isset($this->errors[$key]) && count($this->errors[$key]) > 0) {
			return $this->errors[$key];
		} else {
			return [];
		}
	}

	// validation
	private function validate($type, $value, $options = null)
	{
		switch ($type) {
			case "email":
				return filter_var($value, FILTER_VALIDATE_EMAIL);
			case "number":
				return filter_var($value, FILTER_VALIDATE_INT);
			case "boolean":
				return filter_var($value || false, FILTER_VALIDATE_BOOLEAN);
			case "in":
				return in_array($value, $options);
			case "confirm":
				return $value === $options;
		}
	}
}
